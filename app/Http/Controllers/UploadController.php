<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    private $PATH_FILE_DOCUMENTS = "C:\\xampp\\htdocs\\talikuat\\lampiran\\umum";
    public function UploadFileDkh(Request $req){

        $valid = validator::make($req->all(),[
            'file_dkh'=>'required|mimes:pdf,xlx,xls|max:5048'
        ]);
     
        if($valid->fails()){
            return response()->json("File Terlalu Besar atau Format File Salah",Response::HTTP_BAD_REQUEST);
        }
        $fileDkh = $req->file('file_dkh');
        
        $fileDkh->move($this->PATH_FILE_DOCUMENTS, $fileDkh->getClientOriginalName());

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $fileDkh->getClientOriginalName()
          ]);

    }
}
