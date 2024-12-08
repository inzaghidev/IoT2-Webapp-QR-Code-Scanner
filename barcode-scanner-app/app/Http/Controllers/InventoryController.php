<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InventoryController extends Controller
{
    // Tampilkan daftar barang (Read)
    public function index()
    {
        $inventory = Inventory::all();
        return view('inventory.index', compact('inventory'));
    }

    // Tampilkan form tambah barang (Create)
    public function create()
    {
        return view('inventory.create');
    }

    // Simpan barang ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:50',
            'kategori_barang' => 'required|string|max:50',
            'kode_barcode' => 'required|string|unique:inventory,kode_barcode|max:50',
            'img_barcode' => 'nullable|string|max:50',
            'quantity' => 'required|integer',
            'harga_satuan' => 'required|integer',
        ]);

        Inventory::create($validatedData);

        return redirect()->route('inventory.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    // Tampilkan form edit barang
    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventory.edit', compact('inventory'));
    }

    // Update barang di database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:50',
            'kategori_barang' => 'required|string|max:50',
            'kode_barcode' => 'required|string|max:50',
            'img_barcode' => 'nullable|string|max:50',
            'quantity' => 'required|integer',
            'harga_satuan' => 'required|integer',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->update($validatedData);

        return redirect()->route('inventory.index')->with('success', 'Barang berhasil diperbarui!');
    }

    // Hapus barang dari database
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'Barang berhasil dihapus!');
    }
}
