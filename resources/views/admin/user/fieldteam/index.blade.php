@extends('layout.index') 
@section('title','Field Team')
@section('header')
@endsection 

@section('page-header')
<div class="page-header">
    <h3 class="page-title"> Field Team </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Field Team</li>
      </ol>
    </nav>
  </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Field Team</h4>
                @if (Request::segment(4) != 'trash')
                    @can('createUserFt',Auth::user())
                    <a data-toggle="modal" href="#addModal" class="btn btn-mat btn-primary mb-3"><i class="mdi mdi-account-plus menu-icon"></i> Tambah</a>
                    @endcan
                    @can('restoreUserFt',Auth::user())
                    <a href="{{ route('user.ft.trash') }}" class="btn btn-mat btn-danger mb-3"><i class="mdi mdi-delete menu-icon"></i> Trash</a>
                    @endcan
                @else
                    @can('viewUserFt',Auth::user())
                    <a href="{{ route('user.ft.index') }}" class="btn btn-mat btn-danger mb-3"><i class="mdi mdi-undo menu-icon"></i> Kembali</a>
                    @endcan
                @endif
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 5%"> No </th>
                            <th class="text-center"> Perusahaan </th>
                            <th class="text-center"> Site Engineering </th>
                            <th class="text-center"> Inspection Engineering </th>
                            <th class="text-center"> FT Verified </th>
                            <th class="text-center"> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($data as $data=>$item)
                        
                        <tr>
                            {{-- <td class="py-1"><img src="../../../assets/images/faces-clipart/pic-1.png" alt="image"></td> --}}
                            <td class="text-center">{{ ++$data}}</td>
                            <td>{{ @$item->konsultan->nama }} </td>
                            {{-- <td>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            </td> --}}
                            <td> {{ @$item->user_se->name }} </td>
                            <td> {{ @$item->user_ie->name }} </td>
                            
                            <td class="text-center">
                                @if($item->ft_verified_at)
                                <button class="btn btn-sm btn-success"><i class="mdi mdi-check-all menu-icon"></i></button>
                                @else
                                <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hubungi admin pusat untuk verifikasi"><i class="mdi mdi-close menu-icon"></i></button>
                                @endif
                            </td>

                            <td class="text-center"> 
                                @if (Request::segment(4) == 'trash')
                                    @can('restoreUserFt',Auth::user())
                                    <a type='button' href='#Restore' data-toggle='modal' data-id='{{$item->id}}' class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-backup-restore menu-icon"></i>Restore</a>
                                    @endcan
                                {{-- <a type='button' href='#delModal' data-toggle='modal' data-id='' class='btn btn-sm btn-danger waves-effect waves-light'><i class="mdi mdi-delete menu-icon"></i>Delete</a> --}}
                                @else 
                                    @if($item->ft_verified_at)
                                        <a type='button' href='{{ route('show.user.ft',$item->id) }}'  class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-account-search menu-icon"></i></a>
                                    @else
                                        @can('viewVerificationUser',Auth::user())
                                        <a type='button' href='{{ route('verified.user.ft',$item->id) }}'  class='btn btn-sm btn-dark waves-effect waves-light'><i class="mdi mdi-content-paste menu-icon"></i> Verified</a>
                                        @endcan
                                    @endif
                                    @can('deleteUserFt',Auth::user())
                                    <a type='button' href='#delModal' data-toggle='modal' data-id='{{$item->id}}' class='btn btn-mini btn-danger waves-effect waves-light'><i class="mdi mdi-delete menu-icon"></i></a><br/>
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
    @can('createUserFt',Auth::user())
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               
                <form action="{{route('store.masterkonsultanft.second')}}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Field Team</h4>
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
                            <label>Perusahaan</label>
                            <select class="form-control" name="company" required>
                                <option value="">Select</option>
                                @foreach ($company as $it)
                                <option value="{{ $it->id }}" >{{ $it->nama }}</option>
                                    
                                @endforeach
                            </select>
                            @error('name_se')
                            <div class="invalid-feedback" style="display: block; color:red">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mb-3" style="font-weight: bold"> Site Engineering</label>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" required name="name_se" id="name_se" value="{{ old('name_se') }}" placeholder="Masukkan Nama Lengkap" class="form-control @error('name_se') is-invalid @enderror" >
                                    @error('name_se')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" required name="email_se" id="email_se" value="{{ old('email_se') }}" placeholder="Masukkan e-mail" class="form-control @error('email_se') is-invalid @enderror" >
                                    @error('email_se')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" required minlength="8" name="password_se" id="password_se" value="{{ old('password_se') }}" placeholder="Masukkan Password_se" class="form-control @error('password_se') is-invalid @enderror" >
                                    @error('password_se')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Ulangi Password</label>
                                    <input type="password" minlength="8" required name="password_confirmation_se" id="password_confirmation_se" value="{{ old('password_confirmation_se') }}" placeholder="Masukkan Konfirmasi Password Baru"
                                        class="form-control" >
                                </div>
                                <div class="form-group ">
                                    <label>No Telp</label>
                                    <input type="text" name="no_tlp_se" required oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="082218XXXXXX" class="form-control" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-3" style="font-weight: bold">Inspection Engineering</label>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name_ie" required id="name_ie" value="{{ old('name_ie') }}" placeholder="Masukkan Nama Lengkap" class="form-control @error('name_ie') is-invalid @enderror" >
                                    @error('name_ie')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" name="email_ie" required id="email_ie" value="{{ old('email_ie') }}" placeholder="Masukkan e-mail" class="form-control @error('email_ie') is-invalid @enderror" >
                                    @error('email_ie')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" minlength="8" required name="password_ie" id="password_ie" value="{{ old('password_ie') }}" placeholder="Masukkan Password_ie" class="form-control @error('password_ie') is-invalid @enderror" >
                                    @error('password_ie')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Ulangi Password</label>
                                    <input type="password" minlength="8" required name="password_confirmation_ie" id="password_confirmation_ie" value="{{ old('password_confirmation_ie') }}" placeholder="Masukkan Konfirmasi Password Baru"
                                        class="form-control" >
                                </div>
                                <div class="form-group ">
                                    <label>No Telp</label>
                                    <input type="text" name="no_tlp_ie" required oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="082218XXXXXX" class="form-control" >  
                                </div>
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
    @endcan
    @can('deleteUserFt',Auth::user())
    <div class="modal fade" id="delModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Field Team</h4>
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
                    <p>Apakah anda yakin ingin menghapus team tersebut?</p>
                    <p>Dengan menekan tombol <span style="font-weight: bold">"Yes"</span>, maka <span style="font-weight: bold">Team</span> tersebut akan di hapus, dan data <span style="font-weight: bold">User/Pengguna</span> di team tersebut akan di blokir !!</p>
                 
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
                        >Yes</a
                    >
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('restoreUserFt',Auth::user())
    <div class="modal fade" id="Restore" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Kembalikan Data </h4>
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
    @endcan
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#delModal').on('show.bs.modal', function(event) {
            const link = $(event.relatedTarget);
            const id = link.data('id');
            console.log(id);
            const url = `{{ url('admin/master_konsultan/trash_ft/move_to_trash_ft') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find('.modal-footer #delHref').attr('href', url);
        });
        $('#Restore').on('show.bs.modal', function(event) {
            const link = $(event.relatedTarget);
            const id = link.data('id');
            console.log(id);
            const url = `{{ url('admin/master_konsultan/trash_ft/restore') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find('.modal-footer #resHref').attr('href', url);
        });

    });
</script>
@endsection