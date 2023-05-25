<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataPegawaiController;
use App\Http\Controllers\Admin\RuangController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin');
        Route::resource('data-pegawai', DataPegawaiController::class);
        Route::resource('ruang-dosen', RuangController::class);
    });


Auth::routes(['verify' => true]);
