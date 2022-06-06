<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use App\Imports\JadualImport;
use App\Models\Backend\JadualDetail;
use App\Models\Backend\DataUmum;
use App\Models\Backend\DataUmumDetail;
use App\Models\Backend\Jadual;
use App\Models\TempFileJadual;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;
use stdClass;

class JadualControllers extends Controller
{
    private $PATH_FILE_DB = "public/lampiran/jadual/";
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
            $data = DataUmum::where('id_uptd', $uptd)->latest()->with('detail')->with('uptd')->get();
        }elseif($role == 2 || $role == 15){
            $data = DataUmum::latest()->whereHas('detail', function($query){
                $query->where('ppk_id', Auth::user()->user_detail->id);
            })->with('detail')->with('uptd')->get();
        }elseif($role == 14){
            $data = DataUmum::where('id_uptd', $uptd)->latest()->whereHas('detail', function($query){
                $query->where('dirlap_id', Auth::user()->user_detail->id);
            })->with('uptd')->get();   
        } else {
            $data = DataUmum::latest()->with('detail')->with('uptd')->get();
        }

        return view('admin.input_data.jadual.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   

        $data = DataUmum::where([[
            'id', $id
        ]])->with('kategori_paket')->with('uptd')->with('detail')->first();


        $file = TempFileJadual::where([[
            'data_umum_detail_id', $data->detail->$id
        ]])->first();
        if ($file) {
            Storage::delete($this->PATH_FILE_DB . $file->file_name);
            $file->delete();
        }

        if($data->fileJadual->first() != null){
            return view('admin.input_data.jadual.create', compact('data'));
        }else{
            return redirect()->route('upload.dataumum', $id)->with(['error' => 'File Jadual Belum Diupload']);
        }
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
                'data_umum_detail_id' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $getFile = TempFileJadual::where('data_umum_detail_id', $request->data_umum_detail_id)->first();
            $file = storage_path('app/' . $this->PATH_FILE_DB . $getFile->file_name);
            $list_jadual = Excel::toCollection(new JadualImport, $file);
            $data_umum = DataUmumDetail::where('id', $request->data_umum_detail_id)->where('is_active', 1)->first();
            DB::beginTransaction();
            foreach ($list_jadual as $val) {
                $val[0]['tanggal'] = Carbon::createFromTimestamp(Date::excelToTimestamp($val[0]['tanggal']));
                $val[0]['tanggal'] = date('Y-m-d', strtotime($val[0]['tanggal']));
                
                $jadual =  Jadual::create([
                    'data_umum_detail_id' => $request->data_umum_detail_id,
                    'nmp' => $val[0]['no_mata_pembayaran'],
                    'uraian' => $val[0]['uraian'],
                    'satuan' => $val[0]['satuan'],
                    'total_harga' => $val[0]['jumlah_harga_rp'],
                    'bobot' => $val[0]['bobot'],
                    'koefisien' => $val[0]['koefisien'],
                    'total_volume' => number_format($val[0]['volume'], 2, '.', '')
                ]);
                foreach ($val as $item) {
                    if (!is_string($item['tanggal'])) {
                        $item['tanggal'] = Carbon::createFromTimestamp(Date::excelToTimestamp($item['tanggal']));
                        $item['tanggal'] = date('Y-m-d', strtotime($item['tanggal']));
                    }
                    if ($item['no_mata_pembayaran'] != null) {
                        JadualDetail::create([
                            'jadual_id' => $jadual->id,
                            'nmp' => $item['no_mata_pembayaran'],
                            'uraian' => $item['uraian'],
                            'tanggal' => $item['tanggal'],
                            'satuan' => $item['satuan'],
                            'harga_satuan' => $item['harga_satuan_rp'],
                            'bobot' => $item['bobot'],
                            'koefisien' => $item['koefisien'],
                            'nilai' => $item['nilai'],
                            'volume' => $item['volume'],
                        ]);
                    }
                   
                }
            }
             $data_umum->update([
                 'jadual' => 'Jadual Sudah Diinput'
             ]);
            
            Storage::delete($this->PATH_FILE_DB . $getFile->file_name);
            $getFile->delete();
            DB::commit();
            return redirect()->route('jadual.index')->with('success', 'Data berhasil diinput');
        } catch (\Throwable $e) {
            DB::rollback();
            dd($e);
            return redirect()->back()->withErrors($e->getMessage());
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
        $data = DataUmum::where(
            'id',
            $id
        )->with('kategori_paket')->with('uptd')->with('detail')->first();

        $jadualDB = Jadual::where('data_umum_detail_id', $data->detail->id)->with('detail')->get();
        $jadualDetail = new stdClass();
        $jadualDetail->data_umum = $data;
        $jadualDetail->curva = [];
        foreach ($jadualDB as $val) {
            array_push($jadualDetail->curva, $val->detail);
        }
        return view('admin.input_data.jadual.show', compact('data', 'jadualDetail'));
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

    public function deleteFile($id)
    {
        $data = TempFileJadual::where('data_umum_detail_id', $id)->first();
        Storage::delete($this->PATH_FILE_DB . $data->file_name);
        $data->delete();
        return redirect()->route('jadual.create', $id);
    }
}
