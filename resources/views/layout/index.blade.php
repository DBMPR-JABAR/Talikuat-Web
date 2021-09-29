<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <title>@yield('title') | Tali Kuat Bina Marga</title>
        <link
            rel="stylesheet"
            href=" {{
                asset('assets/vendors/mdi/css/materialdesignicons.min.css')
            }}"
        />
        <link
            rel="stylesheet"
            href="{{
                asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')
            }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{
                asset('assets/vendors/font-awesome/css/font-awesome.min.css')
            }}"
        />
        <link
            rel="stylesheet"
            href="{{
                asset(
                    'assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css'
                )
            }}"
        />
        <link
            rel="stylesheet"
            href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css"
        />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
        <link
            rel="shortcut icon"
            href="{{ asset('assets/images/favicon.png') }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('assets/css/custom.css') }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('vendor/datatables.min.css') }}"
        />
        <style>
         
            @media only screen and (max-width: 646px) {
                .table-striped {
                    width: 40%;
                    font-size: 12px;
                    overflow-x:scroll;
                }
                #table-wrapper {
                position:relative;
                }
                #table-scroll {
                overflow:auto;  
                margin-top:20px;
                }
                #table-wrapper table {
                width:100%;
                }
                
                #table-wrapper table thead th .text {
                position:absolute;   
                top:-20px;
                z-index:2;
                width:35%;
                border:1px solid red;
                }
            
            }
        </style>
        @yield('header')
    </head>
    <body>
        <div class="container-scroller">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <div
                    class="
                        text-center
                        sidebar-brand-wrapper
                        d-flex
                        align-items-center
                        mb-5
                    "
                >
                    <a class="sidebar-brand brand-logo" href="/"
                        ><img
                            src="{{ asset('assets/images/logo.svg') }}"
                            alt="Dinas Bina Marga Provinsi Jawa Barat"
                    /></a>
                    <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="/"
                        ><img
                            src="{{ asset('assets/images/logo-mini.svg') }}"
                            alt="Dinas Bina Marga Provinsi Jawa Barat"
                    /></a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('admin.dashboard.index') }}"
                        >
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="mdi mdi-account-multiple menu-icon"></i>
                            <span class="menu-title">Manajemen User</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            data-toggle="collapse"
                            href="#ui-basic1"
                            aria-expanded="false"
                            aria-controls="ui-basic"
                        >
                            <i class="mdi mdi-account-multiple menu-icon"></i>
                            <span class="menu-title">Manajemen User</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic1">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('user.index') }}"
                                        >All Users</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('user_admin.index') }}"
                                        >Admin</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('masterppk.index') }}"
                                        >PPK</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('masterppk.index') }}"
                                        >MK</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{
                                            route('user.ft.index')
                                        }}"
                                        >Field Team</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('user.gs.index') }}"
                                        >General Superintendent</a
                                    >
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            data-toggle="collapse"
                            href="#ui-basic"
                            aria-expanded="false"
                            aria-controls="ui-basic"
                        >
                            <i class="mdi mdi-database menu-icon"></i>
                            <span class="menu-title">Data Utama</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{
                                            route('masterkontraktor.index')
                                        }}"
                                        >Kontraktor</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{
                                            route('masterkonsultan.index')
                                        }}"
                                        >Konsultan</a
                                    >
                                </li>
                                
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('masterjenispekerjaan.index') }}"
                                        >Jenis Pekerjaan</a
                                    >
                                </li>
                                {{-- <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="pages/ui-features/typography.html"
                                        >Data Pengguna Aplikasi</a
                                    >
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            data-toggle="collapse"
                            href="#inputData"
                            aria-expanded="false"
                            aria-controls="inputData"
                        >
                            <i
                                class="mdi mdi-format-list-bulleted menu-icon"
                            ></i>
                            <span class="menu-title">Input Data</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="inputData">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('dataumum.index') }}"
                                        >Data Umum</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="pages/ui-features/dropdowns.html"
                                        >Jadual Pekerjaan</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="pages/ui-features/typography.html"
                                        >Permintaan</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="pages/ui-features/typography.html"
                                        >Laporan Harian</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="pages/forms/basic_elements.html"
                        >
                            <i class="mdi mdi-cloud-download menu-icon"></i>
                            <span class="menu-title">Pusat Unduhan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('log.index') }}"
                        >
                            <i class="mdi mdi-alert-octagon menu-icon"></i>
                            <span class="menu-title">LOG</span>
                        </a>
                    </li>
                    <li class="nav-item sidebar-actions">
                        <a
                            class="nav-link mt-4"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >
                            <span class="menu-title">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="container-fluid page-body-wrapper">
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close mdi mdi-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div
                        class="sidebar-bg-options selected"
                        id="sidebar-default-theme"
                    >
                        <div
                            class="img-ss rounded-circle bg-light border mr-3"
                        ></div>
                        Default
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div
                            class="img-ss rounded-circle bg-dark border mr-3"
                        ></div>
                        Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles light"></div>
                        <div class="tiles dark"></div>
                    </div>
                </div>
                <nav
                    class="
                        navbar
                        col-lg-12 col-12
                        p-lg-0
                        fixed-top
                        d-flex
                        flex-row
                    "
                >
                    <div
                        class="
                            navbar-menu-wrapper
                            d-flex
                            align-items-stretch
                            justify-content-between
                        "
                    >
                        <a
                            class="
                                navbar-brand
                                brand-logo-mini
                                align-self-center
                                d-lg-none
                            "
                            href="index.html"
                            ><img src="assets/images/logo-mini.svg" alt="logo"
                        /></a>
                        <button
                            class="
                                navbar-toggler navbar-toggler
                                align-self-center
                                mr-2
                            "
                            type="button"
                            data-toggle="minimize"
                        >
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a
                                    class="
                                        nav-link
                                        count-indicator
                                        dropdown-toggle
                                    "
                                    id="notificationDropdown"
                                    href="#"
                                    data-toggle="dropdown"
                                >
                                    <i class="mdi mdi-bell-outline"></i>
                                    <span class="count count-varient1">7</span>
                                </a>
                                <div
                                    class="
                                        dropdown-menu
                                        navbar-dropdown navbar-dropdown-large
                                        preview-list
                                    "
                                    aria-labelledby="notificationDropdown"
                                >
                                    <h6 class="p-3 mb-0">Notifications</h6>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img
                                                src="{{
                                                    asset(
                                                        'assets/images/faces/face4.jpg'
                                                    )
                                                }}"
                                                alt=""
                                                class="profile-pic"
                                            />
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="mb-0">
                                                Dany Miles
                                                <span
                                                    class="
                                                        text-small text-muted
                                                    "
                                                    >commented on your
                                                    photo</span
                                                >
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img
                                                src="{{
                                                    asset(
                                                        'assets/images/faces/face3.jpg'
                                                    )
                                                }}"
                                                alt=""
                                                class="profile-pic"
                                            />
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="mb-0">
                                                James
                                                <span
                                                    class="
                                                        text-small text-muted
                                                    "
                                                    >posted a photo on your
                                                    wall</span
                                                >
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img
                                                src="{{
                                                    asset(
                                                        'assets/images/faces/face2.jpg'
                                                    )
                                                }}"
                                                alt=""
                                                class="profile-pic"
                                            />
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="mb-0">
                                                Alex
                                                <span
                                                    class="
                                                        text-small text-muted
                                                    "
                                                    >just mentioned you in his
                                                    post</span
                                                >
                                            </p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <p class="p-3 mb-0">View all activities</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-nav-right ml-lg-auto">
                            <li class="nav-item nav-profile dropdown border-0">
                                <a
                                    class="nav-link dropdown-toggle"
                                    id="profileDropdown"
                                    href="#"
                                    data-toggle="dropdown"
                                >
                                    <img
                                        class="nav-profile-img mr-2"
                                        alt=""
                                        src="{{
                                            asset(
                                                'assets/images/faces/face1.jpg'
                                            )
                                        }}"
                                    />
                                    <span
                                        class="profile-name"
                                        >{{ auth()->user()->name }}</span
                                    >
                                </a>
                                <div
                                    class="dropdown-menu navbar-dropdown w-100"
                                    aria-labelledby="profileDropdown"
                                >
                                    <a
                                        class="dropdown-item"
                                        href="{{ url('admin/profile', Auth::user()->id) }}"
                                    >
                                        <i
                                            class="
                                                mdi mdi-face-profile
                                                mr-2
                                                text-success
                                            "
                                        ></i>
                                        Akun & Profil
                                    </a>
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('log.user.index',Auth::user()->user_detail->id) }}"
                                    >
                                        <i
                                            class="
                                                mdi mdi-alert-octagon
                                                mr-2
                                                text-success
                                            "
                                        ></i>
                                        Log Activity
                                    </a>
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    >
                                        <i
                                            class="
                                                mdi mdi-logout
                                                mr-2
                                                text-primary
                                            "
                                        ></i>
                                        Sign Out
                                    </a>
                                    <form
                                        id="logout-form"
                                        action="{{ route('logout') }}"
                                        method="POST"
                                        style="display: none"
                                    >
                                    {{-- @php
                                        App\Models\Backend\Log::create(['activity' => 'Logout','user_detail_id' => Auth::user()->user_detail->id, 'description' => 'User ' . Auth::user()->name . ' Logged Out From Web', 'ip_address' => request()->ip()]);
                                    @endphp --}}
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                        <button
                            class="
                                navbar-toggler navbar-toggler-right
                                d-lg-none
                                align-self-center
                            "
                            type="button"
                            data-toggle="offcanvas"
                        >
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </nav>

                <div class="main-panel">
                    <div  style="background: #f2f2f2">
                        @include('flashalert.index')

                    </div>
                    <div class="content-wrapper pb-0">
                        @yield('page-header') @yield('content')
                    </div>
                    <footer class="footer">
                        <div
                            class="
                                d-sm-flex
                                justify-content-center
                                justify-content-sm-between
                            "
                        >
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
                                class="
                                    float-none float-sm-right
                                    d-block
                                    mt-1 mt-sm-0
                                    text-center
                                "
                            >
                                Free
                                <a
                                    href="https://www.bootstrapdash.com/"
                                    target="_blank"
                                    >Bootstrap dashboard template</a
                                >
                                from Bootstrapdash.com</span
                            >
                        </div>
                    </footer>
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{
                asset('assets/vendors/js/vendor.bundle.base.js')
            }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{
                asset('assets/vendors/chart.js/Chart.min.js')
            }}"></script>
        <script src="{{
                asset(
                    'assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js'
                )
            }}"></script>
        <script src="{{
                asset('assets/vendors/flot/jquery.flot.js')
            }}"></script>
        <script src="{{
                asset('assets/vendors/flot/jquery.flot.resize.js')
            }}"></script>
        <script src="{{
                asset('assets/vendors/flot/jquery.flot.categories.js')
            }}"></script>
        <script src="{{
                asset('assets/vendors/flot/jquery.flot.fillbetween.js')
            }}"></script>
        <script src="{{
                asset('assets/vendors/flot/jquery.flot.stack.js')
            }}"></script>
        <script src="{{
                asset('assets/vendors/flot/jquery.flot.pie.js')
            }}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
        <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('assets/js/misc.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{ asset('assets/js/dashboard.js') }}"></script>
        <!-- End custom js for this page -->
        <script src="{{ asset('vendor/datatables.min.js') }}"></script>
        <script>
            $('.drop-down-show-hide').hide();
        
            $('#dropDown').change(function () {
                $('.drop-down-show-hide').hide()    
                $('#' + this.value).show();
        
            });
        </script>
        @yield('script')
        <script>
            function setDataSelect(id, url, id_select, text, valueOption, textOption) {
            $.ajax({
                url: url,
                method: "get",
                dataType: "JSON",
                data: {
                    id: id,
                },
                complete: function(result) {
                    console.log(result.responseJSON);
                    $(id_select).empty(); // remove old options
                    $(id_select).append($("<option disable></option>").text(text));

                    result.responseJSON.forEach(function(item) {
                        $(id_select).append(
                            $("<option></option>")
                            .attr("value", item[valueOption])
                            .text(item[textOption])
                        );
                    });
                },
            });
        }
        </script>
    </body>
</html>
