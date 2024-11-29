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


Route::group(['middleware' => ['auth.check:Owner']], function () {  
    Route::get('/dashboard/owner', [DashboardController::class, 'owner']);

    // pengajar
    Route::resource('/dashboard/pengajar', PengajarController::class);
    Route::get('/dashboard/pengajar', [PengajarController::class, 'index'])->name('pengajar.index');
    Route::get('/dashboard/pengajar/edit/{id}', [PengajarController::class, 'edit'])->name('pengajar.edit');
    Route::post('/dashboard/pengajar/store', [PengajarController::class, 'store'])->name('pengajar.store');
    Route::post('/dashboard/pengajar/update', [PengajarController::class, 'update'])->name('pengajar.update');


    // transaksi
    Route::get('/dashboard/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/dashboard/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/dashboard/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/dashboard/transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::post('/dashboard/transaksi/update', [TransaksiController::class, 'update'])->name('transaksi.update');

    // siswa
    Route::resource('/dashboard/siswa', SiswaController::class);
    Route::get('/dashboard/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/dashboard/siswa/update', [SiswaController::class, 'update'])->name('siswa.update');

    // paket
    Route::get('/dashboard/paket', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/dashboard/paket/create', [PaketController::class, 'create'])->name('paket.create');
    Route::post('/dashboard/paket/store', [PaketController::class, 'store'])->name('paket.store');
    Route::get('/dashboard/paket/edit/{id}', [PaketController::class, 'edit'])->name('paket.edit');
    Route::post('/dashboard/paket/update', [PaketController::class, 'update'])->name('paket.update');
    Route::delete('/dashboard/paket/destroy/{id}', [PaketController::class, 'destroy'])->name('paket.destroy');

    // user
    Route::resource('/dashboard/user', UserController::class);
});

Route::group(['middleware' => ['auth.check:Pengajar']], function () {  
    Route::get('/pengajar', [DashboardController::class, 'pengajar'])->name('dashboard.pengajar');

    // pengajar
    Route::get('/pengajar/data-pengajar', [PengajarController::class, 'dataPengajar'])->name('pengajar.data.pengajar');

    // siswa
    Route::get('/pengajar/data-siswa', [SiswaController::class, 'dataSiswa'])->name('pengajar.data-siswa');

    // kosongkan siswa
    Route::get('/pengajar/data-siswa/kosongkan/{id}', [SiswaController::class, 'kosongkan'])->name('siswa.kosongkan');

    // ambil siswa
    Route::get('/pengajar/data-siswa/ambil/{id}', [SiswaController::class, 'ambil'])->name('siswa.ambil');
});
