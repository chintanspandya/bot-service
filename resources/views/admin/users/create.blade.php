@extends('layouts.app')

@section('title', 'Create User')


@section('content')
    <section class="main-body inner-page-class">
        <div class="container">
            <div class="d-flex heading justify-content-center align-items-center">
                <a href="{{ route('template.index') }}"
                    class="d-block back-blue back-button d-flex justify-content-center align-items-center "><i
                        class="uil uil-angle-left white-text"></i></a>
                <div class="text-center col-md-11 center-title">
                    <h2 class="m-0">Create User</h2>
                </div>
            </div>
            @include('includes.alerts')

            <div class="col-md-6 m-auto pt-5">
                <form action="{{ route('user.create') }}" id="form" method="POST">
                    @csrf
                    <input type="text" placeholder="Enter Name" name="name" required=""
                        class="border-radius {{ !$errors->has('name') ? 'mb-5' : 'mb-0' }} mb-20 dark-grey"
                        value="{{ old('name') }}">
                    @error('name')
                        <span class="d-block error mb-4">{{ $message }}</span>
                    @enderror

                    <input type="text" placeholder="Enter Email" name="email" required=""
                    class="border-radius {{ !$errors->has('email') ? 'mb-5' : 'mb-0' }} mb-20 dark-grey"
                    value="{{ old('email') }}">
                    @error('email')
                        <span class="d-block error mb-4">{{ $message }}</span>
                    @enderror

                    <select name="role" required=""
                    class="border-radius w-100 {{ !$errors->has('name') ? 'mb-5' : 'mb-0' }} mb-20 dark-grey">
                        <option value="">Select Job Title</option>
                        <option value="admin">Admin</option>
                        <option value="manager">Manager</option>
                        <option value="user">User</option>

                    </select>
                    @error('role')
                        <span class="d-block error mb-4">{{ $message }}</span>
                    @enderror

                    <input type="text" placeholder="Enter Contact Number" name="name" required=""
                    class="border-radius {{ !$errors->has('contact_no') ? 'mb-5' : 'mb-0' }} mb-20 dark-grey"
                    value="{{ old('contact_no') }}">
                    @error('contact_no')
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
