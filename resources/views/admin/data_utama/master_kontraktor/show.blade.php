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
                                                <td >
                                                    {{-- {{ old('nama_direktur', @$data->nama_direktur) }} --}}
                                                    @if($data_pengguna->where('rule_user_id',5)->first())
                                                    {{ old('nama_direktur', @$data_pengguna->where('rule_user_id',5)->first()->user->name) }}
                                                    {{-- <br>{{ old('nama_direktur', @$data_pengguna->where('rule_user_id',5)->first()->user->name) }} --}}
                                                    @else
                                                    {{ old('nama_direktur', @$data->nama_direktur) }}
                                                    @endif
                                                </td>
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
                                        <label style="font-weight: bold;" class="mt-3">Informasi Pengguna</label>
                                        
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
                                        @if(count($data->kontraktor_gs) >= 1)
                                        <label style="font-weight: bold;" class="mt-3">Informasi General Superintendent</label>
                                            
                                        <table class="table table-striped">
                                            <tr>
                                                <td style="width: 10%">No</td>
                                                <td>Nama</td>
                                                <td  class="text-center">GS Verified</td>

                                            </tr>
                                            @foreach ( $data->kontraktor_gs as $no => $gs)
                                            <tr>
                                                <td style="width: 10%">{{ ++$no }}</td>
                                                <td>{{ $gs->user_gs->name }}</td>
                                                <td class="text-center">
                                                    @if($gs->gs_verified_at)
                                                    <i class="mdi mdi-check-all menu-icon" style="color: green"></i>
                                                    @else
                                                    <i class="mdi mdi-close menu-icon" style="color: red"></i>
                                                    @endif
                                                </td>

                                            </tr> 
                                            @endforeach
                                      
                                        </table>
                                        @endif
                                        
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