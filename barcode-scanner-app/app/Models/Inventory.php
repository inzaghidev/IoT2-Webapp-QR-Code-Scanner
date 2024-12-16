<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'inventory';

    // Kolom-kolom yang dapat diisi melalui Mass Assignment
    protected $fillable = [
        'nama_barang',
        'kategori_barang',
        'kode_barcode',
    ];

    // Jika primary key tidak menggunakan `id`, bisa disesuaikan
    protected $primaryKey = 'id_inventory';
}
