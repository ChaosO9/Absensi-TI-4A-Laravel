<?php

use App\Http\Controllers\index;
use App\Http\Controllers\absensi;
use App\Http\Controllers\rekapan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\matkul_controller;
use App\Http\Controllers\mahasiswa_controller;

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

// Route::get('/index', function () {
//     return view('welcome');
// });
Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('authLogin');
Route::get('/login_mahasiswa', [AuthController::class, 'viewloginmhs'])->name('login_mahasiswa');
Route::post('/login_mahasiswa', [AuthController::class, 'loginmhs'])->name('authlogin_mahasiswa');
Route::get('/registrasiadmin', [AuthController::class, 'viewRegistrasiAdmin'])->name('registrasiadmin');
Route::post('/registeradmin', [AuthController::class,'registerAdmin'])->name('registerAdmin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [AuthController::class, 'viewLogin']) -> name('start');
Route::get("/locale/{lange}", [LocalizationController::class, 'setLang']);
// Route::controller(AuthController::class);

Route::middleware('auth')->group(function(){
    Route::get('/index', [index::class, 'indexView']) -> name('index');
    Route::get('/absensi', [absensi::class, 'absensiAction']) -> name('absensi');
    Route::post('/absensi', [absensi::class, 'absensiMatkul']) -> name('absensi_matkul');
    Route::get('/absensi-refreshed', [absensi::class, 'absensiRefreshed']) -> name('absensi_refreshed');
    Route::post('/absensi-refreshed', [absensi::class, 'absensiMatkul']) -> name('absensi_refreshed_');
    Route::get('/lihatmhs', [mahasiswa_controller::class, 'lihatmhs'])->name('lihatmhs');
    Route::get('/lihatmatkul', [matkul_controller::class, 'viewMatkul'])->name('lihatmatkul');
    Route::get('/rekapan', [rekapan::class, 'rekapan_sementaraAction'])->name('rekapan_sementara');
    Route::get('/rekapan-tetap', [rekapan::class, 'rekapan_tetapAction'])->name('rekapan_tetap');
    Route::get('/create_mahasiswa', [mahasiswa_controller::class, 'create_mahasiswa'])->name('create_mahasiswa');
    Route::post('/create_mahasiswa', [mahasiswa_controller::class, 'create_mahasiswa_daftar'])->name('create_mahasiswa_proses');
    Route::get('/update_mahasiswa/{data_mahasiswa}', [mahasiswa_controller::class, 'update_mahasiswa'])->name('update_mahasiswa');
    Route::post('/update_mahasiswa/{nim_asal}', [mahasiswa_controller::class, 'update_mahasiswa_proses'])->name('update_mahasiswa_proses');
    Route::post('/delete_mahasiswa/{nim?}', [mahasiswa_controller::class, 'delete_mahasiswa_proses'])->name('hapus_mahasiswa');
});