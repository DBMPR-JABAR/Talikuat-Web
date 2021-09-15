<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\DataUmum;


class DataUmumController extends Controller
{
    //
    public function index()
    {
        //
        $data = DataUmum::orderBy('unor','ASC')->orderBy('created_at','ASC')->get();
        return view('admin.input_data.data_umum.index',compact('data'));
    }
    public function create()
    {
        //
        
        $data =[];
        // dd($data);
        return view('admin.input_data.data_umum.form',compact('data'));
    }
}
