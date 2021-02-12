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
      'result' => $result
    ]);
  }

  public function getTotalKonsultan() {

    $result = DB::table('master_konsultan')->count();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getLatestKonsultan() {

    $result = DB::table('master_konsultan')
                ->limit(5)
                ->orderBy('id', 'desc')
                ->get();
    
    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);

  }

  public function getKonsultanById($id) {

    $result = DB::table('master_konsultan')->where('id', $id)->first();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getKonsultanByKeyword(Request $request) {

    $keyword = $request->query("keyword");

    $result = DB::table('master_konsultan')
                ->where('nama', 'like', '%'.$keyword.'%')
                ->orWhere('alamat', 'like', '%'.$keyword.'%')
                ->orWhere('nama_direktur', 'like', '%'.$keyword.'%')
                ->orWhere('se', 'like', '%'.$keyword.'%')
                ->orWhere('ie', 'like', '%'.$keyword.'%')
                ->paginate(15);

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);        
  }
}
