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

    // API untuk menyimpan data scan barang
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:50',
            'kategori_barang' => 'required|string|max:50',
            'kode_barcode' => $request->kode_barcode,
            // 'kode_barcode' => 'required|string|max:50|unique:inventory,kode_barcode',
        ]);

        Inventory::create($request->all());

        return response()->json(['message' => 'Data berhasil disimpan!'], 201);
    }
}