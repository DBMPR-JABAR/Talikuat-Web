@extends('layout.index') 
@section('title','User')
@section('header')
<style>
    
    table {
        margin-left: auto;
        margin-right: auto;
    }

   

    td {
        word-break: break-all;
        word-wrap: break-word;
    }
</style>
@endsection 

@section('page-header')
<div class="page-header">
    <h3 class="page-title"> Log Activities @if (Request::segment(2) == 'activity') {{ Auth::user()->name }} @endif</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Logs</li>
      </ol>
    </nav>
  </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 5%">No</th>
                            @if(Request::segment(2) == 'log')
                            <th >User</th>
                            @endif
                            <th >Aktivitas</th>
                            <th >Target</th>
                            <th >Tanggal & Waktu</th>
                            <th >Deskripsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $data=>$item)
                        
                        @php
                            $color = '';
                            if($item->status == 'error'){
                                $color = 'rgb(255, 233, 233)';
                            }else if($item->status == 'success'){
                                $color = 'rgb(220, 255, 220)';
                            }
                        @endphp
                        <tr style="background-color: {{ $color }}">
                            <td  class="text-center">{{++$data}}</td>
                            @if(Request::segment(2) == 'log')
                            <td>{{@$item->user_detail->user->email}}</td>
                            @endif
                            <td>{{$item->activity}}</td>
                            <td>{{$item->target}}</td>
                            <td>{{Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i')}}</td>
                            <td>{{$item->description}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection