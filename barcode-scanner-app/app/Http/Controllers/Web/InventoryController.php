<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

// class InventoryController extends Controller
// {
//     // Menampilkan halaman dashboard
//     public function dashboard()
//     {
//         // Hitung total barang (jumlah item di tabel inventory)
//         $total_barang = Inventory::sum('quantity'); // Menjumlahkan kolom 'quantity'

//         // Hitung total kategori (kategori unik di tabel inventory)
//         $total_kategori = Inventory::distinct('kategori_barang')->count('kategori_barang'); // Hitung kategori unik

//         // Kirim data ke view dashboard
//         return view('dashboard', compact('total_barang', 'total_kategori'));
//     }

//     // Menampilkan halaman daftar produk
//     public function index()
//     {
//         $inventory = Inventory::all();
//         return view('products', compact('inventory'));
//     }
// }

class InventoryController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $inventory = Inventory::all();
        return view('products', compact('inventory'));
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
            'img_barcode' => 'nullable|string|max:50',
            'quantity' => 'required|integer',
            'harga_satuan' => 'required|integer',
        ]);

        Inventory::create($request->all());

        return redirect()->route('inventory.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Halaman untuk mengedit produk
    public function edit($id)
    {
        $product = Inventory::findOrFail($id);
        return view('edit_product', compact('product'));
    }

    // Proses update produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:50',
            'kategori_barang' => 'required|string|max:50',
            'kode_barcode' => 'required|string|max:50',
            'img_barcode' => 'nullable|string|max:50',
            'quantity' => 'required|integer',
            'harga_satuan' => 'required|integer',
        ]);

        $product = Inventory::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('inventory.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Proses menghapus produk
    public function destroy($id)
    {
        $product = Inventory::findOrFail($id);
        $product->delete();

        return redirect()->route('inventory.index')->with('success', 'Produk berhasil dihapus!');
    }
}
