<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurvaControllers;
use App\Http\Controllers\DataUmumAdendum;
use App\Http\Controllers\DataUmumController;
use App\Http\Controllers\GetFile;
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
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilsControllers;
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

Route::prefix('/auth')->group(function () {

    Route::middleware('auth:sanctum')->post('/checkToken', [AuthController::class, 'checkToken']);

    Route::middleware('auth:sanctum')->delete('/revokeAllTokens', [AuthController::class, 'revokeAllTokens']);

    Route::post('/storeFcmToken', [AuthController::class, 'saveFcmTokenMobileDevice']);

    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
});

Route::prefix('/user')->group(function () {

    Route::get('/getAllUser', [UserController::class, 'getAllUser']);

    Route::get('/getUserById/{id}', [UserController::class, 'getUserById']);

    Route::get('/getAccountByUserId/{account_id}', [UserController::class, 'getAccountByUserId']);

    Route::get('/getLatestUser', [UserController::class, 'getLatestUser']);

    Route::get('/getUserByKeyword', [UserController::class, 'getUserByKeyword']);

    Route::post('/createUser', [UserController::class, 'createUser']);

    Route::post('/register', [UserController::class, 'register']);

    Route::post('/addteam', [UserController::class, 'addTeam']);

    Route::post('/registerteam', [UserController::class, 'registerTeamKonsultan']);

    Route::get('/aktivasiuser/{id}', [UserController::class, 'aktivasiUser']);

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

    Route::get('/getAllKategoriPaket', [PaketController::class, 'getAllKategoriPaket']);
});

Route::prefix('/jenis-pekerjaan')->group(function () {

    Route::get('/getAllJenisPekerjaan', [JenisPekerjaanController::class, 'getAllJenisPekerjaan']);

    Route::get('/getLatestJenisPekerjaan', [JenisPekerjaanController::class, 'getLatestJenisPekerjaan']);

    Route::get('/getJenisPekerjaanById/{id}', [JenisPekerjaanController::class, 'getJenisPekerjaanById']);

    Route::get('/getJenisPekerjaanByKeyword', [JenisPekerjaanController::class, 'getJenisPekerjaanByKeyword']);

    Route::post('/insertJenisPekerjaan', [JenisPekerjaanController::class, 'insertJenisPekerjaan']);

    Route::get('/getJenisPekerjaanByDataUmumId/{id}', [JenisPekerjaanController::class, 'getJenisPekerjaanByDataUmumId']);
});

Route::prefix('/jadual')->group(function () {

    Route::get('/getAllJadual', [JadualController::class, 'getAllJadual']);

    Route::get('/getDetailJadual/{id}', [JadualController::class, 'getDetailJadual']);

    Route::get('/getLatestJadual', [JadualController::class, 'getLatestJadual']);

    Route::get('/getJadualByKeyword', [JadualController::class, 'getJadualByKeyword']);

    Route::post('/parseJadualExcelFile', [JadualController::class, 'parseJadualExcelFile']);

    Route::post('/exceltodata', [JadualController::class, 'exceltodata']);

    Route::post('/insertJadualFromMobile', [JadualController::class, 'insertJadualFromMobile']);

    Route::post('/insertJadual', [JadualController::class, 'insertJadual']);

    Route::post('/deleteallnmp', [JadualController::class, 'deleteAllNmp']);

    Route::get('/nmp/{id}', [JadualController::class, 'getNmpByid']);

    Route::post('/updatejadual', [JadualController::class, 'updateJadual']);

    Route::get('/getJadualByDataUmumId/{id}', [JadualController::class, 'getJadualByDataUmumId']);

    Route::get('/getJadualByDataUmumIdAndRuasJalan', [JadualController::class, 'getJadualByDataUmumIdAndRuasJalan']);

    Route::get('/getJadualByDataUmumIdAndNmp', [JadualController::class, 'getJadualByDataUmumIdAndNmp']);

    Route::get('getJadualbyNmp/{id}', [JadualController::class, 'getNmpjadual']);
});

