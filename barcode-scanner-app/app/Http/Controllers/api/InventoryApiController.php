<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryApiController extends Controller
{
    // API untuk mendapatkan semua data barang
    public function index()
    {
        $inventory = Inventory::all();
        return response()->json($inventory);
    }

    // API untuk menyimpan data scan barang
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:50',
            'kategori_barang' => 'required|string|max:50',
            'kode_barcode' => 'required|string|unique:inventory,kode_barcode|max:50',
        ]);

        $inventory = Inventory::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan!',
            'data' => $inventory
        ], 201);
    }
}