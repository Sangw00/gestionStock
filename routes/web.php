<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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
    Route::resource('categories',  CategoryController::class,['names' => [
        'index' => 'category.index',
        'show' => 'category.show',
        'create' => 'category.create',
        'edit' => 'category.edit',
        'update' => 'category.update',
        'store' => 'category.store',
        'destroy' => 'category.delete',
    ]]);
    Route::resource('products',  ProductController::class,['names' => [
        'index' => 'product.index',
        'show' => 'product.show',
        'create' => 'product.create',
        'edit' => 'product.edit',
        'update' => 'product.update',
        'store' => 'product.store',
        'destroy' => 'product.delete',
    ]]);

    
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
