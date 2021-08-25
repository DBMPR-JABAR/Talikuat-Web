<?php

namespace App\Http\Controllers;

use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataUmumAdendum extends Controller
{
    public function updateAdendum(Request $req)
    {
        $jadual = DB::table('jadual')->where('id_data_umum',$req->id)->get();
        $dataUmum = DB::table('data_umum_adendum')->where('id_data_umum',$req->id)->first();
        $laporan = DB::table('master_laporan_harian')->where('id_data_umum',$req->id)->whereNull('reason_delete')->get();
        dd($laporan);
        $detailJadual = [];
        foreach($jadual as $j){
           $dbJadual =  DB::table('detail_jadual')->where([['id_jadual',$j->id],['tgl','<',$req->tgl_adendum]])->get();
           if (count($dbJadual) != 0 ) {
                array_push($detailJadual,$dbJadual); 
            
           }
           
           $tmp = (array)$j;
           unset($tmp['id']);
           $dUmum = array('id_data_umum_adendum'=>$dataUmum->id);
           $merge = array_merge($tmp,$dUmum);
           DB::table('jadual_adendum')->insert($merge);         
        }
        foreach ($detailJadual as $jadual) {
            foreach($jadual as $j){
                $tmp= (array)$j;
                unset($tmp['id']);
                DB::table('detail_jadual_adendum')->insert($tmp);  
            }
            
        }

        if (count($laporan) != 0 ) {
            foreach($laporan as $lap){
                dd($lap);
            }
        }
        

        
        // date_default_timezone_set('Asia/Jakarta');
        // DB::table('data_umum_adendum')->where('id', $req->id)->update([
        //     "konsultan" => $req->konsultan,
        //     "lama_waktu" => $req->lama_waktu,
        //     "nilai_kontrak" => $req->nilai_kontrak,
        //     "panjang_km" => $req->panjang_km,
        //     "penyedia" => $req->penyedia,
        //     "ppk" => $req->ppk,
        //     "tgl_kontrak" => $req->tgl_kontrak,
        //     "tgl_spmk" => $req->tgl_spmk,
        //     "nm_se" => $req->nm_se,
        //     "nm_gs" => $req->nm_gs,
        //     "updated_at" => \Carbon\Carbon::now()
        // ]);
        // return response()->json([
        //     'status' => 'success',
        //     'code' => '200'
        // ]);
    }

    // public function buatJadualAdendum(Request $req)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $waktu = str_replace(" Hari", "", $req->waktu);
    //     $panjang = str_replace(" Km", "", $req->panjang);
    //     $harga = preg_replace('/\./', '', $req->harga_satuan[0]);
    //     $total = preg_replace('/\./', '', $req->jumlah_harga[0]);
    //     $nilai_kon = preg_replace('/\./', '',str_replace("Rp. ","",$req->nilai_kontrak));
    //     DB::beginTransaction();
    //     try{
    //         $get_id = DB::table('jadual')->insertGetId([
    //             "id_data_umum" => $req->id_data_umum,
    //             "nmp" => $req->nmp[0],
    //             "user" => $req->user_id,
    //             "unor" => $req->unor,
    //             "nm_paket" => $req->nm_paket,
    //             "ruas_jalan" => $req->ruas_jalan,
    //             "lama_waktu" => $waktu,
    //             "ppk" => $req->ppk,
    //             "nm_ppk" => $req->nama_ppk,
    //             "penyedia" => $req->penyedia,
    //             "konsultan" => $req->konsultan,
    //             "nilai_kontrak" =>str_replace(",",".",$nilai_kon) ,
    //             "panjang_km" => $panjang,
    //             "created_at" => \Carbon\Carbon::now(),
    //             "satuan" => $req->satuan[0],
    //             "harga_satuan" => str_replace(',','.',$harga),
    //             "volume" => $req->volume[0],
    //             "jumlah_harga" => str_replace(',','.',$total),
    //             "bobot" => $req->bobot[0],
    //             "uraian" => $req->uraian[0],
    //             "id_uptd" => $req->id_uptd,
    //             "adendum"=>$req->adendum
    //         ]);
    
    //         for ($i = 0; $i < count($req->nmp); $i++) {
    //           $harga = preg_replace('/\./', '', $req->harga_satuan[$i]);
    //           $total = preg_replace('/\./', '', $req->jumlah_harga[$i]);
    //             DB::table('detail_jadual')->insert(
    //                 [
    //                     "id_jadual" => $get_id,
    //                     "tgl" => $req->tgl[$i],
    //                     "nmp" => $req->nmp[$i],
    //                     "uraian" => $req->uraian[$i],
    //                     "satuan" => $req->satuan[$i],
    //                     "harga_satuan" => str_replace(',','.',$harga),
    //                     "volume" => $req->volume[$i],
    //                     "jumlah_harga" => str_replace(',','.',$total),
    //                     "bobot" => $req->bobot[$i],
    //                     "koefisien" => $req->koefisien[$i],
    //                     "nilai" => $req->nilai[$i],
    //                     "created_at" => \Carbon\Carbon::now()
    //                 ]);
    //         }
    //         DB::commit();
    //         return response()->json([
    //             'status' => 'success',
    //             'code' => '200',
    //             'result' => 'Data Tersimpan'
    //         ]);

    //     }catch(\Throwable $e){
    //         DB::rollBack();
    //         return response()->json([
    //             'status' => 'failed',
    //             'code' => '500',
    //             'result' => $e
    //         ]);
    //     }   
    // }
}
