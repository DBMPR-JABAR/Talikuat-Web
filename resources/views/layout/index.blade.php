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
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
            integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
            crossorigin="anonymous"
        />
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
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
        <link
            rel="shortcut icon"
            href="{{ asset('assets/images/favicon.ico') }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('assets/css/custom.css') }}"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css"
        />
        <style>
            @media only screen and (max-width: 646px) {
                .table-striped {
                    width: 40%;
                    font-size: 12px;
                    overflow-x: scroll;
                }
                #table-wrapper {
                    position: relative;
                }
                #table-scroll {
                    overflow: auto;
                    margin-top: 20px;
                }
                #table-wrapper table {
                    width: 100%;
                }

                #table-wrapper table thead th .text {
                    position: absolute;
                    top: -20px;
                    z-index: 2;
                    width: 35%;
                    border: 1px solid red;
                }
            }
        </style>

        @yield('header')
    </head>
    <body>
        <div class="container-scroller">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <div
                    class="text-center sidebar-brand-wrapper d-flex align-items-center mb-5"
                >
                    <a class="sidebar-brand brand-logo" href="/"
                        ><img
                            src="{{
                                asset('assets/images/logo_tali_strong.png')
                            }}"
                            style="width: 120px"
                            class="img-fluid"
                            alt="Dinas Bina Marga Provinsi Jawa Barat"
                    /></a>
                    <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="/"
                        ><img
                            src="{{
                                asset('assets/images/logo_tali_strong.png')
                            }}"
                            style="object-fit: cover"
                            class="img-fluid"
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
                    {{--
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="mdi mdi-account-multiple menu-icon"></i>
                            <span class="menu-title">Manajemen User</span>
                        </a>
                    </li>
                    --}}
                    @canany(['viewAllUser','viewUserAdmin','viewUserPpk','viewUserMk','viewUserFt','viewUserGs','viewRole',
                    'viewPermission'], Auth::user())
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
                                @can('viewAllUser',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('user.index') }}"
                                        >All Users</a
                                    >
                                </li>
                                @endcan @can('viewUserAdmin',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('user_admin.index') }}"
                                        >Admin</a
                                    >
                                </li>
                                @endcan @can('viewUserPpk',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('masterppk.index') }}"
                                        >PPK</a
                                    >
                                </li>
                                @endcan @can('viewUserMk',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('user_mk.index') }}"
                                        >MK</a
                                    >
                                </li>
                                @endcan @can('viewUserDirlap',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('user_dirlap.index') }}"
                                        >DIRLAP</a
                                    >
                                </li>
                                @endcan @can('viewUserFt',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('user.ft.index') }}"
                                        >Field Team</a
                                    >
                                </li>
                                @endcan @can('viewUserGs',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('user.gs.index') }}"
                                        >General Superintendent</a
                                    >
                                </li>
                                @endcan @canany(['viewRole', 'viewPermission'],
                                Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('role.index') }}"
                                        >Role & Permission</a
                                    >
                                </li>
                                @endcanany
                            </ul>
                        </div>
                    </li>
                    @endcanany
                    @canany(['viewKontraktor','viewKonsultan','viewMk','viewJenisPekerjaan'],
                    Auth::user())
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
                                @can('viewKontraktor',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{
                                            route('masterkontraktor.index')
                                        }}"
                                        >Kontraktor</a
                                    >
                                </li>
                                @endcan @can('viewKonsultan',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{
                                            route('masterkonsultan.index')
                                        }}"
                                        >Konsultan</a
                                    >
                                </li>
                                @endcan @can('viewMk',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('mastermk.index') }}"
                                        >Manajemen Konstruksi</a
                                    >
                                </li>
                                @endcan @can('viewJenisPekerjaan',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{
                                            route('masterjenispekerjaan.index')
                                        }}"
                                        >Jenis Pekerjaan</a
                                    >
                                </li>
                                @endcan {{--
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="pages/ui-features/typography.html"
                                        >Data Pengguna Aplikasi</a
                                    >
                                </li>
                                --}}
                            </ul>
                        </div>
                    </li>
                    @endcanany
                    @canany(['viewDataUmum','viewJadwal','viewPermintaan','viewLaporanMingguan'],
                    Auth::user())
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
                                @can('viewDataUmum',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('dataumum.index') }}"
                                        >Data Umum</a
                                    >
                                </li>
                                @endcan @can('viewJadwal',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('jadual.index') }}"
                                        >Jadwal Pekerjaan</a
                                    >
                                </li>
                                @endcan @can('viewPermintaan',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('request.index') }}"
                                        >Permintaan</a
                                    >
                                </li>
                                @endcan @can('viewLaporanMingguan',Auth::user())
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{
                                            route('laporan-mingguan.index')
                                        }}"
                                        >Laporan Mingguan</a
                                    >
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    @endcanany @can('viewPusatUnduhan',Auth::user()) @endcan
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('pusat_unduhan.index') }}"
                        >
                            <i class="mdi mdi-cloud-download menu-icon"></i>
                            <span class="menu-title">Pusat Unduhan</span>
                        </a>
                    </li>
                    @can('viewLog',Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('log.index') }}">
                            <i class="mdi mdi-alert-octagon menu-icon"></i>
                            <span class="menu-title">LOG</span>
                        </a>
                    </li>
                    @endcan

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
                    class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row"
                >
                    <div
                        class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between"
                    >
                        <!-- <a
                            class="navbar-brand brand-logo-mini align-self-center d-lg-none"
                            href="index.html"
                            ><img
                                src="{{
                                    asset('assets/images/logo_tali_strong.png')
                                }}"
                                width="100"
                                class="img-fluid"
                                alt="logo"
                        /></a> -->
                        <button
                            class="navbar-toggler navbar-toggler align-self-center mr-2"
                            type="button"
                            data-toggle="minimize"
                        >
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <!-- <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link count-indicator dropdown-toggle"
                                    id="notificationDropdown"
                                    href="#"
                                    data-toggle="dropdown"
                                >
                                    <i class="mdi mdi-bell-outline"></i>
                                    <span class="count count-varient1">7</span>
                                </a>
                                <div
                                    class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list"
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
                                                    class="text-small text-muted"
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
                                                    class="text-small text-muted"
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
                                                    class="text-small text-muted"
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
                        </ul> -->
                        <ul class="navbar-nav navbar-nav-right ml-lg-auto">
                            <li class="nav-item nav-profile dropdown border-0">
                                <a
                                    class="nav-link dropdown-toggle"
                                    id="profileDropdown"
                                    href="#"
                                    data-toggle="dropdown"
                                >
                                    <!-- <img
                                        class="nav-profile-img mr-2"
                                        alt=""
                                        src="{{
                                            asset(
                                                'assets/images/faces/face1.jpg'
                                            )
                                        }}"
                                    /> -->
                                    <span
                                        class="profile-name p-3"
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
                                            class="mdi mdi-face-profile mr-2 text-success"
                                        ></i>
                                        Akun & Profil
                                    </a>
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('log.user.index',Auth::user()->user_detail->id) }}"
                                    >
                                        <i
                                            class="mdi mdi-alert-octagon mr-2 text-success"
                                        ></i>
                                        Log Activity
                                    </a>
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    >
                                        <i
                                            class="mdi mdi-logout mr-2 text-primary"
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
                            class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
                            type="button"
                            data-toggle="offcanvas"
                        >
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </nav>

                <div class="main-panel">
                    <div style="background: #f2f2f2">
                        @include('flashalert.index')
                    </div>
                    <div class="content-wrapper mt-4">
                        @yield('page-header') @yield('content')
                    </div>
                    <!-- <footer class="footer">
                        <div
                            class="d-sm-flex justify-content-center justify-content-sm-between"
                        >
                            <span
                                class="text-muted d-block text-center text-sm-left d-sm-inline-block"
                                >Copyright © bootstrapdash.com 2020</span
                            >
                            <span
                                class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"
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
                    </footer> -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <!-- <script
            src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
            crossorigin="anonymous"
        ></script> -->
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
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->

        <!-- End custom js for this page -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $(".select2").select2({
                    theme: "classic",
                    width: "resolve",
                });
                $("#jabatanTenagaAhli").select2("destroy");
                $(".drop-down-show-hide").hide();
                $("#dropDown").change(function () {
                    $(".drop-down-show-hide").hide();
                    $("#" + this.value).show();
                });
            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        <script>
            function setDataSelect(
                id,
                url,
                id_select,
                text,
                valueOption,
                textOption,
                selectedId,
                selectedText
            ) {
                $.ajax({
                    url: url,
                    method: "get",
                    dataType: "JSON",
                    data: {
                        id: id,
                    },
                    complete: function (result) {
                        $(id_select).empty();
                        result.responseJSON.forEach((item) => {
                            if (selectedId == item[valueOption]) {
                                console.log(selectedId, item[valueOption]);
                                $(id_select).append(
                                    $("<option></option>")
                                        .attr("value", item[valueOption])
                                        .attr("selected")
                                        .text(item[textOption])
                                );
                            } else {
                                $(id_select).append(
                                    $("<option></option>")
                                        .attr("value", item[valueOption])
                                        .text(item[textOption])
                                );
                            }
                        });
                    },
                });
            }
        </script>

        @yield('script')
    </body>
</html>
