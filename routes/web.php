<?php

use App\Http\Controllers\VendedorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vendedor', VendedorController::class);