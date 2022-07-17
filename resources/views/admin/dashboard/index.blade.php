@extends('layout.index') @section('title','Dashboard') @section('header')
<link
    rel="stylesheet"
    href="{{
        asset(
            'assets/vendors/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css'
        )
    }}"
/>
<link
    rel="stylesheet"
    href="{{
        asset(
            'assets/vendors/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css'
        )
    }}"
/>
<style>
    iframe {
        width: 100%;
        height: 500px;
    }
</style>
@endsection @section('content')

<div class="page-header flex-wrap">
    <h3 class="mb-0">
        Hi, welcome back! {{ auth()->user()->name }}
        <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block"></span>
    </h3>
</div>
<div class="row">
    <div class="col-lg-3 grid-margin stretch-card">
        <div class="row">
            <div
                class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3"
            >
                <div class="card bg-warning">
                    <a
                        href="{{ route('masterkontraktor.index') }}"
                        style="text-decoration: none"
                    >
                        <div class="card-body px-3 py-4">
                            <div
                                class="d-flex justify-content-between align-items-start"
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
                                    class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-warning"
                                ></i>
                            </div></div
                    ></a>
                </div>
            </div>
            <div
                class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3"
            >
                <div class="card bg-danger">
                    <a
                        href="{{ route('masterkonsultan.index') }}"
                        style="text-decoration: none"
                    >
                        <div class="card-body px-3 py-4">
                            <div
                                class="d-flex justify-content-between align-items-start"
                            >
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">
                                        Konsultan Supervisi
                                    </p>
                                    <h2 class="text-white">{{ $konsultan }}</h2>
                                </div>
                                <i
                                    class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-danger"
                                ></i>
                            </div></div
                    ></a>
                </div>
            </div>
            <div
                class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3"
            >
                <div class="card bg-primary">
                    <a
                        href="{{ route('masterppk.index') }}"
                        style="text-decoration: none"
                    >
                        <div class="card-body px-3 py-4">
                            <div
                                class="d-flex justify-content-between align-items-start"
                            >
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">PPK</p>
                                    <h2 class="text-white">{{ $ppk }}</h2>
                                </div>
                                <i
                                    class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-primary"
                                ></i>
                            </div></div
                    ></a>
                </div>
            </div>
            <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
                <div class="card bg-success">
                    <a
                        href="{{ route('dataumum.index') }}"
                        style="text-decoration: none"
                    >
                        <div class="card-body px-3 py-4">
                            <div
                                class="d-flex justify-content-between align-items-start"
                            >
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">
                                        Kegiatan Paket
                                    </p>
                                    <h2 class="text-white">{{ $dataUmum }}</h2>
                                </div>
                                <i
                                    class="card-icon-indicator bg-inverse-icon-success"
                                ></i>
                            </div></div
                    ></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="owl-carousel owl-theme">
                    @foreach ($data as $dataUmumId)
                    <div class="item border p-2">
                        <iframe
                            src="{{ route('curva.iframe', $dataUmumId->id) }}"
                            frameborder="0"
                        ></iframe>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection @section('script')
<script src="{{
        asset('assets/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.min.js')
    }}"></script>
<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            margin: 30,
            nav: true,
        });
    });
</script>
@endsection
