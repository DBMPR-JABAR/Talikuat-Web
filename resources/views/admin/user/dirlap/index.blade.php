@extends('layout.index') @section('title','Dirlap') @section('header')
@endsection @section('page-header')
<div class="page-header">
    <h3 class="page-title">Data Direksi Lapangan</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Data Direksi Lapangan
            </li>
        </ol>
    </nav>
</div>
@endsection @section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Direksi Lapangan</h4>
                @if (Request::segment(3) != 'trash')
                    @can('createUserDirlap',Auth::user())
                    <a data-toggle="modal" href="#addModal" class="btn btn-mat btn-primary mb-3"><i class="mdi mdi-account-plus menu-icon"></i> Tambah</a>
                    @endcan
                    @can('restoreUserDirlap',Auth::user())
                    <a
                        href="{{ route('trash.masterppk') }}"
                        class="btn btn-mat btn-danger mb-3"
                        ><i class="mdi mdi-delete menu-icon"></i> Trash</a
                    >
                    @endcan
                @else
                <a
                    href="{{ route('user_dirlap.index') }}"
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
                            <th>Name</th>
                            <th>UPTD</th>
                            <th>E-mail</th>
                            <th class="text-center">Account Verified</th>

                            <th style="width: 25%">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no => $item)
                        

                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>
                                {!! @$item->user->name !!}
                            </td>
                            <td>
                                {!! @$item->uptd->nama !!}
                            </td>
                            <td>
                                {!! @$item->user->email !!}
                            </td>
                            <td class="text-center">
                                @if($item->account_verified_at)
                                <button class="btn btn-sm btn-success"><i class="mdi mdi-check-all menu-icon"></i></button>
                                @else
                                <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hubungi admin pusat untuk verifikasi"><i class="mdi mdi-close menu-icon"></i></button>
                                @endif
                            </td>
                            <td>

                                @if (Request::segment(3) == 'trash')
                                    @can('restoreUserDirlap',Auth::user())
                                    <a type='button' href='#Restore' data-toggle='modal' data-id='{{$item->id}}' class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-backup-restore menu-icon"></i>Restore</a>
                                    @endcan
                                @else
                                    @if($item->account_verified_at)
                                        <a type='button' href='{{ route('show.user',$item->user->id) }}'  class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-account-search menu-icon"></i></a>
                                        @can('restoreUserDirlap',Auth::user())
                                        <a type='button' href='{{ url('admin/user/edit/detail',$item->user->id) }}'  class='btn btn-sm btn-warning waves-effect waves-light'><i class="mdi mdi-table-edit menu-icon"></i></a>
                                        @endcan
                                    @else
                                        @can('viewVerificationUser',Auth::user())
                                        <a type='button' href='{{ route('verified.user',$item->user->id) }}'  class='btn btn-sm btn-dark waves-effect waves-light'><i class="mdi mdi-content-paste menu-icon"></i> Verified</a>
                                        @endcan
                                    @endif
                                    @can('deleteUserDirlap',Auth::user())
                                    <a type='button' href='#delModal' data-toggle='modal' data-id='{{$item->id}}' class='btn btn-sm btn-danger waves-effect waves-light'><i class="mdi mdi-delete menu-icon"></i></a><br/>
                                    @endcan
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
<div class="modal-only">
    @can('createUserDirlap',Auth::user())
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form
                    action="{{route('store.user_dirlap')}}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Direksi Lapangan</h4>
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
                            <label>Nama</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan name" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                            <div class="invalid-feedback" style="display: block; color:red">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan email" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')
                            <div class="invalid-feedback" style="display: block; color:red">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Masukkan Password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                            <div class="invalid-feedback" style="display: block; color:red">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ulangi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Masukkan Konfirmasi Password Baru"
                                class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>No Telp</label>
                            <input type="text" name="no_tlp" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="082218XXXXXX" class="form-control">  
                        </div>
                        <div class="form-group ">
                            <label>Unit</label>
                            <select
                                name="unit"
                                class="form-control"
                                required
                                value="{{ old('unit') }}"
                            >
                            <option value="" selected>Pilih Unit</option>
                            @foreach (@$uptd_list as $item)
                                <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                            @endforeach
                            
                            </select>
                        </div>
                        <input type="hidden" name="rule" value="14" placeholder="Masukkan name" required>
                        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan
    @can('deleteUserDirlap',Auth::user())
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
    @endcan
    @can('restoreUserDirlap',Auth::user())
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
    @endcan
</div>
@endsection @section('script')
<script>
   
    $(document).ready(function () {
        $("#dataPpk").DataTable();
        $("#delModal").on("show.bs.modal", function (event) {
            const link = $(event.relatedTarget);
            const id = link.data("id");
            console.log(id);
            const url = `{{ url('admin/master_ppk/trash/move_to_trash') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find(".modal-footer #delHref").attr("href", url);
        });
        $("#Restore").on("show.bs.modal", function (event) {
            const link = $(event.relatedTarget);
            const id = link.data("id");
            console.log(id);
            const url = `{{ url('admin/master_ppk/trash/restore') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find(".modal-footer #resHref").attr("href", url);
        });
    });
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection
