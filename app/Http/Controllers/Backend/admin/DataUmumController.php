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
        ]);
        if ($validator->fails()) {
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $temp =([
            
            'opd'=>$request->opd,
            'uptd_id'=>$request->uptd_id,
            'created_by'=>Auth::user()->id,

        ]);
        $ppk = MasterJenisPekerjaan::create($temp);

        if($ppk){
            return redirect()->route('masterjenispekerjaan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else
            return redirect()->route('masterjenispekerjaan.index')->with(['danger' => 'Data Gagal Disimpan!']);
    
    }
}
