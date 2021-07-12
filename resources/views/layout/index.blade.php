<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <title>Tali Kuat Bina Marga | @yield('title')</title>
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
            href="{{ asset('assets/images/favicon.png') }}"
        />
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
                            src="assets/images/logo.svg"
                            alt="Dinas Bina Marga Provinsi Jawa Barat"
                    /></a>
                    <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="/"
                        ><img
                            src="assets/images/logo-mini.svg"
                            alt="Dinas Bina Marga Provinsi Jawa Barat"
                    /></a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
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
                                        href="{{ route('masterkontraktor') }}"
                                        >Kontraktor</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="pages/ui-features/dropdowns.html"
                                        >Konsultan</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="pages/ui-features/typography.html"
                                        >PPK</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="pages/ui-features/typography.html"
                                        >Jenis Pekerjaan</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="pages/ui-features/typography.html"
                                        >Data Pengguna Aplikasi</a
                                    >
                                </li>
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
                                        href="pages/ui-features/buttons.html"
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
                    <li class="nav-item sidebar-actions">
                        <div class="nav-link">
                            <div class="mt-4">
                                <ul class="mt-4 pl-0">
                                    <li>Sign Out</li>
                                </ul>
                            </div>
                        </div>
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
                                                src="assets/images/faces/face4.jpg"
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
                                                src="assets/images/faces/face3.jpg"
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
                                                src="assets/images/faces/face2.jpg"
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
                                        src="assets/images/faces/face1.jpg"
                                    />
                                    <span class="profile-name"
                                        >Henry Klein</span
                                    >
                                </a>
                                <div
                                    class="dropdown-menu navbar-dropdown w-100"
                                    aria-labelledby="profileDropdown"
                                >
                                    <a class="dropdown-item" href="#">
                                        <i
                                            class="
                                                mdi mdi-face-profile
                                                mr-2
                                                text-success
                                            "
                                        ></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i
                                            class="
                                                mdi mdi-logout
                                                mr-2
                                                text-primary
                                            "
                                        ></i>
                                        Signout
                                    </a>
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

                <div class="main-panel">@yield('content')</div>
                <footer class="footer">
                    <div
                        class="
                            d-sm-flex
                            justify-content-center justify-content-sm-between
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
        @yield('script')
    </body>
</html>