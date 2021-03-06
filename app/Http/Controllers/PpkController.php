<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class PpkController extends Controller
{
  public function getAllPpk()
  {

    $result = DB::connection('talikuat_old')->table('master_ppk')->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getTotalPpk()
  {

    $result = DB::connection('talikuat_old')->table('master_ppk')->count();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getLatestPpk()
  {

    $result = DB::connection('talikuat_old')->table('master_ppk')
      ->limit(5)
      ->orderBy('id', 'desc')
      ->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getPpkById($id)
  {

    $result = DB::connection('talikuat_old')->table('master_ppk')->where('id', $id)->first();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getPpkByKeyword(Request $request)
  {

    $keyword = $request->query('keyword');

    $result = DB::connection('talikuat_old')->table('master_ppk')
      ->where('nama', 'like', '%' . $keyword . '%')
      ->orWhere('alamat', 'like', '%' . $keyword . '%')
      ->paginate(15);

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function insertPpk(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'nama' => 'required',
      'alamat' => 'required',
      'tgl_update' => 'required'
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => '400',
        'error' => $validator->getMessageBag()->getMessages()
      ], Response::HTTP_BAD_REQUEST);
    }

    $result = DB::connection('talikuat_old')->table('master_ppk')
      ->insertGetId([
        "nama" => $request->input("nama"),
        "alamat" => $request->input("alamat"),
        "tgl_update" => $request->input("tgl_update")
      ]);


    $newPpk = $request->all();
    $newPpk['id'] = $result;

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $newPpk
    ]);
  }
}
