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
        $request->validate([
            'kode_barcode' => 'required|string|max:50|unique:inventory,kode_barcode',
        ]);

        Inventory::create([
            'kode_barcode' => $request->kode_barcode,
            'nama_barang' => 'Barang Baru',  // Sesuaikan nama barang sesuai kebutuhan
            'kategori_barang' => 'Kategori Baru',  // Sesuaikan kategori barang
        ]);

        return response()->json(['message' => 'Data berhasil disimpan!'], 201);
    }
}