@extends('layouts.app')

@section('title', 'Templates')


@section('content')
    @if ($templates->count())
        <section class="main-body template-list">
            <div class="container">
                <div class="d-flex heading justify-content-between align-items-center mt-3 mb-5 flex-wrap">
                    <a href="{{ route('admin.index') }}"
                        class="col-md-1 d-block back-blue back-button d-flex justify-content-center align-items-center "><i
                            class="uil uil-angle-left white-text"></i></a>
                    <div class="text-center col-md-9 col-sm-12 center-title">
                        <h2 class="m-0">Templates</h2>
                    </div>
                    <div class="text-center col-md-2 col-sm-12 center-title"><a href="##"
                            class="m-0 text-decoration-underline">Create New Template</a></div>

                </div>
                <div class="d-flex pt-3 pb-3 justify-content-between align-items-center flex-wrap">

                    <div class="col-md-9 col-sm-12">
                        <h3>Demographical Templates</h3>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <p class="text-22">E-Mail</p>
                    </div>
                    <div class="col-md-1 d-flex col-sm-12">
                        <a href="##" class="d-block back-blue p-3 pt-2 pb-2 border-radius me-2"> <i
                                class="uil uil-pen white-text"></i></a>
                        <a href="##" class="d-block back-blue p-3 pt-2 pb-2 border-radius"> <i
                                class="uil uil-trash-alt white-text"></i></a>

                    </div>

                </div>

                <div class="d-flex pt-3 pb-3 justify-content-between align-items-center flex-wrap ">

                    <div class="col-md-9 col-sm-12">
                        <h3>Demographical Templates</h3>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <p class="text-22">E-Mail</p>
                    </div>
                    <div class="col-md-1 d-flex col-sm-12">
                        <a href="##" class="d-block back-blue p-3 pt-2 pb-2 border-radius me-2"> <i
                                class="uil uil-pen white-text"></i></a>
                        <a href="##" class="d-block back-blue p-3 pt-2 pb-2 border-radius"> <i
                                class="uil uil-trash-alt white-text"></i></a>

                    </div>

                </div>

                <div class="d-flex pt-3 pb-3 justify-content-between align-items-center flex-wrap">

                    <div class="col-md-9 col-sm-12">
                        <h3>Demographical Templates</h3>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <p class="text-22">E-Mail</p>
                    </div>
                    <div class="col-md-1 d-flex col-sm-12">
                        <a href="##" class="d-block back-blue p-3 pt-2 pb-2 border-radius me-2"> <i
                                class="uil uil-pen white-text"></i></a>
                        <a href="##" class="d-block back-blue p-3 pt-2 pb-2 border-radius"> <i
                                class="uil uil-trash-alt white-text"></i></a>

                    </div>

                </div>

                <div class="d-flex pt-3 pb-3 justify-content-between align-items-center flex-wrap">

                    <div class="col-md-9 col-sm-12">
                        <h3>Demographical Templates</h3>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <p class="text-22">E-Mail</p>
                    </div>
                    <div class="col-md-1 d-flex col-sm-12">
                        <a href="##" class="d-block back-blue p-3 pt-2 pb-2 border-radius me-2"> <i
                                class="uil uil-pen white-text"></i></a>
                        <a href="##" class="d-block back-blue p-3 pt-2 pb-2 border-radius"> <i
                                class="uil uil-trash-alt white-text"></i></a>

                    </div>

                </div>

            </div>
        </section>
    @else
        <section class="main-body administration">
            <div class="container">
                <div class="d-flex heading justify-content-center align-items-center">
                    <a href="{{ route('admin.index') }}"
                        class="d-block back-blue back-button d-flex justify-content-center align-items-center "><i
                            class="uil uil-angle-left white-text"></i></a>
                    <div class="text-center col-md-11 center-title">
                        <h2 class="m-0">Templates</h2>
                    </div>
                </div>

                <div class="text-center add-block">
                    <a href="{{ route('template.create') }}" class="light-grey plus-btn text-center pt-2 pb-2"><i
                            class="uil uil-plus text-blue"></i></a>
                    <div class="text-center mt-3">
                        <h2>Create Template</h2>
                    </div>
                </div>
            </div>
        </section>
    @endif


@endsection
