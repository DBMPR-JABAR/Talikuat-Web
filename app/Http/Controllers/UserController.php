<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;

class UserController extends Controller
{
  public function createUser(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'nm_member' => 'required',
      'nama_lengkap' => 'required',
      'akses' => 'required',
      'jabatan' => 'required',
      'alamat_member' => 'required',
      'telp' => 'required',
      'email' => 'required',
      'nik' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => '400',
        'error' => $validator->getMessageBag()->getMessages()
      ], Response::HTTP_BAD_REQUEST);
    }

    DB::table('member')
      ->insertGetId([
        'nm_member' => $request->input('nm_member'),
        'nama_lengkap' => $request->input('nama_lengkap'),
        'akses' => $request->input('akses'),
        'jabatan' => $request->input('jabatan'),
        'alamat_member' => $request->input('alamat_member'),
        'telp' => $request->input('telp'),
        'email' => $request->input('email'),
        'gambar' => $request->input('gambar'),
        'nik' => $request->input('nik'),
        'level' => $request->input('level'),
        'kantor_id' => $request->input('kantor_id'),
        'perusahaan' => $request->input('perusahaan'),
        'unit' => $request->input('unit'),
        'created_at' => Carbon::now()
      ]);
  }

  public function getAllUser()
  {

    $result = DB::table('member')->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getLatestUser()
  {

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

  public function getUserById($id)
  {

    $result = DB::table('member')->where('id_member', $id)->first();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getAccountByUserId($account_id)
  {

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

  public function getUserByKeyword(Request $request)
  {

    $keyword = $request->query('keyword');

    $result = DB::table('member')
      ->where('nama_lengkap', 'like', '%' . $keyword . '%')
      ->orWhere('email', 'like', '%' . $keyword . '%')
      ->orWhere('perusahaan', 'like', '%' . $keyword . '%')
      ->orWhere('telp', 'like', '%' . $keyword . '%')
      ->paginate(15);

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }
}
