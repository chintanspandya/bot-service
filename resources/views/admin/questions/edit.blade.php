@extends('layouts.app')

@section('title', 'Edit Questionaire')


@section('content')
    <section class="main-body inner-page-class">
        <div class="container">
            <div class="d-flex heading mt-3 align-items-center">
                <a href="{{ route('question.index') }}"
                    class="d-block back-blue back-button d-flex justify-content-center align-items-center "><i
                        class="uil uil-angle-left white-text"></i></a>
                <div class="text-center col-md-11 center-title">
                    <h2 class="m-0">Edit Questionaire</h2>
                </div>
            </div>
            @include('includes.alerts')

            <div class="col-md-6 m-auto pt-5">
                <form action="{{ route('question.update', $questionaire->id) }}" id="form" method="POST">
                    @method('PUT')
                    @csrf
                    <label class="fw-bold">Questionaire Title <span class="red">*</span></label>
                    <input
                      type="text"
                      placeholder="Enter Questionaire Title e.g. Basic Questions"
                      name="question"
                      required=""
                      value="{{ old('questionaire', $questionaire->title) }}"
                      class="border-radius mb-5 mb-20 dark-grey"
                    />
                    <div class="questionaire-container">
                    @if ($questionaire->questions->count())
                    @foreach ($questionaire->questions as $k => $question)
                    <div class="questionaire-item">
                        <div class="d-flex question-repeat align-items-center">
                          <div class="col-md-11">
                            <label class="fw-bold">{{ $k+1 }}. Edit Question</label>
                          </div>
                          @if ($k == 0)

                          <div class="col-md-1">
                                <a href="##" class="light-grey plus-btn btn-primary add-questions-btn text-center pt-2 pb-2"
                                >
                                <i class="uil uil-plus text-black text-18 fw-bold"></i
                                ></a>
                            </div>
                            @else
                            <div class="col-md-1">
                                <a href="##" class="light-grey plus-btn btn-danger shadow-lg remove-questions-btn text-center pt-2 pb-2"
                                ><i class="uil uil-minus text-black btn-sm text-18 fw-bold"></i
                                ></a>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-12">
                          <input
                            type="text"
                            placeholder="Type Here"
                            name="questions[{{ $k }}][input]"
                            required=""
                            value="{{ old('questionaire.'.$k.'.input', $question->question) }}"
                            class="border-radius mb-5 mb-20 dark-grey"
                          />
                            <input type="hidden" name="questions[{{ $k }}][id]" value="{{ $question->id }}">
                        </div>
                    <div class="text-center col-md-12 col-sm-12 center-title">
                      <a href="##" class="m-0 text-decoration-underline text-black"
                        >Type Possible Answers</a>
                        <a href="##" class="d-inline-block float-right add-btn text-right">+Add</a>
                    </div>
                    <div class="question-container">
                    @foreach ($question->answers as $key => $answer)

                        <div class="col-md-12">
                            <input
                            type="text"
                            placeholder="Type Here"
                            name="questions[{{ $k }}][answers][{{ $key }}][input]"
                            required=""
                            value="{{ old("questions.". $k .".answers.{$key}.input", $answer?->answer) }}"
                            class="border-radius mb-3 mb-20 dark-grey"
                            />
                            <input type="hidden" name="questions[{{ $k }}][answers][{{ $key }}][id]" value="{{ $answer->id }}">
                            <a href="##" class="d-inline-block float-right remove-btn text-right">-Remove</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                    @endforeach
                    @else
                    <div class="questionaire-item">
                        <div class="d-flex question-repeat align-items-center">
                            <div class="col-md-11">
                                <label class="fw-bold">1. Create Question</label>
                            </div>
                            <div class="col-md-1">
                                <a href="##" class="light-grey plus-btn shadow-lg text-center pt-2 pb-2"
                                ><i class="uil uil-plus text-black btn-sm text-18 fw-bold add-questions-btn"></i
                                ></a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input
                                type="text"
                                placeholder="Type Here"
                                name="questions[0][input]"
                                required=""
                                class="border-radius mb-5 mb-20 dark-grey"
                            />
                        </div>
                        <div class="text-center col-md-12 col-sm-12 center-title">
                            <a href="##" class="m-0 text-decoration-underline text-black"
                                >Type Possible Answers</a
                            >
                            <a href="##" class="d-inline-block float-right add-btn text-right">+Add</a>
                        </div>
                        <div class="question-container">
                            <div class="col-md-12">
                                <input
                                    type="text"
                                    placeholder="Type Here"
                                    name="questions[0][answers][0][input]"
                                    required=""
                                    class="border-radius mb-3 mb-20 dark-grey"
                                />
                                <a href="##" class="d-inline-block float-right remove-btn text-right">-Remove</a>
                            </div>
                            <div class="col-md-12">
                                <input
                                    type="text"
                                    placeholder="Type Here"
                                    name="questions[0][answers][1][input]"
                                    required=""
                                    class="border-radius mb-3 mb-20 dark-grey"
                                />
                                <a href="##" class="d-inline-block float-right remove-btn text-right">-Remove</a>
                            </div>
                        </div>
                    </div>
                    @endif
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
                let question_length = $(this).parents('.questionaire-item').index() || 0;
                let answer_length = $(this).parents('.questionaire-item').find('.remove-btn').length || 0;
                $(this).parent().siblings('.question-container').append(`
                    <div class="col-md-12 question-container">
                      <input
                        type="text"
                        placeholder="Type Here"
                        name="questions[${question_length}][answers][${answer_length}][input]"
                        required=""
                        class="border-radius mb-3 mb-20 dark-grey"
                      />
                      <a href="##" class="text-right d-block remove-btn">-Remove</a>
                    </div>
                `);
            });
            $(document).on('click','.add-questions-btn', function() {
                let length = $('.questionaire-item').length || 1;
                $('.questionaire-container').append(`
                    <div class="questionaire-item">
                        <div class="d-flex question-repeat align-items-center">
                            <div class="col-md-10">
                                <label class="fw-bold">${length+1}. Create Question</label>
                            </div>
                            <!-- <div class="col-md-1">
                                <a href="##" class="light-grey plus-btn shadow-lg text-center pt-2 pb-2"
                                ><i class="uil uil-plus text-black btn-sm text-18 fw-bold add-questions-btn"></i
                                ></a>
                            </div> -->
                            <div class="col-md-1 offset-md-1">
                                <a href="##" class="light-grey plus-btn btn-danger shadow-lg remove-questions-btn text-center pt-2 pb-2"
                                ><i class="uil uil-minus text-black btn-sm text-18 fw-bold"></i
                                ></a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input
                                type="text"
                                placeholder="Type Here"
                                name="questions[${length}][input]"
                                required=""
                                class="border-radius mb-5 mb-20 dark-grey"
                            />
                        </div>
                        <div class="text-center col-md-12 col-sm-12 center-title">
                            <a href="##" class="m-0 text-decoration-underline text-black"
                                >Type Possible Answers</a
                            >
                            <a href="##" class="d-inline-block float-right add-btn text-right">+Add</a>
                        </div>
                        <div class="question-container">
                            <div class="col-md-12">
                                <input
                                    type="text"
                                    placeholder="Type Here"
                                    name="questions[${length}][answers][0][input]"
                                    required=""
                                    class="border-radius mb-3 mb-20 dark-grey"
                                />
                                <a href="##" class="d-inline-block float-right remove-btn text-right">-Remove</a>
                            </div>
                            <div class="col-md-12">
                                <input
                                    type="text"
                                    placeholder="Type Here"
                                    name="questions[${length}][answers][1][input]"
                                    required=""
                                    class="border-radius mb-3 mb-20 dark-grey"
                                />
                                <a href="##" class="d-inline-block float-right remove-btn text-right">-Remove</a>
                            </div>
                        </div>
                    </div>
                `);
            })
            $(document).on('click', '.remove-btn', function() {
                $(this).parent().remove();
            });

            $(document).on('click', '.remove-questions-btn', function() {
                if (confirm('Are you sure you want to remove?')) {
                    $(this).closest('.questionaire-item').remove();
                }
            });
        });
    </script>
@endpush

@push('css')
<style>
    .questionaire-item{
        margin-bottom:20px;
        border:1px solid #636262;
        display: inline-block;
        width: 100%;
    }
</style>

@endpush
