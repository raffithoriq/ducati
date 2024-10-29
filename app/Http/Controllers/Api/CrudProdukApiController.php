<?php

namespace App\Http\Controllers\Api;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class CrudProdukApiController extends Controller
{


    public function produkWithCategory()
    {
        $produk = Produk::with('category:id,name')
            ->select('id', 'category_id', 'name', 'deskripsi', 'harga')
            ->get();

        return response()->json($produk);
    }

    public function produkWithTransactionCount()
    {
        $produk = Produk::withCount('transaksi')
            ->with('category:id,name')
            ->get(['id', 'category_id', 'name', 'harga', 'transaksi_count']); 
        return response()->json($produk);
    }

    public function index(Request $request)
    {
        Log::debug('Debugging Info', ['data' => $request->all()]);
        try {
            $query = Produk::query();

            if ($search = $request->input('search')) {
                Log::debug('Debugging Info', ['data' => $request->all()]);
                

                $query->where('name', 'like', "%$search%")
                    ->orWhere('deskripsi', 'like', "%$search%");
            }

            $produk = $query->paginate(10);
            Log::debug('Debugging Info', ['data' => $request->all()]);
            return response()->json($produk);
        } catch (\Exception $e) {
            Log::debug('Debugging Info', ['data' => $request->all()]);
            return response()->json(['error' => 'Terjadi kesalahan'], 500);
        }
    }


    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /******  02181d38-545d-425b-9924-9fbfebe3adec  *******/
    public function store(Request $request)
    {
        Log::info('Data produk yang diterima', ['data' => $request->all()]);

        try {
            $request->validate([
                'product_name' => 'required|min:5',
                'price' => 'required|numeric',
                'category_id' => 'required|exists:categories,id',
                'description' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $data = [
                'name' => $request->input('product_name'),
                'harga' => $request->input('price'),
                'category_id' => $request->input('category_id'),
                'deskripsi' => $request->input('description'),
                'foto_produk' => $request->file('image') ? $request->file('image')->store('image') : null,
            ];

            $produk = Produk::create($data);
            Log::info('Produk berhasil disimpan', ['produk' => $produk]);
            return response()->json($produk, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed', ['errors' => $e->errors()]);
            return response()->json(['error' => 'Validation failed', 'details' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan produk', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Terjadi kesalahan', 'details' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $produk = Produk::with('category')->findOrFail($id);
        return response()->json($produk);
    }


    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'product_name' => 'required|min:5',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $produk->update([
            'name' => $request->input('product_name'),
            'harga' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'deskripsi' => $request->input('description'),
            'foto_produk' => $request->file('image') ? $request->file('image')->store('image') : $produk->foto_produk,
        ]);

        return response()->json($produk);
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return response()->json(null, 204);
    }
}
