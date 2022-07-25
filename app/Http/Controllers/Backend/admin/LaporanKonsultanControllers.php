<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\DataUmum;
use App\Models\Backend\LaporanKonsultan;
use App\Models\Backend\HistoryLaporanKonsultan;
use Illuminate\Support\Facades\Validator;

class LaporanKonsultanControllers extends Controller
{
    private $PATH_FILE_DB = "public/lampiran/laporan_konsultan";
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
            $data = DataUmum::where('id_uptd', $uptd)->latest()->with('uptd','laporanKonsultan','detail')->get();
           
            
        }elseif($role == 2 || $role == 15){
            $data = DataUmum::latest()->whereHas('detail', function($query){
                $query->where('ppk_id', Auth::user()->user_detail->id);
            })->with('uptd','laporanKonsultan','detail')->with('uptd')->get();
            
            
        }elseif($role == 14){
            $data = DataUmum::where('id_uptd', $uptd)->latest()->whereHas('detail', function($query){
                $query->where('dirlap_id', Auth::user()->user_detail->id);
            })->with('uptd','laporanKonsultan','detail')->get();   
           
            
        }elseif($role == 5||$role == 7|| $role == 8 || $role==9){   $data = DataUmum::where('id_uptd', $uptd)->latest()->whereHas('detail', function($query){
            $query->where('konsultan_id', Auth::user()->user_detail->konsultan_id);
        })->with('uptd','laporanKonsultan','detail')->get();  
        } else {
            $data = DataUmum::latest()->with('uptd','laporanKonsultan','detail')->get();
        }
        
       
        return view("admin.laporan_konsultan.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $dataUmum = DataUmum::where('id', $id)->with('detail')->with('laporanKonsultan')->first();
        $count = $dataUmum->laporanKonsultan->count()+1;
        $totalMinggu=$dataUmum->detail->lama_waktu / 7;
        $totalMinggu =(int)ceil($totalMinggu);
        $tgl = $count == 1 ? $dataUmum->tgl_spmk : $dataUmum->laporanKonsultan->last()->tgl_end;
        $getTgl = $this->getTgl($tgl, $count);
        
        $count = $count." / ".$totalMinggu .' Tanggal '.$getTgl[0].' s/d '.$getTgl[1];
 
      
        return view("admin.laporan_konsultan.create", compact('dataUmum','count','totalMinggu','getTgl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
       'data_umum_id'=> 'required',
       'rencana'=> 'required',
        'realisasi'=> 'required',
        'deviasi'=> 'required',
        'priode'=> 'required',
        'file_path'=> 'required',
        'tgl_start'=> 'required',
        'tgl_end'=> 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = str_replace('/home/www/talikuat/storage/app/', '', $request->file_path);
        LaporanKonsultan::create([
            'data_umum_id'=> $request->data_umum_id,
            'rencana'=> $request->rencana,
            'realisasi'=> $request->realisasi,
            'deviasi'=> $request->deviasi,
            'priode'=> $request->priode,
            'file_path'=> $file,
            'tgl_start'=> $request->tgl_start,
            'tgl_end'=> $request->tgl_end,
        ]);

        return redirect()->route('laporan-minggguan-konsultan.index')->with('success', 'Data berhasil ditambahkan');

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
    
        $data = LaporanKonsultan::where('id', $id)->with('dataUmum')->first();
        return view("admin.laporan_konsultan.edit", compact('data'));
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
        $validator = Validator::make($request->all(), [
            'rencana'=> 'required',
            'realisasi'=> 'required',
            'deviasi'=> 'required',
            'priode'=> 'required',
            'file_path'=> 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = LaporanKonsultan::find($id);

        if (strtotime('+2hours',strtotime($data->created_at)) > time()) {
            $file = str_replace('/home/www/talikuat/storage/app/', '', $request->file_path);
            LaporanKonsultan::where('id', $id)->update([
                'rencana'=> $request->rencana,
                'realisasi'=> $request->realisasi,
                'deviasi'=> $request->deviasi,
                'priode'=> $request->priode,
                'file_path'=> $file,
                
            ]);
            if($data->file_path != $file){
               $keterangan = 'File Laporan Mingguan Konsultan diubah';
            }elseif($data->rencana != $request->rencana){
                $keterangan = 'Rencana Konsultan diubah';
            }elseif($data->realisasi != $request->realisasi){
                $keterangan = 'Realisasi Konsultan diubah';
            }elseif($data->deviasi != $request->deviasi){
                $keterangan = 'Deviasi Konsultan diubah';
            }else{
                $keterangan = 'Data Laporan Mingguan Konsultan diubah semua';
            }

            HistoryLaporanKonsultan::create([
                'laporan_konsultan_id'=> $id,
                'data_umum_id'=> $data->data_umum_id,
                'rencana'=> $request->rencana,
                'realisasi'=> $request->realisasi,
                'deviasi'=> $request->deviasi,
                'priode'=> $request->priode,
                'file_path'=> $file,
                'tgl_start'=> $data->tgl_start,
                'tgl_end'=> $data->tgl_end,
                'keterangan'=> $keterangan,
            ]);
            return redirect()->route('laporan-minggguan-konsultan.index')->with('success', 'Data berhasil diubah');
        }
        return redirect()->route('laporan-minggguan-konsultan.index')->with('error', 'Data tidak dapat diubah karena sudah lebih dari 2 jam dari waktu pembuatan');

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

    public function showFile($path)
    {
        $file = storage_path('app/'.$path);
        return response()->file($file);
    }

    private  function getTgl($tgl, $minggu){
        if ($minggu == 1) {
            $tglStart = strtotime($tgl);
        }else{
            $tglStart = strtotime($tgl);
            $tglStart = strtotime("+1 day", $tglStart);
        }
       
        $tglEnd = strtotime("+6 day", $tglStart);
        $tglEnd = date('d-m-Y', $tglEnd);
        $tglStart = date('d-m-Y', $tglStart);
        return [$tglStart, $tglEnd];
    }
}
