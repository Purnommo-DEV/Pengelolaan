<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PerusahaanController;
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
    Route::controller(PortController::class)->group(function () {
        Route::get('halaman-port', 'fn_port')->name('HalamanManajemenPort');
        Route::post('proses-submit-port', 'fn_proses_submit_port')->name('ProsesSubmitPort');
        Route::get('data-port/{id}', 'fn_data_port');
    });

    //Manajemen Perusahaan
    Route::controller(PerusahaanController::class)->group(function () {
        Route::get('halaman-perusahaan', 'fn_perusahaan')->name('HalamanManajemenPerusahaan');
        Route::post('proses-tambah-perusahaan', 'fn_proses_tambah_perusahaan')->name('ProsesTambahPerusahaan');
        Route::get('data-perusahaan/{id}', 'fn_data_perusahaan');
        Route::get('hapus-data-perusahaan/{id}', 'fn_hapus_data_perusahaan');
    });
});
