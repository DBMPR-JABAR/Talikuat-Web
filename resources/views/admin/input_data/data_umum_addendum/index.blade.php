@extends('layout.index') @section('title','Kontraktor') @section('header')
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
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="container">
            <h4 class="card-title">Data Umum</h4>
            @if (Request::segment(3) != 'trash')
            <a
                href="{{ route('create.dataumum') }}"
                class="btn btn-mat btn-primary mb-3"
            >
                <i class="mdi mdi-account-plus menu-icon"></i> Tambah</a
            >
            <a
                href="{{ route('trash.dataumum') }}"
                class="btn btn-mat btn-danger mb-3"
            >
                <i class="mdi mdi-delete menu-icon"></i> Trash
            </a>
            @else
            <a
                href="{{ route('dataumum.index') }}"
                class="btn btn-mat btn-danger mb-3"
                ><i class="mdi mdi-undo menu-icon"></i> Kembali</a
            >
            @endif
        </div>
    </div>
    <div class="w-100">
        <table
            class="display responsive"
            id="dataKontraktor"
            style="width: 100%"
        >
            <thead>
                <tr>
                    <th>No Kontrak</th>
                    <th>Nama Kegiatan</th>
                    <th>Unor</th>
                    <th>Kategori</th>
                    <th>Ruas</th>
                    <th>kontraktor</th>
                    <th>PPK</th>
                    <th style="width: 22%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $no => $item)
                <tr>
                    <td>{!! $item->no_kontrak !!}</td>
                    <td>{!! $item->nm_paket !!}</td>
                    <td>{!! @$item->uptd->description ? : $item->unor !!}</td>
                    <td>
                        {!! @$item->kategori_paket->nama_kategori ? :
                        $item->kategori !!}
                    </td>

                    <td>{!! $item->nm_paket !!}</td>
                    <td>{!! $item->penyedia !!}</td>
                    <td>{!! $item->nm_ppk !!}</td>
                    <td>
                        @if (Request::segment(3) != 'trash')
                        <a
                            type="button"
                            href="{{route('show.dataumum',$item->id) }}"
                            class="btn btn-sm btn-success waves-effect waves-light"
                            ><i class="mdi mdi-search-web menu-icon"></i
                        ></a>
                        <a
                            type="button"
                            href="{{route('edit.dataumum',$item->id) }}"
                            class="btn btn-sm btn-warning waves-effect waves-light"
                            ><i class="mdi mdi-table-edit menu-icon"></i
                        ></a>
                        @else
                        <a
                            type="button"
                            href="#Restore"
                            data-toggle="modal"
                            data-id="{{$item->id}}"
                            class="btn btn-sm btn-success waves-effect waves-light"
                            ><i class="mdi mdi-backup-restore menu-icon"></i
                            >Restore</a
                        >
                        @endif
                        <a
                            type="button"
                            href="#delModal"
                            data-toggle="modal"
                            data-id="{{$item->id}}"
                            class="btn btn-sm btn-danger waves-effect waves-light"
                            ><i class="mdi mdi-delete menu-icon"></i></a
                        ><br />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $("#dataKontraktor").DataTable({
            responsive: true,
        });
        $("#delModal").on("show.bs.modal", function (event) {
            const link = $(event.relatedTarget);
            const id = link.data("id");
            console.log(id);
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
