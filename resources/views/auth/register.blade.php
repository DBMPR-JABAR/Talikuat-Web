@extends('auth.layout.index') 
@section('title','Register') 

@section('content')
<div class="login-form">
    @include('flashalert.index')

    <form
        class="login100-form validate-form"
        action="{{ route('register') }}"
        method="POST">
    @csrf

        <span class="login100-form-title">
            Talikuat Bima Jabar
        </span>
        <div class="wrap-input100 validate-input" data-validate="Nama Tidak Boleh Kosong">
            <input class="input100" type="text" name="name" placeholder="Nama"/>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-id-card" aria-hidden="true"></i>
            </span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="E-Mail Tidak Boleh Kosong">
            <input class="input100" type="text" name="email" placeholder="E-MAIL"/>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-id-card" aria-hidden="true"></i>
            </span>
            
            
        </div>

        <div class="wrap-input100 validate-input" data-validate="Password Tidak Boleh Kosong">
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
        <div class="wrap-input100 validate-input" data-validate="Password Konfirmasi Tidak Boleh Kosong">
            <input
                class="input100"
                type="password"
                name="password_confirmation"
                placeholder="Password Confirmation"
                id="password_confirmation"
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
            <button class="login100-form-btn" type="submit" name="submit" >
                Register
            </button>
        </div>
        Go to <a href="{{ url('/login') }}" style=" text-decoration: underline; color: yellow">Sign In</a> if you can Account.
    </form>
    @error('email')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>    
    @enderror
    @error('password')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>    
    @enderror
</div>
@endsection