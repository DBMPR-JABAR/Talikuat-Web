<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsultanController extends Controller
{
  public function getAllKonsultan() {

    $result = DB::table('master_konsultan')->get();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'data' => $result
    ]);
  }

  public function getKonsultanById($id) {

    $result = DB::table('master_konsultan')->where('id', $id)->first();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'data' => $result
    ]);
  }
}
