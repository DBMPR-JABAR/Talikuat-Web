<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermintaanController extends Controller
{
  public function getAllPermintaan() {

    $result = DB::table('request')->get();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getLatestPermintaan() {

    $result = DB::table('request')
                ->limit(5)
                ->orderBy('id', 'desc')
                ->get();
    

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getPermintaanByKeyword(Request $request) {

    $keyword = $request->query("keyword");

    $result = DB::table("request")
                ->where("nama_kegiatan", "like", "%".$keyword."%")
                ->orWhere("id", $keyword)
                ->orWhere("diajukan_tgl", "like", "%".$keyword."%")
                ->orWhere("lokasi_sta", "like", "%".$keyword."%")
                ->orWhere("jenis_pekerjaan", "like", "%".$keyword."%")
                ->orWhere("volume", "like", "%".$keyword."%")
                ->paginate(15);

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }
}
