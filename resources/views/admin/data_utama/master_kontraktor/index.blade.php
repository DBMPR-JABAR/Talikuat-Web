@extends('layout.index') @section('title','Kontraktor') @section('header')
@endsection @section('page-header')
<div class="page-header">
    <h3 class="page-title">Data Kontraktor</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Data Kontraktor
            </li>
        </ol>
    </nav>
</div>
@endsection @section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Kontraktor</h4>
                @if (Request::segment(3) != 'trash')
                <a data-toggle="modal" href="#addModal" class="btn btn-mat btn-primary mb-3">
                    <i class="mdi mdi-account-plus menu-icon"></i> Tambah</a>
                <a
                    href="{{ route('trash.masterkontraktor') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-delete menu-icon"></i> Trash</a
                >
                @else
                <a
                    href="{{ route('masterkontraktor.index') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-undo menu-icon"></i> Kembali</a
                >

                @endif

                <table
                    class="table-striped"
                    style="width: 100%"
                    id="dataKontraktor">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name Perusahaan</th>
                            <th>Nama Direktur</th>
                            <th>No. Telp</th>
                            <th style="width: 22%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no => $item)
                            
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>
                                    {!! $item->nama !!}
                                </td>
                               
                                <td>{!! $item->nama_direktur !!}</td>
                                <td>{!! $item->telp !!}</td>
                                <td>
                                    @if (Request::segment(3) != 'trash')
                                    <a type='button' href='{{ route('show.masterkontraktor',$item->id) }}'  class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-search-web menu-icon"></i></a>
                                    <a type='button' href='{{ route('edit.masterkontraktor',$item->id) }}'  class='btn btn-sm btn-warning waves-effect waves-light'><i class="mdi mdi-table-edit menu-icon"></i></a>
                                    @else
                                    <a type='button' href='#Restore' data-toggle='modal' data-id='{{$item->id}}' class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-backup-restore menu-icon"></i>Restore</a>

                                    @endif
                                    <a type='button' href='#delModal' data-toggle='modal' data-id='{{$item->id}}' class='btn btn-sm btn-danger waves-effect waves-light'><i class="mdi mdi-delete menu-icon"></i></a><br/>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-only">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="{{route('store.masterkontraktor')}}" method="post" enctype="multipart/form-data">

                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Kontraktor</h4>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body p-5">
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input
                                type="text"
                                name="nama"
                                id="nama"
                                value="{{ old('nama') }}"
                                placeholder="Masukkan Nama Perusahaan"
                                class="
                                    form-control
                                    @error('nama')
                                    is-invalid
                                    @enderror
                                "
                                required
                            />
                            @error('nama')
                            <div
                                class="invalid-feedback"
                                style="display: block; color: red"
                            >
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input
                                type="text"
                                name="alamat"
                                id="alamat"
                                value="{{ old('alamat') }}"
                                placeholder="Masukan Alamat"
                                class="
                                    form-control
                                    @error('alamat')
                                    is-invalid
                                    @enderror
                                "
                                required
                            />
                            @error('alamat')
                            <div
                                class="invalid-feedback"
                                style="display: block; color: red"
                            >
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Direktur</label>
                            <input
                                type="text"
                                name="nama_direktur"
                                id="nama_direktur"
                                value="{{ old('nama_direktur') }}"
                                placeholder="Masukkan Nama Direktur"
                                class="
                                    form-control
                                    @error('nama_direktur')
                                    is-invalid
                                    @enderror
                                "
                                required
                            />
                            @error('nama_direktur')
                            <div
                                class="invalid-feedback"
                                style="display: block; color: red"
                            >
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>NPWP</label>
                            <input
                                type="text"
                                name="npwp"
                                id="npwm"
                                value="{{ old('npwm') }}"
                                placeholder="Masukkan NPWP"
                                class="form-control"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label>No Telp</label>
                            <input
                                type="text"
                                name="telp"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                placeholder="082218XXXXXX"
                                class="form-control"
                            />
                        </div>
                        <div class="form-group">
                            <label>Nama Bank</label>
                            <input
                                type="text"
                                name="bank"
                                placeholder="Masukan Nama Bank"
                                class="form-control"
                            />
                        </div>
                        <div class="form-group">
                            <label>No.Rekening</label>
                            <input
                                type="text"
                                name="no_rek"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                placeholder=""
                                class="form-control"
                            />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-default waves-effect"
                            data-dismiss="modal"
                        >
                            Tutup
                        </button>
                        <button
                            type="submit"
                            class="btn btn-primary waves-effect waves-light"
                        >
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pindahkan Data Kontraktor ke Sampah</h4>
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
                    <h4 class="modal-title">Kembalikan Data Kontraktor</h4>
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
        $("#dataKontraktor").DataTable();
        $("#delModal").on("show.bs.modal", function (event) {
            const link = $(event.relatedTarget);
            const id = link.data("id");
            console.log(id);
            const url = `{{ url('admin/master_kontraktor/trash/move_to_trash') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find(".modal-footer #delHref").attr("href", url);
        });
        $("#Restore").on("show.bs.modal", function (event) {
            const link = $(event.relatedTarget);
            const id = link.data("id");
            console.log(id);
            const url = `{{ url('admin/master_kontraktor/trash/restore') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find(".modal-footer #resHref").attr("href", url);
        });
    });
</script>
@endsection
