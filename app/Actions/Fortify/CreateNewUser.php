<?php

namespace App\Actions\Fortify;

use App\Models\Backend\User;
use App\Models\Backend\UserProfiles as UserProfiles;
use App\Models\Backend\UserDetail as UserDetail;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
                $create_user = User::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => Hash::make($input['password']),
                ]);
        }
        if($create_user){

            $create_profile = UserProfiles::firstOrNew(['user_id'=> $create_user->id]);
            $create_profile->nama = $create_user->name;
            $create_profile->created_by = $create_user->id;
            $create_profile->save();

            $create_detail = UserDetail::firstOrNew(['user_id'=> $create_user->id])->save();
            return $create_user;
        }
    }
}
