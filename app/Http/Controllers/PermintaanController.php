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
      'data' => $result
    ]);
  }
}
