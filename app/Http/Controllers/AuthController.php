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
        DB::table('users')->insert([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
            'role' => 'user'
        ]);

        // Auto-login: fetch the newly created user and set session
        $user = DB::table('users')
            ->where('username', $request->username)
            ->first();

        Session::put('user', $user);
        Session::put('user_id', $user->id_user);
        Session::put('username', $user->username);
        Session::put('role', $user->role);

        return redirect('/dashboard');
    }

    public function authenticate(Request $request)
    {
        $user = DB::table('users')
            ->where('username', $request->username)
            ->first();

        if ($user && password_verify($request->password, $user->password)) {

            Session::put('user', $user);
            Session::put('user_id', $user->id_user);
            Session::put('username', $user->username);
            Session::put('role', $user->role);

            if ($user->role == 'admin') {
                return redirect('/admin');
            }

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