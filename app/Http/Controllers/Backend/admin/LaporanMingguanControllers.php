<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\DataUmum;
use App\Models\Backend\Laporan;
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
        if ($role == 3) {
            
            // $data = DataUmum::orderBy('unor','ASC')->orderBy('created_at','ASC')->get();
            $data = DataUmum::where('id_uptd', $uptd)->latest()->with('detail')->with('uptd')->with('laporan')->get();
        }elseif($role == 2 || $role == 15){
            $data = DataUmum::latest()->whereHas('detail', function($query){
                $query->where('ppk_id', Auth::user()->user_detail->id);
            })->with('detail')->with('uptd')->with('laporan')->get();
        }elseif($role == 14){
            $data = DataUmum::where('id_uptd', $uptd)->latest()->whereHas('detail', function($query){
                $query->where('dirlap_id', Auth::user()->user_detail->id);
            })->with('uptd')->with('laporan')->get();   
        } else {
            $data = DataUmum::latest()->with('detail')->with('laporan')->with('uptd')->get();
        }
        //dd($data);
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
                dd($validator->errors());
                return redirect()->back()->withErrors($validator)->withInput();
            }
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
            Storage::putFileAs($this->PATH_FILE_DB, $file, $fileName);
            return redirect()->route('laporan.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
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
}
