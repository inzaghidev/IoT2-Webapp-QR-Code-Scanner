@extends('layouts.main')

@section('container')
<h1>Hapus Produk</h1>

<p>Apakah Anda yakin ingin menghapus produk: <strong>{{ $inventory->nama_barang }}</strong>?</p>

<form action="{{ route('inventory.destroy', $inventory->id_inventory) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit">Ya</button>
    <a href="{{ route('inventory.index') }}">Tidak</a>
</form>
@endsection
