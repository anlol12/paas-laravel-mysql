<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('productos.index'));
Route::resource('productos', ProductoController::class)->except(['show']);
