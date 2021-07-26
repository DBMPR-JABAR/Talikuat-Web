<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\MasterJenisPekerjaan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MasterJenisPekerjaanController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MasterJenisPekerjaan::get();
        return view('admin.data_utama.master_jenis_pekerjaan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.data_utama.master_jenis_pekerjaan.form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $validator = Validator::make($request->all(), [
            'kd_jenis_pekerjaan'=> 'required | unique:master_jenis_pekerjaan',
            'jenis_pekerjaan'=> 'required',
            'satuan'=> 'required',
        ]);
        if ($validator->fails()) {
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $temp =([
            'kd_jenis_pekerjaan'=>$request->kd_jenis_pekerjaan,
            'jenis_pekerjaan'=>$request->jenis_pekerjaan,
            'satuan'=>$request->satuan,
            'created_by'=>Auth::user()->id,

        ]);
        $ppk = MasterJenisPekerjaan::create($temp);

        if($ppk){
            return redirect()->route('masterjenispekerjaan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else
            return redirect()->route('masterjenispekerjaan.index')->with(['danger' => 'Data Gagal Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MasterJenisPekerjaan::find($id);
        return view('admin.data_utama.master_jenis_pekerjaan.show', compact('data'));
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
        $data = MasterJenisPekerjaan::find($id);
        return view('admin.data_utama.master_jenis_pekerjaan.form',compact('data'));
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
        //
     
        $validator = Validator::make($request->all(), [
           
            'kd_jenis_pekerjaan' => Rule::unique('master_jenis_pekerjaan', 'kd_jenis_pekerjaan')->ignore($id),
            'jenis_pekerjaan'=> 'required',
            'satuan'=> 'required',
        ]);
        if ($validator->fails()) {
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        
        $update_jenis_pekerjaan = MasterJenisPekerjaan::firstOrNew(['id'=> $id]);
        $update_jenis_pekerjaan->kd_jenis_pekerjaan= $request->kd_jenis_pekerjaan;
        $update_jenis_pekerjaan->jenis_pekerjaan= $request->jenis_pekerjaan;
        $update_jenis_pekerjaan->satuan= $request->satuan;
        $update_jenis_pekerjaan->updated_by= Auth::user()->id;
        $update_jenis_pekerjaan->save();
       
        if($update_jenis_pekerjaan){
            // dd($update_jenis_pekerjaan);
            return redirect()->route('masterjenispekerjaan.index')->with(['success' => 'Data Berhasil Di Perbaharui!']);
        }else
            return redirect()->route('masterjenispekerjaan.index')->with(['danger' => 'Data Gagal Di Perbaharui!']);

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
    public function trash()
    {
        //
        $data = MasterJenisPekerjaan::where('is_delete',1)->get();
        // dd($data);
        return view('admin.data_utama.master_jenis_pekerjaan.index', compact('data'));

    }
    public function move_to_trash($desc, $id)
    {
        //

        $user = MasterJenisPekerjaan::find($id);
        if($desc == 'restore'){
            $user->is_delete = null;
            $message = 'Data Berhasil Dikembalikan! ';
        }elseif($desc == 'move_to_trash'){
            $user->is_delete = 1;
            $message = 'Data Berhasil di Pindahkan! ';
        }
        $user->save();
        if($user){
            return back()->with(['success'=>$message]);
        }
        // dd($data);
       
    }
}
