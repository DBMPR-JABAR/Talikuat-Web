<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Talikuat Bima Jabar</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--===============================================================================================-->
        <!--===============================================================================================-->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }} "
        />
        <!--===============================================================================================-->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{
                asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')
            }}"
        />
        <!--===============================================================================================-->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('vendor/animate/animate.css') }}"
        />
        <!--===============================================================================================-->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}"
        />
        <!--===============================================================================================-->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('vendor/select2/select2.min.css') }}"
        />
        <!--===============================================================================================-->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('css/util.css') }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('css/main.css') }}"
        />
        <!--===============================================================================================-->
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img
                            src="{{
                                asset('assets/images/logo-jawa_barat.png')
                            }}"
                            alt="IMG"
                        />
                    </div>
                    <div class="login-form">
                        <form
                            class="login100-form validate-form"
                            action=""
                            method="POST"
                        >
                            <span class="login100-form-title">
                                Talikuat Bima Jabar
                            </span>
                            <div
                                class="wrap-input100 validate-input"
                                data-validate="NIP | NIK Tidak Boleh Kosong"
                            >
                                <input
                                    class="input100"
                                    type="text"
                                    name="username"
                                    placeholder="NIP | NIK"
                                />
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i
                                        class="fa fa-id-card"
                                        aria-hidden="true"
                                    ></i>
                                </span>
                            </div>

                            <div
                                class="wrap-input100 validate-input"
                                data-validate="Password Tidak Boleh Kosong"
                            >
                                <input
                                    class="input100"
                                    type="password"
                                    name="password"
                                    placeholder="Password"
                                />
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i
                                        class="fa fa-lock"
                                        aria-hidden="true"
                                    ></i>
                                </span>
                            </div>
                            <div class="container-login100-form-btn">
                                <button
                                    class="login100-form-btn"
                                    type="submit"
                                    name="submit"
                                >
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--===============================================================================================-->
        <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{
                asset('vendor/bootstrap/js/bootstrap.min.js')
            }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/tilt/tilt.jquery.min.js') }}"></script>
        <script>
            $(".js-tilt").tilt({
                scale: 1.1,
            });
        </script>
        <!--===============================================================================================-->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>
