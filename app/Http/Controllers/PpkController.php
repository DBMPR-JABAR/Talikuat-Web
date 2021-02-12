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
      'result' => $result
    ]);
  }

  public function getTotalPpk() {

    $result = DB::table('master_ppk')->count();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getLatestPpk() {

    $result = DB::table('master_ppk')
                ->limit(5)
                ->orderBy('id', 'desc')
                ->get();
    
    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);           
  }

  public function getPpkById($id) {

    $result = DB::table('master_ppk')->where('id', $id)->first();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getPpkByKeyword(Request $request) {

    $keyword = $request->query('keyword');

    $result = DB::table('master_ppk')
                ->where('nama', 'like', '%'.$keyword.'%')
                ->orWhere('alamat', 'like', '%'.$keyword.'%')
                ->paginate(15);

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }
}
