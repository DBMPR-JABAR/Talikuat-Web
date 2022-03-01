@extends('layout.index') @section('title','Request') @section('header')
<link
    rel="stylesheet"
    href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css"
/>
<link
    rel="stylesheet"
    href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css"
/>
<link
    rel="stylesheet"
    href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css"
/>
<style>
    th {
        width: fit-content !important;
    }
</style>
@endsection @section('page-header')
<div class="page-header">
    <h4 class="page-title">Request</h4>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="/Talikuat-Backend/public/admin/dashboard">Dashboard</a>
                / Request
            </li>
        </ol>
    </nav>
</div>
@endsection @section('content')
<input
    type="hidden"
    name="{{Auth::user()->user_detail->rule_user_id}}"
    id="roleUser"
/>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <table class="display responsive">
                    <thead>
                        <th>No. Dokumen Diajukan Tanggal</th>
                        <th>Unor</th>
                        <th>Nomor Kontrak</th>
                        <th>Nama Kegiatan</th>
                        <th>Lokasi/Sta Jenis Pekerjaan Perkiraan Volume</th>
                        <th>Foto dan Catatan</th>
                        <th>Status Dokumen</th>
                        <th style="width: 5%">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($requests as $request)
                        <tr>
                            <td>
                                FRM-01/SOP/DBMPR-{{$loop->index}}<br />
                                {{$request->tgl_request}}
                            </td>
                            <td>
                                {{$request->dataUmumDetail->dataUmum->uptd->nama}}
                            </td>
                            <td>
                                {{$request->dataUmumDetail->dataUmum->no_kontrak}}
                            </td>
                            <td>
                                {{$request->dataUmumDetail->dataUmum->ppk_kegiatan}}
                            </td>
                            <td>
                                {{$request->lokasi_sta}}<br />
                                {{$request->jadual->nmp}} -
                                {{$request->jadual->uraian}}<br />
                                {{$request->volume}}
                                {{$request->jadual->satuan}}
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-light"
                                    style="
                                        width: 100px !important;
                                        font-size: 13px !important;
                                    "
                                    data-toggle="modal"
                                    data-target="#exampleModalDetail"
                                    data-img-ppk="{{route('request.file',$request->file_ppk ?? '')}}"
                                    data-ppk="{{$request->respon_ppk}}"
                                    data-img-dirlap="{{route('request.file',$request->file_dirlap ?? '')}}"
                                    data-dirlap="{{$request->respon_dirlap}}"
                                    onclick="rederModalCatatan(this)"
                                >
                                    Lihat
                                </button>
                            </td>
                            <td>
                                @if($request->status == '0')
                                <span class="badge badge-warning">
                                    Menunggu
                                </span>
                                @elseif($request->status == '1')
                                <span class="badge badge-success">
                                    Disetujui
                                </span>
                                @elseif($request->status == '2')
                                <span class="badge badge-danger">
                                    Ditolak
                                </span>
                                @endif
                            </td>

                            <td>
                                <button
                                    type="button"
                                    class="btn btn-success"
                                    style="
                                        width: 100px !important;
                                        font-size: 13px !important;
                                    "
                                    data-toggle="modal"
                                    data-target="#exampleModalApproval"
                                    data-id="{{$request->id}}"
                                    data-paket="{{$request->dataUmumDetail->dataUmum->ppk_kegiatan}}"
                                    onclick="rederModalDetail(this)"
                                >
                                    Respon
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Approval -->
<div
    class="modal fade bd-example-modal-lg"
    id="exampleModalApproval"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myLargeModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
                    Request Approval
                </h3>
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
                <div class="card mb-3">
                    <div class="card-header bg-secondary">
                        <h3 class="card-title">Data</h3>
                    </div>
                    <div class="card-body" style="display: block">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                                >Kegiatan / Paket</label
                            >
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="kegiatan"
                                    name="kegiatan"
                                    readonly
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                                >Diajukan Tgl</label
                            >
                            <div class="col-sm-10">
                                <input
                                    type="date"
                                    class="form-control"
                                    id="diajukan_tgl"
                                    name="diajukan_tgl"
                                    readonly
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                                >Lokasi/Sta</label
                            >
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="lokasi_sta"
                                    name="lokasi_sta"
                                    readonly
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                                >Jenis Pekerjaan</label
                            >
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="jenis_pekerjaan"
                                    name="jenis_pekerjaan"
                                    readonly
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                                >Perkiraan Volume</label
                            >
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="perkiraan_volume"
                                        name="perkiraan_volume"
                                        readonly
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                                >Untuk Pelaksanaan Tgl</label
                            >
                            <div class="col-sm-10">
                                <input
                                    type="date"
                                    class="form-control"
                                    id="pelaksanaan_tgl"
                                    name="pelaksanaan_tgl"
                                    readonly
                                />
                            </div>
                        </div>

                        <!-- Bahan Material -->
                        <div class="card mb-3">
                            <div class="card-header bg-secondary">
                                <h3 class="card-title">Bahan / Material</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <table
                                            class="table table-bordered table-striped"
                                            id="tableBahan"
                                        >
                                            <thead>
                                                <th>Bahan Digunakan</th>
                                                <th>Volume</th>
                                                <th>Satuan</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bahan Material JMF -->
                        <div class="card mb-3">
                            <div class="card-header bg-secondary">
                                <h3 class="card-title">
                                    Bahan Campuran ( JMF )
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <table
                                            class="table table-bordered table-striped"
                                            id="tableJmf"
                                        >
                                            <thead>
                                                <th>Bahan Digunakan</th>
                                                <th>Volume</th>
                                                <th>Satuan</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Peralatan -->
                        <div class="card mb-3">
                            <div class="card-header bg-secondary">
                                <h3 class="card-title">Peralatan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <table
                                            class="table table-bordered table-striped"
                                            id="tablePeralatan"
                                        >
                                            <thead>
                                                <th>Jenis Peralatan</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->

                        <!-- Tenaga Kerja -->
                        <div class="card mb-3">
                            <div class="card-header bg-secondary">
                                <h3 class="card-title">Tenaga Kerja</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <table
                                            class="table table-bordered table-striped"
                                            id="tableTenagaKerja"
                                        >
                                            <thead>
                                                <th>Tenaga Kerja</th>
                                                <th>Jumlah</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                                >Shop Drawing Penyedia Jasa</label
                            >
                            <div class="col-sm-10">
                                <div class="container mt-5">
                                    <img
                                        src=""
                                        class="w-100"
                                        id="shopDrawing"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="inputExperience"
                                class="col-sm-2 col-form-label"
                                >Catatan Direksi Lapangan</label
                            >
                            <div class="col-sm-10">
                                <textarea
                                    class="form-control"
                                    disabled
                                    rows="5"
                                ></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="inputExperience"
                                class="col-sm-2 col-form-label"
                                >Catatan Pejabat Pembuat Komitmen (PPK)</label
                            >
                            <div class="col-sm-10">
                                <textarea
                                    class="form-control"
                                    disabled
                                    rows="5"
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-secondary">
                        <h3 class="card-title">Approval</h3>
                    </div>
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                    >Approval</label
                                >
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input
                                                type="radio"
                                                class="form-check-input"
                                                name="approval"
                                                value="1"
                                                checked />
                                            Disetujui
                                            <i class="input-helper"></i
                                        ></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input
                                                type="radio"
                                                class="form-check-input"
                                                name="approval"
                                                value="0" />
                                            Ditolak
                                            <i class="input-helper"></i
                                        ></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                    >Catatan</label
                                >
                                <div class="col-sm-10">
                                    <textarea
                                        id="catatan"
                                        name="catatan"
                                        class="form-control"
                                        placeholder="Catatan "
                                        rows="5"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-success"
                                data-dismiss="modal"
                            >
                                Sumbit
                            </button>
                            <button
                                type="button"
                                class="btn btn-dark"
                                data-dismiss="modal"
                            >
                                Kembali
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Foto dan Catatan -->
<div
    class="modal fade"
    id="exampleModalDetail"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Foto dan Catatan
                </h5>
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
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"
                            >Direksi Lapangan :</label
                        >
                        <img
                            src=""
                            class="rounded mx-auto d-block"
                            alt=""
                            id="filePPK"
                        />
                        <textarea
                            class="form-control"
                            id="catatanDirlap"
                            disabled
                        ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"
                            >Pejabat Pembuat Komitmen (PPK) :</label
                        >
                        <img
                            src=""
                            class="rounded mx-auto d-block"
                            alt=""
                            id="fileDirlap"
                        />
                        <textarea
                            class="form-control"
                            id="catatanPPK"
                            disabled
                        ></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">
                    Kembali
                </button>
            </div>
        </div>
    </div>
</div>

@endsection @section('script')
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/custom/request.js') }}"></script>

@endsection
