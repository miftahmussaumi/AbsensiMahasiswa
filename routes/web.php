<?php

use App\Http\Controllers\PertemuanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KrsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteGroup;

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
    return view('User/login');
});

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware'=>['auth']], function(){
    Route::get('/beranda', function () {
        return view('Halaman/beranda');
    })->name('home');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    // Pertemuan
    Route::get('/pertemuan', [PertemuanController::class, 'index'])->name('pertemuan');
    Route::get('/tambah-pertemuan', [PertemuanController::class, 'create'])->name('tambah-pertemuan');
    Route::post('/simpan-pertemuan', [PertemuanController::class, 'store'])->name('simpan-pertemuan');
    // Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::get('/tambah-kelas', [KelasController::class, 'create'])->name('tambah-kelas');
    Route::post('/simpan-kelas', [KelasController::class, 'store'])->name('simpan-kelas');
    //KRS
    Route::get('/detail/{id}', [KrsController::class, 'show'])->name('detail');
});