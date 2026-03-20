<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get("/", [IndexController::class, 'index'])->name('index');
Route::get("/prueba/{id}", [IndexController::class, 'prueba'])->name('prueba');
Route::get("/information/{id}/product",[IndexController::class, 'details'])->name('product.details');
