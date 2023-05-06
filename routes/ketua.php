<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CETAK\SuratMasukPdfController;
use App\Http\Controllers\CETAK\SuratKeluarPdfController;

Route::prefix('ketua')->middleware('auth', 'role:KETUA')->group(function () {
    Route::get('/', function () {
        return view('ketua.dashboard.index');
    })->name('ketua.dashboard');
    // route surat masuk
    Route::get('/surat_masuk', function () {
        return view('ketua.surat_masuk.index');
    })->name('ketua.surat_masuk');
    // route surat keluar
    Route::get('/surat_keluar', function () {
        return view('ketua.surat_keluar.index');
    })->name('ketua.surat_keluar');
    // route cetak pdf surat masuk
    Route::get('cetak_surat_masuk_pdf', [SuratMasukPdfController::class, 'index'])->name('cetak_pdf_surat_masuk');
    Route::get('cetak_surat_keluar_pdf', [SuratKeluarPdfController::class, 'index'])->name('cetak_pdf_surat_keluar');
});
