<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id('id_inventory'); // Primary key (auto-increment)
            $table->string('nama_barang', 50); // Nama barang
            $table->string('kategori_barang', 50); // Kategori barang
            $table->string('kode_barcode', 50); // Kode barcode
            $table->string('img_barcode', 50); // Gambar barcode
            $table->integer('quantity'); // Jumlah barang
            $table->integer('harga_satuan'); // Harga satuan barang
            $table->timestamp('create_date')->useCurrent(); // Waktu pembuatan
            $table->timestamps(); // Kolom created_at dan updated_at (opsional, default Laravel)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
