<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
  public function createUser(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'nm_member' => 'required',
      'nama_lengkap' => 'required',
      'akses' => 'required',
      'jabatan' => 'required',
      'alamat_member' => 'required',
      'telp' => 'required',
      'email' => 'required',
      'nik' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'failed',
        'code' => '400',
        'error' => $validator->getMessageBag()->getMessages()
      ], Response::HTTP_BAD_REQUEST);
    }

    DB::table('member')
      ->insertGetId([
        'nm_member' => $request->input('nm_member'),
        'nama_lengkap' => $request->input('nama_lengkap'),
        'akses' => $request->input('akses'),
        'jabatan' => $request->input('jabatan'),
        'alamat_member' => $request->input('alamat_member'),
        'telp' => $request->input('telp'),
        'email' => $request->input('email'),
        'gambar' => $request->input('gambar'),
        'nik' => $request->input('nik'),
        'level' => $request->input('level'),
        'kantor_id' => $request->input('kantor_id'),
        'perusahaan' => $request->input('perusahaan'),
        'unit' => $request->input('unit'),
        'created_at' => Carbon::now()
      ]);
  }

  public function getAllUser()
  {

    $result = DB::table('member')->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getLatestUser()
  {

    $result = DB::table('member')
      ->limit(5)
      ->orderBy('id_member', 'desc')
      ->get();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getUserById($id)
  {

    $result = DB::table('member')->where('id_member', $id)->first();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getAccountByUserId($account_id)
  {

    $result = DB::table('member')
      ->join('login', 'login.id_member', '=', 'member.id_member')
      ->where('login.id_member', $account_id)
      ->select('login.*', 'member.*')
      ->first();

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }

  public function getUserByKeyword(Request $request)
  {

    $keyword = $request->query('keyword');

    $result = DB::table('member')
      ->where('nama_lengkap', 'like', '%' . $keyword . '%')
      ->orWhere('email', 'like', '%' . $keyword . '%')
      ->orWhere('perusahaan', 'like', '%' . $keyword . '%')
      ->orWhere('telp', 'like', '%' . $keyword . '%')
      ->paginate(15);

    return response()->json([
      'status' => 'success',
      'code' => '200',
      'result' => $result
    ]);
  }
  public function register(Request $req)
  {
    $role = $req->role;
    $perusahaan = '';
 switch ($role) {
   case 'PPK':
     $perusahaan = 0;
     break;
    case 'ADMIN-UPTD':
      $perusahaan = 0;
      break;
      case 'KONSULTAN':
        $perusahaan = $req->nm_perusahaan_konsultan;
        break;
        case 'KONTRAKTOR':
          $perusahaan = $req->nm_perusahaan;
          break;
   
 };
    DB::beginTransaction();
    try {
      if ($role == 'KONSULTAN') {
        DB::table('member')->insert([
          'nm_member'=>$req->nm_dpn,
          'nama_lengkap'=>$req->nm_dpn.' '.$req->nm_blkg,
          'akses'=>$role,
          'jabatan'=>$role,
          'alamat_member'=>$req->alamat_user,
          'telp'=>$req->tlp_user,
          'email'=>$req->email,
          'nik'=>$req->nik,
          'perusahaan'=>$perusahaan,
          'unit'=>$req->unit,
          'created_at'=>\Carbon\Carbon::now()
        ]);
      }else{
        DB::table('member')->insert([
          'nm_member'=>$req->nm_dpn,
          'nama_lengkap'=>$req->nm_dpn.' '.$req->nm_blkg,
          'akses'=>$role,
          'jabatan'=>$role,
          'alamat_member'=>$req->alamat_user,
          'telp'=>$req->tlp_user,
          'email'=>$req->email,
          'nik'=>$req->nik,
          'perusahaan'=>$perusahaan,
          'created_at'=>\Carbon\Carbon::now()
        ]);
      }

     

      if ($role == 'KONSULTAN') {
        $id=DB::table('master_konsultan')->insertGetId([
          'nama'=>$perusahaan,
          'alamat'=>$req->alamat_perusahaan_konsultan,
          'nama_direktur'=>$req->nm_direktur_konsultan,
        ]);
        
        $count =1;
        for ($i=0; $i <count($req->nm_se) ; $i++) { 
          DB::table('team_konsultan')->insert([
            'id_konsultan'=>$id,
            'nama'=>$req->nm_se[$i],
            'jabatan'=>'Site Engineer',
            'team'=>'Field Team '.$count,
            'aktive'=>0
          ]);
          $count++;
        }
        $count =1;
        for ($i=0; $i <count($req->nm_ie) ; $i++) { 
          DB::table('team_konsultan')->insert([
            'id_konsultan'=>$id,
            'nama'=>$req->nm_ie[$i],
            'jabatan'=>'Inspetion Engineer',
            'team'=>'Field Team '.$count,
            'aktive'=>0
          ]);
          $count++;
        }
      }
      if ($role =='KONTRAKTOR') {
        DB::table('master_penyedia_jasa')->insert([
          'nama'=>$perusahaan,
          'alamat'=>$req->alamat_perusahaan,
          'nama_direktur'=>$req->nm_direktur,
          'npwp'=>$req->npwp,
          'bank'=>$req->bank,
          'no_rek'=>$req->no_rek,
          'nama_gs'=>$req->nm_gs,
          'telp'=>$req->tlp_perusahaan,
          'created_at'=>\Carbon\Carbon::now()
        ]);

      }

      DB::commit();
    } catch (\Throwable $e) {
      return response()->json([
        "code" => 500,
        "error" => $e
    ], 500);
    }
    return response()->json([
      'status' => 'success',
      'code' => '200',
    ]);
  }

  public function addTeam(Request $req)
  {
    $result =DB::table('team_konsultan')->where('id_konsultan',$req->id)->count();
    if ($result == 0) {
      $team = 1;
    }else{
      $team = ($result / 2)+1;
    }
      DB::table('team_konsultan')->insert([
        'id_konsultan'=>$req->id,
        'nama'=>$req->nm_se,
        'jabatan'=>'SITE ENGINEERING',
        'team'=>'Field Team '.$team,
        'aktive'=>0
      ]);
      DB::table('team_konsultan')->insert([
        'id_konsultan'=>$req->id,
        'nama'=>$req->nm_ie,
        'jabatan'=>'Inspetion Engineer',
        'team'=>'Field Team '.$team,
        'aktive'=>0
      ]);
    return response()->json([
      'status' => 'success',
      'code' => '200'
    ]);
  }

  public function registerTeamKonsultan(Request $req)
  {
    $team = DB::table('team_konsultan')->where('id',$req->id)->first();
    $konsultan = DB::table('master_konsultan')->where('id',$team->id_konsultan)->first();

    try {
      DB::beginTransaction();

      DB::table('member')->insert([
        'nm_member'=>$team->nama,
        'nama_lengkap'=>$team->nama,
        'akses'=>'SITE ENGINEERING',
        'perusahaan'=>$konsultan->nama,
        'jabatan'=>$team->jabatan,
        'alamat_member'=>$req->alamat_user,
        'telp'=>$req->tlp_user,
        'email'=>$req->email,
        'nik'=>$req->nik,
        'unit'=>$req->unit,
        'created_at'=>\Carbon\Carbon::now()
      ]);

      DB::table('team_konsultan')->where('id',$req->id)->update([
        'uptd'=>$req->unit
      ]);
      DB::commit();
    } catch (\Throwable $e) {
      DB::rollback();
      return response()->json([
        "code" => 500,
        "error" => $e
    ], 500);
    }
    return response()->json([
      'status' => 'success',
      'code' => '200',
    ]);
  }

  public function aktivasiUser($id)
  {
    $member = DB::table('member')->where('id_member',$id)->first();
    $team = DB::table('team_konsultan')->where('nama',$member->nm_member)->first();
    if ($member->jabatan == 'SITE ENGINEERING') {
      try {
        DB::beginTransaction();
        DB::table('team_konsultan')->where('nama',$member->nm_member)->update([
          'aktive'=>1,
          'id_member'=>$member->id_member
        ]);
        DB::table('login')->insert([
          'user'=>$member->nik,
          'pass'=>'202cb962ac59075b964b07152d234b70',
          'id_member'=>$member->id_member,
          'level'=>$member->jabatan,
          'id_team'=>$team->id
        ]);
        DB::commit();
      } catch (\Throwable $e) {
        DB::rollback();
        return response()->json([
          'status' =>$e,
          'code'=>500
        ],500);
      }
     
      
    }else{
      DB::table('login')->insert([
        'user'=>$member->nik,
        'pass'=>'202cb962ac59075b964b07152d234b70',
        'id_member'=>$member->id_member,
        'level'=>$member->jabatan,
      ]);
       
    }
    return response()->json([
      'status' =>'oke',
      'code'=>200
    ]);
  }


}
