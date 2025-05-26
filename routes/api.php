<?php

use App\Http\Controllers\ReenvioEmailComissao;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\VendedorController;
use Illuminate\Support\Facades\Route;

Route::resource('vendedor', VendedorController::class);
Route::resource('venda', VendaController::class);

Route::post('admin/reenviocomissao', ReenvioEmailComissao::class);