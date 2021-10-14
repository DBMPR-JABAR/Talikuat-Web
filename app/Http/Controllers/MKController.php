<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class MKController extends Controller
{
    public function responMK(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $validator = Validator::make($req->all(), [
            "laporan" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'result' => $validator->errors()->first()
            ], 400);
        }

        if ($req->laporan == 1) {
            DB::table('request')->where('id', $req->id)->update([
                "mk" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 4
            ]);
            DB::table('history_request')->insert([
                "username" => 'MK',
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Request Telah Disetujui Oleh MK",
                "created_at" => \Carbon\Carbon::now()
            ]);
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "MK",
                "status" => "Menyetujui",
                "revisi" => "",
                "username" => "MK",
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                //pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Disetujui Oleh " . "MK", $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            $bodyEmail = [
                "role" => "MK",
                "status" => "Menyetujui",
                "revisi" => "",
                "username" => "MK",
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                //pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Disetujui Oleh " . "MK", $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            $bodyEmail = [
                "role" => "MK",
                "status" => "Mengirim",
                "revisi" => "",
                "username" => "MK",
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('nama_lengkap', '=', $get_data->nama_ppk)->get();
            foreach ($mailto as $email) {
                //pushNotification("Request Pekerjaan", "Request Pekerjaan Telah Dikirim Oleh " . "MK", $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            return response()->json([
                "code" => 200
            ], 200);
        } else {
            DB::table('request')->where('id', $req->id)->update([
                "mk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_mk" => $req->catatan,
                "status" => 2,
                "ditolak" => 1,
            ]);
            DB::table('history_request')->insert([
                "username" => "MK",
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Request Telah Ditolak Oleh MK ",
                "created_at" => \Carbon\Carbon::now()
            ]);
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "MK",
                "status" => "Menolak",
                "revisi" => "",
                "username" => "MK",
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                //pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Ditolak Oleh MK", $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            return response()->json([
                "code" => 200
            ], 200);
        }
    }

    public function responseRequestMkFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            // Data Umum
            "id" => "required",
            "userId" => "required",
            "isAccepted" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'error' => $validator->getMessageBag()->getMessages()
            ], 400);
        }

        if ($req->isAccepted == "true") {
            DB::table('request')->where('id', $req->id)->update([
                "mk" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 4,
            ]);
            if ($req->catatan != NULL) {
                DB::table('request')->where('id', $req->id)->update([
                    "catatan_mk" => $req->catatan
                ]);
            }
            DB::table('history_request')->insert([
                "username" => "MK",
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Request Telah Disetujui Oleh MK",
                "created_at" => \Carbon\Carbon::now()
            ]);
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "MK",
                "status" => "Menyetujui",
                "revisi" => "",
                "username" => "MK",
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari MK", "Request Pekerjaan Telah Disetujui Oleh MK", $email->nm_member);
                if ($email->email != null) {
                    try {
                        Mail::to($email->email)->send(new TestEmail($bodyEmail));
                    } catch (\Exception $e) {

                    }
                }
            }
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari MK", "Request Pekerjaan Telah Disetujui Oleh MK", $email->nm_member);
                if ($email->email != null) {
                    try {
                        Mail::to($email->email)->send(new TestEmail($bodyEmail));
                    } catch (\Exception $e) {

                    }
                }
            }
            $mailto = DB::table('member')->where('nama_lengkap', '=', $get_data->nama_ppk)->get();
            foreach ($mailto as $email) {
                pushNotification("Request Pekerjaan", "Request Pekerjaan Telah Dikirim Oleh MK", $email->nm_member);
                if ($email->email != null) {
                    try {
                        Mail::to($email->email)->send(new TestEmail($bodyEmail));
                    } catch (\Exception $e) {

                    }
                }
            }
            return response()->json([
                "status" => "success",
                "code" => 201,
                "result" => "Response request pekerjaan dari mk berhasil disimpan"
            ], ResponseAlias::HTTP_CREATED);
        } else {
            DB::table('request')->where('id', $req->id)->update([
                "mk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_mk" => $req->catatan,
                "status" => 2,
                "ditolak" => 1,
            ]);
            DB::table('history_request')->insert([
                "username" => "MK",
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Request Telah Ditolak Oleh MK",
                "created_at" => \Carbon\Carbon::now()
            ]);
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "MK",
                "status" => "Menolak",
                "revisi" => "",
                "username" => "MK",
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari MK", "Request Pekerjaan Telah Ditolak Oleh MK", $email->nm_member);
                if ($email->email != null) {
                    try {
                        Mail::to($email->email)->send(new TestEmail($bodyEmail));
                    } catch (\Exception $e) {

                    }
                }
            }
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Ditolak Oleh MK", $email->nm_member);
                if ($email->email != null) {
                    try {
                        Mail::to($email->email)->send(new TestEmail($bodyEmail));
                    } catch (\Exception $e) {

                    }
                }
            }
            return response()->json([
                "status" => "success",
                "code" => 201,
                "result" => "Response request pekerjaan dari mk berhasil disimpan"
            ], ResponseAlias::HTTP_CREATED);
        }
    }

    public function revisiResponseRequestMkFromMobile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            // Data Umum
            "id" => "required",
            "userId" => "required",
            "isAccepted" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '400',
                'error' => $validator->getMessageBag()->getMessages()
            ], 400);
        }

        if ($req->isAccepted == "true") {
            DB::table('request')->where('id', $req->id)->update([
                "mk" => '<a href="#"><span class="fas fa-check-square" style="color:green;font-size:18px"  title="Disetujui">&nbsp;</span></a>',
                "ppk" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "status" => 4,
                "ditolak" => 0,
            ]);
            if ($req->catatan != NULL) {
                DB::table('request')->where('id', $req->id)->update([
                    "catatan_mk" => $req->catatan
                ]);
            }
            DB::table('history_request')->insert([
                "username" => "MK",
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "sukses",
                "keterangan" => "Request Telah Disetujui Oleh MK",
                "created_at" => \Carbon\Carbon::now()
            ]);
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "MK",
                "status" => "Menyetujui",
                "revisi" => "",
                "username" => "MK",
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('nama_lengkap', '=', $get_data->nama_ppk)->get();
            foreach ($mailto as $email) {
                pushNotification("Revisi Request Pekerjaan", "Revisi Request Pekerjaan Telah Dikirim Oleh MK", $email->nm_member);
                if ($email->email != null) {
                    try {
                        Mail::to($email->email)->send(new TestEmail($bodyEmail));
                    } catch (\Exception $e) {

                    }
                }
            }
            return response()->json([
                "status" => "success",
                "code" => 201,
                "result" => "Response request pekerjaan dari mk berhasil disimpan"
            ], ResponseAlias::HTTP_CREATED);
        } else {
            DB::table('request')->where('id', $req->id)->update([
                "mk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Di Tolak">&nbsp;</span></a>',
                "catatan_mk" => $req->catatan,
                "status" => 2,
                "ditolak" => 1,
            ]);
            DB::table('history_request')->insert([
                "username" => "MK",
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Request Telah Ditolak Oleh MK",
                "created_at" => \Carbon\Carbon::now()
            ]);
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "MK",
                "status" => "Menolak",
                "revisi" => "",
                "username" => "MK",
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_kontraktor)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari MK", "Request Pekerjaan Telah Ditolak Oleh MK", $email->nm_member);
                if ($email->email != null) {
                    try {
                        Mail::to($email->email)->send(new TestEmail($bodyEmail));
                    } catch (\Exception $e) {

                    }
                }
            }
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                pushNotification("Response Request Pekerjaan dari PPK", "Request Pekerjaan Telah Ditolak Oleh MK", $email->nm_member);
                if ($email->email != null) {
                    try {
                        Mail::to($email->email)->send(new TestEmail($bodyEmail));
                    } catch (\Exception $e) {

                    }
                }
            }
            return response()->json([
                "status" => "success",
                "code" => 201,
                "result" => "Response request pekerjaan dari mk berhasil disimpan"
            ], ResponseAlias::HTTP_CREATED);
        }
    }

    public function revisiMk(Request $req)
    {
            DB::table('request')->where('id', $req->id)->update([
                "konsultan" => '<a href="#"><span class="fas fa-check-square" style="color:yellow;font-size:18px"  title="Menunggu Persetujuan">&nbsp;</span></a>',
                "mk" => '<a href="#"><span class="fas fa-check-square" style="color:red;font-size:18px"  title="Ditolak">&nbsp;</span></a>',
                "status" => 2,
                "ditolak" => 1
            ]);
            DB::table('history_request')->insert([
                "username" => $req->konsultan,
                "id_request" => $req->id,
                "user_id" => $req->userId,
                "class" => "reject",
                "keterangan" => "Request Dikembalikan ke Konsultan Oleh " . $req->konsultan,
                "created_at" => \Carbon\Carbon::now()
            ]);
            
            $get_data = DB::table('request')->where('id', $req->id)->first();
            $bodyEmail = [
                "role" => "MK",
                "status" => "Menolak",
                "revisi" => "",
                "username" => $req->konsultan,
                "no_dokumen" => $req->id,
                "kegiatan" => $get_data->nama_kegiatan,
                "lokasi" => $get_data->lokasi_sta,
                "jenis_pekerjaan" => $get_data->jenis_pekerjaan,
                "volume" => $get_data->volume,
                "note" => ""
            ];
            $mailto = DB::table('member')->where('perusahaan', '=', $get_data->nama_direksi)->get();
            foreach ($mailto as $email) {
                //pushNotification("Response Request Pekerjaan dari Konsultan", "Request Pekerjaan Telah Ditolak Oleh " . $get_data->nama_direksi, $email->nm_member);
                Mail::to($email->email)->send(new TestEmail($bodyEmail));
            }
            return response()->json([
                "code" => 200
            ], 200);
        
    }
}
