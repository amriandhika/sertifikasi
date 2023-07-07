@extends('layouts.student-portal')
@section('title',__('Courses'))
@section('content')
    <div class=" row mb-2">
        <div class="col">
            <h5 class="  fw-bolder">
                {{__('Courses')}} /<span class="text-secondary">
                      {{__('My Course List')}}
                    </span>
            </h5>
            <p class="text-muted">{{__('All of my enrolled courses')}}</p>

        </div>
        <div class="col text-end">

            <a href="/course" type="button" class="btn btn-info btn-rounded"><i class="fas fa-plus"></i>&nbsp;{{__('Enroll for more')}}</a>

        </div>
    </div>

    <div class="row">
        @foreach($courses as $course)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <a href="/student/my-course-details?id={{$course->id}}">
                    <div class="card card-blog card-plain ">
                        <div class="position-relative">
                            <div class="d-block shadow-xl border-radius-xl">
                                @if(empty($course->image))
                                    <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                         class="w-100 border-radius-lg shadow-sm mt-3">
                                @else
                                    <img src="{{PUBLIC_DIR}}/uploads/{{$course->image}}" class="w-100 border-radius-lg shadow-sm mt-3">
                                @endif
                            </div>
                        </div>
                        <div class="card-body px-1 pb-0">
                            <p class="text-purple mb-2 text-sm">
                                @if(!empty($categories[$course->category_id]))
                                    <span class="badge bg-purple-light">
                                @if(isset($categories[$course->category_id]))
                                            {{$categories[$course->category_id]->name}}
                                        @endif
                                </span>

                                @endif
                            </p>
                            <h5>
                                <strong>{{$course->name}}</strong>
                            </h5>
                            <div class="row mb-0">
                                <div class="col">
                                    {!! renderRating($course->id) !!}
                                </div>
                                <div class="col text-end me-2">
                                    {!! getCourseRating($course->id) !!}.{{__('0/5.0')}}

                                </div>

                            </div>
                            <div class=" pt-0 pb-3">
                                <hr>
                                <div class="d-flex justify-content-between">

                                    <span class="h5 fw-bolder mb-0">{{formatCurrency($course->price,getWorkspaceCurrency($settings))}} </span>

                                    <span class="h6 fw-light mb-0">

<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                               @if(!empty($course))
                                            {!! getTotalLesson($course->id) !!}


                                        @endif{{__('Lessons')}}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
@endsection
