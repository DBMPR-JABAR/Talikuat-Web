@extends('layout.index') @section('title','Jadual') @section('header')
@endsection @section('page-header')
<div class="page-header">
    <h3 class="page-title">Jadual Pekerjaan</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Jadual</li>
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
                        <div class="col">
                            <table
                                class="display nowrap"
                                style="width: 100%"
                                id="jadualTable"
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
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{!! @$item->no_kontrak !!}</td>
                                        <td>{!! @$item->nm_paket !!}</td>
                                        <td>{!! @$item->uptd->nama !!}</td>
                                        <td>
                                            {!!
                                            @$item->kategori_paket->nama_kategori
                                            ? : $item->kategori !!}
                                        </td>

                                        <td>
                                            {!!
                                            @$item->detail->ruas[0]->id_ruas_jalan
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
                                        <td>
                                            @if($item->detail->jadual != null)
                                            <a
                                                type="button"
                                                href="{{route('jadual.show',$item->id) }}"
                                                class="btn btn-sm btn-success waves-effect waves-light"
                                                ><i
                                                    class="mdi mdi-search-web menu-icon"
                                                ></i
                                            ></a>
                                            <a
                                                type="button"
                                                href="{{route('jadual.edit',$item->id) }}"
                                                class="btn btn-sm btn-primary waves-effect waves-light"
                                                ><i
                                                    class="mdi mdi-pencil menu-icon"
                                                ></i
                                            ></a>
                                            <a
                                                type="button"
                                                href="{{route('request.create',$item->id) }}"
                                                class="btn btn-sm btn-dark waves-effect waves-light"
                                                ><i
                                                    class="mdi mdi-file-document"
                                                ></i
                                            ></a>

                                            @else
                                            <a
                                                type="button"
                                                href="{{ route('jadual.create',$item->id) }}"
                                                class="btn btn-sm btn-warning waves-effect waves-light"
                                                ><i
                                                    class="mdi mdi-table-edit menu-icon"
                                                ></i
                                            ></a>

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
@endsection @section('script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script>
    $("#jadualTable").dataTable({
        responsive: true,
        autoWidth: false,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json",
        },
    });
</script>
@endsection
