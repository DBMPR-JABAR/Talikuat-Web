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
                    class="display nowrap"
                    id="laporanmingguan"
                    style="width: 100%"
                >
                    <thead>
                        <th>Tanggal</th>
                        <th>Nama Kegiatan / Paket</th>
                        <th>Kode dan Nama Jenis Pekerjaan</th>
                        <th>Volume</th>
                        <th>Status Dokumen</th>
                        <th style="width: 5%">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($data as $d) @foreach($d->laporan as $l)

                        <tr>
                            <td>
                                {{$l->tgl_mulai}} -
                                {{date('Y-m-d', strtotime($l->tgl_mulai.'+ 7 days' )) .' ( Minggu '. $l->minggu_ke.' )' }}
                            </td>
                            <td>
                                {{$d->nm_paket}}
                            </td>
                            <td>
                                {{$l->jenis_pekerjaan}}
                            </td>
                            <td>
                                {{$l->volume.' '.$l->satuan    }}
                            </td>
                            <td>
                                @if($l->status == '0')
                                <span class="badge badge-dark">
                                    Belum Dikirim
                                </span>
                                @endif @if($l->status == '1')
                                <span class="badge badge-warning">
                                    Menunggu Approval DIRLAP
                                </span>
                                @endif @if($l->status == '2')
                                <span class="badge badge-danger">
                                    Ditolak Oleh DIRLAP
                                </span>
                                @endif @if($l->status == '3')
                                <span class="badge badge-warning">
                                    Menunggu Approval PPK
                                </span>
                                @endif @if($l->status == '4')
                                <span class="badge badge-danger">
                                    Ditolak Oleh PPK
                                </span>
                                @endif @if($l->status == '5')
                                <span class="badge badge-success">
                                    Disetujui Oleh PPK
                                </span>
                                @endif
                            </td>

                            <td>
                                <!-- Super Admin -->
                                @if(Auth::user()->user_detail->rule_user_id ==
                                1)
                                <a
                                    type="button"
                                    data-toggle="modal"
                                    data-target="#modalResponLaporan"
                                    data-id="{{$l->id}}"
                                    data-laporan="{{ $l }}"
                                    data-data="{{ $d }}"
                                    data-tgl=" {{$l->tgl_mulai}} - {{date('Y-m-d', strtotime($l->tgl_mulai.'+ 7 days' )) .' ( Minggu '. $l->minggu_ke.' )' }}"
                                    data-url="{{route('laporan.approval',$l->id)}}')}}"
                                    onclick="rederModalDetail(this)"
                                    class="btn btn-sm btn-success waves-effect waves-light"
                                    ><i class="mdi mdi-search-web menu-icon"></i
                                ></a>

                                <a
                                    type="button"
                                    class="btn btn-sm btn-warning waves-effect waves-light"
                                    data-toggle="modal"
                                    data-target="#modalResponLaporan"
                                    data-id="{{$l->id}}"
                                    data-laporan="{{ $l }}"
                                    data-data="{{ $d }}"
                                    data-tgl=" {{$l->tgl_mulai}} - {{date('Y-m-d', strtotime($l->tgl_mulai.'+ 7 days' )) .' ( Minggu '. $l->minggu_ke.' )' }}"
                                    data-url="{{route('laporan.approval',$l->id)}}')}}"
                                    onclick="rederModalDetail(this)"
                                >
                                    <i class="mdi mdi-pencil menu-icon"></i>
                                </a>
                                <a
                                    type="button"
                                    class="btn btn-sm btn-danger waves-effect waves-light"
                                    data-toggle="modal"
                                    data-target="#modalResponLaporan"
                                    data-id="{{$l->id}}"
                                    data-laporan="{{ $l }}"
                                    data-data="{{ $d }}"
                                    data-url="{{route('laporan.approval',$l->id)}}')}}"
                                    data-tgl=" {{$l->tgl_mulai}} - {{date('Y-m-d', strtotime($l->tgl_mulai.'+ 7 days' )) .' ( Minggu '. $l->minggu_ke.' )' }}"
                                    onclick="rederModalDetail(this)"
                                >
                                    <i class="mdi mdi-delete"></i>
                                </a>
                                @endif
                                <!-- Admin Uptd -->
                                @if(Auth::user()->user_detail->rule_user_id ==3)
                                <!-- Create -->
                                @if($l->status == 0)
                                <a
                                    type="button"
                                    href="{{route('laporan.send',$l->id)}}"
                                    data-tooltip="tooltip"
                                    title="Kirim Laporan"
                                    class="btn btn-sm btn-success waves-effect waves-light"
                                    ><i class="mdi mdi-file-send"></i>
                                </a>
                                <a
                                    type="button"
                                    data-tooltip="tooltip"
                                    href="{{route('laporan.edit',$l->id)}}"
                                    title="Edit Laporan"
                                    class="btn btn-sm btn-warning waves-effect waves-light"
                                    ><i class="mdi mdi-pencil menu-icon"></i>
                                </a>
                                <a
                                    type="button"
                                    href="{{route('laporan.destroy',$l->id)}}"
                                    data-tooltip="tooltip"
                                    title="Delete Laporan"
                                    class="btn btn-sm btn-danger waves-effect waves-light"
                                    ><i class="mdi mdi-delete menu-icon"></i>
                                </a>
                                @endif @if($l->status == 1) @endif
                                <!-- DItolak Dirlap -->
                                @if($l->status == 2)
                                <a
                                    type="button"
                                    href="{{route('laporan.send',$l->id)}}"
                                    data-tooltip="tooltip"
                                    title="Kirim Laporan"
                                    class="btn btn-sm btn-success waves-effect waves-light"
                                    ><i class="mdi mdi-file-send"></i>
                                </a>
                                <a
                                    type="button"
                                    data-tooltip="tooltip"
                                    href="{{route('laporan.edit',$l->id)}}"
                                    title="Revisi Laporan"
                                    class="btn btn-sm btn-warning waves-effect waves-light"
                                    ><i class="mdi mdi-pencil menu-icon"></i>
                                </a>

                                @endif @if($l->status == 4)
                                <a
                                    type="button"
                                    href="{{route('laporan.send',$l->id)}}"
                                    data-tooltip="tooltip"
                                    title="Kirim Laporan"
                                    class="btn btn-sm btn-success waves-effect waves-light"
                                    ><i class="mdi mdi-file-send"></i>
                                </a>
                                <a
                                    type="button"
                                    data-tooltip="tooltip"
                                    href="{{route('laporan.edit',$l->id)}}"
                                    title="Revisi Laporan"
                                    class="btn btn-sm btn-warning waves-effect waves-light"
                                    ><i class="mdi mdi-pencil menu-icon"></i>
                                </a>

                                @endif @if($l->status == 5) @endif @endif
                                <!-- DIRLAP -->
                                @if(Auth::user()->user_detail->rule_user_id ==
                                14) @if($l->status == 1)
                                <a
                                    type="button"
                                    href="{{route('laporan.send',$l->id)}}"
                                    data-tooltip="tooltip"
                                    title="Respon Laporan"
                                    class="btn btn-sm btn-success waves-effect waves-light"
                                    data-toggle="modal"
                                    data-target="#modalResponLaporan"
                                    data-role="dirlap"
                                    data-laporan="{{ $l }}"
                                    data-data="{{ $d }}"
                                    data-id="{{$l->id}}"
                                    data-url="{{ route('laporan.approval',$l->id) }}"
                                    data-tgl=" {{$l->tgl_mulai}} - {{date('Y-m-d', strtotime($l->tgl_mulai.'+ 7 days' )) .' ( Minggu '. $l->minggu_ke.' )' }}"
                                    data-url="{{route('laporan.approval',$l->id)}}')}}"
                                    onclick="rederModalDetail(this)"
                                    ><i class="mdi mdi-file-send"></i>
                                </a>
                                @endif @endif
                                <!-- PPK -->
                                @if(Auth::user()->user_detail->rule_user_id ==2
                                || Auth::user()->user_detail->rule_user_id ==15)
                                @if($l->status == 3)
                                <a
                                    type="button"
                                    href="{{route('laporan.send',$l->id)}}"
                                    data-tooltip="tooltip"
                                    title="Respon Laporan"
                                    class="btn btn-sm btn-success waves-effect waves-light"
                                    data-toggle="modal"
                                    data-target="#modalResponLaporan"
                                    data-role="ppk"
                                    data-laporan="{{ $l }}"
                                    data-data="{{ $d }}"
                                    data-id="{{$l->id}}"
                                    data-url="{{ route('laporan.approval',$l->id) }}"
                                    data-tgl=" {{$l->tgl_mulai}} - {{date('Y-m-d', strtotime($l->tgl_mulai.'+ 7 days' )) .' ( Minggu '. $l->minggu_ke.' )' }}"
                                    data-url="{{route('laporan.approval',$l->id)}}')}}"
                                    onclick="rederModalDetail(this)"
                                    ><i class="mdi mdi-file-send"></i>
                                </a>
                                @endif @endif
                            </td>
                        </tr>
                        @endforeach @endforeach
                    </tbody>
                </table>
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
        $("body").tooltip({ selector: "[data-tooltip=tooltip]" });
        $("#laporanmingguan").DataTable({
            responsive: true,
        });
    });
    function checkCatatan() {
        const val = $('input[type="radio"]:checked').val();
        if (val == "1") {
            $("#catatan").removeAttr("required");
        } else {
            $("#catatan").attr("required", "required");
        }
    }
    function rederModalDetail(el) {
        const data = $(el).data("data");
        $("#formApproval").attr("action", $(el).data("url"));
        const dataRole = $(el).data("role");
        const laporan = $(el).data("laporan");
        const tgl = $(el).data("tgl");
        const laporanCuaca = data.laporan_cuaca;
        const bahanBeton = data.laporan_bahan_beton;
        const bahanHotmix = data.laporan_bahan_hotmix;
        const bahanMaterial = data.laporan_bahan_material;
        const peralatan = data.laporan_peralatan;
        const tenagaKerja = data.laporan_tenaga_kerja;
        const idx = laporan.jenis_pekerjaan.indexOf("-");
        const nmp = laporan.jenis_pekerjaan.slice(0, idx);
        const uraian = laporan.jenis_pekerjaan.slice(
            idx + 1,
            laporan.jenis_pekerjaan.length
        );
        $("#role").val(dataRole);
        $("#kegiatan").val(data.nm_paket);
        $("#ruas_jalan").val(data.detail.ruas[0].id_ruas_jalan);
        $("#segmen_jalan").empty();
        $.each(data.detail.ruas, function (i, v) {
            $("#segmen_jalan").append(`<input
                                           type="text"
                                           class="form-control mb-2"
                                           value="${v.segment_jalan}"
                                           required="required"
                                           readonly=""
                                       />`);
        });
        $("#tanggal").val(tgl);
        $("#no_request").val("FRM-01/SOP/DBMPR-" + $(el).data("id"));
        $("#shop_drawing").attr(
            "src",
            "/admin/file-laporan/" + laporan.file_dokumentasi
        );
        $("#catatan_ppk").val(data.respon_ppk);
        $("#catatan_dirlap").val(data.respon_dirlap);

        $("#invoiceItem1")
            .find("tbody")
            .html(
                ` <tr>
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
                    value="${nmp}"
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
                    value="${uraian}"
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
                    value="${laporan.sta_awal}"
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
                    value="${laporan.sta_akhir}"
                    readonly
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
                    value="${laporan.ki_ka}"
                    readonly
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
                    value="${laporan.volume}"
                    readonly
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
                    value="${laporan.satuan}"
                    readonly
                />
            </div>
        </td>
    </tr>`
            );

        if (bahanMaterial) {
            for (let i = 0; i < bahanMaterial.length; i++) {
                $("#bahanMaterial")
                    .find("tbody")
                    .html(
                        `<tr>
                       <td>${bahanMaterial[i].bahan_material}</td>
                       <td>${bahanMaterial[i].satuan}</td>
                       <td>${bahanMaterial[i].volume}</td>
                       `
                    );
            }
        } else {
            $("#bahanMaterial")
                .find("tbody")
                .html(
                    "<tr><td colspan='3' class='text-center'>Tidak ada bahan material</td></tr>"
                );
        }

        if (peralatan) {
            for (let i = 0; i < peralatan.length; i++) {
                $("#tablePeralatan")
                    .find("tbody")
                    .html(
                        `<tr>
                       <td>${peralatan[i].jenis_peralatan}</td>
                       <td>${peralatan[i].jumlah}</td>
                       <td>${peralatan[i].satuan}</td>
                       `
                    );
            }
        } else {
            $("#tablePeralatan")
                .find("tbody")
                .html(
                    "<tr><td colspan='3' class='text-center'>Tidak ada perlatan</td></tr>"
                );
        }

        if (bahanHotmix) {
            for (let i = 0; i < bahanHotmix.length; i++) {
                $("#bahanHotmix")
                    .find("tbody")
                    .html(
                        `<tr>
                       <td>${bahanHotmix[i].bahan_hotmix}</td>
                       <td>${bahanHotmix[i].no_dump_truck}</td>
                       <td>${bahanHotmix[i].waktu_datang}</td>
                          <td>${bahanHotmix[i].waktu_hampar}</td>
                          <td>${bahanHotmix[i].suhu_hampar}</td>
                          <td>${bahanHotmix[i].suhu_datang}</td>
                          <td>${bahanHotmix[i].p_m}</td>
                          <td>${bahanHotmix[i].l_m}</td>
                          <td>${bahanHotmix[i].t_gembur_m}</td>
                       </tr>`
                    );
            }
        } else {
            $("#bahanHotmix")
                .find("tbody")
                .html(
                    "<tr><td colspan='9' class='text-center'>Tidak ada bahan Hotmix</td></tr>"
                );
        }

        if (tenagaKerja) {
            for (let i = 0; i < tenagaKerja.length; i++) {
                $("#tenagaKerja")
                    .find("tbody")
                    .html(
                        `<tr>
                       <td>${tenagaKerja[i].tenaga_kerja}</td>
                       <td>${tenagaKerja[i].jumlah}</td>
                       `
                    );
            }
        } else {
            $("#tenagaKerja")
                .find("tbody")
                .html(
                    "<tr><td colspan='2' class='text-center'>Tidak ada tenaga kerja</td></tr>"
                );
        }
        if (bahanBeton) {
            for (let i = 0; i < bahanBeton.length; i++) {
                $("#betonMix").find("tbody").html(`
                <tr>
                       <td>${bahanBeton[i].bahan_beton}</td>
                       <td>${bahanBeton[i].no_truck_mixer}</td>
                          <td>${bahanBeton[i].waktu_datang}</td>
                            <td>${bahanBeton[i].waktu_curah}</td>
                            <td>${bahanBeton[i].slump_test}</td>
                            <td>${bahanBeton[i].satuan}</td>
                </tr>
                `);
            }
        } else {
            $("#betonMix")
                .find("tbody")
                .html(
                    `<tr><td colspan='6' class='text-center'>Tidak ada bahan beton</td></tr>`
                );
        }
        if (laporanCuaca) {
            for (let i = 0; i < laporanCuaca.length; i++) {
                $("#cuaca").find("tbody").html(`
                <tr>
                       <td>${laporanCuaca[i].cerah}</td>
                       <td>${laporanCuaca[i].hujan_ringan}</td>
                       <td>${laporanCuaca[i].hujan_lebat}</td>
                       <td>${laporanCuaca[i].bencana_alam}</td>
                       <td>${laporanCuaca[i].lain_lain}</td>
                      
                </tr>
                `);
            }
        } else {
            $("#cuaca")
                .find("tbody")
                .html(
                    `<tr><td colspan='5' class='text-center'>Tidak ada laporan cuaca</td></tr>`
                );
        }
    }
</script>
@endsection
