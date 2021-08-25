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
        $data = DataUmum::all();
        // dd($data);
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
