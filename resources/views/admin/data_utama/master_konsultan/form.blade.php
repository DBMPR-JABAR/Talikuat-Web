@extends('layout.index') 
@section('title','Konsultan')
@section('header')
@endsection 

@section('page-header')
<div class="page-header">
    
    <h3 class="page-title"> @if(Request::segment(3) == 'edit') Edit @else Create @endif Data Konsultan </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboar</a></li>
        <li class="breadcrumb-item"><a href="{{ route('masterkonsultan.index') }}">Konsultan</a></li>
        
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
                <h4 class="card-title">Informasi Perusahaan</h4>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        {{-- <li><i class="feather icon-maximize full-card"></i></li> --}}
                        <li><i class="feather icon-minus minimize-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                @if(Request::segment(3) == 'edit') 
                <form action="{{route('update.masterkonsultan',$data->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @else 
                <form action="{{route('store.masterkonsultan')}}" method="post" enctype="multipart/form-data">
              
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
                                <input type="text" name="nama_direktur" id="nama_direktur" value="{{ @$data->nama_direktur }}" class="form-control" required>
                                @error('nama_direktur')
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
                        {{-- <div class="col-md-12">

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
                        </div> --}}
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
                <a data-toggle="modal" href="#addModal"><button type="button" class="btn btn-responsive btn-warning"><i class="fa fa-user"></i> Tambah FT</button></a>

            </div>
            <div class="card-body">
                <table class="table table-striped">
    
                    
                    <tr>
                        <td style="width: 30%">Direktur</td>
                        <td >:
                            @if($data_pengguna->where('rule_user_id',4)->first())
                            {{ old('nama_direktur', @$data_pengguna->where('rule_user_id',9)->first()->user->name) }}
                            @else
                            No Data
                            @endif
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Admin</td>
                        <td >:
                            @if($data_pengguna->where('rule_user_id',9)->first())
                            {{ old('nama_direktur', @$data_pengguna->where('rule_user_id',9)->first()->user->name) }}
                            @else
                            No Data
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Field Team</td>
                        <td >:
                            @if(count($data->konsultan_ft)>=1)
                            {{ count($data->konsultan_ft) }}
                            @else
                            Tidak Ada
                            @endif
                            Team
                        </td>
                    </tr>
                </table>
            </div>
            
        </div>
        <div class="card">
            <div class="card-header ">
                <h4 class="card-title">Informasi FT</h4>
                <a data-toggle="modal" href="#addModal"><button type="button" class="btn btn-responsive btn-warning"><i class="fa fa-paper-plane"></i> Tambah FT</button></a>

            </div>
            <div class="card-body">
                @if(Request::segment(3) == 'edit') 
                <form action="{{route('update.masterkonsultanft',$data->id)}}" method="post" enctype="multipart/form-data">
                
                @endif
                    @csrf
                    @if(count($data->konsultan_ft)>=1)
                    <div class="card-block">
                        {{-- <div class="row justify-content-md-center fieldGroupPrice">
                            <div class="col-md-11">
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Site Engineering</label>
                                            <input type="text" name="nm_se[]" class="form-control @error('nm_se') is-invalid @enderror" value="{{ @$data_details[0]['se'] }}" placeholder="Merah, Ungu,dll" id="mytex1">
                                            <input type="text" name="id_ft[]" value="{{ @$data_details[0]['id'] }}" style="display: none" id="myimage">
        
                                            @error('nm_se')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Inspection Engineering</label>
                                            <input type="text" name="nm_ie[]" class="form-control @error('nm_ie') is-invalid @enderror" value="{{ @$data_details[0]['ie'] }}" placeholder="Diskon Produk (%)" id="mytex2">
        
                                            @error('nm_ie')
                                            <div class="invalid-feedback">
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
                        @for ($i = 1; $i<div count($data_details);$i++ )
                            <div class="row justify-content-md-center fieldGroupPrice">
                                <div class="col-md-11"> 
                                    <div class="row">
                                       
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Site Engineering</label>
                                                <input type="text" name="nm_se[]" class="form-control @error('nm_se') is-invalid @enderror" value="{{ @$data_details[$i]['se'] }}" placeholder="Merah, Ungu,dll" id="mytex1">
                                                <input type="text" name="id_ft[]" value="{{ @$data_details[$i]['id'] }}" style="display: none" id="myimage">
            
                                                @error('nm_se')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Inspection Engineering</label>
                                                <input type="text" name="nm_ie[]" class="form-control @error('nm_ie') is-invalid @enderror" value="{{ @$data_details[$i]['ie'] }}" placeholder="Diskon Produk (%)" id="mytex2">
            
                                                @error('nm_ie')
                                                <div class="invalid-feedback">
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
                                    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Site Engineering</label>
                                            <input type="text" name="nm_se[]" class="form-control @error('nm_se') is-invalid @enderror"
                                                value="" placeholder="Merah, Ungu,dll">
                                         
                                            @error('nm_se')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Inspection Engineering</label>
                                            <input type="text" name="nm_ie[]" class="form-control @error('nm_ie') is-invalid @enderror"
                                                value="" placeholder="Diskon Produk (%)">
        
                                            @error('nm_ie')
                                            <div class="invalid-feedback">
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
                        @foreach ($data->konsultan_ft->where('is_delete', null) as $no=> $item)
                        <div class="row justify-content-md-center fieldGroupPrice">
                            <div class="col-md-11"> 
                                <div class="row">
                                   
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Site Engineering</label>
                                            @if(@$item->ft_verified_at != null)
                                            <i style="color :green; font-size: 10px;">(FT has been verified)</i>
                                            @else
                                            <i style="color :red; font-size: 10px;">(FT not verified)</i>
                                            @endif
                                            {{-- <input type="text" name="nm_se[]" class="form-control @error('nm_se') is-invalid @enderror" value="{{ @$item->user_se->name }}" placeholder="Merah, Ungu,dll" id="mytex1"> --}}
                                            <input type="text" name="id_ft[]" value="{{ @$item->id }}" style="display: none" readonly>
                                            <select class="form-control" name="nm_se[]" required>
                                                
                                                @foreach ($data_user as $dat)
                                                    @if($dat->rule_user_id ==7)
                                                        <option value="{{ $dat->user_id }}" @if(@$item->se_user_id != null && $dat->user_id == @$item->se_user_id) selected @endif>{{ @$dat->user->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('nm_se')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Inspection Engineering</label>
                                            {{-- <input type="text" name="nm_ie[]" class="form-control @error('nm_ie') is-invalid @enderror" value="{{  @$item->user_ie->name }}" placeholder="Diskon Produk (%)" id="mytex2"> --}}
                                            <select class="form-control" name="nm_ie[]" required>
                                                @foreach ($data_user as $dat)
                                               
                                                    @if($dat->rule_user_id ==8)
                                                        <option value="{{ $dat->user_id }}" @if(@$item->ie_user_id != null && $dat->user_id == @$item->ie_user_id) selected  @endif>{{ @$dat->user->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('nm_ie')
                                            <div class="invalid-feedback">
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
                    @else
                    (No Data)
                    @endif
                   
                </form>
            </div>

        </div>
    </div>
   
</div>

<div class="modal-only">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               
                <form action="{{route('store.masterkonsultanft',$data->id)}}" method="post" enctype="multipart/form-data">

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
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mb-3" style="font-weight: bold"> Site Engineering</label>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name_se" id="name_se" value="{{ old('name_se') }}" placeholder="Masukkan Nama Lengkap" class="form-control @error('name_se') is-invalid @enderror" >
                                    @error('name_se')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" name="email_se" id="email_se" value="{{ old('email_se') }}" placeholder="Masukkan e-mail" class="form-control @error('email_se') is-invalid @enderror" >
                                    @error('email_se')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" minlength="8" name="password_se" id="password_se" value="{{ old('password_se') }}" placeholder="Masukkan Password_se" class="form-control @error('password_se') is-invalid @enderror" >
                                    @error('password_se')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Ulangi Password</label>
                                    <input type="password" minlength="8" name="password_confirmation_se" id="password_confirmation_se" value="{{ old('password_confirmation_se') }}" placeholder="Masukkan Konfirmasi Password Baru"
                                        class="form-control" >
                                </div>
                                <div class="form-group ">
                                    <label>No Telp</label>
                                    <input type="text" name="no_tlp_se" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="082218XXXXXX" class="form-control" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-3" style="font-weight: bold">Inspection Engineering</label>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name_ie" id="name_ie" value="{{ old('name_ie') }}" placeholder="Masukkan Nama Lengkap" class="form-control @error('name_ie') is-invalid @enderror" >
                                    @error('name_ie')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" name="email_ie" id="email_ie" value="{{ old('email_ie') }}" placeholder="Masukkan e-mail" class="form-control @error('email_ie') is-invalid @enderror" >
                                    @error('email_ie')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" minlength="8" name="password_ie" id="password_ie" value="{{ old('password_ie') }}" placeholder="Masukkan Password_ie" class="form-control @error('password_ie') is-invalid @enderror" >
                                    @error('password_ie')
                                    <div class="invalid-feedback" style="display: block; color:red">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Ulangi Password</label>
                                    <input type="password" minlength="8" name="password_confirmation_ie" id="password_confirmation_ie" value="{{ old('password_confirmation_ie') }}" placeholder="Masukkan Konfirmasi Password Baru"
                                        class="form-control" >
                                </div>
                                <div class="form-group ">
                                    <label>No Telp</label>
                                    <input type="text" name="no_tlp_ie" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="082218XXXXXX" class="form-control" >  
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
                    <p>Hubungi admin jika ingin mengembalika data tersebut</p>
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
<script>
$(document).ready(function(){
  
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
    $("#delModal").on("show.bs.modal", function (event) {
            const link = $(event.relatedTarget);
            const id = link.data("id");
            console.log(id);
            const url = `{{ url('admin/master_konsultan/trash_ft/move_to_trash_ft') }}/` + id;
            console.log(url);
            const modal = $(this);
            modal.find(".modal-footer #delHref").attr("href", url);
        });
</script>

@endsection