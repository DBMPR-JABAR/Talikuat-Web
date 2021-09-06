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
