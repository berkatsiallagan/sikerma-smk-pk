<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PengajuanKerjasamaController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\MitraController;

// Public routes
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::view('/login', 'login')->name('login');
Route::get('/kerjasama', [LandingController::class, 'kerjasama'])->name('kerjasama');
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');

// Authentication routes
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Password reset routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Pengajuan kerjasama (public)
Route::get('/pengajuan-kerjasama', [PengajuanKerjasamaController::class, 'create'])->name('pengajuan-kerjasama.create');
Route::post('/pengajuan-kerjasama', [PengajuanKerjasamaController::class, 'store'])->name('pengajuan-kerjasama.store');

// Status route
Route::get('/status', [StatusController::class, 'index'])->name('status');

// Admin protected routes
Route::middleware([\App\Http\Middleware\AdminAuthMiddleware::class])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Views
    Route::view('/namamitra', 'namamitra')->name('namamitra');
    Route::view('/namajurusan', 'namajurusan')->name('namajurusan');
    Route::view('/progressAjuan', 'progressAjuan')->name('progressAjuan');

    // Jurusan management
    Route::get('/kelola-jurusan', [JurusanController::class, 'index']);
    Route::get('/kelola-jurusan/create', [JurusanController::class, 'create']);
    Route::post('/kelola-jurusan', [JurusanController::class, 'store']);
    Route::get('/kelola-jurusan/{id_jurusan}/edit', [JurusanController::class, 'edit']);
    Route::put('/kelola-jurusan/{id_jurusan}', [JurusanController::class, 'update']);
    Route::delete('/kelola-jurusan/{id_jurusan}', [JurusanController::class, 'destroy']);

    // Bidang management
    Route::get('/kelola-bidang', [BidangController::class, 'index']);
    Route::get('/kelola-bidang/create', [BidangController::class, 'create']);
    Route::post('/kelola-bidang', [BidangController::class, 'store']);
    Route::get('/kelola-bidang/{id_bidang}/edit', [BidangController::class, 'edit']);
    Route::put('/kelola-bidang/{id_bidang}', [BidangController::class, 'update']);
    Route::delete('/kelola-bidang/{id_bidang}', [BidangController::class, 'destroy']);

    // Mitra management
    Route::get('/kelola-mitra', [MitraController::class, 'index']);
    Route::get('/kelola-mitra/create', [MitraController::class, 'create']);
    Route::post('/kelola-mitra', [MitraController::class, 'store']);
    Route::get('/kelola-mitra/{id_mitra}/edit', [MitraController::class, 'edit']);
    Route::put('/kelola-mitra/{id_mitra}', [MitraController::class, 'update']);
    Route::delete('/kelola-mitra/{id_mitra}', [MitraController::class, 'destroy']);

    // Kerjasama data
    Route::get('/data-kerjasama', [DataController::class, 'index'])->name('data-kerjasama');
    Route::put('/kerjasama/{kerjasama}', [KerjasamaController::class, 'update'])->name('kerjasama.update');
    Route::delete('/kerjasama/{kerjasama}', [KerjasamaController::class, 'destroy'])->name('kerjasama.destroy');

    // Document management
    Route::get('/arsip-dokumen', [ArsipController::class, 'index'])->name('arsip-dokumen');
    Route::get('/dokumen/download/{id}', [DokumenController::class, 'download'])->name('dokumen.download');
    Route::put('/dokumen/{id}/nonaktifkan', [DokumenController::class, 'nonaktifkan'])->name('dokumen.nonaktifkan');
});

// Route untuk landing page
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/kerjasama', [LandingController::class, 'kerjasama'])->name('kerjasama');
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');