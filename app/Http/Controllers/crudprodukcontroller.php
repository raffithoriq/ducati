<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\Categories;
use Illuminate\Http\Request;

class crudprodukcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = produk::all(); // Mengambil semua pelanggan
        return view('pages.produk.adminproduk', [
            "title" => "Produks",
            "titleadmin" => "Produks",
            "products" => $produk // Pastikan ini adalah koleksi dari model Pelanggan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view(
            'pages.produk.addproduk',
            [
                "title" => "Tambah Produk",
                "titleadmin" => "Add Produk",
                "categories" => $categories
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|min:5',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'category_id' => 'required'


        ]);

        $data = [
            'foto_produk' => $request->file('image')->store('image'),
            'name' => $request->input('product_name'),
            'harga' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'deskripsi' => $request->input('description')
        ];

        produk::create($data);
        return redirect('/admin/produk/add')->with('success', 'Produk Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $product)
    {
        $categories = Categories::all();
        return view('pages.produk.editproduk', [
            "product" => $product, 
            "title" => "Edit Produk",
            "titleadmin" => "Edit Produk",
            "categories" => $categories

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produk $product)
    {
        $request->validate([
            'product_name' => 'required|min:5',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
            'category_id' => 'required'


        ]);

        $product->update([
            'name' => $request->input('product_name'),
            'harga' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'deskripsi' => $request->input('description'),
            'foto_produk' => $request->file('image')->store('image'),
        ]);
        return redirect()->route('admin.product.update', $product->id)->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $product)
    {
        $product->delete();
        return redirect('/admin/produk')->with('success', 'Product deleted successfully');
    }
}
