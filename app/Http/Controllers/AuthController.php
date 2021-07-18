<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $user = User::firstWhere(['user' => $request->input('user'), 'pass' => md5($request->input('pass'))]);

        if ($user == null) {
            return response()->json([
                'status' => 'failed',
                'code' => 401,
                'result' => 'Username atau password salah'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user_detail = DB::table('member')->where('id_member', '=', $user->id_member)->first();

        $id_uptd = DB::table('kantor')->where('user', $user_detail->kantor_id)->first()->id_kantor;

        $data = [
            'id_login' => $user->id_login,
            'user' => $user->user,
            'level' => $user->level,
            'id_member' => $user->id_member,
            'nm_member' => $user_detail->nm_member,
            'nama_lengkap' => $user_detail->nama_lengkap,
            'akses' => $user_detail->akses,
            'jabatan' => $user_detail->jabatan,
            'alamat_member' => $user_detail->alamat_member,
            'telp' => $user_detail->telp,
            'email' => $user_detail->email,
            'gambar' => $user_detail->gambar,
            'nik' => $user_detail->nik,
            'kantor_id' => $id_uptd,
            'perusahaan' => $user_detail->perusahaan,
            'unit' => $user_detail->unit,
            'created_at' => $user_detail->created_at
        ];

        $token = $user->createToken($user_detail->nama_lengkap);

        Auth::login($user);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $data,
            'token' => $token->plainTextToken,
            'expiresIn' => 60 * 60 * 24
        ]);
    }

    public function checkToken(Request $request)
    {
        $user = $request->user();

        $user_detail = DB::table('member')->where('id_member', '=', $user->id_member)->first();

        $id_uptd = DB::table('kantor')->where('user', $user_detail->kantor_id)->first()->id_kantor;

        $data = [
            'id_login' => $user->id_login,
            'user' => $user->user,
            'level' => $user->level,
            'id_member' => $user->id_member,
            'nm_member' => $user_detail->nm_member,
            'nama_lengkap' => $user_detail->nama_lengkap,
            'akses' => $user_detail->akses,
            'jabatan' => $user_detail->jabatan,
            'alamat_member' => $user_detail->alamat_member,
            'telp' => $user_detail->telp,
            'email' => $user_detail->email,
            'gambar' => $user_detail->gambar,
            'nik' => $user_detail->nik,
            'kantor_id' => $id_uptd,
            'perusahaan' => $user_detail->perusahaan,
            'unit' => $user_detail->unit,
            'created_at' => $user_detail->created_at
        ];

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $data,
        ]);
    }

    public function revokeAllTokens(Request $request)
    {
        try {
            $request->user()->tokens()->delete();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'result' => 'Berhasil Menghapus Semua Token'
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'failed',
                'code' => 500,
                'result' => 'Gagal Menghapus Semua Token'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function saveFcmTokenMobileDevice(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                "id_member" => "required",
                "fcm_token" => "required"
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'failed',
                    'code' => '400',
                    'error' => $validator->getMessageBag()->getMessages()
                ], Response::HTTP_BAD_REQUEST);
            }

            DB::table('fcm_token')->updateOrInsert(
                ["id_member" => $request->id_member],
                ["id_member" => $request->id_member, "device_mobile_token" => $request->fcm_token]
            );

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'result' => 'Berhasil Menambahkan FCM Token'
            ], Response::HTTP_CREATED);

        } catch (\Exception $exception) {

            return response()->json([
                'status' => 'failed',
                'code' => 500,
                'result' => 'Gagal Menambahkan FCM Token'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }
}
