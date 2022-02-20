<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\DataUmum;
use App\Models\Backend\KategoriPaket;
use App\Models\Backend\Uptd;
use Illuminate\Http\Request;

class DataUmumAddendumControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = DataUmum::where([[
            'id', $id
        ]])->with('kategori_paket')->with('uptd')->with('ruas')->with('detail')->first();
        $kategori_paket = KategoriPaket::all();
        $unit = Uptd::all();


        return view('admin.input_data.data_umum_addendum.create', [
            'data' => $data,
            'kategori_paket' => $kategori_paket,
            'unit' => $unit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
