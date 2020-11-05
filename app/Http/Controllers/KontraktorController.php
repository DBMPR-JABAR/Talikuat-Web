<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontraktorController extends Controller
{
  public function getAllKontraktor() {
    
    $result = DB::table('master_penyedia_jasa')->get();
    
    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'data' => $result
    ]);
  }

  public function getKontraktorById($id) {
    
    $result = DB::table('master_penyedia_jasa')->where('id', $id)->first();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'data' => $result
    ]);
  }
}
