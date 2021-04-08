<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MergePdf extends Controller
{
    public function merge(Request $req){
        
        switch ($req->file) {
            case "file_dkh":
         $get_file = DB::table($req->file)->where("id_data_umum","=",$req->id)->get();
         $get_data = DB::table('data_umum')->select("file_dkh")->where("id","=",$req->id)->first();
         if (count($get_file) == 1) {
             $nameFIle = $get_file[0]->dkh;
            if ($get_data->file_dkh== null) {
                DB::table('data_umum')->where("id","=",$req->id)->update([
                    "file_dkh"=>$nameFIle
                ]);
                 DB::table('file_dkh')->where('dkh',"=",$nameFIle)->delete();
                return response()->json([
                    'status' => 'success',
                    'code' => "200"
                  ]);
            }else{
                DB::table('file_dkh_update')->insert([
                    "id_data_umum"=>$req->id,
                    "file_dkh_update"=>$nameFIle
                ]);
                DB::table('file_dkh')->where('dkh',"=",$nameFIle)->delete();
                return response()->json([
                    'status' => 'success',
                    'code' => "200"
                  ]);
            }
        }else{
        $pdf = new \Jurosh\PDFMerge\PDFMerger;
        foreach ($get_file as $file) {
         $pdf->addPDF(public_path($file->dkh), 'all');
        }
        $nameFIle = "file_merge/".time()."_DKH.pdf";
        //merge PDF ke path file
        $pdf->merge('file', public_path($nameFIle));
        if ($get_data->file_dkh == null) {
            DB::table('data_umum')->where("id",$req->id)->update([
                "file_dkh"=>$nameFIle
            ]);
            foreach($get_file as $file){
                DB::table('file_dkh')->where('dkh',"=",$file->dkh)->delete();
                }
            return response()->json([
                'status' => 'success',
                'code' => "200"
              ]);
        }else{
            DB::table('file_dkh_update')->insert([
                "id_data_umum"=>$req->id,
                "file_dkh_update"=>$nameFIle
            ]);
            foreach($get_file as $file){
            DB::table('file_dkh')->where('dkh',"=",$file->dkh)->delete();
            }
            return response()->json([
                'status' => 'success',
                'code' => "200"
              ]);
            }
        }
            break;
            //File Kontrak -------------->
            case "file_kontrak":
                $get_file = DB::table($req->file)->where("id_data_umum","=",$req->id)->get();
                $get_data = DB::table('data_umum')->select("file_perjanjian_kontrak")->where("id","=",$req->id)->first();
                if (count($get_file) == 1) {
                    $nameFIle = $get_file[0]->kontrak;
                   if ($get_data->file_perjanjian_kontrak == null) {
                       DB::table('data_umum')->where("id","=",$req->id)->update([
                           "file_perjanjian_kontrak"=>$nameFIle
                       ]);
                        DB::table($req->file)->where('kontrak',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }else{
                       DB::table('file_kontrak_update')->insert([
                           "id_data_umum"=>$req->id,
                           "file_kontrak_update"=>$nameFIle
                       ]);
                       DB::table($req->file)->where('kontrak',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }
               }else{
               $pdf = new \Jurosh\PDFMerge\PDFMerger;
               foreach ($get_file as $file) {
                $pdf->addPDF(public_path($file->kontrak), 'all');
               }
               $nameFIle = "file_merge/".time()."_Kontrak.pdf";
               //merge PDF ke path file
               $pdf->merge('file', public_path($nameFIle));
               if ($get_data->file_perjanjian_kontrak == null) {
                   DB::table('data_umum')->where("id",$req->id)->update([
                       "file_perjanjian_kontrak"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                       DB::table($req->file)->where('kontrak',"=",$file->kontrak)->delete();
                       }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
               }else{
                   DB::table('file_kontrak_update')->insert([
                       "id_data_umum"=>$req->id,
                       "file_kontrak_update"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                   DB::table($req->file)->where('kontrak',"=",$file->kontrak)->delete();
                   }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
                   }
               }

                break;
            //<================================================== File SPMK ==================================>
            case "file_spmk":
                $get_file = DB::table($req->file)->where("id_data_umum","=",$req->id)->get();
                $get_data = DB::table('data_umum')->select("file_spmk")->where("id","=",$req->id)->first();
                if (count($get_file) == 1) {
                    $nameFIle = $get_file[0]->spmk;
                   if ($get_data->file_spmk == null) {
                       DB::table('data_umum')->where("id","=",$req->id)->update([
                           "file_spmk"=>$nameFIle
                       ]);
                        DB::table($req->file)->where('spmk',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }else{
                       DB::table('file_spmk_update')->insert([
                           "id_data_umum"=>$req->id,
                           "file_spmk_update"=>$nameFIle
                       ]);
                       DB::table($req->file)->where('spmk',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }
               }else{
               $pdf = new \Jurosh\PDFMerge\PDFMerger;
               foreach ($get_file as $file) {
                $pdf->addPDF(public_path($file->spmk), 'all');
               }
               $nameFIle = "file_merge/".time()."_spmk.pdf";
               //merge PDF ke path file
               $pdf->merge('file', public_path($nameFIle));
               if ($get_data->file_spmk == null) {
                   DB::table('data_umum')->where("id",$req->id)->update([
                       "file_spmk"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                       DB::table($req->file)->where('spmk',"=",$file->spmk)->delete();
                       }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
               }else{
                   DB::table('file_spmk_update')->insert([
                       "id_data_umum"=>$req->id,
                       "file_spmk_update"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                   DB::table($req->file)->where('spmk',"=",$file->spmk)->delete();
                   }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
                   }
               }

                break;

                //<================================ FILE Syarat Umum ==================>
                case "file_syarat_umum":
                    $get_file = DB::table($req->file)->where("id_data_umum","=",$req->id)->get();
                    $get_data = DB::table('data_umum')->select("file_syarat_umum")->where("id","=",$req->id)->first();
                    if (count($get_file) == 1) {
                        $nameFIle =$get_file[0]->syarat_umum;
                       if ($get_data->file_syarat_umum == null) {
                           DB::table('data_umum')->where("id","=",$req->id)->update([
                               "file_syarat_umum"=>$nameFIle
                           ]);
                            DB::table($req->file)->where('syarat_umum',"=",$nameFIle)->delete();
                           return response()->json([
                               'status' => 'success',
                               'code' => "200"
                             ]);
                       }else{
                           DB::table('file_syarat_umum_update')->insert([
                               "id_data_umum"=>$req->id,
                               "file_syarat_umum_update"=>$nameFIle
                           ]);
                           DB::table($req->file)->where('syarat_umum',"=",$nameFIle)->delete();
                           return response()->json([
                               'status' => 'success',
                               'code' => "200"
                             ]);
                       }
                   }else{
                   $pdf = new \Jurosh\PDFMerge\PDFMerger;
                   foreach ($get_file as $file) {
                    $pdf->addPDF(public_path($file->syarat_umum), 'all');
                   }
                   $nameFIle = "file_merge/".time()."_syarat_umum.pdf";
                   //merge PDF ke path file
                   $pdf->merge('file', public_path($nameFIle));
                   if ($get_data->file_syarat_umum == null) {
                       DB::table('data_umum')->where("id",$req->id)->update([
                           "file_syarat_umum"=>$nameFIle
                       ]);
                       foreach($get_file as $file){
                           DB::table($req->file)->where('syarat_umum',"=",$file->syarat_umum)->delete();
                           }
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }else{
                       DB::table('file_syarat_umum_update')->insert([
                           "id_data_umum"=>$req->id,
                           "file_syarat_umum_update"=>$nameFIle
                       ]);
                       foreach($get_file as $file){
                       DB::table($req->file)->where('syarat_umum',"=",$file->syarat_umum)->delete();
                       }
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                       }
                   }
    
                    break;
                    //<=============================FILE SYARAT KHUSUS =============>
                    case "file_syarat_khusus":
                        $get_file = DB::table($req->file)->where("id_data_umum","=",$req->id)->get();
                        $get_data = DB::table('data_umum')->select("file_syarat_khusus")->where("id","=",$req->id)->first();
                        if (count($get_file) == 1) {
                            $nameFIle =$get_file[0]->syarat_khusus;
                           if ($get_data->file_syarat_khusus == null) {
                               DB::table('data_umum')->where("id","=",$req->id)->update([
                                   "file_syarat_khusus"=>$nameFIle
                               ]);
                                DB::table($req->file)->where('syarat_khusus',"=",$nameFIle)->delete();
                               return response()->json([
                                   'status' => 'success',
                                   'code' => "200"
                                 ]);
                           }else{
                               DB::table('file_syarat_khusus_update')->insert([
                                   "id_data_umum"=>$req->id,
                                   "file_syarat_khusus_update"=>$nameFIle
                               ]);
                               DB::table($req->file)->where('syarat_khusus',"=",$nameFIle)->delete();
                               return response()->json([
                                   'status' => 'success',
                                   'code' => "200"
                                 ]);
                           }
                       }else{
                       $pdf = new \Jurosh\PDFMerge\PDFMerger;
                       foreach ($get_file as $file) {
                        $pdf->addPDF(public_path($file->syarat_khusus), 'all');
                       }
                       $nameFIle = "file_merge/".time()."_syarat_khusus.pdf";
                       //merge PDF ke path file
                       $pdf->merge('file', public_path($nameFIle));
                       if ($get_data->file_syarat_khusus == null) {
                           DB::table('data_umum')->where("id",$req->id)->update([
                               "file_syarat_khusus"=>$nameFIle
                           ]);
                           foreach($get_file as $file){
                               DB::table($req->file)->where('syarat_khusus',"=",$file->syarat_khusus)->delete();
                               }
                           return response()->json([
                               'status' => 'success',
                               'code' => "200"
                             ]);
                       }else{
                           DB::table('file_syarat_khusus_update')->insert([
                               "id_data_umum"=>$req->id,
                               "file_syarat_khusus_update"=>$nameFIle
                           ]);
                           foreach($get_file as $file){
                           DB::table($req->file)->where('syarat_khusus',"=",$file->syarat_khusus)->delete();
                           }
                           return response()->json([
                               'status' => 'success',
                               'code' => "200"
                             ]);
                           }
                       }
        
                        break;
            // <======================================== FILE Jadual Pelaksana ============================>
            case "file_jpp":
                $get_file = DB::table($req->file)->where("id_data_umum","=",$req->id)->get();
                $get_data = DB::table('data_umum')->select("file_jpp")->where("id","=",$req->id)->first();
                if (count($get_file) == 1) {
                    $nameFIle =$get_file[0]->jpp;
                   if ($get_data->file_jpp == null) {
                       DB::table('data_umum')->where("id","=",$req->id)->update([
                           "file_jpp"=>$nameFIle
                       ]);
                        DB::table($req->file)->where('jpp',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }else{
                       DB::table('file_jpp_update')->insert([
                           "id_data_umum"=>$req->id,
                           "file_jpp_update"=>$nameFIle
                       ]);
                       DB::table($req->file)->where('jpp',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }
               }else{
               $pdf = new \Jurosh\PDFMerge\PDFMerger;
               foreach ($get_file as $file) {
                $pdf->addPDF(public_path($file->jpp), 'all');
               }
               $nameFIle = "file_merge/".time()."_jpp.pdf";
               //merge PDF ke path file
               $pdf->merge('file', public_path($nameFIle));
               if ($get_data->file_jpp == null) {
                   DB::table('data_umum')->where("id",$req->id)->update([
                       "file_jpp"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                       DB::table($req->file)->where('jpp',"=",$file->jpp)->delete();
                       }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
               }else{
                   DB::table('file_jpp_update')->insert([
                       "id_data_umum"=>$req->id,
                       "file_jpp_update"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                   DB::table($req->file)->where('jpp',"=",$file->jpp)->delete();
                   }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
                   }
               }

                break;
            // <===========================================FILE Gambar Rencana =============================>
            case "file_rencana":
                $get_file = DB::table($req->file)->where("id_data_umum","=",$req->id)->get();
                $get_data = DB::table('data_umum')->select("file_rencana")->where("id","=",$req->id)->first();
                if (count($get_file) == 1) {
                    $nameFIle =$get_file[0]->rencana;
                   if ($get_data->file_rencana == null) {
                       DB::table('data_umum')->where("id","=",$req->id)->update([
                           "file_rencana"=>$nameFIle
                       ]);
                        DB::table($req->file)->where('rencana',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }else{
                       DB::table('file_rencana_update')->insert([
                           "id_data_umum"=>$req->id,
                           "file_rencana_update"=>$nameFIle
                       ]);
                       DB::table($req->file)->where('rencana',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }
               }else{
               $pdf = new \Jurosh\PDFMerge\PDFMerger;
               foreach ($get_file as $file) {
                $pdf->addPDF(public_path($file->rencana), 'all');
               }
               $nameFIle = "file_merge/".time()."_rencana.pdf";
               //merge PDF ke path file
               $pdf->merge('file', public_path($nameFIle));
               if ($get_data->file_rencana == null) {
                   DB::table('data_umum')->where("id",$req->id)->update([
                       "file_rencana"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                       DB::table($req->file)->where('rencana',"=",$file->rencana)->delete();
                       }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
               }else{
                   DB::table('file_rencana_update')->insert([
                       "id_data_umum"=>$req->id,
                       "file_rencana_update"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                   DB::table($req->file)->where('rencana',"=",$file->rencana)->delete();
                   }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
                   }
               }

                break;
            //<=======================================================FILE SPPBJ =====================================>
            case "file_sppbj":
                $get_file = DB::table($req->file)->where("id_data_umum","=",$req->id)->get();
                $get_data = DB::table('data_umum')->select("file_sppbj")->where("id","=",$req->id)->first();
                if (count($get_file) == 1) {
                    $nameFIle =$get_file[0]->sppbj;
                   if ($get_data->file_sppbj == null) {
                       DB::table('data_umum')->where("id","=",$req->id)->update([
                           "file_sppbj"=>$nameFIle
                       ]);
                        DB::table($req->file)->where('sppbj',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }else{
                       DB::table('file_sppbj_update')->insert([
                           "id_data_umum"=>$req->id,
                           "file_sppbj_update"=>$nameFIle
                       ]);
                       DB::table($req->file)->where('sppbj',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }
               }else{
               $pdf = new \Jurosh\PDFMerge\PDFMerger;
               foreach ($get_file as $file) {
                $pdf->addPDF(public_path($file->sppbj), 'all');
               }
               $nameFIle = "file_merge/".time()."_sppbj.pdf";
               //merge PDF ke path file
               $pdf->merge('file', public_path($nameFIle));
               if ($get_data->file_sppbj == null) {
                   DB::table('data_umum')->where("id",$req->id)->update([
                       "file_sppbj"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                       DB::table($req->file)->where('sppbj',"=",$file->sppbj)->delete();
                       }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
               }else{
                   DB::table('file_sppbj_update')->insert([
                       "id_data_umum"=>$req->id,
                       "file_sppbj_update"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                   DB::table($req->file)->where('sppbj',"=",$file->sppbj)->delete();
                   }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
                   }
               }

                break;

            //<=======================================================FILE SPL ================================================>
            case "file_spl":
                $get_file = DB::table($req->file)->where("id_data_umum","=",$req->id)->get();
                $get_data = DB::table('data_umum')->select("file_spl")->where("id","=",$req->id)->first();
                if (count($get_file) == 1) {
                    $nameFIle =$get_file[0]->spl;
                   if ($get_data->file_spl == null) {
                       DB::table('data_umum')->where("id","=",$req->id)->update([
                           "file_spl"=>$nameFIle
                       ]);
                        DB::table($req->file)->where('spl',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }else{
                       DB::table('file_spl_update')->insert([
                           "id_data_umum"=>$req->id,
                           "file_spl_update"=>$nameFIle
                       ]);
                       DB::table($req->file)->where('spl',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }
               }else{
               $pdf = new \Jurosh\PDFMerge\PDFMerger;
               foreach ($get_file as $file) {
                $pdf->addPDF(public_path($file->spl), 'all');
               }
               $nameFIle = "file_merge/".time()."_spl.pdf";
               //merge PDF ke path file
               $pdf->merge('file', public_path($nameFIle));
               if ($get_data->file_spl == null) {
                   DB::table('data_umum')->where("id",$req->id)->update([
                       "file_spl"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                       DB::table($req->file)->where('spl',"=",$file->spl)->delete();
                       }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
               }else{
                   DB::table('file_spl_update')->insert([
                       "id_data_umum"=>$req->id,
                       "file_spl_update"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                   DB::table($req->file)->where('spl',"=",$file->spl)->delete();
                   }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
                   }
               }

                break;
            //<=========================================================FILE SPEK UMUM=====================================>
            case "file_spek_umum":
                $get_file = DB::table($req->file)->where("id_data_umum","=",$req->id)->get();
                $get_data = DB::table('data_umum')->select("file_spek_umum")->where("id","=",$req->id)->first();
                if (count($get_file) == 1) {
                    $nameFIle =$get_file[0]->spek_umum;
                   if ($get_data->file_spek_umum == null) {
                       DB::table('data_umum')->where("id","=",$req->id)->update([
                           "file_spek_umum"=>$nameFIle
                       ]);
                        DB::table($req->file)->where('spek_umum',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }else{
                       DB::table('file_spek_umum_update')->insert([
                           "id_data_umum"=>$req->id,
                           "file_spek_umum_update"=>$nameFIle
                       ]);
                       DB::table($req->file)->where('spek_umum',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }
               }else{
               $pdf = new \Jurosh\PDFMerge\PDFMerger;
               foreach ($get_file as $file) {
                $pdf->addPDF(public_path($file->spek_umum), 'all');
               }
               $nameFIle = "file_merge/".time()."_spek_umum.pdf";
               //merge PDF ke path file
               $pdf->merge('file', public_path($nameFIle));
               if ($get_data->file_spek_umum == null) {
                   DB::table('data_umum')->where("id",$req->id)->update([
                       "file_spek_umum"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                       DB::table($req->file)->where('spek_umum',"=",$file->spek_umum)->delete();
                       }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
               }else{
                   DB::table('file_spek_umum_update')->insert([
                       "id_data_umum"=>$req->id,
                       "file_spek_umum_update"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                   DB::table($req->file)->where('spek_umum',"=",$file->spek_umum)->delete();
                   }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
                   }
               }

                break;
            // <========================================================FILE JAMINAN JAMINAN =====================================>
            case "file_jaminan":
                $get_file = DB::table($req->file)->where("id_data_umum","=",$req->id)->get();
                $get_data = DB::table('data_umum')->select("file_jaminan")->where("id","=",$req->id)->first();
                if (count($get_file) == 1) {
                    $nameFIle =$get_file[0]->jaminan;
                   if ($get_data->file_jaminan == null) {
                       DB::table('data_umum')->where("id","=",$req->id)->update([
                           "file_jaminan"=>$nameFIle
                       ]);
                        DB::table($req->file)->where('jaminan',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }else{
                       DB::table('file_jaminan_update')->insert([
                           "id_data_umum"=>$req->id,
                           "file_jaminan_update"=>$nameFIle
                       ]);
                       DB::table($req->file)->where('jaminan',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }
               }else{
               $pdf = new \Jurosh\PDFMerge\PDFMerger;
               foreach ($get_file as $file) {
                $pdf->addPDF(public_path($file->jaminan), 'all');
               }
               $nameFIle = "file_merge/".time()."_jaminan.pdf";
               //merge PDF ke path file
               $pdf->merge('file', public_path($nameFIle));
               if ($get_data->file_jaminan == null) {
                   DB::table('data_umum')->where("id",$req->id)->update([
                       "file_jaminan"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                       DB::table($req->file)->where('jaminan',"=",$file->jaminan)->delete();
                       }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
               }else{
                   DB::table('file_jaminan_update')->insert([
                       "id_data_umum"=>$req->id,
                       "file_jaminan_update"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                   DB::table($req->file)->where('jaminan',"=",$file->jaminan)->delete();
                   }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
                   }
               }

                break;
            //<==================================================FILE SPKMP =============================================>
            case "file_spkmp":
                $get_file = DB::table($req->file)->where("id_data_umum","=",$req->id)->get();
                $get_data = DB::table('data_umum')->select("file_spkmp")->where("id","=",$req->id)->first();
                if (count($get_file) == 1) {
                    $nameFIle =$get_file[0]->spkmp;
                   if ($get_data->file_spkmp == null) {
                       DB::table('data_umum')->where("id","=",$req->id)->update([
                           "file_spkmp"=>$nameFIle
                       ]);
                        DB::table($req->file)->where('spkmp',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }else{
                       DB::table('file_spkmp_update')->insert([
                           "id_data_umum"=>$req->id,
                           "file_spkmp_update"=>$nameFIle
                       ]);
                       DB::table($req->file)->where('spkmp',"=",$nameFIle)->delete();
                       return response()->json([
                           'status' => 'success',
                           'code' => "200"
                         ]);
                   }
               }else{
               $pdf = new \Jurosh\PDFMerge\PDFMerger;
               foreach ($get_file as $file) {
                $pdf->addPDF(public_path($file->spkmp), 'all');
               }
               $nameFIle = "file_merge/".time()."_spkmp.pdf";
               //merge PDF ke path file
               $pdf->merge('file', public_path($nameFIle));
               if ($get_data->file_spkmp == null) {
                   DB::table('data_umum')->where("id",$req->id)->update([
                       "file_spkmp"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                       DB::table($req->file)->where('spkmp',"=",$file->spkmp)->delete();
                       }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
               }else{
                   DB::table('file_spkmp_update')->insert([
                       "id_data_umum"=>$req->id,
                       "file_spkmp_update"=>$nameFIle
                   ]);
                   foreach($get_file as $file){
                   DB::table($req->file)->where('spkmp',"=",$file->spkmp)->delete();
                   }
                   return response()->json([
                       'status' => 'success',
                       'code' => "200"
                     ]);
                   }
               }

                break;
            default:
                # code...
                break;
        }

          
    }
}
