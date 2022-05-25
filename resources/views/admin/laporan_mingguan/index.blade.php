@extends('layout.index') @section('title','Laporan Mingguan') @section('header')
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
    <h4 class="page-title">Laporan Mingguan</h4>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="/Talikuat-Backend/public/admin/dashboard">Dashboard</a>
                / Laporan Mingguan
            </li>
        </ol>
    </nav>
</div>
@endsection @section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <table
                    class="display nowrap"
                    id="laporanmingguan"
                    style="width: 100%"
                >
                    <thead>
                        <th>Tanggal</th>
                        <th>Nama Kegiatan / Paket</th>
                        <th>Kode dan Nama Jenis Pekerjaan</th>
                        <th>Volume</th>
                        <th>Status Dokumen</th>
                        <th style="width: 5%">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($data as $d) @foreach($d->laporan as $l)
                        <tr>
                            <td>
                                {{$l->tgl_mulai}} -
                                {{date('Y-m-d', strtotime($l->tgl_mulai.'+ 7 days' )) .' ( Minggu '. $l->minggu_ke.' )' }}
                            </td>
                            <td>
                                {{$d->nm_paket}}
                            </td>
                            <td>
                                {{$l->jenis_pekerjaan}}
                            </td>
                            <td>
                                {{$l->volume.' '.$l->satuan    }}
                            </td>
                            <td>
                                @if($l->status == '0')
                                <span class="badge badge-dark">
                                    Belum Dikirim
                                </span>
                                @endif @if($l->status == '1')
                                <span class="badge badge-warning">
                                    Menunggu Approval DIRLAP
                                </span>
                                @endif @if($l->status == '2')
                                <span class="badge badge-danger">
                                    Ditolak Oleh DIRLAP
                                </span>
                                @endif @if($l->status == '3')
                                <span class="badge badge-warning">
                                    Menunggu Approval PPK
                                </span>
                                @endif @if($l->status == '4')
                                <span class="badge badge-danger">
                                    Ditolak Oleh PPK
                                </span>
                                @endif @if($l->status == '5')
                                <span class="badge badge-success">
                                    Disetujui Oleh PPK
                                </span>
                                @endif
                            </td>

                            <td>
                                <!-- Super Admin -->
                                @if(Auth::user()->user_detail->rule_user_id ==
                                1)
                                <a
                                    type="button"
                                    data-toggle="modal"
                                    data-target="#modalResponLaporan"
                                    data-id="{{$l->id}}"
                                    onclick="rederModalDetail(this)"
                                    class="btn btn-sm btn-success waves-effect waves-light"
                                    ><i class="mdi mdi-search-web menu-icon"></i
                                ></a>

                                <a
                                    type="button"
                                    class="btn btn-sm btn-warning waves-effect waves-light"
                                    data-toggle="modal"
                                    data-target="#modalResponLaporan"
                                    data-id="{{$l->id}}"
                                    onclick="rederModalDetail(this)"
                                >
                                    <i class="mdi mdi-pencil menu-icon"></i>
                                </a>
                                <a
                                    type="button"
                                    class="btn btn-sm btn-danger waves-effect waves-light"
                                    data-toggle="modal"
                                    data-target="#modalResponLaporan"
                                    data-id="{{$l->id}}"
                                    onclick="rederModalDetail(this)"
                                >
                                    <i class="mdi mdi-delete"></i>
                                </a>
                                @endif
                                <!-- Admin Uptd -->
                                @if(Auth::user()->user_detail->rule_user_id ==3)
                                <!-- Create -->
                                @if($l->status == 0)
                                <a
                                    type="button"
                                    href="{{route('laporan.send',$l->id)}}"
                                    data-tooltip="tooltip"
                                    title="Kirim Laporan"
                                    class="btn btn-sm btn-success waves-effect waves-light"
                                    ><i class="mdi mdi-file-send"></i>
                                </a>
                                <a
                                    type="button"
                                    data-tooltip="tooltip"
                                    href="{{route('laporan.edit',$l->id)}}"
                                    title="Edit Laporan"
                                    class="btn btn-sm btn-warning waves-effect waves-light"
                                    ><i class="mdi mdi-pencil menu-icon"></i>
                                </a>
                                <a
                                    type="button"
                                    href="{{route('laporan.destroy',$l->id)}}"
                                    data-tooltip="tooltip"
                                    title="Delete Laporan"
                                    class="btn btn-sm btn-danger waves-effect waves-light"
                                    ><i class="mdi mdi-delete menu-icon"></i>
                                </a>
                                @endif @if($l->status == 1) @endif
                                <!-- DItolak Dirlap -->
                                @if($l->status == 2)
                                <a
                                    type="button"
                                    href="{{route('laporan.send',$l->id)}}"
                                    data-tooltip="tooltip"
                                    title="Kirim Laporan"
                                    class="btn btn-sm btn-success waves-effect waves-light"
                                    ><i class="mdi mdi-file-send"></i>
                                </a>
                                <a
                                    type="button"
                                    data-tooltip="tooltip"
                                    href="{{route('laporan.edit',$l->id)}}"
                                    title="Revisi Laporan"
                                    class="btn btn-sm btn-warning waves-effect waves-light"
                                    ><i class="mdi mdi-pencil menu-icon"></i>
                                </a>

                                @endif @if($l->status == 4)
                                <a
                                    type="button"
                                    href="{{route('laporan.send',$l->id)}}"
                                    data-tooltip="tooltip"
                                    title="Kirim Laporan"
                                    class="btn btn-sm btn-success waves-effect waves-light"
                                    ><i class="mdi mdi-file-send"></i>
                                </a>
                                <a
                                    type="button"
                                    data-tooltip="tooltip"
                                    href="{{route('laporan.edit',$l->id)}}"
                                    title="Revisi Laporan"
                                    class="btn btn-sm btn-warning waves-effect waves-light"
                                    ><i class="mdi mdi-pencil menu-icon"></i>
                                </a>

                                @endif @if($l->status == 5) @endif @endif
                                <!-- DIRLAP -->
                                @if(Auth::user()->user_detail->rule_user_id ==
                                14) @if($l->status == 1)
                                <a
                                    type="button"
                                    href="{{route('laporan.send',$l->id)}}"
                                    data-tooltip="tooltip"
                                    title="Respon Laporan"
                                    class="btn btn-sm btn-success waves-effect waves-light"
                                    data-toggle="modal"
                                    data-target="#modalResponLaporan"
                                    data-role="dirlap"
                                    data-url="{{ route('laporan.approval',$l->id) }}"
                                    onclick="rederModalDetail(this)"
                                    ><i class="mdi mdi-file-send"></i>
                                </a>
                                @endif @endif
                                <!-- PPK -->
                                @if(Auth::user()->user_detail->rule_user_id ==2
                                || Auth::user()->user_detail->rule_user_id ==15)
                                @if($l->status == 3)
                                <a
                                    type="button"
                                    href="{{route('laporan.send',$l->id)}}"
                                    data-tooltip="tooltip"
                                    title="Respon Laporan"
                                    class="btn btn-sm btn-success waves-effect waves-light"
                                    data-toggle="modal"
                                    data-target="#modalResponLaporan"
                                    data-role="ppk"
                                    data-url="{{ route('laporan.approval',$l->id) }}"
                                    onclick="rederModalDetail(this)"
                                    ><i class="mdi mdi-file-send"></i>
                                </a>
                                @endif @endif
                            </td>
                        </tr>
                        @endforeach @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Approval -->
