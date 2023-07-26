@extends('layouts.student-portal')
@section('title',__('Certificate'))

@section('content')

    <div class=" row mb-2 d-print-none">
        <div class="col">
            <h5 class="  fw-bolder">
                {{__('Certificates')}} /<span class="text-secondary">
                          {{__('My Certificate')}}
                    </span>
            </h5>
            <p class="text-muted">{{__('Print and share your certificate')}}</p>

        </div>

    </div>

    <div class=" col-lg-8 col-12 mx-auto mt-5 me-4 d-print-none">
        <ul class="flex-row text-center mt-6 nav ">
            @if (!empty($student->facebook))
                <li class="nav-item ">
                    <a class="nav-link " href="{{$student->facebook}}" target="_blank">
                        <button type="button" class="btn rounded-circle bg-info-alt btn-facebook btn-icon-only">
                            <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                        </button>
                    </a>
                </li>

            @endif

            @if (!empty($student->linkedin))
                <li class="nav-item">
                    <a class="nav-link " href="{{$student->linkedin}}" target="_blank">
                        <button type="button" class="btn rounded-circle bg-info btn-linkedin btn-icon-only">
                            <span class="btn-inner--icon"><i class="fab fa-linkedin text-white"></i></span>
                        </button>
                    </a>
                </li>

            @endif

            @if (!empty($student->twitter))
                <li class="nav-item">
                    <a class="nav-link " href="{{$student->twitter}}" target="_blank">
                        <button type="button" class="btn rounded-circle btn-twitter btn-icon-only">
                            <span class="btn-inner--icon"><i class="fab fa-twitter"></i></span>
                        </button>
                    </a>
                </li>

            @endif
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="window.print()" target="_blank">
                    <button type="button" class="btn rounded-circle btn-success btn-icon-only">
                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                    </button>
                </a>
            </li>


        </ul>

    </div>

    <div class=" col-lg-8 col-12 mx-auto mt-5 me-auto ms-auto mb-5">
        <div class="col-md-10">

            <div class="card border-5 border-radius-sm" @if(!empty( $certificate->background_color))
            style="background-color:
            {{ $certificate->background_color}};border-color: {{ $certificate->border_color}}"

                    @endif
            >

                <div class="card-body"
                     @if(!empty($course->certificate_background))
                         style="background-image: url({{PUBLIC_DIR}}/uploads/{{$course->certificate_background}});"
                     @endif
                >

                    <div class="row">
                        <div class="col-md-8">
                            <h4 class=" mt-4">
                                @if(!empty( $certificate->logo))
                                    <img src="{{PUBLIC_DIR}}/uploads/{{ $certificate->logo}}"
                                         class="w-50">
                                @else
                                    {{config('app.name')}}
                                @endif
                            </h4>
                            <p class="mb-3">
                                <small> {{__('Certificate of Completion')}}</small>
                            </p>
                        </div>
                        <div class="col-md-4">

                        </div>


                    </div>

                    <h2>
                        @if(!empty( $certificate_received->student_id))

                            @if(!empty($students[ $certificate_received->student_id]))
                                @if(isset($students[ $certificate_received->student_id]))
                                    {{$students[ $certificate_received->student_id]->first_name}}  {{$students[ $certificate_received->student_id]->last_name}}
                                @endif
                            @endif


                        @endif



                    </h2>

                    <p class="">
                        <small>{{__('has successfully completed the course')}} </small>
                    </p>
                    <h5 class="h6 text-decoration-underline">
                        @if(!empty( $certificate->course_id))

                            @if(!empty($courses[ $certificate->course_id]))
                                @if(isset($courses[ $certificate->course_id]))
                                    {{$courses[ $certificate->course_id]->name}}
                                @endif
                            @endif

                        @endif
                    </h5>
                    <p class="">
                        <small> {{$certificate_received->created_at->format('l, F j, Y')}}</small>
                    </p>

                    <p class="reason mb-4">
                        <br/>

                    </p>

                </div>




            </div>

        </div>
    </div>


@endsection
