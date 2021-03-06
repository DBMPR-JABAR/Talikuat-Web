<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\BahanJMF;
use App\Models\Backend\BahanMaterial;
use App\Models\Backend\DataUmum;
use App\Models\Backend\DataUmumDetail;
use App\Models\Backend\HistoryRequest;
use App\Models\Backend\Jadual;
use App\Models\Backend\Peralatan;
use App\Models\Backend\Request as BackendRequest;
use App\Models\Backend\TenagaKerja;
use App\Models\Backend\HistoryStatusRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDF;

class RequestControllers extends Controller
{
    private $PATH_FILE_DB = "public/lampiran/request/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->user_detail->rule_user_id;
        $uptd = Auth::user()->user_detail->uptd_id;
        $list = [];
        if ($role == 3) {
            // $data = DataUmum::orderBy('unor','ASC')->orderBy('created_at','ASC')->get();
            $data = DataUmum::where('id_uptd', $uptd)->latest()->with('detail')->with('uptd')->get();
            foreach ($data as $item) {
                array_push($list, $item->detail->id);
            }
           $requests = BackendRequest::whereIn('data_umum_detail_id', $list)->latest()->with('historyStatus')->with('historyRequest')->with('detailBahan')->with('detailPeralatan')->with('detailTenagaKerja')->with('detailBahanJMF')->with('dataUmumDetail')->with('jadual')->get();
        }elseif($role == 2 || $role == 15){
            $data = DataUmum::latest()->whereHas('detail', function($query){
                $query->where('ppk_id', Auth::user()->user_detail->id);
            })->with('detail')->with('uptd')->get();
            foreach ($data as $item) {
                array_push($list, $item->detail->id);
            }
            $requests = BackendRequest::whereIn('data_umum_detail_id', $list)->with('historyStatus')->with('historyRequest')->with('detailBahan')->with('detailPeralatan')->with('detailTenagaKerja')->with('detailBahanJMF')->with('dataUmumDetail')->with('jadual')->get();
        }elseif($role == 14){
            $data = DataUmum::where('id_uptd', $uptd)->latest()->whereHas('detail', function($query){
                $query->where('dirlap_id', Auth::user()->user_detail->id);
            })->with('uptd')->get();   
            foreach ($data as $item) {
                array_push($list, $item->detail->id);
            }
            $requests = BackendRequest::whereIn('data_umum_detail_id', $list)->with('historyStatus')->with('historyRequest')->with('detailBahan')->with('detailPeralatan')->with('detailTenagaKerja')->with('detailBahanJMF')->with('dataUmumDetail')->with('jadual')->get();
        }elseif($role == 5||$role == 7|| $role == 8 || $role==9){
            $data = DataUmum::where('id_uptd', $uptd)->latest()->whereHas('detail', function($query){
                $query->where('konsultan_id', Auth::user()->user_detail->konsultan_id);
            })->with('uptd')->get();
   
            foreach ($data as $item) {
                array_push($list, $item->detail->id);
            }
            $requests = BackendRequest::whereIn('data_umum_detail_id', $list)->latest()->with('historyStatus')->with('historyRequest')->with('detailBahan')->with('detailPeralatan')->with('detailTenagaKerja')->with('detailBahanJMF')->with('dataUmumDetail')->with('jadual')->get();

        } else {
            $data = DataUmum::latest()->with('detail')->with('uptd')->get();
            $requests = BackendRequest::latest()->with('historyStatus')->with('historyRequest')->with('detailBahan')->with('detailPeralatan')->with('detailTenagaKerja')->with('detailBahanJMF')->with('dataUmumDetail')->with('jadual')->get();
        }
   

