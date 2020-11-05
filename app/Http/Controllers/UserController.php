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
        'data' => $result
      ]);
    }

    public function getUserById($id) {

      $result = DB::table('member')->where('id_member', $id)->first();

      return response()->json([
        'status' => 'success', 
        'code' => '200', 
        'data' => $result
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
        'data' => $result
      ]);
    }
}
