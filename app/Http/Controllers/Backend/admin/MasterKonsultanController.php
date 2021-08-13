<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\MasterKonsultan;
use App\Models\Backend\MasterKonsultanFt as KonsultanFt;
use App\Models\Backend\User as User;
use App\Models\Backend\UserProfiles as UserProfiles;
use App\Models\Backend\UserDetail as UserDetail;
use App\Models\Backend\UserRule as UserRule;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $data_user = UserDetail::where('konsultan_id',$id)->where('is_delete',null)->get();
        // $data_pengguna = $data->user_detail->where('rule_user_id','!=',7)->where('rule_user_id','!=',8);
        $data_pengguna = $data->user_detail_sec->where('rule_user_id','!=',7)->where('rule_user_id','!=',8);
        // dd($data_pengguna->where('rule_user_id',9)->first()->user);
       
        // dd($data->user_detail_sec);

        return view('admin.data_utama.master_konsultan.form',compact('data','data_details','data_user','data_pengguna'));
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
    public function store_ft_first($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email_se' => 'unique:db_users_dbmpr.users,email',
            'password_se' => 'min:8|required_with:password_confirmation_se|same:password_confirmation_se',
            'password_confirmation_se' => 'min:8',
            'name_se'=> 'required',
            'no_tlp_se'=> '',
            'email_ie' => 'unique:db_users_dbmpr.users,email',
            'password_ie' => 'min:8|required_with:password_confirmation_ie|same:password_confirmation_ie',
            'password_confirmation_ie' => 'min:8',
            'name_ie'=> 'required',
            'no_tlp_ie'=> '',
        ]);
        if ($validator->fails()) {
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        
        // dd($id);

        $create_user_se = User::firstOrNew(['email'=> $request->email_se]);
        $create_user_se->name = $request->input('name_se');
        $create_user_se->password = Hash::make($request->input('password_se'));
        $create_user_se->role = 'internal';
        $create_user_se->save();

        $create_profile_se = UserProfiles::firstOrNew(['user_id'=> $create_user_se->id]);
        $create_profile_se->nama = $request->input('name_se');
        $create_profile_se->no_tlp = $request->input('no_tlp_se');
        $create_profile_se->created_by = Auth::user()->id;
        $create_profile_se->save();

        $create_detail_se = UserDetail::firstOrNew([
            'user_id'=> $create_user_se->id,
            'rule_user_id'=>7
        ]);
        $create_detail_se->konsultan_id = $id;
        $create_detail_se->rule_user_id = 7;

        $create_detail_se->save();

        $create_user_se->user_rule()->attach(7);

        $create_user_ie = User::firstOrNew(['email'=> $request->email_ie]);
        $create_user_ie->name = $request->input('name_ie');
        $create_user_ie->password = Hash::make($request->input('password_ie'));
        $create_user_ie->role = 'internal';
        $create_user_ie->save();
        
        $create_profile_ie = UserProfiles::firstOrNew(['user_id'=> $create_user_ie->id]);
        $create_profile_ie->nama = $request->input('name_ie');
        $create_profile_ie->no_tlp = $request->input('no_tlp_ie');
        $create_profile_ie->created_by = Auth::user()->id;
        $create_profile_ie->save();

        // $create_detail_ie = UserDetail::firstOrNew(['user_id'=> $create_user_ie->id])->save();
        $create_detail_ie = UserDetail::firstOrNew([
            'user_id'=> $create_user_ie->id, 
            'rule_user_id'=>8
        ]);
        $create_detail_ie->konsultan_id = $id;
        $create_detail_ie->rule_user_id = 8;
        $create_detail_ie->save();

        $create_user_ie->user_rule()->attach(8);
        
        $save_ft = KonsultanFt::create([
            'konsultan_id'=>$id,
            'se_user_id'=>$create_user_se->id,
            'ie_user_id'=>$create_user_ie->id,
            'created_by'=>Auth::user()->id,
        ]);
        if($save_ft){
            // dd($update_konsultan);
            return back()->with(['success' => 'FT Berhasil Di Tambahkan!']);
        }else
            return back()->with(['danger' => 'FT Gagal Di Tambahkan!']);
    }

    public function store_ft(Request $request, $id)
    {
        $storage = $this->store_ft_first($request, $id);
        return $storage;
    }
    public function store_ft_Second(Request $request)
    {
        $storage = $this->store_ft_first($request, $request->company);
        return $storage;
        
    }
    public function update_ft(Request $request, $id)
    {
        //
        $delete_detail = KonsultanFt::where('konsultan_id', $id)->whereNotIn('id', $request->id_ft)->get();
        // dd($delete_detail);
        if(count($delete_detail)>=1)
            $delete_detail->each->delete();
        
        $jumlah_data = KonsultanFt::orderBy('id', 'DESC')->first();
        // dd(array_count_values($request->nm_se));
        for($d=0; $d<count($request->nm_se) ;$d++){
            $count_request = count(array_keys($request->nm_se, $request->nm_se[$d]));
            if($count_request > 1)
            return back()->with(['error' => 'User Site Engineering Tidak Boleh Duplicate!']);
        }
        for($d=0; $d<count($request->nm_ie) ;$d++){
            $count_request = count(array_keys($request->nm_ie, $request->nm_ie[$d]));
            if($count_request > 1)
            return back()->with(['error' => 'User Inspection Engineering Tidak Boleh Duplicate!']);
        }
        for($y=0; $y<count($request->nm_se) ;$y++){
            if($request->nm_se[$y] != null && $request->nm_ie[$y] != null){
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
                $update_details->se_user_id = $request->nm_se[$y];
                $update_details->ie_user_id = $request->nm_ie[$y];
                $update_details->created_by=Auth::user()->id;
                $update_details->save();
            }
        }

        if($update_details){
            // dd($update_konsultan);
            return back()->with(['success' => 'Data Berhasil Di Perbaharui!']);
        }else
            return back()->with(['error' => 'Data Gagal Di Perbaharui!']);

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
    public function trash_ft()
    {
        //
        $data = KonsultanFt::where('is_delete',1)->get();
        // dd($data);
        return view('admin.user.fieldteam.index', compact('data'));

    }
    public function move_to_trash_ft($desc, $id)
    {
        //
        $ft = KonsultanFt::find($id);
   
        $konsultan = MasterKonsultan::find($id);
        if($desc == 'restore'){
            $ft->is_delete = null;
            $ft->user_se_detail->update(['is_delete'=>null]);
            $ft->user_ie_detail->update(['is_delete'=>null]);

            $message = 'Data Berhasil Dikembalikan! ';
        }elseif($desc == 'move_to_trash_ft'){
            $ft->is_delete = 1;
            $ft->user_se_detail->update(['is_delete'=>1]);
            $ft->user_ie_detail->update(['is_delete'=>1]);
            $message = 'Data Berhasil di Hapus! ';
        }
        $ft->save();
        if($ft){
            return back()->with(['success'=>$message]);
        }
        // dd($data); 
    }
}
