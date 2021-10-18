<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurvaControllers extends Controller
{
    public function GetDataUmum($id)
    {
        $tes = array();
        $adendum = array();
        $jadual = DB::table('jadual')->select('id', 'nmp')->where('id_data_umum', $id)->get();
        $data = DB::table('data_umum')->where('id', $id)->first();
        foreach ($jadual as $e) {
            $dataJadual = DB::table('detail_jadual')->where('id_jadual', $e->id)->orderBy('tgl', 'asc')->get();
            foreach ($dataJadual as $q) {
                $str = $q->nilai = str_replace(',', '.', $q->nilai);
                $q->nilai = floatval($str);
            }
            array_push($tes, $dataJadual);
        }
        $laporan = DB::table('master_laporan_harian')->where([
            ['ditolak', 4],
            ['id_data_umum', $id],
            ['reason_delete', null]
        ])->get();
        $db_adendum = DB::table('jadual_adendum')->where('id_data_umum',$data->id)->get();
        if ($db_adendum) {
            foreach ($db_adendum as $data_jadual) {
                
            }
        }
        return response()->json([
            "curva" => $tes,
            "data_umum" => $data,
            "laporan" => [$laporan],
        ]);

    }

    public function TestingDaily()
    {
        //$get_request = DB::table('request')->where('status','2')->get();
        $data = DB::table('member')->where('perusahaan', "PT. SECON DWITUNGGAL PUTRA KSO PT.NUANSA GALAXY")->get();


        return response(
        // $get_request
            $data
        );
    }

    public function getAllDataUmumUptd(Request $req)
    {
        $getData = DB::table('data_umum')->where('unor', $req->unor)->get();
        $dataJadual = array();
        $dataLaporan = array();
        if ($req->date == null) {
            foreach ($getData as $data) {
                $jadual = DB::table('data_umum')->join('jadual', 'data_umum.id', '=', 'jadual.id_data_umum')->
                join('detail_jadual', 'jadual.id', '=', 'detail_jadual.id_jadual')->
                where([['data_umum.id', $data->id], ['detail_jadual.tgl', '<=', Carbon::now()]])->get();
                array_push($dataJadual, $jadual);
                $lap = DB::table('data_umum')->join('master_laporan_harian', 'data_umum.id', '=', 'master_laporan_harian.id_data_umum')->where([
                    ['data_umum.id', $data->id],
                    ['master_laporan_harian.tanggal', '<=', Carbon::now()],
                    ['master_laporan_harian.ditolak', 4]
                ])->get();
                array_push($dataLaporan, $lap);
            }
        } else {
            foreach ($getData as $data) {
                $jadual = DB::table('data_umum')->join('jadual', 'data_umum.id', '=', 'jadual.id_data_umum')->
                join('detail_jadual', 'jadual.id', '=', 'detail_jadual.id_jadual')->
                where([['data_umum.id', $data->id], ['detail_jadual.tgl', '<=', $req->date]])->get();
                array_push($dataJadual, $jadual);
                $lap = DB::table('data_umum')->join('master_laporan_harian', 'data_umum.id', '=', 'master_laporan_harian.id_data_umum')->where([
                    ['data_umum.id', $data->id],
                    ['master_laporan_harian.tanggal', '<=', $req->date],
                    ['master_laporan_harian.ditolak', 4],
                    ['reason_delete', null]
                ])->get();
                array_push($dataLaporan, $lap);
            }
        }


        return response()->json([
            'data_umum' => $getData,
            'jadual' => $dataJadual,
            'laporan' => $dataLaporan
        ]);
    }

    public function getAllProgressPerUptd() {

    }
}

