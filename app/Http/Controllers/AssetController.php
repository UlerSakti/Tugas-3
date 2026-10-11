<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    // READ: Menampilkan seluruh aset beserta relasi User & Category
    public function index()
    {
        $assets = Asset::with(['category', 'user', 'images', 'reviews'])->get();
        return response()->json(['status' => 'success', 'data' => $assets]);
    }

    // CREATE: Menambahkan aset 3D baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'description' => 'required',
            'price' => 'required|numeric',
            'blender_version' => 'required',
            'file_path' => 'required'
        ]);

        $asset = Asset::create($validated);
        return response()->json(['status' => 'success', 'message' => 'Aset 3D berhasil ditambahkan', 'data' => $asset], 201);
    }

    // READ DETAIL: Menampilkan 1 aset lengkap dengan gambar & review
    public function show($id)
    {
        $asset = Asset::with(['category', 'user', 'images', 'reviews'])->find($id);
        if (!$asset) {
            return response()->json(['status' => 'error', 'message' => 'Aset tidak ditemukan'], 404);
        }
        return response()->json(['status' => 'success', 'data' => $asset]);
    }

    // UPDATE: Mengubah data aset
    public function update(Request $request, $id)
    {
        $asset = Asset::find($id);
        if (!$asset) {
            return response()->json(['status' => 'error', 'message' => 'Aset tidak ditemukan'], 404);
        }

        $asset->update($request->all());
        return response()->json(['status' => 'success', 'message' => 'Aset berhasil diperbarui', 'data' => $asset]);
    }

    // DELETE: Menghapus aset dari database
    public function destroy($id)
    {
        $asset = Asset::find($id);
        if (!$asset) {
            return response()->json(['status' => 'error', 'message' => 'Aset tidak ditemukan'], 404);
        }

        $asset->delete();
        return response()->json(['status' => 'success', 'message' => 'Aset berhasil dihapus']);
    }

    public function indexWeb()
    {
        $assets = Asset::with(['category', 'user', 'images', 'reviews'])->get();
        return view('assets.index', compact('assets'));
    }

    // Tampilan Detail Aset
    public function showWeb($id)
    {
        $asset = Asset::with(['category', 'user', 'images', 'reviews'])->findOrFail($id);
        return view('assets.show', compact('asset'));
    }

    // Simulasi Aksi Beli Aset 
    public function buyWeb($id)
    {
        $asset = Asset::findOrFail($id);
        return redirect('/katalog/' . $id)->with('success', 'Aset ' . $asset->title . ' berhasil ditambahkan ke pesanan!');
    }
}
