<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController
{
    public function index_login()
    {
        return view('pages.auth.login');
    }

    public function index_register()
    {
        return view('pages.auth.register');
    }

    public function action_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'Admin') {
                return redirect()->intended('/admin/home');
            }

            if ($user->role === 'Students') {
                return redirect()->intended('/mahasiswa/home');
            }
        }

        return back();
    }

    public function action_logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
