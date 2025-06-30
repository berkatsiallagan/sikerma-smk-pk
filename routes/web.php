<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DashboardController;


Route::view('/', 'welcome')->name('home');
Route::middleware([\App\Http\Middleware\AdminAuthMiddleware::class])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');   

    // Route::view('/data-kerjasama', 'data-kerjasama')->name('data-kerjasama'); // duplicate with controller route
    Route::view('/namamitra', 'namamitra')->name('namamitra');
    Route::view('/namajurusan', 'namajurusan')->name('namajurusan');
    Route::view('/progressAjuan', 'progressAjuan')->name('progressAjuan');
    // Route::view('/kelola-jurusan', 'kelola-jurusan')->name('kelola-jurusan'); // duplicate with controller route
});
Route::view('/login', 'login')->name('login');
Route::view('/kerjasama', 'kerjasama')->name('kerjasama');
Route::view('/contact', 'contact')->name('contact');


use App\Http\Controllers\StatusController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/status', [StatusController::class, 'index'])->name('status');

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PengajuanKerjasamaController;

Route::middleware([\App\Http\Middleware\AdminAuthMiddleware::class])->group(function () {
    Route::get('/kelola-jurusan', [JurusanController::class, 'index']);
    Route::get('/kelola-jurusan/create', [JurusanController::class, 'create']);
    Route::post('/kelola-jurusan', [JurusanController::class, 'store']);
    Route::get('/kelola-jurusan/{id_jurusan}/edit', [JurusanController::class, 'edit']);
    Route::put('/kelola-jurusan/{id_jurusan}', [JurusanController::class, 'update']);
    Route::delete('/kelola-jurusan/{id_jurusan}', [JurusanController::class, 'destroy']);

    Route::get('/kelola-bidang', [BidangController::class, 'index']);
    Route::get('/kelola-bidang/create', [BidangController::class, 'create']);
    Route::post('/kelola-bidang', [BidangController::class, 'store']);
    Route::get('/kelola-bidang/{id_bidang}/edit', [BidangController::class, 'edit']);
    Route::put('/kelola-bidang/{id_bidang}', [BidangController::class, 'update']);
    Route::delete('/kelola-bidang/{id_bidang}', [BidangController::class, 'destroy']);

    // Kelola Mitra
    Route::get('/kelola-mitra', [\App\Http\Controllers\MitraController::class, 'index']);
    Route::get('/kelola-mitra/create', [\App\Http\Controllers\MitraController::class, 'create']);
    Route::post('/kelola-mitra', [\App\Http\Controllers\MitraController::class, 'store']);
    Route::get('/kelola-mitra/{id_mitra}/edit', [\App\Http\Controllers\MitraController::class, 'edit']);
    Route::put('/kelola-mitra/{id_mitra}', [\App\Http\Controllers\MitraController::class, 'update']);
    Route::delete('/kelola-mitra/{id_mitra}', [\App\Http\Controllers\MitraController::class, 'destroy']);

    Route::get('/data-kerjasama', [DataController::class, 'index'])->name('data-kerjasama');

    Route::put('/kerjasama/{kerjasama}', [KerjasamaController::class, 'update'])->name('kerjasama.update');
    Route::delete('/kerjasama/{kerjasama}', [KerjasamaController::class, 'destroy'])->name('kerjasama.destroy');

    Route::get('/arsip-dokumen', [ArsipController::class, 'index'])->name('arsip-dokumen');

    Route::get('/dokumen/download/{id}', [DokumenController::class, 'download'])->name('dokumen.download');
    Route::put('/dokumen/{id}/nonaktifkan', [DokumenController::class, 'nonaktifkan'])->name('dokumen.nonaktifkan');
});

use Illuminate\Support\Facades\Password;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

use App\Http\Controllers\ResetPasswordController;

// Menampilkan form reset password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Menangani submit form reset password
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Form pengajuan kerjasama (dapat diakses tanpa login)
Route::get('/pengajuan-kerjasama', [PengajuanKerjasamaController::class, 'create'])->name('pengajuan-kerjasama.create');
Route::post('/pengajuan-kerjasama', [PengajuanKerjasamaController::class, 'store'])->name('pengajuan-kerjasama.store');
