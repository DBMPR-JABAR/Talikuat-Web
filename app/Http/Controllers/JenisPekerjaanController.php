<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class JenisPekerjaanController extends Controller
{
  public function getAllJenisPekerjaan()
  {

    $result = DB::table('master_jenis_pekerjaan')->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getLatestJenisPekerjaan()
  {

    $result = DB::table('master_jenis_pekerjaan')
      ->limit(5)
      ->orderBy('id', 'desc')
      ->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getJenisPekerjaanById($id)
  {

    $result = DB::table('master_jenis_pekerjaan')->where('id', $id)->first();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getJenisPekerjaanByKeyword(Request $request)
  {

    $keyword = $request->query("keyword");

    $result = DB::table('master_jenis_pekerjaan')
      ->where('jenis_pekerjaan', 'like', '%' . $keyword . '%')
      ->orWhere('satuan', 'like', '%' . $keyword . '%')
      ->paginate(15);

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function insertJenisPekerjaan(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'id' => 'required',
      'jenis_pekerjaan' => 'required',
      'satuan' => 'required',
      'tgl_input' => 'required',
      'tgl_update' => 'required'
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => '400',
        'error' => $validator->getMessageBag()->getMessages()
      ], Response::HTTP_BAD_REQUEST);
    }

    $result = DB::table('master_jenis_pekerjaan')
      ->insertGetId([
        "id" => $request->input("id"),
        "jenis_pekerjaan" => $request->input("jenis_pekerjaan"),
        "satuan" => $request->input("satuan"),
        "tgl_input" => $request->input("tgl_input"),
        "tgl_update" => $request->input("tgl_update")
      ]);

    $newJenisPekerjaan = $request->all();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $newJenisPekerjaan
    ]);
  }
}
