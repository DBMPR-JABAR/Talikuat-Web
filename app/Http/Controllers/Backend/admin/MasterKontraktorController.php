<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\MasterKontraktor;
use App\Models\Backend\MasterKontraktorGs as KontraktorGs;
use App\Models\Backend\User as User;
use App\Models\Backend\UserProfiles as UserProfiles;
use App\Models\Backend\UserDetail as UserDetail;
use App\Models\Backend\UserRule as UserRule;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'npwp' => 'unique:master_kontraktor',
            'nama'=> 'required',
            'alamat'=> 'required',
            'telp'=> 'required',
            'nama_direktur'=> 'required',
            'bank'=> 'required',
            'no_rek'=> 'required',
        ]);
        if ($validator->fails()) {
            storeLogActivity(declarLog(1, 'Kontraktor', $request->nama.': '.$validator->messages()->first()));
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
            if(count($request->nm_gs) >=1){
                for($x=0; $x<count($request->nm_gs); $x++){
                    if($request->nm_gs[$x] != null){
                        $save_gs = KontraktorGs::create([
                            'kontraktor_id'=> $kontraktor->id,
                            'gs'=> $request->nm_gs[$x],
                            'created_by'=>Auth::user()->id,
                        ]);
                    }
                }
                
            }
            storeLogActivity(declarLog(1, 'Kontraktor', $kontraktor->nama, 1));
            return redirect()->route('masterkontraktor.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            storeLogActivity(declarLog(1, 'Kontraktor', $request->nama));
            return redirect()->route('masterkontraktor.index')->with(['danger' => 'Data Gagal Disimpan!']);
        }
    }
    public function store_gs(Request $request)
    {
        
        $user = User::select('name','email','password','id')->where('email', $request->email_gs)->first();
        if($user){
            if(!$user->user_detail){
                $validator = Validator::make($request->all(), [
                    'email_gs' => 'email|required|string',
                    'password_gs' => 'min:8|required_with:password_confirmation_gs|same:password_confirmation_gs',
                    'password_confirmation_gs' => 'min:8',
                    'name_gs'=> 'required',
                    'no_tlp_gs'=> '',
                ]);

            }else{
                storeLogActivity(declarLog(1, 'General Superintendent', $request->email_gs.': The email has already been taken'));
                return back()->with(['error' => 'The email has already been taken.']);
            }
        }else{
            $validator = Validator::make($request->all(), [
                'email_gs' => 'unique:db_users_dbmpr.users,email',
                'password_gs' => 'min:8|required_with:password_confirmation_gs|same:password_confirmation_gs',
                'password_confirmation_gs' => 'min:8',
                'name_gs'=> 'required',
                'no_tlp_gs'=> '',
            ]);
        }
        if ($validator->fails()) {
            storeLogActivity(declarLog(1, 'General Superintendent', $request->email_gs.': '.$validator->messages()->first()));
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        // dd($request->no_tlp_gs);

        $create_user_gs = User::firstOrNew(['email'=> $request->email_gs]);
        $create_user_gs->name = $request->input('name_gs');
        $create_user_gs->password = Hash::make($request->input('password_gs'));
        $create_user_gs->role = 'internal';
        $create_user_gs->save();

        $create_profile_gs = UserProfiles::firstOrNew(['user_id'=> $create_user_gs->id]);
        $create_profile_gs->nama = $request->input('name_gs');
        $create_profile_gs->no_tlp = $request->input('no_tlp_gs');
        $create_profile_gs->created_by = Auth::user()->id;
        $create_profile_gs->save();

        $create_detail_gs = UserDetail::firstOrNew([
            'user_id'=> $create_user_gs->id,
            'rule_user_id'=>11
        ]);
        $create_detail_gs->kontraktor_id = $request->company;
        $create_detail_gs->rule_user_id = 11;
        $create_detail_gs->save();
        $create_user_gs->user_rule()->attach(11);
        
        $save_gs = KontraktorGs::create([
            'kontraktor_id'=>$request->company,
            'gs_user_id'=>$create_user_gs->id,
            'created_by'=>Auth::user()->id,
        ]);
        if($save_gs){
            // dd($update_konsultan);
            storeLogActivity(declarLog(1, 'General Superintendent', $save_gs->kontraktor->nama, 1));
            return back()->with(['success' => 'GS Berhasil Di Tambahkan!']);
        }else{
            storeLogActivity(declarLog(1, 'General Superintendent', ' '));
            return back()->with(['danger' => 'GS Gagal Di Tambahkan!']);
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
        $data = MasterKontraktor::find($id);
        $data_pengguna = $data->user_detail_gsc->where('rule_user_id','!=',11);

        return view('admin.data_utama.master_kontraktor.show', compact('data','data_pengguna'));
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
        $data_details = $data->kontraktor_gs->toArray();
        $data_pengguna = $data->user_detail_gsc->where('rule_user_id','!=',11);
        $data_user = UserDetail::where('kontraktor_id',$id)->where('is_delete',null)->get();
        // dd($data_pengguna);
        return view('admin.data_utama.master_kontraktor.form',compact('data','data_details','data_pengguna','data_user'));
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
            'npwp' => Rule::unique('master_kontraktor', 'npwp')->ignore($id),
            'nama'=> 'required',
            'alamat'=> 'required',
            'telp'=> 'required',
            'nama_direktur'=> '',
            'bank'=> 'required',
            'no_rek'=> 'required',
        ]);
        if ($validator->fails()) {
            storeLogActivity(declarLog(2, 'Kontraktor', $request->nama.': '.$validator->messages()->first()));
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
            storeLogActivity(declarLog(2, 'Kontraktor', $update_kontraktor->nama, 1));
            return redirect()->route('masterkontraktor.index')->with(['success' => 'Data Berhasil Di Perbaharui!']);
        }else{
            storeLogActivity(declarLog(2, 'Kontraktor', ' '));

            return redirect()->route('masterkontraktor.index')->with(['danger' => 'Data Gagal Di Perbaharui!']);
        }

    }

    public function update_gs(Request $request, $id)
    {
        //
        $delete_detail = KontraktorGs::where('kontraktor_id', $id)->whereNotIn('id', $request->id_gs)->get();
        // dd($delete_detail);
        if(count($delete_detail)>=1)
            $delete_detail->each->delete();
        
        $jumlah_data = KontraktorGs::orderBy('id', 'DESC')->first();
        // dd(array_count_values($request->nm_gs));
        for($d=0; $d<count($request->nm_gs) ;$d++){
            $count_request = count(array_keys($request->nm_gs, $request->nm_gs[$d]));
            if($count_request > 1){
                storeLogActivity(declarLog(2, 'General Superintendent', 'Swap GS - '.$request->nm_gs[$d]));
                return back()->with(['error' => 'User General Superintendent Tidak Boleh Duplicate!']);
            }
        }
        // dd($request->nm_gs);
        for($y=0; $y<count($request->nm_gs) ;$y++){
            if($request->nm_gs[$y] != null ){
                if(isset($request->id_gs[$y])){
                    $id_gs = $request->id_gs[$y];
                }else{
                    $jumlah_data->id+=1;
                    $id_gs = $jumlah_data->id;   
                }
                $update_details = KontraktorGs::firstOrNew([
                    'id'=> $id_gs,
                    'kontraktor_id'=> $id,
                ]);
                $update_details->gs_user_id = $request->nm_gs[$y];
                $update_details->updated_by=Auth::user()->id;
                $update_details->save();
            }
        }

        if($update_details){
            // dd($update_konsultan);
            storeLogActivity(declarLog(2, 'General Superintendent', $update_details->kontraktor->nama ,1));
            return back()->with(['success' => 'Data Berhasil Di Perbaharui!']);
        }else{
            storeLogActivity(declarLog(2, 'General Superintendent', ''));
            return back()->with(['error' => 'Data Gagal Di Perbaharui!']);
        }

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

        $kontraktor = MasterKontraktor::find($id);
        if($desc == 'restore'){
            $kontraktor->is_delete = null;
            $message = 'Data Berhasil Dikembalikan! ';
            storeLogActivity(declarLog(4, 'Kontraktor', $kontraktor->nama,1));

        }elseif($desc == 'move_to_trash'){
            $kontraktor->is_delete = 1;
            $message = 'Data Berhasil di Pindahkan! ';
            storeLogActivity(declarLog(3, 'Kontraktor', $kontraktor->nama,1));
        }
        $kontraktor->save();
        if($kontraktor){
            return back()->with(['success'=>$message]);
        }
        // dd($data);
       
    }
    public function trash_gs()
    {
        //
        $data = KontraktorGs::where('is_delete',1)->get();
        $company = MasterKontraktor::all()->where('is_delete','!=',1);

        // dd($data);
        return view('admin.user.gs.index', compact('data','company'));

    }
    public function move_to_trash_gs($desc, $id)
    {
        //
        $gs = KontraktorGs::find($id);
        $kontraktor = MasterKontraktor::find($id);
        $message = 'Somethink When Wrong!';
        if($desc == 'restore'){
            // dd($gs);
            $gs->is_delete = null;
            $gs->user_gs_detail->update(['is_delete'=>null]);
            $message = 'Data Berhasil Dikembalikan!';
            storeLogActivity(declarLog(4, 'General Superintendent', $gs->kontraktor->nama,1));

        }elseif($desc == 'move_to_trash_gs'){
            $gs->is_delete = 1;
            $gs->user_gs_detail->update(['is_delete'=>1]);
            $message = 'Data Berhasil di Hapus!';
            storeLogActivity(declarLog(3, 'General Superintendent', $gs->kontraktor->nama,1));
        }

        $gs->save();
        if($gs){
            return back()->with(['success'=>$message]);
        }
        // dd($data); 
    }
}
