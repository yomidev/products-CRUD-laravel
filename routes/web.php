<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get("/", [IndexController::class, 'index'])->name('index');
Route::get("/prueba/{id}", [IndexController::class, 'prueba'])->name('prueba');
Route::get("/information/{id}/product",[IndexController::class, 'details'])->name('product.details');
Route::get("/product/create",[IndexController::class, 'create'])->name("products.create");
Route::get("/categories",[CategoryController::class,'index'])->name('category.index');
Route::post("/product/store", [IndexController::class, 'store'])->name("products.store");
Route::get("/category/create",[CategoryController::class,'create'])->name("category.create");