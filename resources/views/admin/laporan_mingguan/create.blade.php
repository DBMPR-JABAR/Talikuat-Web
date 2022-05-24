@extends('layout.index') @section('title','Laporan')
<style>
    .box {
        position: relative;
        background: #ffffff;
        width: 100%;
    }
    .box-header {
        color: #444;
        display: block;
        padding: 10px;
        position: relative;
        border-bottom: 1px solid #f4f4f4;
        margin-bottom: 10px;
    }
    .box-tools {
        position: absolute;
        right: 10px;
        top: 5px;
    }
    .dropzone-wrapper {
        border: 2px dashed #91b0b3;
        color: #92b0b3;
        position: relative;
        height: 150px;
    }
    .dropzone-desc {
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        text-align: center;
        width: 40%;
        top: 50px;
        font-size: 16px;
    }
    .dropzone,
    .dropzone:focus {
        position: absolute;
        outline: none !important;
        width: 100%;
        height: 150px;
        cursor: pointer;
        opacity: 0;
    }
    .dropzone-wrapper:hover,
    .dropzone-wrapper.dragover {
        background: #ecf0f5;
    }
    .preview-zone {
        text-align: center;
    }
    .preview-zone .box {
        box-shadow: none;
        border-radius: 0;
        margin-bottom: 0;
    }
