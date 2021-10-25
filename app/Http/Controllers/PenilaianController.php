<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_data_umum' => 'required',
            'bulan_ke' => 'required',
            'penyedia_jasa' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'error' => $validator->getMessageBag()->getMessages()
            ], 400);
        }
        try {
            $bulan = date('m', strtotime("+" . $req->bulan_ke . " months", strtotime($req->tgl_spmk)));
            $kontraktor = DB::table('master_penyedia_jasa')->where('nama', $req->penyedia_jasa)->first();
            DB::beginTransaction();
            DB::table('penilaian')->insert([
                'kontraktor_id'=>$kontraktor->id,
                'data_umum_id' => $req->id_data_umum,
                'bulan' => $bulan,
                'periode' => $req->bulan_ke,
                'a_1' => $req->nilai_a1,
                'a_2' => $req->nilai_a2,
                'a_3' => $req->nilai_a3,
                'a_4' => $req->nilai_a4,
                'a_bobot' => $req->bobot_a,
                'a_total' => $req->total_a,
                'b_1' => $req->nilai_b1,
                'b_2' => $req->nilai_b2,
                'b_3' => $req->nilai_b3,
                'b_4' => $req->nilai_b4,
                'b_5' => $req->nilai_b5,
                'b_6' => $req->nilai_b6,
                'b_7' => $req->nilai_b7,
                'b_8' => $req->nilai_b8,
                'b_9' => $req->nilai_b9,
                'b_10' => $req->nilai_b10,
                'b_11' => $req->nilai_b11,
                'b_12' => $req->nilai_b12,
                'b_13' => $req->nilai_b13,
                'b_14' => $req->nilai_b14,
                'b_15' => $req->nilai_b15,
                'b_16' => $req->nilai_b16,
                'b_17' => $req->nilai_b17,
                'b_bobot' => $req->bobot_b,
                'b_total' => $req->total_b,
                'c_1' => $req->nilai_c1,
                'c_2' => $req->nilai_c2,
                'c_3' => $req->nilai_c3,
                'c_4' => $req->nilai_c4,
                'c_5' => $req->nilai_c5,
                'c_6' => $req->nilai_c6,
                'c_bobot' => $req->bobot_c,
                'c_total' => $req->total_c,
                'd_1' => $req->nilai_d1,
                'd_2' => $req->nilai_d2,
                'd_3' => $req->nilai_d3,
                'd_4' => $req->nilai_d4,
                'd_5' => $req->nilai_d5,
                'd_6' => $req->nilai_d6,
                'd_bobot' => $req->bobot_d,
                'd_total' => $req->total_d,
                'created_at' => \Carbon\Carbon::now()
            ]);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => '200',
                'message' =>  'success'
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'message' =>  $th->getMessage()
            ], 400);
        }
    }
}
