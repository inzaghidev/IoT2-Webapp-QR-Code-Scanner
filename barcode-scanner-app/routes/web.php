<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('index');
// });

// Route::resource('inventory', InventoryController::class);
