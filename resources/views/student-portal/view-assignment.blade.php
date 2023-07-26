@extends('layouts.student-portal')
@section('title',$assignment->title)
@section('content')


    <div class="row">

        <div class="col-md-6">
            <div class="card shadow blur mb-4 ">
                <div class="card-header border-bottom"">
                    <h5 class="card-title">{{__('Assignment Details')}}</h5>
                </div>
                <div class="card-body">

                    <h3 class="mb-4">
                        {{$assignment->title}}
                    </h3>
                    <div class="row">

                        <div class="col">
                            <div class="alert bg-info-light text-info-light fw-bolder " >


                                {{__('Maximum Marks')}}:
                                @if(!empty($assignment->marks))
                                    {{$assignment->marks}}
                                    @endif
                            </div>

                        </div>
                        <div class="col">

                            <div class="alert  bg-pink-light text-danger fw-bolder " >


                                {{__('Deadline')}}:
                                @if(!empty($assignment->end_date))
                                    {{(\App\Supports\DateSupport::parse($assignment->end_date))->format(config('app.date_format'))}}@endif
                            </div>

                        </div>

                    </div>

                    <div class="mb-4">
                        {!! $assignment->description !!}
                    </div>
                </div>
            </div>

        </div>


    <div class="col-md-6">
        @if(!empty($assignment_mark))
            <div class="card shadow mb-4">
                <div class="card-header border-bottom">
                    <h5 class="card-title">{{__('Result')}}</h5>
                </div>
                <div class="card-body">

                    <div class="card bg-success-light">
                        <div class="card-body">
                            <h6 class="text-success">{{__('Marks Received')}}:  {{$assignment_mark->marks}}</h6>
                        </div>
                    </div>

                    <h6 class="mt-4">{{__('Comments')}}</h6>

                    {!! $assignment_mark->comments !!}

                </div>

            </div>
        @endif
            @if(empty($assignment_mark))
                <div class="card shadow blur mb-4">
                    <div class="card-header border-bottom">
                        <h5 class="card-title">{{__('Submission')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">

                            <form method="post" action="/student/submit-assignment" enctype="multipart/form-data">

                                @if ($errors->any())
                                    <div class="alert bg-pink-light text-danger">
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">{{__('Answer Details')}}</label>

                                    <textarea class="form-control" name="description" id="description" rows="18">
                                        @if(!empty($assignment_submission))
                                            {{$assignment_submission->description ?? old('description') ?? ''}}
                                        @endif
                                        </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">{{__('Attach file')}}</label>
                                    <input class="form-control" name="file" type="file" id="formFileMultiple">
                                </div>

                                @csrf
                                @if(!empty($assignment_submission))
                                    <input type="hidden" name="id" value="{{$assignment_submission->id}}">
                                @endif
                                <input type="hidden" name="assignment_id" value="{{$assignment->id}}">


                                <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                            </form>

                        </div>
                    </div>
                </div>

            @endif


    </div>



@endsection

@section('script')

    <script>

        $(function () {
            "use strict";


            flatpickr("#start_date", {

                dateFormat: "Y-m-d",
            });

            flatpickr("#end_date", {

                dateFormat: "Y-m-d",
            });


            tinymce.init({
                selector: '#description',


                plugins: 'table,code',
                branding: false,
                menubar:false,

            });

        });


    </script>

@endsection

