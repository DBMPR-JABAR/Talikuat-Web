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
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <table class="display responsive">
                    <thead>
                        <tr>
                            <th>No. Dokumen Diajukan Tanggal</th>
                            <th>Unor</th>
                            <th>Nomor Kontrak</th>
                            <th>Nama Kegiatan</th>
                            <th>Lokasi/Sta Jenis Pekerjaan Perkiraan Volume</th>
                            <th>Foto dan Catatan</th>
                            <th>Status Dokumen</th>
                            <th style="width: 5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                FRM-01/SOP/DBMPR-1<br />
                                2021-05-31
                            </td>
                            <td>
                                UPTD Pengelolaan Jalan dan Jembatan Wilayah
                                Pelayanan - V
                            </td>
                            <td>602.1/375/KTR/PPK.PPJ/PJ2WP.V</td>
                            <td>
                                1 M Pekerjaan Penggantian Jembatan Ciroke Ruas
                                Jalan Ciawigebang - Bts.Cirebon/Kuningan (Waled)
                                Km.Cn. 58+420
                            </td>
                            <td>
                                Km.Cn.58+420<br />
                                1.8.(2) - Jembatan Sementara<br />
                                1.00 (LS)
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
                                    data-whatever="Detail :"
                                >
                                    Lihat
                                </button>
                            </td>
                            <td>Dokumen Berada di PPK</td>
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
                                    data-whatever="Approval :"
                                >
                                    Respon
                                </button>
                            </td>
                        </tr>
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

                            <!-- Tenaga Kerja -->
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

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                    >Shop Drawing Penyedia Jasa</label
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

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"
                            >Direksi Lapangan :</label
                        >
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input
                                    type="file"
                                    class="custom-file-input"
                                    id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01"
                                    accept="image/x-png,image/gif,image/jpeg,application/pdf"
                                />
                                <label
                                    class="custom-file-label"
                                    for="inputGroupFile01"
                                    >Choose file</label
                                >
                            </div>
                        </div>
                        <textarea
                            class="form-control"
                            id="message-text"
                            placeholder="Catatan Direksi Lapangan"
                        ></textarea
                        ><br />

                        <div class="custom-control custom-radio">
                            <input
                                type="radio"
                                id="customRadio1"
                                name="customRadio"
                                class="custom-control-input"
                            />
                            <label
                                class="custom-control-label"
                                for="customRadio1"
                                >Disetujui</label
                            >
                        </div>
                        <div class="custom-control custom-radio">
                            <input
                                type="radio"
                                id="customRadio2"
                                name="customRadio"
                                class="custom-control-input"
                            />
                            <label
                                class="custom-control-label"
                                for="customRadio2"
                                >Ditolak</label
                            >
                        </div>

                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-dark"
                                data-dismiss="modal"
                            >
                                Kembali
                            </button>
                            <button type="button" class="btn btn-success">
                                Kirim Respon
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label"
                            >Pejabat Pembuat Komitmen (PPK) :</label
                        >
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input
                                    type="file"
                                    class="custom-file-input"
                                    id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01"
                                    accept="image/x-png,image/gif,image/jpeg,application/pdf"
                                />
                                <label
                                    class="custom-file-label"
                                    for="inputGroupFile01"
                                    >Choose file</label
                                >
                            </div>
                        </div>
                        <textarea
                            class="form-control"
                            id="message-text"
                            placeholder="Catatan Pejabat Pembuata Komitmen (PPK)"
                        ></textarea
                        ><br />

                        <div class="custom-control custom-radio">
                            <input
                                type="radio"
                                id="customRadio1"
                                name="customRadio"
                                class="custom-control-input"
                            />
                            <label
                                class="custom-control-label"
                                for="customRadio1"
                                >Disetujui</label
                            >
                        </div>
                        <div class="custom-control custom-radio">
                            <input
                                type="radio"
                                id="customRadio2"
                                name="customRadio"
                                class="custom-control-input"
                            />
                            <label
                                class="custom-control-label"
                                for="customRadio2"
                                >Ditolak</label
                            >
                        </div>

                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-dark"
                                data-dismiss="modal"
                            >
                                Kembali
                            </button>
                            <button type="button" class="btn btn-success">
                                Kirim Respon
                            </button>
                        </div>
                    </div>
                </form>
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
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"
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
                            placeholder="Catatan Pejabat Pembuata Komitmen (PPK)"
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

<script>
    $(document).ready(() => {
        $("#request").DataTable({
            responsive: true,
            columns: [
                { responsivePriority: 4 },
                { responsivePriority: 3 },
                { responsivePriority: 2 },
                { responsivePriority: 1 },
                { responsivePriority: 5 },
                { responsivePriority: 6 },
                { responsivePriority: 7 },
                { responsivePriority: 8 },
            ],
        });
    });
    $("#exampleModal").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data("whatever");
        var modal = $(this);
        modal.find(".modal-title").text("New message to " + recipient);
        modal.find(".modal-body input").val(recipient);
    });
</script>
@endsection
