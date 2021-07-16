<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use App\Models\Backend\User as User;
use App\Models\Backend\UserProfiles as UserProfiles;
use App\Models\Backend\UserDetail as UserDetail;
use App\Models\Backend\UserRule as UserRule;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Carbon\Carbon;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = UserDetail::all();
        // dd($data);
        return view('admin.user.index',compact('data'));
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
        //
        $validator = Validator::make($request->all(), [
            'email' => 'unique:db_users_dbmpr.users',
            'password'   => 'confirmed',
            'name'=> 'required',
            'no_tlp'=> '',
        ]);
        if ($validator->fails()) {
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $create_user = User::firstOrNew(['email'=> $request->email]);
        $create_user->name = $request->input('name');
        $create_user->password = Hash::make($request->input('password'));
        $create_user->save();

        $create_profile = UserProfiles::firstOrNew(['user_id'=> $create_user->id]);
        $create_profile->nama = $request->input('name');
        $create_profile->no_tlp = $request->input('no_tlp');
        $create_profile->created_by = Auth::user()->id;

        $create_profile->save();

        $create_detail = UserDetail::firstOrNew(['user_id'=> $create_user->id])->save();

        return redirect(route('user.index'))->with(['success'=>'Berhasil Menambahkan User!!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(request()->segment(2) == 'profile'){
            if($id != Auth::user()->id){
                return back()->with(['error'=>'Somethink when wrong']);
            }
        }
        $rule_user = UserRule::all();
        $data = User::where('id',$id)->first();
        return view('admin.user.show',compact('data','rule_user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($desc, $id)
    {
        //
        if($desc == 'edit'){
            if($id != Auth::user()->id){
                return back()->with(['error'=>'Somethink when wrong']);
            }
        }
        $data = User::find($id);
        // dd($data);
        return view('admin.user.form',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$desc ,$id)
    {
        //
        if($desc == 'account'){
            $validator = Validator::make($request->all(), [
                'email' => Rule::unique('db_users_dbmpr.users', 'email')->ignore($id),
                'password'   => 'confirmed'
            ]);
            if ($validator->fails()) {
                return back()->with(['error'=>$validator->messages()->first()]);
            }

            if($request->input('password') != ""){
                $data['password']     = Hash::make($request->input('password'));
            }else if($request->input('email') == Auth::user()->email){
                return back()->with(['warning'=>'Tidak ada data yang dirubah!']);
            }
            $data['email'] = $request->input('email');
            $success = "Akun Berhasil Diupdate!";
            $failed = "Akun Gagal Diupdate!";
            $update_user = User::find($id)->update($data);

        }else if($desc == 'profiles'){
            $this->validate($request,[
                'nama'=> 'required',
                'tgl_lahir'=> 'required',
                'tmp_lahir'=> 'required',
                'jenis_kelamin'=> 'required',
                'no_tlp'=> 'numeric|digits_between:8,13',
                'no_tlp_rumah'=> '',
                'sup_id'=> '',
                'tgl_mulai_kerja'=> '',
                'sekolah'=> '',
                'jejang'=> '',
                'jurusan_pendidikan'=> '',
                'provinsi'=> '',
                'kota'=> '',
                'kode_pos'=> '',
                'alamat'=> '',
                'agama'=> 'required',
            ]);
            // dd($id);
            $update_user = UserProfiles::firstOrNew(['user_id'=> $id]);

            if($request->nik == null && $request->nip == null){
                return back()->with(['warning'=>'NIP / NIK salah satu wajib di isi!']);
            }
            if($request->nik != null)
                $validator = Validator::make($request->all(), ['nik' => Rule::unique('db_users_dbmpr.user_profiles', 'nik')->ignore($update_user->id)]);
            
            if($request->nip != null)
                $validator = Validator::make($request->all(), ['nip' => Rule::unique('db_users_dbmpr.user_profiles', 'nip')->ignore($update_user->id)]);
            
            if ($validator->fails())
                return back()->with(['error'=>$validator->messages()->first()]);
            
            $update_user->nama = $request->input('nama');
            $update_user->nip = $request->input('nip');
            $update_user->nik = $request->input('nik');
            $update_user->tgl_lahir = $request->input('tgl_lahir');
            $update_user->tmp_lahir = $request->input('tmp_lahir');
            $update_user->agama = $request->input('agama');
            $update_user->jenis_kelamin = $request->input('jenis_kelamin');
            $update_user->no_tlp = $request->input('no_tlp');
            $update_user->no_tlp_rumah = $request->input('no_tlp_rumah');
            $update_user->tgl_mulai_kerja = $request->input('tgl_mulai_kerja');
            $update_user->sekolah = $request->input('sekolah');
            $update_user->jejang = $request->input('jejang');
            $update_user->jurusan_pendidikan = $request->input('jurusan_pendidikan');
            $update_user->province_id = $request->input('provinsi');
            $update_user->city_id = $request->input('kota');
            $update_user->kode_pos = $request->input('kode_pos');
            $update_user->alamat = $request->input('alamat');
            $update_user->save();
            $success = "Profil Berhasil Diupdate!";
            $failed = "Profil Gagal Diupdate!";
            $update = User::find($id);
            $update->name = $request->input('nama');
            $update->save();

        }
        if($update_user){
            //redirect dengan pesan sukses
            if(!Auth::user()->user_detail->account_verified_at){
                Auth::logout();
                return redirect('/')->with(['success'=>'Data Berhasil Disimpan, Selanjutnya Hubungi Admin Untuk Verifikasi Akun']); 
            }
            return back()->with(['success'=>$success]);
        }else{
            //redirect dengan pesan error
            return back()->with(['error'=>$faile]);
        }
    }

    public function updateaccount(Request $request, $id)
    {
        //
        if($id != Auth::user()->id){
            $color = "error";
            $msg = "Somethink when wrong!";
            return back()->with(compact('color', 'msg'));
            // return redirect('admin/user/profile/'. auth()->user()->id)->with(['error' => 'Somethink when wrong!']);
        }else{
   
            $datai=["email" => Auth::user()->email,
                    "password" => $request->input('password_lama')];
            $exist =Auth::attempt($datai);
            // dd($exist);
            if($exist){
                $validator = Validator::make($request->all(), [
                    'email' => Rule::unique('db_users_dbmpr.users', 'email')->ignore($id),
                    'password'   => 'confirmed'
                ]);
                if ($validator->fails()) {
                    return redirect(route('profile', $id))->with(['error'=>$validator->messages()->first()]);
                }

                if($request->input('password') != ""){
                    $data['password']     = Hash::make($request->input('password'));
                }else if($request->input('email') == Auth::user()->email){
                    return redirect(route('profile', $id))->with(['warning'=>'Tidak ada data yang dirubah!']);

                }
                $useraccount['email'] = $request->input('email');
                // dd($useraccount);
                $updateaccount = User::find($id)->update($useraccount);
                if($updateaccount){
                    //redirect dengan pesan sukses
                       
                    return redirect(route('profile', $id))->with(['success'=>'Akun Berhasil Diupdate!']);
                }else{
                    //redirect dengan pesan error
                   
                    return redirect(route('profile', $id))->with(['error'=>'Akun Gagal Diupdate!']);
                }
            }else{
                
                return back()->with(['error'=>'Password Lama Salah']);
            }
            
            
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
    public function verified_account(Request $request, $id)
    {
        
        $this->validate($request,[
            'verified'=> 'required',
            'rule_user'=> 'required', 
        ]);
        $update_detail = UserDetail::firstOrNew(['user_id'=> $id]);
        $update_detail->rule_user_id = $request->rule_user;
        if($request->verified == 1)
            $update_detail->account_verified_at = Carbon::now()->toDateTimeString();
        
        $update_detail->save();
        if($update_detail){
            return redirect(route('user.index'))->with(['success'=>'Account Has Been Verified!']);
        }
            
    }
    
}
