<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    private $PATH_FILE_DOCUMENTS = "/home/www/talikuat/lampiran/file_merge/";
    private $PATH_FILE_DB ="/lampiran/file_merge/";
    public function UploadFileDkh(Request $req){
        $valid = validator::make($req->all(),[
            'file_dkh'=>'required|mimes:pdf,xlx,xls|max:5048'
        ]);
     
        if($valid->fails()){
            return response()->json("File Terlalu Besar atau Format File Salah",Response::HTTP_BAD_REQUEST);
        }
        $file = $req->file('file_dkh');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('file_dkh')->insert([
            "id_data_umum"=>$req->id,
            "dkh"=>$this->PATH_FILE_DB.$name
        ]);
        $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->getClientOriginalName()
          ]);

    }
    public function UploadFilePk(Request $req){
   

        $valid = validator::make($req->all(),[
            'file_kontrak'=>'required|mimes:pdf,xlx,xls|max:5048'
        ]);
     
        if($valid->fails()){
            return response()->json("File Terlalu Besar atau Format File Salah",Response::HTTP_BAD_REQUEST);
        }
        $file = $req->file('file_kontrak');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('file_kontrak')->insert([
            "id_data_umum"=>$req->id,
            "kontrak"=>$this->PATH_FILE_DB.$name
        ]);
        $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->getClientOriginalName()
          ]);

    }
    public function UploadFileSpmk(Request $req){

        $valid = validator::make($req->all(),[
            'file_spmk'=>'required|mimes:pdf,xlx,xls|max:5048'
        ]);
     
        if($valid->fails()){
            return response()->json("File Terlalu Besar atau Format File Salah",Response::HTTP_BAD_REQUEST);
        }
        $file = $req->file('file_spmk');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('file_spmk')->insert([
            "id_data_umum"=>$req->id,
            "spmk"=>$this->PATH_FILE_DB.$name
        ]);
        $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->getClientOriginalName()
          ]);

    }
    public function UploadFileSyaratUmum(Request $req){
   

        $valid = validator::make($req->all(),[
            'file_syarat_umum'=>'required|mimes:pdf,xlx,xls|max:5048'
        ]);
     
        if($valid->fails()){
            return response()->json("File Terlalu Besar atau Format File Salah",Response::HTTP_BAD_REQUEST);
        }
        $file = $req->file('file_syarat_umum');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('file_syarat_umum')->insert([
            "id_data_umum"=>$req->id,
            "syarat_umum"=>$this->PATH_FILE_DB.$name
        ]);
        $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->getClientOriginalName()
          ]);

    }
    public function UploadFileSyaratKhusus(Request $req){
   

        $valid = validator::make($req->all(),[
            'file_syarat_khusus'=>'required|mimes:pdf,xlx,xls|max:5048'
        ]);
     
        if($valid->fails()){
            return response()->json("File Terlalu Besar atau Format File Salah",Response::HTTP_BAD_REQUEST);
        }
        $file = $req->file('file_syarat_khusus');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('file_syarat_khusus')->insert([
            "id_data_umum"=>$req->id,
            "syarat_khusus"=>$this->PATH_FILE_DB.$name
        ]);
        $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->getClientOriginalName()
          ]);

    }
    public function UploadFileJpp(Request $req){
   

        $valid = validator::make($req->all(),[
            'file_jpp'=>'required|mimes:pdf,xlx,xls|max:5048'
        ]);
     
        if($valid->fails()){
            return response()->json("File Terlalu Besar atau Format File Salah",Response::HTTP_BAD_REQUEST);
        }
        $file = $req->file('file_jpp');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('file_jpp')->insert([
            "id_data_umum"=>$req->id,
            "jpp"=>$this->PATH_FILE_DB.$name
        ]);
        $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->getClientOriginalName()
          ]);
    }
    public function UploadFileRencana(Request $req){
   

        $valid = validator::make($req->all(),[
            'file_rencana'=>'required|mimes:pdf,xlx,xls|max:5048'
        ]);
     
        if($valid->fails()){
            return response()->json("File Terlalu Besar atau Format File Salah",Response::HTTP_BAD_REQUEST);
        }
        $file = $req->file('file_rencana');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('file_rencana')->insert([
            "id_data_umum"=>$req->id,
            "rencana"=>$this->PATH_FILE_DB.$name
        ]);
        $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->getClientOriginalName()
          ]);

    }
    public function UploadFileSppbj(Request $req){
   

        $valid = validator::make($req->all(),[
            'file_sppbj'=>'required|mimes:pdf,xlx,xls|max:5048'
        ]);
     
        if($valid->fails()){
            return response()->json("File Terlalu Besar atau Format File Salah",Response::HTTP_BAD_REQUEST);
        }
        $file = $req->file('file_sppbj');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('file_sppbj')->insert([
            "id_data_umum"=>$req->id,
            "sppbj"=>$this->PATH_FILE_DB.$name
        ]);
        $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->getClientOriginalName()
          ]);

    }
    public function UploadFileSpl(Request $req){
   

        $valid = validator::make($req->all(),[
            'file_spl'=>'required|mimes:pdf,xlx,xls|max:5048'
        ]);
     
        if($valid->fails()){
            return response()->json("File Terlalu Besar atau Format File Salah",Response::HTTP_BAD_REQUEST);
        }
        $file = $req->file('file_spl');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('file_spl')->insert([
            "id_data_umum"=>$req->id,
            "spl"=>$this->PATH_FILE_DB.$name
        ]);
        $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->getClientOriginalName()
          ]);

    }
    public function UploadFileSpekUmum(Request $req){
   

        $valid = validator::make($req->all(),[
            'file_spek_umum'=>'required|mimes:pdf,xlx,xls|max:5048'
        ]);
     
        if($valid->fails()){
            return response()->json("File Terlalu Besar atau Format File Salah",Response::HTTP_BAD_REQUEST);
        }
        $file = $req->file('file_spek_umum');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('file_spek_umum')->insert([
            "id_data_umum"=>$req->id,
            "spek_umum"=>$this->PATH_FILE_DB.$name
        ]);
        $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->getClientOriginalName()
          ]);

    }
    public function UploadFileJaminan(Request $req){
   

        $valid = validator::make($req->all(),[
            'file_jaminan'=>'required|mimes:pdf,xlx,xls|max:5048'
        ]);
     
        if($valid->fails()){
            return response()->json("File Terlalu Besar atau Format File Salah",Response::HTTP_BAD_REQUEST);
        }
        $file = $req->file('file_jaminan');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('file_jaminan')->insert([
            "id_data_umum"=>$req->id,
            "jaminan"=>$this->PATH_FILE_DB.$name
        ]);
        $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->getClientOriginalName()
          ]);

    }
    public function UploadFileSpkmp(Request $req){
   

        $valid = validator::make($req->all(),[
            'file_spkmp'=>'required|mimes:pdf,xlx,xls|max:5048'
        ]);
     
        if($valid->fails()){
            return response()->json("File Terlalu Besar atau Format File Salah",Response::HTTP_BAD_REQUEST);
        }
        $file = $req->file('file_spkmp');
        $name = time()."_".$file->getClientOriginalName();
        DB::table('file_spkmp')->insert([
            "id_data_umum"=>$req->id,
            "spkmp"=>$this->PATH_FILE_DB.$name
        ]);
        $file->move($this->PATH_FILE_DOCUMENTS, $name);

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $file->getClientOriginalName()
          ]);

    }
}
