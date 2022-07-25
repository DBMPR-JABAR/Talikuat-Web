<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backend\DataUmum;
use Illuminate\Support\Facades\DB;

class PembangunanController extends Controller
{   
    public function getDataPembangunan()
    {   
        $data = DataUmum::with('kategori_paket')->with('uptd')->with('detail')->with('laporanApproved')->with('laporanKonsultan')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
    public function getDataPembangunanbyUptd(Request $request)
    {   
        if ($request->uptd == 'all') {
            $data = DataUmum::with('kategori_paket')->with('uptd')->with('detail')->with('laporanApproved')->with('laporanKonsultan')->get();
           
        }else{
            $data = DataUmum::with('kategori_paket')->with('uptd')->with('detail')->with('laporanApproved')->with('laporanKonsultan')->where('id_uptd',$request->uptd)->get();
        }
        
        
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

}
