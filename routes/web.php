<?php

use App\Http\Controllers\index;
use App\Http\Controllers\absensi;
use App\Http\Controllers\rekapan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
Route::get('/', [AuthController::class, 'viewLogin'])->name('login');
Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('authLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/registrasiadmin', [AuthController::class, 'viewRegistrasiAdmin'])->name('registrasiadmin');
Route::post('/registeradmin', [AuthController::class,'registerAdmin'])->name('registerAdmin');
Route::get('/index', [index::class, 'indexAction']) -> name('index');
Route::get('/absensi', [absensi::class, 'absensiAction']) -> name('absensi');
Route::post('/absensi', [absensi::class, 'absensiMatkul']) -> name('absensi_matkul');
Route::get('/absensi-refreshed', [absensi::class, 'absensiRefreshed']) -> name('absensi_refreshed');
Route::post('/absensi-refreshed', [absensi::class, 'absensiMatkul']) -> name('absensi_refreshed_');
Route::get('/lihatmhs', [mahasiswa_controller::class, 'lihatmhs'])->name('lihatmhs');
Route::get('/lihatmatkul', [matkul_controller::class, 'viewMatkul'])->name('lihatmatkul');
Route::get('/rekapan', [rekapan::class, 'rekapan_sementaraAction'])->name('rekapan_sementara');
Route::get('/rekapan-tetap', [rekapan::class, 'rekapan_tetapAction'])->name('rekapan_tetap');
