<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class Registercontroller extends Controller
{
    public function index(){
        return view('register',
        [
            'title' => 'Register'
        ]
    );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:50'
        ]);

        $data = [
            'nama_lengkap' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $data['password'] = bcrypt($data['password']);

        Pelanggan::create($data);

        return redirect('/login')->with('success', 'Register berhasil, silahkan login');
        
    }
}
