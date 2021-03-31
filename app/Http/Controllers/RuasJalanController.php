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
}
