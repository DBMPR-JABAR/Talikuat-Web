<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
  private $PATH_FILE_DB = "public/lampiran/file_lap";
  public function getAllLaporanHarian() {

    $result = DB::table('master_laporan_harian as master')
              ->leftJoin('detail_laporan_harian_pekerjaan as detail', 'master.no_trans', '=', 'detail.no_trans')
              ->select('master.*', 'detail.jenis_pekerjaan', 'detail.no_pekerjaan', 'detail.satuan', 'detail.volume')
              ->get();

    return response()->json([
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);
  }

  public function getLaporanProgressKegiatanTerbaru() {

    $result = DB::table('master_laporan_harian as master')
              ->select(DB::raw('kegiatan, SUM(volume) as persen'))
              ->groupBy('kegiatan')
              ->limit(5)
              ->get();

    return response()->json([ 
      'status' => 'success', 
      'code' => '200', 
      'result' => $result
    ]);

  }

  public function createLaporan(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');
    $file = $req->file('soft');
    $name = time()."_".$file->getClientOriginalName();
    $id = DB::table('master_laporan_harian')->insertGetId([
      "real_date"=>\Carbon\Carbon::now(),
      "user"=>$req->user,
      "kegiatan"=>$req->kegiatan,
      "unor"=>$req->unor,
      "ruas_jalan"=>$req->ruas_jalan,
      "tanggal"=>$req->tanggal,
      "segmen_jalan"=>$req->segmen_jalan,
      "id_request"=>$req->permohonan,
      "tgl_input"=>\Carbon\Carbon::now(),
      "nama_kontraktor"=>$req->kontraktor,
      "nama_ppk"=>$req->ppk,
      "nama_konsultan"=>$req->konsultan,
      "volume"=>$req->volume,
      "satuan"=>$req->satuan,
      "nmp"=>$req->jenis_pekerjaan,
      "ket"=>$req->ket,
      "gambar"=>$this->PATH_FILE_DB."/".$name,
      "id_jadual"=>$req->id_jadual,
      "id_data_umum"=>$req->id_data_umum
    ]);
    Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
    DB::table('detail_laporan_harian_pekerjaan')->insert([
      "no_trans"=>$id,
      "no_pekerjaan"=>$req->no_pekerjaan,
      "jenis_pekerjaan"=>$req->jenis_pekerjaan,
      "sta_awal"=>$req->sta_awal,
      "sta_akhir"=>$req->sta_akhir,
      "ki_ka"=>$req->ki_ka,
      "volume"=>$req->volume,
      "satuan"=>$req->satuan,
      "ket"=>$req->ket,
      "tgl"=>$req->tanggal
    ]);

    if($req->bahan){
      for ($i=0; $i <count($req->bahan) ; $i++) { 
        DB::table('detail_laporan_bahan')->inser([
          "no_trans"=>$id,
          "bahan"=>$req->bahan[$i],
          "volume"=>$req->volume_bahan[$i],
          "satuan"=>$req->satuan_bahan[$i]
        ]);
      }
    }
    if($req->jenis_peralatan){
      for ($i=0; $i <count($req->jenis_peralatan) ; $i++) { 
        DB::table('detail_laporan_peralatan')->inser([
          "no_trans"=>$id,
          "jenis_peralatan"=>$req->jenis_peralatan[$i],
          "jumlah"=>$req->jumlah_peralatan[$i],
          "satuan"=>$req->satuan_peralatan[$i]
        ]);
      }
    }
    if($req->bahan_hotmix){
      for ($i=0; $i <count($req->bahan_hotmix) ; $i++) { 
        DB::table('detail_laporan_hotmix')->inser([
          "no_trans"=>$id,
          "bahan_hotmix"=>$req->bahan_hotmix[$i],
          "no_dt"=>$req->no_dt[$i],
          "waktu_datang"=>$req->waktu_datang[$i],
          "waktu_hampar"=>$req->waktu_hampar[$i],
          "suhu_datang"=>$req->suhu_datang[$i],
          "suhu_hampar"=>$req->suhu_hampar[$i],
          "pro_p"=>$req->pro_p[$i],
          "pro_l"=>$req->pro_l[$i],
          "pro_t"=>$req->pro_t[$i],
          "ket"=>$req->ket_hotmix[$i]
        ]);
      }
    }
    if($req->bahan_beton){
      for ($i=0; $i <count($req->bahan_beton) ; $i++) { 
        DB::table('detail_laporan_beton')->inser([
          "no_trans"=>$id,
          "bahan_beton"=>$req->bahan_beton[$i],
          "no_tm"=>$req->no_tm[$i],
          "waktu_datang"=>$req->waktu_datang_beton[$i],
          "waktu_curah"=>$req->waktu_curah[$i],
          "slump_test"=>$req->slump_test[$i],
          "satuan_beton"=>$req->satuan_beton[$i],
          "ket_beton"=>$req->ket_beton[$i]
        ]);
      }
    }
    if($req->tenaga_kerja){
      for ($i=0; $i <count($req->tenaga_kerja) ; $i++) { 
        DB::table('detail_laporan_tkerja')->inser([
          "no_trans"=>$id,
          "tenaga_kerja"=>$req->tenaga_kerja[$i],
          "jumlah"=>$req->jumlah_tk[$i],
        ]);
      }
    }
    if($req->cerah){
      for ($i=0; $i <count($req->cerah) ; $i++) { 
        DB::table('detail_laporan_cuaca')->inser([
          "no_trans"=>$id,
          "cerah"=>$req->cerah[$i],
          "hujan_ringan"=>$req->hujan_ringan[$i],
          "hujan_lebat"=>$req->hujan_lebat[$i],
          "benca_alam"=>$req->benca_alam[$i],
          "lain_lain"=>$req->lain_lain[$i],
        ]);
      }
    }
    DB::table('history_laporan')->insert([
      "username"=>$req->kontraktor,
      "created_at"=>\Carbon\Carbon::now(),
      "keterangan"=> "Laporan Telah Dibuat Oleh ".$req->kontraktor,
      "user_id"=>$req->user,
      "id_request"=>$id,
      "class"=>"kirim"
    ]);     
    return response()->json([
      'code'=>200
    ],200);
  }

  public function editLaporan(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');

    if($req->file('soft')){
      $file = $req->file('soft');
      $name = time()."_".$file->getClientOriginalName();
      DB::table('master_laporan_harian')->where('no_trans',$req->lapId)->update([
        "tanggal"=>$req->tanggal,
        "gambar"=>$this->PATH_FILE_DB."/".$name
      ]);
      Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
    }
    DB::table('master_laporan_harian')->where('no_trans',$req->lapId)->update([
      "tanggal"=>$req->tanggal,
    ]);
    DB::table('detail_laporan_harian_pekerjaan')->where('no_trans',$req->lapId)->update([
      "no_pekerjaan"=>$req->no_pekerjaan,
      "jenis_pekerjaan"=>$req->jenis_pekerjaan,
      "sta_awal"=>$req->sta_awal,
      "sta_akhir"=>$req->sta_akhir,
      "ki_ka"=>$req->ki_ka,
      "volume"=>$req->volume,
      "satuan"=>$req->satuan,
      "ket"=>$req->ket,
      "tgl"=>$req->tanggal
    ]);

    if($req->bahan){
      for ($i=0; $i <count($req->bahan) ; $i++) { 
        DB::table('detail_laporan_harian_bahan')->where('no_trans','=',$req->lapId)->delete();
      }
      for ($i=0; $i <count($req->bahan) ; $i++) {
        DB::table('detail_laporan_harian_bahan')->insert([
          "no_trans"=>$req->lapId,
          "bahan"=>$req->bahan[$i],
          "volume"=>$req->volume_bahan[$i],
          "satuan"=>$req->satuan_bahan[$i]
        ]);
      }
    }
    if($req->jenis_peralatan){
      for ($i=0; $i <count($req->jenis_peralatan) ; $i++) { 
        DB::table('detail_laporan_harian_peralatan')->where('no_trans','=',$req->lapId)->delete();
      }
      for ($i=0; $i <count($req->jenis_peralatan) ; $i++) { 
        DB::table('detail_laporan_harian_peralatan')->insert([
          "no_trans"=>$req->lapId,
          "jenis_peralatan"=>$req->jenis_peralatan[$i],
          "jumlah"=>$req->jumlah_peralatan[$i],
          "satuan"=>$req->satuan_peralatan[$i]
        ]);
      }
    }
    if($req->bahan_hotmix){
      for ($i=0; $i <count($req->bahan_hotmix) ; $i++) { 
        DB::table('detail_laporan_harian_hotmix')->where('no_trans','=',$req->lapId)->delete();
      }
      for ($i=0; $i <count($req->bahan_hotmix) ; $i++) { 
        DB::table('detail_laporan_harian_hotmix')->insert([
          "no_trans"=>$req->lapId,
          "bahan_hotmix"=>$req->bahan_hotmix[$i],
          "no_dt"=>$req->no_dt[$i],
          "waktu_datang"=>$req->waktu_datang[$i],
          "waktu_hampar"=>$req->waktu_hampar[$i],
          "suhu_datang"=>$req->suhu_datang[$i],
          "suhu_hampar"=>$req->suhu_hampar[$i],
          "pro_p"=>$req->pro_p[$i],
          "pro_l"=>$req->pro_l[$i],
          "pro_t"=>$req->pro_t[$i],
          "ket"=>$req->ket_hotmix[$i]
        ]);
      }
    }
    if($req->bahan_beton){
      for ($i=0; $i <count($req->bahan_beton) ; $i++) { 
        DB::table('detail_laporan_harian_beton')->where('no_trans','=',$req->lapId)->delete();
      }
      for ($i=0; $i <count($req->bahan_beton) ; $i++) { 
        DB::table('detail_laporan_harian_beton')->insert([
          "no_trans"=>$req->lapId,
          "bahan_beton"=>$req->bahan_beton[$i],
          "no_tm"=>$req->no_tm[$i],
          "waktu_datang"=>$req->waktu_datang_beton[$i],
          "waktu_curah"=>$req->waktu_curah[$i],
          "slump_test"=>$req->slump_test[$i],
          "satuan_beton"=>$req->satuan_beton[$i],
          "ket_beton"=>$req->ket_beton[$i]
        ]);
      }
    }
    if($req->tenaga_kerja){
      for ($i=0; $i <count($req->tenaga_kerja) ; $i++) { 
        DB::table('detail_laporan_harian_tkerja')->where('no_trans','=',$req->lapId)->delete();
      }
      for ($i=0; $i <count($req->tenaga_kerja) ; $i++) { 
        DB::table('detail_laporan_harian_tkerja')->insert([
          "no_trans"=>$req->lapId,
          "tenaga_kerja"=>$req->tenaga_kerja[$i],
          "jumlah"=>$req->jumlah_tk[$i],
        ]);
      }
    }
    if($req->cerah){
      for ($i=0; $i <count($req->cerah) ; $i++) { 
        DB::table('detail_laporan_harian_cuaca')->where('no_trans','=',$req->lapId)->delete();
      }
      for ($i=0; $i <count($req->cerah) ; $i++) { 
        DB::table('detail_laporan_harian_cuaca')->insert([
          "no_trans"=>$req->lapId,
          "cerah"=>$req->cerah[$i],
          "hujan_ringan"=>$req->hujan_ringan[$i],
          "hujan_lebat"=>$req->hujan_lebat[$i],
          "benca_alam"=>$req->benca_alam[$i],
          "lain_lain"=>$req->lain_lain[$i],
        ]);
      }
    }
    DB::table('history_laporan')->insert([
      "username"=>$req->kontraktor,
      "created_at"=>\Carbon\Carbon::now(),
      "keterangan"=> "Laporan Telah Diupdate Oleh ".$req->kontraktor,
      "user_id"=>$req->user,
      "id_laporan"=>$req->lapId,
      "class"=>"kirim"
    ]);     
    return response()->json([
      'code'=>200
    ],200);
  }

  public function sendLaporan(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');
    $get_data = DB::table('master_laporan_harian')->where('no_trans',$req->id)->first();
    if ($get_data->ditolak == 1) {
      DB::table('master_laporan_harian')->where('no_trans',$req->id)->update([
        "status"=>2,
        "ditolak"=>0,
        "konsultan"=>'<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
      ]);
      DB::table('history_laporan')->insert([
        "username"=>$req->username,
        "id_laporan"=>$req->id,
        "user_id"=>$req->userId,
        "keterangan"=>"Request Revisi Telah Dikirim Oleh ".$req->kontraktor,
        "class"=>"kirim",
        "created_at"=>\Carbon\Carbon::now()
      ]);
    }else{
      DB::table('master_laporan_harian')->where('no_trans',$req->id)->update([
        "kontraktor"=>'<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px" title="Laporan Di Kirim">&nbsp;</span></a>',
        "konsultan"=>'<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
        "status"=>2
      ]);
      DB::table('history_laporan')->insert([
        "username"=>$req->username,
        "id_laporan"=>$req->id,
        "user_id"=>$req->userId,
        "keterangan"=>"Request Telah Dikirim Oleh ".$req->kontraktor,
        "class"=>"kirim",
        "created_at"=>\Carbon\Carbon::now()
      ]);
    }
    
    return response()->json([
      "code"=>200
    ]);
  }
  public function responKonsultan(Request $req)
  {
    date_default_timezone_set('Asia/Jakarta');
    $validator = Validator::make($req->all(), [
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
        DB::table('master_laporan_harian')->where('no_trans',$req->id)->update([
          "konsultan"=>'<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
          "ppk"=>'<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
          "status"=> 3
        ]);
        DB::table('history_laporan')->insert([
          "username"=>$req->konsultan,
          "id_laporan"=>$req->id,
          "user_id"=>$req->userId,
          "class"=>"sukses",
          "keterangan"=>"Laporan Telah Disetujui Oleh ".$req->konsultan,
          "created_at"=>\Carbon\Carbon::now()
        ]);
        if ($req->file('dokumentasi')) {
          $file = $req->file('dokumentasi');
          $name = time()."_".$file->getClientOriginalName();
          DB::table('master_laporan_harian')->where('no_trans',$req->id)->update([
            "foto_konsultan"=>$this->PATH_FILE_DB."/".$name
          ]);
          Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
        }
        return response()->json([
          "code"=>200
        ],200);
      } else {
        DB::table('master_laporan_harian')->where('no_trans',$req->id)->update([
          "konsultan"=>'<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
          "catatan_konsultan"=>$req->catatan,
          "status"=>1,
          "ditolak"=>1
        ]);
        DB::table('history_laporan')->insert([
          "username"=>$req->konsultan,
          "id_laporan"=>$req->id,
          "user_id"=>$req->userId,
          "class"=>"reject",
          "keterangan"=>"Laporan Telah Ditolak Oleh ".$req->konsultan,
          "created_at"=>\Carbon\Carbon::now()
        ]);
        if ($req->file('dokumentasi')) {
          $file = $req->file('dokumentasi');
          $name = time()."_".$file->getClientOriginalName();
          DB::table('master_laporan_harian')->where('no_trans',$req->id)->update([
            "foto_konsultan"=>$this->PATH_FILE_DB."/".$name
          ]);
          Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
        }
        return response()->json([
          "code"=>200
        ],200);
      }
  }
  public function responPpk(Request $req)
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
        DB::table('master_laporan_harian')->where('no_trans',$req->id)->update([
          "konsultan"=>'<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
          "ppk"=>'<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
          "status"=> 3,
          "ditolak"=> 4
        ]);
        DB::table('history_laporan')->insert([
          "username"=>$req->nm_ppk,
          "id_laporan"=>$req->id,
          "user_id"=>$req->userId,
          "class"=>"sukses",
          "keterangan"=>"Laporan Telah Disetujui Oleh PPK ".$req->nm_ppk,
          "created_at"=>\Carbon\Carbon::now()
        ]);
        if ($req->file('dokumentasi')) {
          $file = $req->file('dokumentasi');
          $name = time()."_".$file->getClientOriginalName();
          DB::table('master_laporan_harian')->where('no_trans',$req->id)->update([
            "foto_ppk"=>$this->PATH_FILE_DB."/".$name
          ]);
          Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
        }
        return response()->json([
          "code"=>200
        ],200);
      } else {
        DB::table('master_laporan_harian')->where('no_trans',$req->id)->update([
          "ppk"=>'<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
          "catatan_ppk"=>$req->catatan,
          "status"=>2,
          "ditolak"=>1
        ]);
        DB::table('history_laporan')->insert([
          "username"=>$req->nm_ppk,
          "id_laporan"=>$req->id,
          "user_id"=>$req->userId,
          "class"=>"reject",
          "keterangan"=>"Laporan Telah Ditolak Oleh PPK ".$req->nm_ppk,
          "created_at"=>\Carbon\Carbon::now()
        ]);
        if ($req->file('dokumentasi')) {
          $file = $req->file('dokumentasi');
          $name = time()."_".$file->getClientOriginalName();
          DB::table('master_laporan_harian')->where('id',$req->id)->update([
            "foto_ppk"=>$this->PATH_FILE_DB."/".$name
          ]);
          Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
        }
        return response()->json([
          "code"=>200
        ],200);
      }
  }
  public function responRevisiKonsultan(Request $req)
  {
    if($req->option == 'PPK'){
      DB::table('master_laporan_harian')->where('no_trans',$req->id)->update([
        "konsultan"=>'<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
        "ppk"=>'<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
        "status"=> 3,
        "ditolak"=>0
      ]);
      DB::table('history_laporan')->insert([
        "username"=>$req->konsultan,
        "id_laporan"=>$req->id,
        "user_id"=>$req->userId,
        "class"=>"sukses",
        "keterangan"=>"Revisi Laporan Telah Dikirim Oleh ".$req->konsultan,
        "created_at"=>\Carbon\Carbon::now()
      ]);
      if ($req->file('dokumentasi')) {
        $file = $req->file('dokumentasi');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('master_laporan_harian')->where('no_trans',$req->id)->update([
          "foto_konsultan"=>$this->PATH_FILE_DB."/".$name
        ]);
        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
      }
      return response()->json([
        "code"=>200
      ],200);
    }else{
      DB::table('master_laporan_harian')->where('no_trans',$req->id)->update([
        "konsultan"=>'<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
        "ppk"=>'<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
        "status"=> 1,
        "ditolak"=>1
      ]);
      DB::table('history_laporan')->insert([
        "username"=>$req->konsultan,
        "id_laporan"=>$req->id,
        "user_id"=>$req->userId,
        "class"=>"reject",
        "keterangan"=>"Laporan Dikembalikan ke Penyedia Oleh ".$req->konsultan,
        "created_at"=>\Carbon\Carbon::now()
      ]);
      if ($req->file('dokumentasi')) {
        $file = $req->file('dokumentasi');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('master_laporan_harian')->where('no_trans',$req->id)->update([
          "foto_konsultan"=>$this->PATH_FILE_DB."/".$name
        ]);
        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
      }
      return response()->json([
        "code"=>200
      ],200);
    }
  }
    
  
}
