@extends('layout.index') 
@section('title','Kontraktor')
@section('header')
@endsection 

@section('page-header')
<div class="page-header">
    
    <h3 class="page-title"> @if(Request::segment(3) == 'edit') Edit @else Create @endif Data Umum </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('masterppk.index') }}">Data Umum</a></li>
        
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
                <h4 class="card-title">PPK</h4>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        {{-- <li><i class="feather icon-maximize full-card"></i></li> --}}
                        <li><i class="feather icon-minus minimize-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                @if(Request::segment(3) == 'edit') 
                <form action="{{route('update.masterppk',$data->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @else 
                <form action="{{route('store.masterppk')}}" method="post" enctype="multipart/form-data">
              
                @endif
                    @csrf
                    <div class="card-block">
                        <div class="form-group">
                            <label>Pemda</label>
                            <input type="text" name="pemda" id="pemda" value="{{ @$data->pemda ? : "PEMERINTAH PROVINSI JAWA BARAT"}}" class="form-control" required>
                            @error('pemda')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>OPD</label>
                            <input type="text" name="opd" id="opd" value="{{ @$data->opd }}" class="form-control" required>
                            @error('opd')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Unor</label>
                            <select
                            name="unit"
                            id="unit"
                            class="form-control"
                            required
                            value="{{ old('unit') }}"
                            onchange="ubahOption()">
                            <option value="" selected>Pilih Unit</option>
                            @foreach (@$uptd_list as $item)
                                <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                            @endforeach
                            </select>
                            @error('unit')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ruas</label>
                            <select
                            name="ruas"
                            id="ruas"
                            class="form-control"
                            required
                            value="{{ old('ruas') }}">
                            <option value="" selected>Pilih Ruas</option>
                            @foreach (@$uptd_list as $item)
                                <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                            @endforeach
                            </select>
                            @error('ruas')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>PPK</label>
                            <select
                            name="ppk"
                            id="ppk"
                            class="form-control"
                            required
                            value="{{ old('ppk') }}">
                            <option value="" selected>Pilih ppk</option>
                            @foreach (@$uptd_list as $item)
                                <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                            @endforeach
                            </select>
                            @error('ppk')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
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
    function ubahOption() {

    //untuk select Ruas
    id = document.getElementById("unit").value
    url = "{{ url('getRuasByUptd') }}"
    id_select = '#ruas'
    text = '-- pilih ruas --'
    option = 'nama_ruas_jalan'
    value = 'id_ruas_jalan'
    setDataSelect(id, url, id_select, text, value, option)

    //untuk select PPK
    id1 = document.getElementById("unit").value
    url1 = "{{ url('getPpkByUptd') }}"
    id_select1 = '#ppk'
    text1 = '-- pilih PPK --'
    option1 = 'nama'
    value1 = 'user_detail_id'
    setDataSelect(id1, url1, id_select1, text1, value1, option1)
    }
</script>
@endsection