<div
    class="modal fade bd-example-modal-lg"
    id="modalResponLaporan"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myLargeModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
                    Laporan Mingguan Approval
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
                <form>
                    <div class="card card-danger">
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
                                        value=""
                                        required="required"
                                        readonly=""
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                    >Ruas Jalan</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="ruas_jalan"
                                        name="ruas_jalan"
                                        value=""
                                        required="required"
                                        readonly=""
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                    >Segmen Jalan</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="segmen_jalan"
                                        name="segmen_jalan"
                                        value=""
                                        required="required"
                                        readonly=""
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                    >Tanggal</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="date"
                                        class="form-control"
                                        id="tanggal"
                                        name="tanggal"
                                        value=""
                                        required="required"
                                        readonly=""
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                    >Nomor Request</label
                                >
                                <div class="col-sm-10">
                                    <div class="input-group mb-3">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="no_request"
                                            name="no_request"
                                            value=""
                                            required="required"
                                            readonly=""
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                    >Penyedia Jasa</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="foto"
                                        name="foto"
                                        value=""
                                        required="required"
                                        readonly=""
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                    >Direksi Lapangan
                                </label>
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="foto"
                                        name="foto"
                                        value=""
                                        required="required"
                                        readonly=""
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                    >Pejabat Pembuat <br />
                                    Komitmen (PPK)
                                </label>
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="foto"
                                        name="foto"
                                        value=""
                                        required="required"
                                        readonly=""
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                    >Shop Drawing / Foto Dokumentasi</label
                                >
                                <div class="col-sm-10">
                                    <img
                                        src=""
                                        style="border: 1px solid black"
                                        width="25%"
                                    />
                                </div>
                            </div>

                            <!--Jenis Pekerjaan-->
                            <div class="card mb-3">
                                <div class="card-header bg-secondary">
                                    <h3 class="card-title">Jenis Pekerjaan</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <table
                                                class="table table-bordered table-striped"
                                                id="invoiceItem1"
                                            >
                                                <thead>
                                                    <th>No Pekerjaan</th>
                                                    <th>Jenis Pekerjaan</th>
                                                    <th>STA Awal</th>
                                                    <th>STA Akhir</th>
                                                    <th>Ki / Ka</th>
                                                    <th>Volume</th>
                                                    <th>Satuan</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td
                                                            style="
                                                                width: 10%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 20%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 10%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 10%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 10%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->

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
                                                id="invoiceItem1"
                                            >
                                                <thead>
                                                    <th>Bahan Digunakan</th>
                                                    <th>Volume</th>
                                                    <th>Satuan</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td
                                                            style="
                                                                width: 40%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 20%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 20%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->

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
                                                id="invoiceItem1"
                                            >
                                                <thead>
                                                    <th>Bahan Digunakan</th>
                                                    <th>Volume</th>
                                                    <th>Satuan</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td
                                                            style="
                                                                width: 40%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 20%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 20%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->

                            <!-- Bahan Hotmix Asphalt -->
                            <div class="card mb-3">
                                <div class="card-header bg-secondary">
                                    <h3 class="card-title">
                                        Bahan Hotmix Asphalt
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <table
                                                class="table table-bordered table-striped"
                                                id="invoiceItem1"
                                            >
                                                <thead>
                                                    <th>Bahan Digunakan</th>
                                                    <th>No. Dump Truck</th>
                                                    <th>
                                                        Waktu <br />
                                                        Datang
                                                    </th>
                                                    <th>
                                                        Waktu <br />
                                                        Hampar
                                                    </th>
                                                    <th>
                                                        Suhu <br />
                                                        Datang
                                                    </th>
                                                    <th>
                                                        Suhu<br />
                                                        Hampar
                                                    </th>
                                                    <th>P(M)</th>
                                                    <th>L(M)</th>
                                                    <th>T.Gembur(M)</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td
                                                            style="
                                                                width: 30%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Bahan Beton Ready Mix-->
                            <div class="card mb-3">
                                <div class="card-header bg-secondary">
                                    <h3 class="card-title">
                                        Bahan Beton Ready Mix
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <table
                                                class="table table-bordered table-striped"
                                                id="invoiceItem1"
                                            >
                                                <thead>
                                                    <th>Bahan Digunakan</th>
                                                    <th>No. Truck Mixer</th>
                                                    <th>
                                                        Waktu <br />
                                                        Datang
                                                    </th>
                                                    <th>
                                                        Waktu <br />
                                                        Curah
                                                    </th>
                                                    <th>
                                                        Slump <br />
                                                        Test
                                                    </th>
                                                    <th>Satuan</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td
                                                            style="
                                                                width: 30%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 15%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Tenaga Kerja-->
                            <div class="card mb-3">
                                <div class="card-header bg-secondary">
                                    <h3 class="card-title">Tenaga Kerja</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <table
                                                class="table table-bordered table-striped"
                                                id="invoiceItem1"
                                            >
                                                <thead>
                                                    <th>Tenaga Kerja</th>
                                                    <th>Jumlah</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td
                                                            style="
                                                                width: 30%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 30%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Laporan Cuaca-->
                            <div class="card mb-3">
                                <div class="card-header bg-secondary">
                                    <h3 class="card-title">Laporan Cuaca</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <table
                                                class="table table-bordered table-striped"
                                                id="invoiceItem1"
                                            >
                                                <thead>
                                                    <th>Cerah</th>
                                                    <th>Hujan Ringan</th>
                                                    <th>Hujan Lebat</th>
                                                    <th>Bencana Alam</th>
                                                    <th>Lain-lain</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td
                                                            style="
                                                                width: 20%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 20%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 20%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 20%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                        <td
                                                            style="
                                                                width: 20%;
                                                                padding: 10px;
                                                            "
                                                        >
                                                            <div class="col">
                                                                <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Default input"
                                                                    aria-label="default input example"
                                                                />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                    >Shop Drawing</label
                                >
                                <div class="col-sm-10">
                                    <div class="container mt-5">
                                        <img
                                            src=""
                                            style="border: 1px solid black"
                                            width="80%"
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
                                        id="catatan"
                                        name="catatan"
                                        placeholder=""
                                        readonly=""
                                    ></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="inputExperience"
                                    class="col-sm-2 col-form-label"
                                    >Catatan Pejabat Pembuat Komitmen
                                    (PPK)</label
                                >
                                <div class="col-sm-10">
                                    <textarea
                                        class="form-control"
                                        id="catatan"
                                        name="catatan"
                                        placeholder=""
                                        readonly=""
                                    ></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer" style="display: block"></div>
                        <!-- /.card-footer-->
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
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Foto dan Catatan Dirlap-->
<div
    class="modal fade"
    id="modalResponLaporan"
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
                            src="..."
                            class="rounded mx-auto d-block"
                            alt="..."
                        />
                        <textarea
                            class="form-control"
                            id="message-text"
                            placeholder="Catatan Direksi Lapangan"
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

