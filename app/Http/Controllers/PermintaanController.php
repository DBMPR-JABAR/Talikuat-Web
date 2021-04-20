<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PermintaanController extends Controller
{
  private $PATH_FILE_DOCUMENTS = "file_req";
  public function getAllPermintaan() {

    $result = DB::table('request')->get();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getLatestPermintaan() {

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

  public function getPermintaanByKeyword(Request $request) {

    $keyword = $request->query("keyword");

    $result = DB::table("request")
                ->where("nama_kegiatan", "like", "%".$keyword."%")
                ->orWhere("id", $keyword)
                ->orWhere("diajukan_tgl", "like", "%".$keyword."%")
                ->orWhere("lokasi_sta", "like", "%".$keyword."%")
                ->orWhere("jenis_pekerjaan", "like", "%".$keyword."%")
                ->orWhere("volume", "like", "%".$keyword."%")
                ->paginate(15);

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function buatRequest(Request $req)
  {
  date_default_timezone_set('Asia/Jakarta');
  $validator = Validator::make($req->all(), [
    // Data Umum
    "bahan" => "required",
    "diajukan_tgl" => "required",
    "unor" => "required",
    "jenis_peralatan"=>"required",
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
      ],400);
    }
    DB::table('jadual')->where('id',$req->id_jadual)->update([
      "tgl_req"=>\Carbon\Carbon::now() 
    ]);
    $file = $req->file('sketsa');
    $name = time()."_".$file->getClientOriginalName();

    $id = DB::table('request')->insertGetId([
      "user_id"=>$req->userId,
      "nama_kegiatan"=>$req->kegiatan,
      "unor"=>$req->unor,
      "jenis_pekerjaan"=>$req->jenis_pekerjaan,
      "diajukan_tgl"=>$req->diajukan_tgl,
      "lokasi_sta"=>$req->lokasi_sta,
      "volume"=>$req->perkiraan_volume,
      "satuan"=>$req->satuan,
      "pelaksanaan_tgl"=>$req->pelaksanaan_tgl,
      "ci"=>$req->ci,
      "qe"=>$req->qe,
      "nama_kontraktor"=>$req->penyedia_jasa,
      "nama_direksi"=>$req->konsultan,
      "nama_ppk"=>$req->nm_ppk,
      "sketsa"=>$this->PATH_FILE_DOCUMENTS."\\".$name,
      "id_jadual"=>$req->id_jadual,
      "tgl_input"=>\Carbon\Carbon::now() 
    ]);
    $file->move($this->PATH_FILE_DOCUMENTS, $name);

    for ($i=0; $i <count($req->jenis_peralatan) ; $i++) { 
        DB::table('detail_request_peralatan')->insert([
          "id_request"=>$id,
          "jenis_peralatan"=>$req->jenis_peralatan[$i],
          "jumlah"=>$req->jumlah_peralatan[$i],
          "satuan"=>$req->satuan_peralatan[$i]
        ]);
    }
    for ($i=0; $i <count($req->bahan) ; $i++) { 
      DB::table('detail_request_bahan')->insert([
        "id_request"=>$id,
        "bahan"=>$req->bahan[$i],
        "volume"=>$req->volume_bahan[$i],
        "satuan"=>$req->satuan_bahan[$i]
      ]);
  }
  for ($i=0; $i <count($req->tenaga_kerja) ; $i++) { 
      DB::table('detail_request_tkerja')->insert([
        "id_request"=>$id,
        "tenaga_kerja"=>$req->tenaga_kerja[$i],
        "jumlah"=>$req->jumlah_tk[$i],
      ]);
  }
     return response()->json([
         "code"=>200
     ]);
  }

  public function updateRequest(Request $req)
  {
      if($req->file('sketsa')){
        $file = $req->file('sketsa');
    $name = time()."_".$file->getClientOriginalName();

    DB::table('request')->where('id',$req->id)->update([
      "nama_kegiatan"=>$req->kegiatan,
      "unor"=>$req->unor,
      "jenis_pekerjaan"=>$req->jenis_pekerjaan,
      "diajukan_tgl"=>$req->diajukan_tgl,
      "lokasi_sta"=>$req->lokasi_sta,
      "volume"=>$req->perkiraan_volume,
      "satuan"=>$req->satuan,
      "pelaksanaan_tgl"=>$req->pelaksanaan_tgl,
      "ci"=>$req->ci,
      "qe"=>$req->qe,
      "nama_kontraktor"=>$req->penyedia_jasa,
      "nama_direksi"=>$req->konsultan,
      "nama_ppk"=>$req->nama_ppk,
      "sketsa"=>$this->PATH_FILE_DOCUMENTS."\\".$name,
      "tgl_update"=>\Carbon\Carbon::now() 
    ]);
    $file->move($this->PATH_FILE_DOCUMENTS, $name);
      }else{
    DB::table('request')->where('id',$req->id)->update([
      "nama_kegiatan"=>$req->kegiatan,
      "unor"=>$req->unor,
      "jenis_pekerjaan"=>$req->jenis_pekerjaan,
      "diajukan_tgl"=>$req->diajukan_tgl,
      "lokasi_sta"=>$req->lokasi_sta,
      "volume"=>$req->perkiraan_volume,
      "satuan"=>$req->satuan,
      "pelaksanaan_tgl"=>$req->pelaksanaan_tgl,
      "ci"=>$req->ci,
      "qe"=>$req->qe,
      "nama_kontraktor"=>$req->penyedia_jasa,
      "nama_direksi"=>$req->konsultan,
      "nama_ppk"=>$req->nama_ppk,
      "tgl_update"=>\Carbon\Carbon::now() 
    ]);
      }
    for ($i=0; $i <count($req->bahan) ; $i++) { 
      DB::table('detail_request_bahan')->where('id_request',$req->id)->delete();
    }
    for ($i=0; $i <count($req->jenis_peralatan) ; $i++) { 
      DB::table('detail_request_peralatan')->where('id_request',$req->id)->delete();
    }
    for ($i=0; $i <count($req->tenaga_kerja) ; $i++) { 
      DB::table('detail_request_tkerja')->where('id_request',$req->id)->delete();
    }
    for ($i=0; $i <count($req->jenis_peralatan) ; $i++) { 
      DB::table('detail_request_peralatan')->insert([
        "id_request"=>$req->id,
        "jenis_peralatan"=>$req->jenis_peralatan[$i],
        "jumlah"=>$req->jumlah_peralatan[$i],
        "satuan"=>$req->satuan_peralatan[$i]
      ]);
    }
    for ($i=0; $i <count($req->bahan) ; $i++) { 
      DB::table('detail_request_bahan')->insert([
        "id_request"=>$req->id,
        "bahan"=>$req->bahan[$i],
        "volume"=>$req->volume_bahan[$i],
        "satuan"=>$req->satuan_bahan[$i]
      ]);
    }
    for ($i=0; $i <count($req->tenaga_kerja) ; $i++) { 
        DB::table('detail_request_tkerja')->insert([
          "id_request"=>$req->id,
          "tenaga_kerja"=>$req->tenaga_kerja[$i],
          "jumlah"=>$req->jumlah_tk[$i],
        ]);
    }
      

   return response()->json([
    'code'=>200
   ]);
  }


  public function sendReq(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');
    DB::table('request')->where('id',$req->id)->update([
      "status"=>1,
      "kontraktor"=>'<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px" title="Sudah di Setujui">&nbsp;</span></a>',
      "konsultan"=>'<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
    ]);
    DB::table('history_request')->insert([
      "username"=>$req->username,
      "id_request"=>$req->id,
      "user_id"=>$req->userId,
      "keterangan"=>"Request Telah Dikirim Oleh ".$req->username,
      "class"=>"kirim",
      "created_at"=>\Carbon\Carbon::now()
    ]);
    return response()->json([
      "code"=>200
    ]);
  }

  public function updateReqKonsultan(Request $req)
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
        ],400);
      }


      if ($req->laporan == 1) {
        DB::table('request')->where('id',$req->id)->update([
          "konsultan"=>'<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
          "ppk"=>'<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
          "status"=> 2
        ]);
        DB::table('history_request')->insert([
          "username"=>$req->username,
          "id_request"=>$req->id,
          "user_id"=>$req->userId,
          "class"=>"sukses",
          "keterangan"=>"Request Telah Disetujui Oleh Admin ".$req->konsultan,
          "created_at"=>\Carbon\Carbon::now()
        ]);
        return response()->json([
          'code'=>200
         ]);
      } else {
        DB::table('request')->where('id',$req->id)->update([
          "konsultan"=>'<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
          "catatan_konsultan"=>$req->catatan,
          "status"=>1
        ]);
        DB::table('history_request')->insert([
          "username"=>$req->konsultan,
          "id_request"=>$req->id,
          "user_id"=>$req->userId,
          "class"=>"reject",
          "keterangan"=>"Request Telah Ditolak Oleh Admin ".$req->konsultan,
          "created_at"=>\Carbon\Carbon::now()
        ]);
        return response()->json([
          'code'=>200,
         ]);
      }
      
  }

  public function revisiRequest(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');
    if($req->file('sketsa')){
      $file = $req->file('sketsa');
  $name = time()."_".$file->getClientOriginalName();

  DB::table('request')->where('id',$req->id)->update([
    "nama_kegiatan"=>$req->kegiatan,
    "unor"=>$req->unor,
    "jenis_pekerjaan"=>$req->jenis_pekerjaan,
    "diajukan_tgl"=>$req->diajukan_tgl,
    "lokasi_sta"=>$req->lokasi_sta,
    "volume"=>$req->perkiraan_volume,
    "satuan"=>$req->satuan,
    "pelaksanaan_tgl"=>$req->pelaksanaan_tgl,
    "ci"=>$req->ci,
    "qe"=>$req->qe,
    "nama_kontraktor"=>$req->penyedia_jasa,
    "nama_direksi"=>$req->konsultan,
    "nama_ppk"=>$req->nama_ppk,
    "sketsa"=>$this->PATH_FILE_DOCUMENTS."\\".$name,
    "tgl_update"=>\Carbon\Carbon::now() 
  ]);
  $file->move($this->PATH_FILE_DOCUMENTS, $name);
    }else{
  DB::table('request')->where('id',$req->id)->update([
    "nama_kegiatan"=>$req->kegiatan,
    "unor"=>$req->unor,
    "jenis_pekerjaan"=>$req->jenis_pekerjaan,
    "diajukan_tgl"=>$req->diajukan_tgl,
    "lokasi_sta"=>$req->lokasi_sta,
    "volume"=>$req->perkiraan_volume,
    "satuan"=>$req->satuan,
    "pelaksanaan_tgl"=>$req->pelaksanaan_tgl,
    "ci"=>$req->ci,
    "qe"=>$req->qe,
    "nama_kontraktor"=>$req->penyedia_jasa,
    "nama_direksi"=>$req->konsultan,
    "nama_ppk"=>$req->nama_ppk,
    "tgl_update"=>\Carbon\Carbon::now() 
  ]);
    }
  for ($i=0; $i <count($req->bahan) ; $i++) { 
    DB::table('detail_request_bahan')->where('id_request',$req->id)->delete();
  }
  for ($i=0; $i <count($req->jenis_peralatan) ; $i++) { 
    DB::table('detail_request_peralatan')->where('id_request',$req->id)->delete();
  }
  for ($i=0; $i <count($req->tenaga_kerja) ; $i++) { 
    DB::table('detail_request_tkerja')->where('id_request',$req->id)->delete();
  }
  for ($i=0; $i <count($req->jenis_peralatan) ; $i++) { 
    DB::table('detail_request_peralatan')->insert([
      "id_request"=>$req->id,
      "jenis_peralatan"=>$req->jenis_peralatan[$i],
      "jumlah"=>$req->jumlah_peralatan[$i],
      "satuan"=>$req->satuan_peralatan[$i]
    ]);
  }
  for ($i=0; $i <count($req->bahan) ; $i++) { 
    DB::table('detail_request_bahan')->insert([
      "id_request"=>$req->id,
      "bahan"=>$req->bahan[$i],
      "volume"=>$req->volume_bahan[$i],
      "satuan"=>$req->satuan_bahan[$i]
    ]);
  }
  for ($i=0; $i <count($req->tenaga_kerja) ; $i++) { 
      DB::table('detail_request_tkerja')->insert([
        "id_request"=>$req->id,
        "tenaga_kerja"=>$req->tenaga_kerja[$i],
        "jumlah"=>$req->jumlah_tk[$i],
      ]);
  }
  DB::table('history_request')->insert([
    "username"=>$req->konsultan,
    "id_request"=>$req->id,
    "user_id"=>$req->userId,
    "class"=>"revisi",
    "keterangan"=>"Request Telah Direvisi Oleh Admin ".$req->username,
    "created_at"=>\Carbon\Carbon::now()
  ]);
    

 return response()->json([
  'code'=>200
 ]);
  }
}
