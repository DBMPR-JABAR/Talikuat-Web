<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisPekerjaanController extends Controller
{
  public function getAllJenisPekerjaan() {

    $result = DB::table('master_jenis_pekerjaan')->get();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getLatestJenisPekerjaan() {

    $result = DB::table('master_jenis_pekerjaan')
                ->limit(5)
                ->orderBy('id', 'desc')
                ->get();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
    
  }

  public function getJenisPekerjaanById($id) {

    $result = DB::table('master_jenis_pekerjaan')->where('id', $id)->first();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getJenisPekerjaanByKeyword(Request $request) {

    $keyword = $request->query("keyword");

    $result = DB::table('master_jenis_pekerjaan')
                ->where('jenis_pekerjaan', 'like', '%'.$keyword.'%')
                ->orWhere('satuan', 'like', '%'.$keyword.'%')
                ->paginate(15);

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }
}
