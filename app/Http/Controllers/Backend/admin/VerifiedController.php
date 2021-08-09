<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Backend\MasterKonsultan;
use App\Models\Backend\MasterKonsultanFt as KonsultanFt;

use Carbon\Carbon;

class VerifiedController extends Controller
{
    //
    public function verified_ft(Request $request, $id)
    {
        // dd($id);
        $this->validate($request,[
            'verified'=> 'required',
        ]);
        $message = "Field Team Has Been Rejected !";
        $data = KonsultanFt::find($id);
        
        if($request->verified == 1){
            $update_user['account_verified_at'] = Carbon::now()->toDateTimeString();
            $data->ft_verified_at = Carbon::now()->toDateTimeString();
            $message = "Field Team Has Been Verified!";
            $data->user_se_detail()->update($update_user);
            $data->user_ie_detail()->update($update_user);
        }
        $data->save();
        if($data){

            return redirect(route('user.ft.index'))->with(['success'=> $message]);
        }else
        return redirect(route('user.ft.index'))->with(['Error'=>'Failed Verification!']);

            
    }
}
