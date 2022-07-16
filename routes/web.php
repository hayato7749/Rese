<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ShopController::class, 'index'])->name('index');
Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('shop.detail');
Route::get('/search', [ShopController::class, 'search']);
Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');
Route::post('/like/{id}',[LikeController::class,'like'])->name('like');
Route::post('/unlike/{id}',[LikeController::class,'unlike'])->name('unlike');
Route::post('/reservation/{id}',[ReservationController::class,'reservation'])->name('reservation');
Route::post('/reservation/delete/{id}',[ReservationController::class,'delete'])->name('reservation.delete');
require __DIR__.'/auth.php';
