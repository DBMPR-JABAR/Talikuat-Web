<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
    private $PATH_FILE_DB = "public/lampiran/file_lap";

    public function getAllLaporanHarian(Request $req)
    {
        $query = DB::connection('talikuat_old')->table('master_laporan_harian')
            ->selectRaw('master_laporan_harian.*, detail_laporan_harian_pekerjaan.*')
            ->join('detail_laporan_harian_pekerjaan', 'master_laporan_harian.no_trans', '=', 'detail_laporan_harian_pekerjaan.no_trans')
            ->where(function ($query) use ($req) {
                return $query->where('master_laporan_harian.tanggal', 'like', '%' . $req->keyword . '%')
                    ->orWhere('master_laporan_harian.volume', 'like', '%' . $req->keyword . '%')
                    ->orWhere('master_laporan_harian.bobot', 'like', '%' . $req->keyword . '%')
                    ->orWhere('detail_laporan_harian_pekerjaan.no_pekerjaan', 'like', '%' . $req->keyword . '%')
                    ->orWhere('detail_laporan_harian_pekerjaan.jenis_pekerjaan', 'like', '%' . $req->keyword . '%');
            });

        switch ($req->type) {
            case 'KONTRAKTOR':
                $result = $query
                    ->where('master_laporan_harian.nama_kontraktor', '=', $req->value)
                    ->paginate();
                break;
            case 'KONSULTAN':
                $result = $query
                    ->where('master_laporan_harian.nama_konsultan', '=', $req->value)
                    ->paginate();
                break;
            case 'ADMIN-UPTD':
                $result = $query
                    ->where('master_laporan_harian.unor', '=', $req->value)
                    ->paginate();
                break;
            case 'PPK':
                $result = $query
                    ->where('master_laporan_harian.nama_lengkap', '=', $req->value)
                    ->paginate();
                break;
            default:
                $result = $query->paginate();
                break;
        }

        foreach ($result as $item) {
            $item->gambar = $item->gambar != null ? Storage::url($item->gambar) : null;
            $item->foto_konsultan = $item->foto_konsultan != null ? Storage::url($item->foto_konsultan) : null;
            $item->foto_ppk = $item->foto_ppk != null ? Storage::url($item->foto_ppk) : null;
            $item->list_bahan_material = DB::connection('talikuat_old')->table('detail_laporan_harian_bahan')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_bahan_beton = DB::connection('talikuat_old')->table('detail_laporan_harian_beton')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_cuaca = DB::connection('talikuat_old')->table('detail_laporan_harian_cuaca')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_bahan_hotmix = DB::connection('talikuat_old')->table('detail_laporan_harian_hotmix')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_pekerja = DB::connection('talikuat_old')->table('detail_laporan_harian_tkerja')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_peralatan = DB::connection('talikuat_old')->table('detail_laporan_harian_peralatan')->where('no_trans', '=', $item->no_trans)->get();
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ], Response::HTTP_OK);
    }

    public function getLaporanProgressKegiatanTerbaru()
    {
        $result = DB::connection('talikuat_old')->table('master_laporan_harian as master')
            ->select(DB::raw('kegiatan, SUM(volume) as persen'))
            ->groupBy('kegiatan')
            ->limit(5)
            ->get();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getLaporanById($id)
    {
        $result = DB::connection('talikuat_old')->table('master_laporan_harian')
            ->selectRaw('master_laporan_harian.*, detail_laporan_harian_pekerjaan.*')
            ->join('detail_laporan_harian_pekerjaan', 'master_laporan_harian.no_trans', '=', 'detail_laporan_harian_pekerjaan.no_trans')
            ->where('master_laporan_harian.no_trans', '=', $id)
            ->first();

        $result->gambar = $result->gambar != null ? Storage::url($result->gambar) : null;
        $result->foto_konsultan = $result->foto_konsultan != null ? Storage::url($result->foto_konsultan) : null;
        $result->foto_ppk = $result->foto_ppk != null ? Storage::url($result->foto_ppk) : null;
        $result->list_bahan_material = DB::connection('talikuat_old')->table('detail_laporan_harian_bahan')->where('no_trans', '=', $result->no_trans)->get();
        $result->list_bahan_beton = DB::connection('talikuat_old')->table('detail_laporan_harian_beton')->where('no_trans', '=', $result->no_trans)->get();
        $result->list_cuaca = DB::connection('talikuat_old')->table('detail_laporan_harian_cuaca')->where('no_trans', '=', $result->no_trans)->get();
        $result->list_bahan_hotmix = DB::connection('talikuat_old')->table('detail_laporan_harian_hotmix')->where('no_trans', '=', $result->no_trans)->get();
        $result->list_pekerja = DB::connection('talikuat_old')->table('detail_laporan_harian_tkerja')->where('no_trans', '=', $result->no_trans)->get();
        $result->list_peralatan = DB::connection('talikuat_old')->table('detail_laporan_harian_peralatan')->where('no_trans', '=', $result->no_trans)->get();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ], Response::HTTP_OK);
    }

    public function getLaporanByRequestId($id, Request $req)
    {
        $result = DB::connection('talikuat_old')->table('master_laporan_harian')
            ->selectRaw('master_laporan_harian.*, detail_laporan_harian_pekerjaan.*')
            ->join('detail_laporan_harian_pekerjaan', 'master_laporan_harian.no_trans', '=', 'detail_laporan_harian_pekerjaan.no_trans')
            ->where('master_laporan_harian.id_request', '=', $id)
            ->where(function ($query) use ($req) {
                return $query->where('master_laporan_harian.tanggal', 'like', '%' . $req->keyword . '%')
                    ->orWhere('master_laporan_harian.volume', 'like', '%' . $req->keyword . '%')
                    ->orWhere('master_laporan_harian.bobot', 'like', '%' . $req->keyword . '%')
                    ->orWhere('detail_laporan_harian_pekerjaan.no_pekerjaan', 'like', '%' . $req->keyword . '%')
                    ->orWhere('detail_laporan_harian_pekerjaan.jenis_pekerjaan', 'like', '%' . $req->keyword . '%');
            })
            ->paginate();

        foreach ($result as $item) {
            $item->gambar = $item->gambar != null ? Storage::url($item->gambar) : null;
            $item->foto_konsultan = $item->foto_konsultan != null ? Storage::url($item->foto_konsultan) : null;
            $item->foto_ppk = $item->foto_ppk != null ? Storage::url($item->foto_ppk) : null;
            $item->list_bahan_material = DB::connection('talikuat_old')->table('detail_laporan_harian_bahan')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_bahan_beton = DB::connection('talikuat_old')->table('detail_laporan_harian_beton')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_cuaca = DB::connection('talikuat_old')->table('detail_laporan_harian_cuaca')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_bahan_hotmix = DB::connection('talikuat_old')->table('detail_laporan_harian_hotmix')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_pekerja = DB::connection('talikuat_old')->table('detail_laporan_harian_tkerja')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_peralatan = DB::connection('talikuat_old')->table('detail_laporan_harian_peralatan')->where('no_trans', '=', $item->no_trans)->get();
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ], Response::HTTP_OK);
    }

    public function createLaporanFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "user" => "required",
            "kegiatan" => "required",
            "unor" => "required",
            "ruas_jalan" => "required",
            "tanggal" => "required",
            "segment_jalan" => "required",
            "id_request" => "required",
            "nama_kontraktor" => "required",
            "nama_ppk" => "required",
            "nama_konsultan" => "required",
            "volume" => "required",
            "satuan" => "required",
            "nmp" => "required",
            "uraian" => "required",
            "sta_awal" => "required",
            "sta_akhir" => "required",
            "ki_ka" => "required",
            "gambar" => "required",
            "keterangan" => "required",
            "bobot" => "required",
            "list_bahan_material" => "json",
            "list_peralatan" => "json",
            "list_bahan_hotmix" => "json",
            "list_bahan_beton" => "json",
            "list_pekerja" => "json",
            "list_cuaca" => "json"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'success',
                'code' => 400,
                'result' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('gambar');
        $name = time() . "_" . $file->getClientOriginalName();
        $request = DB::connection('talikuat_old')->table('request')->where('id', $req->id_request)->first();

        $idLaporan = DB::connection('talikuat_old')->table('master_laporan_harian')->insertGetId([
            "real_date" => \Carbon\Carbon::now(),
            "user" => $req->user,
            "kegiatan" => $req->kegiatan,
            "unor" => $req->unor,
            "ruas_jalan" => $req->ruas_jalan,
            "tanggal" => $req->tanggal,
            "segmen_jalan" => $req->segment_jalan,
            "id_request" => $req->id_request,
            "tgl_input" => \Carbon\Carbon::now(),
            "nama_kontraktor" => $req->nama_kontraktor,
            "nama_ppk" => $req->nama_ppk,
            "nama_konsultan" => $req->nama_konsultan,
            "volume" => $req->volume,
            "satuan" => $req->satuan,
            "nmp" => $req->uraian,
            "ket" => $req->keterangan,
            "gambar" => $this->PATH_FILE_DB . "/" . $name,
            "id_jadual" => $req->id_jadual,
            "id_data_umum" => $req->id_data_umum,
            "bobot" => floatval($req->bobot),
            "field_team_konsultan" => $request->field_team_konsultan
        ]);

        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

        DB::connection('talikuat_old')->table('detail_laporan_harian_pekerjaan')->insert([
            "no_trans" => $idLaporan,
            "no_pekerjaan" => $req->nmp,
            "jenis_pekerjaan" => $req->uraian,
            "sta_awal" => $req->sta_awal,
            "sta_akhir" => $req->sta_akhir,
            "ki_ka" => $req->ki_ka,
            "volume" => $req->volume,
            "satuan" => $req->satuan,
            "ket" => $req->keterangan,
            "tgl" => $req->tanggal,
            "bobot" => floatval($req->bobot),
        ]);

        if ($req->list_bahan_material != null) {
            foreach (json_decode($req->list_bahan_material) as $bahan_material) {
                DB::connection('talikuat_old')->table('detail_laporan_harian_bahan')->insert([
                    "no_trans" => $idLaporan,
                    "bahan" => $bahan_material->bahan,
                    "volume" => $bahan_material->volume,
                    "satuan" => $bahan_material->satuan
                ]);
            }
        }

        if ($req->list_peralatan != null) {
            foreach (json_decode($req->list_peralatan) as $alat) {
                DB::connection('talikuat_old')->table('detail_laporan_harian_peralatan')->insert([
                    "no_trans" => $idLaporan,
                    "jenis_peralatan" => $alat->jenis_peralatan,
                    "jumlah" => $alat->jumlah,
                    "satuan" => $alat->satuan
                ]);
            }
        }

        if ($req->list_bahan_hotmix != null) {
            foreach (json_decode($req->list_bahan_hotmix) as $hotmix) {
                DB::connection('talikuat_old')->table('detail_laporan_harian_hotmix')->insert([
                    "no_trans" => $idLaporan,
                    "bahan_hotmix" => $hotmix->bahan_hotmix,
                    "no_dt" => $hotmix->no_dt,
                    "waktu_datang" => $hotmix->waktu_datang,
                    "waktu_hampar" => $hotmix->waktu_hampar,
                    "suhu_datang" => $hotmix->suhu_datang,
                    "suhu_hampar" => $hotmix->suhu_hampar,
                    "pro_p" => $hotmix->pro_p,
                    "pro_i" => $hotmix->pro_i,
                    "pro_t" => $hotmix->pro_t,
                    "ket" => $hotmix->ket
                ]);
            }
        }

        if ($req->list_bahan_beton != null) {
            foreach (json_decode($req->list_bahan_beton) as $beton) {
                DB::connection('talikuat_old')->table('detail_laporan_harian_beton')->insert([
                    "no_trans" => $idLaporan,
                    "bahan_beton" => $beton->bahan_beton,
                    "no_tm" => $beton->no_tm,
                    "waktu_datang" => $beton->waktu_datang,
                    "waktu_curah" => $beton->waktu_curah,
                    "slump_test" => $beton->slump_test,
                    "satuan" => $beton->satuan,
                    "ket" => $beton->ket
                ]);
            }
        }

        if ($req->list_pekerja != null) {
            foreach (json_decode($req->list_pekerja) as $pekerja) {
                DB::connection('talikuat_old')->table('detail_laporan_harian_tkerja')->insert([
                    "no_trans" => $idLaporan,
                    "tenaga_kerja" => $pekerja->tenaga_kerja,
                    "jumlah" => $pekerja->jumlah,
                ]);
            }
        }

        if ($req->list_cuaca != null) {
            foreach (json_decode($req->list_cuaca) as $cuaca) {
                DB::connection('talikuat_old')->table('detail_laporan_harian_cuaca')->insert([
                    "no_trans" => $idLaporan,
                    "cerah" => property_exists($cuaca, 'cerah') ? $cuaca->cerah : null,
                    "hujan_ringan" => property_exists($cuaca, 'hujan_ringan') ? $cuaca->hujan_ringan : null,
                    "hujan_lebat" => property_exists($cuaca, 'hujan_lebat') ? $cuaca->hujan_lebat : null,
                    "bencana_alam" => property_exists($cuaca, 'bencana_alam') ? $cuaca->bencana_alam : null,
                    "lain_lain" => property_exists($cuaca, 'lain_lain') ? $cuaca->lain_lain : null,
                ]);
            }
        }

        DB::connection('talikuat_old')->table('history_laporan')->insert([
            "username" => $req->nama_kontraktor,
            "created_at" => \Carbon\Carbon::now(),
            "keterangan" => "Laporan Telah Dibuat Oleh " . $req->nama_kontraktor,
            "user_id" => $req->user,
            "id_laporan" => $idLaporan,
            "class" => "kirim"
        ]);

        return response()->json([
            'status' => 'success',
            'code' => 201,
            'result' => "Berhasil menambahkan laporan harian"
        ], Response::HTTP_CREATED);
    }

    public function createLaporan(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $file = $req->file('soft');
        $name = time() . "_" . $file->getClientOriginalName();
        $getTeam = DB::connection('talikuat_old')->table('request')->where('id', $req->permohonan)->first();
        $countRequest = DB::connection('talikuat_old')->table('request')->where('id_jadual', $req->id_jadual)->count();
        DB::beginTransaction();
        try {
            DB::connection('talikuat_old')->table('request')->where('id', $req->permohonan)->update([
                'volume_terlapor' => (float) $getTeam->volume_terlapor + (float) $req->volume
            ]);
            $id = DB::connection('talikuat_old')->table('master_laporan_harian')->insertGetId([
                "real_date" => \Carbon\Carbon::now(),
                "user" => $req->user,
                "kegiatan" => $req->kegiatan,
                "unor" => $req->unor,
                "ruas_jalan" => $req->ruas_jalan,
                "tanggal" => $req->tanggal,
                "segmen_jalan" => $req->segmen_jalan,
                "id_request" => $req->permohonan,
                "tgl_input" => \Carbon\Carbon::now(),
                "nama_kontraktor" => $req->kontraktor,
                "nama_ppk" => $req->ppk,
                "nama_konsultan" => $req->konsultan,
                "volume" => $req->volume,
                "satuan" => $req->satuan,
                "nmp" => $req->jenis_pekerjaan,
                "ket" => $req->ket,
                "gambar" => $this->PATH_FILE_DB . "/" . $name,
                "id_jadual" => $req->id_jadual,
                "id_data_umum" => $req->id_data_umum,
                "bobot" => $req->bobot,
                "field_team_konsultan" => $getTeam->field_team_konsultan
            ]);
            Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            DB::connection('talikuat_old')->table('detail_laporan_harian_pekerjaan')->insert([
                "no_trans" => $id,
                "no_pekerjaan" => $req->no_pekerjaan,
                "jenis_pekerjaan" => $req->jenis_pekerjaan,
                "sta_awal" => $req->sta_awal,
                "sta_akhir" => $req->sta_akhir,
                "ki_ka" => $req->ki_ka,
                "volume" => $req->volume,
                "satuan" => $req->satuan,
                "ket" => $req->ket,
                "tgl" => $req->tanggal,
                "bobot" => $req->bobot
            ]);

            if ($req->bahan[0] != null) {
                for ($i = 0; $i < count($req->bahan); $i++) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_bahan')->insert([
                        "no_trans" => $id,
                        "bahan" => $req->bahan[$i],
                        "volume" => $req->volume_bahan[$i],
                        "satuan" => $req->satuan_bahan[$i]
                    ]);
                }
            }

            if ($req->jenis_peralatan[0] != null) {
                for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_peralatan')->insert([
                        "no_trans" => $id,
                        "jenis_peralatan" => $req->jenis_peralatan[$i],
                        "jumlah" => $req->jumlah_peralatan[$i],
                        "satuan" => $req->satuan_peralatan[$i]
                    ]);
                }
            }

            if ($req->bahan_hotmix[0] != null) {
                for ($i = 0; $i < count($req->bahan_hotmix); $i++) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_hotmix')->insert([
                        "no_trans" => $id,
                        "bahan_hotmix" => $req->bahan_hotmix[$i],
                        "no_dt" => $req->no_dt[$i],
                        "waktu_datang" => $req->waktu_datang[$i],
                        "waktu_hampar" => $req->waktu_hampar[$i],
                        "suhu_datang" => $req->suhu_datang[$i],
                        "suhu_hampar" => $req->suhu_hampar[$i],
                        "pro_p" => $req->pro_p[$i],
                        "pro_l" => $req->pro_l[$i],
                        "pro_t" => $req->pro_t[$i],
                        "ket" => $req->ket_hotmix[$i]
                    ]);
                }
            }


            if ($req->bahan_beton[0] != null) {
                for ($i = 0; $i < count($req->bahan_beton); $i++) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_beton')->insert([
                        "no_trans" => $id,
                        "bahan_beton" => $req->bahan_beton[$i],
                        "no_tm" => $req->no_tm[$i],
                        "waktu_datang" => $req->waktu_datang_beton[$i],
                        "waktu_curah" => $req->waktu_curah[$i],
                        "slump_test" => $req->slump_test[$i],
                        "satuan" => $req->satuan_beton[$i],
                        "ket" => $req->ket_beton[$i]
                    ]);
                }
            }


            if ($req->tenaga_kerja[0] != null) {
                for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_tkerja')->insert([
                        "no_trans" => $id,
                        "tenaga_kerja" => $req->tenaga_kerja[$i],
                        "jumlah" => $req->jumlah_tk[$i],
                    ]);
                }
            }


            if ($req->cerah[0] != null) {
                for ($i = 0; $i < count($req->cerah); $i++) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_cuaca')->insert([
                        "no_trans" => $id,
                        "cerah" => $req->cerah[$i],
                        "hujan_ringan" => $req->hujan_ringan[$i],
                        "hujan_lebat" => $req->hujan_lebat[$i],
                        "bencana_alam" => $req->bencana_alam[$i],
                        "lain_lain" => $req->lain_lain[$i],
                    ]);
                }
            }


            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->kontraktor,
                "created_at" => \Carbon\Carbon::now(),
                "keterangan" => "Laporan Telah Dibuat Oleh " . $req->kontraktor,
                "user_id" => $req->user,
                "id_laporan" => $id,
                "class" => "kirim"
            ]);
            if ($countRequest < 1) {
                if ($getTeam->volume_terlapor == ($getTeam->volume + ($getTeam->volume * 10 / 100))) {
                    DB::connection('talikuat_old')->table('request')->where('id', $req->permohonan)->update([
                        'disabled' => 1
                    ]);
                }
            } else {
                if ($getTeam->volume_terlapor == $getTeam->volume) {
                    DB::connection('talikuat_old')->table('request')->where('id', $req->permohonan)->update([
                        'disabled' => 1
                    ]);
                }
            }
            DB::commit();
            return response()->json([
                'code' => 200
            ], 200);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function editLaporanFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "id" => "required",
            "tanggal" => "required",
            "volume" => "required",
            "sta_awal" => "required",
            "sta_akhir" => "required",
            "ki_ka" => "required",
            "keterangan" => "required",
            "bobot" => "required",
            "list_bahan_material" => "json",
            "list_peralatan" => "json",
            "list_bahan_hotmix" => "json",
            "list_bahan_beton" => "json",
            "list_pekerja" => "json",
            "list_cuaca" => "json"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'success',
                'code' => 400,
                'result' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        DB::beginTransaction();

        try {
            $tableRef = DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', '=', $req->id);
            $currentReport = $tableRef->first();
            $request = DB::connection('talikuat_old')->table('request')->where('id', '=', $currentReport->id_request)->first();

            if ($req->file('gambar')) {
                $file = $req->file('gambar');
                $name = time() . "_" . $file->getClientOriginalName();
                Storage::delete($currentReport->gambar);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
                $tableRef->update([
                    'gambar' => $this->PATH_FILE_DB . '/' . $name
                ]);
            }

            $tableRef->update([
                "tanggal" => $req->tanggal,
                "tgl_update" => Carbon::now(),
                "ket" => $req->keterangan,
                "bobot" => floatval($req->bobot),
                "field_team_konsultan" => $request->field_team_konsultan
            ]);

            DB::connection('talikuat_old')->table('detail_laporan_harian_pekerjaan')
                ->where('no_trans', '=', $req->id)
                ->update([
                    "sta_awal" => $req->sta_awal,
                    "sta_akhir" => $req->sta_akhir,
                    "ki_ka" => $req->ki_ka,
                    "volume" => $req->volume,
                    "ket" => $req->keterangan,
                    "tgl" => $req->tanggal,
                    "bobot" => floatval($req->bobot),
                ]);

            DB::connection('talikuat_old')->table('detail_laporan_harian_bahan')->where('no_trans', '=', $req->id)->delete();
            if ($req->list_bahan_material != null) {
                foreach (json_decode($req->list_bahan_material) as $bahan_material) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_bahan')->insert([
                        "no_trans" => $req->id,
                        "bahan" => $bahan_material->bahan,
                        "volume" => $bahan_material->volume,
                        "satuan" => $bahan_material->satuan
                    ]);
                }
            }

            DB::connection('talikuat_old')->table('detail_laporan_harian_peralatan')->where('no_trans', '=', $req->id)->delete();
            if ($req->list_peralatan != null) {
                foreach (json_decode($req->list_peralatan) as $alat) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_peralatan')->insert([
                        "no_trans" => $req->id,
                        "jenis_peralatan" => $alat->jenis_peralatan,
                        "jumlah" => $alat->jumlah,
                        "satuan" => $alat->satuan
                    ]);
                }
            }

            DB::connection('talikuat_old')->table('detail_laporan_harian_hotmix')->where('no_trans', '=', $req->id)->delete();
            if ($req->list_bahan_hotmix != null) {
                foreach (json_decode($req->list_bahan_hotmix) as $hotmix) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_hotmix')->insert([
                        "no_trans" => $req->id,
                        "bahan_hotmix" => $hotmix->bahan_hotmix,
                        "no_dt" => $hotmix->no_dt,
                        "waktu_datang" => $hotmix->waktu_datang,
                        "waktu_hampar" => $hotmix->waktu_hampar,
                        "suhu_datang" => $hotmix->suhu_datang,
                        "suhu_hampar" => $hotmix->suhu_hampar,
                        "pro_p" => $hotmix->pro_p,
                        "pro_i" => $hotmix->pro_i,
                        "pro_t" => $hotmix->pro_t,
                        "ket" => $hotmix->ket
                    ]);
                }
            }

            DB::connection('talikuat_old')->table('detail_laporan_harian_beton')->where('no_trans', '=', $req->id)->delete();
            if ($req->list_bahan_beton != null) {
                foreach (json_decode($req->list_bahan_beton) as $beton) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_beton')->insert([
                        "no_trans" => $req->id,
                        "bahan_beton" => $beton->bahan_beton,
                        "no_tm" => $beton->no_tm,
                        "waktu_datang" => $beton->waktu_datang,
                        "waktu_curah" => $beton->waktu_curah,
                        "slump_test" => $beton->slump_test,
                        "satuan" => $beton->satuan,
                        "ket" => $beton->ket
                    ]);
                }
            }

            DB::connection('talikuat_old')->table('detail_laporan_harian_tkerja')->where('no_trans', '=', $req->id)->delete();
            if ($req->list_pekerja != null) {
                foreach (json_decode($req->list_pekerja) as $pekerja) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_tkerja')->insert([
                        "no_trans" => $req->id,
                        "tenaga_kerja" => $pekerja->tenaga_kerja,
                        "jumlah" => $pekerja->jumlah,
                    ]);
                }
            }

            DB::connection('talikuat_old')->table('detail_laporan_harian_cuaca')->where('no_trans', '=', $req->id)->delete();
            if ($req->list_cuaca != null) {
                foreach (json_decode($req->list_cuaca) as $cuaca) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_cuaca')->insert([
                        "no_trans" => $req->id,
                        "cerah" => property_exists($cuaca, 'cerah') ? $cuaca->cerah : null,
                        "hujan_ringan" => property_exists($cuaca, 'hujan_ringan') ? $cuaca->hujan_ringan : null,
                        "hujan_lebat" => property_exists($cuaca, 'hujan_lebat') ? $cuaca->hujan_lebat : null,
                        "bencana_alam" => property_exists($cuaca, 'bencana_alam') ? $cuaca->bencana_alam : null,
                        "lain_lain" => property_exists($cuaca, 'lain_lain') ? $cuaca->lain_lain : null,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'code' => 201,
                'result' => "Berhasil mengubah laporan harian"
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'success',
                'code' => 500,
                'result' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function revisiLaporanKontraktorFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "id" => "required",
            "tanggal" => "required",
            "volume" => "required",
            "sta_awal" => "required",
            "sta_akhir" => "required",
            "ki_ka" => "required",
            "keterangan" => "required",
            "bobot" => "required",
            "list_bahan_material" => "json",
            "list_peralatan" => "json",
            "list_bahan_hotmix" => "json",
            "list_bahan_beton" => "json",
            "list_pekerja" => "json",
            "list_cuaca" => "json"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'success',
                'code' => 400,
                'result' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        DB::beginTransaction();

        try {
            $tableRef = DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', '=', $req->id);
            $currentReport = $tableRef->first();
            $request = DB::connection('talikuat_old')->table('request')->where('id', '=', $currentReport->id_request)->first();

            $tableRef->update([
                "tanggal" => $req->tanggal,
                "tgl_update" => Carbon::now(),
                "ket" => $req->keterangan,
                "bobot" => floatval($req->bobot),
                "status" => 1,
                "ditolak" => 0,
                "field_team_konsultan" => $request->field_team_konsultan
            ]);

            if ($req->file('gambar')) {
                $file = $req->file('gambar');
                $name = time() . "_" . $file->getClientOriginalName();
                Storage::delete($currentReport->gambar);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
                $tableRef->update([
                    'gambar' => $this->PATH_FILE_DB . '/' . $name
                ]);
            }

            DB::connection('talikuat_old')->table('detail_laporan_harian_pekerjaan')
                ->where('no_trans', '=', $req->id)
                ->update([
                    "sta_awal" => $req->sta_awal,
                    "sta_akhir" => $req->sta_akhir,
                    "ki_ka" => $req->ki_ka,
                    "volume" => $req->volume,
                    "ket" => $req->keterangan,
                    "tgl" => $req->tanggal,
                    "bobot" => floatval($req->bobot),
                ]);

            DB::connection('talikuat_old')->table('detail_laporan_harian_bahan')->where('no_trans', '=', $req->id)->delete();
            if ($req->list_bahan_material != null) {
                foreach (json_decode($req->list_bahan_material) as $bahan_material) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_bahan')->insert([
                        "no_trans" => $req->id,
                        "bahan" => $bahan_material->bahan,
                        "volume" => $bahan_material->volume,
                        "satuan" => $bahan_material->satuan
                    ]);
                }
            }

            DB::connection('talikuat_old')->table('detail_laporan_harian_peralatan')->where('no_trans', '=', $req->id)->delete();
            if ($req->list_peralatan != null) {
                foreach (json_decode($req->list_peralatan) as $alat) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_peralatan')->insert([
                        "no_trans" => $req->id,
                        "jenis_peralatan" => $alat->jenis_peralatan,
                        "jumlah" => $alat->jumlah,
                        "satuan" => $alat->satuan
                    ]);
                }
            }

            DB::connection('talikuat_old')->table('detail_laporan_harian_hotmix')->where('no_trans', '=', $req->id)->delete();
            if ($req->list_bahan_hotmix != null) {
                foreach (json_decode($req->list_bahan_hotmix) as $hotmix) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_hotmix')->insert([
                        "no_trans" => $req->id,
                        "bahan_hotmix" => $hotmix->bahan_hotmix,
                        "no_dt" => $hotmix->no_dt,
                        "waktu_datang" => $hotmix->waktu_datang,
                        "waktu_hampar" => $hotmix->waktu_hampar,
                        "suhu_datang" => $hotmix->suhu_datang,
                        "suhu_hampar" => $hotmix->suhu_hampar,
                        "pro_p" => $hotmix->pro_p,
                        "pro_i" => $hotmix->pro_i,
                        "pro_t" => $hotmix->pro_t,
                        "ket" => $hotmix->ket
                    ]);
                }
            }

            DB::connection('talikuat_old')->table('detail_laporan_harian_beton')->where('no_trans', '=', $req->id)->delete();
            if ($req->list_bahan_beton != null) {
                foreach (json_decode($req->list_bahan_beton) as $beton) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_beton')->insert([
                        "no_trans" => $req->id,
                        "bahan_beton" => $beton->bahan_beton,
                        "no_tm" => $beton->no_tm,
                        "waktu_datang" => $beton->waktu_datang,
                        "waktu_curah" => $beton->waktu_curah,
                        "slump_test" => $beton->slump_test,
                        "satuan" => $beton->satuan,
                        "ket" => $beton->ket
                    ]);
                }
            }

            DB::connection('talikuat_old')->table('detail_laporan_harian_tkerja')->where('no_trans', '=', $req->id)->delete();
            if ($req->list_pekerja != null) {
                foreach (json_decode($req->list_pekerja) as $pekerja) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_tkerja')->insert([
                        "no_trans" => $req->id,
                        "tenaga_kerja" => $pekerja->tenaga_kerja,
                        "jumlah" => $pekerja->jumlah,
                    ]);
                }
            }

            DB::connection('talikuat_old')->table('detail_laporan_harian_cuaca')->where('no_trans', '=', $req->id)->delete();
            if ($req->list_cuaca != null) {
                foreach (json_decode($req->list_cuaca) as $cuaca) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_cuaca')->insert([
                        "no_trans" => $req->id,
                        "cerah" => property_exists($cuaca, 'cerah') ? $cuaca->cerah : null,
                        "hujan_ringan" => property_exists($cuaca, 'hujan_ringan') ? $cuaca->hujan_ringan : null,
                        "hujan_lebat" => property_exists($cuaca, 'hujan_lebat') ? $cuaca->hujan_lebat : null,
                        "bencana_alam" => property_exists($cuaca, 'bencana_alam') ? $cuaca->bencana_alam : null,
                        "lain_lain" => property_exists($cuaca, 'lain_lain') ? $cuaca->lain_lain : null,
                    ]);
                }
            }

            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $currentReport->nama_kontraktor,
                "created_at" => Carbon::now(),
                "keterangan" => "Laporan Telah Diupdate Oleh " . $currentReport->nama_kontraktor,
                "user_id" => $currentReport->user,
                "id_laporan" => $req->id,
                "class" => "kirim"
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'code' => 201,
                'result' => "Berhasil mengubah laporan harian"
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'success',
                'code' => 500,
                'result' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function editLaporan(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $get_laporan = DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->lapId)->first();
        $get_request = DB::connection('talikuat_old')->table('request')->where('id', $get_laporan->id_request)->first();
        try {
            DB::connection('talikuat_old')->table('request')->where('id', $get_laporan->id_request)->update([
                "volume_terlapor" => $get_request->volume_terlapor - $req->volume
            ]);
            if ($req->file('soft')) {
                $file = $req->file('soft');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->lapId)->update([
                    "tanggal" => $req->tanggal,
                    "gambar" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->lapId)->update([
                "tanggal" => $req->tanggal,
                "volume" => $req->volume,
            ]);

            DB::connection('talikuat_old')->table('detail_laporan_harian_pekerjaan')->where('no_trans', $req->lapId)->update([
                "no_pekerjaan" => $req->no_pekerjaan,
                "jenis_pekerjaan" => $req->jenis_pekerjaan,
                "sta_awal" => $req->sta_awal,
                "sta_akhir" => $req->sta_akhir,
                "ki_ka" => $req->ki_ka,
                "volume" => $req->volume,
                "satuan" => $req->satuan,
                "ket" => $req->ket,
                "tgl" => $req->tanggal
            ]);
            DB::connection('talikuat_old')->table('detail_laporan_harian_bahan')->where('no_trans', '=', $req->lapId)->delete();
            if ($req->bahan) {
                for ($i = 0; $i < count($req->bahan); $i++) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_bahan')->insert([
                        "no_trans" => $req->lapId,
                        "bahan" => $req->bahan[$i],
                        "volume" => $req->volume_bahan[$i],
                        "satuan" => $req->satuan_bahan[$i]
                    ]);
                }
            }
            DB::connection('talikuat_old')->table('detail_laporan_harian_peralatan')->where('no_trans', '=', $req->lapId)->delete();
            if ($req->jenis_peralatan) {
                for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_peralatan')->insert([
                        "no_trans" => $req->lapId,
                        "jenis_peralatan" => $req->jenis_peralatan[$i],
                        "jumlah" => $req->jumlah_peralatan[$i],
                        "satuan" => $req->satuan_peralatan[$i]
                    ]);
                }
            }
            DB::connection('talikuat_old')->table('detail_laporan_harian_hotmix')->where('no_trans', '=', $req->lapId)->delete();
            if ($req->bahan_hotmix) {
                for ($i = 0; $i < count($req->bahan_hotmix); $i++) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_hotmix')->insert([
                        "no_trans" => $req->lapId,
                        "bahan_hotmix" => $req->bahan_hotmix[$i],
                        "no_dt" => $req->no_dt[$i],
                        "waktu_datang" => $req->waktu_datang[$i],
                        "waktu_hampar" => $req->waktu_hampar[$i],
                        "suhu_datang" => $req->suhu_datang[$i],
                        "suhu_hampar" => $req->suhu_hampar[$i],
                        "pro_p" => $req->pro_p[$i],
                        "pro_l" => $req->pro_l[$i],
                        "pro_t" => $req->pro_t[$i],
                        "ket" => $req->ket_hotmix[$i]
                    ]);
                }
            }
            DB::connection('talikuat_old')->table('detail_laporan_harian_beton')->where('no_trans', '=', $req->lapId)->delete();
            if ($req->bahan_beton) {
                for ($i = 0; $i < count($req->bahan_beton); $i++) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_beton')->insert([
                        "no_trans" => $req->lapId,
                        "bahan_beton" => $req->bahan_beton[$i],
                        "no_tm" => $req->no_tm[$i],
                        "waktu_datang" => $req->waktu_datang_beton[$i],
                        "waktu_curah" => $req->waktu_curah[$i],
                        "slump_test" => $req->slump_test[$i],
                        "satuan" => $req->satuan_beton[$i],
                        "ket" => $req->ket_beton[$i]
                    ]);
                }
            }
            DB::connection('talikuat_old')->table('detail_laporan_harian_tkerja')->where('no_trans', '=', $req->lapId)->delete();
            if ($req->tenaga_kerja) {
                for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_tkerja')->insert([
                        "no_trans" => $req->lapId,
                        "tenaga_kerja" => $req->tenaga_kerja[$i],
                        "jumlah" => $req->jumlah_tk[$i],
                    ]);
                }
            }
            if ($req->cerah) {
                for ($i = 0; $i < count($req->cerah); $i++) {
                    DB::connection('talikuat_old')->table('detail_laporan_harian_cuaca')->insert([
                        "no_trans" => $req->lapId,
                        "cerah" => $req->cerah[$i],
                        "hujan_ringan" => $req->hujan_ringan[$i],
                        "hujan_lebat" => $req->hujan_lebat[$i],
                        "benca_alam" => $req->benca_alam[$i],
                        "lain_lain" => $req->lain_lain[$i],
                    ]);
                }
            }
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->kontraktor,
                "created_at" => \Carbon\Carbon::now(),
                "keterangan" => "Laporan Telah Diupdate Oleh " . $req->kontraktor,
                "user_id" => $req->user,
                "id_laporan" => $req->lapId,
                "class" => "kirim"
            ]);
            return response()->json([
                'code' => 200,
                'message' => 'Success'
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'code' => 200,
                'message' => $e->getMessage()
            ], 200);
        }
    }

    public function sendLaporanFromMobile(Request $req)
    {
        $get_data = DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->first();
        if ($get_data->ditolak == 1) {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "status" => 2,
                "ditolak" => 0,
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->username,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "keterangan" => "Request Revisi Telah Dikirim Oleh " . $req->kontraktor,
                "class" => "kirim",
                "created_at" => \Carbon\Carbon::now()
            ]);

            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_konsultan)->get();
            foreach ($mailto as $email) {
                pushNotification("Revisi Request Pekerjaan", "Revisi Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_kontraktor, $email->nm_member);
            }
        } else {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "kontraktor" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px" title="Laporan Di Kirim">&nbsp;</span></a>',
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 2
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->username,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "keterangan" => "Laporan Telah Dikirim Oleh " . $req->kontraktor,
                "class" => "kirim",
                "created_at" => \Carbon\Carbon::now()
            ]);
            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_konsultan)->get();
            foreach ($mailto as $email) {
                pushNotification("Request Pekerjaan", "Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_kontraktor, $email->nm_member);
            }
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => "Berhasil mengirimkan laporan harian"
        ], Response::HTTP_OK);
    }

    public function sendLaporan(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $get_data = DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->first();
        if ($get_data->ditolak == 1) {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "status" => 2,
                "ditolak" => 0,
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->username,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "keterangan" => "Request Revisi Telah Dikirim Oleh " . $req->kontraktor,
                "class" => "kirim",
                "created_at" => \Carbon\Carbon::now()
            ]);
            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_konsultan)->get();
            foreach ($mailto as $email) {
                pushNotification("Revisi Request Pekerjaan", "Revisi Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_kontraktor, $email->nm_member);
            }
        } else {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "kontraktor" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px" title="Laporan Di Kirim">&nbsp;</span></a>',
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 2
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->username,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "keterangan" => "Laporan Telah Dikirim Oleh " . $req->kontraktor,
                "class" => "kirim",
                "created_at" => \Carbon\Carbon::now()
            ]);
            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_konsultan)->get();
            foreach ($mailto as $email) {
                pushNotification("Request Pekerjaan", "Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_kontraktor, $email->nm_member);
            }
        }

        return response()->json([
            "code" => 200
        ]);
    }

    public function responKonsultan(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $validator = Validator::make($req->all(), [
            "laporan" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'error' => $validator->getMessageBag()->getMessages()
            ], 400);
        }
        $get_data = DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->first();
        if ($req->laporan == 1) {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 3,
                "catatan_konsultan" => $req->catatan
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->konsultan,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Laporan Telah Disetujui Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('nama_lengkap', '=', $get_data->nama_ppk)->get();
            foreach ($mailto as $email) {
                pushNotification("Request Pekerjaan", "Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_konsultan, $email->nm_member);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Disetujui Oleh " . $get_data->nama_konsultan, $email->nm_member);
            }

            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_konsultan" => $req->catatan,
                "status" => 1,
                "ditolak" => 1
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->konsultan,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Laporan Telah Ditolak Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_konsultan, $email->nm_member);
            }

            return response()->json([
                "code" => 200
            ], 200);
        }
    }

    public function responKonsultanFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            // Data Umum
            "id" => "required",
            "userId" => "required",
            "konsultan" => "required",
            "isAccepted" => "required",
            "catatan" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'error' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $get_data = DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->first();

        if ($req->isAccepted == "true") {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 3,
                "catatan_konsultan" => $req->catatan
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->konsultan,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Laporan Telah Disetujui Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "foto_konsultan" => null
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('nama_lengkap', '=', $get_data->nama_ppk)->get();
            foreach ($mailto as $email) {
                pushNotification("Request Pekerjaan", "Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_konsultan, $email->nm_member);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Disetujui Oleh " . $get_data->nama_konsultan, $email->nm_member);
            }

            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_konsultan" => $req->catatan,
                "status" => 1,
                "ditolak" => 1
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->konsultan,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Laporan Telah Ditolak Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "foto_konsultan" => null
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_konsultan, $email->nm_member);
            }
            return response()->json([
                "code" => 200
            ], 200);
        }
    }

    public function responPpk(Request $req)
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

        $get_data = DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->first();

        if ($req->laporan == 1) {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "status" => 3,
                "ditolak" => 4,
                "catatan_ppk" => $req->catatan
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->nm_ppk,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Laporan Telah Disetujui Oleh PPK " . $req->nm_ppk,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_konsultan)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Disetujui Oleh " . $get_data->nama_ppk, $email->nm_member);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Disetujui Oleh " . $get_data->nama_ppk, $email->nm_member);
            }

            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_ppk" => $req->catatan,
                "status" => 2,
                "ditolak" => 1
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->nm_ppk,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Laporan Telah Ditolak Oleh PPK " . $req->nm_ppk,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::connection('talikuat_old')->table('master_laporan_harian')->where('id', $req->id)->update([
                    "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_konsultan)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_ppk, $email->nm_member);
            }

            return response()->json([
                "code" => 200
            ], 200);
        }
    }

    public function responPpkFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            // Data Umum
            "id" => "required",
            "userId" => "required",
            "nm_ppk" => "required",
            "isAccepted" => "required",
            "catatan" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'error' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $get_data = DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->first();

        if ($req->isAccepted == "true") {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "status" => 3,
                "ditolak" => 4,
                "catatan_ppk" => $req->catatan
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->nm_ppk,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Laporan Telah Disetujui Oleh PPK " . $req->nm_ppk,
                "created_at" => \Carbon\Carbon::now()
            ]);
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "foto_ppk" => null
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_konsultan)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Disetujui Oleh " . $get_data->nama_ppk, $email->nm_member);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Disetujui Oleh " . $get_data->nama_ppk, $email->nm_member);
            }

            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_ppk" => $req->catatan,
                "status" => 2,
                "ditolak" => 1
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->nm_ppk,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Laporan Telah Ditolak Oleh PPK " . $req->nm_ppk,
                "created_at" => \Carbon\Carbon::now()
            ]);
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "foto_ppk" => null
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('perusahaan', '=', $get_data->nama_konsultan)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_ppk, $email->nm_member);
            }

            return response()->json([
                "code" => 200
            ], 200);
        }
    }

    public function responRevisiKonsultan(Request $req)
    {
        $get_data = DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->first();

        if ($req->option == 'PPK') {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 3,
                "ditolak" => 0,
                "catatan_konsultan" => $req->catatan
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->konsultan,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Revisi Laporan Telah Dikirim Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('nama_lengkap', '=', $get_data->nama_ppk)->get();
            foreach ($mailto as $email) {
                pushNotification("Revisi Request Pekerjaan", "Revisi Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_konsultan, $email->nm_member);
            }

            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "status" => 1,
                "ditolak" => 1,
                "catatan_konsultan" => $req->catatan
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->konsultan,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Laporan Dikembalikan ke Penyedia Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('nama_lengkap', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_konsultan, $email->nm_member);
            }

            return response()->json([
                "code" => 200
            ], 200);
        }
    }

    public function responRevisiKonsultanFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            // Data Umum
            "id" => "required",
            "userId" => "required",
            "konsultan" => "required",
            "isAccepted" => "required",
            "catatan" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'error' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $get_data = DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->first();

        if ($req->isAccepted == "true") {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 3,
                "ditolak" => 0,
                "catatan_konsultan" => $req->catatan
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->konsultan,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Revisi Laporan Telah Dikirim Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('nama_lengkap', '=', $get_data->nama_ppk)->get();
            foreach ($mailto as $email) {
                pushNotification("Revisi Request Pekerjaan", "Revisi Request Pekerjaan Telah Dikirim Oleh " . $get_data->nama_konsultan, $email->nm_member);
            }

            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_konsultan" => $req->catatan,
                "status" => 1,
                "ditolak" => 1
            ]);
            DB::connection('talikuat_old')->table('history_laporan')->insert([
                "username" => $req->konsultan,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Laporan Dikembalikan ke Penyedia Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);
            if ($req->file('dokumentasi')) {
                $file = $req->file('dokumentasi');
                $name = time() . "_" . $file->getClientOriginalName();
                DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }

            $mailto = DB::connection('talikuat_old')->table('member')->where('nama_lengkap', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_konsultan, $email->nm_member);
            }

            return response()->json([
                "code" => 200
            ], 200);
        }
    }

    public function deleteLaporan(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "alasan" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'error' => $validator->getMessageBag()->getMessages()
            ], 400);
        }
        $getLaporan = DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->first();
        $getRequest = DB::connection('talikuat_old')->table('request')->where('id', $getLaporan->id_request)->first();
        DB::connection('talikuat_old')->table('request')->where('id', $getLaporan->id_request)->update([
            'volume_terlapor' => $getRequest->volume_terlapor - $getLaporan->volume
        ]);
        DB::connection('talikuat_old')->table('master_laporan_harian')->where('no_trans', $req->id)->update([
            'reason_delete' => $req->alasan
        ]);

        return response()->json([
            'code' => 200
        ]);
    }

    public function pembandingRelasi(Request $req)
    {

        $jadual = DB::connection('talikuat_old')->table('jadual')->where('id', $req->id)->first();
        $detail = DB::connection('talikuat_old')->table('detail_jadual')->where('id_jadual', $jadual->id)->get();
        if ($jadual->tgl_req) {
            $request = DB::connection('talikuat_old')->table('request')->where('id_jadual', $jadual->id)->first();
            $laporan = DB::connection('talikuat_old')->table('master_laporan_harian')->where([['id_request', $request->id], ['status', 4]])->orderBy('tanggal', 'desc')->get();
            if (count($laporan) != 0) {
                return response()->json([
                    'jadual' => $detail,
                    'laporan' => $laporan
                ]);
            }
            return response()->json([
                'jadual' => $detail
            ]);
        }
        return response()->json([
            'jadual' => $detail
        ]);
    }
}
