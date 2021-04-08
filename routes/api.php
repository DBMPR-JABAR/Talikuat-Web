<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataUmumController;
use App\Http\Controllers\JadualController;
use App\Http\Controllers\JenisPekerjaanController;
use App\Http\Controllers\KonsultanController;
use App\Http\Controllers\KontraktorController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MergePdf;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PpkController;
use App\Http\Controllers\RuasJalanController;
use App\Http\Controllers\UnorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;


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

Route::prefix('/user')->group(function () {

  Route::get('/getAllUser', [UserController::class, 'getAllUser']);

  Route::get('/getUserById/{id}', [UserController::class, 'getUserById']);

  Route::get('/getAccountByUserId/{account_id}', [UserController::class, 'getAccountByUserId']);

  Route::get('/getLatestUser', [UserController::class, 'getLatestUser']);

  Route::get('/getUserByKeyword', [UserController::class, 'getUserByKeyword']);
});

Route::prefix('/kontraktor')->group(function () {

  Route::get('/getTotalKontraktor', [KontraktorController::class, 'getTotalKontraktor']);

  Route::get('/getAllKontraktor', [KontraktorController::class, 'getAllKontraktor']);

  Route::get('/getKontraktorById/{id}', [KontraktorController::class, 'getKontraktorById']);

  Route::get('/getLatestKontraktor', [KontraktorController::class, 'getLatestKontraktor']);

  Route::get('/getKontraktorByKeyword', [KontraktorController::class, 'getKontraktorByKeyword']);

  Route::post('/insertKontraktor', [KontraktorController::class, 'insertKontraktor']);
});

Route::prefix('/konsultan')->group(function () {

  Route::get('/getAllKonsultan', [KonsultanController::class, 'getAllKonsultan']);

  Route::get('/getLatestKonsultan', [KonsultanController::class, 'getLatestKonsultan']);

  Route::get('/getKonsultanById/{id}', [KonsultanController::class, 'getKonsultanById']);

  Route::get('/getTotalKonsultan', [KonsultanController::class, 'getTotalKonsultan']);

  Route::get('/getKonsultanByKeyword', [KonsultanController::class, 'getKonsultanByKeyword']);

  Route::post('/insertKonsultan', [KonsultanController::class, 'insertKonsultan']);
});

Route::prefix('/ppk')->group(function () {

  Route::get('/getAllPpk', [PpkController::class, 'getAllPpk']);

  Route::get('/getPpkById/{id}', [PpkController::class, 'getPpkById']);

  Route::get('/getLatestPpk', [PpkController::class, 'getLatestPpk']);

  Route::get('/getTotalPpk', [PpkController::class, 'getTotalPpk']);

  Route::get('/getPpkByKeyword', [PpkController::class, 'getPpkByKeyword']);

  Route::post('/insertPpk', [PpkController::class, 'insertPpk']);
});

Route::prefix('/paket')->group(function () {

  Route::get('/getAllPaket', [PaketController::class, 'getAllPaket']);

  Route::get('/getPaketById/{id}', [PaketController::class, 'getPaketById']);

  Route::get('/getTotalPaket', [PaketController::class, 'getTotalPaket']);
});

Route::prefix('/jenis-pekerjaan')->group(function () {

  Route::get('/getAllJenisPekerjaan', [JenisPekerjaanController::class, 'getAllJenisPekerjaan']);

  Route::get('/getLatestJenisPekerjaan', [JenisPekerjaanController::class, 'getLatestJenisPekerjaan']);

  Route::get('/getJenisPekerjaanById/{id}', [JenisPekerjaanController::class, 'getJenisPekerjaanById']);

  Route::get('/getJenisPekerjaanByKeyword', [JenisPekerjaanController::class, 'getJenisPekerjaanByKeyword']);

  Route::post('/insertJenisPekerjaan', [JenisPekerjaanController::class, 'insertJenisPekerjaan']);
});

