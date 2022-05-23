<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\UserDetail;


class DashboardControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->profile->no_tlp || (Auth::user()->profile->nip == null && Auth::user()->profile->nik == null)) {
            return redirect(url('admin/profile/edit', Auth::user()->id))->with(['warning' => 'Lengkapi Data Terlebih Dahulu']);
        }


        $peyedia = DB::table('master_kontraktor')->count();
        $konsultan = DB::table('master_konsultan')->count();
        $dataUmum = DB::table('data_umum')->count();
        $ppk = UserDetail::where('rule_user_id', 2)->where('is_delete', null)->with('user')->count();

        return view('admin.dashboard.index', [
            'penyedia' => $peyedia,
            'konsultan' => $konsultan,
            'dataUmum' => $dataUmum,
            'ppk' => $ppk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
