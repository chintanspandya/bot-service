@extends('layouts.guest')
@section('title', 'Reset Password')
@section('content')

    <form action="{{ route('password.store') }}" class="login-form col-md-6 m-auto" method="POST">
        @csrf
        <div class="container ">
            @include('includes.alerts')
            <div class="text-center col-md-5 m-auto mb-3 mb-20 mt-5 mt-20">
                <a href="{{ route('home') }}" class="d-flex justify-content-center">
                    <img src="{{ asset('images/logo.png') }}" style="width: 160px;">
                </a>
                <h1 class="white-text mt-5 mt-20 text-35"> {{ __('Reset Password') }}</h1>
            </div>
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <input type="text" placeholder="Email" name="email" value="{{ old('email', $request->email) }}" required class="border-radius mb-5 mb-20">

            <input type="password" placeholder="__('Password')" name="password" required class="border-radius">

            <input type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required class="border-radius">




        </div>
        <div class="col-md-12 m-auto text-center mt-5 mt-20 mb-5 mb-20"><button type="submit"
                class="back-white text-black fw-bold text-22 col-md-3 border-radius">{{ __('Reset Password') }}</button>
        </div>

    </form>
@endsection

