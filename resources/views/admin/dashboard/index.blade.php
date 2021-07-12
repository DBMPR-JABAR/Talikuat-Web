@extends('layout.index') 
@section('title','Dashboard') 
@section('content')

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
        <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
            <div class="row">
                <div
                    class="
                        col-xl-12 col-md-6
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
                                        mdi mdi-account-circle
                                        bg-inverse-icon-warning
                                    "
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="
                        col-xl-12 col-md-6
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
                                        mdi mdi-account-circle
                                        bg-inverse-icon-danger
                                    "
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="
                        col-xl-12 col-md-6
                        stretch-card
                        grid-margin grid-margin-sm-0
                        pb-sm-3 pb-lg-0 pb-xl-3
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
                                    <h2 class="text-white">{{ $ppk }}</h2>
                                </div>
                                <i
                                    class="
                                        card-icon-indicator
                                        mdi mdi-account-circle
                                        bg-inverse-icon-primary
                                    "
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
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
                                        Kegiatan Paket
                                    </p>
                                    <h2 class="text-white">{{ $dataUmum }}</h2>
                                </div>
                                <i
                                    class="
                                        card-icon-indicator
                                        bg-inverse-icon-success
                                    "
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 grid-margin stretch-card">
            <div class="card card-calender">
                <div class="card-body">
                    <div class="row pt-4">
                        <div class="col-sm-6">
                            <h1 class="text-white">10:16PM</h1>
                            <h5 class="text-white">Monday 25 October, 2016</h5>
                            <h5 class="text-white pt-2 m-0">
                                Precipitation:50%
                            </h5>
                            <h5 class="text-white m-0">Humidity:23%</h5>
                            <h5 class="text-white m-0">Wind:13 km/h</h5>
                        </div>
                        <div class="col-sm-6 text-sm-right pt-3 pt-sm-0">
                            <h3 class="text-white">Clear Sky</h3>
                            <p class="text-white m-0">London, UK</p>
                            <h3 class="text-white m-0">21°C</h3>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-12">
                            <ul class="d-flex pl-0 overflow-auto">
                                <li
                                    class="
                                        weakly-weather-item
                                        text-white
                                        font-weight-medium
                                        text-center
                                        active
                                    "
                                >
                                    <p class="mb-0">TODAY</p>
                                    <i class="mdi mdi-weather-cloudy"></i>
                                    <p class="mb-0">
                                        21<span class="symbol">°c</span>
                                    </p>
                                </li>
                                <li
                                    class="
                                        weakly-weather-item
                                        text-white
                                        font-weight-medium
                                        text-center
                                    "
                                >
                                    <p class="mb-0">MON</p>
                                    <i class="mdi mdi-weather-hail"></i>
                                    <p class="mb-0">
                                        21<span class="symbol">°c</span>
                                    </p>
                                </li>
                                <li
                                    class="
                                        weakly-weather-item
                                        text-white
                                        font-weight-medium
                                        text-center
                                    "
                                >
                                    <p class="mb-0">TUE</p>
                                    <i class="mdi mdi-weather-cloudy"></i>
                                    <p class="mb-0">
                                        21<span class="symbol">°c</span>
                                    </p>
                                </li>
                                <li
                                    class="
                                        weakly-weather-item
                                        text-white
                                        font-weight-medium
                                        text-center
                                    "
                                >
                                    <p class="mb-0">WED</p>
                                    <i class="mdi mdi-weather-fog"></i>
                                    <p class="mb-0">
                                        21<span class="symbol">°c</span>
                                    </p>
                                </li>
                                <li
                                    class="
                                        weakly-weather-item
                                        text-white
                                        font-weight-medium
                                        text-center
                                    "
                                >
                                    <p class="mb-0">THU</p>
                                    <i class="mdi mdi-weather-hail"></i>
                                    <p class="mb-0">
                                        21<span class="symbol">°c</span>
                                    </p>
                                </li>
                                <li
                                    class="
                                        weakly-weather-item
                                        text-white
                                        font-weight-medium
                                        text-center
                                    "
                                >
                                    <p class="mb-0">FRI</p>
                                    <i class="mdi mdi-weather-cloudy"></i>
                                    <p class="mb-0">
                                        21<span class="symbol">°c</span>
                                    </p>
                                </li>
                                <li
                                    class="
                                        weakly-weather-item
                                        text-white
                                        font-weight-medium
                                        text-center
                                    "
                                >
                                    <p class="mb-0">SAT</p>
                                    <i class="mdi mdi-weather-hail"></i>
                                    <p class="mb-0">
                                        21<span class="symbol">°c</span>
                                    </p>
                                </li>
                                <li
                                    class="
                                        weakly-weather-item
                                        text-white
                                        font-weight-medium
                                        text-center
                                    "
                                >
                                    <p class="mb-0">SUN</p>
                                    <i class="mdi mdi-weather-cloudy"></i>
                                    <p class="mb-0">
                                        21<span class="symbol">°c</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div
            id="carouselExampleFade"
            class="carousel slide carousel-fade"
            data-bs-ride="carousel"
        >
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img
                        src="{{ asset('assets/images/carousel/banner_1.jpg') }}"
                        class="d-block w-100"
                        alt=""
                    />
                </div>
                <div class="carousel-item">
                    <img
                        src="{{ asset('assets/images/carousel/banner_1.jpg') }}"
                        class="d-block w-100"
                        alt=""
                    />
                </div>
                <div class="carousel-item">
                    <img
                        src="{{ asset('assets/images/carousel/banner_1.jpg') }}"
                        class="d-block w-100"
                        alt=""
                    />
                </div>
            </div>
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleFade"
                data-bs-slide="prev"
            >
                <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleFade"
                data-bs-slide="next"
            >
                <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span
            class="
                text-muted
                d-block
                text-center text-sm-left
                d-sm-inline-block
            "
            >Copyright © bootstrapdash.com 2020</span
        >
        <span
            class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"
        >
            Free
            <a href="https://www.bootstrapdash.com/" target="_blank"
                >Bootstrap dashboard template</a
            >
            from Bootstrapdash.com</span
        >
    </div>
</footer>
@endsection
