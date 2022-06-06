@extends('layout.index') @section('title','Request') @section('header')
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
@endsection @section('page-header')
<div class="page-header">
    <h3 class="page-title">
        @if(Request::segment(3) == 'create') Create @elseif(Request::segment(3)
        == 'edit') Edit @else Detail @endif Request
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('masterppk.index') }}">Request</a>
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
        <div class="card">
            <div class="card-body" style="display: block">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"
                        >Kegiatan / Paket</label
                    >
                    <div class="col-sm-10">
                        <input
                            type="text"
                            class="form-control"
                            value="{{$data->dataUmumDetail->dataUmum->nm_paket}}"
                            readonly
                        />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Diajukan Tgl</label>
                    <div class="col-sm-10">
                        <input
                            type="date"
                            class="form-control"
                            name="tgl_diajukan"
                            required
                            value="{{$data->tgl_request}}"
                            readonly
                        />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lokasi/Sta</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            class="form-control"
                            name="lokasi_sta"
                            required
                            value="{{$data->lokasi_sta}}"
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
                            name="lokasi_sta"
                            required
                            value="{{$data->jadual->nmp . ' - ' . $data->jadual->uraian}}"
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
                                type="number"
                                class="form-control"
                                name="volume"
                                step="0.001"
                                required
                                id="volume"
                                oninput="replace(this.value)"
                                value="{{$data->volume}}"
                                readonly
                            />
                        </div>
                        <p class="fs-6 text-danger"></p>
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
                            name="tgl_dikerjakan"
                            value="{{ $data->tgl_dikerjakan }}"
                            readonly
                        />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"
                        >File Shop Drawing</label
                    >
                    <div class="col-sm-10">
                        <img
                            src="{{route('request.file',$data->file_shopdrawing)}}"
                            alt="{{$data->file_shopdrawing}}"
                            width="100%"
                            class="img-thumbnail"
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
                                    <tbody>
                                        @foreach($data->detailBahan as $b)
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
                                                        placeholder="Sement"
                                                        name="bahan_material[]"
                                                        value="{{$b->bahan_material}}"
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
                                                        type="number"
                                                        placeholder="2.00"
                                                        step="0.001"
                                                        name="volume_material[]"
                                                        value="{{$b->volume}}"
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
                                                        placeholder="Sack"
                                                        name="satuan_material[]"
                                                        value="{{$b->satuan}}"
                                                    />
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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
                                    onclick="addRow('tableBahan')"
                                >
                                    <i class="mdi mdi-plus"></i>
                                </button>
                                <button
                                    class="btn btn-sm btn-danger"
                                    type="button"
                                    onclick="removeRow('tableBahan')"
                                >
                                    <i class="mdi mdi-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- Bahan JMF -->
                <div class="card mb-3">
                    <div class="card-header bg-secondary">
                        <h3 class="card-title">Bahan Campuran ( JMF )</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <table
                                    class="table table-bordered table-striped"
                                    id="tableJMF"
                                >
                                    <thead>
                                        <th>Bahan Digunakan</th>
                                        <th>Volume</th>
                                        <th>Satuan</th>
                                    </thead>
                                    <tbody>
                                        @foreach($data->detailBahanJMF as $j)
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
                                                        name="bahan_jmf[]"
                                                        value="{{$j->bahan_jmf}}"
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
                                                        type="number"
                                                        step="0.001"
                                                        name="volume_jmf[]"
                                                        value="{{$j->volume}}"
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
                                                        name="satuan_jmf[]"
                                                        value="{{$j->satuan}}"
                                                    />
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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
                                    onclick="addRow('tableJMF')"
                                >
                                    <i class="mdi mdi-plus"></i>
                                </button>
                                <button
                                    class="btn btn-sm btn-danger"
                                    type="button"
                                    onclick="removeRow('tableJMF')"
                                >
                                    <i class="mdi mdi-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-footer-->
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
                                    <tbody>
                                        @foreach($data->detailPeralatan as $p)
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
                                                        value="{{$p->jenis_peralatan}}"
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
                                                        type="number"
                                                        name="jumlah_peralatan[]"
                                                        step="1"
                                                        value="{{$p->jumlah}}"
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
                                                        name="satuan_peralatan[]"
                                                        value="{{$p->satuan}}"
                                                    />
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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
                                    onclick="addRow('tablePeralatan')"
                                >
                                    <i class="mdi mdi-plus"></i>
                                </button>
                                <button
                                    class="btn btn-sm btn-danger"
                                    type="button"
                                    onclick="removeRow('tablePeralatan')"
                                >
                                    <i class="mdi mdi-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- Tenga Kerja -->
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
                                    <tbody>
                                        @foreach($data->detailTenagaKerja as $t)
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
                                                        name="tenaga_kerja[]"
                                                        value="{{$t->tenaga_kerja}}"
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
                                                        type="number"
                                                        name="jumlah_tenaga_kerja[]"
                                                        step="1"
                                                        value="{{$t->jumlah}}"
                                                    />
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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
                                    onclick="addRow('tableTenagaKerja')"
                                >
                                    <i class="mdi mdi-plus"></i>
                                </button>
                                <button
                                    class="btn btn-sm btn-danger"
                                    type="button"
                                    onclick="removeRow('tableTenagaKerja')"
                                >
                                    <i class="mdi mdi-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>

            <div class="card-footer" style="display: block">
                <a
                    class="btn btn-sm btn-primary"
                    href="{{ route('request.print',$data->id) }}"
                >
                    <i class="mdi mdi-content-save"></i>
                    Print
                </a>
            </div>
            <!-- /.card-footer-->
        </div>
    </div>
</div>

@endsection @section('script') @endsection
