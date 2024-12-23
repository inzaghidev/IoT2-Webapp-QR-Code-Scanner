@extends('layouts.main')

@section('container')
<h1>Update Produk</h1>

<form action="{{ route('inventory.update', $inventory->id_inventory) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nama_barang">Nama Barang:</label>
    <input type="text" id="nama_barang" name="nama_barang" value="{{ $inventory->nama_barang }}" required><br><br>

    <label for="kategori_barang">Kategori Barang:</label>
    <input type="text" id="kategori_barang" name="kategori_barang" value="{{ $inventory->kategori_barang }}" required><br><br>

    <label for="kode_barcode">Kode Barcode:</label>
    <input type="text" id="kode_barcode" name="kode_barcode" value="{{ $inventory->kode_barcode }}" required><br><br>

    <button type="submit">Update</button>
    <a href="{{ route('inventory.index') }}">Batal</a>
</form>
@endsection
