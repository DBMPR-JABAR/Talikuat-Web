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
    <h3 class="page-title">Request</h3>
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
                <table
                    class="display responsive"
                    style="width: 100%"
                    id="request"
                >
                    <thead>
                        <tr>
                            <th style="width: 3%; text-align: center">No.</th>
                            <th>No. Dokumen Diajukan Tanggal</th>
                            <th>Nama Paket</th>
                            <th>Lokasi/Sta Jenis Pekerjaan Perkiraan Volume</th>
                            <th>Shop Drawing</th>
                            <th>Foto dan Catatan</th>
                            <th>Status Dokumen</th>
                            <th style="width: 5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center">1</td>
                            <td>
                                FRM-01/SOP/DBMPR-1<br />
                                2021-05-31
                            </td>
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
                                <img
                                    src="..."
                                    alt="..."
                                    class="img-thumbnail"
                                />
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
                                    Approval
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
    <div class="modal-dialog modal-lg" role="document">
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
                        <div class="card-header">
                            <h3 class="card-title">Data</h3>

                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-tool"
                                    data-card-widget="collapse"
                                    data-toggle="tooltip"
                                    title="Collapse"
                                >
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-tool"
                                    data-card-widget="remove"
                                    data-toggle="tooltip"
                                    title="Remove"
                                >
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Bahan / Material</h3>

                                    <div class="card-tools">
                                        <button
                                            type="button"
                                            class="btn btn-tool"
                                            data-card-widget="collapse"
                                            data-toggle="tooltip"
                                            title="Collapse"
                                        >
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-tool"
                                            data-card-widget="remove"
                                            data-toggle="tooltip"
                                            title="Remove"
                                        >
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div
                                            class="col-xs-12 col-sm-12 col-md-12 col-lg-12"
                                        >
                                            <table
                                                class="table table-bordered table-hover"
                                                id="invoiceItem1"
                                            >
                                                <tbody>
                                                    <tr>
                                                        <th width="2%">
                                                            <input
                                                                id="checkAll1"
                                                                class="formcontrol"
                                                                type="checkbox"
                                                            />
                                                        </th>
                                                        <th width="38%">
                                                            Bahan Digunakan
                                                        </th>
                                                        <th width="15%">
                                                            Volume
                                                        </th>
                                                        <th width="15%">
                                                            Satuan
                                                        </th>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <input
                                                                class="itemRow1"
                                                                type="checkbox"
                                                            />
                                                        </td>
                                                        <td>
                                                            <input
                                                                type="text"
                                                                value=""
                                                                name="bahan[]"
                                                                id="bahan_1"
                                                                class="form-control"
                                                                autocomplete="off"
                                                                readonly=""
                                                            />
                                                        </td>
                                                        <td>
                                                            <input
                                                                type="text"
                                                                value=""
                                                                name="volume_bahan[]"
                                                                id="volume_bahan_1"
                                                                class="form-control"
                                                                autocomplete="off"
                                                                readonly=""
                                                            />
                                                        </td>
                                                        <td>
                                                            <input
                                                                type="text"
                                                                value=""
                                                                name="satuan_bahan[]"
                                                                id="satuan_bahan_1"
                                                                class="form-control"
                                                                autocomplete="off"
                                                                readonly=""
                                                            />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer"></div>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->

                            <!-- Default box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Peralatan</h3>

                                    <div class="card-tools">
                                        <button
                                            type="button"
                                            class="btn btn-tool"
                                            data-card-widget="collapse"
                                            data-toggle="tooltip"
                                            title="Collapse"
                                        >
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-tool"
                                            data-card-widget="remove"
                                            data-toggle="tooltip"
                                            title="Remove"
                                        >
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div
                                            class="col-xs-12 col-sm-12 col-md-12 col-lg-12"
                                        >
                                            <table
                                                class="table table-bordered table-hover"
                                                id="invoiceItem3"
                                            >
                                                <tbody>
                                                    <tr>
                                                        <th width="2%">
                                                            <input
                                                                id="checkAll3"
                                                                class="formcontrol"
                                                                type="checkbox"
                                                            />
                                                        </th>
                                                        <th width="38%">
                                                            Jenis Peralatan
                                                        </th>
                                                        <th width="15%">
                                                            Jumlah
                                                        </th>
                                                        <th width="15%">
                                                            Satuan
                                                        </th>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <input
                                                                class="itemRow3"
                                                                type="checkbox"
                                                            />
                                                        </td>
                                                        <td>
                                                            <input
                                                                type="text"
                                                                value="Jembatan Bailey"
                                                                name="jenis_peralatan[]"
                                                                id="jenis_peralatan_1"
                                                                class="form-control"
                                                                autocomplete="off"
                                                                readonly=""
                                                            />
                                                        </td>
                                                        <td>
                                                            <input
                                                                type="text"
                                                                value="1"
                                                                name="jumlah_peralatan[]"
                                                                id="jumlah_peralatan_1"
                                                                class="form-control"
                                                                autocomplete="off"
                                                                readonly=""
                                                            />
                                                        </td>
                                                        <td>
                                                            <input
                                                                type="text"
                                                                value="unit"
                                                                name="satuan_peralatan[]"
                                                                id="satuan_peralatan_1"
                                                                class="form-control"
                                                                autocomplete="off"
                                                                readonly=""
                                                            />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer"></div>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->

                            <!-- Default box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tenaga Kerja</h3>

                                    <div class="card-tools">
                                        <button
                                            type="button"
                                            class="btn btn-tool"
                                            data-card-widget="collapse"
                                            data-toggle="tooltip"
                                            title="Collapse"
                                        >
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-tool"
                                            data-card-widget="remove"
                                            data-toggle="tooltip"
                                            title="Remove"
                                        >
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div
                                            class="col-xs-12 col-sm-12 col-md-12 col-lg-12"
                                        >
                                            <table
                                                class="table table-bordered table-hover"
                                                id="invoiceItem6"
                                            >
                                                <tbody>
                                                    <tr>
                                                        <th width="2%">
                                                            <input
                                                                id="checkAll6"
                                                                class="formcontrol"
                                                                type="checkbox"
                                                            />
                                                        </th>
                                                        <th width="38%">
                                                            Tenaga Kerja
                                                        </th>
                                                        <th width="15%">
                                                            Jumlah
                                                        </th>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <input
                                                                class="itemRow6"
                                                                type="checkbox"
                                                            />
                                                        </td>
                                                        <td>
                                                            <input
                                                                type="text"
                                                                value="Mandor"
                                                                name="tenaga_kerja[]"
                                                                id="tenaga_kerja_1"
                                                                class="form-control"
                                                                autocomplete="off"
                                                                readonly=""
                                                            />
                                                        </td>
                                                        <td>
                                                            <input
                                                                type="text"
                                                                value="1"
                                                                name="jumlah_tk[]"
                                                                id="jumlah_tk_1"
                                                                class="form-control"
                                                                autocomplete="off"
                                                                readonly=""
                                                            />
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <input
                                                                class="itemRow6"
                                                                type="checkbox"
                                                            />
                                                        </td>
                                                        <td>
                                                            <input
                                                                type="text"
                                                                value="Pekerja"
                                                                name="tenaga_kerja[]"
                                                                id="tenaga_kerja_2"
                                                                class="form-control"
                                                                autocomplete="off"
                                                                readonly=""
                                                            />
                                                        </td>
                                                        <td>
                                                            <input
                                                                type="text"
                                                                value="10"
                                                                name="jumlah_tk[]"
                                                                id="jumlah_tk_2"
                                                                class="form-control"
                                                                autocomplete="off"
                                                                readonly=""
                                                            />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer"></div>
                                <!-- /.card-footer-->
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                    >Shop Drawing Penyedia Jasa</label
                                >
                                <div class="col-sm-10">
                                    <div class="container mt-5">
                                        <img
                                            src="http://124.81.122.131/talikuat-api/storage/app/public/lampiran/file_req/1623065080_jbt sementara.jpg"
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
                                    >Catatan Konsultan</label
                                >
                                <div class="col-sm-10">
                                    <textarea
                                        class="form-control"
                                        id="catatan"
                                        name="catatan"
                                        placeholder="K3 Harus selalu diperhatikan"
                                        readonly=""
                                    ></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="inputExperience"
                                    class="col-sm-2 col-form-label"
                                    >Catatan PPK</label
                                >
                                <div class="col-sm-10">
                                    <textarea
                                        class="form-control"
                                        id="catatan"
                                        name="catatan"
                                        placeholder="lanjutkan"
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
                                Kirim Approval
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
                                Kirim Approval
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
                { responsivePriority: 1 },
                { responsivePriority: 2 },
                { responsivePriority: 3 },
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
