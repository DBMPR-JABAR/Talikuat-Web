@extends('layout.index') @section('title','Jenis Pekerjaan') @section('header')
@endsection @section('page-header')
<div class="page-header">
    <h3 class="page-title">Data Jenis Pekerjaan</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Data Jenis Pekerjaan
            </li>
        </ol>
    </nav>
</div>
@endsection @section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Jenis Pekerjaan</h4>
                @if (Request::segment(3) != 'trash')
                <a
                    data-toggle="modal"
                    href="#addModal"
                    class="btn btn-mat btn-primary mb-3"
                    ><i class="mdi mdi-account-plus menu-icon"></i> Tambah</a
                >
                <a
                    href="{{ route('trash.masterjenispekerjaan') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-delete menu-icon"></i> Trash</a
                >
                @else
                <a
                    href="{{ route('masterjenispekerjaan.index') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-undo menu-icon"></i> Kembali</a
                >

                @endif

                <table
                    class="table-striped"
                    style="width: 100%"
                    id="dataPpk"
                >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Satuan</th>
                            <th style="width: 22%">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no => $item)

                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>
                                {!! $item->kd_jenis_pekerjaan !!}
                            </td>
                            <td>
                                {!! $item->jenis_pekerjaan !!}
                            </td>
                            <td>
                                {!! $item->satuan !!}
                            </td>
                            <td>
                                @if (Request::segment(3) != 'trash')
                                    <a type='button' href='{{ route('show.masterjenispekerjaan',$item->id) }}'  class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-search-web menu-icon"></i></a>
                                    <a type='button' href='{{ route('edit.masterjenispekerjaan',$item->id) }}'  class='btn btn-sm btn-warning waves-effect waves-light'><i class="mdi mdi-table-edit menu-icon"></i></a>
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
                <form
                    action="{{route('store.masterjenispekerjaan')}}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Jenis Pekerjaan</h4>
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
                            <label>Kode Jenis Pekerjaan </label>
                            <input
                                type="text"
                                name="kd_jenis_pekerjaan"
                                id="kd_jenis_pekerjaan"
                                value="{{ old('kd_jenis_pekerjaan') }}"
                                placeholder="Masukkan Kode Jenis Pekerjaan "
                                class="
                                    form-control
                                    @error('kd_jenis_pekerjaan')
                                    is-invalid
                                    @enderror
                                "
                                required
                            />
                            @error('kd_jenis_pekerjaan')
                            <div
                                class="invalid-feedback"
                                style="display: block; color: red"
                            >
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jenis Pekerjaan</label>
                            <input
                                type="text"
                                name="jenis_pekerjaan"
                                id="jenis_pekerjaan"
                                value="{{ old('jenis_pekerjaan') }}"
                                placeholder="Masukan jenis_pekerjaan"
                                class="
                                    form-control
                                    @error('jenis_pekerjaan')
                                    is-invalid
                                    @enderror
                                "
                                required
                            />
                            @error('jenis_pekerjaan')
                            <div
                                class="invalid-feedback"
                                style="display: block; color: red"
                            >
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input
                                type="text"
                                name="satuan"
                                id="satuan"
                                value="{{ old('satuan') }}"
                                placeholder="Masukan satuan"
                                class="
                                    form-control
                                    @error('satuan')
                                    is-invalid
                                    @enderror
                                "
                                required
                            />
                            @error('satuan')
                            <div
                                class="invalid-feedback"
                                style="display: block; color: red"
                            >
                                {{ $message }}
                            </div>
                            @enderror
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
                    <h4 class="modal-title">Pindahkan Data User ke Sampah</h4>
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
                    <h4 class="modal-title">Kembalikan Data User</h4>
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
        $("#dataPpk").DataTable();
        $("#delModal").on("show.bs.modal", function (event) {
            const link = $(event.relatedTarget);
            const id = link.data("id");
            console.log(id);
            const url = `{{ url('admin/master_jenis_pekerjaan/trash/move_to_trash') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find(".modal-footer #delHref").attr("href", url);
        });
        $("#Restore").on("show.bs.modal", function (event) {
            const link = $(event.relatedTarget);
            const id = link.data("id");
            console.log(id);
            const url = `{{ url('admin/master_jenis_pekerjaan/trash/restore') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find(".modal-footer #resHref").attr("href", url);
        });
    });
</script>
@endsection
