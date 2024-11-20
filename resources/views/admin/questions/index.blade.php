@extends('layouts.app')

@section('title', 'Questions')


@section('content')
    @if ($questions->count())
    <section class="main-body question-list">
        <div class="container">
            <div class="d-flex heading justify-content-between align-items-center mt-3 mb-5 flex-wrap">
                <a href="{{ route('admin.index') }}"
                    class="col-md-1 d-block back-blue back-button d-flex justify-content-center align-items-center "><i
                        class="uil uil-angle-left white-text"></i></a>
                <div class="text-center col-md-9 col-sm-12 center-title">
                    <h2 class="m-0">Questions</h2>
                </div>
                <div class="text-center col-md-2 col-sm-12 center-title"><a href="{{ route('question.create') }}"
                        class="m-0 text-decoration-underline">Create New</a></div>

            </div>

            @include('includes.alerts')

            <table>

                <thead>
                    <tr>
                        <th scope="col" class="text-left">Question</th>
                        <th scope="col">Asnwers</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                    <tr>

                        <td data-label="Account" class="text-left">{{ $question->question }} </td>
                        <td data-label="Amount">{{ implode(', ', $question->answers->pluck('answer')->toArray()) }}</td>
                        <td data-label="Amount">{{ $question->created_at->format('Y-m-d') }}</td>
                        <td>
                            <div class=" d-flex justify-content-center text-right">
                                <a href="{{ route('question.edit', $question->id) }}" class="d-block back-blue p-3 pt-2 pb-2 border-radius me-2"> <i
                                        class="uil uil-pen white-text"></i></a>
                                <a href="#" data-question="{{ $question->question }}" data-bs-toggle="modal"
                                    data-bs-target="#confirm-delete" data-id="{{ $question->id }}"
                                    class="d-block back-blue p-3 pt-2 pb-2 border-radius delete-btn"> <i
                                        class="uil uil-trash-alt white-text"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>





        </div>


        <div class="col-md-2 d-flex col-sm-12">


            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="" id="questionDeleteForm">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header text-center col-md-12 justify-content-center border-0 mt-3">
                                <a href="##" class="d-block back-blue p-3 pt-2 pb-2 border-radius me-2 text-center"> <i
                                        class="uil uil-trash-alt white-text"></i></a>
                            </div>
                            <div class="modal-body text-center  border-0">
                                <p>Are You Sure You Want To Delete This question<br><strong>Demographic Questionnaire</strong> ?
                                </p>
                            </div>
                            <div class="modal-footer  border-0 d-flex justify-content-center mb-3">
                                <button type="submit" data-bs-dismiss="modal"
                                    class="back-blue white-text fw-bold text-16 col-md-3 border-radius">Cancel</button>
                                <button type="submit"
                                    class="back-blue white-text fw-bold text-16 col-md-3  border-radius">Delete</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


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
                        <h2 class="m-0">Questions</h2>
                    </div>
                </div>

                <div class="text-center add-block">
                    <a href="{{ route('question.create') }}" class="light-grey plus-btn text-center pt-2 pb-2"><i
                            class="uil uil-plus text-blue"></i></a>
                    <div class="text-center mt-3">
                        <h2>Create Question</h2>
                    </div>
                </div>
            </div>
        </section>
    @endif


@endsection

@push('css')
    <style>
        tr > td {
            word-wrap: break-word;
        }
    </style>
@endpush

@push('scripts')
<script>
    $(function() {
        $(document).on('click', '.delete-btn', function() {
            var questionId = $(this).data('id');
            var questionName = $(this).data('question');
            $('#questionDeleteForm').attr('action', "{{ url('admin/question') }}/"+questionId)
            $('#questionIdModal').val(questionId);
            $('.modal-body strong').text(questionName);
        })
    })
</script>
@endpush
