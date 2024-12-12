<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InventoryApiController;

// Routing API untuk IoT QR Code Scanner
Route::post('/scan', [InventoryApiController::class, 'store'])->name('api.scan.store'); // Endpoint untuk menyimpan data QR Code
Route::get('/inventory', [InventoryApiController::class, 'index'])->name('api.inventory.index'); // Endpoint untuk mengambil semua data inventaris