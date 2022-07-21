<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanKonsultanControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->user_detail->rule_user_id;
        $uptd = Auth::user()->user_detail->uptd_id;
      
        if ($role == 3) {
            // $data = DataUmum::orderBy('unor','ASC')->orderBy('created_at','ASC')->get();
            $data = DataUmum::where('id_uptd', $uptd)->latest()->with('uptd','laporan','detail')->get();
           
            
        }elseif($role == 2 || $role == 15){
            $data = DataUmum::latest()->whereHas('detail', function($query){
                $query->where('ppk_id', Auth::user()->user_detail->id);
            })->with('uptd','laporan','detail')->with('uptd')->get();
            
            
        }elseif($role == 14){
            $data = DataUmum::where('id_uptd', $uptd)->latest()->whereHas('detail', function($query){
                $query->where('dirlap_id', Auth::user()->user_detail->id);
            })->with('uptd','laporan','detail')->get();   
           
            
        }elseif($role == 5||$role == 7|| $role == 8 || $role==9){   $data = DataUmum::where('id_uptd', $uptd)->latest()->whereHas('detail', function($query){
            $query->where('dirlap_id', Auth::user()->user_detail->id);
        })->with('uptd','laporan','detail')->get();  
        } else {
            $data = DataUmum::latest()->with('uptd','laporan','detail')->get();
        }
   
       
        return view("admin.laporan_mingguan.index", compact('data'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
