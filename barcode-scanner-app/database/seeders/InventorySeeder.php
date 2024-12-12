<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inventory')->insert([
            [
                'nama_barang' => 'Snack Keripik',
                'kategori_barang' => 'Makanan',
                'kode_barcode' => '111102345651',
                'img_barcode' => '111102345651.png',
                'quantity' => 5,
                'harga_satuan' => 1500,
                'create_date' => '2024-05-01 10:30:00',
            ],
            [
                'nama_barang' => 'Buku Programming',
                'kategori_barang' => 'Buku',
                'kode_barcode' => '111102345652',
                'img_barcode' => '111102345652.png',
                'quantity' => 10,
                'harga_satuan' => 500,
                'create_date' => '2024-05-01 11:00:00',
            ],
            [
                'nama_barang' => 'Minuman Teh Kotak',
                'kategori_barang' => 'Minuman',
                'kode_barcode' => '111102345653',
                'img_barcode' => '111102345653.png',
                'quantity' => 7,
                'harga_satuan' => 7600,
                'create_date' => '2024-05-01 12:15:00',
            ],
            [
                'nama_barang' => 'Sikat Gigi',
                'kategori_barang' => 'Peralatan Mandi',
                'kode_barcode' => '111102345654',
                'img_barcode' => '111102345654.png',
                'quantity' => 10,
                'harga_satuan' => 3400,
                'create_date' => '2024-05-01 13:25:00',
            ],
            [
                'nama_barang' => 'Sabun Cuci Piring',
                'kategori_barang' => 'Alat Kebersihan',
                'kode_barcode' => '111102345656',
                'img_barcode' => '111102345656.png',
                'quantity' => 6,
                'harga_satuan' => 7000,
                'create_date' => '2024-05-01 14:30:00',
            ],
        ]);

        // Anda dapat menambahkan lebih banyak data di sini jika diperlukan
        DB::table('inventory')->insert([
            [
                'nama_barang' => 'Cokelat Manis',
                'kategori_barang' => 'Makanan',
                'kode_barcode' => '111102345657',
                'img_barcode' => '111102345657.png',
                'quantity' => 12,
                'harga_satuan' => 2500,
                'create_date' => '2024-05-02 08:00:00',
            ],
            [
                'nama_barang' => 'Pasta Gigi',
                'kategori_barang' => 'Peralatan Mandi',
                'kode_barcode' => '111102345658',
                'img_barcode' => '111102345658.png',
                'quantity' => 8,
                'harga_satuan' => 6000,
                'create_date' => '2024-05-02 09:15:00',
            ],
        ]);
    }
}

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil InventorySeeder untuk mengisi data ke tabel inventory
        $this->call(InventorySeeder::class);

        // Tambahkan seeder lain di sini jika diperlukan
    }
}
