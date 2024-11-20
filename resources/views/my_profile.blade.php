@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <section class="main-body profile-page">
        <div class="container">
            <div class="d-flex heading justify-content-center align-items-center">
                <a href="{{ route('home') }}"
                    class="d-block back-blue back-button d-flex justify-content-center align-items-center "><i
                        class="uil uil-angle-left white-text"></i></a>
                <div class="text-center col-md-11 center-title">
                    <h2 class="m-0">Profile</h2>
                </div>
            </div>

            @include('includes.alerts')

            <div class="d-flex flex-wrap mt-5">
                <div class="col-md-3 mb-3 col-sm-12">

                    <div class="back-blue p-3 oneside-corner">
                        <div class="text-center side-left pt-5 pb-5 ">
                            <div class="col-md-12 text-center"><img src="images/m1.png" class=""></div>
                            <h4 class="white-text text-22">{{ $user->name }}</h4>
                        </div>
                    </div>
                    <ul class="nav nav-pills flex-column" id="experienceTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link white-text {{ session()->has('password_error') ? '': 'active' }}" id="home-tab" data-bs-toggle="tab" href="#snit"
                                role="tab" aria-controls="home" aria-selected="true">Personal Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link white-text {{ session()->has('password_error') ? 'active': '' }}" id="profile-tab" data-bs-toggle="tab" href="#devs"
                                role="tab" aria-controls="profile" aria-selected="false">Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link white-text" id="logout" href="#" data-href="delete.php?id=23"
                                data-bs-toggle="modal" data-bs-target="#confirm-delete">Logout </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="tab-content" id="experienceTabContent">

                        <div class="tab-pane fade {{ session()->has('password_error') ? '': 'show active' }} text-left text-light" id="snit" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="season_content side-right">
                                <p class="text-22 text-black">Personal Information</p>
                                <hr>

                                <div class="d-flex flex-wrap">
                                    <div class="col-md-6 col-sm-12 p-0">
                                        <div class="d-flex question-repeat align-items-center">
                                            <div class="col-md-10"><label class="text-black">Name</label></div>
                                            {{-- <div class="col-md-2"><a href="##" class="text-center pt-2 pb-2">Edit</a></div> --}}
                                        </div>
                                        <div class="col-md-12"><input type="text" placeholder="Type Here" name="name"
                                                required="" class="border-radius mb-5 mb-20 dark-grey"
                                                value="{{ old('name', $user?->name) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 p-0">
                                        <div class="d-flex question-repeat align-items-center">
                                            <div class="col-md-10"><label class="text-black">Job Profile</label></div>
                                            {{-- <div class="col-md-2"><a href="##" class="text-center pt-2 pb-2">Edit</a></div> --}}
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Job Profile" name="role" required=""
                                                class="border-radius mb-5 mb-20 dark-grey"
                                                value="{{ ucfirst(old('role', $user?->role)) }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12 p-0">
                                        <div class="d-flex question-repeat align-items-center">
                                            <div class="col-md-10"><label class="text-black">Email</label></div>
                                            {{-- <div class="col-md-2"><a href="##" class="text-center pt-2 pb-2">Edit</a></div> --}}
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter your email address" name="email"
                                                required="" class="border-radius mb-5 mb-20 dark-grey"
                                                value="{{ old('email', $user?->email) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 p-0">
                                        <div class="d-flex question-repeat align-items-center">
                                            <div class="col-md-10"><label class="text-black">Contact Number</label></div>
                                            {{-- <div class="col-md-2"><a href="##" class="text-center pt-2 pb-2">Edit</a></div> --}}
                                        </div>
                                        <div class="col-md-12"><input type="text" placeholder="+01-7387-67-0678"
                                                name="contact_no" class="border-radius mb-5 mb-20 dark-grey"
                                                value="{{ old('contact_no', $user?->contact_no) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center"> <button type="submit"
                                        class="back-blue white-text  text-16 col-md-3 m-auto mt-5 border-radius">Save
                                        Changes</button>
                                </div>

                            </div>
                        </div>


                        <div class="tab-pane fade {{ session()->has('password_error') ? 'show active': '' }} text-left text-light" id="devs" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <div class="season_content">
                                <form action="{{ route('my-profile.change-password') }}" method="POST">
                                    @csrf
                                    <p class="text-22 text-black">Change Password</p>
                                    <hr>
                                    <div class="question-repeat align-items-center">
                                        <div class="col-md-12"><label class="text-black">Current Password</label></div>
                                    </div>
                                    <div class="col-md-12"><input type="password" name="password" required=""
                                            class="border-radius mb-3 mb-20 dark-grey"></div>

                                    <div class="question-repeat align-items-center">
                                        <div class="col-md-12"><label class="text-black">New Password</label></div>
                                    </div>
                                    <div class="col-md-12"><input type="password" name="new_password" required=""
                                            class="border-radius mb-3 mb-20 dark-grey"></div>


                                    <div class="question-repeat align-items-center">
                                        <div class="col-md-12"><label class="text-black">Re-Enter New Password</label></div>
                                    </div>
                                    <div class="col-md-12"><input type="password" name="new_password_confirmation" required=""
                                            class="border-radius mb-3 mb-20 dark-grey"></div>
                                    <div class="col-md-12 text-center mt-4"> <button type="submit"
                                            class="back-blue white-text  text-16 col-md-3 m-auto mt-5 border-radius">Save
                                            Changes</button></div>
                                </form>

                            </div>
                        </div>

                        <div class="tab-pane fade text-left text-light" id="logout" role="tabpanel"
                            aria-labelledby="logout">

                        </div>




                        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div
                                            class="modal-header text-center col-md-12 justify-content-center border-0 mt-3">
                                            <a href="##"
                                                class="d-block back-blue p-3 pt-2 pb-2 border-radius me-2 text-center"> <i
                                                    class="uil uil-sign-out-alt white-text text-22"></i></a>
                                        </div>
                                        <div class="modal-body text-center  border-0">
                                            <p>Are You Sure You Want To <strong> Logout </strong>?</p>
                                        </div>
                                        <div class="modal-footer  border-0 d-flex justify-content-center mb-3">
                                            <button type="submit" data-bs-dismiss="modal"
                                                class="back-blue white-text fw-bold text-16 col-md-3 border-radius">No</button>
                                            <button type="submit"
                                                class="back-blue white-text fw-bold text-16 col-md-3  border-radius">Yes</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div><!--tab content end-->
                </div><!-- col-md-9 end -->

            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        //   $('#experienceTab a[href="#{{ old('tab') }}"]').tab('show')

    </script>
@endpush
