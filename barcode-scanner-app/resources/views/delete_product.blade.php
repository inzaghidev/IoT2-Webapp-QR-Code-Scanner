@extends('layouts.main')

@section('container')
<main>
    <div class="container px-4 py-5">
        <h1 class="mb-4">Hapus Produk</h1>
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Apakah Anda yakin ingin menghapus produk ini?</h3>
                <p>
                    <strong>ID Produk:</strong> {{ $inventory->id_inventory }} <br>
                    <strong>Nama Produk:</strong> {{ $inventory->nama_produk }}
                </p>

                <!-- Form Delete -->
                <form method="POST" action="{{ route('inventory.destroy', $inventory->id_inventory) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus Produk</button>
                    <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Tidak, Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
