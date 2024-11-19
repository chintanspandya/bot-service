@extends('layouts.app')

@section('title', 'Templates')


@section('content')
    <section class="main-body inner-page-class">
        <div class="container">
            <div class="d-flex heading justify-content-center align-items-center">
                <a href="{{ route('template.index') }}"
                    class="d-block back-blue back-button d-flex justify-content-center align-items-center "><i
                        class="uil uil-angle-left white-text"></i></a>
                <div class="text-center col-md-11 center-title">
                    <h2 class="m-0">Create Template</h2>
                </div>
            </div>

            <div class="col-md-6 m-auto pt-5">
                <form action="{{ route('template.store') }}" id="form" method="POST">
                    @csrf
                    <input type="text" placeholder="Enter Title" name="title" required=""
                        class="border-radius mb-5 mb-20 dark-grey">


                    <div class="select-btn dark-grey">
                        <span class="btn-text fw-bold" data-btn-text="Select Template Type">Select Template Type</span>
                        <span class="arrow-dwn">
                            <i class="uil uil-angle-down"></i>
                        </span>
                    </div>

                    <ul class="list-items">
                        <li class="item">

                            <span class="item-text">Email</span>
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                        </li>
                        <li class="item">

                            <span class="item-text">WhatsApp</span>
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                        </li>
                        <li class="item">

                            <span class="item-text">SMS</span>
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                        </li>

                    </ul>

                    <div class="d-flex mt-5 mb-5 justify-content-between align-items-center">
                        <div class="col-md-11 p-0 ">
                            <h4>Create Message</h4>
                        </div>
                        <div class="col-md-1 p-0">
                            <a href="##" class="d-block back-blue p-3 pt-2 pb-2 border-radius"> <i
                                    class="uil uil-pen white-text"></i></a>
                        </div>

                    </div>

                    <div class="ckeditor mb-5 mt-5">
                        <div id="toolbar-container"></div>
                        <div id="ckeditor5">
                            {{ old('message') }}
                        </div>
                    </div>
                    <input type="hidden" name="message" id="message_hidden">

                    <div class="select-btn dark-grey">
                        <span class="btn-text fw-bold" data-btn-text="Select Questions">Select Questions</span>
                        <span class="arrow-dwn">
                            <i class="uil uil-angle-down"></i>
                        </span>
                    </div>

                    <ul class="list-items">
                        <li class="item">

                            <span class="item-text">Email</span>
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                        </li>
                        <li class="item">

                            <span class="item-text">WhatsApp</span>
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                        </li>
                        <li class="item">

                            <span class="item-text">SMS</span>
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                        </li>

                    </ul>



                    <div class="text-center">
                        <button id="submit" type="submit"
                            class="back-blue white-text fw-bold text-18 col-md-3 mt-5 border-radius">Submit</button>
                    </div>
                </form>

            </div>
    </section>
@endsection
@push('styles')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css" />
@endpush
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/10.1.0/decoupled-document/ckeditor.js"></script>

    <script>
        let editor;

        DecoupledEditor
            .create(document.querySelector('#ckeditor5'), {
                toolbar: ['bold', 'italic', 'underline', 'bulletedList', 'numberedList', 'link', 'blockQuote']
            })
            .then(newEditor => {
                editor = newEditor;

                const toolbarContainer = document.querySelector('#toolbar-container');
                toolbarContainer.appendChild(newEditor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });

        document.querySelector('#submit').addEventListener('click', (e) => {
            // e.preventDefault();
            const editorData = editor.getData();
            document.getElementById('message_hidden').value = editorData
            // ...
            // Submit the form here...
            // document.getElementById('form').submit(); // Uncomment this line if you want to submit the form on button click.

        });

        $(function() {
            $(document).on('click', (e) => {
                e.stopPropagation();
                if (!(
                        $(e.target).hasClass('btn-text') ||
                        $(e.target).hasClass('select-btn') ||
                        $(e.target).hasClass('list-items') ||
                        $(e.target).hasClass('item') ||
                        $(e.target).hasClass('checkbox')
                    )) {
                    $('.select-btn').removeClass('open');
                }
            })
        })
    </script>
@endpush
