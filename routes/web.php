<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomepageController::class,'index'])->name('home');
Route::get('about',[HomepageController::class,'about'])->name('about');
Route::get('auth',[HomepageController::class,'auth'])->name('login');
Route::post('login',[AuthController::class,'login'])->name('verify.login');
Route::post('register',[AuthController::class,'registrasi'])->name('register');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');

        Route::prefix('users')->name('user.')->group(function () {            
            Route::get('admin',[AdminController::class,'users'])->name('admin');
            Route::get('staff',[AdminController::class,'users'])->name('staff');
        });

        Route::prefix('kalibrasi')->name('kalibrasi.')->group(function () {
            Route::get('merk-alat', [AdminController::class,'merkAlat'])->name('merk.alat');
            Route::get('alat', [AdminController::class,'alat'])->name('alat');
            Route::get('tempat-waktu', [AdminController::class,'tempatWaktu'])->name('tempat.waktu');
            Route::get('input', [UserController::class,'kalibrasi'])->name('input');
        });

        Route::get('perusahaan', [AdminController::class,'perusahaan'])->name('perusahaan');
    });

    Route::prefix('staff')->name('staff.')->group(function () {
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::get('kalibrasi',[UserController::class,'kalibrasi'])->name('kalibrasi');
    });
});
