<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect('/login');
        }

        $orders = DB::table('pesanan')
            ->where('id_user', $user->id_user)
            ->orderBy('id_pesanan', 'desc')
            ->get();

        return view(
            'orders',
            compact('orders')
        );
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/menu');
        }

        return view(
            'checkout',
            compact('cart')
        );
    }

    public function payment()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/menu');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['harga'] * $item['qty'];
        }

        return view(
            'payment',
            compact(
                'cart',
                'total'
            )
        );
    }

    public function process(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/menu');
        }

        $user = session()->get('user');

        if (!$user) {
            return redirect('/login');
        }

        $id_user = $user->id_user;

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['harga'] * $item['qty'];
        }

        // simpan pesanan (MySQL auto-increment)
        $id_pesanan = DB::table('pesanan')->insertGetId([
            'id_user' => $id_user,
            'tanggal_pesan' => now(),
            'total_harga' => $total,
            'status_pesanan' => 'pending'
        ], 'id_pesanan');

        // simpan detail pesanan (MySQL auto-increment)
        foreach ($cart as $item) {
            DB::table('detail_pesanan')->insert([
                'id_pesanan' => $id_pesanan,
                'id_menu' => $item['id_menu'],
                'jumlah' => $item['qty'],
                'subtotal' => $item['harga'] * $item['qty']
            ]);
        }

        // default bukti kosong
        $namaFile = null;

        // kalau QRIS upload bukti
        if ($request->metode_pembayaran == 'QRIS') {
            $bukti = $request->file('bukti_bayar');

            if ($bukti) {
                $namaFile = time() . '.' . $bukti->extension();

                $bukti->move(
                    public_path('bukti'),
                    $namaFile
                );
            }
        }

        // simpan pembayaran (MySQL auto-increment)
        DB::table('pembayaran')->insert([
            'id_pesanan' => $id_pesanan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_bayar' => $namaFile,
            'status_verifikasi' =>
                $request->metode_pembayaran == 'Tunai'
                ? 'Menunggu pembayaran di kasir'
                : 'Pending Verifikasi'
        ]);

        session()->forget('cart');

        return redirect(
            '/invoice/' . $id_pesanan
        );
    }

    public function invoice($id)
    {
        $pesanan = DB::table('pesanan')
            ->where('id_pesanan', $id)
            ->first();

        $detail = DB::table('detail_pesanan')
            ->join(
                'menu',
                'detail_pesanan.id_menu',
                '=',
                'menu.id_menu'
            )
            ->where(
                'detail_pesanan.id_pesanan',
                $id
            )
            ->get();

        $pembayaran = DB::table('pembayaran')
            ->where('id_pesanan', $id)
            ->first();

        return view(
            'invoice',
            compact(
                'pesanan',
                'detail',
                'pembayaran'
            )
        );
    }
}