<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PortController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'halaman_login')->name('HalamanLogin');
        Route::post('/proses-login', 'proses_login')->name('ProsesLogin');
    });
});

Route::middleware(['auth'])->group(function () {
    // Logout
    Route::get('proses-logout', [LoginController::class, 'proses_logout'])->name('ProsesLogout');

    // Manajemen Port
    Route::get('halaman-port', [PortController::class, 'fn_port'])->name('HalamanManajemenPort');
    Route::post('proses-tambah-port', [PortController::class, 'fn_proses_tambah_port'])->name('ProsesTambahPort');
    Route::get('data-port/{id}', [PortController::class, 'fn_data_port']);
});
