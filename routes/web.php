<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', [PageController::class, 'master']);
Route::get('about', [PageController::class, 'about']);
Route::get('price', [PageController::class, 'price']);
Route::get('gallery', [PageController::class, 'gallery']);
Route::get('teacher', [PageController::class, 'teacher']);
Route::get('contact', [PageController::class, 'contact']);
Route::get('pendaftaran', [PageController::class, 'pendaftaran']);

//dashboard routes


// Auth Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('pendaftaran/store', [TransaksiController::class, 'pendaftaran'])->name('pendaftaranPost');


// Protected Routes
Route::middleware(['auth'])->group(function () {
  
    Route::get('/dashboard/admin', [DashboardController::class, 'admin']);
    Route::resource('/dashboard/pengajar', PengajarController::class);
    Route::resource('/dashboard/siswa', SiswaController::class);
    Route::resource('/dashboard/transaksi', TransaksiController::class);
    Route::resource('/dashboard/user', UserController::class);

  
});


Route::group(['middleware' => ['auth.check:Owner']], function () {  
    Route::get('/dashboard/owner', [DashboardController::class, 'owner']);

    // pengajar
    Route::resource('/dashboard/pengajar', PengajarController::class);
    Route::get('/dashboard/pengajar', [PengajarController::class, 'index'])->name('pengajar.index');
    Route::get('/dashboard/pengajar/edit/{id}', [PengajarController::class, 'edit'])->name('pengajar.edit');
    Route::post('/dashboard/pengajar/store', [PengajarController::class, 'store'])->name('pengajar.store');
    Route::post('/dashboard/pengajar/update', [PengajarController::class, 'update'])->name('pengajar.update');


    // transaksi
    Route::get('/dashboard/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/dashboard/transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::post('/dashboard/transaksi/update', [TransaksiController::class, 'update'])->name('transaksi.update');

    // siswa
    Route::get('/dashboard/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/dashboard/siswa/update', [SiswaController::class, 'update'])->name('siswa.update');

    // paket
    Route::get('/dashboard/paket', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/dashboard/paket/create', [PaketController::class, 'create'])->name('paket.create');
    Route::post('/dashboard/paket/store', [PaketController::class, 'store'])->name('paket.store');
    Route::get('/dashboard/paket/edit/{id}', [PaketController::class, 'edit'])->name('paket.edit');
    Route::post('/dashboard/paket/update', [PaketController::class, 'update'])->name('paket.update');
    Route::delete('/dashboard/paket/destroy/{id}', [PaketController::class, 'destroy'])->name('paket.destroy');
});


