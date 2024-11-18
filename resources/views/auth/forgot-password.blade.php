@extends('layouts.guest')
@section('title', 'Login')
@section('content')

    <form action="{{ route('password.email') }}" class="login-form col-md-6 m-auto" method="POST">
        @method('POST')
        @csrf
        <div class="container ">
            @include('includes.alerts')
            <div class="text-center col-md-5 m-auto mb-3 mb-20 mt-5 mt-20">
                <a href="{{ route('home') }}" class="d-flex justify-content-center">
                    <img src="{{ asset('images/logo.png') }}" style="width: 160px;">
                </a>
                <h1 class="white-text mt-5 mt-20 text-35">Forgot Password</h1>
            </div>

            <input type="text" placeholder="Email" name="email" required class="border-radius mb-5 mb-20">



        </div>
        <div class="col-md-12 m-auto text-center mt-5 mt-20 mb-5 mb-20"><button type="submit"
                class="back-white text-black fw-bold text-22 col-md-3 border-radius">{{ __('Email Password Reset Link') }}</button>
        </div>

    </form>
@endsection
