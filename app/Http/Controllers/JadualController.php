<?php

namespace App\Http\Controllers;

use App\Imports\JadualImport;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class JadualController extends Controller
{
    public function getAllJadual()
    {

        $result = DB::table('jadual')->paginate(15);

        return response()->json($result);
    }

    public function getLatestJadual()
    {

        $result = DB::table('jadual')
            ->limit(5)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getJadualById($id)
    {
        $result = DB::table('jadual')
            ->where('id', '=', $id)
            ->first();

        $requestedVolume = DB::table('request')
            ->selectRaw('SUM(volume) as requested_volume')
            ->where('id_jadual', '=', $id)
            ->whereNull('reason_delete')
            ->first();

        $realizationVolume = DB::table('master_laporan_harian')
            ->selectRaw('SUM(volume) as realization_volume')
            ->where('id_jadual', '=', $id)
            ->whereNull('reason_delete')
            ->first();

        $result->requested_volume = $requestedVolume->requested_volume != null ? $requestedVolume->requested_volume : 0;
        $result->realization_volume = $realizationVolume->realization_volume != null ? $realizationVolume->realization_volume : 0;
        $result->is_requestable = ($result->requested_volume == $result->realization_volume) && (floatval($result->volume) > $result->realization_volume);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getDetailJadual($id)
    {

        $jadual = DB::table('jadual')->where('id', $id)->first();

        $detail_jadual = DB::table('detail_jadual')->where('id', $id)->get();

        $jadual->detail_jadual = $detail_jadual;

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $jadual
        ]);
    }

    public function getJadualByKeyword(Request $request)
    {
        $keyword = $request->query("keyword");

        $result = DB::table("jadual")
            ->where("kegiatan", "like", "%" . $keyword . "%")
            ->orWhere("ppk", "like", "%" . $keyword . "%")
            ->orWhere("id", $keyword)
            ->orWhere("waktu_pelaksanaan", $keyword)
            ->orWhere("panjang", $keyword)
            ->paginate();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getTempJadualByIdDataUmumAndKeyword($idDataUmum, Request $request)
    {
        $keyword = $request->keyword;

        $result = DB::table('detail_jadual_parsed')
            ->where('id_data_umum', '=', $idDataUmum)
            ->where(function ($query) use ($keyword) {
                return $query->where('nmp', 'like', '%' . $keyword . '%')
                    ->orWhere('tgl', 'like', '%' . $keyword . '%')
                    ->orWhere('ruas_jalan', 'like', '%' . $keyword . '%')
                    ->orWhere('uraian', 'like', '%' . $keyword . '%');
            })
            ->orderBy('tgl')
            ->paginate();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function deleteAllTempJadual($id)
    {
        DB::table('detail_jadual_parsed')
            ->where('id_data_umum', '=', $id)
            ->delete();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => 'Berhasil menghapus semua jadual sementara'
        ], Response::HTTP_OK);
    }

    public function getAllTempJadualGroupedByNmp($id)
    {
        $list_bobot = DB::table('detail_jadual_parsed')
            ->select('bobot')
            ->where('id_data_umum', '=', $id)
            ->groupBy('nmp')
            ->get();
        $total_bobot = 0;
        foreach ($list_bobot as $bobot) {
            $total_bobot = $total_bobot + floatval($bobot->bobot);
        }

        $list_volume = DB::table('detail_jadual_parsed')
            ->select('volume')
            ->where('id_data_umum', '=', $id)
            ->groupBy('nmp')
            ->get();
        $total_volume = 0;
        foreach ($list_volume as $volume) {
            $total_volume = $total_volume + floatval($volume->volume);
        }

        $list_koefisien = DB::table('detail_jadual_parsed')
            ->select('koefisien')
            ->where('id_data_umum', '=', $id)
            ->groupBy('nmp')
            ->get();
        $total_koefisien = 0;
        foreach ($list_koefisien as $koefisien) {
            $total_koefisien = $total_koefisien + $koefisien->koefisien;
        }

        $total_data = DB::table('detail_jadual_parsed')
            ->selectRaw('COUNT(tgl) as total_hari')
            ->where('id_data_umum', '=', $id)
            ->first();

        $list_nmp = DB::table('detail_jadual_parsed')
            ->selectRaw('nmp, volume, koefisien, bobot')
            ->where('id_data_umum', '=', $id)
            ->groupBy('nmp')
            ->orderBy('nmp')
            ->get();

        $result = [
            'total_bobot' => $total_bobot,
            'total_volume' => $total_volume,
            'total_koefisien' => $total_koefisien,
            'total_data' => $total_data->total_hari,
            'list_nmp' => $list_nmp
        ];

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ], Response::HTTP_OK);
    }

    public function insertTempJadual(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_data_umum' => 'required',
            'tgl' => 'required',
            'nmp' => 'required',
            'uraian' => 'required',
            'satuan' => 'required',
            'harga_satuan' => 'required',
            'volume' => 'required',
            'jumlah_harga' => 'required',
            'bobot' => 'required',
            'koefisien' => 'required',
            'nilai' => 'required',
            'ruas_jalan' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'result' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $data = [
            'id_data_umum' => $request->id_data_umum,
            'tgl' => $request->tgl,
            'nmp' => $request->nmp,
            'uraian' => $request->uraian,
            'satuan' => $request->satuan,
            'harga_satuan' => $request->harga_satuan,
            'volume' => $request->volume,
            'jumlah_harga' => $request->jumlah_harga,
            'bobot' => $request->bobot,
            'koefisien' => $request->koefisien,
            'nilai' => $request->nilai,
            'ruas_jalan' => $request->ruas_jalan
        ];

        DB::table('detail_jadual_parsed')->insert($data);

        return response()->json([
            'status' => 'success',
            'code' => 201,
            'result' => 'Berhasil menambahkan jadual temporary'
        ], Response::HTTP_CREATED);
    }

    public function deleteTempJadual($id)
    {
        DB::table('detail_jadual_parsed')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => 'Berhasil menghapus jadual temporary dengan id ' . $id
        ], Response::HTTP_OK);
    }


    public function parseJadualExcelFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_data_umum' => 'required',
            'ruas_jalan' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'error' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $file = $request->file('jadual_excel_file');

        $list_jadual = Excel::toCollection(new JadualImport, $file)[0];

        DB::table('detail_jadual_parsed')
            ->where('nmp', '=', $list_jadual[0]['no_mata_pembayaran'])
            ->where('id_data_umum', '=', $request->id_data_umum)
            ->delete();

        foreach ($list_jadual as $jadual) {
            DB::table('detail_jadual_parsed')->insert([
                'id_data_umum' => $request->id_data_umum,
                'ruas_jalan' => $request->ruas_jalan,
                'tgl' => Carbon::createFromTimestamp(Date::excelToTimestamp($jadual['tanggal'])),
                'nmp' => $jadual['no_mata_pembayaran'],
                'uraian' => $jadual['uraian'],
                'satuan' => $jadual['satuan'],
                'harga_satuan' => $jadual['harga_satuan_rp'],
                'volume' => $jadual['volume'],
                'jumlah_harga' => $jadual['jumlah_harga_rp'],
                'bobot' => $jadual['bobot'],
                'koefisien' => $jadual['koefisien'],
                'nilai' => $jadual['nilai']
            ]);
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => 'Berhasil untuk menyimpan parsed jadual'
        ], Response::HTTP_OK);
    }

    public function insertJadualFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_data_umum' => 'required',
            'user' => 'required',
            'unor' => 'required',
            'nm_paket' => 'required',
            'lama_waktu' => 'required',
            'panjang_km' => 'required',
            'ppk' => 'required',
            'nm_ppk' => 'required',
            'penyedia' => 'required',
            'konsultan' => 'required',
            'nilai_kontrak' => 'required',
            'id_uptd' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'error' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        DB::beginTransaction();
        try {
            $list_temp_nmp = DB::select('SELECT * FROM detail_jadual_parsed WHERE id_data_umum = 34 AND nmp NOT IN (SELECT nmp FROM jadual WHERE id_data_umum = 34) GROUP BY nmp');

            foreach ($list_temp_nmp as $temp) {
                $idJadual = DB::table('jadual')->insertGetId([
                    "id_data_umum" => $req->id_data_umum,
                    "nmp" => $temp->nmp,
                    "user" => $req->user,
                    "unor" => $req->unor,
                    "id_sup" => $req->id_sup,
                    "nm_paket" => $req->nm_paket,
                    "ruas_jalan" => $temp->ruas_jalan,
                    "lama_waktu" => $req->lama_waktu,
                    "panjang_km" => $req->panjang_km,
                    "ppk" => $req->ppk,
                    "nm_ppk" => $req->nm_ppk,
                    "penyedia" => $req->penyedia,
                    "konsultan" => $req->konsultan,
                    "created_at" => Carbon::now(),
                    "harga_satuan" => $temp->harga_satuan,
                    "volume" => $temp->volume,
                    "satuan" => $temp->satuan,
                    "nilai_kontrak" => $req->nilai_kontrak,
                    "jumlah_harga" => $temp->jumlah_harga,
                    "bobot" => $temp->bobot,
                    "uraian" => $temp->uraian,
                    "id_uptd" => $req->id_uptd
                ]);

                $list_temp_jadual = DB::table('detail_jadual_parsed')
                    ->where('id_data_umum', '=', $req->id_data_umum)
                    ->where('nmp', '=', $temp->nmp)
                    ->get();

                foreach ($list_temp_jadual as $jadual) {
                    DB::table('detail_jadual')->insert([
                        "id_jadual" => $idJadual,
                        "tgl" => $jadual->tgl,
                        "nmp" => $jadual->nmp,
                        "uraian" => $jadual->uraian,
                        "satuan" => $jadual->satuan,
                        "harga_satuan" => $jadual->harga_satuan,
                        "volume" => $jadual->volume,
                        "jumlah_harga" => $jadual->jumlah_harga,
                        "bobot" => $jadual->bobot,
                        "koefisien" => $jadual->koefisien,
                        "nilai" => $jadual->nilai,
                        "created_at" => Carbon::now()
                    ]);
                }
            }

            DB::table('detail_jadual_parsed')->where('id_data_umum', '=', $req->id_data_umum)->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'result' => 'Berhasil upload jadual'
            ], Response::HTTP_OK);

        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'status' => 'success',
                'code' => 500,
                'result' => 'Gagal upload jadual'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function insertJadual(Request $req)
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
        $getDataumum = DB::table('data_umum')->where('id', $req->id_data_umum)->first();

        $waktu = str_replace(" Hari", "", $req->waktu);
        $panjang = str_replace(" Km", "", $req->panjang);
        $harga = preg_replace('/\./', '', $req->harga_satuan[0]);
        $total = preg_replace('/\./', '', $req->jumlah_harga[0]);
        $nilai_kon = preg_replace('/\./', '', str_replace("Rp. ", "", $req->nilai_kontrak));

        try {
            DB::beginTransaction();
            $get_id = DB::table('jadual')->insertGetId([
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
                'field_team_konsultan' => $getDataumum->field_team_konsultan
            ]);

            for ($i = 0; $i < count($req->nmp); $i++) {
                $harga = preg_replace('/\./', '', $req->harga_satuan[$i]);
                $total = preg_replace('/\./', '', $req->jumlah_harga[$i]);
                DB::table('detail_jadual')->insert(
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
                    ]);
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
                'result' => 'Data Gagal',
                'message' => $e->getMessage()
            ], 201);
        }
    }

    public function excelToData(Request $request)
    {
        try {
            $file = $request->file('jadual_excel_file');

            $list_jadual = Excel::toCollection(new JadualImport, $file)[0];
            $nmp = $list_jadual[0]['no_mata_pembayaran'];
            if (!$nmp) {
                return response()->json([
                    'status' => 'error',
                    'code' => '500',
                    'result' => 'Format Salah'
                ], 500);
            } else {

                $master_nmp = DB::table('master_jenis_pekerjaan')->where('id', $nmp)->first();
                if (!$master_nmp) {
                    return response()->json([
                        'status' => 'error',
                        'code' => '500',
                        'result' => 'Nomor Mata Pembayaran Salah Atau Tidak Terdaftar Pada Talikuat Mohon Hubungi Admin UPTD'
                    ], 500);
                }
                foreach ($list_jadual as $jadual) {
                    $jadual['harga_satuan_rp'] = number_format($jadual['harga_satuan_rp'], 2, ',', '.');
                    $jadual['jumlah_harga_rp'] = number_format($jadual['jumlah_harga_rp'], 2, ',', '.');
                    $jadual['bobot'] = number_format($jadual['bobot'], 3, ',', '.');
                    $jadual['tanggal'] = date("Y-n-d", Date::excelToTimestamp($jadual['tanggal']));
                }

                return response()->json([
                    'status' => 'success',
                    'code' => '200',
                    'result' => $list_jadual
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error array',
                'code' => '500',
                'result' => $th->getMessage()
            ], 500);
        }

    }


    public function getNmpByid($id)
    {
        $get = DB::table('master_jenis_pekerjaan')->where('id', '=', $id)->first();
        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $get
        ]);
    }


    public function deleteallnmp(Request $req)
    {
        DB::table('jadual')->where('id', '=', $req->id)->delete();
        DB::table('detail_jadual')->where([
            ['nmp', '=', $req->nmp],
            ['id_jadual', '=', $req->id]
        ])->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => "oke"
        ]);
    }

    public function updateJadual(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $harga = preg_replace('/\./', '', $req->harga_satuan[0]);
        $total = preg_replace('/\./', '', $req->jumlah_harga[0]);
        DB::table('jadual')->where('id', '=', $req->id_jadual)->update([
            "uraian" => $req->uraian[0],
            "satuan" => $req->satuan[0],
            "harga_satuan" => str_replace(',', '.', $harga),
            "volume" => $req->volume[0],
            "jumlah_harga" => str_replace(',', '.', $total),
            "bobot" => $req->bobot[0],
            "updated_at" => \Carbon\Carbon::now()
        ]);
        for ($i = 0; $i < count($req->nmp); $i++) {
            DB::table('detail_jadual')->where([
                ['id_jadual', '=', $req->id_jadual],
                ['nmp', '=', $req->id_nmp]
            ])->delete();
        }
        for ($i = 0; $i < count($req->nmp); $i++) {
            $harga = preg_replace('/\./', '', $req->harga_satuan[$i]);
            $total = preg_replace('/\./', '', $req->jumlah_harga[$i]);
            DB::table('detail_jadual')->insert(
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

    public function getJadualByDataUmumId($id)
    {
        $result = DB::table('jadual')
            ->selectRaw('jadual.*, detail_jadual.tgl')
            ->join('detail_jadual', 'detail_jadual.id_jadual', '=', 'jadual.id')
            ->where('id_data_umum', '=', $id)
            ->groupBy('jadual.id')
            ->get();

        foreach ($result as $jadual) {
            $requestedVolume = DB::table('request')
                ->selectRaw('SUM(volume) as requested_volume')
                ->where('id_jadual', '=', $jadual->id)
                ->whereNull('reason_delete')
                ->first();

            $realizationVolume = DB::table('master_laporan_harian')
                ->selectRaw('SUM(volume) as realization_volume')
                ->where('id_jadual', '=', $jadual->id)
                ->whereNull('reason_delete')
                ->first();

            $jadual->requested_volume = $requestedVolume->requested_volume != null ? $requestedVolume->requested_volume : 0;
            $jadual->realization_volume = $realizationVolume->realization_volume != null ? $realizationVolume->realization_volume : 0;
            $jadual->is_requestable = ($jadual->requested_volume == $jadual->realization_volume) && (floatval($jadual->volume) > $jadual->realization_volume);
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ]);
    }

    public function getJadualNotRequested($id)
    {
        $result = DB::table('jadual')
            ->where('id_data_umum', '=', $id)
            ->whereNull('tgl_req')
            ->get();

        foreach ($result as $jadual) {
            $requestedVolume = DB::table('request')
                ->selectRaw('SUM(volume) as requested_volume')
                ->where('id_jadual', '=', $jadual->id)
                ->whereNull('reason_delete')
                ->first();

            $realizationVolume = DB::table('master_laporan_harian')
                ->selectRaw('SUM(volume) as realization_volume')
                ->where('id_jadual', '=', $jadual->id)
                ->whereNull('reason_delete')
                ->first();

            $jadual->requested_volume = $requestedVolume->requested_volume != null ? $requestedVolume->requested_volume : 0;
            $jadual->realization_volume = $realizationVolume->realization_volume != null ? $realizationVolume->realization_volume : 0;
            $jadual->is_requestable = ($jadual->requested_volume == $jadual->realization_volume) && (floatval($jadual->volume) > $jadual->realization_volume);
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ], Response::HTTP_OK);
    }

    public function getJadualByDataUmumIdAndRuasJalan(Request $request)
    {
        $result = DB::table('jadual')
            ->selectRaw('jadual.*, detail_jadual.tgl')
            ->join('detail_jadual', 'detail_jadual.id_jadual', '=', 'jadual.id')
            ->where('id_data_umum', '=', $request->id_data_umum)
            ->where('ruas_jalan', '=', $request->ruas_jalan)
            ->groupBy('jadual.nmp')
            ->orderBy('tgl')
            ->get();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ]);
    }

    public function getJadualByDataUmumIdAndNmp(Request $req)
    {
        $id_data_umum = $req->input('id_data_umum');
        $nmp = $req->input('nmp');

        $result = DB::table('jadual')
            ->where('id_data_umum', '=', $id_data_umum)
            ->where('nmp', '=', $nmp)
            ->first();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ]);
    }

    public function getNmpJadual($id)
    {
        return response()->json(
            DB::table('detail_jadual')->where('id_jadual', $id)->get()
        );
    }
}
