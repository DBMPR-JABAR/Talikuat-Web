<?php

namespace App\Http\Controllers;

use App\Imports\JadualImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Validator;

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

  public function insertJadual(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');
    $validator = Validator::make($req->all(), [
      // Data Umum
      "bobot" => "required",
      "harga_satuan" => "required",
      "jumlah_harga" => "required",
      "nm_paket"=>"required",
      "koefisien" => "required",
      "konsultan" => "required",
      "nama_ppk" => "required",
      "nilai_kontrak" => "required",
      "nilai"=>"required",
      "nmp"=>"required",
      "panjang"=>"required",
      "ruas_jalan"=>"required",
      "satuan"=>"required",
      "tgl" => "required",
      "unor" => "required",
      "uraian"=>"required",
      "userId"=>"required",
      "volume"=>"required",
      "panjang" => "required",
      "ppk" => "required",
      "penyedia" => "required",
      "konsultan" => "required",
      "nama_ppk" => "required",
      "waktu"=>"required"
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => '400',
        'error' => $validator->getMessageBag()->getMessages()
      ],400);
    }

    $waktu = str_replace(" Hari","",$req->waktu);
    $panjang = str_replace(" Km","",$req->panjang);
    $volume = array_sum($req->volume);
    $get_id = DB::table('jadual')->insertGetId([
      "id_data_umum"=>$req->id_data_umum,
      "nmp"=>$req->nmp[0],
      "user"=>$req->userId,
      "unor"=>$req->unor,
      "nm_paket"=>$req->nm_paket,
      "ruas_jalan"=>$req->ruas_jalan,
      "lama_waktu"=>$waktu,
      "ppk"=>$req->ppk,
      "nm_ppk"=>$req->nama_ppk,
      "penyedia"=>$req->penyedia,
      "konsultan"=>$req->konsultan,
      "nilai_kontrak"=>$req->nilai_kontrak,
      "panjang_km"=>$panjang,
      "created_at"=>\Carbon\Carbon::now(),
        "satuan"=>$req->satuan[0],
        "harga_satuan"=>$req->harga_satuan[0],
        "volume"=>$volume,
        "jumlah_harga"=>$req->jumlah_harga[0],
        "bobot"=>$req->bobot[0],
        "uraian"=>$req->uraian[0]
    ]);



      $arr = array();
    for ($i=0; $i <count($req->nmp) ; $i++) { 
      $arr[]=array(
        "id_jadual"=>$get_id,
        "tgl"=>$req->tgl[$i],
        "nmp"=>$req->nmp[$i],
        "uraian"=>$req->uraian[$i],
        "satuan"=>$req->satuan[$i],
        "harga_satuan"=>$req->harga_satuan[$i],
        "volume"=>$req->volume[$i],
        "jumlah_harga"=>$req->jumlah_harga[$i],
        "bobot"=>$req->bobot[$i],
        "koefisien"=>$req->koefisien[$i],
        "nilai"=>$req->nilai[$i],
        "created_at"=>\Carbon\Carbon::now()
      );
    }
    DB::table('detail_jadual')->insert($arr);


    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => 'Data Tersimpan'
    ]);
  }

  public function excelToData(Request $request)
  {

    $file = $request->file('jadual_excel_file');

    $list_jadual = Excel::toCollection(new JadualImport, $file)[0];

    foreach ($list_jadual as $jadual) {
      $jadual['tanggal'] = date("Y-n-d", Date::excelToTimestamp($jadual['tanggal']));
    }

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $list_jadual
    ]);
  }

  
  public function getNmpByid($id){
    $get = DB::table('master_jenis_pekerjaan')->where('id','=',$id)->first();
    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $get
    ]);
  }


  public function deleteallnmp(Request $req){

    DB::table('jadual')->where('id','=',$req->id)->delete();
    DB::table('detail_jadual')->where('nmp','=',$req->nmp)->delete();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => "oke"
    ]);
  }

  public function updateJadual(Request $req)
  {
    $volume = array_sum($req->volume);
    DB::table('jadual')->where('id','=',$req->id_jadual)->update([
      "volume"=>$volume
    ]);
    date_default_timezone_set('Asia/Jakarta');
    for ($i=0; $i <count($req->nmp) ; $i++) { 
      DB::table('detail_jadual')->where([
        ['id_jadual','=',$req->id_jadual],
        ['nmp','=',$req->id_nmp]
        ])->delete();
    }
      $arr = array();
      for ($i=0; $i <count($req->nmp) ; $i++) { 
        $arr[]=array(
          "id_jadual"=>$req->id_jadual,
          "tgl"=>$req->tgl[$i],
          "nmp"=>$req->nmp[$i],
          "uraian"=>$req->uraian[$i],
          "satuan"=>$req->satuan[$i],
          "harga_satuan"=>$req->harga_satuan[$i],
          "volume"=>$req->volume[$i],
          "jumlah_harga"=>$req->jumlah_harga[$i],
          "bobot"=>$req->bobot[$i],
          "koefisien"=>$req->koefisien[$i],
          "nilai"=>$req->nilai[$i],
          "created_at"=>\Carbon\Carbon::now()
        );
      }

      DB::table('detail_jadual')->insert($arr);
    return response()->json([
      "code"=>200
    ]);
  }


}
