<?php

namespace App\Http\Controllers;

use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataUmumAdendum extends Controller
{
    public function updateAdendum(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        DB::beginTransaction();
        try {
            DB::connection('talikuat_old')->table('data_umum_adendum')->where('id', $req->id)->update([
                "nilai_kontrak" => $req->nilai_kontrak,
                "tgl_adendum" => $req->tgl_adendum,
                "panjang_km" => $req->panjang_km,
                "lama_waktu" => $req->lama_waktu,
                "tgl_pho"=>$req->tgl_pho,
                "no_kontrak"=>$req->no_kontrak,
                "updated_at" => \Carbon\Carbon::now()
            ]);
            DB::connection('talikuat_old')->table('data_umum_ruas_adendum')->where('id_data_umum_adendum',$req->id)->delete();
            for ($i = 0; $i < count($req->ruas_jalan); $i++) {
                DB::connection('talikuat_old')->table("data_umum_ruas_adendum")->insert([
                    "id_data_umum_adendum" => $req->id,
                    "ruas_jalan" => $req->ruas_jalan[$i],
                    "segment_jalan" => $req->segmen_jalan[$i],
                    "lat_awal" => $req->lat_awal[$i],
                    "long_awal" => $req->long_awal[$i],
                    "lat_akhir" => $req->lat_akhir[$i],
                    "long_akhir" => $req->long_akhir[$i],
                    "created_at" => \Carbon\Carbon::now()
                ]);
            }

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
            DB::connection('talikuat_old')->table('detail_jadual_adendum')->where('id_jadual', $id)->get()
        );
    }
}
