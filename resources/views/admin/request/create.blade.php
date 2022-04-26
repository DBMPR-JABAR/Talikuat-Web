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
        <form
            action="{{ route('request.store') }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
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
                                value="{{$data->nm_paket}}"
                                readonly
                            />
                            <input
                                type="hidden"
                                value="{{$data->detail->id}}"
                                name="data_umum_detail_id"
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
                                name="tgl_diajukan"
                                required
                                value="{{ old('tgl_diajukan') }}"
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
                                name="lokasi_sta"
                                required
                                value="{{ old('lokasi_sta') }}"
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"
                            >Jenis Pekerjaan</label
                        >
                        <div class="col-sm-10">
                            <select
                                name="jadual_id"
                                class="form-control"
                                required
                                onchange="getVolumeJadual(this.value)"
                            >
                                <option selected disabled>
                                    Jenis Pekerjaan
                                </option>
                                @foreach ($data->jadual->jadualItems as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nmp .' - '. $item->uraian }}
                                </option>
                                @endforeach
                            </select>
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
                                    disabled
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
                                value="{{ old('tgl_dikerjakan') }}"
                            />
                        </div>
                    </div>

                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="control-label"
                                            >Upload File Shop Drawing</label
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
                                                name="file_shop_drawing"
                                                class="dropzone"
                                                accept="image/*"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

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
                                                            type="number"
                                                            name="jumlah_peralatan[]"
                                                            step="1"
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
                    <button class="btn btn-sm btn-primary" type="submit">
                        <i class="mdi mdi-content-save"></i>
                        Simpan
                    </button>
                </div>
                <!-- /.card-footer-->
            </div>
        </form>
    </div>
</div>

@endsection @section('script')

<script>
    $(document).ready(function () {
        $(".fs-6").hide();
    });
    function addRow(idTable) {
        var table;
        switch (idTable) {
            case "tableBahan":
                table = document.getElementById("tableBahan");
                var row = table.insertRow(table.rows.length);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                cell1.innerHTML =
                    '<div class="col"><input class="form-control" type="text" name="jenis_bahan[]" /></div>';
                cell2.innerHTML =
                    '<div class="col"><input class="form-control" type="number" name="jumlah_bahan[]" step="0.001" /></div>';
                cell3.innerHTML =
                    '<div class="col"><input class="form-control" type="text" name="satuan_bahan[]" /></div>';

                break;
            case 'tableJMF':
                table = document.getElementById("tableJMF");
                var row = table.insertRow(table.rows.length);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                cell1.innerHTML =
                    '<div class="col"><input class="form-control" type="text" name="bahan_jmf[]" /></div>';
                cell2.innerHTML =
                    '<div class="col"><input class="form-control" type="number" name="volume_jmf[]" step="0.001" /></div>';
                cell3.innerHTML =
                    '<div class="col"><input class="form-control" type="text" name="satuan_jmf[]" /></div>';
                break;

            case 'tablePeralatan':
                table = document.getElementById("tablePeralatan");
                var row = table.insertRow(table.rows.length);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                cell1.innerHTML =
                    '<div class="col"><input class="form-control" type="text" name="jenis_peralatan[]" /></div>';
                cell2.innerHTML = '<div class="col"><input class="form-control" type="number" name="jumlah_peralatan[]" step="0.001" /></div>';
                cell3.innerHTML =
                    '<div class="col"><input class="form-control" type="text" name="satuan_peralatan[]" /></div>';
                break;
            case 'tableTenagaKerja':
                table = document.getElementById("tableTenagaKerja");
                var row = table.insertRow(table.rows.length);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                cell1.innerHTML =
                    '<div class="col"><input class="form-control" type="text" name="tenaga_kerja[]" /></div>';
                cell2.innerHTML =
                    '<div class="col"><input class="form-control" type="number" name="jumlah_tenaga_kerja[]" step="0.001" /></div>';
                break;
        }
    }
    function removeRow(idTable) {
        var table;
        var rowDelete;
        switch (idTable) {
            case "tableBahan":
                table = $("#tableBahan tr");
                rowDelete = $("#tableBahan tr:last");
                break;

            case "tablePeralatan":
                table = $("#tablePeralatan tr");
                rowDelete = $("#tablePeralatan tr:last");
                break;
            case "tableTenagaKerja":
                table = $("#tableTenagaKerja tr");
                rowDelete = $("#tableTenagaKerja tr:last");
                break;
            case "tableJMF":
                table = $("#tableJMF tr");
                rowDelete = $("#tableJMF tr:last");
                break;
        }

        if (table.length > 2) {
            rowDelete.remove();
        }
    }
    function getVolumeJadual(id) {
        $('#volume').attr('disabled', false);
        const jadual = {!! json_encode($data->jadual->jadualItems) !!};
        jadual.forEach((item) => {
            if (item.id == id) {
                let volume = parseFloat(item.total_volume) - parseFloat(item.volume_terrequest ?? 0);
                if (volume == 0) {
                    $("#volume").attr('disabled', true);
                    $(".fs-6").text('Volume Nomor Mata Pembayaran Sudah habis !');
                    $(".fs-6").show();
                }
                else{
                    $("#volume").attr({
                    max: volume,
                });
                $(".fs-6").text(
                    `Volume Tersedia ${
                        volume
                    } `
                );

                }

            }
        });
    }
    function replace(val) {
        var val = parseFloat(val);
        var max = parseFloat($("#volume").attr("max"));
        if (val > max) {
            $("#volume").val(max);
        }
        $('.fs-6').text(`Volume Tersedia ${max} `);
        $('.fs-6').show();
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
                    $('.dropzone-wrapper').hide();
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
        $('.dropzone-wrapper').show();
    });
</script>
@endsection
