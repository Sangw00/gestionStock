<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
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

//Route::get("/products",[App\Http\Controllers\Api\ProductController::class, 'index']);
// Route::post("/products/new/store",[App\Http\Controllers\Api\ProductController::class, 'store']);
// Route::get("/products/{id}/show",[App\Http\Controllers\Api\ProductController::class, 'show']);
// Route::put("/products/{id}/edit/update",[App\Http\Controllers\Api\ProductController::class, 'update']);
// Route::delete("/products/{id}/delete",[App\Http\Controllers\Api\ProductController::class, 'destroy']);

// Route::get("/categories",[App\Http\Controllers\Api\CategoryController::class, 'index']);
//     Route::post("/categories/new/store",[App\Http\Controllers\Api\CategoryController::class, 'store']);
//     Route::get("/categories/{id}/show",[App\Http\Controllers\Api\CategoryController::class, 'show']);
//     Route::put("/categories/{id}/edit/update",[App\Http\Controllers\Api\CategoryController::class, 'update']);
//     Route::delete("/categories/{id}/delete",[App\Http\Controllers\Api\CategoryController::class, 'destroy']);


Route::post('/register', [RegisterController::class, 'create']);
Route::post('/login', [LoginController::class, 'login']);
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get("/products",[App\Http\Controllers\Api\ProductController::class, 'index']);
    Route::post("/products/new/store",[App\Http\Controllers\Api\ProductController::class, 'store']);
    Route::get("/products/{id}/show",[App\Http\Controllers\Api\ProductController::class, 'show']);
    Route::post("/products/{id}/edit/update",[App\Http\Controllers\Api\ProductController::class, 'update']);
    Route::delete("/products/{id}/delete",[App\Http\Controllers\Api\ProductController::class, 'destroy']);
    
    Route::get("/categories",[App\Http\Controllers\Api\CategoryController::class, 'index']);
    Route::post("/categories/new/store",[App\Http\Controllers\Api\CategoryController::class, 'store']);
    Route::get("/categories/{id}/show",[App\Http\Controllers\Api\CategoryController::class, 'show']);
    Route::post("/categories/{id}/edit/store",[App\Http\Controllers\Api\CategoryController::class, 'update']);
    Route::delete("/categories/{id}/delete",[App\Http\Controllers\Api\CategoryController::class, 'destroy']);

});
