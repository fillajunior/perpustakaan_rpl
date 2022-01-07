<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/book/show/{id}',[HomeController::class,'getdatabuku']);
//Checkout
Route::get('/checkout',[CheckoutController::class,'index'])->name('user.checkout');
Route::post('/checkout',[CheckoutController::class,'storecheckout'])->name('user.checkout.store');
//Peminjaman
Route::get('/peminjaman',[PeminjamanController::class,'index'])->name('user.peminjaman');
Route::post('/peminjaman',[PeminjamanController::class,'storepeminjaman'])->name('user.peminjaman.store');
Route::post('/peminjaman/show/{id}',[PeminjamanController::class,'showpeminjaman'])->name('user.peminjaman.show');
//Pengembalian
Route::get('/pengembalian',[PengembalianController::class,'index'])->name('user.pengembalian');
//Profile
Route::get('/profile',[ProfileController::class,'index'])->name('user.profile');

