@extends('layout.index') @section('title','Konsultan') @section('header')
@endsection @section('page-header')
<div class="page-header">
    <h3 class="page-title">Data Konsultan</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Data Konsultan
            </li>
        </ol>
    </nav>
</div>
@endsection @section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Konsultan</h4>
                @if (Request::segment(3) != 'trash')
                <a
                    data-toggle="modal"
                    href="#addModal"
                    class="btn btn-mat btn-primary mb-3"
                    ><i class="mdi mdi-account-plus menu-icon"></i> Tambah</a
                >
                <a
                    href="{{ route('trash.masterkonsultan') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-delete menu-icon"></i> Trash</a
                >
                @else
                <a
                    href="{{ route('masterkonsultan.index') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-undo menu-icon"></i> Kembali</a
                >

                @endif
                <div id="table-wrapper">
                    <div id="table-scroll">
                        <table
                            class="table-striped"
                            style="width: 100%"
                            id="dataKontraktor">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name Perusahaan</th>
                                    <th>Nama Direktur</th>
                                    <th>FT</th>
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
                                        <td></td>
                                        <td>
                                            @if (Request::segment(3) != 'trash')
                                            <a type='button' href='{{ route('show.masterkonsultan',$item->id) }}'  class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-search-web menu-icon"></i></a>
                                            <a type='button' href='{{ route('edit.masterkonsultan',$item->id) }}'  class='btn btn-sm btn-warning waves-effect waves-light'><i class="mdi mdi-table-edit menu-icon"></i></a>
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
    </div>
</div>
<div class="modal-only">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="{{route('store.masterkonsultan')}}" method="post" enctype="multipart/form-data">

                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah User</h4>
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
                                    @error('password')
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
                        {{-- <div class="form-group">
                            <label>Nama Site Engineering</label>
                            <div class="d-flex" id="se">
                                <input
                                    type="text"
                                    name="nm_se[]"
                                    placeholder="Masukkan Nama Site Engineering"
                                    class="form-control"
                                    required
                                />
                                <button
                                    type="button"
                                    class="ml-1"
                                    style="border: none; padding: 0"
                                    onclick="addSE()"
                                >
                                    <i
                                        class="mdi mdi-account-plus mt-2"
                                        style="color: green"
                                    ></i>
                                </button>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>Nama Inspection Engineering</label>
                            <div class="d-flex" id="ie">
                                <input
                                    type="text"
                                    name="nm_ie[]"
                                    placeholder="Masukkan Nama Inspection Engineering"
                                    class="form-control"
                                />
                                <input
                                    type="text"
                                    name="nm_se[]"
                                    placeholder="Masukkan Nama Site Engineering"
                                    class="form-control"
                                    
                                />
                                <button
                                    type="button"
                                    class="ml-1"
                                    style="border: none; padding: 0"
                                    onclick="addIE()"
                                    id="btn_addIE"
                                >
                                    <i
                                        class="mdi mdi-account-plus mt-2"
                                        style="color: green"
                                    ></i>
                                </button>
                            </div>
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
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function () {
        $("#dataKonsultan").DataTable({
            responsive: true,
        });
        $("#delModal").on("show.bs.modal", function (event) {
            const link = $(event.relatedTarget);
            const id = link.data("id");
            console.log(id);
            const url = `{{ url('admin/master_konsultan/trash/move_to_trash') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find(".modal-footer #delHref").attr("href", url);
        });
        $("#Restore").on("show.bs.modal", function (event) {
            const link = $(event.relatedTarget);
            const id = link.data("id");
            console.log(id);
            const url = `{{ url('admin/master_konsultan/trash/restore') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find(".modal-footer #resHref").attr("href", url);
        });
    });

    function addIE() {
        $(
            `
            <div class="d-flex">
            <input type="text" name="nm_ie[]" placeholder="Masukkan Nama Inspection Engineering" class="form-control" />
            <input type="text" name="nm_se[]" placeholder="Masukkan Nama Site Engineering" class="form-control" />

            <i class="mdi mdi-delete mt-2" style="color:red;" onclick="deleteEl(this)"></i>
            </div>`
        ).insertAfter("#ie");
    }
    // function addSE() {
    //     $(
    //         `
    //         <div class="d-flex">
    //         <input type="text" name="nm_se[]" placeholder="Masukkan Nama Site Engineering" class="form-control" />
    //         <i class="mdi mdi-delete mt-2" style="color:red;" onclick="deleteEl(this)"></i>
    //         </div>`
    //     ).insertAfter("#se");
    // }
    function deleteEl(e) {
        $(e).closest("div").remove();
    }
</script>
@endsection