Route::prefix('/permintaan')->group(function () {

    Route::get('/getAllPermintaan', [PermintaanController::class, 'getAllPermintaan']);

    Route::get('/getLatestPermintaan', [PermintaanController::class, 'getLatestPermintaan']);

    Route::get('/getPermintaanByKeyword', [PermintaanController::class, 'getPermintaanByKeyword']);

    Route::get('/getPermintaanByDataUmumId/{id}', [PermintaanController::class, 'getPermintaanByDataUmumId']);

    Route::get('/getPermintaanDetailById/{id}', [PermintaanController::class, 'getPermintaanDetailById']);

    Route::get('/getLatestPermintaanByKonsultan', [PermintaanController::class, 'getLatestPermintaanByKonsultan']);

    Route::get('/getPermintaanByKonsultan', [PermintaanController::class, 'getPermintaanByKonsultan']);

    Route::post('/buatRequestFromMobile', [PermintaanController::class, 'buatRequestFromMobile']);

    Route::post('/buatrequest', [PermintaanController::class, 'buatRequest']);

    Route::post('/updaterequest', [PermintaanController::class, 'updateRequest']);

    Route::post('/sendRequestPekerjaanFromMobile', [PermintaanController::class, 'sendRequestPekerjaanFromMobile']);

    Route::post('/sendrequest', [PermintaanController::class, 'sendReq']);

    Route::post('/konsultan/responserequest', [PermintaanController::class, 'responReqKonsultan']);

    Route::post('/ppk/responserequest', [PermintaanController::class, 'responReqPpk']);

    Route::post('/konsultan/responserequest/mobile', [PermintaanController::class, 'responReqKonsultanFromMobile']);

    Route::post('/updaterequest/revisikontraktor', [PermintaanController::class, 'revisiRequestKontraktor']);

    Route::post('/updaterequest/revisikonsultan', [PermintaanController::class, 'revisiRequestKonsultan']);

    Route::get('/getsatuannmp/{id}/{data}', [PermintaanController::class, 'getSatuanNmp']);

    Route::post('/getdetailjadual', [PermintaanController::class, 'getDetailJadual']);

    Route::post('/delete-permintaan', [PermintaanController::class, 'deletePermintaan']);
});

Route::prefix('laporan')->group(function () {

    Route::get('/getAllLaporanHarian', [LaporanController::class, 'getAllLaporanHarian']);

    Route::get('/getLaporanProgressKegiatanTerbaru', [LaporanController::class, 'getLaporanProgressKegiatanTerbaru']);

    Route::post('/kontraktor/createlaporan', [LaporanController::class, 'createLaporan']);

    Route::post('/kontraktor/editlaporan', [LaporanController::class, 'editLaporan']);

    Route::post('/sendlaporan', [LaporanController::class, 'sendLaporan']);

    Route::post('/respon/konsultan', [LaporanController::class, 'responKonsultan']);

    Route::post('/respon/ppk', [LaporanController::class, 'responPpk']);

    Route::post('/respon/revisikonsultan', [LaporanController::class, 'responRevisiKonsultan']);

    Route::post('/delete', [LaporanController::class, 'deleteLaporan']);

    Route::post('/breakdownjadual', [LaporanController::class, 'pembandingRelasi']);
});

