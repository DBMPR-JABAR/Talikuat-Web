<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataUmumAdendum extends Controller
{
    public function updateAdendum(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        DB::table('data_umum_adendum')->where('id', $req->id)->update([
            "konsultan" => $req->konsultan,
            "lama_waktu" => $req->lama_waktu,
            "nilai_kontrak" => $req->nilai_kontrak,
            "panjang_km" => $req->panjang_km,
            "penyedia" => $req->penyedia,
            "ppk" => $req->ppk,
            "tgl_kontrak" => $req->tgl_kontrak,
            "tgl_spmk" => $req->tgl_spmk,
            "nm_se" => $req->nm_se,
            "nm_gs" => $req->nm_gs,
            "updated_at" => \Carbon\Carbon::now()
        ]);
        DB::table('jadual')->where('id_data_umum', "=", $req->id_data_umum)->update([
            "konsultan" => $req->konsultan,
            "lama_waktu" => $req->lama_waktu,
            "nilai_kontrak" => $req->nilai_kontrak,
            "panjang_km" => $req->panjang_km,
            "penyedia" => $req->penyedia,
            "ppk" => $req->ppk,
            "updated_at" => \Carbon\Carbon::now()
        ]);
        return response()->json([
            'status' => 'success',
            'code' => '200'
        ]);
    }
}
