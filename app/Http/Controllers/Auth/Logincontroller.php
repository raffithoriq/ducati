<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class Logincontroller extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/admin');
        }

        return view('auth.login', [
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect('/admin'); // JIKA YANG LOGIN ROLE NYA 'admin'
            } else {
                return redirect('/'); // JIKA YANG LOGIN ROLE NYA 'pelanggan'
            }
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