Route::prefix('data-umum')->group(function () {

    Route::get('/getLatestDataUmum', [DataUmumController::class, 'getLatestDataUmum']);

    Route::get('/getDataUmumByKeyword', [DataUmumController::class, 'getDataUmumByKeyword']);

    Route::post('/insertDataUmum', [DataUmumController::class, 'insertDataUmum']);

    Route::post('/insertDataUmumFromMobile', [DataUmumController::class, 'insertDataUmumFromMobile']);

    Route::get('/getAllKategori', [DataUmumController::class, 'getAllKategori']);

    Route::post('/updateDataUmum', [DataUmumController::class, 'updateDataUmum']);

    Route::post('/updateAdendum', [DataUmumController::class, 'addAdendum']);

    Route::post('/addnewadendum', [DataUmumController::class, 'AddNewAdendum']);

    Route::get('/getDataUmumRuasByKeyword/{id}', [DataUmumController::class, 'getDataUmumRuasByKeyword']);

    Route::get('/getDataUmumRuas/{id}', [DataUmumController::class, 'getDataUmumRuas']);

    Route::get('/getDokumen/{id}', [DataUmumController::class, 'getDokumen']);

    Route::post('/upload/filedkh', [UploadController::class, 'uploadFileDkh']);

    Route::delete('/fileDkh/{id}', [UploadController::class, 'DeleteFileDkh']);

    Route::post('/upload/filepk', [UploadController::class, 'uploadFilePk']);

    Route::delete('/filePk/{id}', [UploadController::class, 'DeleteFilePk']);

    Route::post('/upload/fileSpmk', [UploadController::class, 'uploadFileSpmk']);

    Route::delete('/fileSpmk/{id}', [UploadController::class, 'DeleteFileSpmk']);

    Route::post('/upload/fileSyaratUmum', [UploadController::class, 'uploadFileSyaratUmum']);

    Route::delete('/fileSyaratUmum/{id}', [UploadController::class, 'DeleteFileSyaratUmum']);

    Route::post('/upload/fileSyaratKhusus', [UploadController::class, 'uploadFileSyaratKhusus']);

    Route::delete('/fileSyaratKhusus/{id}', [UploadController::class, 'DeleteFileSyaratKhusus']);

    Route::post('/upload/fileJpp', [UploadController::class, 'uploadFileJpp']);

    Route::delete('/fileJpp/{id}', [UploadController::class, 'DeleteFileJpp']);

    Route::post('/upload/fileRencana', [UploadController::class, 'uploadFileRencana']);

    Route::delete('/fileRencana/{id}', [UploadController::class, 'DeleteFileRencana']);

    Route::post('/upload/fileSppbj', [UploadController::class, 'uploadFileSppbj']);

    Route::delete('/fileSppbj/{id}', [UploadController::class, 'DeleteFileSppbj']);

    Route::post('/upload/fileSpl', [UploadController::class, 'uploadFileSpl']);

    Route::delete('/fileSpl/{id}', [UploadController::class, 'DeleteFileSpl']);

    Route::post('/upload/fileSpekUmum', [UploadController::class, 'uploadFileSpekUmum']);

    Route::delete('/fileSpekUmum/{id}', [UploadController::class, 'DeleteFileSpekUmum']);

    Route::post('/upload/fileJaminan', [UploadController::class, 'uploadFileJaminan']);

    Route::delete('/fileJaminan/{id}', [UploadController::class, 'DeleteFileJaminan']);

    Route::post('/upload/fileSpkmp', [UploadController::class, 'uploadFileSpkmp']);

    Route::delete('/fileSpkmp/{id}', [UploadController::class, 'DeleteFileSpkmp']);

    Route::get('/upload/{id}', [UploadController::class, 'getUploadedFile']);

    Route::post('/linkspekumum', [UploadController::class, 'fileSpekUmum']);
});

Route::prefix('ruas-jalan')->group(function () {

    Route::get('/getRuasJalanByKeyword', [RuasJalanController::class, 'getRuasJalanByKeyword']);

    Route::get('/getRuasJalanByUnorAndKeyword/{id}', [RuasJalanController::class, 'getRuasJalanByUnorAndKeyword']);

    Route::get('/getRuasjalanByUnor/{id}', [RuasJalanController::class, 'getRuasjalanByUnor']);
});

Route::prefix('unor')->group(function () {

    Route::get('/getUnorByKeyword', [UnorController::class, 'getUnorByKeyword']);
});

Route::prefix('merge')->group(function () {

    Route::post('file', [MergePdf::class, 'merge']);

    Route::get('/file/{id}', [MergePdf::class, 'getFile']);

    Route::get('/fileCount/{id}', [MergePdf::class, 'getFileCount']);

    Route::post('/deletefile', [MergePdf::class, 'deleteFile']);
});

Route::prefix('adendum')->group(function () {

    Route::post('updatedata', [DataUmumAdendum::class, 'updateAdendum']);
    Route::post('buatjadual', [DataUmumAdendum::class, 'buatJadualAdendum']);
});

Route::prefix('curva')->group(function () {

    Route::get('tes/{id}', [CurvaControllers::class, 'GetDataUmum']);
    Route::get('updateDaily', [CurvaControllers::class, 'TestingDaily']);
    Route::post('progress', [CurvaControllers::class, 'getAllDataUmumUptd']);
});

Route::prefix('utils')->group(function () {

    Route::post('konsultan', [UtilsControllers::class,'getteamKonsltan']);

});
