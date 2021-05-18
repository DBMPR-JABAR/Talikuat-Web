<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
            'kantor_id' => $user_detail->kantor_id,
            'perusahaan' => $user_detail->perusahaan,
            'unit' => $user_detail->unit,
            'created_at' => $user_detail->created_at
        ];

        $token = $user->createToken($user_detail->nama_lengkap);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'result' => $data,
            'token' => $token->plainTextToken
        ]);
    }
}
