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
                                <label>NPWP</label>
                                <input type="text" name="npwp" id="npwp" value="{{ @$data->npwp }}" class="form-control" required>
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
                <h4 class="card-title">Informasi GS</h4>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        {{-- <li><i class="feather icon-maximize full-card"></i></li> --}}
                        <li><i class="feather icon-minus minimize-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                @if(Request::segment(3) == 'edit') 
                <form action="{{route('update.masterkontraktorgs',$data->id)}}" method="post" enctype="multipart/form-data">
                
                @endif
                    @csrf
                    <div class="card-block">
                        <div class="row justify-content-md-center fieldGroupPrice">
                            <div class="col-md-11">
                                <div class="row">
                                    
                                    <div class="col-md-12 col-sm-6">
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
                                                {{-- <input type="text" name="id_gs[]" value="" style="display: none" id="myimage"> --}}
                                            
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
                        @if(Request::segment(3) == 'edit') 
                        <i style="color :red; font-size: 10px;">Biarkan jika tidak ada perubahan</i>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-responsive btn-primary"><i class="fa fa-paper-plane"></i> Save</button>
                </form>
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
@endsection