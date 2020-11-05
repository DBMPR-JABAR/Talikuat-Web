<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PpkController extends Controller
{
  public function getAllPpk() {

    $result = DB::table('master_ppk')->get();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'data' => $result
    ]);
  }

  public function getPpkById($id) {

    $result = DB::table('master_ppk')->where('id', $id)->first();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'data' => $result
    ]);
  }
}
