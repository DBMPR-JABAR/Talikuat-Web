<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PermintaanController extends Controller
{
  private $PATH_FILE_DB = "public/lampiran/file_req";
  public function getAllPermintaan()
  {

    $result = DB::table('request')->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getLatestPermintaan()
  {

    $result = DB::table('request')
      ->limit(5)
      ->orderBy('id', 'desc')
      ->get();


    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getPermintaanByKeyword(Request $request)
  {

    $keyword = $request->query("keyword");

    $result = DB::table("request")
      ->where("nama_kegiatan", "like", "%" . $keyword . "%")
      ->orWhere("id", $keyword)
      ->orWhere("diajukan_tgl", "like", "%" . $keyword . "%")
      ->orWhere("lokasi_sta", "like", "%" . $keyword . "%")
      ->orWhere("jenis_pekerjaan", "like", "%" . $keyword . "%")
      ->orWhere("volume", "like", "%" . $keyword . "%")
      ->paginate(15);

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function buatRequestFromMobile(Request $req)
  {
    $validator = Validator::make($req->all(), [
      "id_jadual" => "required",
      "user_id" => "required",
      "nama_kegiatan" => "required",
      "unor" => "required",
      "jenis_pekerjaan" => "required",
      "diajukan_tgl" => "required",
      "lokasi_sta" => "required",
      "volume" => "required",
      "satuan" => "required",
      "pelaksanaan_tgl" => "required",
      "ci" => "required",
      "qe" => "required",
      "nama_kontraktor" => "required",
      "nama_direksi" => "required",
      "nama_ppk" => "required",
      "sketsa" => "required",
      "bahan" => "required|json",
      "alat" => "required|json",
      "pekerja" => "required|json"
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => 400,
        'error' => $validator->getMessageBag()->getMessages()
      ], Response::HTTP_BAD_REQUEST);
    }

    DB::table('jadual')->where('id', $req->id_jadual)->update([
      "tgl_req" => \Carbon\Carbon::now()
    ]);

    $file = $req->file('sketsa');
    $name = time() . "_" . $file->getClientOriginalName();

    Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

    $id = DB::table('request')->insertGetId([
      "user_id" => $req->input('user_id'),
      "nama_kegiatan" => $req->input('nama_kegiatan'),
      "unor" => $req->input('unor'),
      "jenis_pekerjaan" => $req->input('jenis_pekerjaan'),
      "diajukan_tgl" => date('Y-m-d', strtotime($req->input('diajukan_tgl'))),
      "lokasi_sta" => $req->input('lokasi_sta'),
      "volume" => $req->input('volume'),
      "satuan" => $req->input('satuan'),
      "pelaksanaan_tgl" => date('Y-m-d', strtotime($req->input('pelaksanaan_tgl'))),
      "ci" => $req->input('ci'),
      "qe" => $req->input('qe'),
      "nama_kontraktor" => $req->input('nama_kontraktor'),
      "nama_direksi" => $req->input('nama_direksi'),
      "nama_ppk" => $req->input('nama_ppk'),
      "sketsa" => $this->PATH_FILE_DB . "/" . $name,
      "id_jadual" => $req->input('id_jadual'),
      "tgl_input" => \Carbon\Carbon::now()
    ]);

    foreach (json_decode($req->input('bahan')) as $item_bahan) {
      DB::table('detail_request_bahan')->insert([
        'id_request' => $id,
        'bahan' => $item_bahan->bahan,
        'volume' => $item_bahan->volume,
        'satuan' => $item_bahan->satuan
      ]);
    }

    foreach (json_decode($req->input('alat')) as $item_alat) {
      DB::table('detail_request_peralatan')->insert([
        'id_request' => $id,
        'jenis_peralatan' => $item_alat->alat,
        'jumlah' => $item_alat->jumlah,
        'satuan' => $item_alat->satuan
      ]);
    }

    foreach (json_decode($req->input('pekerja')) as $item_pekerja) {
      DB::table('detail_request_tkerja')->insert([
        'id_request' => $id,
        'tenaga_kerja' => $item_pekerja->pekerja,
        'jumlah' => $item_pekerja->jumlah
      ]);
    }

    return response()->json([
      'status' => 'success',
      'code' => 201,
    ], Response::HTTP_CREATED);
  }

  public function buatRequest(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');
    $validator = Validator::make($req->all(), [
      // Data Umum
      "bahan" => "required",
      "diajukan_tgl" => "required",
      "unor" => "required",
      "jenis_peralatan" => "required",
      "jumlah_peralatan" => "required",
      "jumlah_tk" => "required",
      "satuan_bahan" => "required",
      "satuan" => "required",
      "qe" => "required",
      "userId" => "required",
      "volume_bahan" => "required",
      "tenaga_kerja" => "required",
      "satuan_peralatan" => "required",
      "lokasi_sta" => "required",
      "ci" => "required",
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => '400',
        'error' => $validator->getMessageBag()->getMessages()
      ], 400);
    }
    DB::table('jadual')->where('id', $req->id_jadual)->update([
      "tgl_req" => \Carbon\Carbon::now()
    ]);
    $file = $req->file('sketsa');
    $name = time() . "_" . $file->getClientOriginalName();

    $id = DB::table('request')->insertGetId([
      "user_id" => $req->userId,
      "nama_kegiatan" => $req->kegiatan,
      "unor" => $req->unor,
      "jenis_pekerjaan" => $req->jenis_pekerjaan,
      "diajukan_tgl" => $req->diajukan_tgl,
      "lokasi_sta" => $req->lokasi_sta,
      "volume" => $req->perkiraan_volume,
      "satuan" => $req->satuan,
      "pelaksanaan_tgl" => $req->pelaksanaan_tgl,
      "ci" => $req->ci,
      "qe" => $req->qe,
      "nama_kontraktor" => $req->penyedia_jasa,
      "nama_direksi" => $req->konsultan,
      "nama_ppk" => $req->nm_ppk,
      "sketsa" => $this->PATH_FILE_DB . "/" . $name,
      "id_jadual" => $req->id_jadual,
      "tgl_input" => \Carbon\Carbon::now()
    ]);
    Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

    for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
      DB::table('detail_request_peralatan')->insert([
        "id_request" => $id,
        "jenis_peralatan" => $req->jenis_peralatan[$i],
        "jumlah" => $req->jumlah_peralatan[$i],
        "satuan" => $req->satuan_peralatan[$i]
      ]);
    }
    for ($i = 0; $i < count($req->bahan); $i++) {
      DB::table('detail_request_bahan')->insert([
        "id_request" => $id,
        "bahan" => $req->bahan[$i],
        "volume" => $req->volume_bahan[$i],
        "satuan" => $req->satuan_bahan[$i]
      ]);
    }
    for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
      DB::table('detail_request_tkerja')->insert([
        "id_request" => $id,
        "tenaga_kerja" => $req->tenaga_kerja[$i],
        "jumlah" => $req->jumlah_tk[$i],
      ]);
    }
    return response()->json([
      "code" => 200
    ]);
  }

  public function updateRequest(Request $req)
  {
    if ($req->file('sketsa')) {
      $file = $req->file('sketsa');
      $name = time() . "_" . $file->getClientOriginalName();

      DB::table('request')->where('id', $req->id)->update([
        "nama_kegiatan" => $req->kegiatan,
        "unor" => $req->unor,
        "jenis_pekerjaan" => $req->jenis_pekerjaan,
        "diajukan_tgl" => $req->diajukan_tgl,
        "lokasi_sta" => $req->lokasi_sta,
        "volume" => $req->perkiraan_volume,
        "satuan" => $req->satuan,
        "pelaksanaan_tgl" => $req->pelaksanaan_tgl,
        "ci" => $req->ci,
        "qe" => $req->qe,
        "nama_kontraktor" => $req->penyedia_jasa,
        "nama_direksi" => $req->konsultan,
        "nama_ppk" => $req->nama_ppk,
        "sketsa" => $this->PATH_FILE_DB . "/" . $name,
        "tgl_update" => \Carbon\Carbon::now()
      ]);
      Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
    } else {
      DB::table('request')->where('id', $req->id)->update([
        "nama_kegiatan" => $req->kegiatan,
        "unor" => $req->unor,
        "jenis_pekerjaan" => $req->jenis_pekerjaan,
        "diajukan_tgl" => $req->diajukan_tgl,
        "lokasi_sta" => $req->lokasi_sta,
        "volume" => $req->perkiraan_volume,
        "satuan" => $req->satuan,
        "pelaksanaan_tgl" => $req->pelaksanaan_tgl,
        "ci" => $req->ci,
        "qe" => $req->qe,
        "nama_kontraktor" => $req->penyedia_jasa,
        "nama_direksi" => $req->konsultan,
        "nama_ppk" => $req->nama_ppk,
        "tgl_update" => \Carbon\Carbon::now()
      ]);
    }
    for ($i = 0; $i < count($req->bahan); $i++) {
      DB::table('detail_request_bahan')->where('id_request', $req->id)->delete();
    }
    for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
      DB::table('detail_request_peralatan')->where('id_request', $req->id)->delete();
    }
    for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
      DB::table('detail_request_tkerja')->where('id_request', $req->id)->delete();
    }
    for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
      DB::table('detail_request_peralatan')->insert([
        "id_request" => $req->id,
        "jenis_peralatan" => $req->jenis_peralatan[$i],
        "jumlah" => $req->jumlah_peralatan[$i],
        "satuan" => $req->satuan_peralatan[$i]
      ]);
    }
    for ($i = 0; $i < count($req->bahan); $i++) {
      DB::table('detail_request_bahan')->insert([
        "id_request" => $req->id,
        "bahan" => $req->bahan[$i],
        "volume" => $req->volume_bahan[$i],
        "satuan" => $req->satuan_bahan[$i]
      ]);
    }
    for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
      DB::table('detail_request_tkerja')->insert([
        "id_request" => $req->id,
        "tenaga_kerja" => $req->tenaga_kerja[$i],
        "jumlah" => $req->jumlah_tk[$i],
      ]);
    }


    return response()->json([
      'code' => 200
    ]);
  }


  public function sendReq(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');
    $get_data = DB::table('request')->where('id', $req->id)->first();
    if ($get_data->ditolak == 1) {
      DB::table('request')->where('id', $req->id)->update([
        "status" => 2,
        "ditolak" => 0,
        "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
      ]);
      DB::table('history_request')->insert([
        "username" => $req->username,
        "id_request" => $req->id,
        "user_id" => $req->userId,
        "keterangan" => "Request Revisi Telah Dikirim Oleh " . $req->username,
        "class" => "kirim",
        "created_at" => \Carbon\Carbon::now()
      ]);
    } else {
      DB::table('request')->where('id', $req->id)->update([
        "kontraktor" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px" title="Request Di Kirim">&nbsp;</span></a>',
        "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
        "status" => 2
      ]);
      DB::table('history_request')->insert([
        "username" => $req->username,
        "id_request" => $req->id,
        "user_id" => $req->userId,
        "keterangan" => "Request Telah Dikirim Oleh " . $req->username,
        "class" => "kirim",
        "created_at" => \Carbon\Carbon::now()
      ]);
    }

    return response()->json([
      "code" => 200
    ]);
  }
  public function revisiRequestKontraktor(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');
    if ($req->file('sketsa')) {
      $file = $req->file('sketsa');
      $name = time() . "_" . $file->getClientOriginalName();

      DB::table('request')->where('id', $req->id)->update([
        "nama_kegiatan" => $req->kegiatan,
        "unor" => $req->unor,
        "jenis_pekerjaan" => $req->jenis_pekerjaan,
        "diajukan_tgl" => $req->diajukan_tgl,
        "lokasi_sta" => $req->lokasi_sta,
        "volume" => $req->perkiraan_volume,
        "satuan" => $req->satuan,
        "pelaksanaan_tgl" => $req->pelaksanaan_tgl,
        "ci" => $req->ci,
        "qe" => $req->qe,
        "nama_kontraktor" => $req->penyedia_jasa,
        "nama_direksi" => $req->konsultan,
        "nama_ppk" => $req->nama_ppk,
        "sketsa" => $this->PATH_FILE_DB . "/" . $name,
        "tgl_update" => \Carbon\Carbon::now()
      ]);
      Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
    } else {
      DB::table('request')->where('id', $req->id)->update([
        "nama_kegiatan" => $req->kegiatan,
        "unor" => $req->unor,
        "jenis_pekerjaan" => $req->jenis_pekerjaan,
        "diajukan_tgl" => $req->diajukan_tgl,
        "lokasi_sta" => $req->lokasi_sta,
        "volume" => $req->perkiraan_volume,
        "satuan" => $req->satuan,
        "pelaksanaan_tgl" => $req->pelaksanaan_tgl,
        "ci" => $req->ci,
        "qe" => $req->qe,
        "nama_kontraktor" => $req->penyedia_jasa,
        "nama_direksi" => $req->konsultan,
        "nama_ppk" => $req->nama_ppk,
        "tgl_update" => \Carbon\Carbon::now()
      ]);
    }
    for ($i = 0; $i < count($req->bahan); $i++) {
      DB::table('detail_request_bahan')->where('id_request', $req->id)->delete();
    }
    for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
      DB::table('detail_request_peralatan')->where('id_request', $req->id)->delete();
    }
    for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
      DB::table('detail_request_tkerja')->where('id_request', $req->id)->delete();
    }
    for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
      DB::table('detail_request_peralatan')->insert([
        "id_request" => $req->id,
        "jenis_peralatan" => $req->jenis_peralatan[$i],
        "jumlah" => $req->jumlah_peralatan[$i],
        "satuan" => $req->satuan_peralatan[$i]
      ]);
    }
    for ($i = 0; $i < count($req->bahan); $i++) {
      DB::table('detail_request_bahan')->insert([
        "id_request" => $req->id,
        "bahan" => $req->bahan[$i],
        "volume" => $req->volume_bahan[$i],
        "satuan" => $req->satuan_bahan[$i]
      ]);
    }
    for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
      DB::table('detail_request_tkerja')->insert([
        "id_request" => $req->id,
        "tenaga_kerja" => $req->tenaga_kerja[$i],
        "jumlah" => $req->jumlah_tk[$i],
      ]);
    }
    DB::table('history_request')->insert([
      "username" => $req->konsultan,
      "id_request" => $req->id,
      "user_id" => $req->userId,
      "class" => "revisi",
      "keterangan" => "Request Telah Direvisi Oleh " . $req->username,
      "created_at" => \Carbon\Carbon::now()
    ]);


    return response()->json([
      'code' => 200
    ]);
  }
  public function responReqKonsultan(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');
    $validator = Validator::make($req->all(), [
      // Data Umum
      "laporan" => "required",
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => '400',
        'error' => $validator->getMessageBag()->getMessages()
      ], 400);
    }


    if ($req->laporan == 1) {
      DB::table('request')->where('id', $req->id)->update([
        "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
        "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
        "status" => 3
      ]);
      if($req->catatan != NULL){
        DB::table('request')->where('id', $req->id)->update([
          "catatan_konsultan"=>$req->catatan
        ]);
      }
      DB::table('history_request')->insert([
        "username" => $req->konsultan,
        "id_request" => $req->id,
        "user_id" => $req->userId,
        "class" => "sukses",
        "keterangan" => "Request Telah Disetujui Oleh Admin " . $req->konsultan,
        "created_at" => \Carbon\Carbon::now()
      ]);
      if ($req->file('dokumentasi')) {
        $file = $req->file('dokumentasi');
        $name = time() . "_" . $file->getClientOriginalName();
        DB::table('request')->where('id', $req->id)->update([
          "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
        ]);
        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
      }
      if ($req->file('checklist')) {
        $file = $req->file('checklist');
        $name = time() . "_" . $file->getClientOriginalName();
        DB::table('request')->where('id', $req->id)->update([
          "checklist" => $this->PATH_FILE_DB . "/" . $name
        ]);
        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
      }
      return response()->json([
        "code" => 200
      ], 200);
    } else {
      DB::table('request')->where('id', $req->id)->update([
        "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
        "catatan_konsultan" => $req->catatan,
        "status" => 1,
        "ditolak" => 1
      ]);
      DB::table('history_request')->insert([
        "username" => $req->konsultan,
        "id_request" => $req->id,
        "user_id" => $req->userId,
        "class" => "reject",
        "keterangan" => "Request Telah Ditolak Oleh Admin " . $req->konsultan,
        "created_at" => \Carbon\Carbon::now()
      ]);
      if ($req->file('dokumentasi')) {
        $file = $req->file('dokumentasi');
        $name = time() . "_" . $file->getClientOriginalName();
        DB::table('request')->where('id', $req->id)->update([
          "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
        ]);
        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
      }
      if ($req->file('checklist')) {
        $file = $req->file('checklist');
        $name = time() . "_" . $file->getClientOriginalName();
        DB::table('request')->where('id', $req->id)->update([
          "checklist" => $this->PATH_FILE_DB . "/" . $name
        ]);
        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
      }
      return response()->json([
        "code" => 200
      ], 200);
    }
  }
  public function responReqPpk(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');
    $validator = Validator::make($req->all(), [
      // Data Umum
      "laporan" => "required",
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => '400',
        'error' => $validator->getMessageBag()->getMessages()
      ], 400);
    }


    if ($req->laporan == 1) {
      DB::table('request')->where('id', $req->id)->update([
        "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
        "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
        "status" => 3,
        "ditolak" => 4
      ]);
      if($req->catatan != NULL){
        DB::table('request')->where('id', $req->id)->update([
          "catatan_ppk"=>$req->catatan
        ]);
      }
      DB::table('history_request')->insert([
        "username" => $req->nm_ppk,
        "id_request" => $req->id,
        "user_id" => $req->userId,
        "class" => "sukses",
        "keterangan" => "Request Telah Disetujui Oleh PPK " . $req->nm_ppk,
        "created_at" => \Carbon\Carbon::now()
      ]);
      if ($req->file('dokumentasi')) {
        $file = $req->file('dokumentasi');
        $name = time() . "_" . $file->getClientOriginalName();
        DB::table('request')->where('id', $req->id)->update([
          "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
        ]);
        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
      }
      return response()->json([
        "code" => 200
      ], 200);
    } else {
      DB::table('request')->where('id', $req->id)->update([
        "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
        "catatan_ppk" => $req->catatan,
        "status" => 2,
        "ditolak" => 1
      ]);
      DB::table('history_request')->insert([
        "username" => $req->nm_ppk,
        "id_request" => $req->id,
        "user_id" => $req->userId,
        "class" => "reject",
        "keterangan" => "Request Telah Ditolak Oleh PPK " . $req->nm_ppk,
        "created_at" => \Carbon\Carbon::now()
      ]);
      if ($req->file('dokumentasi')) {
        $file = $req->file('dokumentasi');
        $name = time() . "_" . $file->getClientOriginalName();
        DB::table('request')->where('id', $req->id)->update([
          "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
        ]);
        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
      }
      return response()->json([
        "code" => 200
      ], 200);
    }
  }

  public function revisiRequestKonsultan(Request $req)
  {
    if ($req->option == 'PPK') {
      DB::table('request')->where('id', $req->id)->update([
        "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
        "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
        "status" => 3,
        "ditolak" => 0
      ]);
      DB::table('history_request')->insert([
        "username" => $req->konsultan,
        "id_request" => $req->id,
        "user_id" => $req->userId,
        "class" => "sukses",
        "keterangan" => "Revisi Request Telah Dikirim Oleh Admin " . $req->konsultan,
        "created_at" => \Carbon\Carbon::now()
      ]);
      if ($req->file('dokumentasi')) {
        $file = $req->file('dokumentasi');
        $name = time() . "_" . $file->getClientOriginalName();
        DB::table('request')->where('id', $req->id)->update([
          "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
        ]);
        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
      }
      if ($req->file('checklist')) {
        $file = $req->file('checklist');
        $name = time() . "_" . $file->getClientOriginalName();
        DB::table('request')->where('id', $req->id)->update([
          "checklist" => $this->PATH_FILE_DB . "/" . $name
        ]);
        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
      }
      return response()->json([
        "code" => 200
      ], 200);
    } else {
      DB::table('request')->where('id', $req->id)->update([
        "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
        "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
        "status" => 1,
        "ditolak" => 1
      ]);
      DB::table('history_request')->insert([
        "username" => $req->konsultan,
        "id_request" => $req->id,
        "user_id" => $req->userId,
        "class" => "reject",
        "keterangan" => "Request Dikembalikan ke Penyedia Oleh Admin " . $req->konsultan,
        "created_at" => \Carbon\Carbon::now()
      ]);
      if ($req->file('dokumentasi')) {
        $file = $req->file('dokumentasi');
        $name = time() . "_" . $file->getClientOriginalName();
        DB::table('request')->where('id', $req->id)->update([
          "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
        ]);
        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
      }
      if ($req->file('checklist')) {
        $file = $req->file('checklist');
        $name = time() . "_" . $file->getClientOriginalName();
        DB::table('request')->where('id', $req->id)->update([
          "checklist" => $this->PATH_FILE_DB . "/" . $name
        ]);
        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
      }
      return response()->json([
        "code" => 200
      ], 200);
    }
  }
  public function getSatuanNmp($id)
  {
    return response()->json([
      DB::table('jadual')->select('satuan')->where('id',$id)->first()
    ]);
  }
}
