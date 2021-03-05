<?php

namespace App\Http\Controllers;

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
    // $validator = Validator::make($request->all(), [
    //   "pemda" => "required",
    //   "opd" => "required",
    //   "unor" => "required",
    //   "nama_kegiatan" => "required",
    //   "no_kontrak" => "required",
    //   "tgl_kontrak" => "required",
    //   "nilai_kontrak" => "required",
    //   "no_spmk" => "required",
    //   "tgl_spmk" => "required",
    //   "panjang" => "required",
    //   "waktu_pelaksanaan" => "required",
    //   "ppk_kegiatan" => "required",
    //   "penyedia_jasa" => "required",
    //   "konsultan" => "required",
    //   "nama_ppk" => "required",
    //   "nama_se" => "required",
    //   "nama_gs" => "required",
    //   "list_ruas_jalan" => "required|json",
    //   "file_dkh" => "required",
    //   "file_perjanjian_kontrak" => "required",
    //   "file_spmk" => "required",
    //   "file_syarat_umum" => "required",
    //   "file_syarat_khusus" => "required",
    //   "file_jadual_pelaksanaan" => "required",
    //   "file_gambar_rencana" => "required",
    //   "file_sppbj" => "required",
    //   "file_spl" => "required",
    //   "file_spesifikasi_umum" => "required",
    //   "file_jaminan" => "required",
    //   "file_spkmp" => "required"
    // ]);

    // if ($validator->fails()) {
    //   return response()->json([
    //     'status' => 'failed',
    //     'code' => '400',
    //     'error' => $validator->getMessageBag()->getMessages()
    //   ], Response::HTTP_BAD_REQUEST);
    // }

    // // List Ruas Jalan
    // $listRuasJalan = json_decode($request->input('listRuasJalan'));

    // // foreach ($listRuasJalan as $ruasJalan) {
    // //   if ($ruasJalan->id == "" )
    // // }

    // // File-File Upload
    // $fileDkh = $request->file('file_dkh');
    // $filePerjanjianKontrak = $request->file('file_perjanjian_kontrak');
    // $fileSpmk = $request->file('file_spmk');
    // $fileSyaratUmum = $request->file('file_syarat_umum');
    // $fileSyaratKhusus = $request->file('file_syarat_khusus');
    // $fileJadualPelaksanaan = $request->file('file_jadual_pelaksanaan');
    // $fileGambarRencana = $request->file('file_gambar_rencana');
    // $fileSppbj = $request->file('file_sppbj');
    // $fileSpl = $request->file('file_spl');
    // $fileSpesifikasiUmum = $request->file('file_spesifikasi_umum');
    // $fileJaminan = $request->file('file_jaminan');
    // $fileSpkmp = $request->file('file_spkmp');


    // $fileDkh->move($this->PATH_FILE_DOCUMENTS, $fileDkh->getClientOriginalName());

    // // return response()->json([
    // //   'status' => 'success',
    // //   'code' => '200',
    // //   'file' => $fileDkh->getClientOriginalName(),
    // //   'desc' => $desc
    // // ]);

    // code to test
    $values = array(false, true, null, 'abc', '23', 23, '23.5', 23.5, '', ' ', '0', 0);
    foreach ($values as $value) {
      var_export($value);
      if ($this->isNotNullOrBlank($value))
        print(" true\n");
      else
        print(" false\n");
    }
  }

  function isNotNullOrBlank($value)
  {
    if ($value === null) {
      return false;
    } else if (is_bool($value)) {
      return true;
    } else if (trim($value) === '') {
      return false;
    } else {
      return true;
    }
  }
}
