<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Form Registrasi</title>
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"
        />
        <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}" />
    </head>
    <body>
        @include('flashalert.index')
        <div class="container mt-5">
            <form action="" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">Data User</div>
                    <div class="card-body">
                        <div class="mb-1 row">
                            <label
                                for="staticEmail"
                                class="col-sm-2 col-form-label"
                                >Nama Depan :</label
                            >
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    name="nm_dpn"
                                    class="form-control"
                                    placeholder="Nama Depan"
                                    required
                                    value="{{ old('nm_dpn') }}"
                                />
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label
                                for="staticEmail"
                                class="col-sm-2 col-form-label"
                                >Nama Belakang :</label
                            >
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nm_blkg"
                                    placeholder="Nama Belakang"
                                    required
                                    value="{{ old('nm_blkg') }}"
                                />
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label
                                for="staticEmail"
                                class="col-sm-2 col-form-label"
                                >Alamat :</label
                            >
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    name="alamat_user"
                                    class="form-control"
                                    placeholder="Masukan Alamat"
                                    required
                                    value="{{ old('alamat_user') }}"
                                />
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label
                                for="staticEmail"
                                class="col-sm-2 col-form-label"
                                >No. Telp :</label
                            >
                            <div class="col-sm-10">
                                <input
                                    type="tel"
                                    maxlength="12"
                                    class="form-control"
                                    id="tlp"
                                    placeholder="08221XXXXXXX"
                                    name="tlp_user"
                                    required
                                    value="{{ old('tlp_user') }}"
                                />
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label
                                for="staticEmail"
                                class="col-sm-2 col-form-label"
                                >NIP / NIK :</label
                            >
                            <div class="col-sm-10">
                                @if(Session::get('nik'))
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nik"
                                    placeholder="327051XXXXXX"
                                    name="nik"
                                    required
                                    value="{{ old('nik') }}"
                                    oninput="removeErr('#nik','#errNik')"
                                />
                                <span class="err-msg text-danger" id="errNik"
                                    >NIP/NIK Sudah Terdaftar</span
                                >
                                @else
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nik"
                                    placeholder="327051XXXXXX"
                                    name="nik"
                                    required
                                />
                                @endif
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label
                                for="staticEmail"
                                class="col-sm-2 col-form-label"
                                >Email</label
                            >
                            <div class="col-sm-10">
                                @if(Session::get('email'))
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="example@example.com"
                                    name="email"
                                    required
                                    id="email"
                                    value="{{ old('email') }}"
                                    oninput="removeErr('#email','#errEmail')"
                                />
                                <span class="err-msg text-danger" id="errEmail"
                                    >Email Sudah Terdaftar</span
                                >
                                @else
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="example@example.com"
                                    name="email"
                                    required
                                />
                                @endif
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label
                                for="staticEmail"
                                class="col-sm-2 col-form-label"
                                >Jabatan :</label
                            >
                            <div class="col-sm-10">
                                <select
                                    name="jabatan"
                                    class="form-control"
                                    required
                                    value="{{ old('jabatan') }}"
                                >
                                    <option selected></option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="DIREKTUR">DIREKTUR</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Data Perusahaan</div>
                    <div class="card-body">
                        <div class="mb-1 row">
                            <label for="jenis" class="col-sm-2 col-form-label"
                                >Jenis Perusahaan</label
                            >
                            <div class="col-sm-10">
                                <select
                                    name="role"
                                    id="jenis"
                                    class="form-control"
                                    onchange="render(this.value)"
                                    required
                                    value="{{ old('jenis') }}"
                                >
                                    <option selected>Jenis Perusahaan</option>
                                    <option value="ADMIN-UPTD">
                                        ADMIN-UPTD
                                    </option>
                                    <option value="PPK">PPK</option>
                                    <option value="KONSULTAN">KONSULTAN</option>
                                    <option value="KONTRAKTOR">
                                        KONTRAKTOR
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-1 row" id="unor">
                            <label for="jenis" class="col-sm-2 col-form-label"
                                >Unit :</label
                            >
                            <div class="col-sm-10">
                                <select
                                    name="unit"
                                    class="form-control"
                                    required
                                    value="{{ old('unit') }}"
                                >
                                    <option value="" selected></option>
                                    <option
                                        value="UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - I"
                                    >
                                        UPTD PENGELOLAAN JALAN DAN JEMBATAN
                                        WILAYAH PELAYANAN - I
                                    </option>
                                    <option
                                        value="UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - II"
                                    >
                                        UPTD PENGELOLAAN JALAN DAN JEMBATAN
                                        WILAYAH PELAYANAN - II
                                    </option>
                                    <option
                                        value="UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - III"
                                    >
                                        UPTD PENGELOLAAN JALAN DAN JEMBATAN
                                        WILAYAH PELAYANAN - III
                                    </option>
                                    <option
                                        value="UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV"
                                    >
                                        UPTD PENGELOLAAN JALAN DAN JEMBATAN
                                        WILAYAH PELAYANAN - IV
                                    </option>
                                    <option
                                        value="UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - V"
                                    >
                                        UPTD PENGELOLAAN JALAN DAN JEMBATAN
                                        WILAYAH PELAYANAN - V
                                    </option>
                                    <option
                                        value="UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - VI"
                                    >
                                        UPTD PENGELOLAAN JALAN DAN JEMBATAN
                                        WILAYAH PELAYANAN - VI
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="wrap-jenis" id="konsultan">
                            <div class="mb-1 row">
                                <label
                                    for="staticEmail"
                                    class="col-sm-2 col-form-label"
                                    >Nama Perusahaan :</label
                                >
                                <div class="col-sm-10">
                                    @if(Session::get('nm_perusahaan_konsultan'))
                                    <input
                                        type="text"
                                        class="form-control text-uppercase"
                                        placeholder="Nama Perusahaan"
                                        name="nm_perusahaan_konsultan"
                                        id="nmKonsultan"
                                        value="{{
                                            old('nm_perusahaan_konsultan')
                                        }}"
                                        oninput="removeErr('#nmKonsultan','#errNmKon')"
                                    />
                                    <span
                                        class="err-msg text-danger"
                                        id="errNmKon"
                                        >Perusahaan Sudah Terdaftar</span
                                    >
                                    @else
                                    <input
                                        type="text"
                                        class="form-control text-uppercase"
                                        placeholder="Nama Perusahaan"
                                        name="nm_perusahaan_konsultan"
                                    />
                                    @endif
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label
                                    for="staticEmail"
                                    class="col-sm-2 col-form-label"
                                    >Alamat Perusahaan :</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="alamat_perusahaan_konsultan"
                                        placeholder="Alamat Perusahaan"
                                        value="{{
                                            old('alamat_perusahaan_konsultan')
                                        }}"
                                    />
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label
                                    for="staticEmail"
                                    class="col-sm-2 col-form-label"
                                    >Nama Direktur :</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Nama Direktur"
                                        name="nm_direktur_konsultan"
                                        value="{{
                                            old('nm_direktur_konsultan')
                                        }}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="wrap-jenis" id="kontraktor">
                            <div class="mb-1 row">
                                <label
                                    for="staticEmail"
                                    class="col-sm-2 col-form-label"
                                    >Nama Perusahaan :</label
                                >
                                <div class="col-sm-10">
                                    @if(Session::get('nm_perusahaan_kontraktor'))
                                    <input
                                        type="text"
                                        class="form-control text-uppercase"
                                        name="nm_perusahaan_kontraktor"
                                        placeholder="Nama Perusahaan"
                                        id="nmKontraktor"
                                        value="{{
                                            old('nm_perusahaan_kontraktor')
                                        }}"
                                        oninput="removeErr('#nmKontraktor','#errNmKont')"
                                    />
                                    <span
                                        class="err-msg text-danger"
                                        id="errNmKont"
                                        >Perusahaan Sudah Terdaftar</span
                                    >
                                    @else
                                    <input
                                        type="text"
                                        class="form-control text-uppercase"
                                        name="nm_perusahaan_kontraktor"
                                        placeholder="Nama Perusahaan"
                                    />
                                    @endif
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label
                                    for="staticEmail"
                                    class="col-sm-2 col-form-label"
                                    >Alamat Perusahaan :</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="alamat_perusahaan_kontraktor"
                                        placeholder="Alamat Perusahaan"
                                        value="{{
                                            old('alamat_perusahaan_kontraktor')
                                        }}"
                                    />
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label
                                    for="staticEmail"
                                    class="col-sm-2 col-form-label"
                                    >Nama Direktur :</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nm_direktur"
                                        placeholder="Nama Direktur"
                                        value="{{
                                            old('nm_direktur_kontraktor')
                                        }}"
                                    />
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label
                                    for="npwp"
                                    class="col-sm-2 col-form-label"
                                    >NPWP :</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="npwp"
                                        name="npwp"
                                        placeholder="12.345.674.9-629.000"
                                        value="{{ old('npwp') }}"
                                    />
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label
                                    for="npwp"
                                    class="col-sm-2 col-form-label"
                                    >No. Telp :</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="tlp_perusahaan"
                                        placeholder="022-250XXXXX"
                                        value="{{ old('tlp_perusahaan') }}"
                                    />
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label
                                    for="npwp"
                                    class="col-sm-2 col-form-label"
                                    >Bank :</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="bank"
                                        placeholder="BJB CABANG ...."
                                        value="{{ old('bank') }}"
                                    />
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label
                                    for="npwp"
                                    class="col-sm-2 col-form-label"
                                    >No. Rekening :</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="norek"
                                        name="no_rek"
                                        placeholder="280XXXXX"
                                        value="{{ old('no_rek') }}"
                                    />
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label
                                    for="npwp"
                                    class="col-sm-2 col-form-label"
                                    >Nama GS :</label
                                >
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Nama Gs"
                                        name="nm_gs"
                                        value="{{ old('nm_gs') }}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success w-100 mt-2">
                    Submit
                </button>
            </form>
        </div>

        <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{
                asset('vendor/bootstrap/js/bootstrap.min.js')
            }}"></script>
        <script src="{{ asset('assets/custom/register.js') }}"></script>
    </body>
</html>
