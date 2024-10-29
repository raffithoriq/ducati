<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParsingDataController extends Controller
{
    public function index()
    {
        $namalengkap = '';
        $email = '';
        $Jeniskelamin = '';

        return view('parsingdata', 
        [ 
        'nama_lengkap' => $namalengkap,
        'email' => $email,
        'Jenis_kelamin' => $Jeniskelamin,
        ]);
    }
}
