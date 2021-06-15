<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use Carbon\Carbon;

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
        $laporan = DB::table('master_laporan_harian')->where([
          ['ditolak',4],
          ['id_data_umum',$id]
        ])->get();
        return response()->json([
          "curva"=>$tes,
          "data_umum"=>$data,
          "laporan"=>[$laporan]
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
  public function getAllDataUmumUptd(Request $req)
{
  $getData = DB::table('data_umum')->where('unor',$req->unor)->get();
  $jadual = DB::table('data_umum')->join('jadual','data_umum.id','=','jadual.id_data_umum')->
  join('detail_jadual','jadual.id','=','detail_jadual.id_jadual')->
  where([['data_umum.id',1],['detail_jadual.tgl','<=',Carbon::now()]])->get();
dd($getData);
  $value=0;
  $arr=array();
  foreach($jadual as $val){
    $value +=floatval($val->nilai) ;
    array_push($arr,$val);
  }
  return response()->json([
    $getData
  ]);

  
}
}

