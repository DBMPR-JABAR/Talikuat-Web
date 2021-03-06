<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DataUmumController extends Controller
{

    private $PATH_FILE_DOCUMENTS = "C:\\xampp\\htdocs\\talikuat\\lampiran\\umum";

    public function getLatestDataUmum(Request $request)
    {
        $query = DB::connection('talikuat_old')->table('data_umum')
            ->limit(5)
            ->orderByDesc('id');

        switch ($request->type) {
            case 'KONTRAKTOR':
                $result = $query
                    ->where('penyedia', '=', $request->value)
                    ->get();
                break;
            case 'KONSULTAN':
                $result = $query
                    ->where('konsultan', '=', $request->value)
                    ->get();
                break;
            case 'ADMIN-UPTD':
                $result = $query
                    ->where('unor', '=', $request->value)
                    ->get();
                break;
            case 'PPK':
                $result = $query
                    ->where('nm_ppk', '=', $request->value)
                    ->get();
                break;
            default:
                $result = $query->get();
                break;
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }


    public function getDataUmumByKeyword(Request $request)
    {
        $keyword = $request->query("keyword");
        $query = DB::connection('talikuat_old')->table('data_umum')
            ->where(function ($query) use ($keyword) {
                $query->where('nm_paket', 'like', '%' . $keyword . '%')
                    ->orWhere('unor', 'like', '%' . $keyword . '%');
            });

        switch ($request->type) {
            case 'KONTRAKTOR':
                $result = $query->where('penyedia', '=', $request->value)->paginate();
                break;
            case 'KONSULTAN':
                $result = $query->where('konsultan', '=', $request->value)->paginate();
                break;
            case 'ADMIN-UPTD':
                $result = $query->where('unor', '=', $request->value)->paginate();
                break;
            case 'PPK':
                $result = $query->where('nm_ppk', '=', $request->value)->paginate();
                break;
            default:
                $result = $query->paginate();
                break;
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getDataUmumById($id)
    {
        $result = DB::connection('talikuat_old')->table('data_umum')->where('id', '=', $id)->first();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getAllKategori(Request $request)
    {

        $result = DB::connection('talikuat_old')->table('kategori_paket')->get();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function insertDataUmum(Request $request)
    // cek lagi untuk mobile ada yang di ganti :)              <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    {
        date_default_timezone_set('Asia/Jakarta');
        $validator = Validator::make($request->all(), [
            // Data Umum
            "pemda" => "required",
            "opd" => "required",
            "unor" => "required",
            "nm_paket" => "required",
            "kategori" => "required",
            "no_kontrak" => "required",
            "tgl_kontrak" => "required",
            "nilai_kontrak" => "required",
            "no_spmk" => "required",
            "tgl_spmk" => "required",
            "panjang" => "required",
            "lama_waktu" => "required",
            "ppk_kegiatan" => "required",
            "penyedia" => "required",
            "konsultan" => "required",
            "nama_ppk" => "required",
            "nama_se" => "required",
            "nama_gs" => "required",
            "segmen_jalan" => "required",
            "ruas_jalan" => "required",
            //"sup"=>"required"

            // List Data Umum Ruas
            // "list_data_umum_ruas" => "required|json",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'error' => $validator->getMessageBag()->getMessages()
            ], Response::HTTP_BAD_REQUEST);
        }
        $replace = str_replace(',', '.', $request->input('nilai_kontrak'));

        $getSE = DB::connection('talikuat_old')->table('team_konsultan')->where('id', $request->nama_se)->first();

        $data = [
            // Data Umum
            'pemda' => $request->input("pemda"),
            "opd" => $request->input("opd"),
            "unor" => $request->input("unor"),
            "kategori" => $request->input("kategori"),
            "nm_paket" => $request->input("nm_paket"),
            "no_kontrak" => $request->input("no_kontrak"),
            "tgl_kontrak" => $request->input("tgl_kontrak"),
            "nilai_kontrak" => $replace,
            "no_spmk" => $request->input("no_spmk"),
            "tgl_spmk" => $request->input("tgl_spmk"),
            "panjang_km" => $request->input("panjang"),
            "lama_waktu" => $request->input("lama_waktu"),
            "ppk" => $request->input("ppk_kegiatan"),
            "penyedia" => $request->input("penyedia"),
            "konsultan" => $request->input("konsultan"),
            "nm_ppk" => $request->input("nama_ppk"),
            "nm_se" => $getSE->nama,
            "nm_gs" => $request->nama_gs,
            "is_adendum" => 0,
            //"id_sup"=>$request->input('sup'),
            "id_uptd" => $request->input("id_uptd"),
            "created_at" => \Carbon\Carbon::now(),
            'field_team_konsultan' => $request->nama_se
        ];

        $insertedDataUmumId = DB::connection('talikuat_old')->table('data_umum')->insertGetId($data);

        // List Ruas Jalan
        if ($request->list_data_umum_ruas) {

            $listDataUmumRuas = $request->input('list_data_umum_ruas');

            foreach ($listDataUmumRuas as $dataUmumRuas) {
                if (
                    !isNotNullOrBlank($dataUmumRuas["ruas_jalan"]) ||
                    !isNotNullOrBlank($dataUmumRuas["segment_jalan"]) ||
                    !isNotNullOrBlank($dataUmumRuas["lat_awal"]) ||
                    !isNotNullOrBlank($dataUmumRuas["long_awal"]) ||
                    !isNotNullOrBlank($dataUmumRuas["lat_akhir"]) ||
                    !isNotNullOrBlank($dataUmumRuas["long_akhir"])
                ) {
                    return response()->json([
                        'status' => 'failed',
                        'code' => '400',
                        'error' => 'Data Umum Ruas Ada Yang Kosong Atau Null'
                    ], Response::HTTP_BAD_REQUEST);
                }
            }


            foreach ($listDataUmumRuas as $dataUmumRuas) {
                DB::connection('talikuat_old')->table('data_umum_ruas')->insert([
                    "id_data_umum" => $insertedDataUmumId, // diganti sesuai DB
                    "ruas_jalan" => $dataUmumRuas["ruas_jalan"],
                    "segment_jalan" => $dataUmumRuas["segmen_jalan"],
                    "lat_awal" => $dataUmumRuas["lat_awal"],
                    "long_awal" => $dataUmumRuas["long_awal"],
                    "lat_akhir" => $dataUmumRuas["lat_akhir"],
                    "long_akhir" => $dataUmumRuas["long_akhir"],
                    "created_at" => \Carbon\Carbon::now()
                ]);
            }

            $data['id'] = $insertedDataUmumId;

            return response()->json([
                'status' => 'success',
                'code' => '200',
                'result' => $data
            ]);
        } else {
            for ($i = 0; $i < count($request->ruas_jalan); $i++) {
                DB::connection('talikuat_old')->table("data_umum_ruas")->insert([
                    "id_data_umum" => $insertedDataUmumId,
                    "ruas_jalan" => $request->ruas_jalan[$i],
                    "segment_jalan" => $request->segmen_jalan[$i],
                    "lat_awal" => $request->lat_awal[$i],
                    "long_awal" => $request->long_awal[$i],
                    "lat_akhir" => $request->lat_akhir[$i],
                    "long_akhir" => $request->long_akhir[$i],
                    "created_at" => \Carbon\Carbon::now()
                ]);
            }
        }
        $data['id'] = $insertedDataUmumId;
        // $data['list_data_umum_ruas'] = $listDataUmumRuas;

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $insertedDataUmumId
        ]);
    }

    public function insertDataUmumFromMobile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Data Umum
            "pemda" => "required",
            "opd" => "required",
            "unor" => "required",
            "id_uptd" => "required",
            "nm_paket" => "required",
            "kategori" => "required",
            "no_kontrak" => "required",
            "tgl_kontrak" => "required",
            "nilai_kontrak" => "required",
            "no_spmk" => "required",
            "tgl_spmk" => "required",
            "panjang" => "required",
            "lama_waktu" => "required",
            "ppk_kegiatan" => "required",
            "penyedia" => "required",
            "konsultan" => "required",
            "nama_ppk" => "required",
            "nama_se" => "required",
            "nama_gs" => "required",
            "list_data_umum_ruas" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'error' => $validator->getMessageBag()->getMessages()
            ], Response::HTTP_BAD_REQUEST);
        }

        $listDataUmumRuas = $request->input('list_data_umum_ruas');

        foreach ($listDataUmumRuas as $dataUmumRuas) {
            if (
                !isNotNullOrBlank($dataUmumRuas["ruas_jalan"]) ||
                !isNotNullOrBlank($dataUmumRuas["segment_jalan"]) ||
                !isNotNullOrBlank($dataUmumRuas["lat_awal"]) ||
                !isNotNullOrBlank($dataUmumRuas["long_awal"]) ||
                !isNotNullOrBlank($dataUmumRuas["lat_akhir"]) ||
                !isNotNullOrBlank($dataUmumRuas["long_akhir"])
            ) {
                return response()->json([
                    'status' => 'failed',
                    'code' => '400',
                    'error' => 'Data Umum Ruas Ada Yang Kosong Atau Null'
                ], Response::HTTP_BAD_REQUEST);
            }
        }

        $data = [
            // Data Umum
            'pemda' => $request->input("pemda"),
            "opd" => $request->input("opd"),
            "unor" => $request->input("unor"),
            "kategori" => $request->input("kategori"),
            "nm_paket" => $request->input("nm_paket"),
            "no_kontrak" => $request->input("no_kontrak"),
            "tgl_kontrak" => $request->input("tgl_kontrak"),
            "nilai_kontrak" => $request->input("nilai_kontrak"),
            "no_spmk" => $request->input("no_spmk"),
            "tgl_spmk" => $request->input("tgl_spmk"),
            "panjang_km" => $request->input("panjang"),
            "lama_waktu" => $request->input("lama_waktu"),
            "ppk" => $request->input("ppk_kegiatan"),
            "penyedia" => $request->input("penyedia"),
            "konsultan" => $request->input("konsultan"),
            "nm_ppk" => $request->input("nama_ppk"),
            "nm_se" => $request->input("nama_se"),
            "nm_gs" => $request->input("nama_gs"),
            "is_adendum" => 0,
            //"id_sup"=>$request->input('sup'),
            "id_uptd" => $request->input("id_uptd"),
            "created_at" => \Carbon\Carbon::now()
        ];

        $insertedDataUmumId = DB::connection('talikuat_old')->table('data_umum')->insertGetId($data);

        $data['id'] = $insertedDataUmumId;

        foreach ($listDataUmumRuas as $dataUmumRuas) {
            DB::connection('talikuat_old')->table('data_umum_ruas')->insert([
                "id_data_umum" => $insertedDataUmumId, // diganti sesuai DB
                "ruas_jalan" => $dataUmumRuas["ruas_jalan"],
                "segment_jalan" => $dataUmumRuas["segment_jalan"],
                "lat_awal" => $dataUmumRuas["lat_awal"],
                "long_awal" => $dataUmumRuas["long_awal"],
                "lat_akhir" => $dataUmumRuas["lat_akhir"],
                "long_akhir" => $dataUmumRuas["long_akhir"],
                "created_at" => \Carbon\Carbon::now()
            ]);
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $data
        ]);
    }


    public function getDataUmumRuasByKeyword($id, Request $request)
    {

        $result = DB::connection('talikuat_old')->table('data_umum_ruas')
            ->where('id_data_umum', '=', $id)
            ->where(function ($query) use ($request) {
                $query->where('ruas_jalan', 'like', '%' . $request->input('keyword') . '%')
                    ->orWhere('segment_jalan', 'like', '%' . $request->input('keyword') . '%');
            })
            ->paginate(15);

        foreach ($result as $key => $value) {
            $value->id = $key + 1;
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getDataUmumRuas($id)
    {

        $result = DB::connection('talikuat_old')->table('data_umum_ruas')
            ->where('id_data_umum', '=', $id)
            ->get();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function updateDataUmum(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $replace = str_replace(',', '.', $req->input('nilai_kontrak'));
        $getSE = DB::connection('talikuat_old')->table('team_konsultan')->where('id', $req->nama_se)->first();
        $data = [
            // Data Umum
            'pemda' => $req->input("pemda"),
            "opd" => $req->input("opd"),
            "unor" => $req->input("unor"),
            "kategori" => $req->input("kategori"),
            "nm_paket" => $req->input("nm_paket"),
            "no_kontrak" => $req->input("no_kontrak"),
            "tgl_kontrak" => $req->input("tgl_kontrak"),
            "nilai_kontrak" => $replace,
            "no_spmk" => $req->input("no_spmk"),
            "tgl_spmk" => $req->input("tgl_spmk"),
            "panjang_km" => $req->input("panjang_km"),
            "lama_waktu" => $req->input("lama_waktu"),
            "ppk" => $req->input("ppk"),
            "penyedia" => $req->input("penyedia"),
            "konsultan" => $req->input("konsultan"),
            "nm_ppk" => $req->input("nm_ppk"),
            "nm_se" => $getSE->nama,
            'field_team_konsultan' => $getSE->id,
            "nm_gs" => $req->input("nm_gs"),
            "is_adendum" => 0,
            "updated_at" => \Carbon\Carbon::now()
        ];
        DB::connection('talikuat_old')->table('data_umum')->where('id', $req->id)->update($data);
        DB::connection('talikuat_old')->table('jadual')->where('id_data_umum', $req->id)->update([
            "nm_paket" => $req->input("nm_paket"),
            "nilai_kontrak" => $replace,
            "panjang_km" => $req->input("panjang_km"),
            "lama_waktu" => $req->input("lama_waktu"),
            "penyedia" => $req->input("penyedia"),
            "konsultan" => $req->input("konsultan"),
            "nm_ppk" => $req->input("nm_ppk"),
            'field_team_konsultan' => $getSE->id,
        ]);
        DB::connection('talikuat_old')->table('data_umum_ruas')->where('id_data_umum', $req->id)->delete();
        for ($i = 0; $i < count($req->ruas_jalan); $i++) {
            DB::connection('talikuat_old')->table("data_umum_ruas")->insert([
                "id_data_umum" => $req->id,
                "ruas_jalan" => $req->ruas_jalan[$i],
                "segment_jalan" => $req->segmen_jalan[$i],
                "lat_awal" => $req->lat_awal[$i],
                "long_awal" => $req->long_awal[$i],
                "lat_akhir" => $req->lat_akhir[$i],
                "long_akhir" => $req->long_akhir[$i],
                "created_at" => \Carbon\Carbon::now()
            ]);
        }
        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => "oke"
        ]);
    }

    public function addAdendum(Request $req)
    {
        $curva = DB::connection('talikuat_old')->table('jadual')->where('id_data_umum', $req->id)->sum('bobot');
        if (number_format($curva, 2, '.', '') != 100.00) {
            return response()->json([
                'status' => 'failed',
                'code' => '503',
                'message' => 'Data Jadual Belum Selesai ' . $curva
            ], 503);
        }
        $valid_adendum = DB::connection('talikuat_old')->table('master_laporan_harian')->where('id_data_umum', $req->id)->whereNull('reason_delete')->whereNull('ditolak')->count();
        if ($valid_adendum != 0) {
            return response()->json([
                'status' => 'failed',
                'code' => '503',
                'message' => 'Masih Ada Data Laporan Yang Belum Di Approve'
            ], 503);
        }
        $valid = DB::connection('talikuat_old')->table('master_laporan_harian')->where([['id_data_umum', $req->id], ['ditolak', 1]])->whereNull('reason_delete')->count();
        if ($valid != 0) {
            return response()->json([
                'status' => 'failed',
                'code' => '503',
                'message' => 'Masih Ada Data Laporan Yang Belum Di Approve'
            ], 503);
        }

        try {
            DB::beginTransaction();
            $get_data = DB::connection('talikuat_old')->table('data_umum')->where('id', $req->id)->first();
            $data = [
                'id_data_umum' => $req->id,
                'pemda' => $get_data->pemda,
                "opd" => $get_data->opd,
                "unor" => $get_data->unor,
                "kategori" => $get_data->kategori,
                "nm_paket" => $get_data->nm_paket,
                "no_kontrak" => $get_data->no_kontrak,
                "tgl_adendum" => $get_data->tgl_kontrak,
                "nilai_kontrak" => $get_data->nilai_kontrak,
                "no_spmk" => $get_data->no_spmk,
                "tgl_spmk" => $get_data->tgl_spmk,
                "panjang_km" => $get_data->panjang_km,
                "lama_waktu" => $get_data->lama_waktu,
                "ppk" => $get_data->ppk,
                "penyedia" => $get_data->penyedia,
                "konsultan" => $get_data->konsultan,
                "nm_ppk" => $get_data->nm_ppk,
                "nm_se" => $get_data->nm_se,
                "nm_gs" => $get_data->nm_gs,
                "field_team_konsultan" => $get_data->field_team_konsultan,
                "adendum" => "Adendum 1",
                "created_at" => \Carbon\Carbon::now()
            ];
            DB::connection('talikuat_old')->table('data_umum_adendum')->insert($data);
            DB::connection('talikuat_old')->table('data_umum')->where("id", $req->id)->update([
                "is_adendum" => 1
            ]);


            DB::connection('talikuat_old')->table('request')->where('nama_kegiatan', $get_data->nm_paket)->update([
                'disabled' => 1
            ]);

            DB::commit();
            return response()->json([
                "code" => 200
            ], 200);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                "code" => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }


    // public function AddNewAdendum(Request $req)
    // {
    //     $valid_adendum = DB::connection('talikuat_old')->table('master_laporan_harian_adendum')->where('id_data_umum', $req->id)->whereNull('reason_delete')->whereNull('ditolak')->count();
    //     if ($valid_adendum != 0) {
    //         return response()->json([
    //             'status' => 'failed',
    //             'code' => '503',
    //             'message' => 'Masih Ada Data Laporan Yang Belum Di Approve'
    //         ],503);
    //     }
    //     $valid = DB::connection('talikuat_old')->table('master_laporan_harian_adendum')->where([['id_data_umum', $req->id],['ditolak',1]])->whereNull('reason_delete')->count();
    //     if ($valid != 0) {
    //         return response()->json([
    //             'status' => 'failed',
    //             'code' => '503',
    //             'message' => 'Masih Ada Data Laporan Yang Belum Di Approve'
    //         ],503);
    //     }
    //     $get_data = DB::connection('talikuat_old')->table('data_umum_adendum')->where('id_data_umum', $req->id)->get();
    //     DB::connection('talikuat_old')->table('data_umum_adendum')->where([
    //         ["is_adendum", null],
    //         ["id_data_umum", "=", $req->id]
    //     ])->update([
    //         "is_adendum" => 1
    //     ]);

    //     $data = [
    //         // Data Umum
    //         'id_data_umum' => $req->id,
    //         'adendum' => "Adendum " . count($get_data) + 1,
    //         'pemda' => $get_data[0]->pemda,
    //         "opd" => $get_data[0]->opd,
    //         "unor" => $get_data[0]->unor,
    //         "kategori" => $get_data[0]->kategori,
    //         "nm_paket" => $get_data[0]->nm_paket,
    //         "no_kontrak" => $get_data[0]->no_kontrak,
    //         "tgl_kontrak" => $get_data[0]->tgl_kontrak,
    //         "nilai_kontrak" => $get_data[0]->nilai_kontrak,
    //         "no_spmk" => $get_data[0]->no_spmk,
    //         "tgl_spmk" => $get_data[0]->tgl_spmk,
    //         "panjang_km" => $get_data[0]->panjang_km,
    //         "lama_waktu" => $get_data[0]->lama_waktu,
    //         "ppk" => $get_data[0]->ppk,
    //         "penyedia" => $get_data[0]->penyedia,
    //         "konsultan" => $get_data[0]->konsultan,
    //         "nm_ppk" => $get_data[0]->nm_ppk,
    //         "nm_se" => $get_data[0]->nm_se,
    //         "nm_gs" => $get_data[0]->nm_gs,
    //         "field_team_konsultan"=>$get_data[0]->field_team_konsultan,
    //         "created_at" => \Carbon\Carbon::now()
    //     ];
    //     DB::connection('talikuat_old')->table('data_umum_adendum')->insert($data);
    //     $get_data_ruas = DB::connection('talikuat_old')->table('data_umum_ruas')->where('id_data_umum', $req->id)->get();

    //     foreach ($get_data_ruas as $data) {
    //         DB::connection('talikuat_old')->table('data_umum_ruas_adendum')->insert([
    //             "id_data_umum_adendum" => $data->id_data_umum,
    //             "ruas_jalan" => $data->ruas_jalan,
    //             "segment_jalan" => $data->segment_jalan,
    //             "lat_awal" => $data->lat_awal,
    //             "long_awal" => $data->long_awal,
    //             "lat_akhir" => $data->lat_akhir,
    //             "long_akhir" => $data->long_akhir,
    //             "adendum" => "Adendum " . count($get_data) + 1,
    //             "created_at" => \Carbon\Carbon::now()
    //         ]);
    //     }
    //     return response()->json([
    //         "code" => 200
    //     ], 200);
    // }

    public function getDokumen($id, Request $request)
    {

        if (empty($request->input('file'))) {
            return response()->json([
                "status" => "success",
                "code" => 404,
                "result" => "file Tidak Boleh Kosong"
            ], Response::HTTP_BAD_REQUEST);
        }

        switch ($request->input('file')) {

            case "file_dkh":

                $result = DB::connection('talikuat_old')->table('file_dkh_update')
                    ->selectRaw("id, id_data_umum, file_dkh_update as file, created_at")
                    ->where('id_data_umum', '=', $id)
                    ->get();

                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "result" => $result
                ], Response::HTTP_OK);

                break;

            case "file_kontrak":

                $result = DB::connection('talikuat_old')->table('file_kontrak_update')
                    ->selectRaw("id, id_data_umum, file_kontrak_update as file, created_at")
                    ->where('id_data_umum', '=', $id)
                    ->get();

                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "result" => $result
                ], Response::HTTP_OK);

                break;

            case "file_spmk":

                $result = DB::connection('talikuat_old')->table('file_spmk_update')
                    ->selectRaw("id, id_data_umum, file_spmk_update as file, created_at")
                    ->where('id_data_umum', '=', $id)
                    ->get();

                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "result" => $result
                ], Response::HTTP_OK);

                break;

            case "file_syarat_umum":

                $result = DB::connection('talikuat_old')->table('file_syarat_umum_update')
                    ->selectRaw("id, id_data_umum, file_syarat_umum_update as file, created_at")
                    ->where('id_data_umum', '=', $id)
                    ->get();

                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "result" => $result
                ], Response::HTTP_OK);

                break;

            case "file_syarat_khusus":

                $result = DB::connection('talikuat_old')->table('file_syarat_khusus_update')
                    ->selectRaw("id, id_data_umum, file_syarat_khusus_update as file, created_at")
                    ->where('id_data_umum', '=', $id)
                    ->get();

                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "result" => $result
                ], Response::HTTP_OK);

                break;

            case "file_jpp":

                $result = DB::connection('talikuat_old')->table('file_jpp_update')
                    ->selectRaw("id, id_data_umum, file_jpp_update as file, created_at")
                    ->where('id_data_umum', '=', $id)
                    ->get();

                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "result" => $result
                ], Response::HTTP_OK);

                break;

            case "file_rencana":

                $result = DB::connection('talikuat_old')->table('file_rencana_update')
                    ->selectRaw("id, id_data_umum, file_rencana_update as file, created_at")
                    ->where('id_data_umum', '=', $id)
                    ->get();

                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "result" => $result
                ], Response::HTTP_OK);

                break;

            case "file_sppbj":

                $result = DB::connection('talikuat_old')->table('file_sppbj_update')
                    ->selectRaw("id, id_data_umum, file_sppbj_update as file, created_at")
                    ->where('id_data_umum', '=', $id)
                    ->get();

                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "result" => $result
                ], Response::HTTP_OK);

                break;

            case "file_spl":

                $result = DB::connection('talikuat_old')->table('file_spl_update')
                    ->selectRaw("id, id_data_umum, file_spl_update as file, created_at")
                    ->where('id_data_umum', '=', $id)
                    ->get();

                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "result" => $result
                ], Response::HTTP_OK);

                break;

            case "file_spek_umum":

                $result = DB::connection('talikuat_old')->table('file_spek_umum_update')
                    ->selectRaw("id, id_data_umum, file_spek_umum_update as file, created_at")
                    ->where('id_data_umum', '=', $id)
                    ->get();

                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "result" => $result
                ], Response::HTTP_OK);

                break;

            case "file_jaminan":

                $result = DB::connection('talikuat_old')->table('file_jaminan_update')
                    ->selectRaw("id, id_data_umum, file_jaminan_update as file, created_at")
                    ->where('id_data_umum', '=', $id)
                    ->get();

                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "result" => $result
                ], Response::HTTP_OK);

                break;

            case "file_spkmp":

                $result = DB::connection('talikuat_old')->table('file_spkmp_update')
                    ->selectRaw("id, id_data_umum, file_spkmp_update as file, created_at")
                    ->where('id_data_umum', '=', $id)
                    ->get();

                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "result" => $result
                ], Response::HTTP_OK);

                break;

            default:

                return response()->json([
                    "status" => "success",
                    "code" => 404,
                    "result" => "file Tidak Ada"
                ], Response::HTTP_BAD_REQUEST);

                break;
        }
    }

    public function getUploadedDokumen($id, Request $request)
    {

        if (empty($request->input('file'))) {
            return response()->json([
                "status" => "success",
                "code" => 404,
                "result" => "file Tidak Boleh Kosong"
            ], Response::HTTP_BAD_REQUEST);
        }

        switch ($request->input('file')) {

            case "file_dkh":

                $result = DB::connection('talikuat_old')->table('file_dkh')
                    ->selectRaw("id, id_data_umum, dkh as file, created_at")
                    ->where('id_data_umum', '=', $id)
                    ->get();

                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "result" => $result
                ], Response::HTTP_OK);

                break;

            default:

                return response()->json([
                    "status" => "success",
                    "code" => 404,
                    "result" => "file Tidak Ada"
                ], Response::HTTP_BAD_REQUEST);

                break;
        }
    }

    public function getProgressPekerjaan()
    {
    }
}
