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
        $jadual = DB::table('jadual')->where('id_data_umum', $req->id_data_umum)->get();
        $dataUmum = DB::table('data_umum_adendum')->where('id', $req->id)->first();
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
                    array_push($filterJadual, $jadual);
                }
            }
            $i = 0;
            foreach ($filterJadual as $dj) {
                $getJadual = DB::table('jadual')->where('id', $dj->id_jadual)->get();
                foreach ($getJadual as $kun) {
                    $tmp = (array)$kun;
                    unset($tmp['id']);
                    $dUmum = array('id_data_umum_adendum' => $dataUmum->id, 'kontrak_awal' => 1, 'adendum' => $dataUmum->adendum);
                    $merge = array_merge($tmp, $dUmum);
                    $getId = DB::table('jadual_adendum')->insertGetId($merge);
                    array_push($idJadual, $getId);
                }
                $getDetailJadual = DB::table('detail_jadual')->where([['id_jadual', $dj->id_jadual], ['tgl', '<', $req->tgl_adendum]])->get();
                foreach ($getDetailJadual as $detail) {
                    $tmp = (array)$detail;
                    unset($tmp['id']);
                    $dUmum = array('kontrak_awal' => 1, 'id_jadual' => $idJadual[$i]);
                    $merge = array_merge($tmp, $dUmum);
                    DB::table('detail_jadual_adendum')->insert($merge);
                }
                $i++;
            }

            DB::commit();
            dd($req->all());
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
