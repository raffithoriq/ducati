<?php

namespace App\Http\Controllers\Api;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrudPelangganApiController extends Controller
{
    public function pelangganDenganJumlahTransaksi()
    {
        $pelanggan = Pelanggan::withCount('transaksi')->get();

        return response()->json($pelanggan);
    }
}


