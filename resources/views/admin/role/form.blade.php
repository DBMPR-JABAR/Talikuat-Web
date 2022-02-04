@extends('layout.index') 
@section('title','Role')
@section('header')
    
@endsection 

@section('page-header')
<div class="page-header">
    
    <h3 class="page-title"> @if(Request::segment(3) == 'edit') Edit @else Create @endif Data Role </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboar</a></li>
        <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Role</a></li>
        
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
                <h4 class="card-title">Role</h4>
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
                                <label>Nama Role</label>
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
                                <label>Permissions</label>
                                @foreach ($features as $feature)
                                    <br>
                                    {{ $feature->name }}
                                    <br>
                                    @foreach ($feature->permission as $permission)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="">{{ $permission->name }} &nbsp;
                                        </label>
                                    @endforeach
                                @endforeach
                                
                                @error('telp')
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
      
    </div>
   
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
@endsection
