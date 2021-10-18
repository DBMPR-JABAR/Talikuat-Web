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

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class MasterAdminController extends Controller
{
    //
    public function index()
    {
        //
        $data = UserDetail::where('is_delete',null)->whereIn('rule_user_id',[1,3,9,10,13])->get();
        // dd($data);
        return view('admin.user.admin.index',compact('data'));
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
                    'rule' => 'required',
                ]);

            }else{
                storeLogActivity(declarLog(1, 'Users Admin', $request->email));
                return back()->with(['error' => 'The email has already been taken.']);
            }
        }else{
            $validator = Validator::make($request->all(), [
                'email' => 'email|required|string|unique:db_users_dbmpr.users',
                'password' => 'confirmed',
                'name'=> 'required',
                'no_tlp'=> '',
                'rule'=>'required'
            ]);
        }
        
        
        if($request->rule == 'ADMIN-KONSULTAN'){
           if(UserDetail::where('konsultan_id',$request->konsultan)->where('rule_user_id',9)->exists()){
                storeLogActivity(declarLog(1, 'Users Admin Konsultan', $request->email. '. Konsultan sudah memiliki admin'));
                return back()->with(['error'=>'Konsultan ini sudah memiliki Admin!!']); 
           }
        }else if($request->rule == 'ADMIN-KONTRAKTOR'){
            $validator = Validator::make($request->all(), ['unit_kontraktor' => 'required']);
            $kontraktor_temp = "";
            if($request->kontraktor)
            $kontraktor_temp = MasterKontraktor::where('id',$request->kontraktor)->pluck('nama')->first();
         
            if(UserDetail::where('kontraktor_id',$request->kontraktor)->where('rule_user_id',10)->count() >= 6){
                storeLogActivity(declarLog(1, 'Users Admin Kontraktor', $request->email. 'Slot Admin Kontraktor '.$kontraktor_temp.' Sudah Penuh'));
                return back()->with(['error'=>'Slot Admin Kontraktor '.$kontraktor_temp.' Tersebut Sudah Penuh!!']);
            }else if (UserDetail::where('kontraktor_id',$request->kontraktor)->where('rule_user_id',10)->where('uptd_id',$request->unit_kontraktor)->exists()){
                storeLogActivity(declarLog(1, 'Users Admin Kontraktor', $request->email. '. Kontraktor '.$kontraktor_temp.' di UPTD '.$request->unit_kontraktor.' sudah memiliki admin'));
                return back()->with(['error'=>'Kontraktor '.$kontraktor_temp.' di UPTD '.$request->unit_kontraktor.' Sudah Memiliki Admin!!']);
            }
            // dd(UserDetail::where('kontraktor_id',$request->kontraktor)->where('rule_user_id',10)->count());
        }
        if ($validator->fails()) {
            storeLogActivity(declarLog(1, 'Users Admin', $request->email.' '.$validator->messages()->first()));
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        // dd($request->kontraktor);

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
        if($request->rule == 'ADMIN'){
            if($request->unit){
                $temp_detail['rule_user_id'] = 3;
            }else
                $temp_detail['rule_user_id'] = 1;
            
            $temp_detail['uptd_id'] = $request->unit;
        }else if($request->rule == 'ADMIN-KONSULTAN'){
            $temp_detail['rule_user_id'] = 9;
            $create_detail->konsultan_id = $request->konsultan;
            $temp_detail['uptd_id'] = $request->unit;

        }else if($request->rule == 'ADMIN-KONTRAKTOR'){
            $temp_detail['rule_user_id'] = 10;
            $create_detail->kontraktor_id = $request->kontraktor;
            $temp_detail['uptd_id'] = $request->unit_kontraktor;
        }

        $create_detail->rule_user_id = $temp_detail['rule_user_id'];
        $create_detail->uptd_id = $temp_detail['uptd_id'];
        $create_detail->created_by = Auth::user()->id;
        $create_detail->save();

        $create_master_admin = MasterAdmin::firstOrNew(['user_detail_id'=> $create_detail->id]);
        $create_master_admin->uptd_id = $temp_detail['uptd_id'];
        $create_master_admin->nama = $request->input('name');
        $create_master_admin->created_by = Auth::user()->id;
        $create_master_admin->save();
        storeLogActivity(declarLog(1, 'Users Admin', $request->email,1 ));

        return redirect(route('user_admin.index'))->with(['success'=>'Berhasil Menambahkan User!!']);

    }
}
