<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function getAllUser() {
      
    $result = DB::table('member')->get();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getLatestUser() {

    $result = DB::table('member')
                ->limit(5)
                ->orderBy('id_member', 'desc')
                ->get();
    
    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);

  }

  public function getUserById($id) {

    $result = DB::table('member')->where('id_member', $id)->first();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getAccountByUserId($account_id) {

    $result = DB::table('member')
              ->join('login', 'login.id_member', '=', 'member.id_member')
              ->where('login.id_member', $account_id)
              ->select('login.*', 'member.*')
              ->first();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getUserByKeyword(Request $request) {

    $keyword = $request->query('keyword');

    $result = DB::table('member')
                ->where('nama_lengkap', 'like', '%'.$keyword.'%')
                ->orWhere('email', 'like', '%'.$keyword.'%')
                ->orWhere('perusahaan', 'like', '%'.$keyword.'%')
                ->orWhere('telp', 'like', '%'.$keyword.'%')
                ->paginate(15);

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }
}
