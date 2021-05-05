<?php

namespace App\Http\Controllers;

use App\Imports\JadualImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
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
    ],);
  }

  public function insertJadualFromMobile(Request $req)
  {
    $validator = Validator::make($req->all(), [
      'id_data_umum' => 'required',
      'user' => 'required',
      'unor' => 'required',
      'nm_paket' => 'required',
      'ruas_jalan' => 'required',
      'lama_waktu' => 'required',
      'panjang_km' => 'required',
      'ppk' => 'required',
      'nm_ppk' => 'required',
      'penyedia' => 'required',
      'konsultan' => 'required',
      'nilai_kontrak' => 'required',
      'list_jadual' => 'present|array',
      'list_jadual.*.bobot' => 'required',
      'list_jadual.*.harga_satuan' => 'required',
      'list_jadual.*.jumlah_harga' => 'required',
      'list_jadual.*.koefisien' => 'required',
      'list_jadual.*.nilai' => 'required',
      'list_jadual.*.no_mata_pembayaran' => 'required',
      'list_jadual.*.satuan' => 'required',
      'list_jadual.*.tanggal' => 'required',
      'list_jadual.*.uraian' => 'required',
      'list_jadual.*.volume' => 'required'
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => 400,
        'error' => $validator->getMessageBag()->getMessages()
      ], Response::HTTP_BAD_REQUEST);
    }

    $list_jadual = array();

    foreach ($req->input('list_jadual') as $index => $jadual_item) {

      if ($index == 0 && count($req->input('list_jadual')) != 0) {
        array_push($list_jadual, [
          'id_data_umum' => $req->input('id_data_umum'),
          'nmp' => $jadual_item['no_mata_pembayaran'],
          'user' => $req->input('user'),
          'unor' => $req->input('unor'),
          'id_sup' => $req->input('id_sup'),
          'nm_paket' => $req->input('nm_paket'),
          'ruas_jalan' => $req->input('ruas_jalan'),
          'lama_waktu' => $req->input('lama_waktu'),
          'panjang_km' => $req->input('panjang_km'),
          'ppk' => $req->input('ppk'),
          'nm_ppk' => $req->input('nm_ppk'),
          'penyedia' => $req->input('penyedia'),
          'konsultan' => $req->input('konsultan'),
          'satuan' => $jadual_item['satuan'],
          'harga_satuan' => $jadual_item['harga_satuan'],
          'jumlah_harga' => $jadual_item['jumlah_harga'],
          'bobot' => $jadual_item['bobot'],
          'volume' => $jadual_item['volume'],
          'nilai_kontrak' => $req->input('nilai_kontrak'),
          'uraian' => $jadual_item['uraian'],
          'created_at' => \Carbon\Carbon::now()
        ]);
      } else {

        $index_found_item = -1;

        foreach ($list_jadual as $index => $temp_jadual) {
          if ($jadual_item['no_mata_pembayaran'] == $temp_jadual['nmp']) {
            $index_found_item = $index;
            break;
          }
        }

        if ($index_found_item != -1) {
          $list_jadual[$index_found_item]['volume'] += $jadual_item['volume'];
          $list_jadual[$index_found_item]['jumlah_harga'] += $jadual_item['jumlah_harga'];
          $list_jadual[$index_found_item]['bobot'] += $jadual_item['bobot'];
        } else {
          array_push($list_jadual, [
            'id_data_umum' => $req->input('id_data_umum'),
            'nmp' => $jadual_item['no_mata_pembayaran'],
            'user' => $req->input('user'),
            'unor' => $req->input('unor'),
            'id_sup' => $req->input('id_sup'),
            'nm_paket' => $req->input('nm_paket'),
            'ruas_jalan' => $req->input('ruas_jalan'),
            'lama_waktu' => $req->input('lama_waktu'),
            'panjang_km' => $req->input('panjang_km'),
            'ppk' => $req->input('ppk'),
            'nm_ppk' => $req->input('nm_ppk'),
            'penyedia' => $req->input('penyedia'),
            'konsultan' => $req->input('konsultan'),
            'satuan' => $jadual_item['satuan'],
            'harga_satuan' => $jadual_item['harga_satuan'],
            'jumlah_harga' => $jadual_item['jumlah_harga'],
            'bobot' => $jadual_item['bobot'],
            'volume' => $jadual_item['volume'],
            'nilai_kontrak' => $req->input('nilai_kontrak'),
            'uraian' => $jadual_item['uraian'],
            'created_at' => \Carbon\Carbon::now()
          ]);
        }
      }
    }

    foreach ($list_jadual as $rincian_jadual) {
      $id_jadual = DB::table('jadual')->insertGetId($rincian_jadual);
      foreach ($req->input('list_jadual') as $detail_jadual) {
        if ($detail_jadual['no_mata_pembayaran'] == $rincian_jadual['nmp']) {
          DB::table('detail_jadual')->insert([
            'id_jadual' => $id_jadual,
            'tgl' => date('Y-m-d', strtotime($detail_jadual['tanggal'])),
            'nmp' => $detail_jadual['no_mata_pembayaran'],
            'uraian' => $detail_jadual['uraian'],
            'satuan' => $detail_jadual['satuan'],
            'harga_satuan' => $detail_jadual['harga_satuan'],
            'volume' => $detail_jadual['volume'],
            'jumlah_harga' => $detail_jadual['jumlah_harga'],
            'bobot' => $detail_jadual['bobot'],
            'koefisien' => $detail_jadual['koefisien'],
            'nilai' => $detail_jadual['nilai'],
            'created_at' => \Carbon\Carbon::now()
          ]);
        }
      }
    }

    return response()->json([
      'status' => 'success',
      'code' => 201
    ], Response::HTTP_CREATED);
  }

  public function insertJadual(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');
    $validator = Validator::make($req->all(), [
      // Data Umum
      "bobot" => "required",
      "harga_satuan" => "required",
      "jumlah_harga" => "required",
      "nm_paket" => "required",
      "koefisien" => "required",
      "konsultan" => "required",
      "nama_ppk" => "required",
      "nilai_kontrak" => "required",
      "nilai" => "required",
      "nmp" => "required",
      "panjang" => "required",
      "ruas_jalan" => "required",
      "satuan" => "required",
      "tgl" => "required",
      "unor" => "required",
      "uraian" => "required",
      "userId" => "required",
      "volume" => "required",
      "panjang" => "required",
      "ppk" => "required",
      "penyedia" => "required",
      "konsultan" => "required",
      "nama_ppk" => "required",
      "waktu" => "required"
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => '400',
        'error' => $validator->getMessageBag()->getMessages()
      ], Response::HTTP_BAD_REQUEST);
    }

    $waktu = str_replace(" Hari", "", $req->waktu);
    $panjang = str_replace(" Km", "", $req->panjang);
    $get_id = DB::table('jadual')->insertGetId([
      "id_data_umum" => $req->id_data_umum,
      "nmp" => $req->nmp[0],
      "user" => $req->userId,
      "unor" => $req->unor,
      "nm_paket" => $req->nm_paket,
      "ruas_jalan" => $req->ruas_jalan,
      "lama_waktu" => $waktu,
      "ppk" => $req->ppk,
      "nm_ppk" => $req->nama_ppk,
      "penyedia" => $req->penyedia,
      "konsultan" => $req->konsultan,
      "nilai_kontrak" => $req->nilai_kontrak,
      "panjang_km" => $panjang,
      "created_at" => \Carbon\Carbon::now(),
      "satuan" => $req->satuan[0],
      "harga_satuan" => preg_replace('/\./', '', $req->harga_satuan[0]),
      "volume" => $req->volume[0],
      "jumlah_harga" => preg_replace('/\./', '', $req->jumlah_harga[0]),
      "bobot" => $req->bobot[0],
      "uraian" => $req->uraian[0]
    ]);



    $arr = array();
    for ($i = 0; $i < count($req->nmp); $i++) {
      $arr[] = array(
        "id_jadual" => $get_id,
        "tgl" => $req->tgl[$i],
        "nmp" => $req->nmp[$i],
        "uraian" => $req->uraian[$i],
        "satuan" => $req->satuan[$i],
        "harga_satuan" => preg_replace('/\./', '', $req->harga_satuan[$i]),
        "volume" => $req->volume[$i],
        "jumlah_harga" => preg_replace('/\./', '', $req->jumlah_harga[$i]),
        "bobot" => $req->bobot[$i],
        "koefisien" => $req->koefisien[$i],
        "nilai" => $req->nilai[$i],
        "created_at" => \Carbon\Carbon::now()
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


  public function getNmpByid($id)
  {
    $get = DB::table('master_jenis_pekerjaan')->where('id', '=', $id)->first();
    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $get
    ]);
  }


  public function deleteallnmp(Request $req)
  {

    DB::table('jadual')->where('id', '=', $req->id)->delete();
    DB::table('detail_jadual')->where('nmp', '=', $req->nmp)->delete();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => "oke"
    ]);
  }

  public function updateJadual(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');
    DB::table('jadual')->where('id', '=', $req->id_jadual)->update([
        "uraian" => $req->uraian[0],
        "satuan" => $req->satuan[0],
        "harga_satuan" => preg_replace('/\./', '', $req->harga_satuan[0]),
        "volume" => $req->volume[0],
        "jumlah_harga" => preg_replace('/\./', '', $req->jumlah_harga[0]),
        "bobot" => $req->bobot[0],
        "updated_at" => \Carbon\Carbon::now()
    ]);
    for ($i = 0; $i < count($req->nmp); $i++) {
      DB::table('detail_jadual')->where([
        ['id_jadual', '=', $req->id_jadual],
        ['nmp', '=', $req->id_nmp]
      ])->delete();
    }
    $arr = array();
    for ($i = 0; $i < count($req->nmp); $i++) {
      $arr[] = array(
        "id_jadual" => $req->id_jadual,
        "tgl" => $req->tgl[$i],
        "nmp" => $req->nmp[$i],
        "uraian" => $req->uraian[$i],
        "satuan" => $req->satuan[$i],
        "harga_satuan" => preg_replace('/\./', '', $req->harga_satuan[$i]),
        "volume" => $req->volume[$i],
        "jumlah_harga" => preg_replace('/\./', '', $req->jumlah_harga[$i]),
        "bobot" => $req->bobot[$i],
        "koefisien" => $req->koefisien[$i],
        "nilai" => $req->nilai[$i],
        "created_at" => \Carbon\Carbon::now()
      );
    }

    DB::table('detail_jadual')->insert($arr);

    return response()->json([
      "code" => 200
    ]);
  }

  public function getJadualByDataUmumId($id)
  {
    $result = DB::table('jadual')
      ->where('id_data_umum', '=', $id)
      ->get();

    return response()->json([
      'status' => 'success',
      'code' => 200,
      'result' => $result
    ]);
  }

  public function getJadualByDataUmumIdAndNmp(Request $req)
  {
    $id_data_umum = $req->input('id_data_umum');
    $nmp = $req->input('nmp');

    $result = DB::table('jadual')
      ->where('id_data_umum', '=', $id_data_umum)
      ->where('nmp', '=', $nmp)
      ->first();

    return response()->json([
      'status' => 'success',
      'code' => 200,
      'result' => $result
    ]);
  }
}
