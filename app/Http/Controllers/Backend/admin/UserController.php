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
        $this->authorize('viewAllUser', User::class);
        $data = UserDetail::where('is_delete', null)->get();
        // foreach($data as $no){
        //     print_r($no->user->name.', '.$no->user->id);
        //     echo "<br>";
        // }
        // dd($data);

        return view('admin.user.index', compact('data'));
    }
    public function index_dirlap()
    {
        //
        $this->authorize('viewUserDirlap', User::class);
        $data = UserDetail::where('is_delete', null)->where('rule_user_id', 14)->get();

        return view('admin.user.dirlap.index', compact('data'));
    }
    public function index_ft()
    {
        //
        $this->authorize('viewUserFt', Auth::user());
        $company = MasterKonsultan::all()->where('is_delete', '!=', 1);

        $data = KonsultanFt::where('is_delete', null)->get();
        // dd($data);
        return view('admin.user.fieldteam.index', compact('data', 'company'));
    }
    public function index_gs()
    {
        //
        $this->authorize('viewUserGs', Auth::user());
        $company = MasterKontraktor::all()->where('is_delete', '!=', 1);
        $data = KontraktorGs::where('is_delete', null)->get();
        // dd($data);
        return view('admin.user.gs.index', compact('data', 'company'));
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
        $user = User::select('name', 'email', 'password', 'id')->where('email', $request->email)->first();
        // dd($user);
        if ($user) {
            if (!$user->user_detail) {
                $validator = Validator::make($request->all(), [
                    'email' => 'email|required|string',
                    'password' => 'confirmed',
                    'name' => 'required',
                    'no_tlp' => '',
                    'unit' => '',
                    'rule' => 'required',

                ]);
            } else {
                storeLogActivity(declarLog(1, 'Users', $request->email));
                return back()->with(['error' => 'The email has already been taken.']);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'email' => 'email|required|string|unique:db_users_dbmpr.users',
                'password' => 'confirmed',
                'name' => 'required',
                'no_tlp' => '',
                'unit' => '',
                'rule' => 'required'
            ]);
        }
        if ($validator->fails()) {
            storeLogActivity(declarLog(1, 'Users', $request->email . ' ' . $validator->messages()->first()));
            return back()->with(['error' => $validator->messages()->first()]);
        }
        // dd($request->unit);
        $create_user = User::firstOrNew(['email' => $request->email]);
        $create_user->name = $request->input('name');
        $create_user->password = Hash::make($request->input('password'));
        $create_user->role = 'internal';
        $create_user->save();

        $create_profile = UserProfiles::firstOrNew(['user_id' => $create_user->id]);
        $create_profile->nama = $request->input('name');
        $create_profile->no_tlp = $request->input('no_tlp');
        $create_profile->created_by = Auth::user()->id;

        $create_profile->save();

        $create_detail = UserDetail::firstOrNew(['user_id' => $create_user->id]);
        $create_detail->rule_user_id = $request->rule;
        $create_detail->uptd_id = $request->unit;
        $create_detail->save();
        storeLogActivity(declarLog(1, 'Users', $request->email, 1));

        return back()->with(['success' => 'Berhasil Menambahkan User!!']);
    }
    public function store_konsultan(Request $request, $id)
    {
        //
        $user = User::select('name', 'email', 'password', 'id')->where('email', $request->email)->first();
        // dd($user);
        if ($user) {
            if (!$user->user_detail) {
                $validator = Validator::make($request->all(), [
                    'email' => 'email|required|string',
                    'password' => 'confirmed',
                    'name' => 'required',
                    'no_tlp' => '',
                    'rule' => 'required',

                ]);
            } else {
                storeLogActivity(declarLog(1, 'User Konsultan', $request->email . ': The email has already been taken'));
                return back()->with(['error' => 'The email has already been taken.']);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'email' => 'email|required|string|unique:db_users_dbmpr.users',
                'password' => 'confirmed',
                'name' => 'required',
                'no_tlp' => '',
                'rule' => 'required',
            ]);
        }
        if ($validator->fails()) {
            storeLogActivity(declarLog(1, 'User Konsultan', $request->email . ': ' . $validator->messages()->first()));
            return back()->with(['error' => $validator->messages()->first()]);
        }
        // dd($request->rule);
        $create_user = User::firstOrNew(['email' => $request->email]);
        $create_user->name = $request->input('name');
        $create_user->password = Hash::make($request->input('password'));
        $create_user->role = 'internal';
        $create_user->save();

        $create_profile = UserProfiles::firstOrNew(['user_id' => $create_user->id]);
        $create_profile->nama = $request->input('name');
        $create_profile->no_tlp = $request->input('no_tlp');
        $create_profile->created_by = Auth::user()->id;

        $create_profile->save();

        $create_detail = UserDetail::firstOrNew(['user_id' => $create_user->id]);
        $create_detail->rule_user_id = $request->rule;
        $create_detail->konsultan_id = $id;
        $create_detail->save();
        storeLogActivity(declarLog(1, 'User Konsultan', $create_detail->konsultan->nama . ': ' . $request->email . ' as ' . $create_detail->rule->rule, 1));

        return back()->with(['success' => 'Berhasil Menambahkan User!!']);
    }
    public function store_kontraktor(Request $request, $id)
    {
        //

        $user = User::select('name', 'email', 'password', 'id')->where('email', $request->email)->first();
        if ($user) {
            if (!$user->user_detail) {
                $validator = Validator::make($request->all(), [
                    'email' => 'email|required|string',
                    'password' => 'confirmed',
                    'name' => 'required',
                    'no_tlp' => '',
                    'rule' => 'required',
                ]);
            } else {
                storeLogActivity(declarLog(1, 'User Kontraktor', $request->email . ': The email has already been taken'));
                return back()->with(['error' => 'The email has already been taken.']);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'email' => 'email|required|string|unique:db_users_dbmpr.users',
                'password' => 'confirmed',
                'name' => 'required',
                'no_tlp' => '',
                'rule' => 'required',
            ]);
        }
        if ($request->rule == 10) {
            $validator = Validator::make($request->all(), ['unit_kontraktor' => 'required']);
            if ($id)
                $kontraktor_temp = MasterKontraktor::where('id', $id)->pluck('nama')->first();

            if (UserDetail::where('kontraktor_id', $id)->where('rule_user_id', 10)->count() >= 6) {
                storeLogActivity(declarLog(1, 'Users Admin Kontraktor', $request->email . '. Slot Admin Kontraktor ' . $kontraktor_temp . ' Sudah Penuh'));
                return back()->with(['error' => 'Slot Admin Kontraktor ' . $kontraktor_temp . ' Tersebut Sudah Penuh!!']);
            } else if (UserDetail::where('kontraktor_id', $id)->where('rule_user_id', 10)->where('uptd_id', $request->unit_kontraktor)->exists()) {
                storeLogActivity(declarLog(1, 'Users Admin Kontraktor', $request->email . '. Kontraktor ' . $kontraktor_temp . ' di UPTD ' . $request->unit_kontraktor . ' sudah memiliki admin'));
                return back()->with(['error' => 'Kontraktor ' . $kontraktor_temp . ' di UPTD ' . $request->unit_kontraktor . ' Sudah Memiliki Admin!!']);
            }
        }
        if ($validator->fails()) {
            storeLogActivity(declarLog(1, 'User Kontraktor', $request->email . ': ' . $validator->messages()->first()));
            return back()->with(['error' => $validator->messages()->first()]);
        }
        // dd($request->rule);
        $create_user = User::firstOrNew(['email' => $request->email]);
        $create_user->name = $request->input('name');
        $create_user->password = Hash::make($request->input('password'));
        $create_user->role = 'internal';
        $create_user->save();

        $create_profile = UserProfiles::firstOrNew(['user_id' => $create_user->id]);
        $create_profile->nama = $request->input('name');
        $create_profile->no_tlp = $request->input('no_tlp');
        $create_profile->created_by = Auth::user()->id;

        $create_profile->save();

        $create_detail = UserDetail::firstOrNew(['user_id' => $create_user->id]);
        $create_detail->rule_user_id = $request->rule;
        $create_detail->kontraktor_id = $id;
        $create_detail->uptd_id = $request->unit_kontraktor;
        $create_profile->created_by = Auth::user()->id;
        $create_detail->save();
        if ($request->rule == 10) {
            $create_master_admin = MasterAdmin::firstOrNew(['user_detail_id' => $create_detail->id]);
            $create_master_admin->uptd_id = $request->unit_kontraktor;
            $create_master_admin->nama = $request->input('name');
            $create_master_admin->created_by = Auth::user()->id;
            $create_master_admin->save();
        }
        if ($request->rule == 11) {
            // $create_detail->user_gs_detail()->create([
            //     'kontraktor_id' => $id,
            //     'created_by' => Auth::user()->id
            // ]);
            $create_detail->gs()->create([
                'kontraktor_id' => $id,
                // 'gs_user_id'=>$create_user->id,
                'created_by' => Auth::user()->id,
            ]);
            $create_user->user_rule()->attach(11);
        }
        // dd($request->rule);

        storeLogActivity(declarLog(1, 'User Kontraktor', $create_detail->kontraktor->nama . ': ' . $request->email . ' as ' . $create_detail->rule->rule, 1));

        return back()->with(['success' => 'Berhasil Menambahkan User!!']);
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
        if (request()->segment(2) == 'profile') {
            if ($id != Auth::user()->id) {
                return back()->with(['error' => 'Somethink when wrong']);
            }
        }
        $rule_user = UserRule::all();
        $uptd = Uptd::all();
        $data = User::where('id', $id)->first();
        // dd($data->user_detail->kontraktor);
        return view('admin.user.show', compact('data', 'rule_user', 'uptd'));
    }
    public function show_ft($id)
    {
        //
        $rule_user = UserRule::all();
        $uptd = Uptd::all();
        // $data = MasterKonsultan::find($id);
        $data = KonsultanFt::find($id);

        // dd($data);

        return view('admin.user.fieldteam.show', compact('data', 'rule_user', 'uptd'));
    }
    public function show_gs($id)
    {
        //
        $rule_user = UserRule::all();
        $uptd = Uptd::all();
        // $data = MasterKonsultan::find($id);
        $data = KontraktorGs::find($id);
        // dd($data->kontraktor->user_detail_gsc->where('rule_user_id','!=',11));
        $data_pengguna = $data->kontraktor->user_detail_gsc->where('rule_user_id', '!=', 11);

        return view('admin.user.gs.show', compact('data', 'rule_user', 'uptd', 'data_pengguna'));
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
        if ($desc == 'edit') {
            if ($id != Auth::user()->id) {
                return back()->with(['error' => 'Somethink when wrong']);
            }
        }
        $data = User::find($id);

        $rule_user = UserRule::all();
        $uptd = Uptd::all();

        // dd($data->user_detail->kontraktor);
        // dd($data);
        return view('admin.user.form', compact('data', 'rule_user', 'uptd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $desc, $id)
    {
        //

        if ($desc == 'account') {
            $email = $request->input('email');

            $validator = Validator::make($request->all(), [
                'email' => Rule::unique('db_users_dbmpr.users', 'email')->ignore($id),
                'password'   => 'confirmed'
            ]);
            if ($validator->fails()) {
                storeLogActivity(declarLog(2, 'Users', $email . ': ' . $validator->messages()->first()));
                return back()->with(['error' => $validator->messages()->first()]);
            }

            if ($request->input('password') != "") {
                $data['password']     = Hash::make($request->input('password'));
            } else if ($request->input('email') == Auth::user()->email) {
                return back()->with(['warning' => 'Tidak ada data yang dirubah!']);
            }
            $data['email'] = $request->input('email');
            $success = "Akun Berhasil Diupdate!";
            $failed = "Akun Gagal Diupdate!";
            $update_user = User::find($id)->update($data);
        } else if ($desc == 'profiles') {

            $this->validate($request, [
                'nama' => 'required',
                'tgl_lahir' => 'required',
                'tmp_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'no_tlp' => 'numeric|digits_between:8,13',
                'no_tlp_rumah' => '',
                'sup_id' => '',
                'tgl_mulai_kerja' => '',
                'sekolah' => '',
                'jejang' => '',
                'jurusan_pendidikan' => '',
                'provinsi' => '',
                'kota' => '',
                'kode_pos' => '',
                'alamat' => '',
                'agama' => '',
                'uptd' => '',
                'rule_user' => 'required',
            ]);
            // dd($request->all());
            // dd($request->uptd_mk);
            $update_user = UserProfiles::firstOrNew(['user_id' => $id]);
            $email = $update_user->user->email;

            if ($request->nik == null && $request->nip == null) {
                storeLogActivity(declarLog(2, 'Users', $email));
                return back()->with(['warning' => 'NIP / NIK salah satu wajib di isi!']);
            }
            if ($request->nik != null)
                $validator = Validator::make($request->all(), ['nik' => Rule::unique('db_users_dbmpr.user_profiles', 'nik')->ignore($update_user->id)]);

            if ($request->nip != null)
                $validator = Validator::make($request->all(), ['nip' => Rule::unique('db_users_dbmpr.user_profiles', 'nip')->ignore($update_user->id)]);

            if ($validator->fails()) {
                storeLogActivity(declarLog(2, 'Users', $email . ': ' . $validator->messages()->first()));
                return back()->with(['error' => $validator->messages()->first()]);
            }
            if ($request->input('rule_user') == 2 || $request->input('rule_user') == 3) {
                $validator = Validator::make($request->all(), ['uptd' => 'required']);
            } else if ($request->input('rule_user') == 12) {
                $validator = Validator::make($request->all(), ['uptd_mk' => 'required']);
            }
            if ($validator->fails()) {
                storeLogActivity(declarLog(2, 'Users', $email . ': ' . $validator->messages()->first()));
                return back()->with(['error' => $validator->messages()->first()]);
            }
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

            $update_deet = UserDetail::firstOrNew(['user_id' => $id]);
            if ($update->user_detail->konsultan) {
                $update_deet->konsultan_id = $request->input('konsultan');
            } else if ($update->user_detail->kontraktor)
                $update_deet->kontraktor_id = $request->input('kontraktor');

            $update_deet->uptd_id = $request->input('uptd');
            $update_deet->rule_user_id = $request->input('rule_user');
            $update_deet->save();
            // dd($id);
            if ($request->input('rule_user') == 3) {
                $update_master_admin = MasterAdmin::firstOrNew(['user_detail_id' => $update_deet->id]);
                $update_master_admin->uptd_id = $request->input('uptd');
                $update_master_admin->nama = $request->input('nama');
                $update_master_admin->save();
                // $update_deet->master_admin->firstOrNew(['uptd_id' =>$request->input('uptd')]);
            } else if ($request->input('rule_user') == 12) {
                for ($x = 0; $x < count($request->uptd_mk); $x++) {
                    $temp_unit = ['uptd_id' => $request->uptd_mk[$x]];
                    $update_deet->mk()->updateOrCreate($temp_unit);
                }
                $update_deet->mk()->whereNotIn('uptd_id', $request->uptd_mk)->delete();
            }
        }
        if ($update_user) {
            //redirect dengan pesan sukses
            storeLogActivity(declarLog(2, 'Users', $email . ': ' . $desc, 1));

            if (!Auth::user()->user_detail->account_verified_at) {
                Auth::logout();
                return redirect('/')->with(['success' => 'Data Berhasil Disimpan, Selanjutnya Hubungi Admin Untuk Verifikasi Akun']);
            }
            return back()->with(['success' => $success]);
        } else {
            //redirect dengan pesan error
            return back()->with(['error' => $failed]);
        }
    }

    public function updateaccount(Request $request, $id)
    {
        //
        if ($id != Auth::user()->id) {
            $color = "error";
            $msg = "Somethink when wrong!";
            storeLogActivity(declarLog(2, 'Self Users', Auth::user()->email . ': Ilegal Access'));
            return back()->with(compact('color', 'msg'));
            // return redirect('admin/user/profile/'. auth()->user()->id)->with(['error' => 'Somethink when wrong!']);
        } else {

            $datai = [
                "email" => Auth::user()->email,
                "password" => $request->input('password_lama')
            ];
            $exist = Auth::attempt($datai);
            // dd($exist);
            if ($exist) {
                $validator = Validator::make($request->all(), [
                    'email' => Rule::unique('db_users_dbmpr.users', 'email')->ignore($id),
                    'password'   => 'confirmed'
                ]);
                if ($validator->fails()) {
                    storeLogActivity(declarLog(2, 'Self Users', Auth::user()->email . ': ' . $validator->messages()->first()));
                    return redirect(route('profile', $id))->with(['error' => $validator->messages()->first()]);
                }

                if ($request->input('password') != "") {
                    $useraccount['password']     = Hash::make($request->input('password'));
                } else if ($request->input('email') == Auth::user()->email) {
                    return redirect(route('profile', $id))->with(['warning' => 'Tidak ada data yang dirubah!']);
                }
                $useraccount['email'] = $request->input('email');
                // dd($useraccount);
                $updateaccount = User::find($id)->update($useraccount);
                if ($updateaccount) {
                    //redirect dengan pesan sukses
                    storeLogActivity(declarLog(2, 'Self Users', Auth::user()->email . ': account', 1));

                    return redirect(route('profile', $id))->with(['success' => 'Akun Berhasil Diupdate!']);
                } else {
                    //redirect dengan pesan error
                    storeLogActivity(declarLog(2, 'Self Users', Auth::user()->email));
                    return redirect(route('profile', $id))->with(['error' => 'Akun Gagal Diupdate!']);
                }
            } else {
                storeLogActivity(declarLog(2, 'Self Users', Auth::user()->email . ': Wrong Password'));

                return back()->with(['error' => 'Password Lama Salah']);
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
    public function trash()
    {
        //
        // $this->authorize('restoreAllUser', Auth::user());
        $data = UserDetail::where('is_delete', 1)->get();
        // dd($data);
        return view('admin.user.index', compact('data'));
    }
    public function move_to_trash($desc, $id)
    {
        //

        $user = UserDetail::find($id);
        if ($desc == 'restore') {
            $this->authorize('restoreAllUser', Auth::user());
            $user->is_delete = null;
            storeLogActivity(declarLog(4, 'Users', $user->user->email, 1));
            $message = 'Data Berhasil Dikembalikan! ';
        } elseif ($desc == 'move_to_trash') {
            $this->authorize('deleteAllUser', Auth::user());
            $user->is_delete = 1;
            storeLogActivity(declarLog(3, 'Users', $user->user->email, 1));
            $message = 'Data Berhasil di Pindahkan! ';
        }
        $user->save();
        if ($user) {
            return back()->with(['success' => $message]);
        }
        // dd($data);

    }
    public function verified_account(Request $request, $id)
    {

        $this->validate($request, [
            'verified' => 'required',
            'rule_user' => 'required',

        ]);
        $update_detail = UserDetail::firstOrNew(['user_id' => $id]);
        $update_detail->rule_user_id = $request->rule_user;
        if ($request->verified == 1) {
            $update_detail->account_verified_at = Carbon::now()->toDateTimeString();
            storeLogActivity(declarLog(7, 'Users', $update_detail->user->email . ': Accepted', 1));
        } else {
            storeLogActivity(declarLog(7, 'Users', $update_detail->user->email . ': Rejected', 1));
        }

        $update_detail->save();
        if ($update_detail) {
            $user = User::find($id);
            $user->save();
            return back()->with(['success' => 'Account Has Been Verified!']);

            // return redirect(route('user.index'))->with(['success'=>'Account Has Been Verified!']);
        }
    }
}
