@extends('layout.index') 
@section('title','Akun & Profile')
@section('header')
<style>
    select[readonly] {
  background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
  pointer-events: none;
  touch-action: none;
}
</style>
@endsection 

@section('page-header')
<div class="page-header">
    
    <h3 class="page-title"> Edit @if(Request::segment(2) == 'user') User @else Profile @endif {!! $data->name !!} </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboar</a></li>
        @if(Request::segment(2) == 'user') 
        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
        @else 
        <li class="breadcrumb-item" aria-current="page"> <a href="{{ url('admin/profile', Auth::user()->id) }}">Akun & Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
        @endif
        

      </ol>
    </nav>
  </div>
@endsection

@section('content')
<div class="row">
    @if(Request::segment(2) == 'user')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header ">
                <h4 class="card-title">Akun</h4>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        {{-- <li><i class="feather icon-maximize full-card"></i></li> --}}
                        <li><i class="feather icon-minus minimize-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <form action="{{url('admin/user/edit/account/'.@$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>E-mail</label>
                                <input type="text" name="email" id="email" value="{{ @$data->email }}" class="form-control" required>
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
                            <div class="col-md-12">
                                <i style="color :red; font-size: 10px;">Biarkan jika tidak ada perubahan</i>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-responsive btn-primary"><i class="fa fa-paper-plane"></i> Save</button>
                </form>
            </div>

        </div>
    </div>
    @endif
    <div class="col-xl-6 col-md-6">
        <div class="card">
                <form action="{{url('admin/user/edit/profiles/'.@$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                <div class="card-header ">
                    <h4 class="card-title">Informasi Pribadi</h4>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            {{-- <li><i class="feather icon-maximize full-card"></i></li> --}}
                            <li><i class="feather icon-minus minimize-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input name="nama" placeholder="Enter your First name" type="text"
                                value="{{ old('nama', @$data->profile->nama) }}"
                                class="form-control  @error('nama') is-invalid @enderror" required>
                            @error('nama')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>NIP</label>
                            <input name="nip" placeholder="Masukan NIP" type="number"
                                value="{{ old('nip', @$data->profile->nip) }}"
                                class="form-control  @error('nip') is-invalid @enderror">
                            @error('nip')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>NIK</label>
                            <input name="nik" placeholder="Masukan NIK" type="number"
                                value="{{ old('nik', @$data->profile->nik) }}"
                                class="form-control  @error('nik') is-invalid @enderror" >
                            @error('nik')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input name="tmp_lahir" placeholder="Masukan Tempat lahir" type="text"
                                        value="{{ old('tmp_lahir', @$data->profile->tmp_lahir) }}"
                                        class="form-control @error('tmp_lahir') is-invalid @enderror" required>
                                    @error('tmp_lahir')
                                        <div class="invalid-feedback" style="display: block; color:red">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input name="tgl_lahir" placeholder="Enter your date" type="date"
                                        value="{{ old('tgl_lahir', @$data->profile->tgl_lahir) }}"
                                        class="form-control @error('tgl_lahir') is-invalid @enderror" required>
                                    @error('tgl_lahir')
                                        <div class="invalid-feedback" style="display: block; color:red">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" required>
        
                                        <option value="">Select</option>
                                        {{-- <option selected>
                                        {!!  @$data->profile->jenis_kelamin !!}
                                    </option> --}}
                                        <option value="Laki-laki" @if (@$data->profile->jenis_kelamin != null && strpos('Laki-laki', @$data->profile->jenis_kelamin) !== false) selected @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if (@$data->profile->jenis_kelamin != null && strpos('Perempuan', @$data->profile->jenis_kelamin) !== false) selected @endif>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control" name="agama" required>
                                        <option value=" ">Select</option>
                                        {{-- <option selected>
                                        {!!  @$data->profile->jenis_kelamin !!}
                                    </option> --}}
                                        <option value="Islam" @if (@$data->profile->agama != null && strpos('Islam', @$data->profile->agama) !== false) selected @endif>Islam</option>
                                        <option value="Kristen" @if (@$data->profile->agama != null && strpos('Kristen', @$data->profile->agama) !== false) selected @endif>Kristen</option>
                                        <option value="Hindu" @if (@$data->profile->agama != null && strpos('Hindu', @$data->profile->agama) !== false) selected @endif>Hindu</option>
                                        <option value="Budha" @if (@$data->profile->agama != null && strpos('Budha', @$data->profile->agama) !== false) selected @endif>Budha</option>
                                        <option value="Katolik" @if (@$data->profile->agama != null && strpos('Katolik', @$data->profile->agama) !== false) selected @endif>Katolik</option>
                                        <option value="Kong Hu Cu" @if (@$data->profile->agama != null && strpos('Kong Hu Cu', @$data->profile->agama) !== false) selected @endif>Kong Hu Cu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="text" name="no_tlp" id="no_tlp"
                                        value="{{ old('no_tlp', @$data->profile->no_tlp) }}" placeholder="Masukan Nomer Telepon"
                                        class="form-control @error('no_tlp') is-invalid @enderror" required>
                                    @error('no_tlp')
                                        <div class="invalid-feedback" style="display: block; color:red">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telepon Rumah</label>
                                    <input type="text" name="no_tlp_rumah" id="no_tlp_rumah"
                                        value="{{ old('no_tlp_rumah', @$data->profile->no_tlp_rumah) }}"
                                        placeholder="Masukan Telepon Rumah"
                                        class="form-control @error('no_tlp_rumah') is-invalid @enderror">
                                    @error('no_tlp_rumah')
                                        <div class="invalid-feedback" style="display: block; color:red">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title">Pekerjaan</h4>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            {{-- <li><i class="feather icon-maximize full-card"></i></li> --}}
                            <li><i class="feather icon-minus minimize-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        @if (@$data->user_detail->konsultan || @$data->user_detail->rule->category == "KONSULTAN")
                        <div class="form-group">
                            <label>Perusahaan</label>
                            <select class="form-control" name="konsultan" @if ( Auth::user()->id != 1) readonly="readonly" tabindex="-1" aria-disabled="true" @endif>
                                <option value="">Select</option> 
                                @foreach ($konsultans as $no =>$konsultan)
                                    <option value="{{ $konsultan->id }}" @if (@$data->user_detail->konsultan_id != null && $konsultan->id == $data->user_detail->konsultan_id) selected @endif>{{ $konsultan->nama }}</option> 
                                @endforeach
                            </select>
                        </div>
                        @elseif (@$data->user_detail->kontraktor || @$data->user_detail->rule->category == "KONTRAKTOR")
                        <div class="form-group">
                            <label>Perusahaan</label>
                            <select class="form-control" name="kontraktor" @if ( Auth::user()->id != 1) readonly="readonly" tabindex="-1" aria-disabled="true" @endif>
                                <option value="">Select</option>
                                @foreach ($kontraktors as $no =>$kontraktor)
                                    <option value="{{ $kontraktor->id }}" @if (@$data->user_detail->kontraktor_id != null && $kontraktor->id == $data->user_detail->kontraktor_id) selected @endif>{{ $kontraktor->nama }}</option> 
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="form-group">
                            <label>Jabatan</label>
    
                            <select class="form-control" name="rule_user" @if ( Auth::user()->user_detail->rule_user_id != 1) readonly="readonly" tabindex="-1" aria-disabled="true" @endif>
                                <option value="">Select</option>
                                @foreach ($rule_user as $no =>$rule)
                                <option value="{{ $rule->id }}" @if (@$data->user_detail->rule_user_id != null && $rule->id == @$data->user_detail->rule_user_id) selected @endif>{{ $rule->rule }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('rule_user')
                            <div class="invalid-feedback" style="display: block; color:red">
                                {{ $message }}
                            </div>
                        @enderror
                        @if(@$data->user_detail->rule_user_id == 12)
                            
                            @foreach (@$uptd_list as $no => $item)
                            <input type="checkbox" id="uptd{{ $item->id }}" name="uptd_mk[]" value="{{ $item->id }}" @if(in_array($item->id, @$data->user_detail->mk()->pluck('uptd_id')->toArray(), true)) checked @endif>
                            <label for="uptd{{ $item->id }}">UPTD {{ $item->id }}</label>
                            @if(++$no % 3 == 0) <br> @endif
                            @endforeach
                            <br>
                        @else
                            <div class="form-group">
                                <label>Unit </label>
                                <select class="form-control" name="uptd" @if( Auth::user()->id != 1) readonly="readonly" tabindex="-1" aria-disabled="true" @endif>
                                    <option value="">Select</option>
                                    @if (@$data->user_detail->rule_user_id == 2)
                                        @foreach ($uptd as $no =>$uptd)
                                        <option value="{{ $uptd->id }}" @if (@$data->user_detail->ppk->uptd_id != null && $uptd->id == @$data->user_detail->ppk->uptd_id) selected @endif>{{ $uptd->nama }}</option>
                                        @endforeach
                                    @elseif (@$data->user_detail->rule_user_id == 3)
                                        @foreach ($uptd as $no =>$uptd)
                                        <option value="{{ $uptd->id }}" @if (@$data->user_detail->master_admin->uptd_id != null && $uptd->id == @$data->user_detail->master_admin->uptd_id) selected @endif>{{ $uptd->nama }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($uptd as $no =>$uptd)
                                        <option value="{{ $uptd->id }}" @if (@$data->uptd_id != null && $uptd->id == @$data->uptd_id) selected @elseif(@$data->user_detail->uptd_id ==$uptd->id) selected @endif>{{ $uptd->nama }}</option>
                                        @endforeach  
                                    @endif
                                </select>
                            </div>
                        @endif
                        {{-- @if (@$data->user_detail->rule_user_id == 2 || @$data->user_detail->rule_user_id == 3)
                        @endif --}}
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input name="tgl_mulai_kerja" placeholder="Tanggal Mulai Kerja" type="date"
                                value="{{ old('tgl_mulai_kerja', @$data->profile->tgl_mulai_kerja) }}"
                                class="form-control  @error('tgl_mulai_kerja') is-invalid @enderror">
                            @error('tgl_mulai_kerja')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title">Riwayat Pendidikan</h4>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            {{-- <li><i class="feather icon-maximize full-card"></i></li> --}}
                            <li><i class="feather icon-minus minimize-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group">
                            <label>Nama Institusi</label>
                            <input name="sekolah" placeholder="Masukan Institusi" type="text"
                                value="{{ old('sekolah', @$data->profile->sekolah) }}"
                                class="form-control  @error('sekolah') is-invalid @enderror">
                            @error('sekolah')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jejang Pendidikan</label>
                            <select class="form-control" name="jejang">
                                <option value="">Select</option>
                                {{-- <option selected>
                                {!!  @$data->profile->jejang !!}
                            </option> --}}
                                <option value="SMA" @if (@$data->profile->jejang != null && strpos('SMA', @$data->profile->jejang) !== false) selected @endif>SMA</option>
                                <option value="SMK" @if (@$data->profile->jejang != null && strpos('SMK', @$data->profile->jejang) !== false) selected @endif>SMK</option>
                                <option value="S1" @if (@$data->profile->jejang != null && strpos('S1', @$data->profile->jejang) !== false) selected @endif>S1</option>
                                <option value="S2" @if (@$data->profile->jejang != null && strpos('S2', @$data->profile->jejang) !== false) selected @endif>S2</option>
                                <option value="S3" @if (@$data->profile->jejang != null && strpos('S3', @$data->profile->jejang) !== false) selected @endif>S3</option>
                                <option value="D1" @if (@$data->profile->jejang != null && strpos('D1', @$data->profile->jejang) !== false) selected @endif>D1</option>
                                <option value="D2" @if (@$data->profile->jejang != null && strpos('D2', @$data->profile->jejang) !== false) selected @endif>D2</option>
                                <option value="D3" @if (@$data->profile->jejang != null && strpos('D3', @$data->profile->jejang) !== false) selected @endif>D3</option>
                                <option value="SMP" @if (@$data->profile->jejang != null && strpos('SMP', @$data->profile->jejang) !== false) selected @endif>SMP</option>
        
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jurusan Pendidikan</label>
                            <input name="jurusan_pendidikan" placeholder="Masukan Jurusan" type="text"
                                value="{{ old('jurusan_pendidikan', @$data->profile->jurusan_pendidikan) }}"
                                class="form-control  @error('jurusan_pendidikan') is-invalid @enderror">
                            @error('jurusan_pendidikan')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
    
            </div>
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title">Alamat Domisili</h4>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            {{-- <li><i class="feather icon-maximize full-card"></i></li> --}}
                            <li><i class="feather icon-minus minimize-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group">
                            <label>Provinsi</label>
        
                            <select name="provinsi" id="province" class="form-control searchableField"
                                onchange="ubahOption()">
                                <option value="">== Select Provinsi ==</option>
                                @foreach ($provinces as $id => $name)
                                    <option value="{{ $id }}" @if (@$data->profile->province_id != null && @$data->profile->province_id == $id) selected @endif>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kota / Kabupaten</label>
        
                            <select name="kota" id="city" class="form-control searchableField">
                                <option value="">-</option>
                                @if (@$data->profile->city_id != null)
                                    @foreach ($cities as $id => $name)
                                        <option value="{{ $id }}" @if (@$data->profile->city_id != null && @$data->profile->city_id == $id) selected @endif>{{ $name }}</option>
                                    @endforeach
                                @else
                                    <option value="">-</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kode Pos</label>
                            <input name="kode_pos" placeholder="Masukan Jurusan" type="text"
                                value="{{ old('kode_pos', @$data->profile->kode_pos) }}"
                                class="form-control  @error('kode_pos') is-invalid @enderror">
                            @error('kode_pos')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <textarea name="alamat" placeholder="Masukan Alamat Lengkap"
                                class="form-control  @error('alamat') is-invalid @enderror">{!!  @$data->profile->alamat !!}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
    
            </div>
    
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-danger waves-effect " data-dismiss="modal">Kembali</button></a>
            <button type="submit" class="btn btn-responsive btn-primary"><i class="fa fa-paper-plane"></i> Save</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    function ubahOption() {

    //untuk select SUP
    id = document.getElementById("province").value
    url = "{{ url('getCity') }}"
    id_select = '#city'
    text = '-- pilih kota --'
    option = 'name'
    value = 'id'

    setDataSelect(id, url, id_select, text, value, option)

    }
</script>
@endsection