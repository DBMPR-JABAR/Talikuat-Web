<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilsControllers extends Controller
{
    public function getteamKonsltan(Request $req)
    {
        $result = DB::table('master_konsultan')->where('nama',$req->nama)->first();
        $team = DB::table('team_konsultan')->where([
            ['id_konsultan','=',$result->id],
            ['jabatan','=','Site Engineer'],
            ['uptd','=',$req->unor]
            ])->get();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result'=> $team
        ]);
    }
}
