@extends('layout.index') @section('title','Dashboard') @section('content')

<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <h3 class="mb-0">
            Hi, welcome back!
            <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block"
                >Your web analytics dashboard template.</span
            >
        </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 stretch-card grid-margin">
            <div class="row">
                <div
                    class="
                        col-md-6
                        stretch-card
                        grid-margin grid-margin-sm-0
                        pb-sm-3
                    "
                >
                    <div class="card bg-warning">
                        <div class="card-body px-3 py-4">
                            <div
                                class="
                                    d-flex
                                    justify-content-between
                                    align-items-start
                                "
                            >
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">
                                        Penyedia Jasa
                                    </p>
                                    <h2 class="text-white">
                                        {{ $penyedia }}
                                    </h2>
                                </div>
                                <i
                                    class="
                                        card-icon-indicator
                                        mdi mdi-basket
                                        bg-inverse-icon-warning
                                    "
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="
                        col-md-6
                        stretch-card
                        grid-margin grid-margin-sm-0
                        pb-sm-3
                    "
                >
                    <div class="card bg-danger">
                        <div class="card-body px-3 py-4">
                            <div
                                class="
                                    d-flex
                                    justify-content-between
                                    align-items-start
                                "
                            >
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">
                                        Konsultan Supervisi
                                    </p>
                                    <h2 class="text-white">{{ $konsultan }}</h2>
                                </div>
                                <i
                                    class="
                                        card-icon-indicator
                                        mdi mdi-cube-outline
                                        bg-inverse-icon-danger
                                    "
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="
                        col-md-6
                        stretch-card
                        grid-margin grid-margin-sm-0
                        pb-sm-3 pb-lg-0
                    "
                >
                    <div class="card bg-primary">
                        <div class="card-body px-3 py-4">
                            <div
                                class="
                                    d-flex
                                    justify-content-between
                                    align-items-start
                                "
                            >
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">PPK</p>
                                    <h2 class="text-white">
                                        {{ $ppk }}
                                    </h2>
                                </div>
                                <i
                                    class="
                                        card-icon-indicator
                                        mdi mdi-briefcase-outline
                                        bg-inverse-icon-primary
                                    "
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-card pb-sm-3 pb-lg-0">
                    <div class="card bg-success">
                        <div class="card-body px-3 py-4">
                            <div
                                class="
                                    d-flex
                                    justify-content-between
                                    align-items-start
                                "
                            >
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">
                                        Kegiatan / Paket
                                    </p>
                                    <h2 class="text-white">{{ $dataUmum }}</h2>
                                </div>
                                <i
                                    class="
                                        card-icon-indicator
                                        mdi mdi-account-circle
                                        bg-inverse-icon-success
                                    "
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
</div>
