<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
  public function getAllLaporanHarian() {

    $result = DB::table('master_laporan_harian as master')
              ->leftJoin('detail_laporan_harian_pekerjaan as detail', 'master.no_trans', '=', 'detail.no_trans')
              ->select('master.*', 'detail.jenis_pekerjaan', 'detail.no_pekerjaan', 'detail.satuan', 'detail.volume')
              ->get();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getLaporanProgressKegiatanTerbaru() {

    $result = DB::table('master_laporan_harian as master')
              ->select(DB::raw('kegiatan, SUM(volume) as persen'))
              ->groupBy('kegiatan')
              ->limit(5)
              ->get();

    return response()->json([ 
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);

  }
}
