<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuasJalanController extends Controller
{
    public function getRuasJalanByKeyword(Request $request)
    {
        $keyword = $request->input("keyword");

        $result = DB::table('ruas_jalan')
            ->orderBy("id", "desc")
            ->having("nama_ruas", "like", "%" . $keyword . "%")
            ->paginate(15);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }
    public function getRuasjalanByUnor($id){
        if($id < 7){
        
        $get_ruas = DB::table("master_ruas_jalan")->select("id_ruas_jalan","nama_ruas_jalan","panjang")->where("uptd_id",$id)->get();
        $result=[];
        foreach($get_ruas as $item){
            array_push($result,$item->id_ruas_jalan." - ".$item->nama_ruas_jalan." - ".$item->panjang);

        }
        return response()->json([
          'status' => 'success',
          'code' => '200',
          'result' => $result
        ]);
    }else{
        $get_ruas = DB::table("master_ruas_jalan")->select("id_ruas_jalan","nama_ruas_jalan","panjang")->get();
        $result=[];
        foreach($get_ruas as $item){
            array_push($result,$item->id_ruas_jalan." - ".$item->nama_ruas_jalan." - ".$item->panjang);

        }
        return response()->json([
          'status' => 'success',
          'code' => '200',
          'result' => $result
        ]);
    }
      }
}
