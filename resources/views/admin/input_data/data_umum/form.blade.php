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
                <h4 class="card-title">Data Umum</h4>
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
                            <label>Kategori Paket Kegiatan</label>
                            <select
                            name="kategori_paket_id"
                            class="form-control"
                            required
                            value="{{ old('kategori_paket_id') }}">
                            <option value="" selected>Pilih Kategori</option>
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
                            <label>Unor</label>
                            <select
                            name="uptd_id"
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
                        
                        <div class="card mb-3">
                            <div class="card-header">
                              Ruas
                            </div>
                            <div class="card-body">
                                
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9">
                                        <select
                                        name="ruas"
                                        id="ruas"
                                        class="form-control"
                                        required
                                        value="{{ old('ruas') }}">
                                        <option value="" selected>Pilih Ruas</option>
                                        </select>
                                        @error('ruas')
                                            <div class="invalid-feedback" style="display: block; color:red">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                   
                                    <div class="col-md-3 col-sm-3"> 
                                        {{-- <a href="javascript:void(0)" data-toggle="modal"><button class="btn btn-primary addMoreRuas btn-mini waves-effect waves-light" data-toggle="tooltip" title="Tambah Ruas"><i class="fa fa-plus"></i></button></a> --}}
                                        <p>
                                            <input type="button" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" title="Tambah Ruas" value="Tambah Ruas">
                                            {{-- <input type="button" value="Insert row"> --}}
                                        </p>
                                    </div>
                                </div>
                                
                               
                                <table class="table-bordered" id="myTable" >
                                    <!--<table class="table table-bordered table-hover " id="invoiceItem7">-->								
                                    <thead>
                                        <tr class="well">
                                            <th>Ruas Jalan</th>
                                            <th>Segmen Jalan</th>
                                            <th>Koordinat Awal Lat</th>
                                            <th>Koordinat Awal Long</th>
                                            <th>Koordinat Akhir Lat</th>
                                            <th>Koordinat Akhir Long</th>
                                            <th>Cek Lokasi</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        {{-- <tr>
                                            
                                            <td>
                                                <input type="text" class="form-control" id="ruas_jalan" name="ruas_jalan[]" autocomplete="off">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="segment_jalan" name="segmen_jalan[]" autocomplete="off" placeholder="Km Bdg... s/d Km...Bdg" required="">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="lat_awal" name="lat_awal[]" autocomplete="off" placeholder="-7.123456" required="">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="long_awal" name="long_awal[]" autocomplete="off" placeholder="107.12345" required="">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="lat_akhir" name="lat_akhir[]" autocomplete="off" placeholder="-7.12345" required="">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="long_akhir" name="long_akhir[]" autocomplete="off" placeholder="107.12345" required="">
                                            </td>
                                            <td>
                                                <button type="button" onclick="cekLok(this)" class="badge badge-sm badge-primary">Cek Lokasi</button>
                                            </td>
                                            <td>
                                                <input type="button" value="Delete" />
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                
                                  </table>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label>PPK</label>
                            <select
                            name="ppk_user_id"
                            id="ppk"
                            class="form-control"
                            required
                            value="{{ old('ppk') }}">
                            <option value="" selected>Pilih ppk</option>
                            
                            </select>
                            @error('ppk')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Konsultan Supervisi</label>
                            <select
                            name="konsultan_id"
                            id="konsultan_id"
                            class="form-control"
                            required
                            onchange="ubahOption2()"
                            value="{{ old('konsultan_id') }}">
                            <option value="" selected>Pilih Penyedia Jasa</option>
                            @foreach (@$konsultans as $item)
                            <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                            @endforeach 
                            </select>
                            @error('konsultan_id')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Field Team</label>
                            <select
                            name="ft_id"
                            id="ft"
                            class="form-control"
                            required
                            value="{{ old('ft') }}">
                            <option value="" selected>Pilih ft</option>
                            </select>
                            @error('ft')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Penyedia Jasa</label>
                            <select
                            name="kontraktor_id"
                            id="kontraktor_id"
                            class="form-control"
                            required
                            onchange="ubahOption1()"
                            value="{{ old('kontraktor_id') }}">
                            <option value="" selected>Pilih Penyedia Jasa</option>
                            @foreach (@$kontraktors as $item)
                            <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                            @endforeach 
                            </select>
                            @error('kontraktor_id')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>General Superintendent</label>
                            <select
                            name="gs_user_id"
                            id="gs"
                            class="form-control"
                            required
                            value="{{ old('gs_user_id') }}">
                            <option value="" selected>Pilih gs</option>
                            </select>
                            @error('gs_user_id')
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
    function ubahOption1() {

    //untuk select Ruas
    id = document.getElementById("kontraktor_id").value
    url = "{{ url('getGsByKontraktor') }}"
    id_select = '#gs'
    text = '-- pilih GS --'
    option = 'gs'
    value = 'id'
    setDataSelect(id, url, id_select, text, value, option)

    }
    function ubahOption2() {

    //untuk select Ruas
    id = document.getElementById("konsultan_id").value
    url = "{{ url('getFtByKonsultan') }}"
    id_select = '#ft'
    text = '-- pilih ft --'
    option = 'se'
    value = 'id'
    setDataSelect(id, url, id_select, text, value, option)

    }
</script>
<script>
    $('#myTable').on('click', 'input[type="button"]', function () {
    $(this).closest('tr').remove();
    })
    $('p input[type="button"]').click(function () {
        $('#myTable').append('<tr></tr><td><input type="text" class="form-control" id="ruas_jalan" name="id_ruas_jalan[]" autocomplete="off"></td><td><input type="text" class="form-control" id="segment_jalan" name="segmen_jalan[]" autocomplete="off" placeholder="Km Bdg... s/d Km...Bdg" required=""></td><td><input type="text" class="form-control" id="lat_awal" name="lat_awal[]" autocomplete="off" placeholder="-7.123456" required=""></td><td><input type="text" class="form-control" id="long_awal" name="long_awal[]" autocomplete="off" placeholder="107.12345" required=""></td><td><input type="text" class="form-control" id="lat_akhir" name="lat_akhir[]" autocomplete="off" placeholder="-7.12345" required=""></td><td><input type="text" class="form-control" id="long_akhir" name="long_akhir[]" autocomplete="off" placeholder="107.12345" required=""></td><td><button type="button" onclick="cekLok(this)" class="badge badge-sm badge-primary">Cek Lokasi</button></td><td><input type="button" value="Delete" /></td></tr>')
    });
 


    $(document).ready(function(){
        var maxGroupRuas = 8;
       
        $(".addMoreRuas").click(function(){
            if($('body').find('.fieldGroupRuas').length < maxGroupRuas){
                var fieldHTML = '<div class="form-group row fieldGroupRuas">'+$(".fieldGroupCopyRuas").html()+'</div>';
                $('body').find('.fieldGroupRuas:last').after(fieldHTML);
            }else{
                alert('Maximum '+maxGroupRuas+' groups are allowed.');
            }
        });
        
        //remove fields group
        $("body").on("click",".removeRuas",function(){ 
            $(this).parents(".fieldGroupRuas").remove();
        });

       
    });
</script>
@endsection