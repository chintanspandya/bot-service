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
                <div class="text-center col-md-2 col-sm-12 center-title"><a href="{{ route('template.create') }}"
                        class="m-0 text-decoration-underline">Create New</a></div>

            </div>

            @include('includes.alerts')

            <table>

                <thead>
                    <tr>
                        <th scope="col" class="text-left">Title</th>
                        <th scope="col">Template Type</th>
                        <th scope="col">Message</th>
                        <th scope="col">Questions</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($templates as $template)
                    <tr>

                        <td data-label="Account" class="text-left">{{ $template->title }} </td>
                        <td data-label="Due Date">{{ $template->template_type }} </td>
                        <td data-label="Due Date">{!! $template->message !!} </td>
                        <td data-label="Amount">{{ json_encode($template->questions->pluck('question')->toArray()) }}</td>
                        <td data-label="Amount">{{ $template->contact_no }}</td>
                        <td data-label="Amount">{{ $template->created_at->format('Y-m-d') }}</td>
                        <td>
                            <div class=" d-flex justify-content-center text-right">
                                <a href="{{ route('template.edit', $template->id) }}" class="d-block back-blue p-3 pt-2 pb-2 border-radius me-2"> <i
                                        class="uil uil-pen white-text"></i></a>
                                <a href="#" data-href="delete.php?id=23" data-bs-toggle="modal"
                                    data-bs-target="#confirm-delete"
                                    class="d-block back-blue p-3 pt-2 pb-2 border-radius"> <i
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
                        <div class="modal-header text-center col-md-12 justify-content-center border-0 mt-3">
                            <a href="##" class="d-block back-blue p-3 pt-2 pb-2 border-radius me-2 text-center"> <i
                                    class="uil uil-trash-alt white-text"></i></a>
                        </div>
                        <div class="modal-body text-center  border-0">
                            <p>Are You Sure You Want To Delete <br>This <strong>Demographic Questionnaire</strong> Type?
                            </p>
                        </div>
                        <div class="modal-footer  border-0 d-flex justify-content-center mb-3">
                            <button type="submit" data-bs-dismiss="modal"
                                class="back-blue white-text fw-bold text-16 col-md-3 border-radius">Cancel</button>
                            <button type="submit"
                                class="back-blue white-text fw-bold text-16 col-md-3  border-radius">Delete</button>

                        </div>
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
