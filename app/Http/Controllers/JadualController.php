<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadualController extends Controller
{
  public function getAllJadual()
  {

    $result = DB::table('jadual')->paginate(15);

    return response()->json($result);
  }

  public function getLatestJadual()
  {

    $result = DB::table('jadual')
      ->limit(5)
      ->orderBy('id', 'desc')
      ->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getDetailJadual($id)
  {

    $jadual = DB::table('jadual')->where('id', $id)->first();

    $detail_jadual = DB::table('detail_jadual')->where('id', $id)->get();

    $jadual->detail_jadual = $detail_jadual;

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $jadual
    ]);
  }

  public function getJadualByKeyword(Request $request)
  {

    $keyword = $request->query("keyword");

    $result = DB::table("jadual")
      ->where("kegiatan", "like", "%" . $keyword . "%")
      ->orWhere("ppk", "like", "%" . $keyword . "%")
      ->orWhere("id", $keyword)
      ->orWhere("waktu_pelaksanaan", $keyword)
      ->orWhere("panjang", $keyword)
      ->paginate(15);

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }
}
