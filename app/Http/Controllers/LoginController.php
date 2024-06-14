<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    
    public function authenticating(Request $request )
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();
            if(Auth::user()->role_id == 1){
                Session::flash('error', 'Gagal');
                return redirect('dashboard')->with('toast_success', 'Selamat Datang Admin');
            }
            if(Auth::user()->role_id == 2){
                Session::flash('error', 'Gagal');
                return redirect('dashboard')->with('toast_success', 'Selamat Datang' );
            }
        }

        Session::flash('error', 'Login gagal, mohon periksa kembali Email dan Password yang di gunakan');
        return redirect('/');
        
    }

        public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
