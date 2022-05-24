<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backend\DataUmum;

class PembangunanController extends Controller
{
    public function getDataPembangunan()
    {
        $data = DataUmum::with('kategori_paket')->with('uptd')->with('detail')->first();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
}
