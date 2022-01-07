<?php

use App\Http\Controllers\Operator\DashboardController as Home;
use App\Http\Controllers\Operator\SettingController as Settings;
use App\Http\Controllers\Auth\Operator\LoginController as AuthLogin;
use App\Http\Controllers\Auth\Operator\LogoutController as AuthLogout;
use App\Http\Controllers\Operator\BookController;
use App\Http\Controllers\Operator\KatagoriController;
use App\Http\Controllers\Operator\PeminjamanController;
use App\Http\Controllers\Operator\PengembalianController;
use Illuminate\Support\Facades\Route;

$root = getDomain(config('app.url'));
$param = 'perpustakaan';

Route::group([
    'domain' => 'operator.' . $root,
    'prefix' => $param,
], function () {

    //Input Buku
    Route::get('/book', [BookController::class, 'index'])->name('operator.buku');
    Route::post('/book', [BookController::class, 'storebuku'])->name('operator.buku.store');
    Route::post('/book/edit/{id}', [BookController::class, 'editbuku'])->name('operator.buku.edit');
    Route::post('/book/update/{id}', [BookController::class, 'updatebuku'])->name('operator.buku.update');
    Route::delete('/book/destroy/{id}', [BookController::class, 'destroybuku'])->name('operator.buku.destroy');
    //Katagori
    Route::get('/katagori', [KatagoriController::class, 'index'])->name('operator.katagori');
    Route::post('/katagori', [KatagoriController::class, 'storekatagori'])->name('operator.katagori.store');
    Route::post('/katagori/edit/{id}', [KatagoriController::class, 'editkatagori'])->name('operator.katagori.edit');
    Route::post('/katagori/update/{id}', [KatagoriController::class, 'updatekatagori'])->name('operator.katagori.update');
    Route::delete('/katagori/destroy/{id}', [KatagoriController::class, 'destroykatagori'])->name('operator.katagori.destroy');
    //Peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('operator.peminjaman');
    Route::post('/peminjaman/edit/{id}', [PeminjamanController::class, 'editpeminjaman'])->name('operator.peminjaman.edit');
    Route::post('/peminjaman/update/{id}', [PeminjamanController::class, 'updatepeminjaman'])->name('operator.peminjaman.update');
    Route::delete('/peminjaman/destroy/{id}', [PeminjamanController::class, 'destroypeminjaman'])->name('operator.peminjaman.destroy');
    //Pengembalian
    Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('operator.pengembalian');
    Route::post('/pengembalian/edit/{id}', [PengembalianController::class, 'editpengembalian'])->name('operator.pengembalian.edit');
    Route::post('/pengembalian/update/{id}', [PengembalianController::class, 'updatepengembalian'])->name('operator.pengembalian.update');
    Route::delete('/pengembalian/destroy/{id}', [PengembalianController::class, 'destroypengembalian'])->name('operator.pengembalian.destroy');

    Route::get('login', [AuthLogin::class, 'form'])->name('operator.login.form');
    Route::post('login', [AuthLogin::class, 'login'])->name('operator.login.post');
    Route::post('logout', [AuthLogout::class, 'logout'])->name('operator.logout');

    Route::get('/', [Home::class, 'index'])->name('operator.dashboard');

    // Route::get('/account/settings', [Settings::class, 'edit'])->name('admin.edit.form');
    // Route::post('/account/settings', [Settings::class, 'update'])->name('admin.edit');
});
