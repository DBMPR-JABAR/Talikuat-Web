<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnorController extends Controller
{
    public function getAllUnor()
    {
        $result = DB::table('kantor')->get();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }

    public function getUnorByKeyword(Request $req)
    {
        $keyword = $req->keyword;

        $result = DB::table('kantor')
            ->where('nama_kantor', 'like', '%' . $keyword . '%')
            ->orWhere('nama_lengkap', 'like', '%' . $keyword . '%')
            ->get();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }
}
