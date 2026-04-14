<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Models\Category;

Route::get("/", [IndexController::class, 'index'])->name('index');
Route::get("/prueba/{id}", [IndexController::class, 'prueba'])->name('prueba');
Route::get("/information/{id}/product",[IndexController::class, 'details'])->name('product.details');
Route::get("/product/create",[IndexController::class, 'create'])->name("products.create");
Route::get("/categories",[CategoryController::class,'index'])->name('category.index');
Route::post("/product/store", [IndexController::class, 'store'])->name("products.store");
Route::get("/category/create",[CategoryController::class,'create'])->name("category.create");
Route::post("/category/store", [CategoryController::class,'store'])->name('category.store');
Route::get("/product/{id}/edit", [IndexController::class, 'edit'])->name('product.edit');
Route::put("/product/{id}/edit", [IndexController::class, 'update'])->name('product.update');
Route::get("/category/{id}/edit", [CategoryController::class, 'edit'])->name('Category.edit');
Route::put("/category/{id}/edit", [CategoryController::class, 'update'])->name('Category.update');
Route::delete('/product/{id}/delete', [IndexController::class, 'delete'])->name('product.delete');


Route::get("/login", [AuthController::class, 'index'])->name('login');
Route::post("/login", [AuthController::class, 'login'])->name('iniciar_sesion');