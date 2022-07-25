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
                action="{{ route('laporan-minggguan-konsultan.store') }}"
                method="POST"
                id="form-laporan-mingguan-konsultan"
            >
                @csrf
                <input type="hidden" name="file_path" id="file_path" />
                <input
                    type="hidden"
                    name="data_umum_id"
                    id="data_umum_id"
                    value="{{Request::segment(4)}}"
                />
                <input
                    type="hidden"
                    name="tgl_start"
                    value="{{ $getTgl[0] }}"
                />
                <input type="hidden" name="tgl_end" value="{{ $getTgl[1] }}" />
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
                                    value="{{$dataUmum->nm_paket}}"
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
                                value="{{ $count }}"
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
                            <div class="input-group">
                                <input
                                    type="file"
                                    class="form-control"
                                    id="file_laporan"
                                    name="file_laporan"
                                    required
                                    accept="application/pdf"
                                />

                                <div
                                    class="invalid-feedback"
                                    id="invalid-file_laporan"
                                    style="display: block; color: red"
                                ></div>
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
                2 jam setelah data disimpan.
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
    $("#file_laporan").on("change", function () {
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
                $("#invalid-file_laporan").html(
                    "File tidak dapat diproses, pastikan file yang diupload sesuai dengan format"
                );

                $("body").removeClass("loading");
            });
    });
    $("#btn-save ").on("click", function () {
        $("#form-laporan-mingguan-konsultan").submit();
    });
</script>
@endsection
