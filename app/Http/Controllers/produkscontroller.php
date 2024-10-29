<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



use App\Models\produk;

class ProdukController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari model Produk
        $produk = DB::table('produks')->get();
        dd($produk);
        // Mengirim data ke view 'produks' dengan compact
        // return view('produk', compact('produk'));
    }
}
