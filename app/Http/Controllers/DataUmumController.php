<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataUmumController extends Controller
{

  public function getLatestDataUmum()
  {

    $result = DB::table('data_umum')
      ->selectRaw('aksi, data_umum.id, konsultan_supervisi, lat_akhir, lat_awal, long_akhir, long_awal, nama_gs, nama_kegiatan, nama_ppk, ruas_jalan, nama_se, nilai_kontrak, no_kontrak, no_spmk, opd, panjang, pemda, penyedia_jasa, pk, ppk, rab, rab1, rab2, rab3, ruas_jalan, GROUP_CONCAT(ruas_jalan) as ruas_jalan_concat, satuan_panjang, satuan_waktu, data_umum_ruas.segmen_jalan, sk, sm, tgl_input, tgl_kontrak, tgl_spmk, tgl_update, ul_jadual, ul_jaminan, ul_rencana, ul_spek, ul_spkmp, ul_spl, ul_spmk, ul_sppbj, unit, unor, user, waktu_pelaksanaan, wp')
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
      ->selectRaw('aksi, data_umum.id, konsultan_supervisi, lat_akhir, lat_awal, long_akhir, long_awal, nama_gs, nama_kegiatan, nama_ppk, ruas_jalan, nama_se, nilai_kontrak, no_kontrak, no_spmk, opd, panjang, pemda, penyedia_jasa, pk, ppk, rab, rab1, rab2, rab3, ruas_jalan, GROUP_CONCAT(ruas_jalan) as ruas_jalan_concat, satuan_panjang, satuan_waktu, data_umum_ruas.segmen_jalan, sk, sm, tgl_input, tgl_kontrak, tgl_spmk, tgl_update, ul_jadual, ul_jaminan, ul_rencana, ul_spek, ul_spkmp, ul_spl, ul_spmk, ul_sppbj, unit, unor, user, waktu_pelaksanaan, wp')
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
}
