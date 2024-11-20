@extends('layouts.app')

@section('title', 'Home')


@section('content')
<section class="main-body tabbing">
    <div class="container">
        @include('includes.alerts')
        <ul class="nav nav-tabs border-bottom mt-2" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Latest Messages
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Unread Messages
                </button>
            </li>

        </ul>
        <div class="tab-content pt-5" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-12 p-2 ps-3 pt-3 back-blue">
                    <div class="d-flex flex-wrap">
                        <div class="col-md-12 d-flex justify-content-between w-100">
                            <h3 class="white-text text-18">SMS Messages</h3>
                            <i class="uil uil-sync-exclamation white-text text-18"></i>
                        </div>
                    </div>

                </div>
                <div class="dark-grey mb-3 pb-2">
                    <div class="light-grey p-2 d-flex align-items-center mb-1 flex-wrap record-line ">
                        <div class="col-md-1 col-sm-12 text-sm-center ps-2"><img src="{{ asset('/') }}images/m1.png"></div>
                        <div class="col-md-11 col-sm-12">
                            <h5>Nick Smith</h5>
                            <p class="m-0 p-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                        </div>
                    </div>
                    <div class="col-md-12 text-right mb-1 pe-3">
                        <a href="##" class="date">05:10 PM,24th Jun</a>
                    </div>
                    <div class="light-grey p-2 d-flex align-items-center mb-1 flex-wrap record-line ">
                        <div class="col-md-1 col-sm-12 text-sm-center ps-2"><img src="{{ asset('/') }}images/m1.png"></div>
                        <div class="col-md-11 col-sm-12">
                            <h5>Nick Smith</h5>
                            <p class="m-0 p-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                        </div>
                    </div>
                    <div class="col-md-12 text-right mb-1 pe-3">
                        <a href="##" class="date">05:10 PM,24th Jun</a>
                    </div>
                </div>
                <div class="col-md-12 text-right mb-3">
                    <a href="##">View All</a>
                </div>


                <!--second-->
                <div class="col-md-12 p-2 ps-3 pt-3 back-blue">
                    <div class="d-flex flex-wrap">
                        <div class="col-md-12 d-flex justify-content-between w-100">
                            <h3 class="white-text text-18">Emails</h3>
                            <i class="uil uil-sync-exclamation white-text text-18"></i>
                        </div>
                    </div>

                </div>
                <div class="dark-grey mb-3 pb-2">
                    <div class="light-grey p-2 d-flex align-items-center mb-1 flex-wrap record-line ">
                        <div class="col-md-1 col-sm-12 text-sm-center ps-2"><img src="{{ asset('/') }}images/m1.png"></div>
                        <div class="col-md-11 col-sm-12">
                            <h5>Nick Smith</h5>
                            <p class="m-0 p-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                        </div>
                    </div>
                    <div class="col-md-12 text-right mb-1 pe-3">
                        <a href="##" class="date">05:10 PM,24th Jun</a>
                    </div>
                    <div class="light-grey p-2 d-flex align-items-center mb-1 flex-wrap record-line ">
                        <div class="col-md-1 col-sm-12 text-sm-center ps-2"><img src="{{ asset('/') }}images/m1.png"></div>
                        <div class="col-md-11 col-sm-12">
                            <h5>Nick Smith</h5>
                            <p class="m-0 p-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                        </div>
                    </div>
                    <div class="col-md-12 text-right mb-1 pe-3">
                        <a href="##" class="date">05:10 PM,24th Jun</a>
                    </div>
                </div>
                <div class="col-md-12 text-right mb-3">
                    <a href="##">View All</a>
                </div>

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="col-md-12 p-2 ps-3 pt-3 back-blue">
                        <div class="d-flex flex-wrap">
                            <div class="col-md-12 d-flex justify-content-between w-100">
                                <h3 class="white-text text-18">SMS Messages</h3>
                                <i class="uil uil-sync-exclamation white-text text-18"></i>
                            </div>
                        </div>

                    </div>
                    <div class="dark-grey mb-3 pb-2">
                        <div class="light-grey p-2 d-flex align-items-center mb-1 flex-wrap record-line ">
                            <div class="col-md-1 col-sm-12 text-sm-center ps-2"><img src="{{ asset('/') }}images/m1.png"></div>
                            <div class="col-md-11 col-sm-12">
                                <h5>Nick Smith</h5>
                                <p class="m-0 p-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                            </div>
                        </div>
                        <div class="col-md-12 text-right mb-1 pe-3">
                            <a href="##" class="date">05:10 PM,24th Jun</a>
                        </div>
                        <div class="light-grey p-2 d-flex align-items-center mb-1 flex-wrap record-line ">
                            <div class="col-md-1 col-sm-12 text-sm-center ps-2"><img src="{{ asset('/') }}images/m1.png"></div>
                            <div class="col-md-11 col-sm-12">
                                <h5>Nick Smith</h5>
                                <p class="m-0 p-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                            </div>
                        </div>
                        <div class="col-md-12 text-right mb-1 pe-3">
                            <a href="##" class="date">05:10 PM,24th Jun</a>
                        </div>
                    </div>
                    <div class="col-md-12 text-right mb-3">
                        <a href="##">View All</a>
                    </div>


                    <!--second-->
                    <div class="col-md-12 p-2 ps-3 pt-3 back-blue">
                        <div class="d-flex flex-wrap">
                            <div class="col-md-12 d-flex justify-content-between w-100">
                                <h3 class="white-text text-18">Emails</h3>
                                <i class="uil uil-sync-exclamation white-text text-18"></i>
                            </div>
                        </div>

                    </div>
                    <div class="dark-grey mb-3 pb-2">
                        <div class="light-grey p-2 d-flex align-items-center mb-1 flex-wrap record-line ">
                            <div class="col-md-1 col-sm-12 text-sm-center ps-2"><img src="{{ asset('/') }}images/m1.png"></div>
                            <div class="col-md-11 col-sm-12">
                                <h5>Nick Smith</h5>
                                <p class="m-0 p-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                            </div>
                        </div>
                        <div class="col-md-12 text-right mb-1 pe-3">
                            <a href="##" class="date">05:10 PM,24th Jun</a>
                        </div>
                        <div class="light-grey p-2 d-flex align-items-center mb-1 flex-wrap record-line ">
                            <div class="col-md-1 col-sm-12 text-sm-center ps-2"><img src="{{ asset('/') }}images/m1.png"></div>
                            <div class="col-md-11 col-sm-12">
                                <h5>Nick Smith</h5>
                                <p class="m-0 p-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                            </div>
                        </div>
                        <div class="col-md-12 text-right mb-1 pe-3">
                            <a href="##" class="date">05:10 PM,24th Jun</a>
                        </div>
                    </div>
                    <div class="col-md-12 text-right mb-3">
                        <a href="##">View All</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
