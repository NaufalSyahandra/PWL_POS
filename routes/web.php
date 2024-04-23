<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\m_kategoriController;
use App\Http\Controllers\m_userController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\m_levelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\m_barangController;
use App\Http\Controllers\t_stokController;
use App\Http\Controllers\TransaksiPenjualanController;

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

Route::resource('level', m_levelController::class);
Route::post('level/list', [m_levelController::class, 'list']);

Route::resource('kategori', m_kategoriController::class);
Route::post('kategori/list', [m_kategoriController::class, 'list']);

Route::resource('barang', m_barangController::class);
Route::post('barang/list', [m_barangController::class, 'list']);

Route::resource('stok', t_stokController::class);
Route::post('stok/list', [t_stokController::class, 'list']);

Route::resource('penjualan', TransaksiPenjualanController::class);
Route::post('penjualan/list', [TransaksiPenjualanController::class, 'list']);

/**
 * Routes for User Authentication process
 */
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');

/**
 * use Authentication class using middleware aliases in http/kernel
 * to redirect users when they are not authenticate
 */
Route::group(['middleware' => ['auth']], function () {

    /**
     * if user is admin
     */
    Route::group(['middleware' => ['cek_login:1']], function () {
        Route::resource('admin', AdminController::class);
    });
    /**
     * if user is manager
     */
    Route::group(['middleware' => ['cek_login:2']], function () {
        Route::resource('manager', ManagerController::class);
    });
});
