@extends('layouts.guest')
@section('title', 'Login')
@section('content')

    <div class="container ">
        <form action="{{ route('login') }}" class="login-form col-md-6 m-auto" method="POST">
            @method('POST')
            @csrf
            @include('includes.alerts')
            <div class="text-center col-md-3 m-auto mb-5 mb-20 mt-5 mt-20">
                <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}"> </a>
                <h1 class="white-text mt-5 mt-20 text-35">Log-In</h1>
            </div>

            <input type="text" placeholder="Email" name="email" required class="border-radius mb-5 mb-20">


            <input type="password" placeholder="Password" name="password" required class="border-radius">
            <div class="col-md-12 text-right mt-2"><span class=" white-text">Forgot <a href="{{ url('forgot-password') }}"
                        class="text-decoration-none white-text">password?</a></span></div>



            <div class="col-md-12 m-auto text-center mt-5 mt-20 mb-5 mb-20"><button type="submit"
                    class="back-white text-black fw-bold text-22 col-md-3 border-radius">Login</button>
            </div>

        </form>
    </div>
@endsection
