<?php

namespace App\Http\Controllers;

use App\Imports\JadualImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

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

  public function parseJadualExcelFile(Request $request)
  {

    $file = $request->file('jadual_excel_file');

    $list_jadual = Excel::toCollection(new JadualImport, $file)[0];

    foreach ($list_jadual as $jadual) {
      $jadual['tanggal'] = date("d F Y", Date::excelToTimestamp($jadual['tanggal']));
    }

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $list_jadual
    ]);
  }

  public function insertJadual(Request $request)
  {
    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $request->all()
    ]);
  }

  public function excelToData(Request $request)
  {

    $file = $request->file('jadual_excel_file');

    $list_jadual = Excel::toCollection(new JadualImport, $file)[0];

    foreach ($list_jadual as $jadual) {
      $jadual['tanggal'] = date("j -n- Y", Date::excelToTimestamp($jadual['tanggal']));
    }

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $list_jadual
    ]);
  }
}
