<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PelangganTransaksiApiController extends Controller
{
    // Menampilkan semua pelanggan beserta jumlah transaksinya
    public function indexPelanggan()
    {
        $pelanggan = Pelanggan::withCount('transaksi')->get();
        return response()->json($pelanggan);
    }

    // Menyimpan pelanggan baru
    public function storePelanggan(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nomor_telepon' => 'required',
            'alamat' => 'required|string',
        ]);

        $pelanggan = Pelanggan::create($request->all());
        return response()->json(['message' => 'Pelanggan created', 'data' => $pelanggan], 201);
    }

    // Menampilkan pelanggan dan total transaksinya berdasarkan ID
    public function showPelanggan($id)
    {
        $pelanggan = Pelanggan::withCount('transaksi')->findOrFail($id);
        return response()->json($pelanggan);
    }

    // Update data pelanggan
    public function updatePelanggan(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());
        return response()->json(['message' => 'Pelanggan updated', 'data' => $pelanggan]);
    }

    // Hapus pelanggan
    public function destroyPelanggan($id)
    {
        Pelanggan::destroy($id);
        return response()->json(['message' => 'Pelanggan deleted']);
    }

    // Menyimpan transaksi baru untuk pelanggan
    public function storeTransaksi(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'produk_id' => 'required|exists:produks,id',
            'total_harga' => 'required|numeric',
        ]);

        $transaksi = Transaksi::create($request->all());
        return response()->json(['message' => 'Transaksi created', 'data' => $transaksi], 201);
    }

    // Menampilkan transaksi berdasarkan ID
    public function showTransaksi($id)
    {
        $transaksi = Transaksi::with(['pelanggan', 'produk'])->findOrFail($id);
        return response()->json($transaksi);
    }

    // Update transaksi
    public function updateTransaksi(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());
        return response()->json(['message' => 'Transaksi updated', 'data' => $transaksi]);
    }

    // Hapus transaksi
    public function destroyTransaksi($id)
    {
        Transaksi::destroy($id);
        return response()->json(['message' => 'Transaksi deleted']);
    }
}
