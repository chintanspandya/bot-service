@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <section class="main-body profile-page">
        <div class="container">
            <div class="d-flex heading justify-content-center align-items-center">
                <a href="{{ route('home') }}" class="d-block back-blue back-button d-flex justify-content-center align-items-center "><i
                        class="uil uil-angle-left white-text"></i></a>
                <div class="text-center col-md-11 center-title">
                    <h2 class="m-0">Profile</h2>
                </div>
            </div>

            <div class="d-flex flex-wrap mt-5">
                <div class="col-md-4 side-left text-center col-sm-12">
                    <div class="back-blue p-4">
                        <img src="images/m1.png">
                        <h4 class="white-text text-22">{{ $user->name }}</h4>
                    </div>
                    <div class="light-back-blue">

                    </div>
                </div>
                <div class="col-md-8 side-right col-sm-12">
                    <p class="text-22">Personal Information</p>
                    <hr>

                    <div class="d-flex flex-wrap">
                        <div class="col-md-6 col-sm-12 p-0">
                            <div class="d-flex question-repeat align-items-center">
                                <div class="col-md-10"><label class="fw-bold">Name</label></div>
                                {{-- <div class="col-md-2"><a href="##" class="text-center pt-2 pb-2">Edit</a></div> --}}
                            </div>
                            <div class="col-md-12"><input type="text" placeholder="Type Here" name="name"
                                    required="" class="border-radius mb-5 mb-20 dark-grey" value="{{ old('name', $user?->name) }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 p-0">
                            <div class="d-flex question-repeat align-items-center">
                                <div class="col-md-10"><label class="fw-bold">Job Profile</label></div>
                                {{-- <div class="col-md-2"><a href="##" class="text-center pt-2 pb-2">Edit</a></div> --}}
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Job Profile" name="role"
                                    required="" class="border-radius mb-5 mb-20 dark-grey" value="{{ ucfirst(old('role', $user?->role)) }}" disabled>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 p-0">
                            <div class="d-flex question-repeat align-items-center">
                                <div class="col-md-10"><label class="fw-bold">Email</label></div>
                                {{-- <div class="col-md-2"><a href="##" class="text-center pt-2 pb-2">Edit</a></div> --}}
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Enter your email address" name="email" required=""
                                    class="border-radius mb-5 mb-20 dark-grey" value="{{ old('email', $user?->email) }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 p-0">
                            <div class="d-flex question-repeat align-items-center">
                                <div class="col-md-10"><label class="fw-bold">Contact Number</label></div>
                                {{-- <div class="col-md-2"><a href="##" class="text-center pt-2 pb-2">Edit</a></div> --}}
                            </div>
                            <div class="col-md-12"><input type="text" placeholder="+01-7387-67-0678" name="contact_no"
                                     class="border-radius mb-5 mb-20 dark-grey" value="{{ old('contact_no', $user?->contact_no) }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center"> <button type="submit"
                            class="back-blue white-text  text-16 col-md-3 m-auto mt-5 border-radius">Save Changes</button>
                    </div>


                </div>
            </div>

        </div>
    </section>
@endsection
