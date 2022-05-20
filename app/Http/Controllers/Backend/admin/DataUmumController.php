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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DataUmumController extends Controller
{
    //
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

        dd($ppk);
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
                'ppk_kegiatan' => $request->input('ppk_kegiatan'),
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
                'jabatan' => $request->jumlah_tenaga_ahli[$key],
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
        $data = DataUmum::where([[
            'id', $id
        ]])->with('kategori_paket')->with('uptd')->with('detail')->first();
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
        $data = DataUmum::find($id)->with('kategori_paket')->with('uptd')->with('detail')->first();
        // $uptd_id = Auth::user()->user_detail->uptd_id;
        // $uptd = Uptd::where('id', $uptd_id)->first();
        // $ruas = RuasJalan::where('uptd_id', $uptd_id)->get();
        // $ppks = MasterPpk::where('uptd_id', $uptd_id)->get();
        // $dirlaps = UserDetail::where('rule_user_id', 14)->where('is_delete', null)->where('uptd_id', $uptd_id)->get();
        // foreach ($dirlaps as $item) {
        //     $item->nama = $item->user->name;
        // }
        // $kontraktors = MasterKontraktor::get();
        // $temp_kategori = KategoriPaket::all();

        // dd($data->detail->ppk->id);
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

    public function uploadFile(Request $request)
    {
       try {
           
           
       } catch (\Throwable $e) {
           
       }
    }
}
