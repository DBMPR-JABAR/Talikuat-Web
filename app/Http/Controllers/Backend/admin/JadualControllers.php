<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use App\Imports\JadualImport;
use App\Models\Backend\DataUmum;
use App\Models\Jadual;
use App\Models\TempFileJadual;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Validator;

use Maatwebsite\Excel\Facades\Excel;


class JadualControllers extends Controller
{
    private $PATH_FILE_DB = "public/lampiran/jadual/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DataUmum::latest()->with('detail')->with('uptd')->with('ruas')->get();
        return view('admin.input_data.jadual.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $data = DataUmum::where([[
            'id', $id
        ]])->with('kategori_paket')->with('uptd')->with('ruas')->with('detail')->first();

        return view('admin.input_data.jadual.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id_data_umum' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $getFile = TempFileJadual::where('id_data_umum', $request->data_umum_id)->first();
            $file = storage_path('app/' . $this->PATH_FILE_DB . $getFile->file_name);
            $list_jadual = Excel::toCollection(new JadualImport, $file);
            $data_umum = DataUmum::where('id', $request->id_data_umum)->with('detail')->first();
            dd($data_umum);
            foreach ($list_jadual as $val) {
                dd($val);

                foreach ($val as $item) {


                    $item['tanggal'] = Carbon::createFromTimestamp(Date::excelToTimestamp($item['tanggal']));
                    $item['tanggal'] = date('Y-m-d', strtotime($item['tanggal']));
                }
            }
        } catch (\Throwable $e) {
            dd($e);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Jadual::where([
            ['id', $id]
        ])->delete();
        return view('admin.input_data.jadual.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
