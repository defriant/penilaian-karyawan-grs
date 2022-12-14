<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PenilaianController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('index');

    Route::post('/login-attempt', [AuthController::class, 'login_attempt']);

    Route::controller(KaryawanController::class)->prefix('karyawan/nilai')->group(function () {
        Route::get('/', 'checkNilai');
        Route::post('/get', 'checkNilaiGet');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::controller(DashboardController::class)->prefix('dashboard')->group(function () {
        Route::get('/', 'dashboard');
        Route::post('/chart-data', 'chartData');
    });

    Route::controller(KaryawanController::class)->prefix('karyawan')->group(function () {
        Route::get('/', 'karyawan');
        Route::get('/get', 'getKaryawan');
        Route::post('/add', 'addKaryawan');
        Route::post('/update', 'updateKaryawan');
        Route::post('/delete', 'deleteKaryawan');
    });

    Route::controller(PenilaianController::class)->prefix('penilaian')->group(function () {
        Route::get('/', 'penilaian');
        Route::post('/get', 'getPenilaian');
        Route::post('/update', 'updatePenilaian');
    });
});
