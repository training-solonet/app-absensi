<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\AbsensiController;
=======
use App\Http\Controllers\AnggotaController;
>>>>>>> d2c22ee0f447ae91bea25128e642e24886c07421

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
