<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth', 'role:ADMIN')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');
    // route surat
    Route::get('/surat', function () {
        return view('admin.surat.index');
    })->name('admin.surat');
    // route surat masuk
    Route::get('/surat_masuk', function () {
        return view('admin.surat_masuk.index');
    })->name('admin.surat_masuk');
    // route surat keluar
    Route::get('/surat_keluar', function () {
        return view('admin.surat_keluar.index');
    })->name('admin.surat_keluar');
});
