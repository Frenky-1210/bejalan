<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourguideController;
use App\Http\Controllers\TranslatorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\TerjualController;
use App\Http\Controllers\VerificationController;
use App\Models\Terjual;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/terjual', [TerjualController::class, 'index'])->name('terjual');

Route::get('/tourguide', [TourguideController::class, 'index'])->name('tourguide');

Route::get('/post', [BlogController::class, 'post'])->name('post');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-auth', [LoginController::class, 'login_auth'])->name('login-auth');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');
});

Route::middleware(['auth'])->group( function() {
    Route::get('/email/verify/need-verification', [VerificationController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware('signed')->name('verification.verify');
    Route::resource('/wisata', WisataController::class);
    Route::resource('/pesanan', PesananController::class);
    Route::resource('/translator', TranslatorController::class);
    Route::resource('/tour', TourController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('userAkses:Admin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});


// Route::get('/foto_destinasi/{filename}', 'FotoDestinasiController@show')->where('filename', '(.*)')->name('public.foto_destinasi.show');
// Route::get('/wisata/{wisatum}/edit', 'WisataController@edit');
// Route::put('/wisata/{wisatum}', 'WisataController@update');
// Route::delete('wisata/{id}', 'WisataController@destroy')->name('wisata.destroy');
// Route::delete('/destroy/{id}', [TourController::class, 'destroy'])->name('tour.destroy');
// Route::resource('/update-wisata', 'WisataController@updateData')->name('wisata.update');
// Route::get('info/{id}', [WisataController::class, 'show'])->name('wisata.show');




