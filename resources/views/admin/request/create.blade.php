@extends('layout.index') @section('title','Request') @section('header')
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
        <form>
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
                                id="kegiatan"
                                name="kegiatan"
                                value=""
                                required="required"
                                readonly=""
                            />
                            <input
                                id="unor"
                                type="hidden"
                                value=""
                                class="form-control"
                                name="unor"
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
                                value=""
                                required="required"
                                readonly=""
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
                                value=""
                                required="required"
                                readonly=""
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
                                value=""
                                required="required"
                                readonly=""
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
                                    value=""
                                    required="required"
                                    readonly=""
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
                                value=""
                                required="required"
                                readonly=""
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

                        <div class="card-footer bg-secondary"></div>
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

                        <div class="card-footer bg-secondary"></div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- Tenga Kerja -->
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

                        <div class="card-footer bg-secondary"></div>
                        <!-- /.card-footer-->
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"
                            >Shop Drawing Penyedia Jasa</label
                        >
                        <div class="col-sm-10">
                            <div class="container mt-5">
                                <img
                                    src="https://tk.temanjabar.net/storage/app/public/lampiran/file_req/1623065080_jbt sementara.jpg"
                                    style="border: 1px solid black"
                                    width="80%"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer" style="display: block"></div>
                <!-- /.card-footer-->
            </div>
        </form>
    </div>
</div>

@endsection
