<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{

    // private $PATH_FILE_DOCUMENTS = "/home/www/talikuat/lampiran/file_unmerge/";
    private $PATH_FILE_DB = "public/lampiran/file_unmerge/";

    public function UploadFileDkh(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_dkh' => 'required|mimes:pdf,xlx,xls|max:17048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_dkh');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::connection('talikuat_old')->table('file_dkh')->insertGetId([
            "id_data_umum" => $req->id,
            "dkh" => $this->PATH_FILE_DB . $name,
            "created_at" => \Carbon\Carbon::now()
        ]);

        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

        // $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '201',
            'result' => $file->getClientOriginalName(),
            'result_mobile' => [
                'id' => $insertedId,
                'filename' => $name,
                'filesize' => $file->getSize()
            ]
        ], Response::HTTP_CREATED);
    }

    public function getUploadedFile($id, Request $request)
    {
        if (empty($request->input('file'))) {
            return response()->json([
                'status' => 'failed',
                'code' => '404',
                'result' => 'file Tidak Boleh Kosong'
            ], Response::HTTP_BAD_REQUEST);
        }

        $result = null;

        switch ($request->input('file')) {

            case "file_dkh":

                $result = DB::connection('talikuat_old')->table('file_dkh')->selectRaw("id, dkh as filename")->where("id_data_umum", "=", $id)->get();

                break;

            case "file_kontrak":

                $result = DB::connection('talikuat_old')->table('file_kontrak')->selectRaw("id, kontrak as filename")->where("id_data_umum", "=", $id)->get();

                break;

            case "file_spmk":

                $result = DB::connection('talikuat_old')->table('file_spmk')->selectRaw("id, spmk as filename")->where("id_data_umum", "=", $id)->get();

                break;

            case "file_syarat_umum":

                $result = DB::connection('talikuat_old')->table('file_syarat_umum')->selectRaw("id, syarat_umum as filename")->where("id_data_umum", "=", $id)->get();

                break;

            case "file_syarat_khusus":

                $result = DB::connection('talikuat_old')->table('file_syarat_khusus')->selectRaw("id, syarat_khusus as filename")->where("id_data_umum", "=", $id)->get();

                break;

            case "file_jpp":

                $result = DB::connection('talikuat_old')->table('file_jpp')->selectRaw("id, jpp as filename")->where("id_data_umum", "=", $id)->get();

                break;

            case "file_rencana":

                $result = DB::connection('talikuat_old')->table('file_rencana')->selectRaw("id, rencana as filename")->where("id_data_umum", "=", $id)->get();

                break;

            case "file_sppbj":

                $result = DB::connection('talikuat_old')->table('file_sppbj')->selectRaw("id, sppbj as filename")->where("id_data_umum", "=", $id)->get();

                break;

            case "file_spl":

                $result = DB::connection('talikuat_old')->table('file_spl')->selectRaw("id, spl as filename")->where("id_data_umum", "=", $id)->get();

                break;

            case "file_spek_umum":

                $result = DB::connection('talikuat_old')->table('file_spek_umum')->selectRaw("id, spek_umum as filename")->where("id_data_umum", "=", $id)->get();

                break;

            case "file_jaminan":

                $result = DB::connection('talikuat_old')->table('file_jaminan')->selectRaw("id, jaminan as filename")->where("id_data_umum", "=", $id)->get();

                break;

            case "file_spkmp":

                $result = DB::connection('talikuat_old')->table('file_spkmp')->selectRaw("id, spkmp as filename")->where("id_data_umum", "=", $id)->get();

                break;
        }

        foreach ($result as $file) {
            $file->filesize = Storage::size($file->filename);
            $file->filename = explode('/', $file->filename)[3];
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $result
        ], Response::HTTP_OK);
    }

    public function DeleteFileDkh($id)
    {
        $file = DB::connection('talikuat_old')->table('file_dkh')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->dkh);

        DB::connection('talikuat_old')->table('file_dkh')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->dkh . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFilePk(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_kontrak' => 'required|mimes:pdf,xlx,xls|max:17048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_kontrak');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::connection('talikuat_old')->table('file_kontrak')->insertGetId([
            "id_data_umum" => $req->id,
            "kontrak" => $this->PATH_FILE_DB . $name,
            "created_at" => \Carbon\Carbon::now()
        ]);

        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

        // $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '201',
            'result' => $file->getClientOriginalName(),
            'result_mobile' => [
                'id' => $insertedId,
                'filename' => $name,
                'filesize' => $file->getSize()
            ]
        ], Response::HTTP_CREATED);
    }

    public function DeleteFilePk($id)
    {
        $file = DB::connection('talikuat_old')->table('file_kontrak')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->kontrak);

        DB::connection('talikuat_old')->table('file_kontrak')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->kontrak . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSpmk(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_spmk' => 'required|mimes:pdf,xlx,xls|max:17048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_spmk');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::connection('talikuat_old')->table('file_spmk')->insertGetId([
            "id_data_umum" => $req->id,
            "spmk" => $this->PATH_FILE_DB . $name,
            "created_at" => \Carbon\Carbon::now()
        ]);

        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

        // $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '201',
            'result' => $file->getClientOriginalName(),
            'result_mobile' => [
                'id' => $insertedId,
                'filename' => $name,
                'filesize' => $file->getSize()
            ]
        ], Response::HTTP_CREATED);
    }

    public function DeleteFileSpmk($id)
    {
        $file = DB::connection('talikuat_old')->table('file_spmk')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->spmk);

        DB::connection('talikuat_old')->table('file_spmk')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->spmk . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSyaratUmum(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_syarat_umum' => 'required|mimes:pdf,xlx,xls|max:17048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_syarat_umum');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::connection('talikuat_old')->table('file_syarat_umum')->insertGetId([
            "id_data_umum" => $req->id,
            "syarat_umum" => $this->PATH_FILE_DB . $name,
            "created_at" => \Carbon\Carbon::now()
        ]);

        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

        // $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '201',
            'result' => $file->getClientOriginalName(),
            'result_mobile' => [
                'id' => $insertedId,
                'filename' => $name,
                'filesize' => $file->getSize()
            ]
        ], Response::HTTP_CREATED);
    }

    public function DeleteFileSyaratUmum($id)
    {
        $file = DB::connection('talikuat_old')->table('file_syarat_umum')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->syarat_umum);

        DB::connection('talikuat_old')->table('file_syarat_umum')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->syarat_umum . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSyaratKhusus(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_syarat_khusus' => 'required|mimes:pdf,xlx,xls|max:17048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_syarat_khusus');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::connection('talikuat_old')->table('file_syarat_khusus')->insertGetId([
            "id_data_umum" => $req->id,
            "syarat_khusus" => $this->PATH_FILE_DB . $name,
            "created_at" => \Carbon\Carbon::now()
        ]);

        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

        // $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '201',
            'result' => $file->getClientOriginalName(),
            'result_mobile' => [
                'id' => $insertedId,
                'filename' => $name,
                'filesize' => $file->getSize()
            ]
        ], Response::HTTP_CREATED);
    }

    public function DeleteFileSyaratKhusus($id)
    {
        $file = DB::connection('talikuat_old')->table('file_syarat_khusus')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->syarat_khusus);

        DB::connection('talikuat_old')->table('file_syarat_khusus')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->syarat_khusus . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileJpp(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_jpp' => 'required|mimes:pdf,xlx,xls|max:17048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_jpp');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::connection('talikuat_old')->table('file_jpp')->insertGetId([
            "id_data_umum" => $req->id,
            "jpp" => $this->PATH_FILE_DB . $name,
            "created_at" => \Carbon\Carbon::now()
        ]);

        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

        // $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '201',
            'result' => $file->getClientOriginalName(),
            'result_mobile' => [
                'id' => $insertedId,
                'filename' => $name,
                'filesize' => $file->getSize()
            ]
        ], Response::HTTP_CREATED);
    }

    public function DeleteFileJpp($id)
    {
        $file = DB::connection('talikuat_old')->table('file_jpp')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->jpp);

        DB::connection('talikuat_old')->table('file_jpp')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->jpp . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileRencana(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_rencana' => 'required|mimes:pdf,xlx,xls|max:17048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_rencana');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::connection('talikuat_old')->table('file_rencana')->insertGetId([
            "id_data_umum" => $req->id,
            "rencana" => $this->PATH_FILE_DB . $name,
            "created_at" => \Carbon\Carbon::now()
        ]);

        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

        // $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '201',
            'result' => $file->getClientOriginalName(),
            'result_mobile' => [
                'id' => $insertedId,
                'filename' => $name,
                'filesize' => $file->getSize()
            ]
        ], Response::HTTP_CREATED);
    }

    public function DeleteFileRencana($id)
    {
        $file = DB::connection('talikuat_old')->table('file_rencana')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->rencana);

        DB::connection('talikuat_old')->table('file_rencana')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->rencana . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSppbj(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_sppbj' => 'required|mimes:pdf,xlx,xls|max:17048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_sppbj');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::connection('talikuat_old')->table('file_sppbj')->insertGetId([
            "id_data_umum" => $req->id,
            "sppbj" => $this->PATH_FILE_DB . $name,
            "created_at" => \Carbon\Carbon::now()
        ]);

        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

        // $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '201',
            'result' => $file->getClientOriginalName(),
            'result_mobile' => [
                'id' => $insertedId,
                'filename' => $name,
                'filesize' => $file->getSize()
            ]
        ], Response::HTTP_CREATED);
    }

    public function DeleteFileSppbj($id)
    {
        $file = DB::connection('talikuat_old')->table('file_sppbj')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->sppbj);

        DB::connection('talikuat_old')->table('file_sppbj')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->sppbj . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSpl(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_spl' => 'required|mimes:pdf,xlx,xls|max:17048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_spl');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::connection('talikuat_old')->table('file_spl')->insertGetId([
            "id_data_umum" => $req->id,
            "spl" => $this->PATH_FILE_DB . $name,
            "created_at" => \Carbon\Carbon::now()
        ]);

        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

        // $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '201',
            'result' => $file->getClientOriginalName(),
            'result_mobile' => [
                'id' => $insertedId,
                'filename' => $name,
                'filesize' => $file->getSize()
            ]
        ], Response::HTTP_CREATED);
    }

    public function DeleteFileSpl($id)
    {
        $file = DB::connection('talikuat_old')->table('file_spl')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->spl);

        DB::connection('talikuat_old')->table('file_spl')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->spl . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSpekUmum(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_spek_umum' => 'required|mimes:pdf,xlx,xls|max:17048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_spek_umum');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::connection('talikuat_old')->table('file_spek_umum')->insertGetId([
            "id_data_umum" => $req->id,
            "spek_umum" => $this->PATH_FILE_DB . $name,
            "created_at" => \Carbon\Carbon::now()
        ]);

        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

        // $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '201',
            'result' => $file->getClientOriginalName(),
            'result_mobile' => [
                'id' => $insertedId,
                'filename' => $name,
                'filesize' => $file->getSize()
            ]
        ], Response::HTTP_CREATED);
    }

    public function DeleteFileSpekUmum($id)
    {
        $file = DB::connection('talikuat_old')->table('file_spek_umum')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->spek_umum);

        DB::connection('talikuat_old')->table('file_spek_umum')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->spek_umum . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileJaminan(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_jaminan' => 'required|mimes:pdf,xlx,xls|max:17048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_jaminan');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::connection('talikuat_old')->table('file_jaminan')->insertGetId([
            "id_data_umum" => $req->id,
            "jaminan" => $this->PATH_FILE_DB . $name,
            "created_at" => \Carbon\Carbon::now()
        ]);

        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

        // $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '201',
            'result' => $file->getClientOriginalName(),
            'result_mobile' => [
                'id' => $insertedId,
                'filename' => $name,
                'filesize' => $file->getSize()
            ]
        ], Response::HTTP_CREATED);
    }

    public function DeleteFileJaminan($id)
    {
        $file = DB::connection('talikuat_old')->table('file_jaminan')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->jaminan);

        DB::connection('talikuat_old')->table('file_jaminan')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->jaminan . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSpkmp(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_spkmp' => 'required|mimes:pdf,xlx,xls|max:17048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_spkmp');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::connection('talikuat_old')->table('file_spkmp')->insertGetId([
            "id_data_umum" => $req->id,
            "spkmp" => $this->PATH_FILE_DB . $name,
            "created_at" => \Carbon\Carbon::now()
        ]);

        Storage::putFileAs($this->PATH_FILE_DB, $file, $name);

        // $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '201',
            'result' => $file->getClientOriginalName(),
            'result_mobile' => [
                'id' => $insertedId,
                'filename' => $name,
                'filesize' => $file->getSize()
            ]
        ], Response::HTTP_CREATED);
    }

    public function DeleteFileSpkmp($id)
    {
        $file = DB::connection('talikuat_old')->table('file_spkmp')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->spkmp);

        DB::connection('talikuat_old')->table('file_spkmp')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->spkmp . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }
    public function fileSpekUmum(Request $req)
    {
      DB::connection('talikuat_old')->table('file_spek_umum_update')->insert([
        "id_data_umum"=>$req->id,
        "file_spek_umum_update"=>$req->link_umum,
        "created_at"=>\Carbon\Carbon::now()
      ]);
      
      return response()->json([
        'code'=>200,
        'status'=>'Data Sudah Di Simpan'
      ],200);

    }
    public function fileGambarRencana(Request $req)
    {
      DB::connection('talikuat_old')->table('file_rencana_link')->insert([
        "id_data_umum"=>$req->id,
        "file_rencana_link"=>$req->link_rencana,
        "created_at"=>\Carbon\Carbon::now()
      ]);
      
      return response()->json([
        'code'=>200,
        'status'=>'Data Sudah Di Simpan'
      ],200);

    }
}
