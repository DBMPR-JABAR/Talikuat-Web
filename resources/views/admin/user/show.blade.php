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
        @if(Request::segment(3) == 'verified')
        Verifikasi 
        @endif
        Akun & Profile {!! Str::title(@$data->profile->nama) !!}
    </h3>
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
                                @elseif(Request::segment(3) != 'verified')
                                <a type="button" href="{{ url('admin/user/edit/detail',$data->id) }}" class="btn btn-responsive btn-primary">
                                    {{-- <i class="icofont icofont-check-circled"></i> --}}
                                    <i class="icofont icofont-edit"></i>
                                    Edit Data
                                </a>
                                @endif
                                <br>&nbsp;
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <label style="font-weight: bold;">Informasi Pribadi</label>
                                        <table class="table table-striped">
    
                                            <tr>
                                                <td width="20%">Nama Lengkap</td>
                                                <td >{!! Str::title(@$data->profile->nama) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>NIK</td>
                                                <td >{{ old('nik', @$data->profile->nik) }}</td>
                                            </tr>
                                            <tr>
                                                <td>NIP</td>
                                                <td >{{ old('nip', @$data->profile->nip) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat / Tanggal Lahir</td>
                                                <td >{{ old('tgl_lahir', @$data->profile->tgl_lahir) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>{{ old('jenis_kelamin', @$data->profile->jenis_kelamin) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td >
                                                    {{ old('agama', @$data->profile->agama) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Telepon</td>
                                                <td >{{ old('phone', @$data->profile->no_tlp) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Telepon Rumah</td>
                                                <td >{{ old('phone', @$data->profile->no_tlp_rumah) }}</td>
                                            </tr>
    
                                        </table>
                                        <label class="mt-3" style="font-weight: bold;">Informasi Akun</label>
                                        <table class="table table-striped">
                                            {{-- <tr>
                                                <td width="20%">Username</td>
                                                <td >{!! Str::title($data->name) !!}</td>
                                            </tr> --}}
                                            <tr>
                                                <td width="20%">Email</td>
                                                <td >{{ @$data->email }}</td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Akun</td>
                                                <td >{{ @$data->user_detail->rule->rule }}</td>
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
                                                <td >{!! old('alamat', @$data->profile->alamat) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Provinsi</td>
                                                <td>{{ old('provinsi', @$data->profile->province->name) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kota / Kabupaten</td>
                                                <td>{{ old('kota', @$data->profile->city->name) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kode Pos</td>
                                                <td>{{ old('kode_pos', @$data->profile->kode_pos) }}</td>
                                            </tr>
                                        </table>
                                        <label class="mt-3" style="font-weight: bold;">Riwayat Pendidikan</label>
                                        <table class="table table-striped">
                                            <tr>
                                                <td width="20%">Jejang</td>
                                                <td >{{ old('jejang', @$data->profile->jejang) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jurusan</td>
                                                <td>{{ old('jurusan_pendidikan', @$data->profile->jurusan_pendidikan) }}</td>
                                            </tr>
                                        </table>
                                        <label class="mt-3" style="font-weight: bold;">Pekerjaan</label>
                                        <table class="table table-striped">
                                            <tr>
                                                <td width="20%">Perusahaan</td>
                                                <td> 
                                                    @if (@$data->user_detail->konsultan)
                                                    {{ @$data->user_detail->konsultan->nama }}
                                                    @else
                                                    {{ @$data->user_detail->kontraktor->nama }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Jabatan</td>
                                                <td>
                                                    {{-- @if($data->user_rule != null && count($data->user_rule) >=1)
                                                        @foreach (@$data->user_rule as $rule)
                                                            
                                                        {{ @$rule->rule }}
                                                        @endforeach 
                                                    @endif --}}
                                                    @if(isset($data->user_detail->rule->rule))
                                                        {{ $data->user_detail->rule->description }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%">UNIT</td>
                                                <td>
                                                    {{-- {{ Str::upper(@$data->uptd->nama) }} --}}
                                                    @if (@$data->user_detail->rule_user_id == 2)
                                                        {{ Str::upper(@$data->user_detail->ppk->uptd->nama) }} 
                                                    @elseif (@$data->user_detail->rule_user_id == 3)
                                                        {{ Str::upper(@$data->user_detail->master_admin->uptd->nama) }} 
                                                    @elseif (@$data->user_detail->rule_user_id == 12)
                                                       
                                                        @foreach (@$data->user_detail->mk as $num => $mk)
                                                            {{ @$mk->uptd->nama }}
                                                            @if(++$num != @$data->user_detail->mk->count())
                                                                <br>
                                                            @endif
                                                            {{-- {{ ++$num }}/{{ @$item->mk->count() }} --}}
                                                        @endforeach
                                                    @else
                                                    {{ Str::upper(@$data->user_detail->uptd->nama) }} 
                                                    @endif
                                                </td>
                                            </tr>
                                            {{-- <tr>
                                                <td>SUP</td>
                                                <td>{{ @$profile->sup }}</td>
                                            </tr> --}}
                                            
                                            <tr>
                                                <td>Tanggal Mulai</td>
                                                <td>{{ old('tgl_mulai_kerja', @$data->profile->tgl_mulai_kerja) }}</td>
                                            </tr>
    
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                    </div>

                </div>
            </div>

            @if(Request::segment(3) == 'verified' && @$data->user_detail->account_verified_at == null)
                @can('viewVerificationUser',Auth::user())
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
                        <form action="{{url('admin/user/verified/'.@$data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-block">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Rule User</label>
                                        <select class="form-control" name="rule_user" required @if( Auth::user()->id != 1) disabled @endif>
            
                                            <option value="">Select</option>
                                            @foreach ($rule_user as $no =>$rule)
                                            <option value="{{ $rule->id }}" @if (@$data->user_detail->rule_user_id != null && $rule->id == @$data->user_detail->rule_user_id) selected @endif>{{ $rule->rule }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label >Verifikasi Akun (<i style="color :red; font-size: 10px;">Dengan Memilih Setuju maka Akun Dapat Digunakan!!</i>)</label>
                                    

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
                            @can('createVerificationUser',Auth::user())
                            <button type="submit" class="btn btn-responsive btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
                            @endcan
                            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-danger waves-effect "
                                data-dismiss="modal">Kembali</button></a>
                        </form>
                    </div>
        
                </div>
                @endcan
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