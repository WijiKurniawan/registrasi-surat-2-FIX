<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\ManajemenAkunController;

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

Route::get('/', function () {
    return view('login', ['title' => 'Login']);
})->name('login');

Route::get('/manajemenakun', function () {
    return view('manajemenakun.index');
});

Route::get('manajemenakun', [ManajemenAkunController::class, 'index'])->name('manajemenakun');
Route::get('tambahakun', [ManajemenAkunController::class, 'create'])->name('tambahakun');
Route::post('tambahakun.store', [ManajemenAkunController::class, 'store'])->name('tambahakun.store');
Route::delete('manajemenakun/destroy/{id}', [ManajemenAkunController::class, 'destroy'])->name('manajemenakun.destroy');
Route::get('manajemenakun/edit/{id}', [ManajemenAkunController::class, 'edit'])->name('manajemenakun.edit');
Route::patch('manajemenakun/update/{id}', [ManajemenAkunController::class, 'update'])->name('manajemenakun.update');

Route::post('register', [UserController::class, 'register_action'])->name('register/action');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register/action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login/action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('dashboard', [HomeController::class, 'index'])->name('index');

Route::get('suratmasuk', [SuratMasukController::class, 'index'])->name('suratmasuk');
Route::get('suratmasuk/create', [SuratMasukController::class, 'create'])->name('suratmasuk.create');
Route::post('suratmasuk.store', [SuratMasukController::class, 'store'])->name('suratmasuk.store');
Route::delete('suratmasuk/destroy/{id}', [SuratMasukController::class, 'destroy'])->name('suratmasuk.destroy');
Route::get('suratmasuk/edit/{id}', [SuratMasukController::class, 'edit'])->name('suratmasuk.edit');
Route::patch('suratmasuk/update/{id}', [SuratMasukController::class, 'update'])->name('suratmasuk.update');
Route::get('suratmasuk/download/{dokumen_masuk}', [SuratMasukController::class, 'download'])->name('suratmasuk.download');

Route::get('suratkeluar', [SuratKeluarController::class, 'index'])->name('suratkeluar');
Route::get('buatsuratkeluar', [SuratKeluarController::class, 'create'])->name('suratkeluar.create');
Route::post('buatsuratkeluar.store', [SuratKeluarController::class, 'store'])->name('suratkeluar.store');
Route::delete('suratkeluar/destroy/{id}', [SuratKeluarController::class, 'destroy'])->name('suratkeluar.destroy');
Route::get('suratkeluar/edit/{id}', [SuratKeluarController::class, 'edit'])->name('suratkeluar.edit');
Route::patch('suratkeluar/update/{id}', [SuratKeluarController::class, 'update'])->name('suratkeluar.update');
Route::get('suratkeluar/download/{dokumen}', [SuratKeluarController::class, 'download'])->name('suratkeluar.download');