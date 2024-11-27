@extends('layouts.app')

@section('title', 'Create Template')


@section('content')
    <section class="main-body inner-page-class">
        <div class="container">
            <div class="d-flex heading mt-3 align-items-center">
                <a href="{{ route('template.index') }}"
                    class="d-block back-blue back-button d-flex justify-content-center align-items-center "><i
                        class="uil uil-angle-left white-text"></i></a>
                <div class="text-center col-md-11 center-title">
                    <h2 class="m-0">Create Template</h2>
                </div>
            </div>
            @include('includes.alerts')

            <div class="col-md-6 m-auto pt-5">
                <form action="{{ route('template.update', $template->id) }}" id="form" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="text" placeholder="Enter Title" name="title" required=""
                        class="border-radius {{ !$errors->has('title') ? 'mb-5' : 'mb-0' }} mb-20 dark-grey" value="{{ old('title', $template->title) }}">
                        @error('title')
                            <span class="d-block error mb-4">{{ $message }}</span>
                        @enderror


                    <div class="select-btn dark-grey">
                        <span class="btn-text fw-bold" data-btn-text="Select Template Type">{{ old('template_type', $template->template_type) != "" && count(explode(',', (old('template_type', $template->template_type)))) > 0 ?  count(explode(',', (old('template_type', $template->template_type)))) . ' selected' : 'Select Template Type'}}</span>
                        <span class="arrow-dwn">
                            <i class="uil uil-angle-down"></i>
                        </span>
                    </div>


                    <ul class="list-items">
                        <input type="hidden" name="template_type" class="hidden_checkbox_input"/>
                        <li class="item {{ str_contains(old('template_type', $template->template_type), 'email') ? 'checked' : '' }}">

                            <span class="item-text">Email</span>
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                        </li>
                        <li class="item {{ str_contains(old('template_type', $template->template_type), 'whatsapp') ? 'checked' : '' }}">

                            <span class="item-text">WhatsApp</span>
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                        </li>
                        <li class="item {{ str_contains(old('template_type', $template->template_type), 'sms') ? 'checked' : '' }}">

                            <span class="item-text">SMS</span>
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                        </li>

                    </ul>

                    @error('template_type')
                        <span class="d-block error mb-4">{{ $message }}</span>
                    @enderror

                    <div class="d-flex mt-5 mb-5 justify-content-between align-items-center">
                        <div class="col-md-11 p-0 ">
                            <h4>Create Message</h4>
                        </div>
                        <div class="col-md-1 p-0">
                            <a href="##" class="d-block back-blue p-3 pt-2 pb-2 border-radius"> <i
                                    class="uil uil-pen white-text"></i></a>
                        </div>

                    </div>

                    <div class="ckeditor {{ !$errors->has('message') ? 'mb-5' : 'mb-0' }} mt-5">
                        <div id="toolbar-container"></div>
                        <div id="ckeditor5">
                            {!! old('message', $template->message) !!}
                        </div>
                    </div>
                    @error('message')
                        <span class="d-block error mb-4">{{ $message }}</span>
                    @enderror

                    <input type="hidden" name="message" id="message_hidden" value="{{ old('message', $template->message) }}">

                    <div class="select-btn dark-grey">
                        <span class="btn-text fw-bold" data-btn-text="Select Questions">{{ old('questions') != "" && count(explode(',', (old('questions')))) > 0 ?  count(explode(',', (old('questions')))) . ' selected' : 'Select Questions'}}</span>
                        <span class="arrow-dwn">
                            <i class="uil uil-angle-down"></i>
                        </span>
                    </div>

                    <ul class="list-items">
                        <input type="hidden" name="questions" class="hidden_checkbox_input" value="{{ old('questions') }}"/>
                        <li class="item {{ str_contains(old('questions'), 'email') ? 'checked' : '' }}">

                            <span class="item-text">Email</span>
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                        </li>
                        <li class="item {{ str_contains(old('questions'), 'whatsapp') ? 'checked' : '' }}">

                            <span class="item-text">WhatsApp</span>
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                        </li>
                        <li class="item {{ str_contains(old('questions'), 'sms') ? 'checked' : '' }}">

                            <span class="item-text">SMS</span>
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                        </li>

                    </ul>
                    @error('questions')
                        <span class="d-block error mb-4">{{ $message }}</span>
                    @enderror


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

        if ("{{ old('message') }}" != "") {
            editor.setData("{{ old('message') }}")
        }

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
