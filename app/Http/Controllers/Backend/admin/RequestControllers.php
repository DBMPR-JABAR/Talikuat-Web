<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\DataUmum;
use App\Models\Backend\DataUmumDetail;
use App\Models\Backend\Jadual;
use App\Models\Backend\Request as BackendRequest;
use Illuminate\Http\Request;
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
        return view('admin.request.index');
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
                'file_shop_drawing' => 'required|file|mimes:pdf',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $file = $request->file('file_shop_drawing');
            $fileName =  time() . "_" . $file->getClientOriginalName();
            DB::beginTransaction();
            BackendRequest::create([
                'data_umum_detail_id' => $request->data_umum_detail_id,
                'jadual_id' => $request->jadual_id,
                'lokasi_sta' => $request->lokasi_sta,
                'volume' => $request->volume,
                'tgl_request' => $request->tgl_diajukan,
                'tgl_dikerjakan' => $request->tgl_dikerjakan,
                'file_shopdrawing' => $fileName,
                'status' => $request->draf ?? 0,
                'keterangan' => $request->keterangan,
            ]);

            if (!$request->bahan) {
            }
            if (!$request->jmf) {
            }
            if (!$request->peralatan) {
            }
            if (!$request->pekerja) {
            }



            Storage::putFileAs($this->PATH_FILE_DB, $file, $fileName);
        } catch (\Throwable $th) {
            //throw $th;
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
