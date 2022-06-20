<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class KontraktorController extends Controller
{
  public function getAllKontraktor()
  {

    $result = DB::connection('talikuat_old')->table('master_penyedia_jasa')->paginate(15);

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getTotalKontraktor()
  {

    $result = DB::connection('talikuat_old')->table('master_penyedia_jasa')->count();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getLatestKontraktor()
  {

    $result = DB::connection('talikuat_old')->table('master_penyedia_jasa')
      ->limit(5)
      ->orderBy('id', 'desc')
      ->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getKontraktorById($id)
  {

    $result = DB::connection('talikuat_old')->table('master_penyedia_jasa')->where('id', $id)->first();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getKontraktorByKeyword(Request $request)
  {

    $keyword = $request->query('keyword');

    $result = DB::connection('talikuat_old')->table('master_penyedia_jasa')
      ->where('nama', 'like', '%' . $keyword . '%')
      ->orWhere('alamat', 'like', '%' . $keyword . '%')
      ->orWhere('nama_direktur', 'like', '%' . $keyword . '%')
      ->paginate(15);

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function insertKontraktor(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'nama' => 'required',
      'alamat' => 'required',
      'nama_direktur' => 'required',
      'npwp' => 'required',
      'telp' => 'required',
      'bank' => 'required',
      'no_rek' => 'required',
      'tgl_update' => 'required'
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => '400',
        'error' => $validator->getMessageBag()->getMessages()
      ], Response::HTTP_BAD_REQUEST);
    }

    $result = DB::connection('talikuat_old')->table('master_penyedia_jasa')
      ->insertGetId([
        "nama" => $request->input("nama"),
        "alamat" => $request->input("alamat"),
        "nama_direktur" => $request->input("nama_direktur"),
        "nama_gs" => "",
        "npwp" => $request->input("npwp"),
        "telp" => $request->input("telp"),
        "bank" => $request->input("bank"),
        "no_rek" => $request->input("no_rek"),
        "tgl_update" => $request->input("tgl_update")
      ]);


    $newKontraktor = $request->all();
    $newKontraktor['id'] = $result;

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $newKontraktor
    ]);
  }
}
