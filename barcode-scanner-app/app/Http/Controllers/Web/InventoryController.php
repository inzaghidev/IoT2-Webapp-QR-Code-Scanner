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
        $inventory = Inventory::all();
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
        $request->validate([
            'nama_barang' => 'required|string|max:50',
            'kategori_barang' => 'required|string|max:50',
            'kode_barcode' => 'required|string|unique:inventory,kode_barcode|max:50',
        ]);

        Inventory::create($request->all());

        return redirect()->route('inventory.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Halaman untuk mengedit produk
    public function edit($id)
    {
        // Cari data berdasarkan ID
        $product = Inventory::findOrFail($id);

        // Kirim data ke view edit_product
        return view('edit_product', compact('product'));
    }

    // Proses update produk
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:50',
            'kategori_barang' => 'required|string|max:50',
            'kode_barcode' => 'required|string|max:50|unique:inventory,kode_barcode,'.$id.',id_inventory',
        ]);
    
        // Update data produk
        $product = Inventory::findOrFail($id);
        $product->update($request->all());
    
        return redirect()->route('inventory.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Proses menghapus produk
    public function destroy($id)
    {
        // Cari produk berdasarkan ID dan hapus
        $product = Inventory::findOrFail($id);
        $product->delete();
    
        // Redirect kembali ke halaman produk dengan pesan sukses
        return redirect()->route('inventory.index')->with('success', 'Produk berhasil dihapus!');
    }
}
