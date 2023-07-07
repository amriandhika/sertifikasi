@extends('layouts.admin-portal')
@section('title',$assignment_submission->title)
@section('content')

    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-bottom">
                <h5 class="card-title">{{__('Assignment Details')}}</h5>
                </div>
            <div class="card-body">

                <h3 class="mb-4">
                    {{$assignment_submission->title}}
                </h3>
                <div class="row">

                    <div class="col">
                        <div class="alert bg-info-light text-info-light fw-bolder " >

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            {{__('Maximum Marks')}}:
                            @if(!empty($assignment->marks))
                                {{$assignment->marks}}
                            @endif
                        </div>

                    </div>
                    <div class="col">

                        <div class="alert  bg-success-light text-success fw-bolder " >

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            {{__('Submitted at')}}:
                            @if(!empty($assignment_submission->created_at))
                                {{(\App\Supports\DateSupport::parse($assignment_submission->updated_at))->format(config('app.date_format'))}}@endif
                        </div>

                    </div>

                </div>

                <div class="mb-4">
                    {!! $assignment_submission->description !!}
                </div>
            </div>
        </div>

    </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="text-center">
                        <!-- Buttons -->
                        <a href="{{PUBLIC_DIR}}/uploads/{{$assignment_submission->file}}" class="btn btn-success mb-sm-0 me-00 ">

                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            {{__(' View Uploaded file')}}</a>


                    </div>



                </div>

            </div>
            <form action="/save-assignment-mark" method="post">
                <div class="card">

                    @if ($errors->any())
                        <div class="alert bg-pink-light text-danger fw-bolder">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header border-bottom">
                        <h5 class="card-title">{{__('Evaluate Assignment')}}</h5>
                    </div>

                    <div class="card-body">


                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{__('Marks')}}</label>
                            <input type="number" class="form-control" name="marks"
                                   value="{{$assignment_mark->marks ?? old('marks') ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">{{__('Comments')}}</label>
                            <textarea class="form-control" name="comments" id="exampleFormControlTextarea1" rows="12">{{$assignment_mark->comments ?? old('comments') ?? ''}}</textarea>
                        </div>

                        @csrf
                        @if($assignment_mark)
                            <input type="hidden" name="id" value="{{$assignment_mark->id}}">
                        @endif
                        <input type="hidden" name="assignment_id" value="{{$assignment_submission->id}}">
                        <input type="hidden" name="student_id" value="{{$assignment_submission->student_id}}">

                        <div class="d-flex  mt-4">
                            <button type="submit" name="button" class="btn btn-blue btn-sm m-0 ">
                                {{__('Save')}}
                            </button>
                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

@endsection