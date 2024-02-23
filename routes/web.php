<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UidController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [DashboardController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi')
    ->name('absensi.index')
    ->middleware('web');

Route::controller(AuthController::class)->group(function () {  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('customlogout', 'logout')->middleware('auth')->name('customlogout');
  
    Route::get('logout', 'logout', function () {
        return view('login');
    })->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {

    Route::resources([
        'siswa' => StudentController::class,
        'uid' => UidController::class,
        
    ]);
});
