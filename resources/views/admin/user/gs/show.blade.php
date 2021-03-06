@extends('layout.index') 
@section('title')
    @if(Request::segment(3) == 'verified')
        Verifikasi 
    @endif
    Akun & Profile
@endsection
@section('header')
@endsection 

@section('page-header')
<div class="page-header">
    <h3 class="page-title"> 
        @if(Request::segment(4) == 'verified')
        Verifikasi 
        @endif
        General Superintendent 
    </h3>
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
        <div class="col-sm-12">

            <div class="card grid-margin stretch-card">
                
                <div class="card-body">
                    <div class="card-block">
                        {{-- <a href="{{ route('createRoleAccess') }}" class="btn btn-mat btn-primary mb-3">Tambah</a> --}}
                        {{-- <form action="{{url('admin/user/account/'.Auth::user()->id)}}" method="post" enctype="multipart/form-data"> --}}
                            <div class="dt-responsive table-responsive">
                                {{-- Content here --}}
                                {{-- <button type="submit" class="btn btn-responsive btn-warning">Edit Password</button> --}}
                               
                                
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <label style="font-weight: bold;">Informasi Kontraktor</label>
                                        <table class="table table-striped">
    
                                            <tr>
                                                <td width="20%">Nama Perusahaan</td>
                                                <td >{!! Str::title(@$data->kontraktor->nama) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Direktur</td>
                                                <td>
                                                    @if($data_pengguna->where('rule_user_id',5)->first())
                                                    {{ old('nama_direktur', @$data_pengguna->where('rule_user_id',5)->first()->user->name) }}
                                                    {{-- <br>{{ old('nama_direktur', @$data_pengguna->where('rule_user_id',5)->first()->user->name) }} --}}
                                                    @else
                                                    {{ old('nama_direktur', @$data->kontraktor->nama_direktur) }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>NPWP</td>
                                                <td >
                                                    {{ old('alamat', @$data->kontraktor->npwp) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Telepon</td>
                                                <td >
                                                    {{ old('alamat', @$data->kontraktor->telp) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td >
                                                    {{ old('alamat', @$data->kontraktor->alamat) }}
                                                </td>
                                            </tr>
    
                                        </table>
                                        <label style="font-weight: bold;" class="mt-3">Informasi GS</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label style="font-style: italic">General Superintendent</label> 
                                                @if(Request::segment(4) != 'verified')
                                                <a type='button' href='{{ url('admin/user/edit/detail',@$data->user_gs_detail->user->id) }}'  class='btn btn-sm btn-warning waves-effect waves-light'><i class="mdi mdi-table-edit menu-icon"></i>Edit Data GS</a>
                                                @endif
                                                <table class="table table-striped mt-2">
    
                                                    <tr>
                                                        <td width="20%">Nama Lengkap</td>
                                                        <td >{!! Str::title(@$data->user_gs_detail->user->profile->nama) !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIK</td>
                                                        <td >{{ old('nik', @$data->user_gs_detail->user->profile->nik) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIP</td>
                                                        <td >{{ old('nip', @$data->user_gs_detail->user->profile->nip) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tempat / Tanggal Lahir</td>
                                                        <td >{{ old('tgl_lahir', @$data->user_gs_detail->user->profile->tgl_lahir) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td>{{ old('jenis_kelamin', @$data->user_gs_detail->user->profile->jenis_kelamin) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agama</td>
                                                        <td >
                                                            {{ old('agama', @$data->user_gs_detail->user->profile->agama) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Telepon</td>
                                                        <td >{{ old('phone', @$data->user_gs_detail->user->profile->no_tlp) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Telepon Rumah</td>
                                                        <td >{{ old('phone', @$data->user_gs_detail->user->profile->no_tlp_rumah) }}</td>
                                                    </tr>
            
                                                </table>
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                </div>
                                
                            </div>
                    </div>

                </div>
            </div>

            @if(Request::segment(4) == 'verified')
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title">Verified</h4>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            {{-- <li><i class="feather icon-maximize full-card"></i></li> --}}
                            <li><i class="feather icon-minus minimize-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('verified.user.gs.store',@$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-block">
                           
                            {{-- <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Unit</label>
                                    <select class="form-control" name="uptd">
        
                                        <option value="">Select</option>
                                        @foreach ($uptd as $no =>$uptd)
                                        <option value="{{ $uptd->id }}" @if (@$data->uptd_id != null && $uptd->id == @$data->uptd_id) selected @endif>{{ $uptd->nama }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label >Verifikasi Akun (<i style="color :red; font-size: 10px;">Dengan Memilih Setuju maka FT Dapat Digunakan!!</i>)</label>
                                
                                    <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="verified" id="verified1" value="1" > Setuju <i class="input-helper"></i></label>
                                    </div>
                                    
                                    <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="verified" id="verified2" value="0" checked=""> Tidak Setuju <i class="input-helper"></i></label>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-responsive btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
                        <a href="{{ url()->previous() }}"><button type="button" class="btn btn-danger waves-effect "
                            data-dismiss="modal">Kembali</button></a>
                    </form>
                </div>
    
            </div>
            @else
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-danger waves-effect "
                data-dismiss="modal">Kembali</button></a>
            @endif
        </div>
    </div>
    <div class="modal-only" >
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{url('admin/profile/account/'.Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                    {{-- <form action="{{url('admin/edit/profile/'.Auth::user()->id)}}" method="POST" enctype="multipart/form-data"> --}}

                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Password</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-5">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>E-mail</label>
                                    <input type="text" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Password Lama</label>
                                    <input type="password" name="password_lama" id="password_lama"  placeholder="Masukkan Password Lama" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Masukkan Password Baru"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                        <div class="invalid-feedback" style="display: block; color:red">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ulangi Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Masukkan Konfirmasi Password Baru"
                                            class="form-control">
                                    </div>
                                </div>
                                <i style="color :red; font-size: 10px;">Biarkan jika tidak ada perubahan</i>

                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary waves-effect " data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light ">Simpan</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection