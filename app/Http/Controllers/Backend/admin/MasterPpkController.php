<?php

namespace App\Http\Controllers\Backend\admin;

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

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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
        $this->authorize('viewUserPpk', Auth::user());
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
        // $validator = Validator::make($request->all(), [
        //     'nama'=> 'required',
        //     'alamat'=> 'required',
        // ]);
        // if ($validator->fails()) {
        //     return back()->with(['error'=>$validator->messages()->first()]);
        // }
        // $temp =([
        //     'nama'=>$request->nama,
        //     'alamat'=>$request->alamat,
        //     'created_by'=>Auth::user()->id,

        // ]);
        // $ppk = MasterPpk::create($temp);

        $user = User::select('name','email','password','id')->where('email', $request->email)->first();
        // dd($user);
        if($user){
            if(!$user->user_detail){
                $validator = Validator::make($request->all(), [
                    'email' => 'email|required|string',
                    'password' => 'confirmed',
                    'name'=> 'required',
                    'no_tlp'=> '',
                    'unit'=> 'required',
                    
                ]);

            }else{
                storeLogActivity(declarLog(1, 'PPK', $request->email));
                return back()->with(['error' => 'The email has already been taken.']);
            }
        }else{
            $validator = Validator::make($request->all(), [
                'email' => 'email|required|string|unique:db_users_dbmpr.users',
                'password' => 'confirmed',
                'name'=> 'required',
                'no_tlp'=> '',
                'unit'=> 'required',

            ]);
        }
        if ($validator->fails()) {
            storeLogActivity(declarLog(1, 'PPK', $request->email.' '.$validator->messages()->first()));
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $create_ppk = User::firstOrNew(['email'=> $request->email]);
        $create_ppk->name = $request->input('name');
        $create_ppk->password = Hash::make($request->input('password'));
        $create_ppk->role = 'internal';
        $create_ppk->save();

        $create_profile = UserProfiles::firstOrNew(['user_id'=> $create_ppk->id]);
        $create_profile->nama = $request->input('name');
        $create_profile->no_tlp = $request->input('no_tlp');
        $create_profile->created_by = Auth::user()->id;
        $create_profile->save();

        $create_detail = UserDetail::firstOrNew(['user_id'=> $create_ppk->id]);
        $create_detail->rule_user_id = 2;
        $create_detail->save();
        $create_detail->ppk()->create([
            'uptd_id' => $request->input('unit'),
            'nama' => $request->input('name'),    
            
            'created_by' => Auth::user()->id    
        ]);
        if($create_ppk){
            storeLogActivity(declarLog(1, 'PPK', $request->email,1 ));
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
        // $data = MasterPpk::find($id);
        // return view('admin.data_utama.master_ppk.show', compact('data'));
        $rule_user = UserRule::all();
        $uptd = Uptd::all();
        $data_ppk = MasterPpk::find($id);
        $data = $data_ppk->user_detail->user;
        // dd($data->user_detail->kontraktor);
        return view('admin.user.show',compact('data','rule_user','uptd'));
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
        $data_ppk = MasterPpk::find($id);
        // return view('admin.data_utama.master_ppk.form',compact('data'));
        $data = $data_ppk->user_detail->user;
        $kontraktors = MasterKontraktor::all();
        $konsultans = MasterKonsultan::all();
        $rule_user = UserRule::all();
        $uptd = Uptd::all();

        // dd($data->user_detail->kontraktor);
        // dd($data);
        return view('admin.data_utama.master_ppk.form',compact('data','kontraktors','konsultans','rule_user','uptd'));
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
