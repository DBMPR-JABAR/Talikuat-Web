<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\BahanJMF;
use App\Models\Backend\BahanMaterial;
use App\Models\Backend\DataUmum;
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
        $data = BackendRequest::with('historyStatus')->with('historyRequest')->with('detailBahan')->with('detailPeralatan')->with('detailTenagaKerja')->with('detailBahanJMF')->with('dataUmum')->get();
        dd($data);
        return view('admin.request.index', compact('data'));
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
                dd($validator->errors());
                return back()->withErrors($validator)->withInput();
            }

            if (!$request->bahan_material) {
                $validator = Validator::make($request->all(), [
                    'volume_material' => 'required',
                    'satuan_material' => 'required',
                ]);
            }

            if (!$request->bahan_jmf) {
                $validator = Validator::make($request->all(), [
                    'volume_jmf' => 'required',
                    'satuan_jmf' => 'required',
                ]);
            }
            if (!$request->jenis_peralatan) {
                $validator = Validator::make($request->all(), [
                    'jumlah_peralatan' => 'required',
                    'satuan_peralatan' => 'required',
                ]);
            }

            if (!$request->tenaga_kerja) {
                $validator = Validator::make($request->all(), [
                    'jumlah_tenaga_kerja' => 'required',
                ]);
            }

            if ($validator->fails()) {
                dd($validator->errors());
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
                'keterangan' => $request->keterangan,
                'file_shopdrawing' => $fileName,
            ]);

            $jadual = Jadual::find($request->jadual_id);
            $jadual->volume_terrequest = (float) $jadual->volume_terrequest + (float) $request->volume;
            $jadual->save();
            Storage::putFileAs($this->PATH_FILE_DB, $file, $fileName);


            if (!$request->bahan_material) {
                for ($i = 0; $i < count($request->bahan_material); $i++) {
                    BahanMaterial::create([
                        'request_id' => $dataRequest->id,
                        'bahan_material' => $request->bahan_material[$i],
                        'volume' => $request->volume_material[$i],
                        'satuan' => $request->satuan_material[$i],
                    ]);
                }
            }
            if (!$request->bahan_jmf) {
                for ($i = 0; $i < count($request->bahan_jmf); $i++) {
                    BahanJMF::create([
                        'request_id' => $dataRequest->id,
                        'bahan_jmf' => $request->bahan_jmf[$i],
                        'volume' => $request->volume_jmf[$i],
                        'satuan' => $request->satuan_jmf[$i],
                    ]);
                }
            }
            if (!$request->jenis_peralatan) {
                for ($i = 0; $i < count($request->jenis_peralatan); $i++) {
                    Peralatan::create([
                        'request_id' => $dataRequest->id,
                        'jenis_peralatan' => $request->jenis_peralatan[$i],
                        'jumlah' => $request->jumlah_peralatan[$i],
                        'satuan' => $request->satuan_peralatan[$i],
                    ]);
                }
            }
            if (!$request->tenaga_kerja) {
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
            dd($e);
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

    private function createHistoryStatus($id, $status,)
    {

        if ($status == 0) {
            $keterangan = 'Request sudah dibuat oleh';
        }
        if ($status == 1) {
            $keterangan = 'Request sudah dikirim kepada';
        }
        if ($status == 3) {
            $keterangan = 'Request sudah dikirim kepada PPK';
        }
        HistoryStatusRequest::create([
            'user_id' => Auth::user()->id,
            'request_id' => $id,
            'status' => $status,
            'keterangan' => $keterangan,
        ]);
    }
}
