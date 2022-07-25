<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\UserDetail;
use App\Models\Backend\DataUmum;


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

        $role = Auth::user()->user_detail->rule_user_id;
        $uptd = Auth::user()->user_detail->uptd_id;
        if ($role == 3) {
            // $data = DataUmum::orderBy('unor','ASC')->orderBy('created_at','ASC')->get();
            $data = DataUmum::where('id_uptd', $uptd)->latest()->with('detail')->with('uptd')->get();
        }elseif($role == 2 || $role == 15){
            $data = DataUmum::latest()->whereHas('detail', function($query){
                $query->where('ppk_id', Auth::user()->user_detail->id);
            })->with('detail')->with('uptd')->get();
        }elseif($role == 14){
            $data = DataUmum::where('id_uptd', $uptd)->latest()->whereHas('detail', function($query){
                $query->where('dirlap_id', Auth::user()->user_detail->id);
            })->with('uptd')->get();   
        }elseif($role == 5||$role == 7|| $role == 8 || $role==9){   $data = DataUmum::where('id_uptd', $uptd)->latest()->whereHas('detail', function($query){
            $query->where('konsultan_id', Auth::user()->user_detail->konsultan_id);
        })->with('uptd','laporan','detail')->get();  
        } else {
            $data = DataUmum::latest()->get();
        }

         $peyedia = DB::table('master_kontraktor')->whereNull('is_delete')->count();
         $konsultan = DB::table('master_konsultan')->whereNull('is_delete')->count();
         $dataUmum = DB::table('data_umum')->count();
         $ppk = UserDetail::where('rule_user_id', 2)->where('is_delete', null)->with('user')->count();

         return view('admin.dashboard.index', [
             'penyedia' => $peyedia,
             'konsultan' => $konsultan,
             'dataUmum' => $dataUmum,
             'ppk' => $ppk,
             'data' => $data,
         ]);

        // $uptd1 = DataUmum::where('id_uptd', 1)->with('laporanApproved')->get();
        // $uptd2 = DataUmum::where('id_uptd', 2)->with('laporanApproved')->get();
        // $uptd3 = DataUmum::where('id_uptd', 3)->with('laporanApproved')->get();
        // $uptd4 = DataUmum::where('id_uptd', 4)->with('laporanApproved')->get();
        // $uptd5 = DataUmum::where('id_uptd', 5)->with('laporanApproved')->get();
        // $uptd6 = DataUmum::where('id_uptd', 6)->with('laporanApproved')->get();

                


        //     return view('chart',compact('uptd1','uptd2','uptd3','uptd4','uptd5','uptd6'));

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

    public function phpInfo()
    {
        phpinfo();
    }
}
