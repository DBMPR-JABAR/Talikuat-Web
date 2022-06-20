<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class KonsultanController extends Controller
{
  public function getAllKonsultan()
  {

    $result = DB::connection('talikuat_old')->table('master_konsultan')->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getTotalKonsultan()
  {

    $result = DB::connection('talikuat_old')->table('master_konsultan')->count();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getLatestKonsultan()
  {

    $result = DB::connection('talikuat_old')->table('master_konsultan')
      ->limit(5)
      ->orderBy('id', 'desc')
      ->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getKonsultanById($id)
  {

    $result = DB::connection('talikuat_old')->table('master_konsultan')->where('id', $id)->first();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getKonsultanByKeyword(Request $request)
  {

    $keyword = $request->query("keyword");

    $result = DB::connection('talikuat_old')->table('master_konsultan')
      ->where('nama', 'like', '%' . $keyword . '%')
      ->orWhere('alamat', 'like', '%' . $keyword . '%')
      ->orWhere('nama_direktur', 'like', '%' . $keyword . '%')
      ->orWhere('se', 'like', '%' . $keyword . '%')
      ->orWhere('ie', 'like', '%' . $keyword . '%')
      ->paginate(15);

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function insertKonsultan(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'nama' => 'required',
      'alamat' => 'required',
      'nama_direktur' => 'required',
      'se' => 'required',
      'ie' => 'required',
      'tgl_update' => 'required'
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => '400',
        'error' => $validator->getMessageBag()->getMessages()
      ], Response::HTTP_BAD_REQUEST);
    }

    $result = DB::connection('talikuat_old')->table('master_konsultan')
      ->insertGetId([
        "nama" => $request->input("nama"),
        "alamat" => $request->input("alamat"),
        "nama_direktur" => $request->input("nama_direktur"),
        "se" => $request->input("se"),
        "ie" => $request->input("ie"),
        "tgl_update" => $request->input("tgl_update")
      ]);


    $newKonsultan = $request->all();
    $newKonsultan['id'] = $result;

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $newKonsultan
    ]);
  }
}
