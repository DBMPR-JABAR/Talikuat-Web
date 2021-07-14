@extends('layout.index') 
@section('title','Akun & Profile')
@section('header')
@endsection 

@section('page-header')
<div class="page-header">
    <h3 class="page-title"> Akun & Profile </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Akun & Profile</li>
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
                                @if(Request::segment(2) == 'profile')
                                <a type="button"href="#editModal"  data-toggle="modal" data-id="{{Auth::user()->id}}"  class="btn btn-responsive btn-warning">
                                    {{-- <i class="icofont icofont-check-circled"></i> --}}
                                    <i class="icofont icofont-key"></i>
                                    Edit Password
                                </a>
                                &nbsp;
                                <a type="button" href="{{ url('admin/profile/edit', Auth::user()->id) }}" class="btn btn-responsive btn-primary">
                                    {{-- <i class="icofont icofont-check-circled"></i> --}}
                                    <i class="icofont icofont-edit"></i>
                                    Edit Profil
                                </a>
                                @endif
                                <br>&nbsp;
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <label style="font-weight: bold;">Informasi Pribadi</label>
                                        <table class="table table-striped">
    
                                            <tr>
                                                <td width="20%">Nama Lengkap</td>
                                                <td >{!! Str::title(@Auth::user()->profile->nama) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>NIK</td>
                                                <td >{{ old('nik', @Auth::user()->profile->nik) }}</td>
                                            </tr>
                                            <tr>
                                                <td>NIP</td>
                                                <td >{{ old('nip', @Auth::user()->profile->nip) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat / Tanggal Lahir</td>
                                                <td >{{ old('tgl_lahir', @Auth::user()->profile->tgl_lahir) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>{{ old('jenis_kelamin', @Auth::user()->profile->jenis_kelamin) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td >
                                                    {{ old('agama', @Auth::user()->profile->agama) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Telepon</td>
                                                <td >{{ old('phone', @Auth::user()->profile->no_tlp) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Telepon Rumah</td>
                                                <td >{{ old('phone', @Auth::user()->profile->no_tlp_rumah) }}</td>
                                            </tr>
    
                                        </table>
                                        <label class="mt-3" style="font-weight: bold;">Informasi Akun</label>
                                        <table class="table table-striped">
                                            {{-- <tr>
                                                <td width="20%">Username</td>
                                                <td >{!! Str::title(Auth::user()->name) !!}</td>
                                            </tr> --}}
                                            <tr>
                                                <td width="20%">Email</td>
                                                <td >{{ @Auth::user()->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Created At</td>
                                                <td>1 month ago</td>
                                            </tr>
                                        </table>
                                        <label class="mt-3" style="font-weight: bold;">Alamat Domisili</label>
                                        <table class="table table-striped">
                                            <tr>
                                                <td width="20%">Alamat Lengkap</td>
                                                <td >{!! old('alamat', @Auth::user()->profile->alamat) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Provinsi</td>
                                                <td>{{ old('provinsi', @Auth::user()->profile->province->name) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kota / Kabupaten</td>
                                                <td>{{ old('kota', @Auth::user()->profile->city->name) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kode Pos</td>
                                                <td>{{ old('kode_pos', @Auth::user()->profile->kode_pos) }}</td>
                                            </tr>
                                        </table>
                                        <label class="mt-3" style="font-weight: bold;">Riwayat Pendidikan</label>
                                        <table class="table table-striped">
                                            <tr>
                                                <td width="20%">Jejang</td>
                                                <td >{{ old('jejang', @Auth::user()->profile->jejang) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jurusan</td>
                                                <td>{{ old('jurusan_pendidikan', @Auth::user()->profile->jurusan_pendidikan) }}</td>
                                            </tr>
                                        </table>
                                        <label class="mt-3" style="font-weight: bold;">Pekerjaan</label>
                                        <table class="table table-striped">
                                            <tr>
                                                <td width="20%">Jabatan</td>
                                                <td> {{ @$profile->internalRole->role }}</td>
                                            </tr>
                                            <tr>
                                                <td width="20%">UPTD</td>
                                                <td>{{ Str::upper(@$profile->internalRole->uptd) }}</td>
                                            </tr>
                                            <tr>
                                                <td>SUP</td>
                                                <td>{{ @$profile->sup }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Tanggal Mulai</td>
                                                <td>{{ old('tgl_mulai_kerja', @Auth::user()->profile->tgl_mulai_kerja) }}</td>
                                            </tr>
    
                                        </table>
                                    </div>
                                </div>
                                <a href="{{ url()->previous() }}"><button type="button" class="btn btn-danger waves-effect "
                                    data-dismiss="modal">Kembali</button></a>
                            </div>
                    </div>

                </div>
            </div>

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