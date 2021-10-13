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
        $data = UserDetail::where('is_delete',null)->where('rule_user_id',12)->get();
        // dd($data);
        return view('admin.user.mk.index',compact('data'));
    }
    public function store(Request $request)
    {
        //
        $user = User::select('name','email','password','id')->where('email', $request->email)->first();
        if($user){
            if(!$user->user_detail){
                $validator = Validator::make($request->all(), [
                    'email' => 'email|required|string',
                    'password' => 'confirmed',
                    'name'=> 'required',
                    'no_tlp'=> '',
                    'unit' => 'required',
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
                'unit'=>'required'
            ]);
        }
        
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
        $create_detail->rule_user_id = 12;
        $create_detail->created_by = Auth::user()->id;
        $create_detail->save();
        
        for($x = 0 ; $x< count($request->unit) ; $x++){
            $temp_unit=['uptd_id' => $request->unit[$x]];
            $create_detail->mk()->updateOrCreate($temp_unit);
        }
        $create_detail->mk()->whereNotIn('uptd_id',$request->unit)->delete();

        storeLogActivity(declarLog(1, 'Users MK', $request->email,1 ));
        return redirect(route('user_mk.index'))->with(['success'=>'Berhasil Menambahkan User!!']);

    }
}
