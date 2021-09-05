<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JadualAdendumControllers extends Controller
{
    public function buatJadualAdendum(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $validator = Validator::make($req->all(), [
            // Data Umum
            "bobot" => "required",
            "harga_satuan" => "required",
            "jumlah_harga" => "required",
            "nm_paket" => "required",
            "koefisien" => "required",
            "konsultan" => "required",
            "nama_ppk" => "required",
            "nilai_kontrak" => "required",
            "nilai" => "required",
            "nmp" => "required",
            "panjang" => "required",
            "ruas_jalan" => "required",
            "satuan" => "required",
            "tgl" => "required",
            "unor" => "required",
            "uraian" => "required",
            "volume" => "required",
            "panjang" => "required",
            "ppk" => "required",
            "penyedia" => "required",
            "konsultan" => "required",
            "nama_ppk" => "required",
            "waktu" => "required",
            "id_uptd" => "required",
            "tgl" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'error' => $validator->getMessageBag()->getMessages()
            ], Response::HTTP_BAD_REQUEST);
        }
        $getDataumum = DB::table('data_umum_adendum')->where('id', $req->id_data_umum_adendum)->first();

        $waktu = str_replace(" Hari", "", $req->waktu);
        $panjang = str_replace(" Km", "", $req->panjang);
        $harga = preg_replace('/\./', '', $req->harga_satuan[0]);
        $total = preg_replace('/\./', '', $req->jumlah_harga[0]);
        $nilai_kon = preg_replace('/\./', '', str_replace("Rp. ", "", $req->nilai_kontrak));

        try {
            DB::beginTransaction();
            $get_id = DB::table('jadual_adendum')->insertGetId([
                "id_data_umum" => $req->id_data_umum,
                "nmp" => $req->nmp[0],
                "user" => $req->user_id,
                "unor" => $req->unor,
                "nm_paket" => $req->nm_paket,
                "ruas_jalan" => $req->ruas_jalan,
                "lama_waktu" => $waktu,
                "ppk" => $req->ppk,
                "nm_ppk" => $req->nama_ppk,
                "penyedia" => $req->penyedia,
                "konsultan" => $req->konsultan,
                "nilai_kontrak" => str_replace(",", ".", $nilai_kon),
                "panjang_km" => $panjang,
                "created_at" => \Carbon\Carbon::now(),
                "satuan" => $req->satuan[0],
                "harga_satuan" => str_replace(',', '.', $harga),
                "volume" => $req->volume[0],
                "jumlah_harga" => str_replace(',', '.', $total),
                "bobot" => $req->bobot[0],
                "uraian" => $req->uraian[0],
                "id_uptd" => $req->id_uptd,
                'field_team_konsultan' => $getDataumum->field_team_konsultan,
                "adendum" => $getDataumum->adendum,
                'id_data_umum_adendum' => $getDataumum->id
            ]);

            for ($i = 0; $i < count($req->nmp); $i++) {
                $harga = preg_replace('/\./', '', $req->harga_satuan[$i]);
                $total = preg_replace('/\./', '', $req->jumlah_harga[$i]);
                DB::table('detail_jadual_adendum')->insert(
                    [
                        "id_jadual" => $get_id,
                        "tgl" => $req->tgl[$i],
                        "nmp" => $req->nmp[$i],
                        "uraian" => $req->uraian[$i],
                        "satuan" => $req->satuan[$i],
                        "harga_satuan" => str_replace(',', '.', $harga),
                        "volume" => $req->volume[$i],
                        "jumlah_harga" => str_replace(',', '.', $total),
                        "bobot" => $req->bobot[$i],
                        "koefisien" => $req->koefisien[$i],
                        "nilai" => $req->nilai[$i],
                        "created_at" => \Carbon\Carbon::now()
                    ]
                );
            }
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => '200',
                'result' => 'Data Tersimpan'
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'Failed',
                'code' => '201',
                'result' => $e->getMessage()
            ], 201);
        }
    }

    public function getJadualbyNmp($id)
    {
        return response()->json(
            DB::table('detail_jadual_adendum')->where('id_jadual', $id)->get()
        );
    }

    public function updateJadualAdendum(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $harga = preg_replace('/\./', '', $req->harga_satuan[0]);
        $total = preg_replace('/\./', '', $req->jumlah_harga[0]);
        DB::table('jadual_adendum')->where('id', '=', $req->id_jadual)->update([
            "uraian" => $req->uraian[0],
            "satuan" => $req->satuan[0],
            "harga_satuan" => str_replace(',', '.', $harga),
            "volume" => $req->volume[0],
            "jumlah_harga" => str_replace(',', '.', $total),
            "bobot" => $req->bobot[0],
            "updated_at" => \Carbon\Carbon::now()
        ]);
        for ($i = 0; $i < count($req->nmp); $i++) {
            DB::table('detail_jadual_adendum')->where([
                ['id_jadual', '=', $req->id_jadual],
                ['nmp', '=', $req->id_nmp]
            ])->delete();
        }
        for ($i = 0; $i < count($req->nmp); $i++) {
            $harga = preg_replace('/\./', '', $req->harga_satuan[$i]);
            $total = preg_replace('/\./', '', $req->jumlah_harga[$i]);
            DB::table('detail_jadual_adendum')->insert(
                [
                    "id_jadual" => $req->id_jadual,
                    "tgl" => $req->tgl[$i],
                    "nmp" => $req->nmp[$i],
                    "uraian" => $req->uraian[$i],
                    "satuan" => $req->satuan[$i],
                    "harga_satuan" => str_replace(',', '.', $harga),
                    "volume" => $req->volume[$i],
                    "jumlah_harga" => str_replace(',', '.', $total),
                    "bobot" => $req->bobot[$i],
                    "koefisien" => $req->koefisien[$i],
                    "nilai" => $req->nilai[$i],
                    "created_at" => \Carbon\Carbon::now()
                ]);
        }
        return response()->json([
            "code" => 200
        ]);
    }

    public function deleteJadual(Request $req)
    {
        DB::table('jadual_adendum')->where('id', '=', $req->id)->delete();
        DB::table('detail_jadual_adendum')->where([
            ['nmp', '=', $req->nmp],
            ['id_jadual', '=', $req->id]
        ])->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => "oke"
        ]);
    }
}
