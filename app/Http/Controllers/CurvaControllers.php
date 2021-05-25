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
        foreach($jadual as $e){
          $dataJadual = DB::table('detail_jadual')->where('id_jadual',$e->id)->orderBy('tgl','asc')->get();
          array_push($tes,$dataJadual);  
        }

        return response()->json([
          "curva"=>$tes,
          "data_umum"=>$data
        ]);;
            

    }
  public function TestingDaily()
  {
    //$get_request = DB::table('request')->where('status','2')->get();
    $data = DB::table('member')->where('perusahaan',"PT. SECON DWITUNGGAL PUTRA KSO PT.NUANSA GALAXY")->get();
    

    return response(
     // $get_request
     $data
    );
  }


  
}

