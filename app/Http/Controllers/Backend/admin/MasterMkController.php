<?php

namespace App\Http\Controllers\Backend\admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\User as User;
use App\Models\Backend\UserProfiles as UserProfiles;
use App\Models\Backend\UserDetail as UserDetail;
use App\Models\Backend\UserRule as UserRule;
use App\Models\Backend\Uptd as Uptd;
use App\Models\Backend\MasterKontraktor;
use App\Models\Backend\MasterKontraktorGs as KontraktorGs;
use App\Models\Backend\MasterKonsultan;
use App\Models\Backend\MasterKonsultanFt as KonsultanFt;
use App\Models\Backend\MasterAdmin;
use App\Models\Backend\MasterPpk;
use App\Models\Backend\MasterMk;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class MasterMkController extends Controller
{
    //
    public function index()
    {
        //
        $data = MasterMk::all()->where('is_delete','!=',1);
        return view('admin.data_utama.master_mk.index',compact('data'));
        
    }
    public function index_user()
    {
        //
        $data = UserDetail::where('is_delete',null)->where('rule_user_id',12)->get();
        // dd($data);
        return view('admin.user.mk.index',compact('data'));
    }
    public function store(Request $request)
    {
        
        // dd($request->nm_ie);
        $validator = Validator::make($request->all(), [
            'nama'=> 'required',
            'alamat'=> 'required',
            'nama_direktur'=> '',
            'npwp' => 'unique:master_mk',
           
        ]);
        if ($validator->fails()) {
            storeLogActivity(declarLog(1, 'Manajemen Konstruksi', $request->nama));

            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $temp =([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'nama_direktur'=>$request->nama_direktur,
            'npwp'=>$request->npwp,
            'created_by'=>Auth::user()->id,
        ]);
        $konsultan = MasterMk::create($temp);

        if($konsultan){
            storeLogActivity(declarLog(1, 'Manajemen Konstruksi', $request->nama, 1));
            return redirect()->route('mastermk.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            storeLogActivity(declarLog(1, 'Manajemen Konstruksi', $request->nama));
            return redirect()->route('mastermk.index')->with(['danger' => 'Data Gagal Disimpan!']);
        }
    }
    public function store_user(Request $request, $id)
    {
        //
        // dd($request->unit);
        $user = User::select('name','email','password','id')->where('email', $request->email)->first();
        if($user){
            if(!$user->user_detail){
                $validator = Validator::make($request->all(), [
                    'email' => 'email|required|string',
                    'password' => 'confirmed',
                    'name'=> 'required',
                    'no_tlp'=> '',
                    
                    'rule'=> 'required'
                ]);

            }else{
                storeLogActivity(declarLog(1, 'Users MK', $request->email));
                return back()->with(['error' => 'The email has already been taken.']);
            }
        }else{
            $validator = Validator::make($request->all(), [
                'email' => 'email|required|string|unique:db_users_dbmpr.users',
                'password' => 'confirmed',
                'name'=> 'required',
                'no_tlp'=> '',
                
                'rule'=> 'required'
            ]);
        }
        if($request->rule == 13)
            $validator = Validator::make($request->all(), ['unit' => 'required']);

        if ($validator->fails()) {
            storeLogActivity(declarLog(1, 'Users MK', $request->email.' '.$validator->messages()->first()));
            return back()->with(['error'=>$validator->messages()->first()]);
        }

        $create_user = User::firstOrNew(['email'=> $request->email]);
        $create_user->name = $request->input('name');
        $create_user->password = Hash::make($request->input('password'));
        $create_user->role = 'internal';
        $create_user->save();

        $create_profile = UserProfiles::firstOrNew(['user_id'=> $create_user->id]);
        $create_profile->nama = $request->input('name');
        $create_profile->no_tlp = $request->input('no_tlp');
        $create_profile->created_by = Auth::user()->id;
        $create_profile->save();

        $create_detail = UserDetail::firstOrNew(['user_id'=> $create_user->id]);
        $create_detail->rule_user_id = $request->rule;
        $create_detail->mk_id = $id;
        $create_detail->created_by = Auth::user()->id;
        $create_detail->save();
        if($request->rule == 13){
            for($x = 0 ; $x< count($request->unit) ; $x++){
                $temp_unit=['uptd_id' => $request->unit[$x]];
                $create_detail->lists_uptd()->updateOrCreate($temp_unit);
            }
            $create_detail->lists_uptd()->whereNotIn('uptd_id',$request->unit)->delete();
            $create_master_admin = MasterAdmin::firstOrNew(['user_detail_id'=> $create_detail->id]);
            $create_master_admin->nama = $request->input('name');
            $create_master_admin->created_by = Auth::user()->id;
            $create_master_admin->save();
        }
        storeLogActivity(declarLog(1, 'Users MK', $request->email,1 ));
        return back()->with(['success'=>'Berhasil Menambahkan User!!']);
    }
    public function edit($id)
    {
        //
        $data = MasterMk::find($id);
        // dd($data_pengguna);
        return view('admin.data_utama.master_mk.form',compact('data'));
    }
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'nama'=> 'required',
            'alamat'=> 'required',
            'telp'=> 'required',
            'nama_direktur'=> '',
            'npwp' => Rule::unique('master_mk', 'npwp')->ignore($id),

        ]);
        if ($validator->fails()) {
            storeLogActivity(declarLog(2, 'Manajemen Konstruksi', $request->nama));

            return back()->with(['error'=>$validator->messages()->first()]);
        }
        
        $update_mk = MasterMk::firstOrNew(['id'=> $id]);
        $before = $update_mk->nama;
        $update_mk->nama= $request->nama;
        $update_mk->alamat= $request->alamat;
        $update_mk->nama_direktur= $request->nama_direktur;
        $update_mk->telp= $request->telp;
        $update_mk->npwp= $request->npwp;
        $update_mk->updated_by= Auth::user()->id;
        $update_mk->save();
       
        if($update_mk){
            // dd($update_mk);
            storeLogActivity(declarLog(2, 'Manajemen Konstruksi', $request->nama, 1));
            return back()->with(['success' => 'Data Berhasil Di Perbaharui!']);
        }else{
            storeLogActivity(declarLog(2, 'Manajemen Konstruksi', $request->nama));
            return back()->with(['danger' => 'Data Gagal Di Perbaharui!']);
        }

    }
}
