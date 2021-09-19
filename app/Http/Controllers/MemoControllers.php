<?php

namespace App\Http\Controllers;

use App\Mail\MemoMail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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

    public function getUnreadMemo(Request $req)
    {
        $query = DB::table('memo');

        switch ($req->type) {
            case 'KONTRAKTOR':
                $result = $query
                    ->where('nm_kontraktor', '=', $req->value)
                    ->where('is_readed', '=', '0')
                    ->count();
                break;
            case 'KONSULTAN':
                $result = $query
                    ->where('nm_konsultan', '=', $req->value)
                    ->whereNull('konsultan_readed')
                    ->count();
                break;
            case 'ADMIN-UPTD':
                $result = $query
                    ->where('nm_admin_uptd', '=', $req->value)
                    ->whereNull('admin_readed')
                    ->count();
                break;
            case 'PPK':
                $result = $query
                    ->where('nm_ppk', '=', $req->value)
                    ->whereNull('ppk_readed')
                    ->count();
                break;
            default:
                $result = $query
                    ->whereNull('is_readed')
                    ->count();
                break;
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ]);
    }

    public function getAllMemo(Request $req)
    {
        $query = DB::table('memo');

        switch ($req->type) {
            case 'KONTRAKTOR':
                $result = $query
                    ->where('nm_kontraktor', '=', $req->value)
                    ->paginate();
                break;
            case 'KONSULTAN':
                $result = $query
                    ->where('nm_konsultan', '=', $req->value)
                    ->paginate();
                break;
            case 'ADMIN-UPTD':
                $result = $query
                    ->where('nm_admin_uptd', '=', $req->value)
                    ->paginate();
                break;
            case 'PPK':
                $result = $query
                    ->where('nm_ppk', '=', $req->value)
                    ->paginate();
                break;
            default:
                $result = $query->paginate();
                break;
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ]);
    }

    public function getAllMemoByIdDataUmum($id, Request $req)
    {
        $query = DB::table('memo')->where('id_data_umum', '=', $id);

        switch ($req->type) {
            case 'KONTRAKTOR':
                $result = $query
                    ->where('nm_kontraktor', '=', $req->value)
                    ->paginate();
                break;
            case 'KONSULTAN':
                $result = $query
                    ->where('nm_konsultan', '=', $req->value)
                    ->paginate();
                break;
            case 'ADMIN-UPTD':
                $result = $query
                    ->where('nm_admin_uptd', '=', $req->value)
                    ->paginate();
                break;
            case 'PPK':
                $result = $query
                    ->where('nm_ppk', '=', $req->value)
                    ->paginate();
                break;
            default:
                $result = $query->paginate();
                break;
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ]);
    }

    public function getLatestMemo(Request $req)
    {
        $query = DB::table('memo')->orderByDesc('id');

        switch ($req->type) {
            case 'KONTRAKTOR':
                $result = $query
                    ->where('nm_kontraktor', '=', $req->value)
                    ->limit(5)
                    ->get();
                break;
            case 'KONSULTAN':
                $result = $query
                    ->where('nm_konsultan', '=', $req->value)
                    ->limit(5)
                    ->get();
                break;
            case 'ADMIN-UPTD':
                $result = $query
                    ->where('nm_admin_uptd', '=', $req->value)
                    ->limit(5)
                    ->get();
                break;
            case 'PPK':
                $result = $query
                    ->where('nm_ppk', '=', $req->value)
                    ->limit(5)
                    ->get();
                break;
            default:
                $result = $query
                    ->limit(5)
                    ->get();
                break;
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ]);
    }

    public function getDetailMemo($id)
    {
        $result = DB::table('memo')->where('id', '=', $id)->first();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $result
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_data_umum' => 'required',
            'no_memo' => 'required',
            'tgl_memo' => 'required',
            'nm_pengirim' => 'required',
            'jabatan_pengirim' => 'required',
            'isi_memo' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'result' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        try {
            $kontrak = DB::table('data_umum')->where('id', '=', $req->id_data_umum)->first();

            $id = DB::table('memo')->insertGetId([
                'nomor_memo' => $req->no_memo,
                'tgl_memo' => $req->tgl_memo,
                'nm_pengirim' => $req->nm_pengirim,
                'jabatan_pengirim' => $req->jabatan_pengirim,
                'nm_penerima' => $kontrak->nm_gs,
                'jabatan_penerima' => "General Superintendent",
                'isi_memo' => $req->isi_memo,
                'tembusan_kontraktor' => 1,
                'is_readed' => 0,
                'id_data_umum' => $req->id_data_umum,
                'nm_konsultan' => $kontrak->konsultan,
                'nm_ppk' => $kontrak->nm_ppk,
                'nm_kontraktor' => $kontrak->penyedia,
                'nm_admin_uptd' => $kontrak->unor
            ]);

            if ($req->tembusan_ppk == 'true') {
                DB::table('memo')->where('id', $id)->update([
                    'tembusan_ppk' => 1,
                    'ppk_readed' => 0
                ]);
            }

            if ($req->tembusan_admin_uptd == 'true') {
                DB::table('memo')->where('id', $id)->update([
                    'tembusan_admin_uptd' => 1,
                    'admin_readed' => 0
                ]);
            }

            if ($req->tembusan_ppk == 'true' && $req->tembusan_admin_uptd == 'true') {

                $bodyEmail = [
                    "role" => "Konsultan",
                    "status" => "Mengirim",
                    "dokumen" => "Memo ",
                    "username" => $kontrak->konsultan,
                    "kepada" => 'Kontraktor',
                    "nm_penerima" => $kontrak->penyedia,
                    "no_dokumen" => $req->nomor_surat,
                    "kegiatan" => $kontrak->nm_paket,
                    "tembusan" => $kontrak->nm_ppk . ' (PPK), Admin ' . $kontrak->unor,
                ];

                $ppk = DB::table('member')->where('nama_lengkap', '=', $kontrak->nm_ppk)->first();
                pushNotification('Memo', 'Memo kegiatan ' . $kontrak->nm_paket, $ppk->nm_member);
                if ($ppk->email != null) Mail::to($ppk->email)->send(new MemoMail($bodyEmail));

                $list_kontraktor = DB::table('member')->where('perusahaan', '=', $kontrak->penyedia)->get();
                foreach ($list_kontraktor as $kontraktor) {
                    pushNotification('Memo', 'Memo kegiatan ' . $kontrak->nm_paket, $kontraktor->nm_member);
                    if ($kontraktor->email != null) Mail::to($kontraktor->email)->send(new MemoMail($bodyEmail));
                }

            } else if ($req->tembusan_ppk == 'true') {

                $bodyEmail = [
                    "role" => "Konsultan",
                    "status" => "Mengirim",
                    "dokumen" => "Memo ",
                    "username" => $kontrak->konsultan,
                    "kepada" => 'Kontraktor',
                    "nm_penerima" => $kontrak->penyedia,
                    "no_dokumen" => $req->nomor_surat,
                    "kegiatan" => $kontrak->nm_paket,
                    "tembusan" => $kontrak->nm_ppk . ' (PPK), Admin ' . $kontrak->unor,
                ];

                $ppk = DB::table('member')->where('nama_lengkap', '=', $kontrak->nm_ppk)->first();
                pushNotification('Memo', 'Memo kegiatan ' . $kontrak->nm_paket, $ppk->nm_member);
                if ($ppk->email != null) Mail::to($ppk->email)->send(new MemoMail($bodyEmail));

            }

            return response()->json([
                'status' => 'success',
                'code' => 201,
                'result' => 'Success menambahkan memo'
            ], Response::HTTP_CREATED);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'failed',
                'code' => 500,
                'result' => $exception->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function responMemoFromMobile(Request $req)
    {
        DB::table('memo')->where('id', '=', $req->id)->update([
            'isi_memo' => $req->memo
        ]);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => 'Success menambahkan respon memo'
        ], Response::HTTP_OK);
    }

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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTotalMemo(Request $req)
    {
        $total = DB::table('memo')
            ->selectRaw('COUNT(*) as total_memo')
            ->groupBy('id_data_umum')
            ->having('id_data_umum', '=', $req->id)
            ->first();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $total == null ? 0 : $total->total_memo
        ]);
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
                }
            }
            if ($req->role == 'KONTRAKTOR') {
                if ($memo->is_readed == 0) {
                    return response()->json([
                        "code" => 200,
                        "memo" => $memo->id
                    ], 200);
                }
            }
            if ($req->role == 'ADMIN-UPTD') {
                if ($memo->admin_readed == 0) {
                    return response()->json([
                        "code" => 200,
                        "memo" => $memo->id
                    ], 200);
                }
            }
            if ($req->role == 'KONSULTAN') {
                if ($memo->konsultan_readed == 0) {
                    return response()->json([
                        "code" => 200,
                        "memo" => $memo->id
                    ], 200);
                }
            }
        }
        return response()->json([
            "code" => 200,
            "memo" => 'null'
        ], 200);
    }

    public function cekMemoKonsultan(Request $req)
    {
        $cek = DB::table('memo')->where('nm_pengirim', $req->nm)->get();
        foreach ($cek as $c) {
            if ($c->respon_memo != null && $c->konsultan_readed == null) {
                return response()->json([
                    "code" => 200,
                    "memo" => $c
                ], 200);
            } else {
                return response()->json([
                    "code" => 200,
                    "memo" => 'null'
                ], 200);
            }
        }
    }

    public function readKonsultan(Request $req)
    {
        DB::table('memo')->where('respon_memo', $req->text)->update([
            "konsultan_readed" => 'Telah Dibaca Pada ' . \Carbon\Carbon::now()
        ]);

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
