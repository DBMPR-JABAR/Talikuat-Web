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
                <form action="{{route('update.dataumum',$data->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @else
                    <form action="{{route('store.dataumum')}}" method="post" enctype="multipart/form-data">

                        @endif
                        @csrf
                        <div class="card-block">
                            <div class="form-group">
                                <label>Pemda</label>
                                <input type="text" name="pemda" id="pemda" value="{{ @$data->pemda ? : 'PEMERINTAH PROVINSI JAWA BARAT' }}" class="form-control" required>
                                @error('pemda')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>OPD</label>
                                <input type="text" name="opd" id="opd"
                                    value="{{ @$data->opd ? : 'DINAS BINA MARGA DAN PENATAAN RUANG' }}"
                                    class="form-control" required>
                                @error('opd')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kategori Paket Kegiatan</label>
                                <select name="kategori_paket_id" class="form-control" required>
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach (@$temp_kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('unit')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Kegiatan / Paket</label>
                                <input type="text" name="nm_paket" id="nm_paket" value="{{ @$data->nm_paket }}"
                                    class="form-control" required autocomplete="off">
                                @error('nm_paket')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Unor</label>
                                <select name="uptd_id" id="unit" class="form-control" required value="{{ old('unit') }}"
                                    onchange="ubahOption()">
                                    <option selected disabled>Pilih Unit</option>
                                    @foreach (@$uptd_list as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
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
                                            <select name="ruas" id="ruas" class="form-control" required
                                                value="{{ old('ruas') }}">
                                                <option selected disabled>Pilih Ruas</option>
                                            </select>
                                            @error('ruas')
                                            <div class="invalid-feedback" style="display: block; color:red">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-3 col-sm-3">
                                            <p>
                                                <input type="button"
                                                    class="btn btn-primary btn-mini waves-effect waves-light"
                                                    data-toggle="tooltip" title="Tambah Ruas" value="Tambah Ruas" disabled>
                                                {{-- <input type="button" value="Insert row"> --}}
                                            </p>
                                        </div>
                                    </div>


                                    <table class="table-bordered" id="myTable">
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
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>No.Kontrak</label>
                                <input type="text" name="no_kontrak" id="no_kontrak" value="{{ @$data->no_kontrak }}"
                                    class="form-control" required autocomplete="off">
                                @error('no_kontrak')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kontrak</label>
                                <input type="date" name="tgl_kontrak" id="tgl_kontrak" value="{{ @$data->tgl_kontrak }}"
                                    class="form-control" required>
                                @error('tgl_kontrak')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nilai Kontrak</label>
                                <input type="text" name="nilai_kontrak" id="nilai_kontrak"
                                    value="{{ @$data->nilai_kontrak }}" class="form-control" required
                                    autocomplete="off">
                                @error('nilai_kontrak')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No. SPMK</label>
                                <input type="text" name="no_spmk" id="no_spmk" value="{{ @$data->no_spmk }}"
                                    class="form-control" required autocomplete="off">
                                @error('no_spmk')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal SPMK</label>
                                <input type="date" name="tgl_spmk" id="tgl_spmk" value="{{ @$data->tgl_spmk }}"
                                    class="form-control" required>
                                @error('tgl_spmk')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Panjang KM</label>
                                <input type="number" step="0.01"  name="panjang_km" id="panjang_km" value="{{ @$data->panjang_km }}"
                                    placeholder="....Km" class="form-control" required autocomplete="off">
                                @error('panjang_km')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Waktu Pelaksanaan</label>
                                <input type="number" step="1" name="lama_waktu" id="lama_waktu" value="{{ @$data->lama_waktu }}"
                                    class="form-control" required autocomplete="off">
                                @error('lama_waktu')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>PPK Kegiatan</label>
                                <input type="text" name="ppk_kegiatan" id="ppk_kegiatan"
                                    value="{{ @$data->ppk_kegiatan }}" class="form-control" required autocomplete="off">
                                @error('ppk_kegiatan')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>PPK</label>
                                <select name="ppk_user_id" id="ppk" class="form-control" required
                                    value="{{ old('ppk') }}">
                                    <option selected disabled>Pilih PPK</option>

                                </select>
                                @error('ppk')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Konsultan Supervisi</label>
                                <select name="konsultan_id" id="konsultan_id" class="form-control" required
                                    onchange="ubahOption2()" value="{{ old('konsultan_id') }}">
                                    <option selected disabled>Pilih Penyedia Jasa</option>
                                    @foreach (@$konsultans as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
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
                                <select name="ft_id" id="ft" class="form-control" required value="{{ old('ft') }}">
                                    <option selected disabled>Pilih ft</option>
                                </select>
                                @error('ft')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Penyedia Jasa</label>
                                <select name="kontraktor_id" id="kontraktor_id" class="form-control" required
                                    onchange="ubahOption1()" value="{{ old('kontraktor_id') }}">
                                    <option selected disabled>Pilih Penyedia Jasa</option>
                                    @foreach (@$kontraktors as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
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
                                <select name="gs_user_detail_id" id="gs" class="form-control" required
                                    value="{{ old('gs_user_detail_id') }}">
                                    <option selected disabled>Pilih gs</option>
                                </select>
                                @error('gs_user_detail_id')
                                <div class="invalid-feedback" style="display: block; color:red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @if(Request::segment(3) == 'edit')
                            <i style="color :red; font-size: 10px;">Biarkan jika tidak ada perubahan</i>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-responsive btn-primary"><i class="fa fa-paper-plane"></i>
                            Save</button>
                    </form>
            </div>

        </div>
    </div>

</div>
@endsection

@section('script')
<script>
    function ubahOption() {
        $('input[title="Tambah Ruas"]').prop('disabled',false);
        $('#myTable tbody tr').remove()

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
        text1 = '-- Pilih PPK --'
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
    $('#myTable').on('click', '.badge-danger', function () {
        $(this).closest('tr').remove();
    })
    $('p input[type="button"]').click(function () {
        var text = $('#ruas').val()
        if ($('#ruas').val() == '-- pilih ruas --') 
         return alert('Ruas Belum Dipilih')
        
        $('#myTable tbody').append(`
        <tr>
        <td><input type="text" class="form-control" name="id_ruas_jalan[]" value="${text}" autocomplete="off"></td>
        <td><input type="text" class="form-control" name="segmen_jalan[]" autocomplete="off" placeholder="Km Bdg... s/d Km...Bdg"></td>
        <td><input type="text" class="form-control"  name="lat_awal[]" autocomplete="off" placeholder="-7.123456" ></td>
        <td><input type="text" class="form-control"  name="long_awal[]" autocomplete="off" placeholder="107.12345" ></td>
        <td><input type="text" class="form-control" name="lat_akhir[]" autocomplete="off" placeholder="-7.12345" ></td>
        <td><input type="text" class="form-control" name="long_akhir[]" autocomplete="off" placeholder="107.12345" ></td>
        <td><button type="button" onclick="checkLok(this)" class="badge badge-sm badge-primary">Cek Lokasi</button></td>
        <td><button type="button" class="badge badge-sm badge-danger" style="background-color:red;">Delete</button></td>
        </tr>`)
    });
    function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}


    $(document).ready(function () {
        $('select').select2({
            theme: "classic"
        })


        var maxGroupRuas = 8;

        $(".addMoreRuas").click(function () {
            if ($('body').find('.fieldGroupRuas').length < maxGroupRuas) {
                var fieldHTML = '<div class="form-group row fieldGroupRuas">' + $(".fieldGroupCopyRuas").html() + '</div>';
                $('body').find('.fieldGroupRuas:last').after(fieldHTML);
            } else {
                alert('Maximum ' + maxGroupRuas + ' groups are allowed.');
            }
        });
       $('#nilai_kontrak').keyup( (e)=> { 
            let nilaiKontrak = $('#nilai_kontrak')
            nilaiKontrak.val(formatRupiah(nilaiKontrak.val(),"Rp"))
            
       });

        //remove fields group
        $("body").on("click", ".removeRuas", function () {
            $(this).parents(".fieldGroupRuas").remove();
        });

    });
    function PopupCenter(url, title, w, h) {
        var dualScreenLeft =
            window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop =
            window.screenTop != undefined ? window.screenTop : screen.top;

        width = window.innerWidth
            ? window.innerWidth
            : document.documentElement.clientWidth
                ? document.documentElement.clientWidth
                : screen.width;
        height = window.innerHeight
            ? window.innerHeight
            : document.documentElement.clientHeight
                ? document.documentElement.clientHeight
                : screen.height;

        var left = width / 2 - w / 2 + dualScreenLeft;
        var top = height / 2 - h / 2 + dualScreenTop;
        var newWindow = window.open(
            url,
            title,
            "scrollbars=no, width=" +
            w +
            ", height=" +
            h +
            ", top=" +
            top +
            ", left=" +
            left
        );

        // Puts focus on the newWindow
        if (window.focus) {
            newWindow.focus();
        }
    }
    function checkLok(e) {
        var parents = $(e).closest('tr')
        var row = parents.find('input'); 
        var latawal = row[2].value;
        var longawal = row[3].value;
        var latakhir = row[4].value;
        var longakhir = row[5].value;
        var url = "https://www.google.com/maps/dir/?api=1";
        var origin = "&origin=" + latawal + "," + longawal;
        var destination = "&destination=" + latakhir + "," + longakhir;
        var newUrl = new URL(url + origin + destination);
        PopupCenter(newUrl, "Google Maps", 1200, 650);


    }
    $('form').submit( (e) => {
        if ($('input[name^=lat_awal]').length === 0) 
        return;
        alert('kosong');
        e.preventDefault();
    });
    
</script>
@endsection