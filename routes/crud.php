<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUD\ProjectController;
use App\Http\Controllers\CRUD\SuratController;
use App\Http\Controllers\CRUD\SuratKeluarController;
use App\Http\Controllers\CRUD\SuratMasukController;

Route::prefix('crud')->group(function () {
    // route resources
    Route::resources([
        'surat' => SuratController::class,
        'surat_masuk' => SuratMasukController::class,
        'surat_keluar' => SuratKeluarController::class,
    ]);
});
