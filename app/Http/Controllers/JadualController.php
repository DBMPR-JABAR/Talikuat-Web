<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadualController extends Controller
{
  public function getAllJadual() {

    $result = DB::table('jadual')->get();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'data' => $result
    ]);
  }

  public function getDetailJadual($id) {

    $jadual = DB::table('jadual')->where('id', $id)->first();

    $detail_jadual = DB::table('detail_jadual')->where('id', $id)->get();

    $jadual->detail_jadual = $detail_jadual;

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'data' => $jadual
    ]);
  }
}