Route::prefix('/jadual')->group(function () {

  Route::get('/getAllJadual', [JadualController::class, 'getAllJadual']);

  Route::get('/getDetailJadual/{id}', [JadualController::class, 'getDetailJadual']);

  Route::get('/getLatestJadual', [JadualController::class, 'getLatestJadual']);

  Route::get('/getJadualByKeyword', [JadualController::class, 'getJadualByKeyword']);

  Route::post('/parseJadualExcelFile', [JadualController::class, 'parseJadualExcelFile']);
  Route::post('/exceltodata', [JadualController::class, 'exceltodata']);

  Route::post('/insertJadual', [JadualController::class, 'insertJadual']);
  Route::post('/deleteallnmp', [JadualController::class, 'deleteAllNmp']);
  Route::get('/nmp/{id}', [JadualController::class, 'getNmpByid']);

});

Route::prefix('/permintaan')->group(function () {

  Route::get('/getAllPermintaan', [PermintaanController::class, 'getAllPermintaan']);

  Route::get('/getLatestPermintaan', [PermintaanController::class, 'getLatestPermintaan']);

  Route::get('/getPermintaanByKeyword', [PermintaanController::class, 'getPermintaanByKeyword']);
});

Route::prefix('laporan')->group(function () {

  Route::get('/getAllLaporanHarian', [LaporanController::class, 'getAllLaporanHarian']);

  Route::get('/getLaporanProgressKegiatanTerbaru', [LaporanController::class, 'getLaporanProgressKegiatanTerbaru']);
});

Route::prefix('data-umum')->group(function () {

  Route::get('/getLatestDataUmum', [DataUmumController::class, 'getLatestDataUmum']);

  Route::get('/getDataUmumByKeyword', [DataUmumController::class, 'getDataUmumByKeyword']);

  Route::post('/insertDataUmum', [DataUmumController::class, 'insertDataUmum']);

  Route::get('/getAllKategori', [DataUmumController::class, 'getAllKategori']);

  Route::get('/getDataUmumRuasById', [DataUmumController::class, 'getDataUmumRuasById']);
  Route::post('/upload/filedkh', [UploadController::class, 'uploadFileDkh']);
  Route::post('/upload/filepk', [UploadController::class, 'uploadFilePk']);
  Route::post('/upload/fileSpmk', [UploadController::class, 'uploadFileSpmk']);
  Route::post('/upload/fileSyaratUmum', [UploadController::class, 'uploadFileSyaratUmum']);
  Route::post('/upload/fileSyaratKhusus', [UploadController::class, 'uploadFileSyaratKhusus']);
  Route::post('/upload/fileJpp', [UploadController::class, 'uploadFileJpp']);
  Route::post('/upload/fileRencana', [UploadController::class, 'uploadFileRencana']);
  Route::post('/upload/fileSppbj', [UploadController::class, 'uploadFileSppbj']);
  Route::post('/upload/fileSpl', [UploadController::class, 'uploadFileSpl']);
  Route::post('/upload/fileSpekUmum', [UploadController::class, 'uploadFileSpekUmum']);
  Route::post('/upload/fileJaminan', [UploadController::class, 'uploadFileJaminan']);
  Route::post('/upload/fileSpkmp', [UploadController::class, 'uploadFileSpkmp']);

  Route::post('/mergeDkh', [UploadController::class, 'mergeDkh']);
});

Route::prefix('ruas-jalan')->group(function () {

  Route::get('/getRuasJalanByKeyword', [RuasJalanController::class, 'getRuasJalanByKeyword']);
  Route::get('/getRuasjalanByUnor/{id}', [RuasJalanController::class, 'getRuasjalanByUnor']);
});

Route::prefix('unor')->group(function () {

  Route::get('/getUnorByKeyword', [UnorController::class, 'getUnorByKeyword']);
});

Route::prefix('merge')->group(function(){

  Route::post('file',[MergePdf::class,'merge']);

});
