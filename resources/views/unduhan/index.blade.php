@extends('layout.index') @section('title','Pusat Unduhan') 
@section('header')
@endsection @section('page-header')
<div class="page-header">
    <h3 class="page-title">Pusat Unduhan</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">     
            <li class="breadcrumb-item active" aria-current="page">
                <a href="/talikuat/public/admin/dashboard">Dashboard</a> / Pusat Unduhan
            </li>
        </ol>
    </nav>
</div>
@endsection @section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pusat Unduhan</h4>
               
                <table
                    class="display responsive"
                    style="width: 100%;"
                    id="dataunduhan"
                >
                    <thead class="table-dark">
                        <tr>
                            
                            <th>No</th>
                            <th>Unor</th>
                            <th>Nomor Kontrak</th>                            
                            <th>Nama Paket</th>
                            <th style="width: 15%">Aksi Unduh Berkas</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no => $item)
                        <tr>
                            <td style="width: 10px">{{ +(+$no) + 1 }}</td>
                            <td>{{ $item->unor }}</td>
                            <td>{{ $item->no_kontrak }}</td>
                            <td>{{ $item->nm_paket }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary" style="width: 100px !important; font-size: 11px !important;" data-toggle="modal" data-target="#exampleModal" data-whatever="Detail Kontrak : {{ $item->nm_paket }}">Kontrak</button> 
                                <button type="button" class="btn btn-outline-danger" style="width: 100px !important; font-size: 11px !important;" data-toggle="modal" data-target="#exampleModal" data-whatever="Detail Addendum : {{ $item->nm_paket }}">Addendum</button>  
                            </td>
                        </tr>@endforeach 

                    </tbody>
                </table>
        </div>
    </div>
    </div>
</div>
  
  <!-- Modal -->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-active">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">Nama Berkas</th>
                  <th scope="col" class="text-center">Unduh Berkas</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row">Daftar Kuantitas dan Harga (DKH)</td>
                  <td scope="row" class="text-center"><a href="">Unduh</a></td>
                </tr>
                <tr>
                    <td scope="row">Perjanjian Kontrak</td>
                    <td scope="row" class="text-center"><a href="">Unduh</a></td>
                </tr>
                <tr>
                    <td scope="row">SPMK</td>
                    <td scope="row" class="text-center"><a href="">Unduh</a></td>
                </tr>
                <tr>
                    <td scope="row">Syarat Umum</td>
                    <td scope="row" class="text-center"><a href="">Unduh</a></td>
                </tr>
                <tr>
                    <td scope="row">Syarat Khusus</td>
                    <td scope="row" class="text-center"><a href="">Unduh</a></td>
                </tr>
                <tr>
                    <td scope="row">Jadual Pelaksanaan Pekerjaan</td>
                    <td scope="row" class="text-center"><a href="">Unduh</a></td>
                </tr>
                <tr>
                    <td scope="row">Gambar Rencana</td>
                    <td scope="row" class="text-center"><a href="">Unduh</a></td>
                </tr>
                <tr>
                    <td scope="row">SPPBJ</td>
                    <td scope="row" class="text-center"><a href="">Unduh</a></td>
                </tr>
                <tr>
                    <td scope="row">SPL</td>
                    <td scope="row" class="text-center"><a href="">Unduh</a></td>
                </tr>
                <tr>
                    <td scope="row">Spesifikasi Umum</td>
                    <td scope="row" class="text-center"><a href="">Unduh</a></td>
                </tr>
                <tr>
                    <td scope="row">Jaminan-Jaminan</td>
                    <td scope="row" class="text-center"><a href="">Unduh</a></td>
                </tr>
                <tr>
                    <td scope="row">BAPL</td>
                    <td scope="row" class="text-center"><a href="">Unduh</a></td>
                </tr>
            </table>

            {{-- <div class="row">
                <div class="col">
                    Jadual Kontrak
                </div>
                <div class="col">
                    <a href="">Unduh
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Dokumen SPK
                </div>
                <div class="col">
                    <a href="">Unduh</a>
                </div>
            </div> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="button" class="btn btn-info">Unduh Semua</button>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(()=>{
        $('#dataunduhan').DataTable({
            responsive : true,
            columns: [
                { responsivePriority: 3 },
                { responsivePriority: 4 },
                { responsivePriority: 5 },
                { responsivePriority: 1 },
                { responsivePriority: 2 }
            ]
        });
    })

    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>
@endsection