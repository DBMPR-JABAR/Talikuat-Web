@extends('layout.index') 
@section('title','User')
@section('header')
@endsection 

@section('page-header')
<div class="page-header">
    <h3 class="page-title"> Manajemen User </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
      </ol>
    </nav>
  </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data User Admin</h4>
                @if (Request::segment(3) != 'trash')
                    @can('createUserAdmin',Auth::user())
                    <a data-toggle="modal" href="#addModal" class="btn btn-mat btn-primary mb-3"><i class="mdi mdi-account-plus menu-icon"></i> Tambah</a>
                    @endcan
                    @can('restoreUserAdmin',Auth::user())
                    <a href="{{ route('user_admin.trash') }}" class="btn btn-mat btn-danger mb-3"><i class="mdi mdi-delete menu-icon"></i> Trash</a>
                    @endcan
                @else
                    <a href="{{ route('user_admin.index') }}" class="btn btn-mat btn-danger mb-3"><i class="mdi mdi-undo menu-icon"></i> Kembali</a>
                @endif
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 5%"> No </th>
                            <th class="text-center"> Name </th>
                            <th class="text-center"> Jabatan </th>
                            <th class="text-center"> E-mail </th>
                            <th class="text-center"> Keterangan </th>
                            <th class="text-center"> Action </th>

                        </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($data as $data=>$item)
                        
                        <tr>
                            {{-- <td class="py-1"><img src="../../../assets/images/faces-clipart/pic-1.png" alt="image"></td> --}}
                            <td class="text-center">{{ ++$data}}</td>
                            <td>{{ @$item->user->name }} </td>
                            <td> {{ @$item->rule->rule }} </td>
                            
                            <td >
                                {{ @$item->user->email }}
                            </td>
                            <td> 
                                @if (@$item->rule->id == 3)
                                {{ @$item->uptd->nama }}
                                @elseif (@$item->rule->id == 9)
                                {{ @$item->konsultan->nama }}
                                @elseif (@$item->rule->id == 10)  
                                {{ @$item->kontraktor->nama }}
                                @elseif (@$item->rule->id == 13)  
                                    @foreach ($item->lists_uptd as $lists_uptd)
                                    {{ $lists_uptd->uptd->nama }}<br>
                                    @endforeach
                                @endif
                                {{-- {{ @$item->user->profile->nip }}  --}}
                            </td>

                            <td class="text-center"> 
                                @if (Request::segment(3) == 'trash')
                                @can('restoreUserAdmin',Auth::user())
                                <a type='button' href='#Restore' data-toggle='modal' data-id='{{$item->id}}' class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-backup-restore menu-icon"></i>Restore</a>
                                @endcan
                                {{-- <a type='button' href='#delModal' data-toggle='modal' data-id='' class='btn btn-sm btn-danger waves-effect waves-light'><i class="mdi mdi-delete menu-icon"></i>Delete</a> --}}
                                @else 
                                    @if($item->account_verified_at)
                                        <a type='button' href='{{ route('show.user',$item->user->id) }}'  class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-account-search menu-icon"></i></a>
                                        @can('editUserAdmin',Auth::user())
                                        <a type='button' href='{{ url('admin/user/edit/detail',$item->user->id) }}'  class='btn btn-sm btn-warning waves-effect waves-light'><i class="mdi mdi-table-edit menu-icon"></i></a>
                                        @endcan
                                    @else
                                        @can('viewVerificationUser',Auth::user())
                                        <a type='button' href='{{ route('verified.user',$item->user->id) }}'  class='btn btn-sm btn-dark waves-effect waves-light'><i class="mdi mdi-content-paste menu-icon"></i> Verified</a>
                                        @endcan
                                    @endif
                                        @can('deleteUserAdmin',Auth::user())
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
</div>
<div class="modal-only">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">

                <form action="{{ route('store.user_admin') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body p-5">
                        <div class="form-group">
                            
                            <label>Role</label>
                            <select style="width: 100%"
                                name="rule"
                                class="form-control"
                                required
                                id="dropDown"
                                value="{{ old('unit') }}">
                            <option value="" selected>Pilih Role</option>
                            <option value="ADMIN" >ADMINISTRATOR</option>
                            <option value="ADMIN-PPK" >ADMINISTRATOR PPK</option>
                            <option value="ADMIN-KONSULTAN" >ADMINISTRATOR KONSULTAN</option>
                            <option value="ADMIN-KONTRAKTOR" >ADMINISTRATOR KONTRAKTOR</option>
                            </select>
                        </div>
                        <div id="ADMIN" class="drop-down-show-hide">
                            <div class="form-group ">
                                <label>Unit</label>
                                <select style="width: 100%"
                                    name="unit"
                                    class="form-control"
                                    value="{{ old('unit') }}">
                                <option value="" selected>Pilih Semua</option>
                                @foreach (@$uptd_list as $item)
                                    <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="ADMIN-KONTRAKTOR" class="drop-down-show-hide">
                            <div class="form-group">
                                <label>Perusahaan</label>
                                <select style="width: 100%" class="form-control" name="kontraktor" >
                                    <option value="">Select</option>
                                    @foreach ($kontraktors as $no =>$kontraktor)
                                        <option value="{{ $kontraktor->id }}" >{{ $kontraktor->nama }}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group ">
                                <label>Unit</label>
                                <select
                                    name="unit_kontraktor"
                                    class="form-control"
                                    value="{{ old('unit') }}">
                                <option value="" selected>Pilih <i class="devicons devicons-unity_small"></i></option>
                                @foreach (@$uptd_list as $item)
                                    <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                                @endforeach
                                </select>
                            </div>
                            
                        </div>
                        <div id="ADMIN-PPK" class="drop-down-show-hide">
                            <div class="form-group ">
                                <label>Unit</label>
                                <select style="width: 100%"
                                    name="unit_ppk"
                                    class="form-control"
                                    value="{{ old('unit') }}">
                                <option value="" selected>Pilih</option>
                                @foreach (@$uptd_list as $item)
                                    <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="ADMIN-KONSULTAN" class="drop-down-show-hide">
                            <div class="form-group">
                                <label>Perusahaan</label>
                                <select style="width: 100%" class="form-control" name="konsultan" >
                                    <option value="">Select</option> 
                                    @foreach ($konsultans as $no =>$konsultan)
                                        <option value="{{ $konsultan->id }}" >{{ $konsultan->nama }}</option> 
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
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
                        
                        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Simpan</button>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Apakah anda yakin?</p> 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Tutup</button>
                    <a id="delHref" href="" class="btn btn-danger waves-effect waves-light ">Pindahkan</a>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="Restore" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Kembalikan Data User </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Apakah anda yakin?</p> 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Tutup</button>
                    <a id="resHref" href="" class="btn btn-danger waves-effect waves-light ">Restore</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $(document).ready(function() {
        $('#delModal').on('show.bs.modal', function(event) {
            const link = $(event.relatedTarget);
            const id = link.data('id');
            console.log(id);
            const url = `{{ url('admin/user/trash/move_to_trash') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find('.modal-footer #delHref').attr('href', url);
        });
        $('#Restore').on('show.bs.modal', function(event) {
            const link = $(event.relatedTarget);
            const id = link.data('id');
            console.log(id);
            const url = `{{ url('admin/user/trash/restore') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find('.modal-footer #resHref').attr('href', url);
        });

        $('.table').DataTable({
            "language": {
                "emptyTable": "Tidak Ada Data"
            }
        });

    });
</script>
@endsection