<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\RuasJalan as Ruas;
use App\Models\Backend\MasterPpk;
use App\Models\Backend\MasterKonsultanFt as FieldTeam;
use App\Models\Backend\MasterKontraktorGs as GeneralSuperintendent;



class DropdownDataController extends Controller
{
    //
    public function getRuasByUptd(Request $request)
    {
        $id_uptd = $request->id;
        $ruas = Ruas::where('uptd_id', $id_uptd)->get();
        return response()->json($ruas);

    }
    
    public function getPpkByUptd(Request $request)
    {
        $id_uptd = $request->id;
        $ppk = MasterPpk::where('uptd_id', $id_uptd)->get();
        return response()->json($ppk);

    }
    public function getFtByKonsultan(Request $request)
    {
        $id_ft = $request->id;
        $ft = FieldTeam::where('konsultan_id', $id_ft)->get();
        return response()->json($ft);

    }
    public function getGsByKontraktor(Request $request)
    {
        $id_gs = $request->id;
        $gs = GeneralSuperintendent::where('kontraktor_id', $id_gs)->get();
        return response()->json($gs);

    }
}
