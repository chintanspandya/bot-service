@extends('layouts.app')

@section('title', 'Administrative Area')


@section('content')
    <section class="main-body administration">
        <div class="container">
            <div class="text-center mt-3">
                <h2>Administration</h2>
            </div>

            <div class="d-flex flex-wrap three-block justify-content-center mt-5 mb-5">
                <a href="{{ route('template.index') }}" class="d-block col-md-4 col-sm-12 pe-5 ps-5 mb-5 mt-3">
                    <div class=" inner-box  dark-grey text-center ps-5 pe-5 p-3 border-radius "><img
                            src="{{ asset('/') }}images/templates.png"></div>
                    <h4 class="text-center mt-3 text-black">Templates</h4>
                </a>
                <a href="##" class="d-block col-md-4 col-sm-12 pe-5 ps-5 mb-5 mt-3">
                    <div class=" inner-box  dark-grey text-center ps-5 pe-5 p-3 border-radius "><img
                            src="{{ asset('/') }}images/clients.png"></div>
                    <h4 class="text-center mt-3 text-black">Clients</h4>
                </a>
                <a href="##" class="d-block col-md-4 col-sm-12 pe-5 ps-5 mb-5 mt-3">
                    <div class=" inner-box  dark-grey text-center ps-5 pe-5 p-3 border-radius "><img
                            src="{{ asset('/') }}images/Activities.png"></div>
                    <h4 class="text-center mt-3 text-black">Activities</h4>
                </a>
                <a href="##" class="d-block col-md-4 col-sm-12 pe-5 ps-5 mb-5 mt-3">
                    <div class=" inner-box  dark-grey text-center ps-5 pe-5 p-3 border-radius "><img
                            src="{{ asset('/') }}images/payments.png"></div>
                    <h4 class="text-center mt-3 text-black">Payments</h4>
                </a>
                <a href="{{ route('user.index') }}" class="d-block col-md-4 col-sm-12 pe-5 ps-5 mb-5 mt-3">
                    <div class=" inner-box  dark-grey text-center ps-5 pe-5 p-3 border-radius "><img
                            src="{{ asset('/') }}images/users.png"></div>
                    <h4 class="text-center mt-3 text-black">Users</h4>
                </a>
                <a href="{{ route('question.index') }}" class="d-block col-md-4 col-sm-12 pe-5 ps-5 mb-5 mt-3">
                    <div class=" inner-box  dark-grey text-center ps-5 pe-5 p-3 border-radius "><img
                            src="{{ asset('/') }}images/questions.png"></div>
                    <h4 class="text-center mt-3 text-black">Questions</h4>
                </a>

            </div>
        </div>
    </section>


@endsection
