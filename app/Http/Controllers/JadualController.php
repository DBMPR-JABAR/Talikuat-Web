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

    public
    function insertJadualFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_data_umum' => 'required',
            'user' => 'required',
            'unor' => 'required',
            'nm_paket' => 'required',
            'ruas_jalan' => 'required',
            'lama_waktu' => 'required',
            'panjang_km' => 'required',
            'ppk' => 'required',
            'nm_ppk' => 'required',
            'penyedia' => 'required',
            'konsultan' => 'required',
            'nilai_kontrak' => 'required',
            'id_uptd' => 'required',
            'list_jadual' => 'present|array',
            'list_jadual.*.bobot' => 'required',
            'list_jadual.*.harga_satuan_rp' => 'required',
            'list_jadual.*.jumlah_harga_rp' => 'required',
            'list_jadual.*.koefisien' => 'required',
            'list_jadual.*.nilai' => 'required',
            'list_jadual.*.no_mata_pembayaran' => 'required',
            'list_jadual.*.satuan' => 'required',
            'list_jadual.*.tanggal' => 'required',
            'list_jadual.*.uraian' => 'required',
            'list_jadual.*.volume' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'error' => $validator->getMessageBag()->getMessages()
            ], Response::HTTP_BAD_REQUEST);
        }

        $first_item = $req->input('list_jadual')[0];
        foreach ($req->input('list_jadual') as $jadual_item) {
            if ($jadual_item['no_mata_pembayaran'] != $first_item['no_mata_pembayaran']) {
                return response()->json([
                    'status' => 'failed',
                    'code' => 400,
                    'error' => 'No mata pembayaran tidak seragam'
                ], Response::HTTP_BAD_REQUEST);
            }
        }

        $data = [
            "id_data_umum" => $req->id_data_umum,
            "nmp" => $first_item['no_mata_pembayaran'],
            "user" => $req->user,
            "unor" => $req->unor,
            "id_sup" => $req->id_sup,
            "nm_paket" => $req->nm_paket,
            "ruas_jalan" => $req->ruas_jalan,
            "lama_waktu" => $req->lama_waktu,
            "panjang_km" => $req->panjang_km,
            "ppk" => $req->ppk,
            "nm_ppk" => $req->nm_ppk,
            "penyedia" => $req->penyedia,
            "konsultan" => $req->konsultan,
            "created_at" => Carbon::now(),
            "harga_satuan" => $first_item["harga_satuan_rp"],
            "volume" => $first_item["volume"],
            "satuan" => $first_item["satuan"],
            "nilai_kontrak" => $req->nilai_kontrak,
            "jumlah_harga" => $first_item["jumlah_harga_rp"],
            "bobot" => $first_item["bobot"],
            "uraian" => $first_item["uraian"],
            "id_uptd" => $req->id_uptd
        ];

        try {
            $jadualId = DB::table("jadual")->insertGetId($data);
        } catch (QueryException $error) {
            $data["harga_satuan"] = str_replace(",", "", $data["harga_satuan"]);
            $data["jumlah_harga"] = str_replace(",", "", $data["jumlah_harga"]);
            $jadualId = DB::table("jadual")->insertGetId($data);
        }

        foreach ($req->input('list_jadual') as $jadual_item) {

            $rincianJadual = [
                "id_jadual" => $jadualId,
                "tgl" => Carbon::parse($jadual_item["tanggal"]),
                "nmp" => $jadual_item["no_mata_pembayaran"],
                "uraian" => $jadual_item["uraian"],
                "satuan" => $jadual_item["satuan"],
                "harga_satuan" => $jadual_item["harga_satuan_rp"],
                "volume" => $jadual_item["volume"],
                "jumlah_harga" => $jadual_item["jumlah_harga_rp"],
                "bobot" => $jadual_item["bobot"],
                "koefisien" => $jadual_item["koefisien"],
                "nilai" => $jadual_item["nilai"],
                "created_at" => Carbon::now()
            ];

            try {
                DB::table("detail_jadual")->insert($rincianJadual);
            } catch (QueryException $error) {
                $rincianJadual["harga_satuan"] = str_replace(",", "", $rincianJadual["harga_satuan"]);
                $rincianJadual["jumlah_harga"] = str_replace(",", "", $rincianJadual["jumlah_harga"]);
                DB::table("detail_jadual")->insert($rincianJadual);
            }

        }

        return response()->json([
            'status' => 'success',
            'code' => 201
        ], Response::HTTP_CREATED);

    }

    public
    function insertJadual(Request $req)
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


        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => 'Data Tersimpan'
        ]);
    }

    public
    function excelToData(Request $request)
    {

        $file = $request->file('jadual_excel_file');

        $list_jadual = Excel::toCollection(new JadualImport, $file)[0];

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


    public
    function getNmpByid($id)
    {
        $get = DB::table('master_jenis_pekerjaan')->where('id', '=', $id)->first();
        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $get
        ]);
    }


    public
    function deleteallnmp(Request $req)
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

    public
    function updateJadual(Request $req)
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

    public
    function getJadualByDataUmumId($id)
    {
        $result = DB::table('jadual')
            ->selectRaw('jadual.*, detail_jadual.tgl')
            ->join('detail_jadual', 'detail_jadual.id_jadual', '=', 'jadual.id')
            ->where('id_data_umum', '=', $id)
            ->groupBy('jadual.id')
            ->get();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ]);
    }

    public
    function getJadualByDataUmumIdAndRuasJalan(Request $request)
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

    public
    function getJadualByDataUmumIdAndNmp(Request $req)
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

    public
    function getNmpJadual($id)
    {
        return response()->json(
            DB::table('detail_jadual')->where('id_jadual', $id)->get()
        );
    }
}