</style>
@section('header')@endsection @section('page-header')
<div class="page-header">
    <h3 class="page-title">
        @if(Request::segment(3) == 'create') Create @elseif(Request::segment(3)
        == 'edit') Edit @else Detail @endif Laporan
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('laporan.index') }}">Laporan</a>
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
    <div class="col">
        <form
            action="{{ route('laporan.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <input type="hidden" name="request_id" value="{{ $data->id }}" />
            <input
                type="hidden"
                name="data_umum_id"
                value="{{ $data->dataUmumDetail->dataUmum->id }}"
            />

            <div class="card card-danger">
                <div class="card-body" style="display: block">
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
                                    value="FRM-01/SOP/DBMPR-{{$data->id}}"
                                    required
                                    readonly
                                />
                            </div>
                        </div>
                    </div>
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
                                value="{{ $data->dataUmumDetail->dataUmum->nm_paket }}"
                                required="required"
                                readonly
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Minggu Ke</label>
                        <div class="col-sm-10">
                            <input
                                type="number"
                                class="form-control"
                                id="minggu"
                                name="minggu"
                                min="1"
                                step="1"
                                oninput="replace(this)"
                                max="{{ $jumlah_minggu }}"
                                required
                            />
                        </div>
                    </div>
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="control-label"
                                            >Shop Drawing / Foto
                                            Dokumentasi</label
                                        >
                                        <div class="preview-zone hidden">
                                            <div class="box box-solid">
                                                <div
                                                    class="box-header with-border"
                                                >
                                                    <div>
                                                        <b>Preview</b>
                                                    </div>
                                                    <div
                                                        class="box-tools pull-right"
                                                    >
                                                        <button
                                                            type="button"
                                                            class="btn btn-danger btn-xs remove-preview"
                                                        >
                                                            <i
                                                                class="fa fa-times"
                                                            ></i>
                                                            Reset
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="box-body"></div>
                                            </div>
                                        </div>
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i
                                                    class="glyphicon glyphicon-download-alt"
                                                ></i>
                                                <p>Pilih Image</p>
                                            </div>
                                            <input
                                                type="file"
                                                name="file_dokumentasi"
                                                class="dropzone"
                                                accept="image/*"
                                                required
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
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
                                                            value="{{$data->jadual->nmp}}"
                                                            name="nmp"
                                                            readonly
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
                                                            value="{{$data->jadual->uraian}}"
                                                            name="uraian"
                                                            readonly
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
                                                            name="sta_awal"
                                                            required
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
                                                            name="sta_akhir"
                                                            required
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
                                                        <select
                                                            name="ki_ka"
                                                            class="form-control"
                                                            required
                                                        >
                                                            <option
                                                                value=""
                                                                disabled
                                                            >
                                                                Pilih
                                                            </option>
                                                            <option value="KI">
                                                                KI
                                                            </option>
                                                            <option value="KA">
                                                                KA
                                                            </option>
                                                        </select>
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
                                                            type="number"
                                                            step="0.001"
                                                            max="{{
                                                                $sisa_volume
                                                            }}"
                                                            oninput="replace(this)"
                                                            required
                                                            name="volume"
                                                        />
                                                        <p
                                                            class="fs-6 text-danger"
                                                        >
                                                            Volume Tersedia
                                                            {{ $sisa_volume }}
                                                        </p>
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
                                                            value="{{$data->jadual->satuan}}"
                                                            readonly
                                                            name="satuan"
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
                                        id="tableBahanMaterial"
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
                                                            name="bahan_material[]"
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
                                                            name="volume_bahan[]"
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
                                                            name="satuan_bahan[]"
                                                        />
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-secondary">
                            <div class="row">
                                <div class="col">
                                    <button
                                        class="btn btn-sm btn-success"
                                        type="button"
                                        onclick="addRow('tableBahanMaterial')"
                                    >
                                        <i class="mdi mdi-plus"></i>
                                    </button>
                                    <button
                                        class="btn btn-sm btn-danger"
                                        type="button"
                                        onclick="removeRow('tableBahanMaterial')"
                                    >
                                        <i class="mdi mdi-minus"></i>
                                    </button>
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
                                        id="peralatan"
                                    >
                                        <thead>
                                            <th>Jenis Peralatan</th>
                                            <th>Jumlah</th>
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
                                                            name="jenis_peralatan[]"
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
                                                            name="jumlah_peralatan[]"
                                                        />
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-secondary">
                            <div class="row">
                                <div class="col">
                                    <button
                                        class="btn btn-sm btn-success"
                                        type="button"
                                        onclick="addRow('peralatan')"
                                    >
                                        <i class="mdi mdi-plus"></i>
                                    </button>
                                    <button
                                        class="btn btn-sm btn-danger"
                                        type="button"
                                        onclick="removeRow('peralatan')"
                                    >
                                        <i class="mdi mdi-minus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                    <!-- Bahan Hotmix Asphalt -->
                    <div class="card mb-3">
                        <div class="card-header bg-secondary">
                            <h3 class="card-title">Bahan Hotmix Asphalt</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <table
                                        class="table table-bordered table-striped"
                                        id="bahanHotmix"
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
                                                            name="bahan_hotmix[]"
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
                                                            name="no_dump_truck[]"
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
                                                            name="waktu_datang[]"
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
                                                            name="waktu_hampar[]"
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
                                                            name="suhu_datang[]"
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
                                                            name="suhu_hampar[]"
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
                                                            name="p_m[]"
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
                                                            name="l_m[]"
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
                                                            name="t_gembur_m[]"
                                                        />
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-secondary">
                            <div class="row">
                                <div class="col">
                                    <button
                                        class="btn btn-sm btn-success"
                                        type="button"
                                        onclick="addRow('bahanHotmix')"
                                    >
                                        <i class="mdi mdi-plus"></i>
                                    </button>
                                    <button
                                        class="btn btn-sm btn-danger"
                                        type="button"
                                        onclick="removeRow('bahanHotmix')"
                                    >
                                        <i class="mdi mdi-minus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Bahan Beton Ready Mix-->
                    <div class="card mb-3">
                        <div class="card-header bg-secondary">
                            <h3 class="card-title">Bahan Beton Ready Mix</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <table
                                        class="table table-bordered table-striped"
                                        id="bahanBetonReadyMix"
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
                                                            name="bahan_beton_ready_mix[]"
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
                                                            name="no_truck_mixer[]"
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
                                                            name="waktu_datang[]"
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
                                                            name="waktu_curah[]"
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
                                                            name="slump_test[]"
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
                                                            name="satuan_beton[]"
                                                        />
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-secondary">
                            <div class="row">
                                <div class="col">
                                    <button
                                        class="btn btn-sm btn-success"
                                        type="button"
                                        onclick="addRow('bahanBetonReadyMix')"
                                    >
                                        <i class="mdi mdi-plus"></i>
                                    </button>
                                    <button
                                        class="btn btn-sm btn-danger"
                                        type="button"
                                        onclick="removeRow('bahanBetonReadyMix')"
                                    >
                                        <i class="mdi mdi-minus"></i>
                                    </button>
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
                                        id="tenagaKerja"
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
                                                            name="tenaga_kerja[]"
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
                                                            name="jumlah[]"
                                                        />
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-secondary">
                            <div class="row">
                                <div class="col">
                                    <button
                                        class="btn btn-sm btn-success"
                                        type="button"
                                        onclick="addRow('tenagaKerja')"
                                    >
                                        <i class="mdi mdi-plus"></i>
                                    </button>
                                    <button
                                        class="btn btn-sm btn-danger"
                                        type="button"
                                        onclick="removeRow('tenagaKerja')"
                                    >
                                        <i class="mdi mdi-minus"></i>
                                    </button>
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
                                                            name="cerah"
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
                                                            name="hujan_ringan"
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
                                                            name="hujan_lebat"
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
                                                            name="bencana_alam"
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
                                                            name="lain_lain"
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
                </div>
                <div class="card-footer" style="display: block">
                    <button class="btn btn-sm btn-primary" type="submit">
                        <i class="mdi mdi-content-save"></i>
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection @section('script')
<script src="{{ asset('assets/custom/laporan.js') }}"></script>
<script>
    function replace(el) {
        var val = parseFloat(el.value);
        var max = parseFloat(el.max);
        if (val > max) {
            el.value = max;
        }
    }
    function readFile(input) {
        if (input.files) {
            for (let i = 0; i < input.files.length; i++) {
                var reader = new FileReader();
                if (input.files[i].type.match("image")) {
                    reader.onload = function (e) {
                        var htmlPreview =
                            '<img width="200" src="' +
                            e.target.result +
                            '" />' +
                            "<p>" +
                            input.files[i].name +
                            "</p>";
                        var wrapperZone = $(input).parent();
                        var previewZone = $(input)
                            .parent()
                            .parent()
                            .find(".preview-zone");
                        var boxZone = $(input)
                            .parent()
                            .parent()
                            .find(".preview-zone")
                            .find(".box")
                            .find(".box-body");
                        wrapperZone.removeClass("dragover");
                        previewZone.removeClass("hidden");
                        boxZone.append(htmlPreview);
                    };
                    reader.readAsDataURL(input.files[i]);
                    $(".dropzone-wrapper").hide();
                }
            }
        }
    }
    function reset(e) {
        e.wrap("<form>").closest("form").get(0).reset();
        e.unwrap();
    }
    $(".dropzone").change(function () {
        readFile(this);
    });
    $(".dropzone-wrapper").on("dragover", function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass("dragover");
    });
    $(".dropzone-wrapper").on("dragleave", function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass("dragover");
    });
    $(".remove-preview").on("click", function () {
        var boxZone = $(this).parents(".preview-zone").find(".box-body");
        var previewZone = $(this).parents(".preview-zone");
        var dropzone = $(this).parents(".form-group").find(".dropzone");
        boxZone.empty();
        previewZone.addClass("hidden");
        reset(dropzone);
        $(".dropzone-wrapper").show();
    });
</script>

@endsection
