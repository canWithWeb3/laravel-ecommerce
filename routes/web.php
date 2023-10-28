<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
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
});

Route::prefix('/')->controller(AuthController::class)->group(function(){
    Route::get('/kayit-ol', 'getRegister')->middleware('not_auth');
    Route::post('/kayit-ol', 'postRegister')->middleware('not_auth');
    Route::get('/giris-yap', 'getLogin')->middleware('not_auth');
    Route::post('/giris-yap', 'postLogin')->middleware('not_auth');
    Route::post('/cikis-yap', 'postLogout')->middleware('auth');
});
