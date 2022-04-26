<?php

namespace App\Actions\Fortify;

use App\Models\Backend\User;
use App\Models\Backend\UserProfiles as UserProfiles;
use App\Models\Backend\UserDetail as UserDetail;
use App\Models\Backend\MasterAdmin;
use App\Models\Backend\MasterPpk;
use App\Models\Backend\MasterKonsultan;
use App\Models\Backend\MasterKontraktor;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\View;
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        
        $user = User::select('name','email','password','id')->where('email', $input['email'])->first();
        
        if($input['nik'] == null && $input['nip'] == null){
          
            // return back()->with(['warning'=>'NIP / NIK salah satu wajib di isi!']);
            Validator::make($input, [
                'nip' => ['required'],
                'nik' => ['required']
            ])->validate();
        }
        
        if($input['nik'] != null){
            $user_nik = UserProfiles::where('nik', $input['nik'])->first();
            // dd($user_nik->user->email);
            if(isset($user_nik->user->user_detail)){
                $validator = Validator::make($input, ['nik' => Rule::unique('db_users_dbmpr.user_profiles', 'nik')])->validate();
            }else if(isset($user_nik->user)){
                if($user_nik->user->email != $input['email']){
                    $validator = Validator::make($input, ['nik' => Rule::unique('db_users_dbmpr.user_profiles', 'nik')])->validate();
                }
            }

        }
        
        if($input['nip'] != null){
            $user_nip = UserProfiles::where('nip', $input['nip'])->first();
            // $validator = Validator::make($input, ['nip' => Rule::unique('db_users_dbmpr.user_profiles', 'nip')])->validate();
            if(isset($user_nip->user->user_detail)){
                $validator = Validator::make($input, ['nip' => Rule::unique('db_users_dbmpr.user_profiles', 'nip')])->validate();
            }else if(isset($user_nip->user)){
                if($user_nip->user->email != $input['email']){
                    $validator = Validator::make($input, ['nip' => Rule::unique('db_users_dbmpr.user_profiles', 'nip')])->validate();
                }
            }
        }
        // dd($input);
        
        if($input['role'] == "PPK"){
            $data_detail['rule_user_id'] = 2;

        }else if($input['role'] == "ADMIN-UPTD"){
            $data_detail['rule_user_id'] = 3;
            
        }else if($input['role'] == "KONSULTAN"){

            Validator::make($input, [
                'jabatan_konsultan' => ['required'],
                'nm_perusahaan_konsultan' => ['required'],
                'alamat_perusahaan_konsultan' => ['required'],
                'npwp_konsultan' => [
                    'required',
                    Rule::unique(MasterKonsultan::class, 'npwp'),
                ],
                'tlp_perusahaan_konsultan' => ['required'],
            ])->validate();

            if($input['jabatan_konsultan'] == "ADMIN"){
                $data_detail['rule_user_id'] = 9;
            }else if($input['jabatan_konsultan'] == "DIREKTUR")
                $data_detail['rule_user_id'] = 4;

        }else if($input['role'] == "KONTRAKTOR"){
            
            Validator::make($input, [
                'jabatan_kontraktor' => ['required'],
                'nm_perusahaan_kontraktor' => ['required'],
                'alamat_perusahaan_kontraktor' => ['required'],
                'npwp' => [
                    'required',
                    Rule::unique(MasterKontraktor::class, 'npwp'),
                ],
                'tlp_perusahaan' => ['required'],
                'bank' => ['required'],
                'no_rek' => ['required'],
            ])->validate();

            if($input['jabatan_kontraktor'] == "ADMIN"){
                $data_detail['rule_user_id'] = 10;
            }else if($input['jabatan_kontraktor'] == "DIREKTUR")
                $data_detail['rule_user_id'] = 5;

        }
        // dd($input);

        $data_detail['uptd_id'] = $input['unit'];
        
        if($user){
            $cek = UserDetail::where('user_id',$user->id)->exists();
            if($cek){
                Validator::make($input, [
                    'email' => [
                        'required',
                        'string',
                        'email',
                        'max:255',
                        Rule::unique(User::class),
                    ]
                ])->validate();
            }else{
                $create_user = $user;
            }
        }else{
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class),
                ],
                'password' => $this->passwordRules(),
            ])->validate();
            // dd($input);

            $create_user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);
        }
        if($create_user){

            $create_profile = UserProfiles::firstOrNew(['user_id'=> $create_user->id]);
            $create_profile->nama = $create_user->name;
            $create_profile->nik = $input['nik'];
            $create_profile->nip = $input['nip'];
            $create_profile->alamat = $input['alamat_user'];
            $create_profile->no_tlp = $input['tlp_user'];
            $create_profile->created_by = $create_user->id;
            $create_profile->save();

            $create_detail = UserDetail::firstOrNew(['user_id'=> $create_user->id]);
            $create_detail->created_by = $create_user->id;
            $create_detail->rule_user_id = $data_detail['rule_user_id'];
            $create_detail->save();


            if($input['role'] == "PPK"){
                $create_ppk = MasterPpk::firstOrNew(['user_detail_id'=> $create_detail->id]);
                $create_ppk->uptd_id = $data_detail['uptd_id'];
                $create_ppk->created_by = $create_user->id;
                $create_ppk->save();          
            }else if($input['role'] == "ADMIN-UPTD"){
                $create_admin = MasterAdmin::firstOrNew(['user_detail_id'=> $create_detail->id]);
                $create_admin->uptd_id = $data_detail['uptd_id'];
                $create_admin->created_by = $create_user->id;
                $create_admin->save();
            }else if($input['role'] == "KONSULTAN"){
                if($input['jabatan_konsultan'] == "ADMIN"){
                    $create_admin = MasterAdmin::firstOrNew(['user_detail_id'=> $create_detail->id]);
                    $create_admin->uptd_id = $data_detail['uptd_id'];
                    $create_admin->created_by = $create_user->id;
                    $create_admin->save();
                }
                $data_konsultan =([
                    'nama'=>$input['nm_perusahaan_konsultan'],
                    'alamat'=>$input['alamat_perusahaan_konsultan'],
                    'nama_direktur'=>$input['nm_direktur_konsultan'],
                    'npwp'=>$input['npwp_konsultan'],
                    'telp'=>$input['tlp_perusahaan_konsultan'],
                    'created_by'=>$create_user->id,
                ]);
                $create_konsultan = MasterKonsultan::create($data_konsultan);
                
                $create_detail->konsultan_id = $create_konsultan->id;
                $create_detail->save();
            }else if($input['role'] == "KONTRAKTOR"){
                if($input['jabatan_kontraktor'] == "ADMIN"){
                    $create_admin = MasterAdmin::firstOrNew(['user_detail_id'=> $create_detail->id]);
                    $create_admin->uptd_id = $data_detail['uptd_id'];
                    $create_admin->created_by = $create_user->id;
                    $create_admin->save();
                }
                $data_kontraktor =([
                    'nama'=>$input['nm_perusahaan_kontraktor'],
                    'alamat'=>$input['alamat_perusahaan_kontraktor'],
                    'nama_direktur'=>$input['nm_direktur'],
                    'npwp'=>$input['npwp'],
                    'telp'=>$input['tlp_perusahaan'],
                    'bank'=>$input['bank'],
                    'no_rek'=>$input['no_rek'],
                    'created_by'=>$create_user->id,
                ]);
                $create_kontraktor = MasterKontraktor::create($data_kontraktor);
                
                $create_detail->kontraktor_id = $create_kontraktor->id;
                $create_detail->save();
            }

            return $create_user;
        }
    }
}
