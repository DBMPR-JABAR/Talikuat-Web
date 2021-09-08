<?php

namespace App\Http\Controllers;

use App\Mail\MemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MemoControllers extends Controller
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
    public function store(Request $req)
    {
        try {
            $dt_umum = DB::table('data_umum')->where('id', $req->id_data_umum)->first();
            $ppk = DB::table('member')->where('nm_member', $dt_umum->nm_ppk)->first();
            $kontraktor = DB::table('member')->where('perusahaan', $dt_umum->penyedia)->first();

            $id = DB::table('memo')->insertGetId([
                'nomor_memo' => $req->nomor_surat,
                'tgl_memo' => $req->tgl_memo,
                'nm_pengirim' => $req->pengirim,
                'jabatan_pengirim' => $req->jabatan_pengirim,
                'nm_penerima' => $req->penerima,
                'jabatan_penerima' => $req->jabatan_penerima,
                'isi_memo' => $req->isi_memo,
                'tembusan_kontraktor' => 1,
                'is_readed' => 0,
                'id_data_umum' => $req->id_data_umum,
                'nm_konsultan' => $dt_umum->konsultan,
                'nm_ppk' => $dt_umum->nm_ppk,
                'nm_kontraktor' => $dt_umum->penyedia,
                'nm_admin_uptd' => $dt_umum->unor
            ]);
            if ($req->tembusan == 'ppk') {
                DB::table('memo')->where('id', $id)->update([
                    'tembusan_ppk' => 1,
                    'ppk_readed' => 0
                ]);
                $bodyEmail = [
                    "role" => "Konsultan",
                    "status" => "Mengirim",
                    "dokumen" => "Memo ",
                    "username" => $dt_umum->konsultan,
                    "kepada" => 'Kontraktor',
                    "nm_penerima" => $dt_umum->penyedia,
                    "no_dokumen" => $req->nomor_surat,
                    "kegiatan" => $dt_umum->nm_paket,
                    "tembusan" => $dt_umum->nm_ppk,
                ];
                Mail::to($ppk->email)->send(new MemoMail($bodyEmail));
                Mail::to($kontraktor->email)->send(new MemoMail($bodyEmail));
            }
            if ($req->tembusan == 'admin') {
                DB::table('memo')->where('id', $id)->update([
                    'tembusan_admin_uptd' => 1,
                    'admin_readed' => 0,
                ]);
            }
            if ($req->tembusan == 'all') {
                DB::table('memo')->where('id', $id)->update([
                    'tembusan_ppk' => 1,
                    'tembusan_admin_uptd' => 1,
                    'admin_readed' => 0,
                    'ppk_readed' => 0
                ]);
                $bodyEmail = [
                    "role" => "Konsultan",
                    "status" => "Mengirim",
                    "dokumen" => "Memo ",
                    "username" => $dt_umum->konsultan,
                    "kepada" => 'Kontraktor',
                    "nm_penerima" => $dt_umum->penyedia,
                    "no_dokumen" => $req->nomor_surat,
                    "kegiatan" => $dt_umum->nm_paket,
                    "tembusan" => $dt_umum->nm_ppk . ' (PPK), Admin ' . $dt_umum->unor,
                ];
                Mail::to($ppk->email)->send(new MemoMail($bodyEmail));
                Mail::to($kontraktor->email)->send(new MemoMail($bodyEmail));
            }
            return response()->json([
                "code" => 200,
                "message" => "success"
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                "code" => 500,
                "message" => $e->getMessage()
            ], 500);
        }
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
    public function update(Request $req,$id)
    {   
        $role = $req->role;
        date_default_timezone_set('Asia/Jakarta');
        $cek = DB::table('memo')->where('id', $id)->first();
        if ($role == 'PPK') {
            DB::table('memo')->where('id', $id)->update([
                'ppk_readed' => 'Telah Dibaca Pada ' . \Carbon\Carbon::now()
            ]);
        }
        if ($role == 'ADMIN-UPTD') {
            DB::table('memo')->where('id', $id)->update([
                'admin_readed' => 'Telah Dibaca Pada ' . \Carbon\Carbon::now()
            ]);
        }
        if ($role == 'KONTRAKTOR') {
            if ($cek->is_readed == 0) {
                DB::table('memo')->where('id', $id)->update([
                    'is_readed' => 'Telah Dibaca Pada ' . \Carbon\Carbon::now()
                ]);
            }
        }
        return response()->json([
            "code" => 200,
            "message" => "success"
        ], 200);
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


    public function cekMemo(Request $req)
    {
        switch ($req->role) {
            case 'KONTRAKTOR':
                $role = 'nm_kontraktor';
                break;
            case 'KONSULTAN':
                $role = 'nm_konsutan';
                break;
            case 'PPK':
                $role = 'nm_ppk';
                break;
            case 'ADMIN-UPTD':
                $role = 'nm_admin_uptd';
                break;
        }
        $cek = DB::table('memo')->where($role, $req->nm)->get();
        foreach ($cek as $memo) {
            if ($req->role == 'PPK') {
                if ($memo->ppk_readed == 0) {
                    return response()->json([
                        "code" => 200,
                        "memo" => $memo->id
                    ], 200);
                } else {
                    return response()->json([
                        "code" => 200,
                        "memo" => 'null'
                    ], 200);
                }
            }
            if ($req->role == 'KONTRAKTOR') {
                if ($memo->is_readed == 0) {
                    return response()->json([
                        "code" => 200,
                        "memo" => $memo->id
                    ], 200);
                } else {
                    return response()->json([
                        "code" => 200,
                        "memo" => 'null'
                    ], 200);
                }
            }
            if ($req->role == 'ADMIN-UPTD') {
                if ($memo->admin_readed == 0) {
                    return response()->json([
                        "code" => 200,
                        "memo" => $memo->id
                    ], 200);
                } else {
                    return response()->json([
                        "code" => 200,
                        "memo" => 'null'
                    ], 200);
                }
            }
            if ($req->role == 'KONSULTAN') {
                if ($memo->konsultan_readed == 0) {
                    return response()->json([
                        "code" => 200,
                        "memo" => $memo->id
                    ], 200);
                } else {
                    return response()->json([
                        "code" => 200,
                        "memo" => 'null'
                    ], 200);
                }
            }
        }
        return response()->json([
            "code" => 200,
            "memo" => 'null'
        ], 200);
    }

    public function responMemo(Request $req, $id)
    {   
        
        DB::table('memo')->where('id', $id)->update([
            'respon_memo' => $req->respon
        ]);
        return response()->json([
            "code" => 200,
            "message" => "success"
        ], 200);
    }
}
