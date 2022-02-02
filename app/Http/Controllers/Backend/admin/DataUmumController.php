<?php

namespace App\Http\Controllers\Backend\admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\DataUmum;
use App\Models\Backend\KategoriPaket;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DataUmumController extends Controller
{
    //
    public function index()
    {
        //
        // $data = DataUmum::orderBy('unor','ASC')->orderBy('created_at','ASC')->get();
        $data = DataUmum::latest()->with('ruas')->get();

        return view('admin.input_data.data_umum.index', compact('data'));
    }
    public function create()
    {
        //
        $temp_kategori = KategoriPaket::all();
        $data = [];
        return view('admin.input_data.data_umum.form', compact('data', 'temp_kategori'));
    }
    public function store(Request $request)
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
                'ft_id' => 'required',
                'gs_user_detail_id' => 'required',
                'ppk_user_id' => 'required',
                'ruas' => 'required',
                'tgl_kontrak' => 'required',
                'panjang_km' => 'required',
                'lama_waktu' => 'required',

            ]);
            if ($validator->fails()) {
                storeLogActivity(declarLog(1, 'Data Umum', $request->input('no_kontrak') . ' ' . $validator->messages()->first()));
                return back()->withInput()->with(['error' => $validator->messages()->first()]);
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

            $data_umum = DataUmum::create($temp);
            $data_umum->detail()->create([
                'kontraktor_id' => $request->input('kontraktor_id'),
                'konsultan_id' => $request->input('konsultan_id'),
                'ft_id' => $request->input('ft_id'),
                'gs_id' => $request->input('gs_user_detail_id'),
                'ppk_id' => $request->input('ppk_user_id'),
                'nilai_kontrak' => $request->input('nilai_kontrak'),
                'panjang_km' => $request->input('panjang_km'),
                'lama_waktu' => $request->input('lama_waktu'),
                'is_active' => 1,
                'created_by' => Auth::user()->id,
                "keterangan" => "Kontrak Awal",
                "is_deleted" => 0
            ]);
            for ($i = 0; $i < count($request->id_ruas_jalan); $i++) {
                if ($request->segmen_jalan[$i] && $request->lat_awal[$i] && $request->long_awal[$i] && $request->lat_akhir[$i] && $request->long_akhir[$i]) {

                    // if($request->id_ruas_jalan[$i] && $request->segmen_jalan[$i] && $request->lat_awal[$i]&& $request->long_awal[$i]&& $request->lat_akhir[$i]&& $request->long_akhir[$i]){
                    $data_umum->ruas()->create([
                        'id_ruas_jalan' => $request->ruas,
                        'segment_jalan' => $request->segmen_jalan[$i],
                        'lat_awal' => $request->lat_awal[$i],
                        'long_awal' => $request->long_awal[$i],
                        'lat_akhir' => $request->lat_akhir[$i],
                        'long_akhir' => $request->long_akhir[$i],
                    ]);
                }
            }
            if ($data_umum) {
                storeLogActivity(declarLog(1, 'Data Umum', $request->input('no_kontrak'), 1));
                return redirect()->route('dataumum.index')->with(['success' => 'Data Berhasil Disimpan!']);
            } else {
                return redirect()->route('dataumum.index')->with(['danger' => 'Data Gagal Disimpan!']);
            }
        } catch (\Throwable $e) {
            storeLogActivity(declarLog(1, 'Data Umum', $request->input('no_kontrak') . " | " . $e->getMessage()));
            return redirect()->route('dataumum.index')->with(['danger' => 'Data Gagal Disimpan!']);
        }
    }
    public function show($id)
    {
        $data = DataUmum::where([[
            'id', $id
        ]])->with('kategori_paket')->with('uptd')->with('ruas')->with('detail')->first();
        return view('admin.input_data.data_umum.show', compact('data'));
    }
}
