<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PenggunaController;
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
        Route::get('/', 'halaman_login')->name('HalamanLogin');
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
        Route::get('halaman-perusahaan', 'fn_perusahaan')->name('ManajemenPerusahaan.HalamanManajemenPerusahaan');
        Route::post('proses-tambah-perusahaan', 'fn_proses_tambah_perusahaan')->name('ProsesTambahPerusahaan');
        Route::get('edit-data-perusahaan/{url}', 'fn_edit_data_perusahaan')->name('ManajemenPerusahaan.HalamanManajemenPerusahaan.HalamanEditPerusahaan');
        Route::post('proses-edit-data-perusahaan/{url}', 'fn_proses_edit_data_perusahaan');
        Route::get('hapus-email-data-perusahaan/{email_id}', 'hapus_email_data_perusahaan');
        Route::get('hapus-kargo-data-perusahaan/{kargo_id}', 'hapus_kargo_data_perusahaan');
        Route::get('hapus-data-perusahaan/{id}', 'fn_hapus_data_perusahaan');
    });

    //Manajemen Pengguna
    Route::controller(PenggunaController::class)->group(function () {
        Route::get('halaman-pengguna', 'fn_pengguna')->name('ManajemenPengguna.HalamanUser.User');
        Route::post('proses-tambah-pengguna', 'fn_proses_tambah_pengguna')->name('ProsesTambahPengguna');
        Route::get('data-pengguna/{id}', 'fn_data_pengguna');
        Route::post('proses-edit-pengguna/{id}', 'fn_proses_edit_pengguna')->name('ProsesEditPengguna');
        Route::get('hapus-data-pengguna/{id}', 'fn_hapus_data_pengguna');

        Route::get('halaman-role-pengguna', 'fn_role_pengguna')->name('ManajemenPengguna.HalamanUser.Role');
        Route::post('proses-tambah-role-pengguna', 'fn_proses_tambah_role_pengguna')->name('ProsesTambahRolePengguna');
        Route::get('data-role-pengguna/{id}', 'fn_data_role_pengguna');
        Route::post('proses-edit-role-pengguna/{id}', 'fn_proses_edit_role_pengguna')->name('ProsesEditRolePengguna');
        Route::get('hapus-data-role-pengguna/{id}', 'fn_hapus_data_role_pengguna');
    });
});
