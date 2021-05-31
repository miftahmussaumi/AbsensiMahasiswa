<?php

use App\Http\Controllers\PertemuanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\AbsensiController;
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
    // Tampilkan
    Route::get('/beranda', function () {
        return view('Halaman/beranda');
    })->name('home');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');

    // Mahasiswa
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::get('/tambah-mahasiswa', [MahasiswaController::class, 'create'])->name('tambah-mahasiswa');
    Route::post('/simpan-mahasiswa', [MahasiswaController::class, 'store'])->name('simpan-mahasiswa');
    Route::get('/edit-mahasiswa/{id}', [MahasiswaController::class, 'edit'])->name('edit-mahasiswa');
    Route::post('/update-mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('update-mahasiswa');
    Route::get('/delete-mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('delete-mahasiswa');
    
    // Pertemuan
    Route::get('/pertemuan', [PertemuanController::class, 'index'])->name('pertemuan');
    Route::get('/detail-pertemuan/{id}', [PertemuanController::class, 'showDetail'])->name('detail-pertemuan');
    Route::get('/tambah-pertemuan/{id}', [PertemuanController::class, 'show'])->name('tambah-pertemuan');
    Route::post('/simpan-pertemuan/{id}', [PertemuanController::class, 'store'])->name('simpan-pertemuan');

    // Kelas
    Route::get('/tambah-kelas', [KelasController::class, 'create'])->name('tambah-kelas');
    Route::post('/simpan-kelas', [KelasController::class, 'store'])->name('simpan-kelas');

    // KRS
    Route::get('/detail/{id}', [KrsController::class, 'show'])->name('detail');
    Route::post('/simpan-mhs', [KrsController::class, 'store'])->name('simpan-mhs');

    // Import
    Route::get('/import',[AbsensiController::class,'create'])->name('import');
    Route::post('/save-import', [AbsensiController::class, 'store'])->name('save-import');

    //HalamanMahasiswa
    Route::get('/mhs/{mahasiswa_id}', [MahasiswaController::class, 'show']);
    //DetailKelasMahasiswa
    Route::get('/detail-kelas/{krs_id}', [MahasiswaController::class, 'showDetail'])->name('detail-kelas');

});