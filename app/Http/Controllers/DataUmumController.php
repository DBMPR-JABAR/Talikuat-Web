<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DataUmumController extends Controller
{

  private $PATH_FILE_DOCUMENTS = "C:\\xampp\\htdocs\\talikuat\\lampiran\\umum";

  public function getLatestDataUmum()
  {

    $result = DB::table('data_umum')
      ->selectRaw('aksi, data_umum.id, konsultan_supervisi, lat_akhir, lat_awal, long_akhir, long_awal, nama_gs, nama_kegiatan, nama_ppk, ruas_jalan, nama_se, nilai_kontrak, no_kontrak, no_spmk, opd, panjang, pemda, penyedia_jasa, pk, ppk, rab, rab1, rab2, rab3, GROUP_CONCAT(ruas_jalan) as ruas_jalan_concat, satuan_panjang, satuan_waktu, data_umum_ruas.segmen_jalan, sk, sm, tgl_input, tgl_kontrak, tgl_spmk, tgl_update, ul_jadual, ul_jaminan, ul_rencana, ul_spek, ul_spkmp, ul_spl, ul_spmk, ul_sppbj, unit, kantor.nama_kantor as unor, data_umum.user as user, waktu_pelaksanaan, wp')
      ->join('data_umum_ruas', 'data_umum.id', '=', 'data_umum_ruas.id')
      ->join('kantor', 'data_umum.unor', '=', 'kantor.id_kantor')
      ->groupBy('data_umum.id')
      ->orderBy('data_umum.id', 'desc')
      ->limit(5)
      ->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getDataUmumByKeyword(Request $request)
  {

    $keyword = $request->query("keyword");

    $result = DB::table('data_umum')
      ->selectRaw('aksi, data_umum.id, konsultan_supervisi, lat_akhir, lat_awal, long_akhir, long_awal, nama_gs, nama_kegiatan, nama_ppk, ruas_jalan, nama_se, nilai_kontrak, no_kontrak, no_spmk, opd, panjang, pemda, penyedia_jasa, pk, ppk, rab, rab1, rab2, rab3, GROUP_CONCAT(ruas_jalan) as ruas_jalan_concat, satuan_panjang, satuan_waktu, data_umum_ruas.segmen_jalan, sk, sm, tgl_input, tgl_kontrak, tgl_spmk, tgl_update, ul_jadual, ul_jaminan, ul_rencana, ul_spek, ul_spkmp, ul_spl, ul_spmk, ul_sppbj, unit, kantor.nama_kantor as unor, data_umum.user as user, waktu_pelaksanaan, wp')
      ->join('data_umum_ruas', 'data_umum.id', '=', 'data_umum_ruas.id')
      ->join('kantor', 'data_umum.unor', '=', 'kantor.id_kantor')
      ->groupBy('data_umum.id')
      ->having('data_umum.nama_kegiatan', 'like', '%' . $keyword . '%')
      ->orHaving('ruas_jalan_concat', 'like', '%' . $keyword . '%')
      ->orHaving('unor', 'like', '%' . $keyword . '%')
      ->orHaving('data_umum.id', $keyword)
      ->paginate(15);

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getAllKategori(Request $request)
  {

    $result = DB::table('kategori_paket')->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function insertDataUmum(Request $request)
  // cek lagi untuk mobile ada yang di ganti :)              <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
  {
    date_default_timezone_set('Asia/Jakarta');
    $validator = Validator::make($request->all(), [
      // Data Umum
      "pemda" => "required",
      "opd" => "required",
      "unor" => "required",
      "nm_paket"=>"required",
      "kategori" => "required",
      "no_kontrak" => "required",
      "tgl_kontrak" => "required",
      "nilai_kontrak" => "required",
      "no_spmk" => "required",
      "tgl_spmk" => "required",
      "panjang" => "required",
      "lama_waktu" => "required",
      "ppk_kegiatan" => "required",
      "penyedia" => "required",
      "konsultan" => "required",
      "nama_ppk" => "required",
      "nama_se" => "required",
      "nama_gs" => "required",

      // List Data Umum Ruas
      // "list_data_umum_ruas" => "required|json",
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => '400',
        'error' => $validator->getMessageBag()->getMessages()
      ], Response::HTTP_BAD_REQUEST);
    }

    $data = [
      // Data Umum
      'pemda' => $request->input("pemda"),
      "opd" => $request->input("opd"),
      "unor" => $request->input("unor"),
      "kategori" => $request->input("kategori"),
      "nm_paket" => $request->input("nm_paket"),
      "no_kontrak" => $request->input("no_kontrak"),
      "tgl_kontrak" => $request->input("tgl_kontrak"),
      "nilai_kontrak" => $request->input("nilai_kontrak"),
      "no_spmk" => $request->input("no_spmk"),
      "tgl_spmk" => $request->input("tgl_spmk"),
      "panjang_km" => $request->input("panjang"),
      "lama_waktu" => $request->input("lama_waktu"),
      "ppk" => $request->input("ppk_kegiatan"),
      "penyedia" => $request->input("penyedia"),
      "konsultan" => $request->input("konsultan"),
      "nm_ppk" => $request->input("nama_ppk"),
      "nm_se" => $request->input("nama_se"),
      "nm_gs" => $request->input("nama_gs"),
      "is_adendum"=>0,
      "created_at"=>\Carbon\Carbon::now()
    ];

    $insertedDataUmumId = DB::table('data_umum')->insertGetId($data);



    // List Ruas Jalan
    if($request->list_data_umum_ruas){
    $listDataUmumRuas = json_decode($request->input('list_data_umum_ruas'));

    foreach ($listDataUmumRuas as $dataUmumRuas) {
      if (
        !isNotNullOrBlank($dataUmumRuas->ruas_jalan) ||
        !isNotNullOrBlank($dataUmumRuas->segmen_jalan) ||
        !isNotNullOrBlank($dataUmumRuas->lat_awal) ||
        !isNotNullOrBlank($dataUmumRuas->long_awal) ||
        !isNotNullOrBlank($dataUmumRuas->lat_akhir) ||
        !isNotNullOrBlank($dataUmumRuas->long_akhir)
      ) {
        return response()->json([
          'status' => 'failed',
          'code' => '400',
          'error' => 'Data Umum Ruas Ada Yang Kosong Atau Null'
        ], Response::HTTP_BAD_REQUEST);
      }
    }
 

    foreach ($listDataUmumRuas as $dataUmumRuas) {
      DB::table('data_umum_ruas')->insert([
        "id_data_umum" => $insertedDataUmumId, // diganti sesuai DB
        "ruas_jalan" => $dataUmumRuas->ruas_jalan,
        "segmen_jalan" => $dataUmumRuas->segmen_jalan,
        "lat_awal" => $dataUmumRuas->lat_awal,
        "long_awal" => $dataUmumRuas->long_awal,
        "lat_akhir" => $dataUmumRuas->lat_akhir,
        "long_akhir" => $dataUmumRuas->long_akhir,
        "created_at"=>\Carbon\Carbon::now()
      ]);
    }
    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $data
    ]);
 }else{
   for ($i=0; $i <count($request->ruas_jalan) ; $i++) { 
     DB::table("data_umum_ruas")->insert([
      "id_data_umum"=>$insertedDataUmumId,
      "ruas_jalan"=>$request->ruas_jalan[$i],
      "segment_jalan"=>$request->segmen_jalan[$i],
      "lat_awal"=>$request->lat_awal[$i],
      "long_awal"=>$request->long_awal[$i],
      "lat_akhir"=>$request->lat_akhir[$i],
      "long_akhir"=>$request->long_akhir[$i],
      "created_at"=>\Carbon\Carbon::now()
     ]);
   }
 }
    $data['id'] = $insertedDataUmumId;
    // $data['list_data_umum_ruas'] = $listDataUmumRuas;

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $insertedDataUmumId
    ]);
  }

  public function getDataUmumRuasById(Request $request)
  {

    $result = DB::table('data_umum_ruas')
      ->where('id', '=', $request->input("id_data_umum"))
      ->where(function ($query) use ($request) {
        $query->where('ruas_jalan', 'like', '%' . $request->input('keyword') . '%')
          ->orWhere('segmen_jalan', 'like', '%' . $request->input('keyword') . '%');
      })
      ->paginate(15);

    foreach ($result as $key => $value) {
      $value->id = $key + 1;
    }

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }
}
