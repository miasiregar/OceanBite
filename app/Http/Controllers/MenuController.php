<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function dashboard()
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect('/login');
        }

        return view('dashboard', compact('user'));
    }

    public function index()
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect('/login');
        }

        $menus = DB::table('menu')->get();

        return view('menu', compact('menus'));
    }

    public function detail($id)
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect('/login');
        }

        $menu = DB::table('menu')
            ->where('id_menu', $id)
            ->first();

        return view('menu_detail', compact('menu'));
    }
}