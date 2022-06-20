<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UtilsControllers extends Controller
{
    public function getTeamKonsultan(Request $req)
    {
        $result = DB::connection('talikuat_old')->table('master_konsultan')->where('nama', $req->nama)->first();
        $team = DB::connection('talikuat_old')->table('team_konsultan')->where([
            ['id_konsultan', '=', $result->id],
            ['jabatan', '=', 'SITE ENGINEERING']
        ])->get();

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'result' => $team
        ]);
    }

    public function previewPdf(Request $req)
    {
        $fileName = $this->getFileNameOnly($this->getFullFileName($req->file));
        if (!Storage::exists('public/preview-pdf/' . $fileName . '.jpg')) {
            if (!Storage::exists('public/preview-pdf')) {
                Storage::makeDirectory('public/preview-pdf');
            }
            shell_exec('convert -verbose -density 150 -trim "' . Storage::path($req->file) . '[0]" -quality 100 -flatten -sharpen 0x1.0 "' . Storage::path('public/preview-pdf/' . $fileName . '.jpg"'));
        }
        header('Content-Type: image/jpeg');
        echo Storage::get('public/preview-pdf/' . $fileName . '.jpg');
    }

    private function getFullFileName($filePath)
    {
        $explodedFile = explode("/", $filePath);
        return $explodedFile[count($explodedFile) - 1];
    }

    private function getFileNameOnly($file)
    {
        $fileName = $file;
        $splitted = str_split($file);
        for ($i = count($splitted); $i > 0; $i--) {
            if ($splitted[$i - 1] == '.') {
                $fileName = substr($fileName, 0, -1);
                break;
            }
            $fileName = substr($fileName, 0, -1);
        }
        return $fileName;
    }


    public function checkVolume(Request $req)
    {
        $get_volume = DB::connection('talikuat_old')->table('data_umum_adendum')->where([['id_data_umum', $req->id], ['adendum', $req->adendum]])->first();
        if (!$get_volume->volume_adendum) {
            return response()->json([
                'message' => 'null'
            ]);
        } else {
            return response()->json([
                'message' => 'exist'
            ]);
        }
    }
    public function volumeAdendum(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "volume" => "required|min:4|max:6",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'code' => '500',
                'error' => $validator->getMessageBag()->getMessages()
            ], 500);
        }
        try {
            DB::connection('talikuat_old')->table('data_umum_adendum')->where([['id_data_umum', $req->id], ['adendum', $req->adendum]])->update([
                'volume_adendum' => $req->volume
            ]);

            return response()->json([
                'status' => 'success',
                'code' => '200',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'code' => '500',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
