@extends('layout.index') 
@section('title','Manajemen Konstruksi')
@section('header')
@endsection 

@section('page-header')
<div class="page-header">
    
    <h3 class="page-title"> @if(Request::segment(3) == 'edit') Edit @else Create @endif Data Manajemen Konstruksi </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboar</a></li>
        <li class="breadcrumb-item"><a href="{{ route('mastermk.index') }}">Manajemen Konstruksi</a></li>
        
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
                <h4 class="card-title">Manajemen Konstruksi</h4>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        {{-- <li><i class="feather icon-maximize full-card"></i></li> --}}
                        <li><i class="feather icon-minus minimize-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                @if(Request::segment(3) == 'edit') 
                <form action="{{route('update.mastermk',$data->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @else 
                <form action="{{route('store.mastermk')}}" method="post" enctype="multipart/form-data">
              
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
                                @if($data->user_lists->where('rule_user_id',12)->first())
                                <br>{{ old('nama_direktur', @$data->user_lists->where('rule_user_id',12)->first()->user->name) }}
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
                        <td style="width: 1%">:</td>
                        <td>
                            @if($data->user_lists->where('rule_user_id',12)->first())
                            {{ old('nama_direktur', @$data->user_lists->where('rule_user_id',12)->first()->user->name) }}
                            @else
                            No Data
                            @endif
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Admin</td>
                        <td >:</td>
                        <td>
                            {{-- @if($data->user_lists->where('rule_user_id',13)->count() == 1)
                            {{ old('nama_admin', @$data->user_lists->where('rule_user_id',13)->first()->user->name) }} --}}
                            @if ($data->user_lists->where('rule_user_id',13)->count() >= 1)
                            <table class="table ">
                                @foreach ($data->user_lists->where('rule_user_id',13) as $data_admin)
                                <tr>
                                    <td>{{ $data_admin->user->name }}</td>
                                    <td>
                                    @foreach ($data_admin->lists_uptd as $lists_uptd)
                                    {{ $lists_uptd->uptd->nama }}<br>
                                    @endforeach
                                    
                                    </td>
                                </tr>
                                    
                                @endforeach
                            </table>
                            @else
                            No Data
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            
        </div>
        
    </div>
   
</div>
<div class="modal-only">
    <div class="modal fade" id="addModalUser" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">

                <form action="{{ route('store.user.mk', $data->id) }}" method="post" enctype="multipart/form-data">
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
                            <select class="form-control" name="rule" id="dropDown" required>
                                <option value="">Select</option>
                                @if(!$data->user_lists->where('rule_user_id',12)->first())
                                <option value="12">Direktur</option>
                                @endif 
                                @if($data->user_lists->where('rule_user_id',13)->count() < 6)
                                <option value="13">Admin</option>
                                @endif                               
                                
                            </select>
                        </div>
                        <div id="13" class="drop-down-show-hide">
                            <label>Unit</label><br>
                            @foreach (@$uptd_list as $no => $item)
                        
                            <input type="checkbox" id="uptd{{ $item->id }}" name="unit[]" value="{{ $item->id }}" >
                            <label for="uptd{{ $item->id }}">UPTD {{ $item->id }}</label>
                            @if(++$no % 3 == 0) <br> @endif
                            @endforeach
                            <br>
                            {{-- <div class="form-group ">
                                <label>Unit</label>
                                <select
                                    name="unit"
                                    class="form-control"
                                    value="{{ old('unit') }}">
                                <option value="" selected>Pilih Unit</option>
                                @foreach (@$uptd_list as $item)
                                    <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                                @endforeach
                                </select>
                            </div> --}}
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
                const url = `{{ url('admin/master_mk/trash_gs/move_to_trash_gs') }}/` + id;
                console.log(url);
                const modal = $(this);
                modal.find('.modal-footer #delHref').attr('href', url);
            });

        });
    </script>
    
@endsection
