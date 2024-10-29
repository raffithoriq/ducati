<?php

namespace App\Http\Controllers\Api;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CrudCategoryApiController extends Controller
{


    public function categoryWithProductCount()
    {
        $categories = Categories::withCount('produk') 
            ->get(['id', 'name', 'produks_count']);

        return response()->json($categories);
    }


    public function index(Request $request)
    {
        // Logika pagination dan pencarian
        $query = Categories::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('keterangan', 'like', "%$search%");
        }

        $categories = $query->paginate(10);
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|min:5',
        ]);

        $category = Categories::create([
            'name' => $request->input('name'),
            'keterangan' => $request->input('description'),
        ]);

        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = Categories::findOrFail($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Categories::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update([
            'name' => $request->input('name'),
            'keterangan' => $request->input('description'),
        ]);

        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }
}
