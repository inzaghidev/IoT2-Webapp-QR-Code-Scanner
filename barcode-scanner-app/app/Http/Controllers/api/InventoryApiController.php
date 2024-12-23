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
        return response()->json(Inventory::all(), 200);
    }

    // API untuk menyimpan data scan barcode
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'kode_barcode' => 'required|string|max:50|unique:inventory,kode_barcode',
            'nama_barang' => 'required|string|max:50',
            'kategori_barang' => 'required|string|max:50',
        ]);

        // Store the data in the database
        $inventory = Inventory::create([
            'kode_barcode' => $request->input('kode_barcode'),
            'nama_barang' => $request->input('nama_barang'),
            'kategori_barang' => $request->input('kategori_barang'),
        ]);

        // Return a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Data successfully saved!',
            'data' => $inventory,
        ], 201);
    }
}