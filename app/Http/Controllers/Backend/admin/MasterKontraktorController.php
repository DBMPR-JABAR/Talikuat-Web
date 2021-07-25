<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\MasterKontraktor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;



class MasterKontraktorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MasterKontraktor::all()->where('is_delete','!=',1);
        return view('admin.data_utama.master_kontraktor.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.data_utama.master_kontraktor.form');

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
            'npwp' => 'unique:master_penyedia_jasa',
            'nama'=> 'required',
            'alamat'=> 'required',
            'telp'=> 'required',
            'nama_direktur'=> 'required',
            'bank'=> 'required',
            'no_rek'=> 'required',
        ]);
        if ($validator->fails()) {
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $temp =([
            'npwp' => $request->npwp,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'telp'=>$request->telp,
            'nama_direktur'=>$request->nama_direktur,
            'bank'=>$request->bank,
            'no_rek'=>$request->no_rek,
            'created_by'=>Auth::user()->id,

        ]);
        $kontraktor = MasterKontraktor::create($temp);

        if($kontraktor){
            return redirect()->route('masterkontraktor.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else
            return redirect()->route('masterkontraktor.index')->with(['danger' => 'Data Gagal Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MasterKontraktor::find($id);
        return view('admin.data_utama.master_kontraktor.show', compact('data'));
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
        $data = MasterKontraktor::find($id);
        return view('admin.data_utama.master_kontraktor.form',compact('data'));
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
     
         $validator = Validator::make($request->all(), [
            'npwp' => Rule::unique('master_penyedia_jasa', 'npwp')->ignore($id),
            'nama'=> 'required',
            'alamat'=> 'required',
            'telp'=> 'required',
            'nama_direktur'=> 'required',
            'bank'=> 'required',
            'no_rek'=> 'required',
        ]);
        if ($validator->fails()) {
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        
        $update_kontraktor = MasterKontraktor::firstOrNew(['id'=> $id]);
        $update_kontraktor->npwp=  $request->npwp;
        $update_kontraktor->nama= $request->nama;
        $update_kontraktor->alamat= $request->alamat;
        $update_kontraktor->telp= $request->telp;
        $update_kontraktor->nama_direktur= $request->nama_direktur;
        $update_kontraktor->bank= $request->bank;
        $update_kontraktor->no_rek= $request->no_rek;
        $update_kontraktor->updated_by= Auth::user()->id;
        $update_kontraktor->save();
       
        if($update_kontraktor){
            // dd($update_kontraktor);
            return redirect()->route('masterkontraktor.index')->with(['success' => 'Data Berhasil Di Perbaharui!']);
        }else
            return redirect()->route('masterkontraktor.index')->with(['danger' => 'Data Gagal Di Perbaharui!']);

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
        $data = MasterKontraktor::where('is_delete',1)->get();
        // dd($data);
        return view('admin.data_utama.master_kontraktor.index', compact('data'));

    }
    public function move_to_trash($desc, $id)
    {
        //

        $user = MasterKontraktor::find($id);
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
