@extends('layout.index') 
@section('title','General Superintendent')
@section('header')
@endsection 

@section('page-header')
<div class="page-header">
    <h3 class="page-title"> General Superintendent </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">General Superintendent</li>
      </ol>
    </nav>
  </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data General Superintendent</h4>
                @if (Request::segment(4) != 'trash')
                    <a data-toggle="modal" href="#addModal" class="btn btn-mat btn-primary mb-3"><i class="mdi mdi-account-plus menu-icon"></i> Tambah</a>
                    <a href="{{ route('user.gs.trash') }}" class="btn btn-mat btn-danger mb-3"><i class="mdi mdi-delete menu-icon"></i> Trash</a>
                @else
                    <a href="{{ route('user.gs.index') }}" class="btn btn-mat btn-danger mb-3"><i class="mdi mdi-undo menu-icon"></i> Kembali</a>

                @endif
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 5%"> No </th>
                            <th class="text-center"> Perusahaan </th>
                            <th class="text-center"> General Superintendent </th>
                            <th class="text-center"> GS Verified </th>
                            <th class="text-center"> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($data as $data=>$item)
                        
                        <tr>
                            {{-- <td class="py-1"><img src="../../../assets/images/faces-clipart/pic-1.png" alt="image"></td> --}}
                            <td class="text-center">{{ ++$data}}</td>
                            <td>{{ @$item->kontraktor->nama }} </td>
                            {{-- <td>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            </td> --}}
                            <td> {{ @$item->user_gs->name }} </td>
                            
                            <td class="text-center">
                                @if($item->ft_verified_at)
                                <button class="btn btn-sm btn-success"><i class="mdi mdi-check-all menu-icon"></i></button>
                                @else
                                <button class="btn btn-sm btn-danger"><i class="mdi mdi-close menu-icon"></i></button>
                                @endif
                            </td>

                            <td class="text-center"> 
                                @if (Request::segment(4) == 'trash')
                                <a type='button' href='#Restore' data-toggle='modal' data-id='{{$item->id}}' class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-backup-restore menu-icon"></i>Restore</a>
                                {{-- <a type='button' href='#delModal' data-toggle='modal' data-id='' class='btn btn-sm btn-danger waves-effect waves-light'><i class="mdi mdi-delete menu-icon"></i>Delete</a> --}}
                                @else 
                                    @if($item->gs_verified_at)
                                        <a type='button' href='{{ route('show.user.gs',$item->id) }}'  class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-account-search menu-icon"></i></a>
                                    @else
                                        <a type='button' href='{{ route('verified.user.gs',$item->id) }}'  class='btn btn-sm btn-dark waves-effect waves-light'><i class="mdi mdi-content-paste menu-icon"></i> Verified</a>
                                    @endif
                                    <a type='button' href='#delModal' data-toggle='modal' data-id='{{$item->id}}' class='btn btn-mini btn-danger waves-effect waves-light'><i class="mdi mdi-delete menu-icon"></i></a><br/>

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
               
                <form action="{{route('store.masterkontraktorgs')}}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-header">
                        <h4 class="modal-title">Tambah General Superintendent</h4>
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
                            <select class="form-control" name="company" id="company" required>
                                <option value="">Select</option>
                                @foreach ($company as $it)
                                <option value="{{ $it->id }}" >{{ $it->nama }}</option>
                                    
                                @endforeach
                            </select>
                            @error('company')
                            <div class="invalid-feedback" style="display: block; color:red">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- <label class="mb-3" style="font-weight: bold"> General Superintendent</label> --}}
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" required name="name_gs" id="name_gs" value="{{ old('name_gs') }}" placeholder="Masukkan Nama Lengkap" class="form-control @error('name_gs') is-invalid @enderror" >
                            @error('name_gs')
                            <div class="invalid-feedback" style="display: block; color:red">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" required name="email_gs" id="email_gs" value="{{ old('email_gs') }}" placeholder="Masukkan e-mail" class="form-control @error('email_gs') is-invalid @enderror" >
                            @error('email_gs')
                            <div class="invalid-feedback" style="display: block; color:red">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" required minlength="8" name="password_gs" id="password_gs" value="{{ old('password_gs') }}" placeholder="Masukkan Password_gs" class="form-control @error('password_gs') is-invalid @enderror" >
                                    @error('password_gs')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ulangi Password</label>
                                    <input type="password" minlength="8" required name="password_confirmation_gs" id="password_confirmation_gs" value="{{ old('password_confirmation_gs') }}" placeholder="Masukkan Konfirmasi Password Baru"
                                        class="form-control" >
                                </div>

                            </div>
                        </div>
                        <div class="form-group ">
                            <label>No Telp</label>
                            <input type="text" name="no_tlp_gs" required oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="082218XXXXXX" class="form-control" >  
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
                    <h4 class="modal-title">Delete General Superintendent</h4>
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
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#delModal').on('show.bs.modal', function(event) {
            const link = $(event.relatedTarget);
            const id = link.data('id');
            console.log(id);
            const url = `{{ url('admin/master_kontraktor/trash_gs/move_to_trash_gs') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find('.modal-footer #delHref').attr('href', url);
        });
        $('#Restore').on('show.bs.modal', function(event) {
            const link = $(event.relatedTarget);
            const id = link.data('id');
            console.log(id);
            const url = `{{ url('admin/master_kontraktor/trash_gs/restore') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find('.modal-footer #resHref').attr('href', url);
        });

    });
</script>
@endsection