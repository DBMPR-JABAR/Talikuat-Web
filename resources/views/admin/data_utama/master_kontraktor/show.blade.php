@extends('layout.index') 
@section('title')
   Kontraktor
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
        <li class="breadcrumb-item active" aria-current="page">Kontraktor</li>
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
                                        <label style="font-weight: bold;">Informasi Penyedia Jasa</label>
                                        <table class="table table-striped">
    
                                            <tr>
                                                <td width="20%">Nama Penyedia Jasa</td>
                                                <td >{!! Str::title(@$data->nama) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Direktur</td>
                                                <td >{{ old('nama_direktur', @$data->nama_direktur) }}</td>
                                            </tr>
                                            <tr>
                                                <td>NPWP</td>
                                                <td >{{ old('npwp', @$data->npwp) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Telepon</td>
                                                <td >{{ old('telp', @$data->telp) }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Alamat</td>
                                                <td >
                                                    {{ old('alamat', @$data->alamat) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nama Bank</td>
                                                <td >{{ old('bank', @$data->bank) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Rekening</td>
                                                <td >{{ old('no_rek', @$data->no_rek) }}</td>
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
            <a href="{{ route('edit.masterkontraktor',$data->id) }}">
                <button type="button" class="btn btn-warning waves-effect " data-dismiss="modal">Edit Data</button>
            </a> 
            <span style=" color:red; font-size:12px">(updated {{ dateID($data->updated_at) }})</span>
            
        </div>
    </div>
@endsection

@section('script')

@endsection