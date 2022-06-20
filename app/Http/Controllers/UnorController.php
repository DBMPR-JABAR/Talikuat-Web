<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnorController extends Controller
{
    public function getAllUnor()
    {
        $result = DB::connection('talikuat_old')->table('kantor')->get();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getUnorByKeyword(Request $req)
    {
        $keyword = $req->keyword;

        $result = DB::connection('talikuat_old')->table('kantor')
            ->where('nama_kantor', 'like', '%' . $keyword . '%')
            ->orWhere('nama_lengkap', 'like', '%' . $keyword . '%')
            ->get();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getUnor(Request $request)
    {
        $namaLengkap = $request->nama_lengkap;

        $result = DB::connection('talikuat_old')->table('kantor')
            ->where('nama_lengkap', '=', $namaLengkap)
            ->first();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }
}