        return view('admin.request.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = DataUmum::with('jadual')->find($id);
        return view('admin.request.create', compact('data'));
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
                'data_umum_detail_id' => 'required',
                'jadual_id' => 'required',
                'lokasi_sta' => 'required',
                'volume' => 'required',
                'tgl_diajukan' => 'required',
                'tgl_dikerjakan' => 'required',
                'file_shop_drawing' => 'required|file|mimes:jpg,jpeg,png',
            ]);


            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            if ($request->bahan_material[0] != null) {
                $validator = Validator::make($request->all(), [
                    'volume_material' => 'required',
                    'satuan_material' => 'required',
                ]);
            }

            if ($request->bahan_jmf[0] != null) {
                $validator = Validator::make($request->all(), [
                    'volume_jmf' => 'required',
                    'satuan_jmf' => 'required',
                ]);
            }
            if ($request->jenis_peralatan[0] != null) {
                $validator = Validator::make($request->all(), [
                    'jumlah_peralatan' => 'required',
                    'satuan_peralatan' => 'required',
                ]);
            }

            if ($request->tenaga_kerja[0] != null) {
                $validator = Validator::make($request->all(), [
                    'jumlah_tenaga_kerja' => 'required',
                ]);
            }

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $file = $request->file('file_shop_drawing');
            $fileName =  time() . "_" . $file->getClientOriginalName();
            DB::beginTransaction();
            $dataRequest =  BackendRequest::create([
                'data_umum_detail_id' => $request->data_umum_detail_id,
                'jadual_id' => $request->jadual_id,
                'lokasi_sta' => $request->lokasi_sta,
                'tgl_request' => $request->tgl_diajukan,
                'tgl_dikerjakan' => $request->tgl_dikerjakan,
                'status' => 0,
                'volume' => $request->volume,
                'file_shopdrawing' => $fileName,
            ]);

            $jadual = Jadual::find($request->jadual_id);
            $jadual->volume_terrequest = (float) $jadual->volume_terrequest + (float) $request->volume;
            $jadual->save();
            Storage::putFileAs($this->PATH_FILE_DB, $file, $fileName);


            if ($request->bahan_material[0] != null) {
                for ($i = 0; $i < count($request->bahan_material); $i++) {
                    BahanMaterial::create([
                        'request_id' => $dataRequest->id,
                        'bahan_material' => $request->bahan_material[$i],
                        'volume' => $request->volume_material[$i],
                        'satuan' => $request->satuan_material[$i],
                    ]);
                }
            }
            if ($request->bahan_jmf[0] != null) {
                for ($i = 0; $i < count($request->bahan_jmf); $i++) {
                    BahanJMF::create([
                        'request_id' => $dataRequest->id,
                        'bahan_jmf' => $request->bahan_jmf[$i],
                        'volume' => $request->volume_jmf[$i],
                        'satuan' => $request->satuan_jmf[$i],
                    ]);
                }
            }
            if ($request->jenis_peralatan[0] != null) {
                for ($i = 0; $i < count($request->jenis_peralatan); $i++) {
                    Peralatan::create([
                        'request_id' => $dataRequest->id,
                        'jenis_peralatan' => $request->jenis_peralatan[$i],
                        'jumlah' => $request->jumlah_peralatan[$i],
                        'satuan' => $request->satuan_peralatan[$i],
                    ]);
                }
            }
            if ($request->tenaga_kerja[0] != null) {
                for ($i = 0; $i < count($request->tenaga_kerja); $i++) {
                    TenagaKerja::create([
                        'request_id' => $dataRequest->id,
                        'tenaga_kerja' => $request->tenaga_kerja[$i],
                        'jumlah' => $request->jumlah_tenaga_kerja[$i],
                    ]);
                }
            }
            $this->createHistoryStatus($dataRequest->id, 0);
            DB::commit();
            return redirect()->route('request.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $e) {
            DB::rollback();
            return back()->with('error', 'Gagal menyimpan data')->withInput();
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
        $data = BackendRequest::where('id', $id)->with('historyStatus')->with('historyRequest')->with('detailBahan')->with('detailPeralatan')->with('detailTenagaKerja')->with('detailBahanJMF')->with('jadual')->with('dataUmumDetail')->first();
        $jadual = Jadual::where('data_umum_detail_id', $data->dataUmumDetail->id)->get(); 
        $countRequest = BackendRequest::where('jadual_id', $data->jadual_id)->count();
       
        return view('admin.request.show', compact('data', 'jadual', 'countRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BackendRequest::where('id', $id)->with('historyStatus')->with('historyRequest')->with('detailBahan')->with('detailPeralatan')->with('detailTenagaKerja')->with('detailBahanJMF')->with('jadual')->with('dataUmumDetail')->first();
        $jadual = Jadual::where('data_umum_detail_id', $data->dataUmumDetail->id)->get(); 
        $countRequest = BackendRequest::where('jadual_id', $data->jadual_id)->count();
       
        return view('admin.request.edit', compact('data', 'jadual', 'countRequest'));
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
        try {
            $validator = Validator::make($request->all(), [
                'tgl_diajukan' => 'required',
                'tgl_dikerjakan' => 'required',
                'volume' => 'required',
                'lokasi_sta' => 'required',
            ]);

            if ($validator->fails()) {
                dd($validator->errors());
                return back()->withErrors($validator)->withInput();
            }
            DB::beginTransaction();
            $dataRequest = BackendRequest::find($id);
            if ($request->file('file_shop_drawing')) {
                $file = $request->file('file_shop_drawing');
                $fileName =  time() . "_" . $file->getClientOriginalName();
                $dataRequest->file_shopdrawing = $fileName;
                Storage::putFileAs($this->PATH_FILE_DB, $file, $fileName);
            }

            if ($dataRequest->jadual_id != $request->jadual_id) {
                $jadualOld = Jadual::find($dataRequest->jadual_id);
                $jadualOld->volume_terrequest = (float) $jadualOld->volume_terrequest - (float) $dataRequest->volume;
                $jadualOld->save();
                $jadual = Jadual::find($request->jadual_id);
                $jadual->volume_terrequest = (float) $jadual->volume_terrequest + (float) $request->volume;
                $jadual->save();

            }
                $dataRequest->jadual_id = $request->jadual_id;
                $dataRequest->lokasi_sta = $request->lokasi_sta;
                $dataRequest->tgl_request = $request->tgl_diajukan;
                $dataRequest->tgl_dikerjakan = $request->tgl_dikerjakan;
                $dataRequest->status = 0;
                $dataRequest->volume = $request->volume;
            $dataRequest->save();
          
            if ($request->bahan_material) {
                $dataBahanMaterial = BahanMaterial::where('request_id', $id)->delete();
                for ($i = 0; $i < count($request->bahan_material); $i++) {
                    BahanMaterial::create([
                        'request_id' => $dataRequest->id,
                        'bahan_material' => $request->bahan_material[$i],
                        'volume' => $request->volume_material[$i],
                        'satuan' => $request->satuan_material[$i],
                    ]);
                }
            }
            if ($request->bahan_jmf) {
                $dataBahanJMF = BahanJMF::where('request_id', $id)->delete();
                for ($i = 0; $i < count($request->bahan_jmf); $i++) {
                    BahanJMF::create([
                        'request_id' => $dataRequest->id,
                        'bahan_jmf' => $request->bahan_jmf[$i],
                        'volume' => $request->volume_jmf[$i],
                        'satuan' => $request->satuan_jmf[$i],
                    ]);
                }
            }
            if ($request->jenis_peralatan) {
                $dataPeralatan = Peralatan::where('request_id', $id)->delete();
                for ($i = 0; $i < count($request->jenis_peralatan); $i++) {
                    Peralatan::create([
                        'request_id' => $dataRequest->id,
                        'jenis_peralatan' => $request->jenis_peralatan[$i],
                        'jumlah' => $request->jumlah_peralatan[$i],
                        'satuan' => $request->satuan_peralatan[$i],
                    ]);
                }
            }
            if ($request->tenaga_kerja) {
                $dataTenagaKerja = TenagaKerja::where('request_id', $id)->delete();
                for ($i = 0; $i < count($request->tenaga_kerja); $i++) {
                    TenagaKerja::create([
                        'request_id' => $dataRequest->id,
                        'tenaga_kerja' => $request->tenaga_kerja[$i],
                        'jumlah' => $request->jumlah_tenaga_kerja[$i],
                    ]);
                }
            }
            $this->createHistoryStatus($dataRequest->id, 1);
            DB::commit();
            return redirect()->route('request.index')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $e) {
            DB::rollback();
            dd($e);
            return redirect()->route('request.index')->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function approval(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'approval' => 'required',
                'role' => 'required',
            ]);

            if ($validator->fails()) {
                dd($validator->errors());
                return back()->withErrors($validator)->withInput();
            }
            $data = BackendRequest::find($id);
            if ($request->approval == 1 && $request->role == 'dirlap') {
                $data->status = 3;
                $data->respon_dirlap = $request->catatan ? $request->catatan : 'Tidak ada catatan';
                $data->save();
                $this->createHistoryStatus($id, 3);
            }
            if ($request->approval == 0 && $request->role == 'dirlap') {
                $data->status = 2;
                $data->respon_dirlap = $request->catatan;
                $data->save();
                $this->createHistoryStatus($id, 4);
            }
            if ($request->approval == 1 && $request->role == 'ppk') {
                $data->status = 5;
                $data->respon_ppk = $request->catatan ? $request->catatan : 'Tidak ada catatan';
                $data->save();
                $this->createHistoryStatus($id, 6);
            }
            if ($request->approval == 0 && $request->role == 'ppk') {
                $data->status = 4;
                $data->respon_ppk = $request->catatan;
                $data->save();
                $this->createHistoryStatus($id, 5);
            }
            return back()->with('success', 'Data berhasil diubah');
        } catch (\Throwable $e) {
            dd($e);
            return back()->with('error', 'Gagal menyimpan data')->withInput();
        }
    }
    public function revisi(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'status' => 'required',
                'keterangan' => 'required',
            ]);

            if ($validator->fails()) {
                dd($validator->errors());
                return back()->withErrors($validator)->withInput();
            }
            $data = BackendRequest::find($request->id);
            if ($request->revisi == 1) {
                $data->status = 1;
                $data->respon_ppk = $request->catatan ? $request->catatan : '-';
                $data->save();
                $this->createHistoryStatus($request->id, 1);
            } else {
                $data->status = 0;
                $data->respon_ppk = $request->catatan;
                $data->save();
                $this->createHistoryStatus($request->id, 3);
            }
            return back()->with('success', 'Data berhasil diubah');
        } catch (\Throwable $e) {
            dd($e);
            return back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function file($file_name)
    {
        $path = 'app/' . $this->PATH_FILE_DB . $file_name;
        $file = storage_path($path);
        if (!file_exists($file)) {
            abort(404);
        }
        return response()->file($file);
    }

    public function sendRequestApi($id)
    {
        $data = BackendRequest::find($id);
        $data->status = 1;
        $data->save();
        $this->createHistoryStatus($id, 3);
        return back()->with('success', 'Data berhasil dikirim');
    }


    public function printReqeust($id)
    {
        $data = BackendRequest::where('id', $id)->with('historyStatus')->with('historyRequest')->with('detailBahan')->with('detailPeralatan')->with('detailTenagaKerja')->with('detailBahanJMF')->with('jadual')->with('dataUmumDetail')->first();
        $jadual = Jadual::where('data_umum_detail_id', $data->dataUmumDetail->id)->get(); 
        $pdf = PDF::loadView('admin.request.show', compact('data', 'jadual'));
        return view('admin.request.print', compact('data', 'jadual'));
        return $pdf->stream('request.pdf');

    }

    private function createHistoryStatus($id, $status)
    {

        if ($status == 0) {
            $keterangan = 'Request sudah dibuat';
        }
        if ($status == 1) {
            $keterangan = 'Request dirubah / direvisi';
        }
        if ($status == 2) {
            $keterangan = 'Request dikirim ke DIRLAP';
        }
        if ($status == 3) {
            $keterangan = 'Request dilanjutkan ke PPK';
        }
        if ($status == 4) {
            $keterangan = 'Request ditolak dan dikembalikan kepada Admin Uptd Oleh DIRLAP';
        }
        if ($status == 5) {
            $keterangan = 'Request ditolak dan dikembalikan kepada Admin Uptd Oleh PPK';
        }
        if ($status == 6) {
            $keterangan = 'Request diterima oleh PPK';
        }
        HistoryStatusRequest::create([
            'user_id' => Auth::user()->id,
            'request_id' => $id,
            'keterangan' => $keterangan,
        ]);
    }

    private  function createHistoryRequest($id, $input)
    {
        HistoryRequest::create([
            'user_id' => Auth::user()->id,
            'request_id' => $id,
            'keterangan' => $input['keterangan'],
            'status' => $input['status'],
        ]);
    }
}
