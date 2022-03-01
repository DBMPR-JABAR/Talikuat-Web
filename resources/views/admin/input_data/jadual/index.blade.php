@extends('layout.index') @section('title','Jadual') @section('header')

<style>
    th {
        width: fit-content !important;
    }
</style>

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
    <!-- <div class="col-lg-12 grid-margin stretch-card">
        <div class="container">
            <h4 class="card-title">Jadual</h4>
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
    </div> -->
    <div class="w-100">
        <table class="display responsive" id="dataJadual" style="width: 100%">
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
                    <td>{!! $item->no_kontrak !!}</td>
                    <td>{!! $item->nm_paket !!}</td>
                    <td>{!! $item->uptd->nama !!}</td>
                    <td>
                        {!! @$item->kategori_paket->nama_kategori ? :
                        $item->kategori !!}
                    </td>

                    <td>{!! $item->ruas[0]->id_ruas_jalan !!}</td>
                    <td>{!! $item->detail->kontraktor->nama !!}</td>
                    <td>{!! @$item->detail->ppk->nama !!}</td>
                    <td>
                        @if($item->detail->jadual != null)
                        <a
                            type="button"
                            href="{{route('jadual.show',$item->id) }}"
                            class="btn btn-sm btn-success waves-effect waves-light"
                            ><i class="mdi mdi-search-web menu-icon"></i
                        ></a>
                        <a
                            type="button"
                            href="{{route('jadual.edit',$item->id) }}"
                            class="btn btn-sm btn-primary waves-effect waves-light"
                            ><i class="mdi mdi-pencil menu-icon"></i
                        ></a>
                        <a
                            type="button"
                            href="{{route('request.create',$item->id) }}"
                            class="btn btn-sm btn-dark waves-effect waves-light"
                            ><i class="mdi mdi-file-document"></i
                        ></a>

                        @else
                        <a
                            type="button"
                            href="{{ route('jadual.create',$item->id) }}"
                            class="btn btn-sm btn-warning waves-effect waves-light"
                            ><i class="mdi mdi-table-edit menu-icon"></i
                        ></a>

                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
