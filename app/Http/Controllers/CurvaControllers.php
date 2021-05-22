<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class CurvaControllers extends Controller
{
    public function GetDataUmum($id)
    {
        $tes= array();
        $jadual =DB::table('jadual')->select('id','nmp')->where('id_data_umum',$id)->get();
        $data = DB::table('data_umum')->where('id',$id)->get();
        foreach($jadual as $id){
          array_push($tes,DB::table('detail_jadual')->where('id_jadual',$id->id)->orderBy('tgl','asc')->get());  
        }

        return response()->json([
          "curva"=>$tes,
          "data_umum"=>$data
        ]);;
            

    }
  public function TestingDaily()
  {
   $tes = DB::table('request')->where('respon',NULL)->first();

    dd($tes->respon == null);
  }


  
}

