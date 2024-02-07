<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/products",[App\Http\Controllers\Api\ProductController::class, 'index']);
Route::post("/products/new/store",[App\Http\Controllers\Api\ProductController::class, 'store'])->name('product.store');


Route::middleware('auth')->group(function () {


    // Route::get("/categories",[App\Http\Controllers\Api\CategoryController::class, 'index'])->name('category.index');
    // Route::get("/categories/new",[App\Http\Controllers\Api\CategoryController::class, 'create'])->name('category.create');
    // Route::post("/categories/new/store",[App\Http\Controllers\Api\CategoryController::class, 'store'])->name('category.store');
    // Route::get("/categories/{id}/show",[App\Http\Controllers\Api\CategoryController::class, 'show'])->name('category.show');
    // Route::get("/categories/{id}/edit",[App\Http\Controllers\Api\CategoryController::class, 'edit'])->name('category.edit');
    // Route::post("/categories/{id}/edit/store",[App\Http\Controllers\Api\CategoryController::class, 'update'])->name('category.update');
    // Route::get("/categories/{id}/delete",[App\Http\Controllers\Api\CategoryController::class, 'destroy'])->name('category.delete');

    // Route::get("/products",[App\Http\Controllers\Api\ProductController::class, 'index'])->name('product.index');
    // Route::get("/products/new",[App\Http\Controllers\Api\ProductController::class, 'create'])->name('product.create');
    // Route::post("/products/new/store",[App\Http\Controllers\Api\ProductController::class, 'store'])->name('product.store');
    // Route::get("/products/{id}/edit",[App\Http\Controllers\Api\ProductController::class, 'edit'])->name('product.edit');
    // Route::post("/products/{id}/edit/store",[App\Http\Controllers\Api\ProductController::class, 'update'])->name('product.update');
    // Route::get("/products/{id}/details",[App\Http\Controllers\Api\ProductController::class, 'show'])->name('product.show');
    // Route::get("/products/{id}/delete",[App\Http\Controllers\Api\ProductController::class, 'destroy'])->name('product.delete');


    
});
