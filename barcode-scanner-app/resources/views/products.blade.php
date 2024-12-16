@extends('layouts.main')


@section('content')
    <h1>Daftar Produk</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Kategori Barang</th>
                <th>Kode Barcode</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inventory as $item)
                <tr>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori_barang }}</td>
                    <td>{{ $item->kode_barcode }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->harga_satuan }}</td>
                    <td>
                        <a href="{{ route('inventory.edit', $item->id_inventory) }}">Edit</a>
                        <form action="{{ route('inventory.destroy', $item->id_inventory) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada data produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection