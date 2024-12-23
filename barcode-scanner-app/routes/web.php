<?php

use App\Models\Inventory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\InventoryController; // Update namespace
use App\Http\Controllers\Api\InventoryApiController;

Route::get('/', function () {
    return view('index', [
        "title" => "Dashboard"
    ]);
});

Route::get('/dashboard', [InventoryController::class, 'dashboard'])->name('dashboard');
// Route::get('/dashboard', [InventoryController::class, 'dashboard']);

// Route::get('/dashboard', function () {
//     return view('index', [
//         "title" => "Dashboard"
//     ]);
// });

// Perbaiki namespace InventoryController
Route::get('/produk', [InventoryController::class, 'index'])->name('inventory.index');

Route::post('/inventory', [InventoryApiController::class, 'store']); // API untuk menyimpan data
Route::get('/inventory', [InventoryApiController::class, 'index']); // API untuk mendapatkan data

Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit'); // Route untuk halaman edit
Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update'); // Route untuk update data

// Route untuk menghapus produk
Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

Route::get('/scanner', [InventoryController::class, 'scanner'])->name('scanner');