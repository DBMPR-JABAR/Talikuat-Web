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
                    class="display responsive"
                    id="laporanmingguan"
                    style="width: 100%"
                >
                    <thead>
                        <th>
                            Tanggal<br />
                            Nama Kegiatan<br />
                            Ruas Jalan
                        </th>
                        <th>
                            Kode dan Nama Jenis Pekerjaan<br />
                            Volume
                        </th>
                        <th>
                            Penyedia Jasa<br />
                            Foto
                        </th>
                        <th>
                            Direksi Lapangan<br />
                            Foto dan Catatan
                        </th>
                        <th>
                            Pejabat Pembuat Komitmen (PPK)<br />
                            Foto dan Catatan
                        </th>
                        <th>Status Dokumen</th>
                        <th style="width: 5%">Aksi</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                2021-06-01<br /><br />
                                1 M Pekerjaan Penggantian Jembatan Ciroke Ruas
                                Jalan Ciawigebang - Bts.Cirebon/Kuningan (Waled)
                                Km.Cn. 58+420<br /><br />
                                Kuningan - Ciawigebang - 308000 - 7970
                            </td>
                            <td>
                                1.8.(2)<br /><br />
                                Jembatan Sementara<br /><br />
                                10.00 LS
                            </td>
                            <td>
                                CV. Maju Sejahtera<br />
                                <button
                                    type="button"
                                    class="btn btn-light"
                                    style="
                                        width: 100px !important;
                                        font-size: 13px !important;
                                    "
                                    data-toggle="modal"
                                    data-target="#exampleModalDetailFotoKontraktor"
                                    data-whatever="Detail :"
                                >
                                    Foto
                                </button>
                            </td>
                            <td>
                                Direksi Lapangan<br />
                                <button
                                    type="button"
                                    class="btn btn-light"
                                    style="
                                        width: 100px !important;
                                        font-size: 13px !important;
                                    "
                                    data-toggle="modal"
                                    data-target="#exampleModalDetailDirlap"
                                    data-whatever="Detail :"
                                >
                                    Lihat
                                </button>
                            </td>
                            <td>
                                Pejabat Pembuat Komitmen<br />
                                <button
                                    type="button"
                                    class="btn btn-light"
                                    style="
                                        width: 100px !important;
                                        font-size: 13px !important;
                                    "
                                    data-toggle="modal"
                                    data-target="#exampleModalDetailPpk"
                                    data-whatever="Detail :"
                                >
                                    Lihat
                                </button>
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-warning"
                                    style="
                                        width: 100px !important;
                                        font-size: 13px !important;
                                    "
                                >
                                    Detail
                                </button>
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
                                    >Ruas Jalan</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="date"
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
                                        type="text"
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
                                    >Shop Drawing / Foto Dokumentasi</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="date"
                                        class="form-control"
                                        id="foto"
                                        name="foto"
                                        value=""
                                        required="required"
                                        readonly=""
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

<!--Modal Foto dan Catatan Dirlap-->
<div
    class="modal fade"
    id="exampleModalDetailDirlap"
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
