<?php

namespace App\Http\Controllers\Backend\admin;
use App\Models\Backend\MasterPpk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class MasterPpkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MasterPpk::all()->where('is_delete','!=',1);
        return view('admin.data_utama.master_ppk.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.data_utama.master_ppk.form');

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
        $validator = Validator::make($request->all(), [
            'nama'=> 'required',
            'alamat'=> 'required',
        ]);
        if ($validator->fails()) {
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $temp =([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'created_by'=>Auth::user()->id,

        ]);
        $ppk = MasterPpk::create($temp);

        if($ppk){
            return redirect()->route('masterppk.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else
            return redirect()->route('masterppk.index')->with(['danger' => 'Data Gagal Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MasterPpk::find($id);
        return view('admin.data_utama.master_ppk.show', compact('data'));
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
        $data = MasterPpk::find($id);
        return view('admin.data_utama.master_ppk.form',compact('data'));
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
            'nama'=> 'required',
            'alamat'=> 'required',
        ]);
        if ($validator->fails()) {
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        
        $update_ppk = MasterPpk::firstOrNew(['id'=> $id]);
        $update_ppk->nama= $request->nama;
        $update_ppk->alamat= $request->alamat;
        $update_ppk->updated_by= Auth::user()->id;
        $update_ppk->save();
       
        if($update_ppk){
            // dd($update_ppk);
            return redirect()->route('masterppk.index')->with(['success' => 'Data Berhasil Di Perbaharui!']);
        }else
            return redirect()->route('masterppk.index')->with(['danger' => 'Data Gagal Di Perbaharui!']);

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
        $data = MasterPpk::where('is_delete',1)->get();
        // dd($data);
        return view('admin.data_utama.master_ppk.index', compact('data'));

    }
    public function move_to_trash($desc, $id)
    {
        //

        $user = MasterPpk::find($id);
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
