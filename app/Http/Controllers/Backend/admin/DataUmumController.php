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
            'nilai_kontrak'=> 'required',
            'no_spmk'=> 'required',
            'tgl_spmk'=> 'required',            
            'ppk_kegiatan'=> 'required',
            
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
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $temp =([
            
            'pemda'=> 'required',
            'opd'=> 'required',
            'uptd_id'=> 'required',
            'kategori_paket_id'=> 'required',
            'nm_paket'=> 'required',
            'no_kontrak'=> 'required',
            'nilai_kontrak'=> 'required',
            'no_spmk'=> 'required',
            'tgl_spmk'=> 'required',            
            'ppk_kegiatan'=> 'required',
            'kontraktor_id'=> 'required',                        
            'konsultan_id'=> 'required',                        
        ]);
        $ppk = MasterJenisPekerjaan::create($temp);

        if($ppk){
            return redirect()->route('masterjenispekerjaan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else
            return redirect()->route('masterjenispekerjaan.index')->with(['danger' => 'Data Gagal Disimpan!']);
    
    }
}
