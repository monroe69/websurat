<?php

use App\Http\Controllers\API\PictureApi;
use App\Http\Controllers\API\ProjectApi;
use App\Http\Controllers\API\SuratKeluarApi;
use App\Http\Controllers\API\SuratMasukApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('surat_masuk', [SuratMasukApi::class, 'index'])->name('api.surat_masuk.index');
Route::get('surat_keluar', [SuratKeluarApi::class, 'index'])->name('api.surat_keluar.index');
