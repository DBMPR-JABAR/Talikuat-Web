<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\MasterKonsultan;
use App\Models\Backend\MasterKonsultanFt as KonsultanFt;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class MasterKonsultanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MasterKonsultan::all()->where('is_delete','!=',1);
        return view('admin.data_utama.master_konsultan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->nm_ie);
        $validator = Validator::make($request->all(), [
            'nama'=> 'required',
            'alamat'=> 'required',
            'nama_direktur'=> 'required',
           
        ]);
        if ($validator->fails()) {
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $temp =([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'nama_direktur'=>$request->nama_direktur,
            'created_by'=>Auth::user()->id,
        ]);
        $konsultan = MasterKonsultan::create($temp);

        if($konsultan){
            if(count($request->nm_ie) >=1){
                for($x=0; $x<count($request->nm_ie); $x++){
                    if($request->nm_se[$x] != null || $request->nm_ie[$x] != null){
                        $save_ft = KonsultanFt::create([
                            'konsultan_id'=> $konsultan->id,
                            'se'=> $request->nm_se[$x],
                            'ie'=> $request->nm_ie[$x],
                            'created_by'=>Auth::user()->id,
                        ]);
                    }
                }
                
            }
            return redirect()->route('masterkonsultan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else
            return redirect()->route('masterkonsultan.index')->with(['danger' => 'Data Gagal Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MasterKonsultan::find($id);

        // dd($data->konsultan_ft);
        return view('admin.data_utama.master_konsultan.show',compact('data'));
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
        $data = MasterKonsultan::find($id);
        $data_details = $data->konsultan_ft->toArray();
        return view('admin.data_utama.master_konsultan.form',compact('data','data_details'));
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
            'nama'=> 'required',
            'alamat'=> 'required',
            'nama_direktur'=> 'required',
        ]);
        if ($validator->fails()) {
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        
        $update_konsultan = MasterKonsultan::firstOrNew(['id'=> $id]);
        $update_konsultan->nama= $request->nama;
        $update_konsultan->alamat= $request->alamat;
        $update_konsultan->nama_direktur= $request->nama_direktur;
        $update_konsultan->updated_by= Auth::user()->id;
        $update_konsultan->save();
       
        if($update_konsultan){
            // dd($update_konsultan);
            return back()->with(['success' => 'Data Berhasil Di Perbaharui!']);
        }else
            return back()->with(['danger' => 'Data Gagal Di Perbaharui!']);

    }

    public function update_ft(Request $request, $id)
    {
        //
        $delete_detail = KonsultanFt::where('konsultan_id', $id)->whereNotIn('id', $request->id_ft)->get();
        // dd($delete_detail);
        if(count($delete_detail)>=1)
            $delete_detail->each->delete();
        
        $jumlah_data = KonsultanFt::orderBy('id', 'DESC')->first();
        
        for($y=0; $y<count($request->nm_se) ;$y++){
            if($request->nm_se[$y] != null || $request->nm_ie[$y] != null){
                if(isset($request->id_ft[$y])){
                    $id_ft = $request->id_ft[$y];
                }else{
                
                    $jumlah_data->id+=1;
                    $id_ft = $jumlah_data->id;  
                   
                }
                $update_details = KonsultanFt::firstOrNew([
                    'id'=> $id_ft,
                    'konsultan_id'=> $id,
                ]);
                $update_details->se = $request->nm_se[$y];
                $update_details->ie = $request->nm_ie[$y];
                $update_details->created_by=Auth::user()->id;
                $update_details->save();
            }
        }

        if($update_details){
            // dd($update_konsultan);
            return back()->with(['success' => 'Data Berhasil Di Perbaharui!']);
        }else
            return back()->with(['danger' => 'Data Gagal Di Perbaharui!']);

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
        $data = MasterKonsultan::where('is_delete',1)->get();
        // dd($data);
        return view('admin.data_utama.master_konsultan.index', compact('data'));

    }
    public function move_to_trash($desc, $id)
    {
        //

        $konsultan = MasterKonsultan::find($id);
        if($desc == 'restore'){
            $konsultan->is_delete = null;
            $message = 'Data Berhasil Dikembalikan! ';
        }elseif($desc == 'move_to_trash'){
            $konsultan->is_delete = 1;
            $message = 'Data Berhasil di Pindahkan! ';
        }
        $konsultan->save();
        if($konsultan){
            return back()->with(['success'=>$message]);
        }
        // dd($data);
       
    }
}
