<?php

use App\Http\Controllers\PertemuanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\ImportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware'=>['auth:user,mahasiswa']], function(){
    Route::get('/beranda', function () {
        return view('Halaman/beranda');
    })->name('home');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');

    //Mahasiswa
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::get('/tambah-mahasiswa', [MahasiswaController::class, 'create'])->name('tambah-mahasiswa');
    Route::post('/simpan-mahasiswa', [MahasiswaController::class, 'store'])->name('simpan-mahasiswa');
    
    // Pertemuan
    Route::get('/pertemuan', [PertemuanController::class, 'index'])->name('pertemuan');
    Route::get('/detail-pertemuan/{id}', [PertemuanController::class, 'showDetail'])->name('detail-pertemuan');
    Route::get('/tambah-pertemuan/{id}', [PertemuanController::class, 'show'])->name('tambah-pertemuan');
    Route::post('/simpan-pertemuan/{id}', [PertemuanController::class, 'store'])->name('simpan-pertemuan');

    // Kelas
    Route::get('/detail/{id}', [KrsController::class, 'show'])->name('detail');
    Route::get('/tambah-kelas', [KelasController::class, 'create'])->name('tambah-kelas');
    Route::post('/simpan-kelas', [KelasController::class, 'store'])->name('simpan-kelas');

    //KRS
    Route::get('/detail/{id}', [KrsController::class, 'show'])->name('detail');

    //Import
    Route::get('/import', [ImportController::class, 'create']);
    Route::post('/save-import', [ImportController::class, 'store']);

    //HalamanMahasiswa
    Route::get('/mhs/{mahasiswa_id}', [MahasiswaController::class, 'show']);
    //DetailKelasMahasiswa
    Route::get('/detail-kelas/{krs_id}', [MahasiswaController::class, 'showDetail'])->name('detail-kelas');

});