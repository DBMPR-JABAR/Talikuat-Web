<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketController extends Controller
{
  public function getAllPaket() {

    $result = DB::table('data_umum')
                  ->join('data_umum_ruas', 'data_umum.id', '=', 'data_umum_ruas.id')
                  ->selectRaw('*, GROUP_CONCAT(ruas_jalan) as ruas_jalan')
                  ->groupBy('data_umum_ruas.id')
                  ->get();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getTotalPaket() {

    $result = DB::table('data_umum')
                  ->join('data_umum_ruas', 'data_umum.id', '=', 'data_umum_ruas.id')
                  ->selectRaw('*, GROUP_CONCAT(ruas_jalan) as ruas_jalan')
                  ->groupBy('data_umum_ruas.id')
                  ->get();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => sizeof($result)
    ]);
  }

  public function getPaketById($id) {

    $data_umum = DB::table('data_umum')->where('id', $id)->first();

    $data_umum_ruas = DB::table('data_umum_ruas')->where('id', $id)->get();

    $data_umum->data_umum_ruas = $data_umum_ruas;

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $data_umum
    ]);
  }
}
