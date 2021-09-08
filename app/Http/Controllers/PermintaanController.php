<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PermintaanController extends Controller
{
    private $PATH_FILE_DB = "public/lampiran/file_req";

    public function getAllPermintaan()
    {

        $result = DB::table('request')->get();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getLatestPermintaan()
    {

        $result = DB::table('request')
            ->limit(5)
            ->orderBy('id', 'desc')
            ->get();


        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getPermintaanByKeyword(Request $request)
    {

        $keyword = $request->query("keyword");

        $result = DB::table("request")
            ->where("nama_kegiatan", "like", "%" . $keyword . "%")
            ->orWhere("id", $keyword)
            ->orWhere("diajukan_tgl", "like", "%" . $keyword . "%")
            ->orWhere("lokasi_sta", "like", "%" . $keyword . "%")
            ->orWhere("jenis_pekerjaan", "like", "%" . $keyword . "%")
            ->orWhere("volume", "like", "%" . $keyword . "%")
            ->paginate(15);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getPermintaanDetailById($id)
    {
        try {
            $result = DB::table('request')
                ->selectRaw('request.*, jadual.ruas_jalan')
                ->join('jadual', 'request.id_jadual', '=', 'jadual.id')
                ->where('request.id', '=', $id)
                ->first();

            $result->sketsa = Storage::url($result->sketsa);
            $result->metode_kerja = $result->metode_kerja != null ? Storage::url($result->metode_kerja) : null;
            $result->foto_konsultan = $result->foto_konsultan != null ? Storage::url($result->foto_konsultan) : null;
            $result->foto_ppk = $result->foto_ppk != null ? Storage::url($result->foto_ppk) : null;
            $result->checklist = $result->checklist != null ? Storage::url($result->checklist) : null;

            $bahan = DB::table('detail_request_bahan')->where('id_request', '=', $result->id)->get();
            $campuran = DB::table('detail_request_jmf')->where('id_request', '=', $result->id)->get();
            $peralatan = DB::table('detail_request_peralatan')->where('id_request', '=', $result->id)->get();
            $pekerja = DB::table('detail_request_tkerja')->where('id_request', '=', $result->id)->get();

            foreach ($bahan as $index => $item_bahan) {
                $item_bahan->id = $index + 1;
            }

            foreach ($campuran as $index => $item_campuran) {
                $item_campuran->id = $index + 1;
            }

            foreach ($peralatan as $index => $item_alat) {
                $item_alat->id = $index + 1;
            }

            foreach ($pekerja as $index => $item_pekerja) {
                $item_pekerja->id = $index + 1;
            }

            $result->bahan = $bahan;
            $result->campuran = $campuran;
            $result->peralatan = $peralatan;
            $result->pekerja = $pekerja;

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'result' => $result
            ], Response::HTTP_OK);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'failed',
                'code' => 500,
                'message' => 'Gagal Mengambil Detail Permintaan Pekerjaan Dengan Id ' . $id
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPermintaanByDataUmumId($id)
    {
        $result = DB::table('request')
            ->selectRaw('request.*, jadual.ruas_jalan')
            ->join('jadual', 'request.id_jadual', '=', 'jadual.id')
            ->where('jadual.id_data_umum', '=', $id)
            ->whereNotNull('jadual.tgl_req')
            ->get();

        foreach ($result as $item) {
            $item->sketsa = Storage::url($item->sketsa);
            $item->metode_kerja = $item->metode_kerja != null ? Storage::url($item->metode_kerja) : null;
            $item->foto_konsultan = $item->foto_konsultan != null ? Storage::url($item->foto_konsultan) : null;
            $item->foto_ppk = $item->foto_ppk != null ? Storage::url($item->foto_ppk) : null;
            $item->checklist = $item->checklist != null ? Storage::url($item->checklist) : null;

            $bahan = DB::table('detail_request_bahan')->where('id_request', '=', $item->id)->get();
            $campuran = DB::table('detail_request_jmf')->where('id_request', '=', $item->id)->get();
            $peralatan = DB::table('detail_request_peralatan')->where('id_request', '=', $item->id)->get();
            $pekerja = DB::table('detail_request_tkerja')->where('id_request', '=', $item->id)->get();

            foreach ($bahan as $index => $item_bahan) {
                $item_bahan->id = $index + 1;
            }

            foreach ($campuran as $index => $item_campuran) {
                $item_campuran->id = $index + 1;
            }

            foreach ($peralatan as $index => $item_alat) {
                $item_alat->id = $index + 1;
            }

            foreach ($pekerja as $index => $item_pekerja) {
                $item_pekerja->id = $index + 1;
            }

            $item->bahan = $bahan;
            $item->campuran = $campuran;
            $item->peralatan = $peralatan;
            $item->pekerja = $pekerja;
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getLatestPermintaanByKonsultan(Request $request)
    {
        $result = DB::table('request')
            ->where('nama_direksi', '=', $request->konsultan)
            ->limit(5)
            ->orderByDesc('tgl_input')
            ->orderByDesc('tgl_update')
            ->get();

        foreach ($result as $item) {
            $item->sketsa = Storage::url($item->sketsa);
            $item->metode_kerja = Storage::url($item->metode_kerja);
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getPermintaanByKonsultan(Request $request)
    {
        $result = DB::table('request')
            ->where('nama_direksi', '=', $request->konsultan)
            ->orderByDesc('tgl_input')
            ->orderByDesc('tgl_update')
            ->get();

        foreach ($result as $item) {
            $item->sketsa = Storage::url($item->sketsa);
            $item->metode_kerja = Storage::url($item->metode_kerja);
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function buatRequestFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "id_jadual" => "required",
            "user_id" => "required",
            "nama_kegiatan" => "required",
            "unor" => "required",
            "jenis_pekerjaan" => "required",
            "diajukan_tgl" => "required",
            "lokasi_sta" => "required",
            "volume" => "required",
            "satuan" => "required",
            "pelaksanaan_tgl" => "required",
            "ci" => "required",
            "qe" => "required",
            "nama_kontraktor" => "required",
            "nama_direksi" => "required",
            "nama_ppk" => "required",
            "sketsa" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'error' => $validator->getMessageBag()->getMessages()
            ], Response::HTTP_BAD_REQUEST);
        }


        DB::beginTransaction();

        try {

            DB::table('jadual')->where('id', $req->id_jadual)->update([
                "tgl_req" => \Carbon\Carbon::now()
            ]);

            $file = $req->file('sketsa');
            $name = time() . "_" . $file->getClientOriginalName();

            $id = DB::table('request')->insertGetId([
                "user_id" => $req->input('user_id'),
                "nama_kegiatan" => $req->input('nama_kegiatan'),
                "status" => 1,
                "unor" => $req->input('unor'),
                "jenis_pekerjaan" => $req->input('jenis_pekerjaan'),
                "diajukan_tgl" => date('Y-m-d', strtotime($req->input('diajukan_tgl'))),
                "lokasi_sta" => $req->input('lokasi_sta'),
                "volume" => $req->input('volume'),
                "satuan" => $req->input('satuan'),
                "pelaksanaan_tgl" => date('Y-m-d', strtotime($req->input('pelaksanaan_tgl'))),
                "ci" => $req->input('ci'),
                "qe" => $req->input('qe'),
                "nama_kontraktor" => $req->input('nama_kontraktor'),
                "nama_direksi" => $req->input('nama_direksi'),
                "nama_ppk" => $req->input('nama_ppk'),
                "sketsa" => $this->PATH_FILE_DB . "/" . $name,
                "id_jadual" => $req->input('id_jadual'),
                "tgl_input" => \Carbon\Carbon::now()
            ]);

            Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

            if ($req->input('bahan') != null && $req->input('bahan') != 'null') {
                foreach (json_decode($req->input('bahan')) as $item_bahan) {
                    DB::table('detail_request_bahan')->insert([
                        'id_request' => $id,
                        'bahan' => $item_bahan->bahan,
                        'volume' => $item_bahan->volume,
                        'satuan' => $item_bahan->satuan
                    ]);
                }
            }

            if ($req->input('alat') != null && $req->input('alat') != 'null') {
                foreach (json_decode($req->input('alat')) as $item_alat) {
                    DB::table('detail_request_peralatan')->insert([
                        'id_request' => $id,
                        'jenis_peralatan' => $item_alat->jenis_peralatan,
                        'jumlah' => $item_alat->jumlah,
                        'satuan' => $item_alat->satuan
                    ]);
                }
            }

            if ($req->input('pekerja') != null && $req->input('pekerja') != 'null') {
                foreach (json_decode($req->input('pekerja')) as $item_pekerja) {
                    DB::table('detail_request_tkerja')->insert([
                        'id_request' => $id,
                        'tenaga_kerja' => $item_pekerja->tenaga_kerja,
                        'jumlah' => $item_pekerja->jumlah
                    ]);
                }
            }

            if ($req->input('campuran') != null && $req->input('campuran') != 'null') {
                foreach (json_decode($req->input('campuran')) as $item_campuran) {
                    DB::table('detail_request_jmf')->insert([
                        'id_request' => $id,
                        'bahan_jmf' => $item_campuran->bahan_jmf,
                        'volume' => $item_campuran->volume,
                        'satuan' => $item_campuran->satuan,
                    ]);
                }
            }

            if ($req->file('metode_kerja') != null) {
                $file = $req->file('metode_kerja');
                $name = time() . "_" . $file->getClientOriginalName();

                DB::table('request')->where('id', $id)->update([
                    "metode_kerja" => $this->PATH_FILE_DB . "/" . $name
                ]);

                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'code' => 201,
                'result' => 'Request pekerjaan berhasil dibuat'
            ], Response::HTTP_CREATED);
        } catch (\Exception $error) {

            DB::rollBack();

            return response()->json([
                'status' => 'failed',
                'code' => 500,
                'error' => $error->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateRequestFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "id_request" => "required",
            "diajukan_tgl" => "required",
            "lokasi_sta" => "required",
            "volume" => "required",
            "pelaksanaan_tgl" => "required",
            "ci" => "required",
            "qe" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'error' => $validator->getMessageBag()->getMessages()
            ], Response::HTTP_BAD_REQUEST);
        }

        DB::beginTransaction();

        try {

            $tableRef = DB::table('request')->where('id', '=', $req->id_request);

            $currentRequest = $tableRef->first();

            $tableRef->update([
                'diajukan_tgl' => date('Y-m-d', strtotime($req->diajukan_tgl)),
                'lokasi_sta' => $req->lokasi_sta,
                'volume' => $req->volume,
                'pelaksanaan_tgl' => date('Y-m-d', strtotime($req->pelaksanaan_tgl)),
                'ci' => $req->ci,
                'qe' => $req->qe,
                "tgl_update" => Carbon::now()
            ]);

            if ($req->file('sketsa') != null) {
                $file = $req->file('sketsa');
                $name = time() . "_" . $file->getClientOriginalName();
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
                $tableRef->update([
                    'sketsa' => $this->PATH_FILE_DB . '/' . $name
                ]);
                Storage::delete($currentRequest->sketsa);
            }

            if ($req->file('metode_kerja') != null) {
                $file = $req->file('metode_kerja');
                $name = time() . "_" . $file->getClientOriginalName();
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
                $tableRef->update([
                    "metode_kerja" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::delete($currentRequest->metode_kerja);
            }

            DB::table('detail_request_bahan')->where('id_request', '=', $req->id_request)->delete();
            if ($req->input('bahan') != null && $req->input('bahan') != 'null') {
                foreach (json_decode($req->input('bahan')) as $item_bahan) {
                    DB::table('detail_request_bahan')->insert([
                        'id_request' => $req->id_request,
                        'bahan' => $item_bahan->bahan,
                        'volume' => $item_bahan->volume,
                        'satuan' => $item_bahan->satuan
                    ]);
                }
            }

            DB::table('detail_request_peralatan')->where('id_request', '=', $req->id_request)->delete();
            if ($req->input('alat') != null && $req->input('alat') != 'null') {
                foreach (json_decode($req->input('alat')) as $item_alat) {
                    DB::table('detail_request_peralatan')->insert([
                        'id_request' => $req->id_request,
                        'jenis_peralatan' => $item_alat->jenis_peralatan,
                        'jumlah' => $item_alat->jumlah,
                        'satuan' => $item_alat->satuan
                    ]);
                }
            }

            DB::table('detail_request_tkerja')->where('id_request', '=', $req->id_request)->delete();
            if ($req->input('pekerja') != null && $req->input('pekerja') != 'null') {
                foreach (json_decode($req->input('pekerja')) as $item_pekerja) {
                    DB::table('detail_request_tkerja')->insert([
                        'id_request' => $req->id_request,
                        'tenaga_kerja' => $item_pekerja->tenaga_kerja,
                        'jumlah' => $item_pekerja->jumlah
                    ]);
                }
            }

            DB::table('detail_request_jmf')->where('id_request', '=', $req->id_request)->delete();
            if ($req->input('campuran') != null && $req->input('campuran') != 'null') {
                foreach (json_decode($req->input('campuran')) as $item_campuran) {
                    DB::table('detail_request_jmf')->insert([
                        'id_request' => $req->id_request,
                        'bahan_jmf' => $item_campuran->bahan_jmf,
                        'volume' => $item_campuran->volume,
                        'satuan' => $item_campuran->satuan,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'code' => 201,
                'result' => 'Request pekerjaan berhasil diupdate'
            ], Response::HTTP_CREATED);

        } catch (\Exception $error) {

            DB::rollBack();

            return response()->json([
                'status' => 'failed',
                'code' => 500,
                'error' => $error->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function buatRequest(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $validator = Validator::make($req->all(), [
            // Data Umum
            "diajukan_tgl" => "required",
            "unor" => "required",
            "userId" => "required",
            "lokasi_sta" => "required",
            "ci" => "required",
            "qe" => "required",
            "id_jadual" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'error' => $validator->getMessageBag()->getMessages()
            ], 400);
        }
        $getTeam = DB::table('jadual')->where('id', $req->id_jadual)->first();
        DB::beginTransaction();
        try {
            DB::table('jadual')->where('id', $req->id_jadual)->update([
                "tgl_req" => \Carbon\Carbon::now()
            ]);
            $file = $req->file('sketsa');
            $name = time() . "_" . $file->getClientOriginalName();

            $id = DB::table('request')->insertGetId([
                "user_id" => $req->userId,
                "nama_kegiatan" => $req->kegiatan,
                "unor" => $req->unor,
                "jenis_pekerjaan" => $req->jenis_pekerjaan,
                "diajukan_tgl" => $req->diajukan_tgl,
                "lokasi_sta" => $req->lokasi_sta,
                "volume" => $req->perkiraan_volume,
                "satuan" => $req->satuan,
                "pelaksanaan_tgl" => $req->pelaksanaan_tgl,
                "ci" => $req->ci,
                "qe" => $req->qe,
                "nama_kontraktor" => $req->penyedia_jasa,
                "nama_direksi" => $req->konsultan,
                "nama_ppk" => $req->nm_ppk,
                "sketsa" => $this->PATH_FILE_DB . "/" . $name,
                "id_jadual" => $req->id_jadual,
                "tgl_input" => \Carbon\Carbon::now(),
                "field_team_konsultan" => $getTeam->field_team_konsultan
            ]);
            Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

            if ($req->jenis_peralatan) {
                for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
                    DB::table('detail_request_peralatan')->insert([
                        "id_request" => $id,
                        "jenis_peralatan" => $req->jenis_peralatan[$i],
                        "jumlah" => $req->jumlah_peralatan[$i],
                        "satuan" => $req->satuan_peralatan[$i]
                    ]);
                }
            }
            if ($req->bahan) {
                for ($i = 0; $i < count($req->bahan); $i++) {
                    DB::table('detail_request_bahan')->insert([
                        "id_request" => $id,
                        "bahan" => $req->bahan[$i],
                        "volume" => $req->volume_bahan[$i],
                        "satuan" => $req->satuan_bahan[$i]
                    ]);
                }
            }
            if ($req->tenaga_kerja) {
                for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
                    DB::table('detail_request_tkerja')->insert([
                        "id_request" => $id,
                        "tenaga_kerja" => $req->tenaga_kerja[$i],
                        "jumlah" => $req->jumlah_tk[$i],
                    ]);
                }
            }
            if ($req->bahan_jmf) {
                for ($i = 0; $i < count($req->bahan_jmf); $i++) {
                    DB::table('detail_request_jmf')->insert([
                        "id_request" => $id,
                        "bahan_jmf" => $req->bahan_jmf[$i],
                        "volume" => $req->volume_jmf[$i],
                        "satuan" => $req->satuan_jmf[$i]
                    ]);
                }
            }

            if ($req->file('metode_kerja')) {
                $file = $req->file('metode_kerja');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $id)->update([
                    "metode_kerja" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            DB::commit();
            return response()->json([
                "code" => 200
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                "code" => 500,
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function updateRequest(Request $req)
    {
        if ($req->file('sketsa')) {
            $file = $req->file('sketsa');
            $name = time() . "_" . $file->getClientOriginalName();

            DB::table('request')->where('id', $req->id)->update([
                "nama_kegiatan" => $req->kegiatan,
                "unor" => $req->unor,
                "jenis_pekerjaan" => $req->jenis_pekerjaan,
                "diajukan_tgl" => $req->diajukan_tgl,
                "lokasi_sta" => $req->lokasi_sta,
                "volume" => $req->perkiraan_volume,
                "satuan" => $req->satuan,
                "pelaksanaan_tgl" => $req->pelaksanaan_tgl,
                "ci" => $req->ci,
                "qe" => $req->qe,
                "nama_kontraktor" => $req->penyedia_jasa,
                "nama_direksi" => $req->konsultan,
                "nama_ppk" => $req->nama_ppk,
                "sketsa" => $this->PATH_FILE_DB . "/" . $name,
                "tgl_update" => \Carbon\Carbon::now()
            ]);
            Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
        } else {
            DB::table('request')->where('id', $req->id)->update([
                "nama_kegiatan" => $req->kegiatan,
                "unor" => $req->unor,
                "jenis_pekerjaan" => $req->jenis_pekerjaan,
                "diajukan_tgl" => $req->diajukan_tgl,
                "lokasi_sta" => $req->lokasi_sta,
                "volume" => $req->perkiraan_volume,
                "satuan" => $req->satuan,
                "pelaksanaan_tgl" => $req->pelaksanaan_tgl,
                "ci" => $req->ci,
                "qe" => $req->qe,
                "nama_kontraktor" => $req->penyedia_jasa,
                "nama_direksi" => $req->konsultan,
                "nama_ppk" => $req->nama_ppk,
                "tgl_update" => \Carbon\Carbon::now()
            ]);
        }
        for ($i = 0; $i < count($req->bahan); $i++) {
            DB::table('detail_request_bahan')->where('id_request', $req->id)->delete();
        }
        for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
            DB::table('detail_request_peralatan')->where('id_request', $req->id)->delete();
        }
        for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
            DB::table('detail_request_tkerja')->where('id_request', $req->id)->delete();
        }
        for ($i = 0; $i < count($req->bahan_jmf); $i++) {
            DB::table('detail_request_jmf')->where('id_request', $req->id)->delete();
        }
        for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
            DB::table('detail_request_peralatan')->insert([
                "id_request" => $req->id,
                "jenis_peralatan" => $req->jenis_peralatan[$i],
                "jumlah" => $req->jumlah_peralatan[$i],
                "satuan" => $req->satuan_peralatan[$i]
            ]);
        }
        for ($i = 0; $i < count($req->bahan); $i++) {
            DB::table('detail_request_bahan')->insert([
                "id_request" => $req->id,
                "bahan" => $req->bahan[$i],
                "volume" => $req->volume_bahan[$i],
                "satuan" => $req->satuan_bahan[$i]
            ]);
        }
        for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
            DB::table('detail_request_tkerja')->insert([
                "id_request" => $req->id,
                "tenaga_kerja" => $req->tenaga_kerja[$i],
                "jumlah" => $req->jumlah_tk[$i],
            ]);
        }
        for ($i = 0; $i < count($req->bahan_jmf); $i++) {
            DB::table('detail_request_jmf')->insert([
                "id_request" => $req->id,
                "bahan_jmf" => $req->bahan_jmf[$i],
                "volume" => $req->volume_jmf[$i],
                "satuan" => $req->satuan_jmf[$i]
            ]);
        }


        if ($req->file('metode_kerja')) {
            $file = $req->file('metode_kerja');
            $name = time() . "_" . $file->getClientOriginalName();
            DB::table('request')->where('id', $req->id)->update([
                "metode_kerja" => $this->PATH_FILE_DB . "/" . $name
            ]);
            Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
        }

        return response()->json([
            'code' => 200
        ]);
    }

    public function sendRequestPekerjaanFromMobile(Request $req)
    {
        $get_data = DB::table('request')->where('id', $req->id)->first();

        if ($get_data->ditolak == 1) {
            DB::table('request')->where('id', $req->id)->update([
                "status" => 2,
                "ditolak" => 0,
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
            ]);
            DB::table('history_request')->insert([
                "username" => $req->username,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "keterangan" => "Request Revisi Telah Dikirim Oleh " . $req->username,
                "class" => "kirim",
                "created_at" => \Carbon\Carbon::now()
            ]);
            $bodyEmail = [
                "role" => "Kontraktor",
                "status" => "Mengirim",
                "revisi" => "Revisi ",
                "username" => $get_data->nama_kontraktor,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => "konsultan"
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                pushNotification("Revisi Request Pekerjaan", "Revisi Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_kontraktor, $email->nm_member);
                if ($email->email != null) Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
        } else {
            DB::table('request')->where('id', $req->id)->update([
                "kontraktor" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px" title="Request Di Kirim">&nbsp;</span></a>',
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 2
            ]);
            DB::table('history_request')->insert([
                "username" => $req->username,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "keterangan" => "Request Telah Dikirim Oleh " . $req->username,
                "class" => "kirim",
                "created_at" => \Carbon\Carbon::now()
            ]);
            $bodyEmail = [
                "role" => "Kontraktor",
                "status" => "Mengirim",
                "revisi" => "",
                "username" => $get_data->nama_kontraktor,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => "konsultan"
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                pushNotification("Request Pekerjaan", "Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_kontraktor, $email->nm_member);
                if ($email->email != null) Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
        }

        return response()->json([
            "status" => "success",
            "code" => 200,
            "result" => "Permintaan Pekerjaan Telah Terkirim"
        ]);
    }

    public function sendReq(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $get_data = DB::table('request')->where('id', $req->id)->first();
        if ($get_data->ditolak == 1) {
            DB::table('request')->where('id', $req->id)->update([
                "status" => 2,
                "ditolak" => 0,
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
            ]);
            DB::table('history_request')->insert([
                "username" => $req->username,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "keterangan" => "Request Revisi Telah Dikirim Oleh " . $req->username,
                "class" => "kirim",
                "created_at" => \Carbon\Carbon::now()
            ]);
            $bodyEmail = [
                "role" => "Kontraktor",
                "status" => "Mengirim",
                "revisi" => "Revisi ",
                "username" => $get_data->nama_kontraktor,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => "konsultan"
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                pushNotification("Revisi Request Pekerjaan", "Revisi Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_kontraktor, $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
        } else {
            DB::table('request')->where('id', $req->id)->update([
                "kontraktor" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px" title="Request Di Kirim">&nbsp;</span></a>',
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 2
            ]);
            DB::table('history_request')->insert([
                "username" => $req->username,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "keterangan" => "Request Telah Dikirim Oleh " . $req->username,
                "class" => "kirim",
                "created_at" => \Carbon\Carbon::now()
            ]);
            $bodyEmail = [
                "role" => "Kontraktor",
                "status" => "Mengirim",
                "revisi" => "",
                "username" => $get_data->nama_kontraktor,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => "konsultan"
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                pushNotification("Request Pekerjaan", "Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_kontraktor, $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
        }

        return response()->json([
            "code" => 200,
            "email" => "send"
        ]);
    }

    public function revisiRequestKontraktor(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($req->file('sketsa')) {
            $file = $req->file('sketsa');
            $name = time() . "_" . $file->getClientOriginalName();

            DB::table('request')->where('id', $req->id)->update([
                "nama_kegiatan" => $req->kegiatan,
                "unor" => $req->unor,
                "jenis_pekerjaan" => $req->jenis_pekerjaan,
                "diajukan_tgl" => $req->diajukan_tgl,
                "lokasi_sta" => $req->lokasi_sta,
                "volume" => $req->perkiraan_volume,
                "satuan" => $req->satuan,
                "pelaksanaan_tgl" => $req->pelaksanaan_tgl,
                "ci" => $req->ci,
                "qe" => $req->qe,
                "nama_kontraktor" => $req->penyedia_jasa,
                "nama_direksi" => $req->konsultan,
                "nama_ppk" => $req->nama_ppk,
                "sketsa" => $this->PATH_FILE_DB . "/" . $name,
                "tgl_update" => \Carbon\Carbon::now()
            ]);
            Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
        } else {
            DB::table('request')->where('id', $req->id)->update([
                "nama_kegiatan" => $req->kegiatan,
                "unor" => $req->unor,
                "jenis_pekerjaan" => $req->jenis_pekerjaan,
                "diajukan_tgl" => $req->diajukan_tgl,
                "lokasi_sta" => $req->lokasi_sta,
                "volume" => $req->perkiraan_volume,
                "satuan" => $req->satuan,
                "pelaksanaan_tgl" => $req->pelaksanaan_tgl,
                "ci" => $req->ci,
                "qe" => $req->qe,
                "nama_kontraktor" => $req->penyedia_jasa,
                "nama_direksi" => $req->konsultan,
                "nama_ppk" => $req->nama_ppk,
                "tgl_update" => \Carbon\Carbon::now()
            ]);
        }
        for ($i = 0; $i < count($req->bahan); $i++) {
            DB::table('detail_request_bahan')->where('id_request', $req->id)->delete();
        }
        for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
            DB::table('detail_request_peralatan')->where('id_request', $req->id)->delete();
        }
        for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
            DB::table('detail_request_tkerja')->where('id_request', $req->id)->delete();
        }
        for ($i = 0; $i < count($req->bahan_jmf); $i++) {
            DB::table('detail_request_jmf')->where('id_request', $req->id)->delete();
        }
        for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
            DB::table('detail_request_peralatan')->insert([
                "id_request" => $req->id,
                "jenis_peralatan" => $req->jenis_peralatan[$i],
                "jumlah" => $req->jumlah_peralatan[$i],
                "satuan" => $req->satuan_peralatan[$i]
            ]);
        }
        for ($i = 0; $i < count($req->bahan); $i++) {
            DB::table('detail_request_bahan')->insert([
                "id_request" => $req->id,
                "bahan" => $req->bahan[$i],
                "volume" => $req->volume_bahan[$i],
                "satuan" => $req->satuan_bahan[$i]
            ]);
        }
        for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
            DB::table('detail_request_tkerja')->insert([
                "id_request" => $req->id,
                "tenaga_kerja" => $req->tenaga_kerja[$i],
                "jumlah" => $req->jumlah_tk[$i],
            ]);
        }
        DB::table('history_request')->insert([
            "username" => $req->konsultan,
            "id_request" => $req->id,
            "user_id" => $req->userId,
            "class" => "revisi",
            "keterangan" => "Request Telah Direvisi Oleh " . $req->username,
            "created_at" => \Carbon\Carbon::now()
        ]);
        if ($req->bahan_jmf) {
            for ($i = 0; $i < count($req->bahan_jmf); $i++) {
                DB::table('detail_request_jmf')->insert([
                    "id_request" => $req->id,
                    "bahan_jmf" => $req->bahan_jmf[$i],
                    "volume" => $req->volume_jmf[$i],
                    "satuan" => $req->satuan_jmf[$i]
                ]);
            }
        }

        if ($req->file('metode_kerja')) {
            $file = $req->file('metode_kerja');
            $name = time() . "_" . $file->getClientOriginalName();
            DB::table('request')->where('id', $req->id)->update([
                "metode_kerja" => $this->PATH_FILE_DB . "/" . $name
            ]);
            Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
        }


        return response()->json([
            'code' => 200
        ]);
    }

    public function revisiRequestKontraktorFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "id_request" => "required",
            "diajukan_tgl" => "required",
            "lokasi_sta" => "required",
            "volume" => "required",
            "pelaksanaan_tgl" => "required",
            "ci" => "required",
            "qe" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'error' => $validator->getMessageBag()->getMessages()
            ], Response::HTTP_BAD_REQUEST);
        }

        DB::beginTransaction();

        try {

            $tableRef = DB::table('request')->where('id', '=', $req->id_request);

            $currentRequest = $tableRef->first();

            $tableRef->update([
                'diajukan_tgl' => date('Y-m-d', strtotime($req->diajukan_tgl)),
                'lokasi_sta' => $req->lokasi_sta,
                'volume' => $req->volume,
                'pelaksanaan_tgl' => date('Y-m-d', strtotime($req->pelaksanaan_tgl)),
                'ci' => $req->ci,
                'qe' => $req->qe,
                "status" => 1,
                "ditolak" => 0,
                "tgl_update" => Carbon::now()
            ]);

            DB::table('history_request')->insert([
                "username" => $currentRequest->nama_kontraktor,
                "id_request" => $req->id_request,
                "user_id" => $currentRequest->user_id,
                "class" => "revisi",
                "keterangan" => "Request Telah Direvisi Oleh " . $currentRequest->nama_kontraktor,
                "created_at" => \Carbon\Carbon::now()
            ]);

            if ($req->file('sketsa') != null) {
                $file = $req->file('sketsa');
                $name = time() . "_" . $file->getClientOriginalName();
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
                $tableRef->update([
                    'sketsa' => $this->PATH_FILE_DB . '/' . $name
                ]);
                Storage::delete($currentRequest->sketsa);
            }

            if ($req->file('metode_kerja') != null) {
                $file = $req->file('metode_kerja');
                $name = time() . "_" . $file->getClientOriginalName();
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
                $tableRef->update([
                    "metode_kerja" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::delete($currentRequest->metode_kerja);
            }

            DB::table('detail_request_bahan')->where('id_request', '=', $req->id_request)->delete();
            if ($req->input('bahan') != null && $req->input('bahan') != 'null') {
                foreach (json_decode($req->input('bahan')) as $item_bahan) {
                    DB::table('detail_request_bahan')->insert([
                        'id_request' => $req->id_request,
                        'bahan' => $item_bahan->bahan,
                        'volume' => $item_bahan->volume,
                        'satuan' => $item_bahan->satuan
                    ]);
                }
            }

            DB::table('detail_request_peralatan')->where('id_request', '=', $req->id_request)->delete();
            if ($req->input('alat') != null && $req->input('alat') != 'null') {
                foreach (json_decode($req->input('alat')) as $item_alat) {
                    DB::table('detail_request_peralatan')->insert([
                        'id_request' => $req->id_request,
                        'jenis_peralatan' => $item_alat->jenis_peralatan,
                        'jumlah' => $item_alat->jumlah,
                        'satuan' => $item_alat->satuan
                    ]);
                }
            }

            DB::table('detail_request_tkerja')->where('id_request', '=', $req->id_request)->delete();
            if ($req->input('pekerja') != null && $req->input('pekerja') != 'null') {
                foreach (json_decode($req->input('pekerja')) as $item_pekerja) {
                    DB::table('detail_request_tkerja')->insert([
                        'id_request' => $req->id_request,
                        'tenaga_kerja' => $item_pekerja->tenaga_kerja,
                        'jumlah' => $item_pekerja->jumlah
                    ]);
                }
            }

            DB::table('detail_request_jmf')->where('id_request', '=', $req->id_request)->delete();
            if ($req->input('campuran') != null && $req->input('campuran') != 'null') {
                foreach (json_decode($req->input('campuran')) as $item_campuran) {
                    DB::table('detail_request_jmf')->insert([
                        'id_request' => $req->id_request,
                        'bahan_jmf' => $item_campuran->bahan_jmf,
                        'volume' => $item_campuran->volume,
                        'satuan' => $item_campuran->satuan,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'code' => 201,
                'result' => 'Request pekerjaan berhasil direvisi'
            ], Response::HTTP_CREATED);

        } catch (\Exception $error) {

            DB::rollBack();

            return response()->json([
                'status' => 'failed',
                'code' => 500,
                'error' => $error->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function responReqKonsultanFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            // Data Umum
            "id" => "required",
            "userId" => "required",
            "konsultan" => "required",
            "isAccepted" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'error' => $validator->getMessageBag()->getMessages()
            ], 400);
        }

        if ($req->isAccepted == "true") {
            DB::table('request')->where('id', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "foto_konsultan" => null,
                "checklist" => null,
                "status" => 3
            ]);

            if ($req->catatan != null) {
                DB::table('request')->where('id', $req->id)->update([
                    "catatan_konsultan" => $req->catatan
                ]);
            }

            DB::table('history_request')->insert([
                "username" => $req->konsultan,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Request Telah Disetujui Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);

            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            if ($req->file('checklist')) {
                $file = $req->file('checklist');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "checklist" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "Konsultan",
                "status" => "Menyetujui",
                "revisi" => "",
                "username" => $get_data->nama_direksi,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];

            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Disetujui Oleh " . $get_data->nama_direksi, $email->nm_member);
                if ($email->email != null) Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }

            $bodyEmail = [
                "role" => "Konsultan",
                "status" => "Mengirim",
                "revisi" => "",
                "username" => $get_data->nama_direksi,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];

            $mailto = DB::table('member')->where('nama_lengkap', '=', $get_data->nama_ppk)->get();
            foreach ($mailto as $email) {
                pushNotification("Request Pekerjaan", "Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_direksi, $email->nm_member);
                if ($email->email != null) Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }

            return response()->json([
                "status" => "success",
                "code" => 201,
                "result" => "Response request pekerjaan dari konsultan berhasil disimpan"
            ], ResponseAlias::HTTP_CREATED);
        } else {
            DB::table('request')->where('id', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_konsultan" => $req->catatan,
                "status" => 1,
                "ditolak" => 1,
                "foto_konsultan" => null,
                "checklist" => null,
                "rekomendasi" => $req->rekomendasi
            ]);

            DB::table('history_request')->insert([
                "username" => $req->konsultan,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Request Telah Ditolak Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);

            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            if ($req->file('checklist')) {
                $file = $req->file('checklist');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "checklist" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "Konsultan",
                "status" => "Menolak",
                "revisi" => "",
                "username" => $get_data->nama_direksi,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];

            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_direksi, $email->nm_member);
                if ($email->email != null) Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }

            return response()->json([
                "status" => "success",
                "code" => 201,
                "result" => "Response request pekerjaan dari konsultan berhasil disimpan"
            ], ResponseAlias::HTTP_CREATED);
        }
    }

    public function responReqKonsultan(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $validator = Validator::make($req->all(), [
            // Data Umum
            "laporan" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'result' => $validator->errors()->first()
            ], 400);
        }

        if ($req->laporan == 1) {
            DB::table('request')->where('id', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 3
            ]);
            if ($req->catatan != NULL) {
                DB::table('request')->where('id', $req->id)->update([
                    "catatan_konsultan" => $req->catatan
                ]);
            }
            if ($req->rekomendasi == 'with') {
                DB::table('request')->where('id', $req->id)->update([
                    "rekomendasi" => $req->rekomendasi,
                    "catatan_rekomendasi" => $req->catatan_rekomendasi
                ]);
            } else {
                DB::table('request')->where('id', $req->id)->update([
                    "rekomendasi" => $req->rekomendasi,
                ]);
            }
            DB::table('history_request')->insert([
                "username" => $req->konsultan,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Request Telah Disetujui Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            if ($req->file('checklist')) {
                $file = $req->file('checklist');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "checklist" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "Konsultan",
                "status" => "Menyetujui",
                "revisi" => "",
                "username" => $get_data->nama_direksi,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Disetujui Oleh " . $get_data->nama_direksi, $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            $bodyEmail = [
                "role" => "Konsultan",
                "status" => "Mengirim",
                "revisi" => "",
                "username" => $get_data->nama_direksi,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('nama_lengkap', '=', $get_data->nama_ppk)->get();
            foreach ($mailto as $email) {
                pushNotification("Request Pekerjaan", "Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_direksi, $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::table('request')->where('id', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_konsultan" => $req->catatan,
                "status" => 1,
                "ditolak" => 1,
                "rekomendasi" => $req->rekomendasi
            ]);
            DB::table('history_request')->insert([
                "username" => $req->konsultan,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Request Telah Ditolak Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            if ($req->file('checklist')) {
                $file = $req->file('checklist');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "checklist" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "Konsultan",
                "status" => "Menolak",
                "revisi" => "",
                "username" => $get_data->nama_direksi,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_direksi, $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            return response()->json([
                "code" => 200
            ], 200);
        }
    }

    public function responseReqPpkFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            // Data Umum
            "id" => "required",
            "userId" => "required",
            "nm_ppk" => "required",
            "isAccepted" => "required",

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'error' => $validator->getMessageBag()->getMessages()
            ], 400);
        }

        if ($req->isAccepted == "true") {
            DB::table('request')->where('id', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "foto_ppk" => null,
                "status" => 3,
                "ditolak" => 4,
                "rekomendasi" => $req->rekomendasi
            ]);
            if ($req->catatan != NULL) {
                DB::table('request')->where('id', $req->id)->update([
                    "catatan_ppk" => $req->catatan
                ]);
            }
            DB::table('history_request')->insert([
                "username" => $req->nm_ppk,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Request Telah Disetujui Oleh PPK " . $req->nm_ppk,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "PPK",
                "status" => "Menyetujui",
                "revisi" => "",
                "username" => $get_data->nama_ppk,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Disetujui Oleh " . $get_data->nama_ppk, $email->nm_member);
                if ($email->email != null) Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Disetujui Oleh " . $get_data->nama_ppk, $email->nm_member);
                if ($email->email != null) Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            return response()->json([
                "status" => "success",
                "code" => 201,
                "result" => "Response request pekerjaan dari ppk berhasil disimpan"
            ], ResponseAlias::HTTP_CREATED);
        } else {
            DB::table('request')->where('id', $req->id)->update([
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_ppk" => $req->catatan,
                "foto_ppk" => null,
                "status" => 2,
                "ditolak" => 1,
                "rekomendasi" => $req->rekomendasi
            ]);
            DB::table('history_request')->insert([
                "username" => $req->nm_ppk,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Request Telah Ditolak Oleh PPK " . $req->nm_ppk,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "PPK",
                "status" => "Menolak",
                "revisi" => "",
                "username" => $req->nm_ppk,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_ppk, $email->nm_member);
                if ($email->email != null) Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_ppk, $email->nm_member);
                if ($email->email != null) Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            return response()->json([
                "status" => "success",
                "code" => 201,
                "result" => "Response request pekerjaan dari ppk berhasil disimpan"
            ], ResponseAlias::HTTP_CREATED);
        }
    }

    public function responReqPpk(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $validator = Validator::make($req->all(), [
            // Data Umum
            "laporan" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'error' => $validator->getMessageBag()->getMessages()
            ], 400);
        }


        if ($req->laporan == 1) {
            DB::table('request')->where('id', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "status" => 3,
                "ditolak" => 4,
                'rekomendasi' => $req->rekomendasi,

            ]);
            if ($req->catatan_rekomendasi) {
                DB::table('request')->where('id', $req->id)->update([
                    "catatan_rekomendasi" => $req->catatan_rekomendasi
                ]);
            }
            if ($req->catatan != NULL) {
                DB::table('request')->where('id', $req->id)->update([
                    "catatan_ppk" => $req->catatan
                ]);
            }
            DB::table('history_request')->insert([
                "username" => $req->nm_ppk,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Request Telah Disetujui Oleh PPK " . $req->nm_ppk,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "PPK",
                "status" => "Menyetujui",
                "revisi" => "",
                "username" => $get_data->nama_ppk,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Disetujui Oleh " . $get_data->nama_ppk, $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Disetujui Oleh " . $get_data->nama_ppk, $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::table('request')->where('id', $req->id)->update([
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_ppk" => $req->catatan,
                "status" => 2,
                "ditolak" => 1,
                'rekomendasi' => $req->rekomendasi,
            ]);
            DB::table('history_request')->insert([
                "username" => $req->nm_ppk,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Request Telah Ditolak Oleh PPK " . $req->nm_ppk,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "PPK",
                "status" => "Menolak",
                "revisi" => "",
                "username" => $req->nm_ppk,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_ppk, $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_ppk, $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            return response()->json([
                "code" => 200
            ], 200);
        }
    }

    public function revisiRequestKonsultan(Request $req)
    {
        if ($req->option == 'PPK') {
            DB::table('request')->where('id', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 3,
                "ditolak" => 0
            ]);
            DB::table('history_request')->insert([
                "username" => $req->konsultan,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Revisi Request Telah Dikirim Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            if ($req->file('checklist')) {
                $file = $req->file('checklist');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "checklist" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "Konsultan",
                "status" => "Mengirim",
                "revisi" => "Revisi",
                "username" => $req->konsultan,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_ppk)->get();
            foreach ($mailto as $email) {
                pushNotification("Revisi Request Pekerjaan", "Revisi Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_direksi, $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::table('request')->where('id', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "status" => 1,
                "ditolak" => 1
            ]);
            DB::table('history_request')->insert([
                "username" => $req->konsultan,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Request Dikembalikan ke Penyedia Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            if ($req->file('checklist')) {
                $file = $req->file('checklist');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "checklist" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "Konsultan",
                "status" => "Mengirim",
                "revisi" => "Revisi",
                "username" => $req->konsultan,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_direksi, $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            return response()->json([
                "code" => 200
            ], 200);
        }
    }

    public function revisiRequestKonsultanFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            // Data Umum
            "id" => "required",
            "userId" => "required",
            "konsultan" => "required",
            "isAccepted" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'error' => $validator->getMessageBag()->getMessages()
            ], 400);
        }

        if ($req->isAccepted == "true") {
            DB::table('request')->where('id', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 3,
                "ditolak" => 0
            ]);

            if ($req->catatan != null) {
                DB::table('request')->where('id', $req->id)->update([
                    "catatan_konsultan" => $req->catatan
                ]);
            }

            DB::table('history_request')->insert([
                "username" => $req->konsultan,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Revisi Request Telah Dikirim Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);

            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            if ($req->file('checklist')) {
                $file = $req->file('checklist');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "checklist" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "Konsultan",
                "status" => "Mengirim",
                "revisi" => "",
                "username" => $get_data->nama_direksi,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];

            $mailto = DB::table('member')->where('nama_lengkap', '=', $get_data->nama_ppk)->get();
            foreach ($mailto as $email) {
                pushNotification("Revisi Request Pekerjaan", "Revisi Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_direksi, $email->nm_member);
                if ($email->email != null) Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }

            return response()->json([
                "status" => "success",
                "code" => 201,
                "result" => "Response request pekerjaan dari konsultan berhasil disimpan"
            ], ResponseAlias::HTTP_CREATED);
        } else {
            DB::table('request')->where('id', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_konsultan" => $req->catatan,
                "status" => 1,
                "ditolak" => 1
            ]);

            DB::table('history_request')->insert([
                "username" => $req->konsultan,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Request Dikembalikan ke Penyedia Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);

            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            if ($req->file('checklist')) {
                $file = $req->file('checklist');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::table('request')->where('id', $req->id)->update([
                    "checklist" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "Konsultan",
                "status" => "Menolak",
                "revisi" => "",
                "username" => $get_data->nama_direksi,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];

            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_direksi, $email->nm_member);
                if ($email->email != null) Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }

            return response()->json([
                "status" => "success",
                "code" => 201,
                "result" => "Response request pekerjaan dari konsultan berhasil disimpan"
            ], ResponseAlias::HTTP_CREATED);
        }
    }

    public function getSatuanNmp($id, $data)
    {
        return response()->json([
            DB::table('jadual')->where([['nmp', $id], ['id_data_umum', $data]])->first()
        ]);
    }

    public function getDetailJadual(Request $req)
    {

        return response()->json(
            DB::table('detail_jadual')->where([
                ['id_jadual', "=", $req->id],
                ['nmp', '=', $req->nmp]
            ])->first()
        );
    }

    public function deletePermintaan(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "alasan" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'error' => $validator->getMessageBag()->getMessages()
            ], Response::HTTP_BAD_REQUEST);
        }
        DB::table('request')->where('id', $req->id)->update([
            'reason_delete' => $req->alasan
        ]);
        $getId = DB::table('request')->where('id', $req->id)->first();


        DB::table('jadual')->where('id', $getId->id_jadual)->update([
            'tgl_req' => NULL
        ]);
        return response()->json([
            'code' => 200
        ]);
    }

    public function getHistoryLogPermintaan($id)
    {
        return response()->json([
            "status" => "success",
            "code" => 200,
            "result" => DB::table('history_request')->where('id_request', $id)->get()
        ]);
    }
}
