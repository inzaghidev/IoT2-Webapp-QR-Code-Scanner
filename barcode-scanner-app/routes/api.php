<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InventoryApiController;

// API untuk menyimpan data scan barang
Route::post('/scan', [InventoryApiController::class, 'store']);

// API untuk mendapatkan semua data barang
Route::get('/inventory', [InventoryApiController::class, 'index']);