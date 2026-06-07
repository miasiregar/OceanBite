<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        DB::table('USERS')->insert([
            'ID_USER' => DB::raw('seq_users.NEXTVAL'),
            'USERNAME' => $request->username,
            'PASSWORD' => bcrypt($request->password),
            'NAMA_LENGKAP' => $request->nama_lengkap,
            'NO_HP' => $request->no_hp,
            'ROLE' => 'user'
        ]);

        return redirect('/login');
    }

    public function authenticate(Request $request)
    {
        $user = DB::table('USERS')
            ->where('USERNAME', $request->username)
            ->first();

        if ($user && password_verify($request->password, $user->password)) {

            Session::put('user', $user);
            Session::put('user_id', $user->id_user);
            Session::put('username', $user->username);
            Session::put('role', $user->role);

            return redirect('/dashboard');
        }

        return back()->with(
            'error',
            'Login gagal'
        );
    }

    public function logout()
    {
        Session::flush();

        return redirect('/login');
    }
}