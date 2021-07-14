@extends('layout.index') 
@section('title','User')
@section('header')
@endsection 

@section('page-header')
<div class="page-header">
    <h3 class="page-title"> Manajemen User </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
      </ol>
    </nav>
  </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Users</h4>
                <a data-toggle="modal" href="#addModal" class="btn btn-mat btn-primary mb-3"><i class="mdi mdi-account-plus menu-icon"></i> Tambah</a>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 5%"> No </th>
                            <th class="text-center"> Name </th>
                            {{-- <th class="text-center"> Progress </th> --}}
                            <th class="text-center"> NIK </th>
                            <th class="text-center"> NIP </th>
                            <th class="text-center"> Email Verified </th>
                            <th class="text-center"> Account Verified </th>
                            <th class="text-center"> Action </th>

                        </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($data as $data=>$item)
                        
                        <tr>
                            {{-- <td class="py-1"><img src="../../../assets/images/faces-clipart/pic-1.png" alt="image"></td> --}}
                            <td class="text-center">{{ ++$data}}</td>
                            <td>{{ $item->user->name }} </td>
                            {{-- <td>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            </td> --}}
                            <td> {{ $item->user->profile->nik }} </td>
                            <td> {{ $item->user->profile->nip }} </td>
                            <td class="text-center"> 
                                @if($item->email_verified_at)
                                <button class="btn btn-sm btn-success"><i class="mdi mdi-check-all menu-icon"></i></button>
                                @else
                                <button class="btn btn-sm btn-danger"><i class="mdi mdi-close menu-icon"></i></button>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($item->account_verified_at)
                                <button class="btn btn-sm btn-success"><i class="mdi mdi-check-all menu-icon"></i></button>
                                @else
                                <button class="btn btn-sm btn-danger"><i class="mdi mdi-close menu-icon"></i></button>
                                @endif
                            </td>

                            <td class="text-center"> 
                                <a type='button' href=""  class='btn btn-sm btn-success waves-effect waves-light'><i class="mdi mdi-account-search menu-icon"></i></a>
                                <a type='button' href=''  class='btn btn-sm btn-warning waves-effect waves-light'><i class="mdi mdi-table-edit menu-icon"></i></a>
                                <a type='button' href='#delModal' data-toggle='modal' data-id='' class='btn btn-sm btn-danger waves-effect waves-light'><i class="mdi mdi-delete menu-icon"></i></a><br/>
                            </td>

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