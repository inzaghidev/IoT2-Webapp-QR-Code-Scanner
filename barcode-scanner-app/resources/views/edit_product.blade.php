@extends('layouts.main')

@section('container')
<main>
    <div class="container mt-4">
        <h1>Edit Data Inventory</h1>

        <form method="POST" action="{{ route('inventory.update', $inventory->id_inventory) }}">
            @csrf
            @method('PUT')
        
            <label for="nama_produk">Nama Produk:</label>
            <input type="text" name="nama_produk" id="nama_produk" value="{{ $inventory->nama_produk }}">
        
            <button type="submit">Update</button>
            <a href="{{ route('inventory.index') }}">Batal</a>
        </form>
    </div>
</main>
@endsection
