<?php

use App\Http\Controllers\m_kategoriController;
use App\Http\Controllers\m_userController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\m_levelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\WelcomeController;

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
Route::get('/user', [m_userController::class, 'index']);

Route::get('/user/tambah', [m_userController::class, 'tambah'])->name('/user/tambah');
Route::get('/user/ubah/{id}', [m_userController::class, 'ubah'])->name('/user/ubah');
Route::get('/user/hapus/{id}', [m_userController::class, 'hapus'])->name('/user/hapus');
Route::post('/user/tambah_simpan', [m_userController::class, 'tambah_simpan'])->name('/user/tambah_simpan');
Route::put('/user/ubah_simpan/{id}', [m_userController::class, 'ubah_simpan'])->name('/user/ubah_simpan');

Route::get('/kategori/create', [m_kategoriController::class, 'create'])->name('TambahKategori');
Route::get('/kategori/edit/{id}', [m_kategoriController::class, 'edit'])->name('EditKategori');
Route::put('/kategori/update/{id}', [m_kategoriController::class, 'update'])->name('UpdateKategori');
Route::get('/kategori/delete/{id}', [m_kategoriController::class, 'delete'])->name('DeleteKategori');

Route::get('/user/create', [m_userController::class, 'create'])->name('user.create');
Route::get('/level/create', [m_levelController::class, 'create'])->name('level.create');

Route::post('/kategori', [m_kategoriController::class, 'store']);
Route::post('/user', [m_userController::class, 'store']);
Route::post('/level', [m_levelController::class, 'store']);

Route::resource('m_user', POSController::class);

//Route::get('/m_user', [POSController::class, 'index']);

Route::get('/', [WelcomeController::class, 'index']);

Route::prefix('user')->group(function () {
    Route::get('/', [m_userController::class, 'index']);
    Route::post('/list', [m_userController::class, 'list']);
    Route::get('/create', [m_userController::class, 'create']);
    Route::post('/', [m_userController::class, 'store']);
    Route::get('/{id}', [m_userController::class, 'show']);
    Route::get('/{id}/edit', [m_userController::class, 'edit']);
    Route::put('/{id}', [m_userController::class, 'update']);
    Route::delete('/{id}', [m_userController::class, 'destroy']);
});
