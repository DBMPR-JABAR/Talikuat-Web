<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
      "gambar"=>$this->PATH_FILE_DB."/".$name
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

    if($req->bahan[0]){
      for ($i=0; $i <count($req->bahan) ; $i++) { 
        DB::table('detail_laporan_bahan')->inser([
          "no_trans"=>$id,
          "bahan"=>$req->bahan[$i],
          "volume"=>$req->volume_bahan[$i],
          "satuan"=>$req->satuan_bahan[$i]
        ]);
      }
    }
    if($req->jenis_peralatan[0]){
      for ($i=0; $i <count($req->jenis_peralatan) ; $i++) { 
        DB::table('detail_laporan_peralatan')->inser([
          "no_trans"=>$id,
          "jenis_peralatan"=>$req->jenis_peralatan[$i],
          "jumlah"=>$req->jumlah_peralatan[$i],
          "satuan"=>$req->satuan_peralatan[$i]
        ]);
      }
    }
    if($req->bahan_hotmix[0]){
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
    if($req->bahan_beton[0]){
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
    if($req->tenaga_kerja[0]){
      for ($i=0; $i <count($req->tenaga_kerja) ; $i++) { 
        DB::table('detail_laporan_tkerja')->inser([
          "no_trans"=>$id,
          "tenaga_kerja"=>$req->tenaga_kerja[$i],
          "jumlah"=>$req->jumlah_tk[$i],
        ]);
      }
    }
    if($req->cerah[0]){
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
    return response()->json([
      'code'=>200
    ],200);
  }
}
