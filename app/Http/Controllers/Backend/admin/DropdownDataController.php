<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\RuasJalan as Ruas;
use App\Models\Backend\MasterPpk;
use App\Models\Backend\MasterKonsultanFt as FieldTeam;
use App\Models\Backend\MasterKontraktorGs as GeneralSuperintendent;
use App\Models\Backend\User;
use App\Models\Backend\UserDetail;
use stdClass;

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
        $ft = FieldTeam::where('konsultan_id', $id_ft)->where('is_delete', null)->get();
        foreach ($ft as $data) {
            $temp['se'] = $data->user_se->name;
            $temp['ie'] = $data->user_ie->name;
            $data->se = '(SE)' . $temp['se'] . ' - (IE)' . $temp['ie'];
        }
        return response()->json($ft);
    }
    public function getGsByKontraktor(Request $request)
    {
        $id_gs = $request->id;
        // $gs = GeneralSuperintendent::where('kontraktor_id', $id_gs)->where('is_delete', null)->get();
        $gs = GeneralSuperintendent::where('kontraktor_id', $id_gs)->where('is_delete', null)->get();
        foreach ($gs as $data) {
            $temp = $data->user_gs_detail->user->name;
            $data->gs = $temp;
        }
        return response()->json($gs);
    }

    public function getDirlapByUptd(Request $request)
    {
        $dirlap =  UserDetail::where('rule_user_id', 14)->where('is_delete', null)->where('uptd_id', $request->id)->get();

        foreach ($dirlap as $item) {
            $item->nama = $item->user->name;
        }

        return response()->json($dirlap);
    }
}
