<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class crudcategorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view(
            'pages.kategori.admincategory',
            [
                "title" => "category",
                "titleadmin" => "Category",
                "categories" => $categories
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'pages.kategori.addcategory',
            [
                "title" => "Category",
                "titleadmin" => "Add Category"
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|min:5',
        ]);

        $data = [
            'name' => $request->input('name'),
            'keterangan' => $request->input('description')

        ];

        Categories::create($data);
        return redirect('/admin/category')->with('success', 'Category Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category)
    {
        return view('pages.kategori.editcategory', [
            "category" => $category,
            "title" => "Edit Category",
            "titleadmin" => "Edit Category"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $category)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    // Update kategori
    $category->update([
        'name' => $request->input('name'),
        'keterangan' => $request->input('description'),
    ]);

    // Redirect ke daftar kategori
    return redirect()->route('admin.category.edit', $category->id)->with('success', 'Category updated successfully');

}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect('/admin/category')->with('success', 'Category deleted successfully');
    }
}
