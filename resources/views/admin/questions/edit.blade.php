@extends('layouts.app')

@section('title', 'Edit Question')


@section('content')
    <section class="main-body inner-page-class">
        <div class="container">
            <div class="d-flex heading mt-3 align-items-center">
                <a href="{{ route('question.index') }}"
                    class="d-block back-blue back-button d-flex justify-content-center align-items-center "><i
                        class="uil uil-angle-left white-text"></i></a>
                <div class="text-center col-md-11 center-title">
                    <h2 class="m-0">Edit Question</h2>
                </div>
            </div>
            @include('includes.alerts')

            <div class="col-md-6 m-auto pt-5">
                <form action="{{ route('question.update', $question->id) }}" id="form" method="POST">
                    @method('PUT')
                    @csrf
                    <label class="fw-bold">Question <span class="red">*</span></label>
                    <input
                      type="text"
                      placeholder="Basic Questions"
                      name="question"
                      required=""
                      value="{{ old('question', $question->question) }}"
                      class="border-radius mb-5 mb-20 dark-grey"
                    />
                    <div class="text-center col-md-12 col-sm-12 center-title">
                      <a href="##" class="m-0 text-decoration-underline text-black"
                        >Type Possible Answers</a>
                        <a href="##" class="text-right d-block add-btn">+Add</a>
                    </div>
                    <div class="question-container">
                    @foreach ($question->answers as $key => $answer)

                        <div class="col-md-12">
                            <input
                            type="text"
                            placeholder="Type Here"
                            name="answers[{{ $key }}][input]"
                            required=""
                            value="{{ old("answers.{$key}.input", $answer?->answer) }}"
                            class="border-radius mb-3 mb-20 dark-grey"
                            />
                            <input type="hidden" name="answers[{{ $key }}][id]" value="{{ $answer->id }}">
                            <a href="##" class="text-right d-block remove-btn">-Remove</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <button id="submit" type="submit"
                            class="back-blue white-text fw-bold text-18 col-md-3 mt-5 border-radius">Submit</button>
                    </div>
                </form>

            </div>
    </section>
@endsection
@push('scripts')
    <script>

        $(function() {
            $(document).on('click', '.add-btn', function() {
                let length = $('.remove-btn').length || 1;
                $('.question-container').append(`
                    <div class="col-md-12 question-container">
                      <input
                        type="text"
                        placeholder="Type Here"
                        name="answers[][input]"
                        required=""
                        class="border-radius mb-3 mb-20 dark-grey"
                      />
                      <a href="##" class="text-right d-block remove-btn">-Remove</a>
                    </div>
                `);
            });
            $(document).on('click', '.remove-btn', function() {
                $(this).parent().remove();
            });
        });
    </script>
@endpush
