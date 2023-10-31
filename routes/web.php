<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

Route::prefix('/')->controller(PageController::class)->group(function(){
    Route::get('/', 'getHome');
    Route::get('/urun-detay/{id}', 'getProductDetail');
    Route::post('/addToCart/{id}', 'addToCart');
});

Route::prefix('/')->controller(AuthController::class)->group(function(){
    Route::get('/kayit-ol', 'getRegister')->middleware('not_auth');
    Route::post('/kayit-ol', 'postRegister')->middleware('not_auth');
    Route::get('/giris-yap', 'getLogin')->middleware('not_auth');
    Route::post('/giris-yap', 'postLogin')->middleware('not_auth');
    Route::post('/cikis-yap', 'postLogout')->middleware('auth');
});

Route::prefix('/admin')->middleware('admin')->group(function(){
    Route::get('/', [AdminController::class, 'getDashboard']);
    Route::resource('/kategoriler', CategoryController::class);
    Route::resource('/urunler', ProductController::class);
});