<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontraktorController extends Controller
{
  public function getAllKontraktor() {
    
    $result = DB::table('master_penyedia_jasa')->paginate(15);

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getTotalKontraktor() {

    $result = DB::table('master_penyedia_jasa')->count();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getLatestKontraktor() {

    $result = DB::table('master_penyedia_jasa')
                  ->limit(5)
                  ->orderBy('id', 'desc')
                  ->get();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);

  }

  public function getKontraktorById($id) {
    
    $result = DB::table('master_penyedia_jasa')->where('id', $id)->first();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);

  }

  public function getKontraktorByKeyword(Request $request) {

    $keyword = $request->query('keyword');

    $result = DB::table('master_penyedia_jasa')
              ->where('nama', 'like', '%'.$keyword.'%')
              ->orWhere('alamat', 'like', '%'.$keyword.'%')
              ->orWhere('nama_direktur', 'like', '%'.$keyword.'%')
              ->paginate(15);

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }
}
