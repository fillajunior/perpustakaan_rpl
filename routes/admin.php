<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Auth\Admin\LogoutController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\KatagoriController;
use App\Http\Controllers\Admin\ManagementOperator;
use App\Http\Controllers\Admin\ManagementUserController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\PengembalianController;
use Illuminate\Support\Facades\Route;

$root = getDomain(config('app.url'));
$param = 'perpustakaan';

Route::group([
    'domain' => 'admin.' . $root,
    'prefix' => $param,
], function () {

    //Input Buku
    Route::get('/book', [BookController::class, 'index'])->name('admin.buku');
    Route::post('/book', [BookController::class, 'storebuku'])->name('admin.buku.store');
    Route::post('/book/edit/{id}', [BookController::class, 'editbuku'])->name('admin.buku.edit');
    Route::post('/book/update/{id}', [BookController::class, 'updatebuku'])->name('admin.buku.update');
    Route::delete('/book/destroy/{id}', [BookController::class, 'destroybuku'])->name('admin.buku.destroy');
    //Katagori
    Route::get('/katagori', [KatagoriController::class, 'index'])->name('admin.katagori');
    Route::post('/katagori', [KatagoriController::class, 'storekatagori'])->name('admin.katagori.store');
    Route::post('/katagori/edit/{id}', [KatagoriController::class, 'editkatagori'])->name('admin.katagori.edit');
    Route::post('/katagori/update/{id}', [KatagoriController::class, 'updatekatagori'])->name('admin.katagori.update');
    Route::delete('/katagori/destroy/{id}', [KatagoriController::class, 'destroykatagori'])->name('admin.katagori.destroy');
    //Operator
    Route::get('/management/operator', [ManagementOperator::class, 'index'])->name('admin.operator');
    Route::post('/management/operator', [ManagementOperator::class, 'storeoperator'])->name('admin.operator.store');
    Route::post('/management/operator/edit/{id}', [ManagementOperator::class, 'editoperator'])->name('admin.operator.edit');
    Route::post('/management/operator/update/{id}', [ManagementOperator::class, 'updateoperator'])->name('admin.operator.update');
    Route::delete('/management/operator/destroy/{id}', [ManagementOperator::class, 'destroyoperator'])->name('admin.operator.destroy');
    //User
    Route::get('/management/user/',[ManagementUserController::class,'index'])->name('admin.user');
    Route::post('/management/user/edit/{id}',[ManagementUserController::class,'edituser'])->name('admin.user.edit');
    Route::delete('/management/user/destroy/{id}',[ManagementUserController::class,'destroyuser'])->name('admin.user.destroy');
    //Peminjaman
    Route::get('/peminjaman',[PeminjamanController::class,'index'])->name('admin.peminjaman');
    Route::post('/peminjaman/edit/{id}',[PeminjamanController::class,'editpeminjaman'])->name('admin.peminjaman.edit');
    Route::post('/peminjaman/update/{id}',[PeminjamanController::class,'updatepeminjaman'])->name('admin.peminjaman.update');
    Route::delete('/peminjaman/destroy/{id}',[PeminjamanController::class,'destroypeminjaman'])->name('admin.peminjaman.destroy');
    //Pengembalian
    Route::get('/pengembalian',[PengembalianController::class,'index'])->name('admin.pengembalian');
    Route::post('/pengembalian/edit/{id}',[PengembalianController::class,'editpengembalian'])->name('admin.pengembalian.edit');
    Route::post('/pengembalian/update/{id}',[PengembalianController::class,'updatepengembalian'])->name('admin.pengembalian.update');
    Route::delete('/pengembalian/destroy/{id}',[PengembalianController::class,'destroypengembalian'])->name('admin.pengembalian.destroy');

    Route::get('login', [LoginController::class, 'form'])->name('admin.login.form');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::post('logout', [LogoutController::class, 'logout'])->name('admin.logout');

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Route::get('/account/settings', [Settings::class, 'edit'])->name('admin.edit.form');
    // Route::post('/account/settings', [Settings::class, 'update'])->name('admin.edit');
});
