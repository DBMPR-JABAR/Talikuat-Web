@extends('layout.index') @section('title','ppk') @section('header')
@endsection @section('page-header')
<div class="page-header">
    <h3 class="page-title">Role & Permission</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Role & Permission
            </li>
        </ol>
    </nav>
</div>
@endsection @section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Role</h4>
                @if (Request::segment(3) != 'trash')
                <a
                    href="{{ route('role.create') }}"
                    class="btn btn-mat btn-primary mb-3"
                    ><i class="mdi mdi-account-plus menu-icon"></i> Tambah</a
                >
                {{-- <a
                    href="{{ route('trash.masterppk') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-delete menu-icon"></i> Trash</a
                > --}}
                @else
                <a
                    href="{{ route('masterppk.index') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-undo menu-icon"></i> Kembali</a
                >

                @endif

                <table
                    class="table-striped"
                    style="width: 100%"
                    id="dataRole"
                >
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Name</th>
                            <th>Permission</th>
                            <th style="width: 10%">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $no => $role)

                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>
                                {!! $role->rule !!}
                            </td>
                            <td>
                                @foreach ($role->permissions as $permission)
                                    <button  class="btn btn-secondary mb-1" style="font-size: 11px !important;" disabled>{!! $permission->name !!}</button> 
                                    
                                @endforeach

                            </td>
                            
                            <td>
                                <a type='button' href='{{ route('role.edit',$role->id) }}'  class='btn btn-sm btn-warning waves-effect waves-light'><i class="mdi mdi-table-edit menu-icon"></i></a>
                                <a type='button' href='#delModalRole' data-toggle='modal' data-id='{{$role->id}}' class='btn btn-sm btn-danger waves-effect waves-light'><i class="mdi mdi-delete menu-icon"></i></a><br/>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Menu Categori</h4>
                @if (Request::segment(3) != 'trash')
                <a
                    data-toggle="modal"
                    href="#addModalFeatureCategory"
                    class="btn btn-mat btn-primary mb-3"
                    ><i class="mdi mdi-account-plus menu-icon"></i> Tambah</a
                >
                {{-- <a
                    href="{{ route('trash.masterppk') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-delete menu-icon"></i> Trash</a
                > --}}
                @else
                <a
                    href="{{ route('masterppk.index') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-undo menu-icon"></i> Kembali</a
                >

                @endif

                <table
                    class="table-striped"
                    style="width: 100%"
                    id="dataFeatureCategory"
                >
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th class="text-center">Name</th>
                            {{-- <th style="width: 30%" class="text-center">Aksi</th> --}}

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feature_categories as $no => $feature_categorie)

                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>
                                {!! $feature_categorie->name !!}
                            </td>
                            
                            {{-- <td class="text-center">
                                <a type='button' href='{{ route('show.masterppk',$feature_categorie->id) }}'  class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-search-web menu-icon"></i></a>
                                <a type='button' href='{{ route('edit.masterppk',$feature_categorie->id) }}'  class='btn btn-sm btn-warning waves-effect waves-light'><i class="mdi mdi-table-edit menu-icon"></i></a>
                                <a type='button' href='#delModalRole' data-toggle='modal' data-id='{{$feature_categorie->id}}' class='btn btn-sm btn-danger waves-effect waves-light'><i class="mdi mdi-delete menu-icon"></i></a><br/>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Feature</h4>
                @if (Request::segment(3) != 'trash')
                <a
                    data-toggle="modal"
                    href="#addModalFeature"
                    class="btn btn-mat btn-primary mb-3"
                    ><i class="mdi mdi-account-plus menu-icon"></i> Tambah</a
                >
                {{-- <a
                    href="{{ route('trash.masterppk') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-delete menu-icon"></i> Trash</a
                > --}}
                @else
                <a
                    href="{{ route('masterppk.index') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-undo menu-icon"></i> Kembali</a
                >

                @endif

                <table
                    class="table-striped"
                    style="width: 100%"
                    id="dataFeature"
                >
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Menu Kategori</th>

                            {{-- <th class="text-center">Aksi</th> --}}

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($features as $no => $feature)

                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>
                                {!! $feature->name !!}
                            </td>
                            <td>
                                {!! $feature->category->name !!}
                            </td>
                            {{-- <td class="text-center">
                                <a type='button' href='{{ route('edit.masterppk',$feature->id) }}'  class='btn btn-sm btn-warning waves-effect waves-light'><i class="mdi mdi-table-edit menu-icon"></i></a>
                                <a type='button' href='#delModalRole' data-toggle='modal' data-id='{{$feature->id}}' class='btn btn-sm btn-danger waves-effect waves-light'><i class="mdi mdi-delete menu-icon"></i></a><br/>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Permission</h4>
                @if (Request::segment(3) != 'trash')
                {{-- <a
                    data-toggle="modal"
                    href="#addModal"
                    class="btn btn-mat btn-primary mb-3"
                    ><i class="mdi mdi-account-plus menu-icon"></i> Tambah</a
                > --}}
                {{-- <a
                    href="{{ route('trash.masterppk') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-delete menu-icon"></i> Trash</a
                > --}}
                @else
                <a
                    href="{{ route('masterppk.index') }}"
                    class="btn btn-mat btn-danger mb-3"
                    ><i class="mdi mdi-undo menu-icon"></i> Kembali</a
                >

                @endif

                <table
                    class="table-striped"
                    style="width: 100%"
                    id="dataPermission"
                >
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th class="text-center">Name</th>
                            {{-- <th style="width: 30%" class="text-center">Aksi</th> --}}

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $no => $permission)

                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>
                                {!! $permission->name !!}
                            </td>
                            
                            {{-- <td class="text-center">
                                <a type='button' href='{{ route('show.masterppk',$permission->id) }}'  class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-search-web menu-icon"></i></a>
                                <a type='button' href='{{ route('edit.masterppk',$permission->id) }}'  class='btn btn-sm btn-warning waves-effect waves-light'><i class="mdi mdi-table-edit menu-icon"></i></a>
                                <a type='button' href='#delModalRole' data-toggle='modal' data-id='{{$permission->id}}' class='btn btn-sm btn-danger waves-effect waves-light'><i class="mdi mdi-delete menu-icon"></i></a><br/>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-only">
    
    <div class="modal fade" id="addModalFeature" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form
                    action="{{route('store.feature')}}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Feature</h4>
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
                            <label>Nama Feature</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan Nama Feature" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                            <div class="invalid-feedback" style="display: block; color:red">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Categori Menu</label>
                            <select class="form-control" name="feature_category" required>
                                <option value="">Select</option>
                                @foreach ($feature_categories as $category)
                                <option value="{{ $category->id }}" >{{ $category->name }}</option>  
                                @endforeach
                            </select>
                        </div>
                        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addModalFeatureCategory" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form
                    action="{{route('store.feature_category')}}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Menu Kategori</h4>
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
                            <label>Nama Category</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan Nama Feature" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                            <div class="invalid-feedback" style="display: block; color:red">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> 
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delModalRole" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data Role</h4>
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
                        id="delHrefRole"
                        href=""
                        class="btn btn-danger waves-effect waves-light"
                        >Hapus</a
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
        $("#dataRole").DataTable();
        $("#dataPermission").DataTable();
        $("#dataFeature").DataTable();
        $("#dataFeatureCategory").DataTable();
        $("#delModalRole").on("show.bs.modal", function (event) {
            const link = $(event.relatedTarget);
            const id = link.data("id");
            console.log(id);
            const url = `{{ url('admin/role/delete') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find(".modal-footer #delHrefRole").attr("href", url);
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
</script>
@endsection
