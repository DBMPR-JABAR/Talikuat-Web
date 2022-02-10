@extends('layout.index') @section('title','Kontraktor') @section('header')
@endsection @section('page-header')
<div class="page-header">
    <h3 class="page-title">
        @if(Request::segment(3) == 'create') Create @elseif(Request::segment(3)
        == 'edit') Edit @else Detail @endif Jadual
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('masterppk.index') }}">Jadual</a>
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Umum</h4>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        {{--
                        <li><i class="feather icon-maximize full-card"></i></li>
                        --}}
                        <li>
                            <i class="feather icon-minus minimize-card"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="card-block">
                    <div class="row align-items-start">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Pemda</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ @$data->pemda ? : 'PEMERINTAH PROVINSI JAWA BARAT' }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>OPD</label>
                                <input
                                    type="text"
                                    name="opd"
                                    id="opd"
                                    value="{{ @$data->opd ? : 'DINAS BINA MARGA DAN PENATAAN RUANG' }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kategori Paket Kegiatan</label>
                                <input
                                    type="text"
                                    name="opd"
                                    id="opd"
                                    value="{{ $data->kategori_paket->nama_kategori }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Kegiatan / Paket</label>
                                <input
                                    type="text"
                                    name="opd"
                                    id="opd"
                                    value="{{ $data->nm_paket }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-start">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Unor</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->uptd->nama }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>No. Kontrak</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->no_kontrak }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Kontrak</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->tgl_kontrak }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nilai Kontrak</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->detail->nilai_kontrak }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-start">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>No. SPMK</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->no_spmk }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal SPMK</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->tgl_spmk }}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Panjang KM</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->detail->panjang_km}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Waktu Pelaksanaan</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->detail->lama_waktu}} Hari"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-start">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PPK Kegiatan</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{ $data->ppk_kegiatan}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PPK</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{@$data->detail->ppk->nama}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Konsultan Supervisi</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{$data->detail->konsultan->nama}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Penyedia Jasa</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value="{{$data->detail->kontraktor->nama}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Field Team</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value=" {{$data->detail->ft->nama}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>General Superintendent</label>
                                <input
                                    type="text"
                                    name="pemda"
                                    id="pemda"
                                    value=" {{$data->detail->gs->nama}}"
                                    class="form-control"
                                    readonly
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Jadual Pekerjaan</h4>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        {{--
                        <li><i class="feather icon-maximize full-card"></i></li>
                        --}}
                        <li>
                            <i class="feather icon-minus minimize-card"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="card-block">
                    <div class="row"></div>
                    <div class="row">
                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label>File jadual</label>
                                <div class="input-group">
                                    <input
                                        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                        type="file"
                                        class="form-control"
                                        id="fileJadual"
                                        aria-describedby="inputGroupFileAddon04"
                                        aria-label="Upload"
                                    />
                                    <button
                                        class="btn btn-success"
                                        type="button"
                                    >
                                        Upload
                                    </button>
                                </div>
                            </div>
                            <div class="progress">
                                <div
                                    class="progress-bar"
                                    role="progressbar"
                                    style="width: 5%"
                                    aria-valuenow="0"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                    id="progressUpload"
                                >
                                    5%
                                </div>
                            </div>

                            <div id="status"></div>
                            <span class="text-danger" style="font-size: small"
                                >Format File Salah</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')
<script>
    $(document).ready(() => {
        $(".progress").hide();
        $("#fileJadual").change((e) => {
            e.preventDefault();
            $(".col-md-6").removeClass("border border-danger");
            $(".text-danger").hide();
        });

        $(".text-danger").hide();
        $(".btn-success").click((e) => {
            e.preventDefault();
            const file = $("#fileJadual").val();
            if (file == "") {
                $(".col-md-6").addClass("border border-danger");
                $(".text-danger").text("Format File Salah");
                $(".text-danger").show();
                return false;
            }
            if (file.replace(/^.*\./, "") != "xlsx") {
                $(".col-md-6").addClass("border border-danger");
                $(".text-danger").text("Format File Salah");
                $(".text-danger").show();
                return false;
            }

            const formData = new FormData();
            formData.append("jadual_excel_file", $("#fileJadual")[0].files[0]);
            formData.append("id", "{{$data->id}}");
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('jadual.exceltodata') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                xhr: () => {
                    const xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener(
                        "progress",
                        function (e) {
                            $(".progress").show();
                            const file1Size = $("#fileJadual")[0].files[0].size;
                            let percent = Math.round(
                                (e.loaded / file1Size) * 100
                            );
                            if (e.loaded <= file1Size) {
                                $("#progressUpload")
                                    .width(percent + "%")
                                    .html(percent + "%");
                            }
                            $("#progressUpload")
                                .width(percent + "%")
                                .html(percent + "%");
                        },
                        false
                    );
                    return xhr;
                },
                success: (res) => {
                    console.log(res);
                },
                error: (error) => {
                    console.log(
                        $(".text-danger").text(error.responseJSON.message)
                    );
                    $(".col-md-6").addClass("border border-danger");
                    $(".text-danger").text(error.responseJSON.message);
                    $(".text-danger").show();
                },
            });
        });
    });
</script>
@endsection
