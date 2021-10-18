<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\DataUmum;



class DataUmumController extends Controller
{
    //
    public function index()
    {
        //
        $data = DataUmum::orderBy('unor','ASC')->orderBy('created_at','ASC')->get();
        return view('admin.input_data.data_umum.index',compact('data'));
    }
    public function create()
    {
        //
        
        $data =[];
        // dd($data);
        return view('admin.input_data.data_umum.form',compact('data'));
    }
    public function store(Request $request)
    {

        dd("ok");
        $validator = Validator::make($request->all(), [
            'pemda'=> 'required',
            'opd'=> 'required',
            'uptd_id'=> 'required',
            'kategori_paket_id'=> 'required',
            'nm_paket'=> 'required',
            'no_kontrak'=> 'required',
            'no_spmk'=> 'required',
            'tgl_spmk'=> 'required',            
            'ppk_kegiatan'=> 'required',
            
            'nilai_kontrak'=> 'required',
            'kontraktor_id'=> 'required',                        
            'konsultan_id'=> 'required',       
            'ft_id'=> 'required',                        
            'gs_user_id'=> 'required',                        
            'ppk_user_id'=> 'required',  
            
            'ruas_jalan_id'=> 'required',  
            'tgl_kontrak'=> 'required',  
            'panjang_km'=> 'required',  
            'lama_waktu'=> 'required',  

        ]);
        if ($validator->fails()) {
            storeLogActivity(declarLog(1, 'Data Umum', $request->input('no_kontrak').' '.$validator->messages()->first()));
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $temp =([
            'pemda'=> $request->input('pemda'),
            'opd'=> $request->input('opd'),
            'uptd_id'=> $request->input('uptd_id'),
            'kategori_paket_id'=> $request->input('kategori_paket_id'),
            'nm_paket'=> $request->input('nm_paket'),
            'no_kontrak'=> $request->input('no_kontrak'),
            'no_spmk'=> $request->input('no_spmk'),
            'tgl_spmk'=> $request->input('tgl_spmk'),            
            'ppk_kegiatan'=> $request->input('ppk_kegiatan'),  
            'created_by' => Auth::user()->id,
        ]);
        $data_umum = DataUmum::create($temp);
        $data_umum->detail()->create([
            'kontraktor_id'=> $request->input('kontraktor_id'),                        
            'konsultan_id'=> $request->input('konsultan_id'),       
            'ft_id'=> $request->input('ft_id'),                        
            'gs_user_id'=> $request->input('gs_user_id'),                        
            'ppk_user_id'=> $request->input('ppk_user_id'),
            'nilai_kontrak'=> $request->input('nilai_kontrak'),
            'tanggal'=> $request->input('tanggal'),  
            'panjang_km'=> $request->input('panjang_km'),  
            'lama_waktu'=> $request->input('lama_waktu'), 
            'is_active'=> 1, 
            'created_by' => Auth::user()->id,
        ]);
        for($i =0 ; $i<count($request->id_ruas_jalan) ; $i++){
            if($request->id_ruas_jalan[$i] && $request->segment_jalan[$i] && $request->lat_awal[$i]&& $request->long_awal[$i]&& $request->lat_akhir[$i]&& $request->long_akhir[$i]){
                $data_umum->ruas()->create([
                    'id_ruas_jalan'=> $request->id_ruas_jalan[$i],  
                    'segment_jalan'=> $request->segment_jalan[$i],  
                    'lat_awal'=> $request->lat_awal[$i],  
                    'long_awal'=> $request->long_awal[$i],  
                    'lat_akhir'=> $request->lat_akhir[$i],  
                    'long_akhir'=> $request->long_akhir[$i],  
                ]);
            }
        }
        if($data_umum){
            storeLogActivity(declarLog(1, 'Data Umum', $request->input('no_kontrak'),1 ));

            return redirect()->route('masterjenispekerjaan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else
            return redirect()->route('masterjenispekerjaan.index')->with(['danger' => 'Data Gagal Disimpan!']);
    
    }
}
