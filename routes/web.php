<?php

use App\Http\Controllers\m_kategoriController;
use App\Http\Controllers\m_userController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\m_levelController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [m_levelController::class, 'index']);
Route::get('/kategori', [m_kategoriController::class, 'index']);
Route::get('/user', [m_userController::class, 'index'])->name('/user');
Route::get('/user/tambah', [m_userController::class, 'tambah'])->name('/user/tambah');
Route::get('/user/ubah/{id}', [m_userController::class, 'ubah'])->name('/user/ubah');
Route::get('/user/hapus/{id}', [m_userController::class, 'hapus'])->name('/user/hapus');
Route::post('/user/tambah_simpan', [m_userController::class, 'tambah_simpan'])->name('/user/tambah_simpan');
Route::put('/user/ubah_simpan/{id}', [m_userController::class, 'ubah_simpan'])->name('/user/ubah_simpan');
Route::get('/kategori', [m_kategoriController::class, 'index']);
Route::get('/kategori/create', [m_kategoriController::class, 'create'])->name('TambahKategori');
Route::post('/kategori', [m_kategoriController::class, 'store']);

