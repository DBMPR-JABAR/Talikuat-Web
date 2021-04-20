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
            'file_dkh' => 'required|mimes:pdf,xlx,xls|max:5048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_dkh');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::table('file_dkh')->insertGetId([
            "id_data_umum" => $req->id,
            "dkh" => $this->PATH_FILE_DB . $name
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

    public function DeleteFileDkh($id)
    {
        $file = DB::table('file_dkh')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->dkh);

        DB::table('file_dkh')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->dkh . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFilePk(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_kontrak' => 'required|mimes:pdf,xlx,xls|max:5048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_kontrak');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::table('file_kontrak')->insertGetId([
            "id_data_umum" => $req->id,
            "kontrak" => $this->PATH_FILE_DB . $name
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
        $file = DB::table('file_kontrak')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->kontrak);

        DB::table('file_kontrak')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->kontrak . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSpmk(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_spmk' => 'required|mimes:pdf,xlx,xls|max:5048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_spmk');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::table('file_spmk')->insertGetId([
            "id_data_umum" => $req->id,
            "spmk" => $this->PATH_FILE_DB . $name
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
        $file = DB::table('file_spmk')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->spmk);

        DB::table('file_spmk')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->spmk . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSyaratUmum(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_syarat_umum' => 'required|mimes:pdf,xlx,xls|max:5048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_syarat_umum');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::table('file_syarat_umum')->insertGetId([
            "id_data_umum" => $req->id,
            "syarat_umum" => $this->PATH_FILE_DB . $name
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
        $file = DB::table('file_syarat_umum')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->syarat_umum);

        DB::table('file_syarat_umum')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->syarat_umum . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSyaratKhusus(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_syarat_khusus' => 'required|mimes:pdf,xlx,xls|max:5048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_syarat_khusus');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::table('file_syarat_khusus')->insertGetId([
            "id_data_umum" => $req->id,
            "syarat_khusus" => $this->PATH_FILE_DB . $name
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
        $file = DB::table('file_syarat_khusus')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->syarat_khusus);

        DB::table('file_syarat_khusus')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->syarat_khusus . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileJpp(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_jpp' => 'required|mimes:pdf,xlx,xls|max:5048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_jpp');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::table('file_jpp')->insertGetId([
            "id_data_umum" => $req->id,
            "jpp" => $this->PATH_FILE_DB . $name
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
        $file = DB::table('file_jpp')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->jpp);

        DB::table('file_jpp')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->jpp . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileRencana(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_rencana' => 'required|mimes:pdf,xlx,xls|max:5048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_rencana');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::table('file_rencana')->insertGetId([
            "id_data_umum" => $req->id,
            "rencana" => $this->PATH_FILE_DB . $name
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
        $file = DB::table('file_rencana')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->rencana);

        DB::table('file_rencana')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->rencana . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSppbj(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_sppbj' => 'required|mimes:pdf,xlx,xls|max:5048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_sppbj');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::table('file_sppbj')->insertGetId([
            "id_data_umum" => $req->id,
            "sppbj" => $this->PATH_FILE_DB . $name
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
        $file = DB::table('file_sppbj')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->sppbj);

        DB::table('file_sppbj')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->sppbj . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSpl(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_spl' => 'required|mimes:pdf,xlx,xls|max:5048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_spl');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::table('file_spl')->insertGetId([
            "id_data_umum" => $req->id,
            "spl" => $this->PATH_FILE_DB . $name
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
        $file = DB::table('file_spl')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->spl);

        DB::table('file_spl')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->spl . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSpekUmum(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_spek_umum' => 'required|mimes:pdf,xlx,xls|max:5048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_spek_umum');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::table('file_spek_umum')->insertGetId([
            "id_data_umum" => $req->id,
            "spek_umum" => $this->PATH_FILE_DB . $name
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
        $file = DB::table('file_spek_umum')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->spek_umum);

        DB::table('file_spek_umum')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->spek_umum . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileJaminan(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_jaminan' => 'required|mimes:pdf,xlx,xls|max:5048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_jaminan');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::table('file_jaminan')->insertGetId([
            "id_data_umum" => $req->id,
            "jaminan" => $this->PATH_FILE_DB . $name
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
        $file = DB::table('file_jaminan')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->jaminan);

        DB::table('file_jaminan')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->jaminan . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }

    public function UploadFileSpkmp(Request $req)
    {

        $valid = validator::make($req->all(), [
            'file_spkmp' => 'required|mimes:pdf,xlx,xls|max:5048'
        ]);

        if ($valid->fails()) {
            return response()->json("File Terlalu Besar atau Format File Salah", Response::HTTP_BAD_REQUEST);
        }

        $file = $req->file('file_spkmp');
        $name = time() . "_" . $file->getClientOriginalName();

        $insertedId = DB::table('file_spkmp')->insertGetId([
            "id_data_umum" => $req->id,
            "spkmp" => $this->PATH_FILE_DB . $name
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
        $file = DB::table('file_spkmp')->where('id', '=', $id)->first();

        if (empty($file)) {
            return response()->json([
                'status' => 'success',
                'code' => '404',
                'result' => "File Tidak Ditemukkan",
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($file->spkmp);

        DB::table('file_spkmp')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->spkmp . " Berhasil Dihapus",
        ], Response::HTTP_OK);
    }
}
