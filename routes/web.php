<?php

use App\Http\Controllers\PengajuanController;


Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/arsip', 'arsip')->name('arsip');
Route::view('/arsipPengajuan', 'arsipPengajuan')->name('arsipPengajuan');
Route::get('/inputajuan1', [PengajuanController::class, 'showStep1'])->name('show.step1');
Route::post('/save-step1', [PengajuanController::class, 'saveStep1'])->name('save.step1');
Route::get('/inputajuan2', [PengajuanController::class, 'showStep2'])->name('show.step2');
Route::post('/save-step2', [PengajuanController::class, 'saveStep2'])->name('save.step2');
Route::get('/inputajuan3', [PengajuanController::class, 'showStep3'])->name('show.step3');
Route::post('/save-step3', [PengajuanController::class, 'saveStep3'])->name('save.step3');
Route::view('/datapengajuan', 'datapengajuan')->name('datapengajuan');
Route::view('/namamitra', 'namamitra')->name('namamitra');
Route::view('/namajurusan', 'namajurusan')->name('namajurusan');
Route::view('/progressAjuan', 'progressAjuan')->name('progressAjuan');
Route::view('/login', 'login')->name('login');

use App\Http\Controllers\StatusController;

Route::get('/status', [StatusController::class, 'index'])->name('status');