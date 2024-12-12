@extends('layouts.main')

@section('content')
<h1>Daftar Produk</h1>
<table>
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Barcode</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inventory as $item)
        <tr>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->kategori_barang }}</td>
            <td>{{ $item->kode_barcode }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->harga_satuan }}</td>
            <td>
                <a href="{{ route('inventory.edit', $item->id_inventory) }}">Edit</a>
                <form action="{{ route('inventory.destroy', $item->id_inventory) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
