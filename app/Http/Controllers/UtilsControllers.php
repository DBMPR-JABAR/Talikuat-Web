<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UtilsControllers extends Controller
{
    public function getteamKonsltan(Request $req)
    {
        $result = DB::table('master_konsultan')->where('nama', $req->nama)->first();
        $team = DB::table('team_konsultan')->where([
            ['id_konsultan', '=', $result->id],
            ['jabatan', '=', 'SITE ENGINEERING']])->get();

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
            shell_exec('convert -verbose -density 150 -trim "' . str_replace('/', '\\', Storage::path($req->file)) . '[0]" -quality 100 -flatten -sharpen 0x1.0 "' . str_replace('/', '\\', Storage::path('public/preview-pdf/' . $fileName . '.jpg"')));
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
}
