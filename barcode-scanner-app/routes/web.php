<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('index'); // Halaman Dashboard Utama
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('index');
});

Route::get('/produk', function () {
    return view('products');
});

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');

// Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
// Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
// Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
// Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
// Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');
// Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');


// Route::prefix('inventory')->group(function () {
//     Route::get('/', [InventoryController::class, 'index'])->name('inventory.index'); // Halaman daftar produk
//     Route::get('/create', [InventoryController::class, 'create'])->name('inventory.create'); // Halaman tambah produk
//     Route::post('/', [InventoryController::class, 'store'])->name('inventory.store'); // Proses tambah produk
//     Route::get('/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit'); // Halaman edit produk
//     Route::put('/{id}', [InventoryController::class, 'update'])->name('inventory.update'); // Proses update produk
//     Route::delete('/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy'); // Hapus produk
// });