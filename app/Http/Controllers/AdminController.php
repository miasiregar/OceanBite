<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Admin
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $users = DB::table('USERS')->count();
        $menu = DB::table('MENU')->count();
        $orders = DB::table('PESANAN')->count();

        $page = 'dashboard';

        return view('admin', compact(
            'users',
            'menu',
            'orders',
            'page'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Data User
    |--------------------------------------------------------------------------
    */
    public function users()
    {
        $users = DB::table('USERS')->get();

        $page = 'users';

        return view('admin', compact(
            'users',
            'page'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Data Menu
    |--------------------------------------------------------------------------
    */
    public function menu()
    {
        $menu = DB::table('MENU')->get();

        $page = 'menu';

        return view('admin', compact(
            'menu',
            'page'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Data Pesanan
    |--------------------------------------------------------------------------
    */
    public function orders()
    {
        $orders = DB::table('PESANAN')
            ->join(
                'PEMBAYARAN',
                'PESANAN.id_pesanan',
                '=',
                'PEMBAYARAN.id_pesanan'
            )
            ->select(
                'PESANAN.*',
                'PEMBAYARAN.metode_pembayaran',
                'PEMBAYARAN.status_verifikasi',
                'PEMBAYARAN.bukti_bayar'
            )
            ->orderBy('PESANAN.id_pesanan', 'desc')
            ->get();

        $page = 'orders';

        return view('admin', compact(
            'orders',
            'page'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Form Create Menu
    |--------------------------------------------------------------------------
    */
    public function createMenu()
    {
        return view('admin-create-menu');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Menu
    |--------------------------------------------------------------------------
    */
    public function storeMenu(Request $request)
    {
        $gambar = $request->file('gambar');

        $namaGambar = time().'.'.$gambar->extension();

        $gambar->move(
            public_path('images'),
            $namaGambar
        );

        DB::table('MENU')->insert([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namaGambar
        ]);

        return redirect('/admin/menu');
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Menu
    |--------------------------------------------------------------------------
    */
    public function editMenu($id)
    {
        $menu = DB::table('MENU')
            ->where('id_menu', $id)
            ->first();

        return view(
            'admin-edit-menu',
            compact('menu')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Update Menu
    |--------------------------------------------------------------------------
    */
    public function updateMenu(Request $request, $id)
    {
        $data = [
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');

            $namaGambar = time().'.'.$gambar->extension();

            $gambar->move(
                public_path('images'),
                $namaGambar
            );

            $data['gambar'] = $namaGambar;
        }

        DB::table('MENU')
            ->where('id_menu', $id)
            ->update($data);

        return redirect('/admin/menu');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Menu
    |--------------------------------------------------------------------------
    */
    public function deleteMenu($id)
    {
        DB::table('MENU')
            ->where('id_menu', $id)
            ->delete();

        return redirect('/admin/menu');
    }

    /*
    |--------------------------------------------------------------------------
    | Konfirmasi Pesanan
    |--------------------------------------------------------------------------
    */
    public function confirmOrder($id)
    {
        DB::table('PESANAN')
            ->where('id_pesanan', $id)
            ->update([
                'status_pesanan' => 'success'
            ]);

        DB::table('PEMBAYARAN')
            ->where('id_pesanan', $id)
            ->update([
                'status_verifikasi' => 'verified'
            ]);

        return redirect('/admin/orders');
    }
}