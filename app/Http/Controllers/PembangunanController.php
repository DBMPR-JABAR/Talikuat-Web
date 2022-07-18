<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backend\DataUmum;
use Illuminate\Support\Facades\DB;

class PembangunanController extends Controller
{   
    public function getDataPembangunan()
    {   
        $data = DataUmum::with('kategori_paket')->with('uptd')->with('detail')->with('laporanApproved')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
    public function getDataPembangunanbyUptd(Request $request)
    {   

        $data = DataUmum::with('kategori_paket')->with('uptd')->with('detail')->with('laporanApproved')->whereIn('id_uptd',$request->uptd)->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

}
