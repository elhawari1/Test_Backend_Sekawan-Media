<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PoolController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KendaraanController;

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
Route::controller(AuthController::class)->group(function ()
{
    Route::get('/login', 'index');
    Route::post('/login/proses', 'loginProses')->name('loginProses');
});
Route::controller(DashboardController::class)->group(function ()
{
    Route::get('/', 'index');
});

Route::controller(UserController::class)->group(function () 
{
    //Manager
    Route::get('/manager', 'indexManager')->name('manager');
    Route::post('/manager/store', 'storeManager');
    Route::post('/manager/update/{id}', 'updateManager');
    Route::get('/manager/destroy/{id}', 'destroyManager'); 
    //Pegawai
    Route::get('/pegawai', 'indexPegawai')->name('pegawai');
    Route::post('/pegawai/store', 'storePegawai');
    Route::post('/pegawai/update/{id}', 'updatePegawai');
    Route::get('/pegawai/destroy/{id}', 'destroyPegawai'); 
});

Route::controller(PesananController::class)->group(function ()
{
    Route::get('/pesanan', 'index')->name('pesanan');
    Route::post('/pesanan/store', 'store');
    Route::get('/pesanan/show/{id_pesanan}', 'show');
    Route::get('/pesanan/pool/setuju/{id_detail_pesanan}', 'setujuPool');
    Route::get('/pesanan/manager/setuju/{id_detail_pesanan}', 'setujuManager');
    Route::post('/pesanan/update/{id_pesanan}', 'update'); 
    Route::get('/pesanan/destroy/{id_pesanan}', 'destroy'); 
});

Route::controller(KendaraanController::class)->group(function ()
{
    Route::get('/kendaraan', 'index')->name('kendaraan');
    Route::post('/kendaraan/store', 'store');
    Route::post('/kendaraan/update/{id_kendaraan}', 'update');
    Route::get('/kendaraan/destroy/{id_kendaraan}', 'destroy');

});


Route::controller(DriverController::class)->group(function ()
{
    Route::get('/driver', 'index')->name('driver');
    Route::post('/driver/store', 'store');
    Route::post('/driver/update/{id_driver}', 'update');
    Route::get('/driver/destroy/{id_driver}', 'destroy');

});

Route::controller(PoolController::class)->group(function ()
{
    Route::get('/pool', 'index')->name('pool');
    Route::post('/pool/store', 'store');
    Route::post('/pool/update/{id_pool}', 'update');
    Route::get('/pool/destroy/{id_pool}', 'destroy');
});






