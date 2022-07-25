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
<link rel="stylesheet" href="{{ asset('assets/css/loading.css') }}" />
<style>
    th {
        width: fit-content !important;
    }
</style>
@endsection @section('page-header')
<div class="page-header">
    <h4 class="page-title">Laporan Mingguan Konsultan</h4>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                / Laporan Mingguan
            </li>
        </ol>
    </nav>
</div>
@endsection @section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <form
                action="{{ route('laporan-minggguan-konsultan.update',Request::segment(3)) }}"
                method="POST"
                id="form-laporan-mingguan-konsultan"
            >
                @csrf @method('PUT')

                <input type="hidden" name="file_path" id="file_path" />
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"
                            >Nama Paket</label
                        >
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{$data->dataUmum->nm_paket}}"
                                    required
                                    readonly
                                />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Minggu Ke</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $data->priode }}"
                                name="priode"
                                readonly
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"
                            >Upload File Laporan</label
                        >
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        name="file_laporan"
                                        accept="application/pdf"
                                        id="file_laporan"
                                    />
                                    <label
                                        class="custom-file-label"
                                        for="file_laporan"
                                        >{{$data->file_path ? str_replace("public/lampiran/laporan_konsultan/","",$data->file_path) : 'Choose file'}}</label
                                    >
                                </div>
                                @if($data->file_path)
                                <div class="input-group-append">
                                    <a
                                        class="btn btn-dark"
                                        type="button"
                                        href="{{route('laporan-minggguan-konsultan.showFile',$data->file_path) }}"
                                        target="_blank"
                                    >
                                        <i class="mdi mdi-file-document"></i>
                                    </a>
                                </div>
                                @endif
                            </div>
                            @error('file_path')
                            <div
                                class="invalid-feedback"
                                style="display: block; color: red"
                            >
                                File Harus Diupload
                            </div>
                            @enderror
                            <div class="form-group">
                                <span class="text-danger">
                                    <strong
                                        id="file_laporan_file_error"
                                    ></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-start">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Rencana</label>
                                <input
                                    type="text"
                                    name="rencana"
                                    id="rencana"
                                    class="form-control"
                                    value="{{ $data->rencana }}"
                                    required
                                />
                                @error('rencana')
                                <div
                                    class="invalid-feedback"
                                    style="display: block; color: red"
                                >
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Realisasi</label>
                                <input
                                    type="text"
                                    name="realisasi"
                                    id="realisasi"
                                    class="form-control"
                                    value="{{ $data->realisasi }}"
                                    required
                                />
                                @error('realisasi')
                                <div
                                    class="invalid-feedback"
                                    style="display: block; color: red"
                                >
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Deviasi</label>
                                <input
                                    type="text"
                                    name="deviasi"
                                    id="deviasi"
                                    class="form-control"
                                    value="{{ $data->deviasi }}"
                                    required
                                />
                                @error('deviasi')
                                <div
                                    class="invalid-feedback"
                                    style="display: block; color: red"
                                >
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button
                        type="button"
                        class="btn btn-primary mr-2"
                        data-toggle="modal"
                        data-target="#exampleModal"
                    >
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Apakah Data Yang Dinput sudah Benar ?
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
                Pastikan Data Yang Dinput Sudah Benar, Data dapat diubah selama
                2 jam setelah data disimpan. <br />
                <strong
                    >Batas Waktu Pengubahan Data :
                    <strong
                        style="color: red"
                        >{{ date('d-m-Y h:i:s',strtotime('+2hours',strtotime($data->created_at))) }}</strong
                    >
                </strong>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                >
                    Close
                </button>
                <button type="button" class="btn btn-primary" id="btn-save">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>

@endsection @section('script')
<div class="load">
    <!-- Place at bottom of page -->
</div>
<script>
    function fileValidation(file) {
        var fileId = file.id;
        var fileInput = document.getElementById(file.id);
        var filePath = fileInput.value;
        var allowedExtensions = /(\.pdf)$/i;

        if (!allowedExtensions.exec(filePath)) {
            $("#" + fileId + "_file_error").html(
                "File type Hanya diperbolehkan PDF"
            );
            return false;
        } else {
            $("label[for='" + fileId + "']").html(fileInput.files[0].name);
            $("#" + fileId + "_file_error").html("");
            return true;
        }
    }
    $("#file_laporan").on("change", function () {
        if (fileValidation(this)) {
            $("body").addClass("loading");
            var data = new FormData();
            data.append("filePdf", $("#file_laporan")[0].files[0]);
            $.ajax({
                url: "http://182.253.37.42:3000/api/parse-pdf",
                type: "POST",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
            })
                .done(function (res) {
                    $("body").removeClass("loading");
                    console.log(res);
                    $("#rencana").val(res.data.rencana);
                    $("#realisasi").val(res.data.realisasi);
                    $("#deviasi").val(res.data.deviasi);
                    $("#file_path").val(res.data.filePath);
                    $("body").removeClass("loading");
                })
                .fail(function (res) {
                    console.log(res);
                    $("#file_laporan_file_error").html(
                        "File tidak dapat diproses, pastikan file yang diupload sesuai dengan format"
                    );

                    $("body").removeClass("loading");
                });
        } else {
            $("#btn-save").attr("disabled", "disabled");
        }
    });
    $("#btn-save ").on("click", function () {
        $("#form-laporan-mingguan-konsultan").submit();
    });
</script>
@endsection
