<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\DataUmum;
use App\Models\Backend\Laporan;
use App\Models\Backend\LaporanBahanBeton;
use App\Models\Backend\LaporanBahanHotmix;
use App\Models\Backend\LaporanBahanMaterial;
use App\Models\Backend\LaporanCuaca;
use App\Models\Backend\LaporanPeralatan;
use App\Models\Backend\LaporanTenagaKerja;
use App\Models\Backend\HistoryStatusLaporan;
use App\Models\Backend\Request as BackendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class LaporanMingguanControllers extends Controller
{
    private $PATH_FILE_DB = "public/lampiran/laporan/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->user_detail->rule_user_id;
        $uptd = Auth::user()->user_detail->uptd_id;
        $list =[];
        if ($role == 3) {
            // $data = DataUmum::orderBy('unor','ASC')->orderBy('created_at','ASC')->get();
            $data = DataUmum::where('id_uptd', $uptd)->latest()->with('detail')->with('uptd')->with('laporan')->get();
            foreach($data as $d){
                array_push($list, $d->id);
            }
            $laporan = Laporan::whereIn('data_umum_id', $list)->get();
        }elseif($role == 2 || $role == 15){
            $data = DataUmum::latest()->whereHas('detail', function($query){
                $query->where('ppk_id', Auth::user()->user_detail->id);
            })->with('detail')->with('uptd')->get();
            foreach($data as $d){
                array_push($list, $d->id);
            }
            $laporan = Laporan::whereIn('data_umum_id', $list)->get();
        }elseif($role == 14){
            $data = DataUmum::where('id_uptd', $uptd)->latest()->whereHas('detail', function($query){
                $query->where('dirlap_id', Auth::user()->user_detail->id);
            })->with('uptd')->get();   
            foreach($data as $d){
                array_push($list, $d->id);
            }
            $laporan = Laporan::whereIn('data_umum_id', $list)->get();
        } else {
            $data = DataUmum::latest()->with('detail')->with('uptd')->get();
            $laporan = Laporan::latest()->get();
        }
<<<<<<< HEAD
       
=======
>>>>>>> 67e7b0ffbb085a4ed84e4a2cc0fd4f36a0e4003a
        return view("admin.laporan_mingguan.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = BackendRequest::where('id', $id)->with('dataUmumDetail')->with('jadual')->first();
        $jumlah_minggu =intval($data->dataUmumDetail->lama_waktu / 7) ;
        $sisa_volume =(float) $data->volume - (float)$data->volume_terlapor;
        return view("admin.laporan_mingguan.create", compact('data', 'jumlah_minggu', 'sisa_volume'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'request_id' => 'required',
                'data_umum_id' => 'required',
                'minggu' => 'required',
                'sta_awal' => 'required',
                'sta_akhir' => 'required',
                'ki_ka' => 'required',
                'nmp' => 'required',
                'uraian' => 'required',
                'volume' => 'required',
                'satuan' => 'required',
                'file_dokumentasi' => 'required',
            ]);


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($request->bahan_material[0] != null) {
                $validator = Validator::make($request->all(), [
                    'volume_bahan.*' => 'required',
                    'satuan_bahan.*' => 'required',
                ]);
            }

            if ($request->jenis_peralatan[0] != null) {
                $validator = Validator::make($request->all(), [
                    'jumlah_peralatan.*' => 'required',
                ]);
            }

            if ($request->bahan_hotmix[0] != null) {
                $validator = Validator::make($request->all(), [
                    'no_dump_truck.*' => 'required',
                    'waktu_datang.*' => 'required',
                    'waktu_hampar.*' => 'required',
                    'suhu_datang.*' => 'required',
                    'suhu_hampar.*' => 'required',
                    'p_m.*' => 'required',
                    'l_m.*' => 'required',
                    't_gembur_m.*' => 'required',
                ]);
            }

            if ($request->bahan_beton_ready_mix[0] != null) {
                $validator = Validator::make($request->all(), [
                    'no_truck_mixer.*' => 'required',
                    'waktu_curah.*' => 'required',
                    'slump_test.*' => 'required',
                    'satuan_beton.*' => 'required',
                ]);
            }

            if ($request->tenaga_kerja[0] != null) {
                $validator = Validator::make($request->all(), [
                    'jumlah.*' => 'required',
                ]);
            }

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            DB::beginTransaction();
            $dataUmum = DataUmum::where('id', $request->data_umum_id)->first();
            $tgl_spmk = $dataUmum->tgl_spmk;
            $minggu = '+ '.$request->minggu.'weeks';
            $tgl_mulai = date('Y-m-d', strtotime($tgl_spmk. $minggu));
            $file = $request->file('file_dokumentasi');
            $fileName =  time() . "_" . $file->getClientOriginalName();
            $laporan = Laporan::create([
                'request_id'=>$request->request_id,
                'data_umum_id' => $request->data_umum_id,
                'minggu_ke' => $request->minggu,
                'sta_awal' => $request->sta_awal,
                'sta_akhir' => $request->sta_akhir,
                'ki_ka' => $request->ki_ka,
                'jenis_pekerjaan' => $request->nmp.' - '.$request->uraian,
                'volume' => $request->volume,
                'satuan' => $request->satuan,
                'status' => 0,
                'file_dokumentasi' => $fileName,
                'created_by' => Auth::user()->id,
                'tgl_mulai' => $tgl_mulai,

            ]);

            if ($request->bahan_material[0] != null) {
                for ($i=0; $i <count($request->bahan_material) ; $i++) { 
                    LaporanBahanMaterial::create([
                        'laporan_id' => $laporan->id,
                        'bahan_digunakan' => $request->bahan_material[$i],
                        'volume' => $request->volume_bahan[$i],
                        'satuan' => $request->satuan_bahan[$i],
                    ]);
                } 
            }

            if ($request->jenis_peralatan[0] != null) {
                for ($i=0; $i <count($request->jenis_peralatan) ; $i++) { 
                    LaporanPeralatan::create([
                        'laporan_id' => $laporan->id,
                        'jenis_peralatan' => $request->jenis_peralatan[$i],
                        'jumlah' => $request->jumlah_peralatan[$i],
                    ]);
                } 
            }

            if ($request->bahan_hotmix[0] != null) {
                for ($i=0; $i <count($request->bahan_hotmix) ; $i++) { 
                    LaporanBahanHotmix::create([
                        'laporan_id' => $laporan->id,
                        'bahan_hotmix' => $request->bahan_hotmix[$i],
                        'no_dump_truck' => $request->no_dump_truck[$i],
                        'waktu_datang' => $request->waktu_datang[$i],
                        'waktu_hampar' => $request->waktu_hampar[$i],
                        'suhu_datang' => $request->suhu_datang[$i],
                        'suhu_hampar' => $request->suhu_hampar[$i],
                        'p_m' => $request->p_m[$i],
                        'l_m' => $request->l_m[$i],
                        't_gembur_m' => $request->t_gembur_m[$i],
                    ]);
                } 
            }

            if ($request->bahan_beton_ready_mix[0] != null) {
                for ($i=0; $i <count($request->bahan_beton_ready_mix) ; $i++) { 
                    LaporanBahanBeton::create([
                        'laporan_id' => $laporan->id,
                        'bahan_beton' => $request->bahan_beton_ready_mix[$i],
                        'no_truck_mixer' => $request->no_truck_mixer[$i],
                        'waktu_curah' => $request->waktu_curah[$i],
                        'slump_test' => $request->slump_test[$i],
                        'satuan' => $request->satuan_beton[$i],
                    ]);
                } 
            }

            if ($request->tenaga_kerja[0] != null) {
                for ($i=0; $i <count($request->tenaga_kerja) ; $i++) { 
                    LaporanTenagaKerja::create([
                        'laporan_id' => $laporan->id,
                        'tenaga_kerja' => $request->tenaga_kerja[$i],
                        'jumlah' => $request->jumlah[$i],
                    ]);
                } 
            }
            

            DB::commit();
            Storage::putFileAs($this->PATH_FILE_DB, $file, $fileName);
            return redirect()->route('laporan.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back()->with('error', $e->getMessage());
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendLaporanApi($id)
    {
        $data = Laporan::find($id);
        $data->status = 1;
        $data->save();
        $this->createHistoryStatus($id, 3);
        return back()->with('success', 'Data berhasil dikirim');
    }
    private function createHistoryStatus($id, $status)
    {

        if ($status == 0) {
            $keterangan = 'Laporan sudah dibuat';
        }
        if ($status == 1) {
            $keterangan = 'Laporan dirubah / direvisi';
        }
        if ($status == 2) {
            $keterangan = 'Laporan dikirim ke DIRLAP';
        }
        if ($status == 3) {
            $keterangan = 'Laporan dilanjutkan ke PPK';
        }
        if ($status == 4) {
            $keterangan = 'Laporan ditolak dan dikembalikan kepada Admin Uptd Oleh DIRLAP';
        }
        if ($status == 5) {
            $keterangan = 'Laporan ditolak dan dikembalikan kepada Admin Uptd Oleh PPK';
        }
        if ($status == 6) {
            $keterangan = 'Laporan diterima oleh PPK';
        }
        HistoryStatusLaporan::create([
            'user_id' => Auth::user()->id,
            'laporan_id' => $id,
            'keterangan' => $keterangan,
        ]);
    }
}
