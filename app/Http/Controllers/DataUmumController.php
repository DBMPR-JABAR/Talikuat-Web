<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DataUmumController extends Controller
{

  private $PATH_FILE_DOCUMENTS = "C:\\xampp\\htdocs\\talikuat\\lampiran\\umum";

  public function getLatestDataUmum()
  {

    $result = DB::table('data_umum')
      ->selectRaw('aksi, data_umum.id, konsultan_supervisi, lat_akhir, lat_awal, long_akhir, long_awal, nama_gs, nama_kegiatan, nama_ppk, ruas_jalan, nama_se, nilai_kontrak, no_kontrak, no_spmk, opd, panjang, pemda, penyedia_jasa, pk, ppk, rab, rab1, rab2, rab3, GROUP_CONCAT(ruas_jalan) as ruas_jalan_concat, satuan_panjang, satuan_waktu, data_umum_ruas.segmen_jalan, sk, sm, tgl_input, tgl_kontrak, tgl_spmk, tgl_update, ul_jadual, ul_jaminan, ul_rencana, ul_spek, ul_spkmp, ul_spl, ul_spmk, ul_sppbj, unit, unor, user, waktu_pelaksanaan, wp')
      ->join('data_umum_ruas', 'data_umum.id', '=', 'data_umum_ruas.id')
      ->groupBy('data_umum.id')
      ->orderBy('data_umum.id', 'desc')
      ->limit(5)
      ->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getDataUmumByKeyword(Request $request)
  {

    $keyword = $request->query("keyword");

    $result = DB::table('data_umum')
      ->selectRaw('aksi, data_umum.id, konsultan_supervisi, lat_akhir, lat_awal, long_akhir, long_awal, nama_gs, nama_kegiatan, nama_ppk, ruas_jalan, nama_se, nilai_kontrak, no_kontrak, no_spmk, opd, panjang, pemda, penyedia_jasa, pk, ppk, rab, rab1, rab2, rab3, GROUP_CONCAT(ruas_jalan) as ruas_jalan_concat, satuan_panjang, satuan_waktu, data_umum_ruas.segmen_jalan, sk, sm, tgl_input, tgl_kontrak, tgl_spmk, tgl_update, ul_jadual, ul_jaminan, ul_rencana, ul_spek, ul_spkmp, ul_spl, ul_spmk, ul_sppbj, unit, unor, user, waktu_pelaksanaan, wp')
      ->join('data_umum_ruas', 'data_umum.id', '=', 'data_umum_ruas.id')
      ->groupBy('data_umum.id')
      ->having('data_umum.nama_kegiatan', 'like', '%' . $keyword . '%')
      ->orHaving('ruas_jalan_concat', 'like', '%' . $keyword . '%')
      ->orHaving('unor', 'like', '%' . $keyword . '%')
      ->orHaving('data_umum.id', $keyword)
      ->paginate(15);

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getAllKategori(Request $request)
  {

    $result = DB::table('kategori_paket')->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function insertDataUmum(Request $request)
  {
    $validator = Validator::make($request->all(), [
      // Data Umum
      "pemda" => "required",
      "opd" => "required",
      "unor" => "required",
      "kategori" => "required",
      "nama_kegiatan" => "required",
      "no_kontrak" => "required",
      "tgl_kontrak" => "required",
      "nilai_kontrak" => "required",
      "no_spmk" => "required",
      "tgl_spmk" => "required",
      "panjang" => "required",
      "waktu_pelaksanaan" => "required",
      "ppk_kegiatan" => "required",
      "penyedia_jasa" => "required",
      "konsultan" => "required",
      "nama_ppk" => "required",
      "nama_se" => "required",
      "nama_gs" => "required",

      // List Data Umum Ruas
      "list_data_umum_ruas" => "required|json",

      // File
      "file_dkh" => "required",
      "file_perjanjian_kontrak" => "required",
      "file_spmk" => "required",
      "file_syarat_umum" => "required",
      "file_syarat_khusus" => "required",
      "file_jadual_pelaksanaan" => "required",
      "file_gambar_rencana" => "required",
      "file_sppbj" => "required",
      "file_spl" => "required",
      "file_spesifikasi_umum" => "required",
      "file_jaminan" => "required",
      "file_spkmp" => "required",

      // Informasi Tambahan
      "user" => "required",
      "tgl_input" => "required",
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => '400',
        'error' => $validator->getMessageBag()->getMessages()
      ], Response::HTTP_BAD_REQUEST);
    }

    // List Ruas Jalan
    $listDataUmumRuas = json_decode($request->input('list_data_umum_ruas'));

    foreach ($listDataUmumRuas as $dataUmumRuas) {
      if (
        !isNotNullOrBlank($dataUmumRuas->ruas_jalan) ||
        !isNotNullOrBlank($dataUmumRuas->segmen_jalan) ||
        !isNotNullOrBlank($dataUmumRuas->lat_awal) ||
        !isNotNullOrBlank($dataUmumRuas->long_awal) ||
        !isNotNullOrBlank($dataUmumRuas->lat_akhir) ||
        !isNotNullOrBlank($dataUmumRuas->long_akhir)
      ) {
        return response()->json([
          'status' => 'failed',
          'code' => '400',
          'error' => 'Data Umum Ruas Ada Yang Kosong Atau Null'
        ], Response::HTTP_BAD_REQUEST);
      }
    }

    // File-File Upload
    $fileDkh = $request->file('file_dkh');
    $filePerjanjianKontrak = $request->file('file_perjanjian_kontrak');
    $fileSpmk = $request->file('file_spmk');
    $fileSyaratUmum = $request->file('file_syarat_umum');
    $fileSyaratKhusus = $request->file('file_syarat_khusus');
    $fileJadualPelaksanaan = $request->file('file_jadual_pelaksanaan');
    $fileGambarRencana = $request->file('file_gambar_rencana');
    $fileSppbj = $request->file('file_sppbj');
    $fileSpl = $request->file('file_spl');
    $fileSpesifikasiUmum = $request->file('file_spesifikasi_umum');
    $fileJaminan = $request->file('file_jaminan');
    $fileSpkmp = $request->file('file_spkmp');

    $fileDkh->move($this->PATH_FILE_DOCUMENTS, $fileDkh->getClientOriginalName());
    $filePerjanjianKontrak->move($this->PATH_FILE_DOCUMENTS, $filePerjanjianKontrak->getClientOriginalName());
    $fileSpmk->move($this->PATH_FILE_DOCUMENTS, $fileSpmk->getClientOriginalName());
    $fileSyaratUmum->move($this->PATH_FILE_DOCUMENTS, $fileSyaratUmum->getClientOriginalName());
    $fileSyaratKhusus->move($this->PATH_FILE_DOCUMENTS, $fileSyaratKhusus->getClientOriginalName());
    $fileJadualPelaksanaan->move($this->PATH_FILE_DOCUMENTS, $fileJadualPelaksanaan->getClientOriginalName());
    $fileGambarRencana->move($this->PATH_FILE_DOCUMENTS, $fileGambarRencana->getClientOriginalName());
    $fileSppbj->move($this->PATH_FILE_DOCUMENTS, $fileSppbj->getClientOriginalName());
    $fileSpl->move($this->PATH_FILE_DOCUMENTS, $fileSpl->getClientOriginalName());
    $fileSpesifikasiUmum->move($this->PATH_FILE_DOCUMENTS, $fileSpesifikasiUmum->getClientOriginalName());
    $fileJaminan->move($this->PATH_FILE_DOCUMENTS, $fileJaminan->getClientOriginalName());
    $fileSpkmp->move($this->PATH_FILE_DOCUMENTS, $fileSpkmp->getClientOriginalName());

    $data = [
      // Data Umum
      'pemda' => $request->input("pemda"),
      "opd" => $request->input("opd"),
      "unor" => $request->input("unor"),
      "kategori" => $request->input("kategori"),
      "nama_kegiatan" => $request->input("nama_kegiatan"),
      "no_kontrak" => $request->input("no_kontrak"),
      "tgl_kontrak" => $request->input("tgl_kontrak"),
      "nilai_kontrak" => $request->input("nilai_kontrak"),
      "no_spmk" => $request->input("no_spmk"),
      "tgl_spmk" => $request->input("tgl_spmk"),
      "panjang" => $request->input("panjang"),
      "waktu_pelaksanaan" => $request->input("waktu_pelaksanaan"),
      "ppk" => $request->input("ppk_kegiatan"),
      "penyedia_jasa" => $request->input("penyedia_jasa"),
      "konsultan_supervisi" => $request->input("konsultan"),
      "nama_ppk" => $request->input("nama_ppk"),
      "nama_se" => $request->input("nama_se"),
      "nama_gs" => $request->input("nama_gs"),

      // File
      "rab" => $fileDkh->getClientOriginalName(),
      "pk" => $filePerjanjianKontrak->getClientOriginalName(),
      "sk" => $fileSyaratKhusus->getClientOriginalName(),
      "sm" => $fileSyaratUmum->getClientOriginalName(),
      "ul_spmk" => $fileSpmk->getClientOriginalName(),
      "ul_jadual" => $fileJadualPelaksanaan->getClientOriginalName(),
      "ul_rencana" => $fileGambarRencana->getClientOriginalName(),
      "ul_sppbj" => $fileSppbj->getClientOriginalName(),
      "ul_spl" => $fileSpl->getClientOriginalName(),
      "ul_spek" => $fileSpesifikasiUmum->getClientOriginalName(),
      "ul_jaminan" => $fileJadualPelaksanaan->getClientOriginalName(),
      "ul_spkmp" => $fileSpkmp->getClientOriginalName(),

      // Informasi Tambahan
      "user" => $request->input("user"),
      "tgl_input" => $request->input("tgl_input"),
    ];

    $insertedDataUmumId = DB::table('data_umum')->insertGetId($data);

    foreach ($listDataUmumRuas as $dataUmumRuas) {
      DB::table('data_umum_ruas')->insert([
        "id" => $insertedDataUmumId,
        "ruas_jalan" => $dataUmumRuas->ruas_jalan,
        "segmen_jalan" => $dataUmumRuas->segmen_jalan,
        "lat_awal" => $dataUmumRuas->lat_awal,
        "long_awal" => $dataUmumRuas->long_awal,
        "lat_akhir" => $dataUmumRuas->lat_akhir,
        "long_akhir" => $dataUmumRuas->long_akhir
      ]);
    }

    $data['id'] = $insertedDataUmumId;
    $data['list_data_umum_ruas'] = $listDataUmumRuas;

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $data
    ]);
  }
}
