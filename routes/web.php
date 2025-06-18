<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DashboardController;


Route::view('/', 'welcome')->name('home');
Route::middleware([\App\Http\Middleware\AdminAuthMiddleware::class])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');   

    Route::view('/data-kerjasama', 'data-kerjasama')->name('data-kerjasama');
    Route::view('/namamitra', 'namamitra')->name('namamitra');
    Route::view('/namajurusan', 'namajurusan')->name('namajurusan');
    Route::view('/progressAjuan', 'progressAjuan')->name('progressAjuan');
    Route::view('/kelola-jurusan', 'kelola-jurusan')->name('kelola-jurusan');
});
Route::view('/login', 'login')->name('login');
Route::get('/kerjasama', [\App\Http\Controllers\KerjasamaController::class, 'index'])->name('kerjasama');
Route::view('/contact', 'contact')->name('contact');


use App\Http\Controllers\StatusController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/status', [StatusController::class, 'index'])->name('status');

use App\Http\Controllers\JurusanController;

Route::get('/kelola-jurusan', [JurusanController::class, 'index']);
Route::get('/kelola-jurusan/create', [JurusanController::class, 'create']);
Route::post('/kelola-jurusan', [JurusanController::class, 'store']);
Route::get('/kelola-jurusan/{id_jurusan}/edit', [JurusanController::class, 'edit']);
Route::put('/kelola-jurusan/{id_jurusan}', [JurusanController::class, 'update']);
Route::delete('/kelola-jurusan/{id_jurusan}', [JurusanController::class, 'destroy']);

use App\Http\Controllers\KerjasamaController;

Route::delete('/kerjasama/{kerjasama}', [KerjasamaController::class, 'destroy'])->name('kerjasama.destroy');

use App\Http\Controllers\ArsipController;

Route::get('/arsip-dokumen', [ArsipController::class, 'index'])->name('arsip-dokumen');

use App\Http\Controllers\DokumenController;

Route::get('/dokumen/download/{id}', [DokumenController::class, 'download'])->name('dokumen.download');

use App\Http\Controllers\DataController;
use App\Http\Controllers\PengajuanKerjasamaController;

Route::get('/data-kerjasama', [DataController::class, 'index'])->name('data-kerjasama');

Route::get('/pengajuan-kerjasama', [PengajuanKerjasamaController::class, 'create'])->name('pengajuan-kerjasama.create');
Route::post('/pengajuan-kerjasama', [PengajuanKerjasamaController::class, 'store'])->name('pengajuan-kerjasama.store');
