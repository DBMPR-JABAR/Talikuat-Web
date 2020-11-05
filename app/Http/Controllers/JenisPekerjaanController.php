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
      'data' => $result
    ]);
  }

  public function getJenisPekerjaanById($id) {

    $result = DB::table('master_jenis_pekerjaan')->where('id', $id)->first();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'data' => $result
    ]);
  }
}
