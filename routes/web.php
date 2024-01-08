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
Route::get("/category",[App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get("/category/new",[App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
