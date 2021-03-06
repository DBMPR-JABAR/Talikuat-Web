@extends('layout.index') @section('title','Data Umum') @section('header')
@endsection @section('page-header')
<div class="page-header">
    <h3 class="page-title">Data Umum</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Data Umum
            </li>
        </ol>
    </nav>
</div>
@endsection @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="container">
                                @if (Request::segment(3) != 'trash')
                                <a
                                    href="{{ route('create.dataumum') }}"
                                    class="btn btn-mat btn-primary mb-3"
                                >
                                    <i
                                        class="mdi mdi-account-plus menu-icon"
                                    ></i>
                                    Tambah</a
                                >
                                <a
                                    href="{{ route('trash.dataumum') }}"
                                    class="btn btn-mat btn-danger mb-3"
                                >
                                    <i class="mdi mdi-delete menu-icon"></i>
                                    Trash
                                </a>
                                @else
                                <a
                                    href="{{ route('dataumum.index') }}"
                                    class="btn btn-mat btn-danger mb-3"
                                    ><i class="mdi mdi-undo menu-icon"></i>
                                    Kembali</a
                                >
                                @endif
                            </div>
                        </div>
                        <div class="w-100">
                            <table
                                class="display nowrap"
                                style="width: 100%"
                                id="dataUmum"
                            >
                                <thead>
                                    <tr>
                                        <th>Nama Kegiatan</th>
                                        <th>No Kontrak</th>

                                        <th>Unor</th>
                                        <th>Kategori</th>
                                        <th>Kode / Nama Ruas</th>
                                        <th>kontraktor</th>
                                        <th>PPK</th>
                                        <th style="width: 22%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $no => $item)
                                    <tr>
                                        <td>{!! $item->nm_paket !!}</td>
                                        <td>{!! $item->no_kontrak !!}</td>

                                        <td>{!! $item->uptd->nama !!}</td>
                                        <td>
                                            {!!
                                            @$item->kategori_paket->nama_kategori
                                            ? : $item->kategori !!}
                                        </td>

                                        <td>
                                            {!!
                                            @$item->detail->ruas[0]->id_ruas_jalan
                                            !!} / {!!
                                            @$item->detail->ruas[0]->detail_ruas->nama_ruas_jalan
                                            !!}
                                        </td>
                                        <td>
                                            {!! @$item->detail->kontraktor->nama
                                            !!}
                                        </td>
                                        <td>
                                            {!! @$item->detail->ppk->user->name
                                            !!}
                                        </td>
                                        </a>
                                        <td>
                                            <a
                                                type="button"
                                                href="{{route('show.dataumum',$item->id) }}"
                                                class="btn btn-sm btn-success waves-effect waves-light"
                                                ><i
                                                    class="mdi mdi-search-web menu-icon"
                                                ></i
                                            ></a>
                                            @if(Auth::user()->user_detail->rule_user_id== 5||Auth::user()->user_detail->rule_user_id== 7||Auth::user()->user_detail->rule_user_id==8 ||Auth::user()->user_detail->rule_user_id==9||Auth::user()->user_detail->rule_user_id==1)
                                            <a
                                                type="button"
                                                href="{{route('laporan-minggguan-konsultan.create',$item->id) }}"
                                                class="btn btn-sm btn-dark waves-effect waves-light"
                                                ><i
                                                    class="mdi mdi-file-document"
                                                ></i
                                            ></a>
                                            @endif @if (Request::segment(3) !=
                                            'trash')
                                            @if(Auth::user()->user_detail->rule_user_id
                                            == 1
                                            ||Auth::user()->user_detail->rule_user_id
                                            == 3)
                                            <a
                                                type="button"
                                                href="{{route('edit.dataumum',$item->id) }}"
                                                class="btn btn-sm btn-warning waves-effect waves-light"
                                                ><i
                                                    class="mdi mdi-grease-pencil"
                                                ></i
                                            ></a>
                                            <a
                                                type="button"
                                                href="#delModal"
                                                data-toggle="modal"
                                                data-id="{{$item->id}}"
                                                class="btn btn-sm btn-danger waves-effect waves-light"
                                                ><i
                                                    class="mdi mdi-delete menu-icon"
                                                ></i
                                            ></a>
                                            @endif @else
                                            <a
                                                type="button"
                                                href="#Restore"
                                                data-toggle="modal"
                                                data-id="{{$item->id}}"
                                                class="btn btn-sm btn-success waves-effect waves-light"
                                                ><i
                                                    class="mdi mdi-backup-restore menu-icon"
                                                ></i
                                                >Restore</a
                                            >
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-only">
    <div class="modal fade" id="delModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pindahkan Data Umum ke Sampah</h4>
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
                    <p>Apakah anda yakin?</p>
                </div>

                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-default waves-effect"
                        data-dismiss="modal"
                    >
                        Tutup
                    </button>
                    <a
                        id="delHref"
                        href=""
                        class="btn btn-danger waves-effect waves-light"
                        >Pindahkan</a
                    >
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Restore" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kembalikan Data Umum</h4>
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
                    <p>Apakah anda yakin?</p>
                </div>

                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-default waves-effect"
                        data-dismiss="modal"
                    >
                        Tutup
                    </button>
                    <a
                        id="resHref"
                        href=""
                        class="btn btn-danger waves-effect waves-light"
                        >Restore</a
                    >
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')

<script>
    $(document).ready(function () {
        $("#dataUmum").dataTable({
            responsive: true,
            autoWidth: false,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json",
            },
        });

        $("#delModal").on("show.bs.modal", function (event) {
            const link = $(event.relatedTarget);
            const id = link.data("id");
            const url =
                `{{ url('admin/master_kontraktor/trash/move_to_trash') }}/` +
                id;
            console.log(url);
            const modal = $(this);
            modal.find(".modal-footer #delHref").attr("href", url);
        });
        $("#Restore").on("show.bs.modal", function (event) {
            const link = $(event.relatedTarget);
            const id = link.data("id");
            console.log(id);
            const url =
                `{{ url('admin/master_kontraktor/trash/restore') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find(".modal-footer #resHref").attr("href", url);
        });
    });
</script>
@endsection
