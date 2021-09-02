<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class LaporanController extends Controller
{
    private $PATH_FILE_DB = "public/lampiran/file_lap";

    public function getAllLaporanHarian()
    {

        $result = DB::table('master_laporan_harian as master')
            ->leftJoin('detail_laporan_harian_pekerjaan as detail', 'master.no_trans', '=', 'detail.no_trans')
            ->select('master.*', 'detail.jenis_pekerjaan', 'detail.no_pekerjaan', 'detail.satuan', 'detail.volume')
            ->get();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getLaporanProgressKegiatanTerbaru()
    {

        $result = DB::table('master_laporan_harian as master')
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
        $result = DB::table('master_laporan_harian')
            ->selectRaw('master_laporan_harian.*, detail_laporan_harian_pekerjaan.*')
            ->join('detail_laporan_harian_pekerjaan', 'master_laporan_harian.no_trans', '=', 'detail_laporan_harian_pekerjaan.no_trans')
            ->where('master_laporan_harian.no_trans', '=', $id)
            ->first();

        $result->gambar = Storage::url($result->gambar);
        $result->list_bahan_material = DB::table('detail_laporan_harian_bahan')->where('no_trans', '=', $result->no_trans)->get();
        $result->list_bahan_beton = DB::table('detail_laporan_harian_beton')->where('no_trans', '=', $result->no_trans)->get();
        $result->list_cuaca = DB::table('detail_laporan_harian_cuaca')->where('no_trans', '=', $result->no_trans)->get();
        $result->list_bahan_hotmix = DB::table('detail_laporan_harian_hotmix')->where('no_trans', '=', $result->no_trans)->get();
        $result->list_pekerja = DB::table('detail_laporan_harian_tkerja')->where('no_trans', '=', $result->no_trans)->get();
        $result->list_peralatan = DB::table('detail_laporan_harian_peralatan')->where('no_trans', '=', $result->no_trans)->get();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ], Response::HTTP_OK);
    }

    public function getLaporanByRequestId($id, Request $req)
    {
        $result = DB::table('master_laporan_harian')
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
            $item->gambar = Storage::url($item->gambar);
            $item->list_bahan_material = DB::table('detail_laporan_harian_bahan')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_bahan_beton = DB::table('detail_laporan_harian_beton')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_cuaca = DB::table('detail_laporan_harian_cuaca')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_bahan_hotmix = DB::table('detail_laporan_harian_hotmix')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_pekerja = DB::table('detail_laporan_harian_tkerja')->where('no_trans', '=', $item->no_trans)->get();
            $item->list_peralatan = DB::table('detail_laporan_harian_peralatan')->where('no_trans', '=', $item->no_trans)->get();
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
        $request = DB::table('request')->where('id', $req->id_request)->first();

        $idLaporan = DB::table('master_laporan_harian')->insertGetId([
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

        DB::table('detail_laporan_harian_pekerjaan')->insert([
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
                DB::table('detail_laporan_harian_bahan')->insert([
                    "no_trans" => $idLaporan,
                    "bahan" => $bahan_material->bahan,
                    "volume" => $bahan_material->volume,
                    "satuan" => $bahan_material->satuan
                ]);
            }
        }

        if ($req->list_peralatan != null) {
            foreach (json_decode($req->list_peralatan) as $alat) {
                DB::table('detail_laporan_harian_peralatan')->insert([
                    "no_trans" => $idLaporan,
                    "jenis_peralatan" => $alat->jenis_peralatan,
                    "jumlah" => $alat->jumlah,
                    "satuan" => $alat->satuan
                ]);
            }
        }

        if ($req->list_bahan_hotmix != null) {
            foreach (json_decode($req->list_bahan_hotmix) as $hotmix) {
                DB::table('detail_laporan_harian_hotmix')->insert([
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
                DB::table('detail_laporan_harian_beton')->insert([
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
                DB::table('detail_laporan_harian_tkerja')->insert([
                    "no_trans" => $idLaporan,
                    "tenaga_kerja" => $pekerja->tenaga_kerja,
                    "jumlah" => $pekerja->jumlah,
                ]);
            }
        }

        if ($req->list_cuaca != null) {
            foreach (json_decode($req->list_cuaca) as $cuaca) {
                DB::table('detail_laporan_harian_cuaca')->insert([
                    "no_trans" => $idLaporan,
                    "cerah" => property_exists($cuaca, 'cerah') ? $cuaca->cerah : null,
                    "hujan_ringan" => property_exists($cuaca, 'hujan_ringan') ? $cuaca->hujan_ringan : null,
                    "hujan_lebat" => property_exists($cuaca, 'hujan_lebat') ? $cuaca->hujan_lebat : null,
                    "bencana_alam" => property_exists($cuaca, 'bencana_alam') ? $cuaca->bencana_alam : null,
                    "lain_lain" => property_exists($cuaca, 'lain_lain') ? $cuaca->lain_lain : null,
                ]);
            }
        }

        DB::table('history_laporan')->insert([
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
        $getTeam = DB::table('request')->where('id', $req->permohonan)->first();
        DB::beginTransaction();
        try {
            $id = DB::table('master_laporan_harian')->insertGetId([
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
            DB::table('detail_laporan_harian_pekerjaan')->insert([
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
                    DB::table('detail_laporan_harian_bahan')->insert([
                        "no_trans" => $id,
                        "bahan" => $req->bahan[$i],
                        "volume" => $req->volume_bahan[$i],
                        "satuan" => $req->satuan_bahan[$i]
                    ]);
                }
            }
    
    
            if ($req->jenis_peralatan[0] != null) {
                for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
                    DB::table('detail_laporan_harian_peralatan')->insert([
                        "no_trans" => $id,
                        "jenis_peralatan" => $req->jenis_peralatan[$i],
                        "jumlah" => $req->jumlah_peralatan[$i],
                        "satuan" => $req->satuan_peralatan[$i]
                    ]);
                }
            }
    
    
            if ($req->bahan_hotmix[0] != null) {
                for ($i = 0; $i < count($req->bahan_hotmix); $i++) {
                    DB::table('detail_laporan_harian_hotmix')->insert([
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
                    DB::table('detail_laporan_harian_beton')->insert([
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
                    DB::table('detail_laporan_harian_tkerja')->insert([
                        "no_trans" => $id,
                        "tenaga_kerja" => $req->tenaga_kerja[$i],
                        "jumlah" => $req->jumlah_tk[$i],
                    ]);
                }
            }
    
    
            if ($req->cerah[0] != null) {
                for ($i = 0; $i < count($req->cerah); $i++) {
                    DB::table('detail_laporan_harian_cuaca')->insert([
                        "no_trans" => $id,
                        "cerah" => $req->cerah[$i],
                        "hujan_ringan" => $req->hujan_ringan[$i],
                        "hujan_lebat" => $req->hujan_lebat[$i],
                        "bencana_alam" => $req->bencana_alam[$i],
                        "lain_lain" => $req->lain_lain[$i],
                    ]);
                }
            }
    
    
            DB::table('history_laporan')->insert([
                "username" => $req->kontraktor,
                "created_at" => \Carbon\Carbon::now(),
                "keterangan" => "Laporan Telah Dibuat Oleh " . $req->kontraktor,
                "user_id" => $req->user,
                "id_laporan" => $id,
                "class" => "kirim"
            ]);
            DB::commit();
            return response()->json([
                'code' => 200
            ], 200);
    
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message'=>$e->getMessage()
            ], 500);
        }
        
    }

    public function editLaporan(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');

        if ($req->file('soft')) {
            $file = $req->file('soft');
            $name = time() . "_" . $file->getClientOriginalName();
            DB::table('master_laporan_harian')->where('no_trans', $req->lapId)->update([
                "tanggal" => $req->tanggal,
                "gambar" => $this->PATH_FILE_DB . "/" . $name
            ]);
            Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
        }
        DB::table('master_laporan_harian')->where('no_trans', $req->lapId)->update([
            "tanggal" => $req->tanggal,
        ]);
        DB::table('detail_laporan_harian_pekerjaan')->where('no_trans', $req->lapId)->update([
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

        if ($req->bahan) {
            for ($i = 0; $i < count($req->bahan); $i++) {
                DB::table('detail_laporan_harian_bahan')->where('no_trans', '=', $req->lapId)->delete();
            }
            for ($i = 0; $i < count($req->bahan); $i++) {
                DB::table('detail_laporan_harian_bahan')->insert([
                    "no_trans" => $req->lapId,
                    "bahan" => $req->bahan[$i],
                    "volume" => $req->volume_bahan[$i],
                    "satuan" => $req->satuan_bahan[$i]
                ]);
            }
        }
        if ($req->jenis_peralatan) {
            for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
                DB::table('detail_laporan_harian_peralatan')->where('no_trans', '=', $req->lapId)->delete();
            }
            for ($i = 0; $i < count($req->jenis_peralatan); $i++) {
                DB::table('detail_laporan_harian_peralatan')->insert([
                    "no_trans" => $req->lapId,
                    "jenis_peralatan" => $req->jenis_peralatan[$i],
                    "jumlah" => $req->jumlah_peralatan[$i],
                    "satuan" => $req->satuan_peralatan[$i]
                ]);
            }
        }
        if ($req->bahan_hotmix) {
            for ($i = 0; $i < count($req->bahan_hotmix); $i++) {
                DB::table('detail_laporan_harian_hotmix')->where('no_trans', '=', $req->lapId)->delete();
            }
            for ($i = 0; $i < count($req->bahan_hotmix); $i++) {
                DB::table('detail_laporan_harian_hotmix')->insert([
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
        if ($req->bahan_beton) {
            for ($i = 0; $i < count($req->bahan_beton); $i++) {
                DB::table('detail_laporan_harian_beton')->where('no_trans', '=', $req->lapId)->delete();
            }
            for ($i = 0; $i < count($req->bahan_beton); $i++) {
                DB::table('detail_laporan_harian_beton')->insert([
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
        if ($req->tenaga_kerja) {
            for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
                DB::table('detail_laporan_harian_tkerja')->where('no_trans', '=', $req->lapId)->delete();
            }
            for ($i = 0; $i < count($req->tenaga_kerja); $i++) {
                DB::table('detail_laporan_harian_tkerja')->insert([
                    "no_trans" => $req->lapId,
                    "tenaga_kerja" => $req->tenaga_kerja[$i],
                    "jumlah" => $req->jumlah_tk[$i],
                ]);
            }
        }
        if ($req->cerah) {
            for ($i = 0; $i < count($req->cerah); $i++) {
                DB::table('detail_laporan_harian_cuaca')->where('no_trans', '=', $req->lapId)->delete();
            }
            for ($i = 0; $i < count($req->cerah); $i++) {
                DB::table('detail_laporan_harian_cuaca')->insert([
                    "no_trans" => $req->lapId,
                    "cerah" => $req->cerah[$i],
                    "hujan_ringan" => $req->hujan_ringan[$i],
                    "hujan_lebat" => $req->hujan_lebat[$i],
                    "benca_alam" => $req->benca_alam[$i],
                    "lain_lain" => $req->lain_lain[$i],
                ]);
            }
        }
        DB::table('history_laporan')->insert([
            "username" => $req->kontraktor,
            "created_at" => \Carbon\Carbon::now(),
            "keterangan" => "Laporan Telah Diupdate Oleh " . $req->kontraktor,
            "user_id" => $req->user,
            "id_laporan" => $req->lapId,
            "class" => "kirim"
        ]);
        return response()->json([
            'code' => 200
        ], 200);
    }

    public function sendLaporanFromMobile(Request $req)
    {
        $get_data = DB::table('master_laporan_harian')->where('no_trans', $req->id)->first();
        if ($get_data->ditolak == 1) {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "status" => 2,
                "ditolak" => 0,
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
            ]);
            DB::table('history_laporan')->insert([
                "username" => $req->username,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "keterangan" => "Request Revisi Telah Dikirim Oleh " . $req->kontraktor,
                "class" => "kirim",
                "created_at" => \Carbon\Carbon::now()
            ]);
        } else {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "kontraktor" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px" title="Laporan Di Kirim">&nbsp;</span></a>',
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 2
            ]);
            DB::table('history_laporan')->insert([
                "username" => $req->username,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "keterangan" => "Laporan Telah Dikirim Oleh " . $req->kontraktor,
                "class" => "kirim",
                "created_at" => \Carbon\Carbon::now()
            ]);
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
        $get_data = DB::table('master_laporan_harian')->where('no_trans', $req->id)->first();
        if ($get_data->ditolak == 1) {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "status" => 2,
                "ditolak" => 0,
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
            ]);
            DB::table('history_laporan')->insert([
                "username" => $req->username,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "keterangan" => "Request Revisi Telah Dikirim Oleh " . $req->kontraktor,
                "class" => "kirim",
                "created_at" => \Carbon\Carbon::now()
            ]);
        } else {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "kontraktor" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px" title="Laporan Di Kirim">&nbsp;</span></a>',
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 2
            ]);
            DB::table('history_laporan')->insert([
                "username" => $req->username,
                "id_laporan" => $req->id,
                "user_id" => $req->userId,
                "keterangan" => "Laporan Telah Dikirim Oleh " . $req->kontraktor,
                "class" => "kirim",
                "created_at" => \Carbon\Carbon::now()
            ]);
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
        if ($req->laporan == 1) {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 3,
                "catatan_konsultan" => $req->catatan
            ]);
            DB::table('history_laporan')->insert([
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
                DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_konsultan" => $req->catatan,
                "status" => 1,
                "ditolak" => 1
            ]);
            DB::table('history_laporan')->insert([
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
                DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
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

        if ($req->isAccepted == true) {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 3,
                "catatan_konsultan" => $req->catatan
            ]);
            DB::table('history_laporan')->insert([
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
                DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_konsultan" => $req->catatan,
                "status" => 1,
                "ditolak" => 1
            ]);
            DB::table('history_laporan')->insert([
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
                DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
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


        if ($req->laporan == 1) {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "status" => 3,
                "ditolak" => 4,
                "catatan_ppk" => $req->catatan
            ]);
            DB::table('history_laporan')->insert([
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
                DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_ppk" => $req->catatan,
                "status" => 2,
                "ditolak" => 1
            ]);
            DB::table('history_laporan')->insert([
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
                DB::table('master_laporan_harian')->where('id', $req->id)->update([
                    "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
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

        if ($req->isAccepted == true) {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "status" => 3,
                "ditolak" => 4,
                "catatan_ppk" => $req->catatan
            ]);
            DB::table('history_laporan')->insert([
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
                DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_ppk" => $req->catatan,
                "status" => 2,
                "ditolak" => 1
            ]);
            DB::table('history_laporan')->insert([
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
                DB::table('master_laporan_harian')->where('id', $req->id)->update([
                    "foto_ppk" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            return response()->json([
                "code" => 200
            ], 200);
        }
    }

    public function responRevisiKonsultan(Request $req)
    {
        if ($req->option == 'PPK') {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 3,
                "ditolak" => 0,
                "catatan" => $req->catatan
            ]);
            DB::table('history_laporan')->insert([
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
                DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
            }
            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "status" => 1,
                "ditolak" => 1,
                "catatan" => $req->catatan
            ]);
            DB::table('history_laporan')->insert([
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
                DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
                    "foto_konsultan" => $this->PATH_FILE_DB . "/" . $name
                ]);
                Storage::putFileAs($this->PATH_FILE_DB, $file, $name);
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
        DB::table('master_laporan_harian')->where('no_trans', $req->id)->update([
            'reason_delete' => $req->alasan
        ]);
        // DB::table('detail_laporan_harian_pekerjaan')->where('no_trans',$id)->delete();
        // DB::table('detail_laporan_harian_bahan')->where('no_trans',$id)->delete();
        // DB::table('detail_laporan_harian_tkerja')->where('no_trans',$id)->delete();
        // DB::table('detail_laporan_harian_cuaca')->where('no_trans',$id)->delete();
        // DB::table('detail_laporan_harian_beton')->where('no_trans',$id)->delete();
        // DB::table('detail_laporan_harian_hotmix')->where('no_trans',$id)->delete();
        // DB::table('detail_laporan_harian_peralatan')->where('no_trans',$id)->delete();
        // DB::table('detail_laporan_harian_tkerja')->where('no_trans',$id)->delete();

        return response()->json([
            'code' => 200
        ]);
    }

    public function pembandingRelasi(Request $req)
    {

        $jadual = DB::table('jadual')->where('id', $req->id)->first();
        $detail = DB::table('detail_jadual')->where('id_jadual', $jadual->id)->get();
        if ($jadual->tgl_req) {
            $request = DB::table('request')->where('id_jadual', $jadual->id)->first();
            $laporan = DB::table('master_laporan_harian')->where([['id_request', $request->id], ['status', 4]])->orderBy('tanggal', 'desc')->get();
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
