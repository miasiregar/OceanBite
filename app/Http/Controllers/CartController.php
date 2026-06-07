<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add($id)
    {
        $menu = DB::table('MENU')
            ->where('id_menu', $id)
            ->first();

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'id_menu' => $menu->id_menu,
                'nama_menu' => $menu->nama_menu,
                'harga' => $menu->harga,
                'gambar' => $menu->gambar,
                'qty' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect('/menu#menu-'.$id);
    }

    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        }

        session()->put('cart', $cart);

        return redirect('/menu#menu-'.$id);
    }

    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']--;

            if ($cart[$id]['qty'] <= 0) {
                unset($cart[$id]);
            }
        }

        session()->put('cart', $cart);

        return redirect('/menu#menu-'.$id);
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect('/menu#menu-'.$id);
    }
}