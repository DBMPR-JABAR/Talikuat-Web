<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnorController extends Controller
{
    public function getUnorByKeyword(Request $request)
    {
        $keyword = $request->input("keyword");

        $result = DB::table('kantor')
            ->paginate(15);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ]);
    }
}
