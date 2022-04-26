<?php

namespace App\Http\Controllers\Backend\admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Log;

class LogControllers extends Controller
{
    //
    public function index()
    {
        //
        $data = Log::latest('created_at')->paginate(1000);
        // dd($data);
        // dd(Auth::user()->user_detail->id);
        return view('admin.log_activity.index',compact('data'));
    }
    public function getLogUser()
    {
        //
        $data = Log::where('user_detail_id',Auth::user()->user_detail->id)->latest('created_at')->paginate(1000);
        // dd($data);
        // dd(Auth::user()->user_detail->id);
        return view('admin.log_activity.index',compact('data'));
    }
}