<!--Modal Foto dan Catatan PPK-->
<div
    class="modal fade"
    id="exampleModalDetailPpk"
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
                            >Pejabat Pembuat Komitmen (PPK) :</label
                        >
                        <img
                            src="..."
                            class="rounded mx-auto d-block"
                            alt="..."
                        />
                        <textarea
                            class="form-control"
                            id="message-text"
                            placeholder="Catatan Direksi Lapangan"
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

<!--Modal Foto Kontraktor-->
<div
    class="modal fade"
    id="exampleModalDetailFotoKontraktor"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Foto Kegiatan
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
                        <img
                            src="..."
                            class="rounded mx-auto d-block"
                            alt="..."
                        />
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

<script>
    $(document).ready(() => {
        $("body").tooltip({ selector: "[data-tooltip=tooltip]" });
        $("table").DataTable({
            responsive: true,
        });
    });
    function rederModalDetail(el) {
        const data = $(el).data("data");
        $("#modalResponLaporan").find("form").attr("action", $(el).data("url"));
        const dataRole = $(el).data("role");
        const bahan = data.detail_bahan;
        const jmf = data.detail_bahan_j_m_f;
        const peralatan = data.detail_peralatan;
        const tenagaKerja = data.detail_tenaga_kerja;
        console.log(data);
        $("#role").val(dataRole);
        $("#kegiatan").val(data.data_umum_detail.data_umum.nm_paket);
        $("#diajukan_tgl").val(data.tgl_request);
        $("#lokasi_sta").val(data.lokasi_sta);
        $("#jenis_pekerjaan").val(data.jadual.nmp + " " + data.jadual.uraian);
        $("#perkiraan_volume").val(data.volume);
        $("#pelaksanaan_tgl").val(data.tgl_dikerjakan);
        $("#shopDrawing").attr(
            "src",
            "/admin/file-request/" + data.file_shopdrawing
        );
        console.log(data.respon_dirlap);
        $("#catatan_ppk").val(data.respon_ppk);
        $("#catatan_dirlap").val(data.respon_dirlap);

        if (bahan) {
            for (let i = 0; i < bahan.length; i++) {
                $("#tableBahan")
                    .find("tbody")
                    .html(
                        `<tr>
                    <td>${bahan[i].bahan_material}</td>
                    <td>${bahan[i].satuan}</td>
                    <td>${bahan[i].volume}</td>
                    `
                    );
            }
        } else {
            $("#tableBahan")
                .find("tbody")
                .html(
                    "<tr><td colspan='3' class='text-center'>Tidak ada bahan material</td></tr>"
                );
        }

        if (jmf) {
            for (let i = 0; i < jmf.length; i++) {
                $("#tableJMF")
                    .find("tbody")
                    .html(
                        `<tr>
                    <td>${jmf[i].bahan_jmf}</td>
                    <td>${jmf[i].satuan}</td>
                    <td>${jmf[i].volume}</td>
                    `
                    );
            }
        } else {
            $("#tableJmf")
                .find("tbody")
                .html(
                    "<tr><td colspan='3' class='text-center'>Tidak ada bahan material jmf</td></tr>"
                );
        }

        if (peralatan) {
            for (let i = 0; i < peralatan.length; i++) {
                $("#tablePeralatan")
                    .find("tbody")
                    .html(
                        `<tr>
                    <td>${peralatan[i].jenis_peralatan}</td>
                    <td>${peralatan[i].jumlah}</td>
                    <td>${peralatan[i].satuan}</td>
                    `
                    );
            }
        } else {
            $("#tablePeralatan")
                .find("tbody")
                .html(
                    "<tr><td colspan='3' class='text-center'>Tidak ada perlatan</td></tr>"
                );
        }

        if (tenagaKerja) {
            for (let i = 0; i < tenagaKerja.length; i++) {
                $("#tableTenagaKerja")
                    .find("tbody")
                    .html(
                        `<tr>
                    <td>${tenagaKerja[i].tenaga_kerja}</td>
                    <td>${tenagaKerja[i].jumlah}</td>
                    `
                    );
            }
        } else {
            $("#tableTenagaKerja")
                .find("tbody")
                .html(
                    "<tr><td colspan='2' class='text-center'>Tidak ada tenaga kerja</td></tr>"
                );
        }
    }
</script>
@endsection
