<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JadualController;
use App\Http\Controllers\JenisPekerjaanController;
use App\Http\Controllers\KonsultanController;
use App\Http\Controllers\KontraktorController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PpkController;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/user')->group(function() {

  Route::get('/getAllUser', [UserController::class, 'getAllUser']);

  Route::get('/getUserById/{id}', [UserController::class, 'getUserById']);

  Route::get('/getAccountByUserId/{account_id}', [UserController::class, 'getAccountByUserId']);

});

Route::prefix('/kontraktor')->group(function() {

  Route::get('/getAllKontraktor', [KontraktorController::class, 'getAllKontraktor']);

  Route::get('/getKontraktorById/{id}', [KontraktorController::class, 'getKontraktorById']);

});

Route::prefix('/konsultan')->group(function() {

  Route::get('/getAllKonsultan', [KonsultanController::class, 'getAllKonsultan']);

  Route::get('/getKonsultanById/{id}', [KonsultanController::class, 'getKonsultanById']);

});

Route::prefix('/ppk')->group(function() {

  Route::get('/getAllPpk', [PpkController::class, 'getAllPpk']);

  Route::get('/getPpkById/{id}', [PpkController::class, 'getPpkById']);

});

Route::prefix('/paket')->group(function() {

  Route::get('/getAllPaket', [PaketController::class, 'getAllPaket']);

  Route::get('/getPaketById/{id}', [PaketController::class, 'getPaketById']);

});

Route::prefix('/jenis-pekerjaan')->group(function() {

  Route::get('/getAllJenisPekerjaan', [JenisPekerjaanController::class, 'getAllJenisPekerjaan']);

  Route::get('/getJenisPekerjaanById/{id}', [JenisPekerjaanController::class, 'getJenisPekerjaanById']);

});

Route::prefix('/jadual')->group(function() {

  Route::get('/getAllJadual', [JadualController::class, 'getAllJadual']);

  Route::get('/getDetailJadual/{id}', [JadualController::class, 'getDetailJadual']);

});

Route::prefix('/permintaan')->group(function() {

  Route::get('/getAllPermintaan', [PermintaanController::class, 'getAllPermintaan']);

});

Route::prefix('laporan')->group(function() {

  Route::get('/getAllLaporanHarian', [LaporanController::class, 'getAllLaporanHarian']);
  
});
