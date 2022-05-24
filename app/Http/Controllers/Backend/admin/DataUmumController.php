<?php

namespace App\Http\Controllers\Backend\admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\DataUmum;
use App\Models\Backend\DataUmumDetail;
use App\Models\Backend\DataUmumRuas;
use App\Models\Backend\KategoriPaket;
use App\Models\Backend\MasterKonsultan;
use App\Models\Backend\MasterKontraktor;
use App\Models\Backend\MasterPpk;
use App\Models\Backend\RuasJalan;
use App\Models\Backend\Uptd;
use App\Models\Backend\UserDetail;
use App\Models\Backend\TenagaAhli;
use App\Models\Backend\FileDataUmum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;



class DataUmumController extends Controller
{
    private $PATH_FILE_DB = "public/file/data_umum/";
    public function index()
    {
        if (Auth::user()->internal_role_id != 1) {
            $uptd = Auth::user()->user_detail->uptd_id;
            // $data = DataUmum::orderBy('unor','ASC')->orderBy('created_at','ASC')->get();
            $data = DataUmum::where('id_uptd', $uptd)->latest()->with('detail')->with('uptd')->get();
        } else {
            $data = DataUmum::latest()->with('detail')->with('uptd')->get();
        }


        return view('admin.input_data.data_umum.index', compact('data'));
    }
    public function create()
    {
        $dirlaps = UserDetail::where('rule_user_id', 14)->where('is_delete', null)->with('user');
        $ruas = RuasJalan::latest();
        $ppks = UserDetail::where('rule_user_id', 2)->where('is_delete', null)->with('user');
        $uptd = Uptd::whereBetween('id', [1, 6]);

        if (Auth::user()->internal_role_id != 1) {
            $uptd_id = Auth::user()->user_detail->uptd_id;
            $ruas = $ruas->where('uptd_id', $uptd_id);
            $uptd = $uptd->where('id', $uptd_id);
            $ppks = $ppks->where('uptd_id', $uptd_id);
            $dirlaps = $dirlaps->where('uptd_id',$uptd_id);
        }
        $dirlaps = $dirlaps->get();
        $ruas = $ruas->get();
        $ppks = $ppks->get();
        $uptd = $uptd->get();

        $kontraktors = MasterKontraktor::get();
        $temp_kategori = KategoriPaket::all();
        return view('admin.input_data.data_umum.create', compact('uptd', 'temp_kategori', 'ruas', 'ppks', 'dirlaps', 'kontraktors'));
    }
    public function store(Request $request)
    {
        $ppk = UserDetail::wherenull('is_delete')->where('rule_user_id',2)->where('id',$request->input('ppk_user_id'))->first();
        $ppk_kegiatan = $ppk->ppkKegiatan->ppk_kegiatan;
        
        
        try {
            $validator = Validator::make($request->all(), [
                'pemda' => 'required',
                'opd' => 'required',
                'uptd_id' => 'required',
                'kategori_paket_id' => 'required',
                'nm_paket' => 'required',
                'no_kontrak' => [
                    'required',
                    Rule::unique(DataUmum::class, 'no_kontrak'),
                ],
                'no_spmk' => [
                    'required',
                    Rule::unique(DataUmum::class, 'no_spmk'),
                ],
                'tgl_spmk' => 'required',
                'nilai_kontrak' => 'required',
                'kontraktor_id' => 'required',
                'konsultan_id' => 'required',
                // 'ft_id' => 'required',
                // 'gs_user_detail_id' => 'required',
                'ppk_user_id' => 'required',
                'ruas' => 'required',
                'tgl_kontrak' => 'required',
                'panjang_km' => 'required',
                'lama_waktu' => 'required',
                'dirlap_id' => 'required',
                'id_ruas_jalan' => 'required',

            ]);
            if ($validator->fails()) {
                storeLogActivity(declarLog(1, 'Data Umum', $request->input('no_kontrak') . ' ' . $validator->getMessageBag()->first()));
                return back()->withInput()->with(['error' => $validator->getMessageBag()->first()]);
            }
          

            $temp = ([
                'pemda' => $request->input('pemda'),
                'opd' => $request->input('opd'),
                'id_uptd' => $request->input('uptd_id'),
                'kategori_paket_id' => $request->input('kategori_paket_id'),
                'nm_paket' => $request->input('nm_paket'),
                'no_kontrak' => $request->input('no_kontrak'),
                'tgl_kontrak' => $request->input('tgl_kontrak'),
                'no_spmk' => $request->input('no_spmk'),
                'tgl_spmk' => $request->input('tgl_spmk'),
                'ppk_kegiatan' => $ppk_kegiatan,
                'created_by' => Auth::user()->id,
            ]);
            DB::beginTransaction();
            $data_umum = DataUmum::create($temp);
            $data_umum_detail =  DataUmumDetail::create([
                'data_umum_id' => $data_umum->id,
                'kontraktor_id' => $request->input('kontraktor_id'),
                'konsultan_id' => $request->input('konsultan_id'),
                'ppk_id' => $request->input('ppk_user_id'),
                'panjang_km' => $request->input('panjang_km'),
                'lama_waktu' => $request->input('lama_waktu'),
                'dirlap_id' => $request->input('dirlap_id'),
                'is_active' => 1,
                'is_deleted' => 0,
                'nilai_kontrak' => $request->input('nilai_kontrak'),
                'keterangan' => 'Kontrak Awal',
                'created_by' => Auth::user()->id,
            ]);

           foreach ($request->nama_tenaga_ahli as $key => $value) {
              TenagaAhli::create([
                'data_umum_id' => $data_umum_detail->id,
                'nama_tenaga_ahli' => $value,
                'jabatan' => $request->jabatan_tenaga_ahli[$key],
            ]);
           }

            for ($i = 0; $i < count($request->id_ruas_jalan); $i++) {
                if ($request->segmen_jalan[$i] && $request->lat_awal[$i] && $request->long_awal[$i] && $request->lat_akhir[$i] && $request->long_akhir[$i]) {
                    DataUmumRuas::create([
                        'data_umum_detail_id' => $data_umum_detail->id,
                        'id_ruas_jalan' => $request->id_ruas_jalan[$i],
                        'segment_jalan' => $request->segmen_jalan[$i],
                        'lat_awal' => $request->lat_awal[$i],
                        'long_awal' => $request->long_awal[$i],
                        'lat_akhir' => $request->lat_akhir[$i],
                        'long_akhir' => $request->long_akhir[$i],
                    ]);
                }
            }

            DB::commit();
            storeLogActivity(declarLog(1, 'Data Umum', $request->input('no_kontrak'), 1));
            return redirect()->route('dataumum.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } catch (\Throwable $e) {
            DB::rollBack();
            dd($e);
            storeLogActivity(declarLog(1, 'Data Umum', $request->input('no_kontrak') . " | " . $e->getMessage()));
            return redirect()->route('dataumum.index')->with(['danger' => 'Data Gagal Disimpan!']);
        }
    }
    public function show($id)
    {
        $data = DataUmum::where('id', $id)->with('kategori_paket')->with('uptd')->with('detail')->first();
        $dirlaps = UserDetail::where('rule_user_id', 14)->where('is_delete', null)->with('user');
        $ruas = RuasJalan::latest();
        $ppks = UserDetail::where('rule_user_id', 2)->where('is_delete', null)->with('user');
        $uptd = Uptd::whereBetween('id', [1, 6]);

        if (Auth::user()->user_detail->uptd_id) {
            $uptd_id = Auth::user()->user_detail->uptd_id;
            $ruas = $ruas->where('uptd_id', $uptd_id);
            $uptd = $uptd->where('id', $uptd_id);
            $ppks = $ppks->where('uptd_id', $uptd_id);
            $dirlaps = $dirlaps->where('uptd_id',$uptd_id);
        }
        $dirlaps = $dirlaps->get();
        $ruas = $ruas->get();
        $ppks = $ppks->get();
        $uptd = $uptd->get();

        $kontraktors = MasterKontraktor::get();
        $temp_kategori = KategoriPaket::all();

        return view('admin.input_data.data_umum.show')->with(
            [
                'data' => $data,
                'uptd' => $uptd,
                'ruas' => $ruas,
                'ppks' => $ppks,
                'dirlaps' => $dirlaps,
                'temp_kategori' => $temp_kategori,
                'kontraktors' => $kontraktors

            ]
        );
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pemda' => 'required',
                'opd' => 'required',
                'uptd_id' => 'required',
                'kategori_paket_id' => 'required',
                'nm_paket' => 'required',
                'no_kontrak' => [
                    'required',
                    Rule::unique(DataUmum::class, 'no_kontrak')->ignore($request->id, 'id'),
                ],
                'no_spmk' => [
                    'required',
                    Rule::unique(DataUmum::class, 'no_spmk')->ignore($request->id, 'id'),
                ],
                'tgl_spmk' => 'required',
                'ppk_kegiatan' => 'required',

                'nilai_kontrak' => 'required',
                'kontraktor_id' => 'required',
                'konsultan_id' => 'required',
                // 'ft_id' => 'required',
                // 'gs_user_detail_id' => 'required',
                'ppk_user_id' => 'required',
                'ruas' => 'required',
                'tgl_kontrak' => 'required',
                'panjang_km' => 'required',
                'lama_waktu' => 'required',
                'dirlap_id' => 'required',

            ]);
            if ($validator->fails()) {
                storeLogActivity(declarLog(1, 'Data Umum', $request->input('no_kontrak') . ' ' . $validator->getMessageBag()->first()));
                return back()->withInput()->with(['error' => $validator->getMessageBag()->first()]);
            }
            DB::beginTransaction();
            $temp = [
                'pemda' => $request->input('pemda'),
                'opd' => $request->input('opd'),
                'id_uptd' => $request->input('uptd_id'),
                'kategori_paket_id' => $request->input('kategori_paket_id'),
                'nm_paket' => $request->input('nm_paket'),
                'no_kontrak' => $request->input('no_kontrak'),
                'tgl_kontrak' => $request->input('tgl_kontrak'),
                'no_spmk' => $request->input('no_spmk'),
                'tgl_spmk' => $request->input('tgl_spmk'),
                'ppk_kegiatan' => $request->input('ppk_kegiatan'),
                'created_by' => Auth::user()->id,
            ];
            DataUmum::where('id', $id)->update($temp);
            DB::table('data_umum_detail')->where('data_umum_id', $id)->update([
                'data_umum_id' => $id,
                'kontraktor_id' => $request->input('kontraktor_id'),
                'konsultan_id' => $request->input('konsultan_id'),
                // 'ft_id' => $request->input('ft_id'),
                // 'gs_user_detail_id' => $request->input('gs_user_detail_id'),
                'ppk_id' => $request->input('ppk_user_id'),
                'panjang_km' => $request->input('panjang_km'),
                'lama_waktu' => $request->input('lama_waktu'),
                'dirlap_id' => $request->input('dirlap_id'),
                'is_active' => 1,
                'is_deleted' => 0,
                'nilai_kontrak' => $request->input('nilai_kontrak'),
                'keterangan' => 'Kontrak Awal',
                'created_by' => Auth::user()->id,
            ]);
            $data_umum_detail = DataUmumDetail::where('data_umum_id', $id)->first();
            DataUmumRuas::where('data_umum_detail_id', $data_umum_detail->id)->delete();
            for ($i = 0; $i < count($request->segmen_jalan); $i++) {
                DataUmumRuas::create([
                    'data_umum_detail_id' => $data_umum_detail->id,
                    'id_ruas_jalan' => $request->id_ruas_jalan[$i],
                    'segment_jalan' => $request->segmen_jalan[$i],
                    'lat_awal' => $request->lat_awal[$i],
                    'long_awal' => $request->long_awal[$i],
                    'lat_akhir' => $request->lat_akhir[$i],
                    'long_akhir' => $request->long_akhir[$i],
                ]);
            }
            DB::commit();
            storeLogActivity(declarLog(2, 'Data Umum', $request->input('no_kontrak')));
            return redirect()->route('dataumum.index')->with(['success' => 'Data Berhasil Diubah!']);
        } catch (\Throwable $e) {
            DB::rollback();
            dd($e);
            storeLogActivity(declarLog(2, 'Data Umum', $request->input('no_kontrak') . " | " . $e->getMessage()));
            return redirect()->route('dataumum.index')->with(['danger' => 'Data Gagal Diubah!']);
        }
    }

    public function edit($id)
    {
        $data = DataUmum::where('id',$id)->with('kategori_paket')->with('uptd')->with('detail')->first();
        $dirlaps = UserDetail::where('rule_user_id', 14)->where('is_delete', null)->with('user');
        $ruas = RuasJalan::latest();
        $ppks = UserDetail::where('rule_user_id', 2)->where('is_delete', null)->with('user');
        $uptd = Uptd::whereBetween('id', [1, 6]);

        if (Auth::user()->user_detail->uptd_id) {
            $uptd_id = Auth::user()->user_detail->uptd_id;
            $ruas = $ruas->where('uptd_id', $uptd_id);
            $uptd = $uptd->where('id', $uptd_id);
            $ppks = $ppks->where('uptd_id', $uptd_id);
            $dirlaps = $dirlaps->where('uptd_id',$uptd_id);
        }
        $dirlaps = $dirlaps->get();
        $ruas = $ruas->get();
        $ppks = $ppks->get();
        $uptd = $uptd->get();

        $kontraktors = MasterKontraktor::get();
        // dd($ppks);
        $temp_kategori = KategoriPaket::all();

        return view('admin.input_data.data_umum.edit')->with(
            [
                'data' => $data,
                'uptd' => $uptd,
                'ruas' => $ruas,
                'ppks' => $ppks,
                'dirlaps' => $dirlaps,
                'temp_kategori' => $temp_kategori,
                'kontraktors' => $kontraktors

            ]
        );
    }

    public function fileUpload($id)
    {
        $data = DataUmum::find($id);
        

        $fileDkh =new \stdClass;
        $fileDkh->label ='Daftar Kuantitas dan Harga (DKH)';
        $fileDkh->name = 'file_dkh';
        $fileDkh->file = $data->fileDkh->first()? $data->fileDkh->first()->file_name : null;
        
        
        $fileKontrak =new \stdClass;
        $fileKontrak->label ='Perjanjian Kontrak';
        $fileKontrak->name = 'file_kontrak';
        $fileKontrak->file = $data->fileKontrak->first()? $data->fileKontrak->first()->file_name : null;

        $fileSPMK =new \stdClass;
        $fileSPMK->label ='SPMK';
        $fileSPMK->name = 'file_spmk';
        $fileSPMK->file = $data->fileSPMK->first()? $data->fileSPMK->first()->file_name : null;

        $fileUmum =new \stdClass;
        $fileUmum->label ='Syarat Umum';
        $fileUmum->name = 'file_umum';
        $fileUmum->file = $data->fileUmum->first()? $data->fileUmum->first()->file_name : null;

        $fileSyaratKhusus =new \stdClass;
        $fileSyaratKhusus->label ='Syarat Khusus';
        $fileSyaratKhusus->name = 'file_syarat_khusus';
        $fileSyaratKhusus->file = $data->fileSyaratKhusus->first()? $data->fileSyaratKhusus->first()->file_name : null;

        $fileJadual =new \stdClass;
        $fileJadual->label ='Jadual Pelaksanaan Pekerjaan';
        $fileJadual->name = 'file_jadual';
        $fileJadual->file = $data->fileJadual->first()? $data->fileJadual->first()->file_name : null;

        $fileGambarRencana =new \stdClass;
        $fileGambarRencana->label ='Gambar Rencana';
        $fileGambarRencana->name = 'file_gambar_rencana';
        $fileGambarRencana->file = $data->fileGambarRencana->first()? $data->fileGambarRencana->first()->file_name : null;

        $fileSPPBJ =new \stdClass;
        $fileSPPBJ->label ='SPPBJ';
        $fileSPPBJ->name = 'file_sppbj';
        $fileSPPBJ->file = $data->fileSPPBJ->first()? $data->fileSPPBJ->first()->file_name : null;

        $fileSPL =new \stdClass;
        $fileSPL->label ='SPL';
        $fileSPL->name = 'file_spl';
        $fileSPL->file = $data->fileSPL->first()? $data->fileSPL->first()->file_name : null;

        $fileSpeckUmum =new \stdClass;
        $fileSpeckUmum->label ='Spesifikasi Umum';
        $fileSpeckUmum->name = 'file_speck_umum';
        $fileSpeckUmum->file = $data->fileSpeckUmum->first()? $data->fileSpeckUmum->first()->file_name : null;

        $fileJaminan =new \stdClass;
        $fileJaminan->label ='Jaminan - Jaminan';
        $fileJaminan->name = 'file_jaminan';
        $fileJaminan->file = $data->fileJaminan->first()? $data->fileJaminan->first()->file_name : null;

        $fileBAPL =new \stdClass;
        $fileBAPL->label ='BAPL';
        $fileBAPL->name = 'file_bapl';
        $fileBAPL->file = $data->fileBAPL->first()? $data->fileBAPL->first()->file_name : null;

        $fileInit = [$fileDkh, $fileKontrak, $fileSPMK, $fileUmum, $fileSyaratKhusus, $fileJadual, $fileGambarRencana, $fileSPPBJ, $fileSPL, $fileSpeckUmum, $fileJaminan, $fileBAPL];
       
        return view('admin.input_data.data_umum.file_upload')->with(
            [
                'data' => $data,
                'file_init' => $fileInit
            ]
        );
       
    }

    public function store_file(Request $request, $id)
    {
      try {
        $file = $request->file('file');
        $file_name = time() . "_" . $file->getClientOriginalName();
        
        Storage::disk('public')->putFileAs('data_umum/'.$id, $file, $file_name);
        FileDataUmum::create([
            'data_umum_id' => $id,
            'file_label' => $request->file_name,
            'file_name' => $file_name
        ]);

        return response()->json(['success' => true, 'message' => 'File Berhasil di Upload']);
         
      } catch (\Exception $e) {
          return response()->json(['success' => false, 'message' => $e->getMessage()]);
      }
    }

    public function show_file($id,$file_name)
    {   
        $file = storage_path('app/public/data_umum/'.$id.'/'.$file_name);
        return response()->file($file);
    }
    
}
