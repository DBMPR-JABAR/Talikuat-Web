@extends('layout.index') 
@section('title','Kontraktor')
@section('header')
@endsection 

@section('page-header')
<div class="page-header">
    
    <h3 class="page-title"> @if(Request::segment(3) == 'edit') Edit @else Create @endif Data Kontraktor </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboar</a></li>
        <li class="breadcrumb-item"><a href="{{ route('masterkontraktor.index') }}">Kontraktor</a></li>
        
        @if(Request::segment(3) == 'edit') 
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
        @else 
        <li class="breadcrumb-item active" aria-current="page">Create</li>
        @endif
        
      </ol>
    </nav>
  </div>
@endsection

@section('content')
<div class="row">
   
    <div class="col-md-12">
        <div class="card">
            <div class="card-header ">
                <h4 class="card-title">Kontraktor</h4>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        {{-- <li><i class="feather icon-maximize full-card"></i></li> --}}
                        <li><i class="feather icon-minus minimize-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                @if(Request::segment(3) == 'edit') 
                <form action="{{route('update.masterkontraktor',$data->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @else 
                <form action="{{route('store.masterkontraktor')}}" method="post" enctype="multipart/form-data">
              
                @endif
                    @csrf
                    <div class="card-block">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="nama" id="nama" value="{{ @$data->nama }}" class="form-control" required>
                                @error('nama')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Nama Direktur</label>
                                @if($data_pengguna->where('rule_user_id',5)->first())
                                <br>{{ old('nama_direktur', @$data_pengguna->where('rule_user_id',5)->first()->user->name) }}
                                @else
                                
                                <input type="text" name="nama_direktur" id="nama_direktur" value="{{ @$data->nama_direktur }}" class="form-control">
                                @error('nama_direktur')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>NPWP</label>
                                <input type="text" name="npwp" id="npwp" value="{{ @$data->npwp }}" placeholder="12.345.674.9-629.000" class="form-control" required>
                                
                                @error('npwp')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Telepon</label>
                                <input type="text" name="telp" id="telp" value="{{ @$data->telp }}" class="form-control" required>
                                @error('telp')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" required>{{ @$data->alamat }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label>Nama Bank</label>
                                        <input type="text" name="bank" id="bank" value="{{ @$data->bank }}" class="form-control" required>
                                        @error('bank')
                                            <div class="invalid-feedback" style="display: block; color:red">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label>Nomor Rekening</label>
                                        <input type="text" name="no_rek" id="no_rek" value="{{ @$data->no_rek }}" class="form-control" required>
                                        @error('no_rek')
                                            <div class="invalid-feedback" style="display: block; color:red">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(Request::segment(3) == 'edit') 
                        <i style="color :red; font-size: 10px;">Biarkan jika tidak ada perubahan</i>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-responsive btn-primary"><i class="fa fa-paper-plane"></i> Save</button>
                </form>
            </div>

        </div>
        <div class="card">
            <div class="card-header ">
                <h4 class="card-title">Informasi Pengguna Perusahaan</h4>
                <a data-toggle="modal" href="#addModalUser"><button type="button" class="btn btn-responsive btn-warning"><i class="fa fa-user"></i> Tambah Pengguna</button></a>
                {{-- @if(!$data_pengguna->where('rule_user_id',4)->first() || !$data_pengguna->where('rule_user_id',9)->first())
                @endif --}}
            </div>
            <div class="card-body">
                <table class="table table-striped">
    
                    
                    <tr>
                        <td style="width: 20%">Direktur</td>
                        <td >:
                            @if($data_pengguna->where('rule_user_id',5)->first())
                            {{ old('nama_direktur', @$data_pengguna->where('rule_user_id',5)->first()->user->name) }}
                            @else
                            No Data
                            @endif
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Admin</td>
                        <td >:
                            @if($data_pengguna->where('rule_user_id',10)->first())
                            {{ old('nama_admin', @$data_pengguna->where('rule_user_id',10)->first()->user->name) }}
                            @else
                            No Data
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>General Superintendent</td>
                        <td >:
                            @if(count($data->kontraktor_gs)>=1)
                            {{ count(@$data->kontraktor_gs) }} Orang
                            @else
                            No Data
                            @endif
                            
                        </td>
                    </tr>
                </table>
                @if(Request::segment(3) == 'edit') 
                <form action="{{route('update.masterkontraktorgs',$data->id)}}" method="post" enctype="multipart/form-data">
                @endif
                @if(count($data->kontraktor_gs)>=1)
                @csrf
                <div class="card-block  mt-4">
                    {{-- <div class="row justify-content-md-center fieldGroupPrice">
                        <div class="col-md-11 ">
                            <div class="row"> 
                                <div class="col-md-12 col-sm-6 ">
                                    <div class="form-group">
                                        <label>General Superintendent</label>
                                        <input type="text" name="nm_gs[]" class="form-control @error('nm_gs') is-invalid @enderror" value="{{ @$data_details[0]['gs'] }}" placeholder="Masukan nama GS" id="mytex1">
                                        <input type="text" name="id_gs[]" value="{{ @$data_details[0]['id'] }}" style="display: none" id="myimage">
    
                                        @error('nm_gs')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 mt-4">
                            <a href="javascript:void(0)" data-toggle="modal"><button class="btn btn-primary addMorePrice btn-mini waves-effect waves-light" data-toggle="tooltip" title="Tambah Pekerja"><i class="fa fa-plus"></i></button></a>
                        </div>
                    </div>
                    @if(@$data_details && count($data_details)>1)
                    @for ($i = 1; $i< count($data_details);$i++ )
                        <div class="row justify-content-md-center fieldGroupPrice">
                            <div class="col-md-11"> 
                                <div class="row">
                                    <div class="col-md-12 col-sm-6">
                                        <div class="form-group">
                                            <label>General Superintendent</label>
                                            <input type="text" name="nm_gs[]" class="form-control @error('nm_gs') is-invalid @enderror" value="{{ @$data_details[$i]['gs'] }}" placeholder="Masukan nama GS" id="mytex1">
                                            <input type="text" name="id_gs[]" value="{{ @$data_details[$i]['id'] }}" style="display: none" id="myimage">
                                            @error('nm_gs')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 mt-4">
                                <a href="javascript:void(0)" data-toggle="modal"><button class="btn btn-danger removePrice btn-mini waves-effect waves-light" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></button></a> 
                            </div>
                        </div>
                    @endfor
                    @endif
                    <div class="row justify-content-md-center fieldGroupCopyPrice" style="display: none">
                        <div class="col-md-11">
                      
                            <div class="row">
                                
                                <div class="col-md-12 col-sm-6">
                                    <div class="form-group">
                                        <label>General Superintendent</label>
                                        <input type="text" name="nm_gs[]" class="form-control @error('nm_gs') is-invalid @enderror"
                                            value="" placeholder="Masukan nama GS">
                                         
                                        @error('nm_gs')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-1 mt-4">
                            <a href="javascript:void(0)" data-toggle="modal"><button class="btn btn-danger removePrice btn-mini waves-effect waves-light" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></button></a>
                        </div>
                    </div> --}}
                    @foreach ($data->kontraktor_gs->where('is_delete', null) as $no=> $item)
                    <div class="row justify-content-md-center fieldGroupPrice">
                        <div class="col-md-11"> 
                            <div class="row">
                               
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>General Superintendent</label>
                                        @if(@$item->user_gs_detail->account_verified_at != null)
                                        <i style="color :green; font-size: 10px;">(GS has been verified)</i>
                                        @else
                                        <i style="color :red; font-size: 10px;">(GS not verified)</i>
                                        @endif
                                        {{-- <input type="text" name="nm_se[]" class="form-control @error('nm_se') is-invalid @enderror" value="{{ @$item->user_se->name }}" placeholder="Merah, Ungu,dll" id="mytex1"> --}}
                                        <input type="text" name="id_gs[]" value="{{ @$item->id }}" style="display: none" readonly>
                                        <select class="form-control" name="nm_gs[]" required>
                                            
                                            @foreach ($data_user as $dat)
                                                @if($dat->rule_user_id ==11)
                                                    <option value="{{ $dat->user_id }}" @if(@$item->gs_user_id != null && $dat->user_id == @$item->gs_user_id) selected @endif>{{ @$dat->user->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('nm_gs')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                        
                                
                            </div>
                        </div>
                        <div class="col-md-1 mt-4">
                            
                            {{-- <a href="javascript:void(0)" data-toggle="modal"><button class="btn btn-danger removePrice btn-mini waves-effect waves-light" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></button></a> --}}
                            <a type='button' href='#delModal' data-toggle='modal' data-id='{{$item->id}}' class='btn btn-mini btn-danger waves-effect waves-light'><i class="mdi mdi-delete menu-icon"></i></a><br/>
                            
                        </div>
                    </div>
                    @endforeach
                    @if(Request::segment(3) == 'edit') 
                    <i style="color :red; font-size: 10px;">Biarkan jika tidak ada perubahan</i>
                    @endif
                </div>
                
                <button type="submit" class="btn btn-responsive btn-primary"><i class="fa fa-paper-plane"></i> Save</button>
                @endif
                </form>
            </div>
            
        </div>
        
    </div>
   
</div>
<div class="modal-only">
    <div class="modal fade" id="addModalUser" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">

                <form action="{{ route('store.user.kont', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Pengguna</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body p-5">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control" name="rule" required>
                                <option value="">Select</option>
                                @if(!$data_pengguna->where('rule_user_id',5)->first())
                                <option value="5">Direktur</option>
                                @endif 
                                @if(!$data_pengguna->where('rule_user_id',10)->first())
                                <option value="9">Admin</option>
                                @endif                               
                                <option value="11">General Superintendent</option>

                            </select>
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
    
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>
    $(document).ready(function(){
        $('#npwp').mask('00.000.000.0-000.000');
        var maxGroupPrice = 10;
    
        $(".addMorePrice").click(function(){
            if($('body').find('.fieldGroupPrice').length < maxGroupPrice){
                var fieldHTML = '<div class="form-group row fieldGroupPrice">'+$(".fieldGroupCopyPrice").html()+'</div>';
                $('body').find('.fieldGroupPrice:last').after(fieldHTML);
            }else{
                alert('Maximum '+maxGroupPrice+' groups are allowed.');
            }
        });
        
        //remove fields group
        $("body").on("click",".removePrice",function(){ 
            $(this).parents(".fieldGroupPrice").remove();
        });
    });
    </script>
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

        });
    </script>
    
@endsection
