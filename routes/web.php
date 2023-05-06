<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware('auth')->group(function () {
//     Route::get('/', function () {
//         return view('home.index');
//     })->name('home');
//     Route::get('picture', function () {
//         return view('picture.index');
//     })->name('picture');
//     Route::get('project', function () {
//         return view('project.index');
//     })->name('project');
// });

Route::get('/', function () {
    return redirect()->route('cekAuth');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/crud.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/ketua.php';
