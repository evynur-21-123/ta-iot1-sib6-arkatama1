<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // Mendapatkan semua data
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    // Menambah data baru
    public function store(Request $request)
    {
        $item = Item::create($request->all());
        return response()->json($item, 201);
    }

    // Mendapatkan data berdasarkan ID
    public function show($id)
    {
        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(['error' => 'Data not found'], 404);
        }
        return response()->json($item);
    }

    // Mengupdate data berdasarkan ID
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(['error' => 'Data not found'], 404);
        }
        $item->update($request->all());
        return response()->json($item);
    }

    // Menghapus data berdasarkan ID
    public function destroy($id)
    {
        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(['error' => 'Data not found'], 404);
        }
        $item->delete();
        return response()->json(['message' => 'Data deleted'], 204);
    }
}
