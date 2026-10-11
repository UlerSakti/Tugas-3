<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // READ ALL + Relasi ke Assets
    public function index()
    {
        $categories = Category::with('assets')->get();
        return response()->json(['status' => 'success', 'data' => $categories]);
    }

    // CREATE Category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|unique:categories,slug'
        ]);

        $category = Category::create($validated);
        return response()->json(['status' => 'success', 'data' => $category], 201);
    }

    // DELETE Category
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['status' => 'error', 'message' => 'Kategori tidak ditemukan'], 404);
        }
        $category->delete();
        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil dihapus']);
    }
}