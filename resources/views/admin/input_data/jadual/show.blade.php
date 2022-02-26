@extends('layout.index') @section('title','Jadual') @section('header')

<link
    rel="stylesheet"
    type="text/css"
    href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"
/>
@endsection @section('page-header')
<div class="page-header">
    <h3 class="page-title">
        @if(Request::segment(3) == 'create') Create @elseif(Request::segment(3)
        == 'edit') Edit @else Detail @endif Jadual
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('masterppk.index') }}">Jadual</a>
            </li>

            @if(Request::segment(3) == 'create')
            <li class="breadcrumb-item active" aria-current="page">Create</li>
            @elseif('edit')
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
            @else
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
            @endif
        </ol>
    </nav>
</div>
@endsection @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Umum</h4>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        {{--
                        <li><i class="feather icon-maximize full-card"></i></li>
                        --}}
                        <li>
                            <i class="feather icon-minus minimize-card"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="card-block">
                    <div class="row align-items-start">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Pemda</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ @$data->pemda ? : 'PEMERINTAH PROVINSI JAWA BARAT' }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>OPD</label>
                                <input
                                    type="text"
                                    name="opd"
                                    id="opd"
                                    value="{{ @$data->opd ? : 'DINAS BINA MARGA DAN PENATAAN RUANG' }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kategori Paket Kegiatan</label>
                                <input
                                    type="text"
                                    name="opd"
                                    id="opd"
                                    value="{{ $data->kategori_paket->nama_kategori }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Kegiatan / Paket</label>
                                <input
                                    type="text"
                                    name="opd"
                                    id="opd"
                                    value="{{ $data->nm_paket }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-start">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Unor</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->uptd->nama }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>No. Kontrak</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->no_kontrak }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Kontrak</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->tgl_kontrak }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nilai Kontrak</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->detail->nilai_kontrak }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-start">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>No. SPMK</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->no_spmk }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal SPMK</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->tgl_spmk }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Panjang KM</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->detail->panjang_km}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Waktu Pelaksanaan</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->detail->lama_waktu}} Hari"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-start">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PPK Kegiatan</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->ppk_kegiatan}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PPK</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{@$data->detail->ppk->nama}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Konsultan Supervisi</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{$data->detail->konsultan->nama}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Penyedia Jasa</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{$data->detail->kontraktor->nama}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Field Team</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value=" {{$data->detail->ft->nama}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>General Superintendent</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value=" {{$data->detail->gs->nama}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Jadual Pekerjaan</h4>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        {{--
                        <li><i class="feather icon-maximize full-card"></i></li>
                        --}}
                        <li>
                            <i class="feather icon-minus minimize-card"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="card-block">
                    <div class="row">
                        <canvas id="chartCurva"></canvas>
                    </div>

                    <div class="contianer text-center">
                        <div class="row" id="dataJadual"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('jadual.index') }}">
                    <button type="button" class="btn btn-dark">
                        Kembali
                    </button></a
                >
            </div>
        </div>
    </div>
    <div
        class="modal fade"
        id="jadualDetail"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered"
        >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelJadual"></h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered display">
                        <thead>
                            <th>Tanggal</th>
                            <th>No Mata Pembayaran</th>
                            <th>Harga Satuan</th>
                            <th>Volume</th>
                            <th>Satuan</th>
                            <th>Bobot</th>
                            <th>Koefisien</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-dark"
                        data-dismiss="modal"
                    >
                        Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endsection @section('script')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"
        integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg=="
        crossorigin="anonymous"
    ></script>
    <script src="{{ asset('assets/custom/jadual.js') }}"></script>
    <script>
        const data = {!! json_encode($jadualDetail) !!};
        nonAdendum(data);
    </script>
    @endsection
</div>
