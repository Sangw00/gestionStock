<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();


Route::middleware('auth')->group(function () {


    Route::get("/categories",[App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    Route::get("/categories/new",[App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post("/categories/new/store",[App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::get("/categories/{id}/show",[App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
    Route::get("/categories/{id}/edit",[App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::post("/categories/{id}/edit/store",[App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::get("/categories/{id}/delete",[App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');

    Route::get("/products",[App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::get("/products/new",[App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post("/products/new/store",[App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get("/products/{id}/edit",[App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::post("/products/{id}/edit/store",[App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::get("/products/{id}/details",[App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

    
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
