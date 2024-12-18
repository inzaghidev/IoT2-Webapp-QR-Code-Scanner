<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $inventory = Inventory::all();  // Ambil semua data produk
        $title = "Daftar Produk"; // Tambahkan variabel title
    
        return view('products', compact('inventory', 'title'));
    }

    // Menampilkan halaman dashboard
    public function dashboard()
    {
        // Hitung total barang
        $total_barang = Inventory::count();
    
        // Hitung total kategori unik
        $total_kategori = Inventory::distinct('kategori_barang')->count('kategori_barang');
    
        // Kirim data ke view
        return view('index', compact('total_barang', 'total_kategori'));
    }

    // Halaman untuk menambah produk baru
    public function create()
    {
        return view('create_product');
    }

    // Proses penyimpanan produk baru
    public function store(Request $request)
    {
        // Validasi input untuk memastikan data barcode ada
        $request->validate([
            'kode_barcode' => 'required|string|unique:inventory,kode_barcode|max:50',
            'nama_barang' => 'required|string|max:50',
            'kategori_barang' => 'required|string|max:50',
        ]);

        // Menambahkan data ke dalam database
        $inventory = Inventory::create([
            'kode_barcode' => $request->kode_barcode,
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => $request->kategori_barang,
        ]);

        return response()->json([
            'message' => 'Data berhasil disimpan!',
            'data' => $inventory
        ], 201);
    }

    // Halaman untuk mengedit produk
    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id); // Ambil satu record berdasarkan ID
    
        return view('inventory.edit', compact('inventory')); // Kirim data produk ke view
    }

    // Menyimpan data yang diubah
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->kategori_barang = $request->input('kategori_barang');
        $inventory->jumlah = $request->input('jumlah');
        $inventory->save();

        return redirect()->route('dashboard')->with('success', 'Data berhasil diubah!');
    }

    // Proses menghapus produk
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
    
        return redirect()->route('inventory.index')->with('success', 'Produk berhasil dihapus!');
    }
}
