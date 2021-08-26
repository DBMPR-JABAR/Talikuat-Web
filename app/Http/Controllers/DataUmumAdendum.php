<?php

namespace App\Http\Controllers;

use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataUmumAdendum extends Controller
{
    public function updateAdendum(Request $req)
    {
        $jadual = DB::table('jadual')->where('id_data_umum', $req->id_data_umum)->get();
        $dataUmum = DB::table('data_umum_adendum')->where('id', $req->id)->first();
        $laporan = DB::table('master_laporan_harian')->where('id_data_umum', $req->id_data_umum)->where('ditolak', 4)->whereNull('reason_delete')->get();
        $detailJadual = [];
        $idJadual = [];
        $filterJadual = [];
        date_default_timezone_set('Asia/Jakarta');
        DB::beginTransaction();
        try {
            foreach ($jadual as $j) {
                $dbJadual =  DB::table('detail_jadual')->where('id_jadual', $j->id)->first();
                array_push($detailJadual, $dbJadual);
            }
            foreach ($detailJadual as $jadual) {
                if ($jadual->tgl < $req->tgl_adendum) {
                    array_push($filterJadual,$jadual);
                }
            }
            $i=0;
            foreach($filterJadual as $dj){
                $getJadual = DB::table('jadual')->where('id',$dj->id_jadual)->get();
                foreach($getJadual as $kun){
                    $tmp = (array)$kun;
                    unset($tmp['id']);
                    $dUmum = array('id_data_umum_adendum' => $dataUmum->id, 'kontrak_awal' => 1, 'adendum' => $dataUmum->adendum);
                    $merge = array_merge($tmp, $dUmum);
                    $getId = DB::table('jadual_adendum')->insertGetId($merge);
                    array_push($idJadual, $getId);
                }
                $getDetailJadual = DB::table('detail_jadual')->where([['id_jadual',$dj->id_jadual],['tgl','<',$req->tgl_adendum]])->get();
                foreach($getDetailJadual as $detail){
                    $tmp = (array)$detail;
                    unset($tmp['id']);
                    $dUmum = array('kontrak_awal' => 1,'id_jadual'=>$idJadual[$i]);
                    $merge = array_merge($tmp, $dUmum);
                    DB::table('detail_jadual_adendum')->insert($merge);
                }
                $i++;

            }
            if (count($laporan) != 0) {
                foreach ($laporan as $lap) {
                    $tmp = (array)$lap;
                    unset($tmp['no_trans']);
                    $dUmum = array('id_data_umum_adendum' => $dataUmum->id, 'kontrak_awal' => 1, 'adendum' => $dataUmum->adendum);
                    $merge = array_merge($tmp, $dUmum);
                    DB::table('master_laporan_harian_adendum')->insert($merge);
                }
            }else{
                DB::rollBack();
            }
            $nm_se = DB::table('team_konsultan')->where('id', $req->team)->first();
            DB::table('data_umum_adendum')->where('id', $req->id)->update([
                "nilai_kontrak" => $req->nilai_kontrak,
                "tgl_adendum" => $req->tgl_adendum,
                "panjang_km" => $req->panjang_km,
                "lama_waktu" => $req->lama_waktu,
                "penyedia" => $req->penyedia,
                "konsultan" => $req->konsultan,
                "ppk" => $req->ppk,
                "nm_se" => $nm_se->nama,
                "nm_gs" => $req->nm_gs,
                "field_team_konsultan" => $req->team,
                "updated_at" => \Carbon\Carbon::now()
            ]);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => '200'
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'failed',
                'code' => '500',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function getNmpJadual($id)
    {
        return response()->json(
            DB::table('detail_jadual_adendum')->where('id_jadual', $id)->get()
        );
    }
}
