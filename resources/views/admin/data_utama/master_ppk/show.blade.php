@extends('layout.index') 
@section('title')
   PPK
@endsection
@section('header')
@endsection 

@section('page-header')
<div class="page-header">
    <h3 class="page-title"> 
       {{ @$data->nama }}
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">PPK</li>
      </ol>
    </nav>
  </div>
@endsection

@section('content')
    
    <div class="row">
        <div class="col-sm-12">

            <div class="card grid-margin stretch-card">
                
                <div class="card-body">
                    <div class="card-block">
                        {{-- <a href="{{ route('createRoleAccess') }}" class="btn btn-mat btn-primary mb-3">Tambah</a> --}}
                        {{-- <form action="{{url('admin/user/account/'.Auth::user()->id)}}" method="post" enctype="multipart/form-data"> --}}
                            <div class="dt-responsive table-responsive">
                              
                                
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <label style="font-weight: bold;">Informasi PPK</label>
                                        <table class="table table-striped">
    
                                            <tr>
                                                <td width="20%">Nama</td>
                                                <td >{!! Str::title(@$data->nama) !!}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Alamat</td>
                                                <td >
                                                    {{ old('alamat', @$data->alamat) }}
                                                </td>
                                            </tr>
                                            
    
                                        </table>
                                        
                                        
                                    </div>
                                </div>
                                
                            </div>
                    </div>

                </div>
            </div>

            
            <a href="{{ url()->previous() }}">
                <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal">Kembali</button>
            </a> 
            <a href="{{ route('edit.masterppk',$data->id) }}">
                <button type="button" class="btn btn-warning waves-effect " data-dismiss="modal">Edit Data</button>
            </a> 
            <span style=" color:red; font-size:12px">(updated {{ dateID($data->updated_at) }})</span>
            
        </div>
    </div>
@endsection

@section('script')

@endsection