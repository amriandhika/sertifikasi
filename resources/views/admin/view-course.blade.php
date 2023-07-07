@extends('layouts.admin-portal')
@section('title',$course->name)

@section('content')

    <div class=" row mb-2">
        <div class="col">
            <h5 class="fw-bolder">
                {{__('Courses')}} /<span class="text-secondary">
                       {{__('Course Details')}}
                    </span>
            </h5>
            <p class="text-muted">{{__('Overview of the course.')}}</p>
        </div>
        <div class="col text-end">

            <a href="/create-lesson?course_id={{$course->id}}" class="btn btn-info " type="button" >{{__('Add Lesson')}}</a>
            <a href="/create-course?id={{$course->id}}" class="btn  btn-blue  ">{{__('Edit Course')}}</a>
        </div>
    </div>


    <section class="">
        <div class="" data-sticky-container>
            <div class="row g-4">
                <!-- Main content START -->
                <div class="col-xl-8">
                    <div class="row g-4">
                        <!-- Title START -->
                        <div class="col-12">
                            <!-- Title -->
                            <h3>
                                @if(!empty($course->name))
                                    {{$course->name}}
                                @endif
                            </h3>

                            <!-- Content -->
                            <ul class="list-inline mb-0">

                                <li class="list-inline-item fw-bold h6  mb-1 mb-sm-0">{{__('Last updated')}}  {{ \Carbon\Carbon::parse($course->updated_at)->diffForHumans() }}</li>

                            </ul>
                        </div>
                        <!-- Title END -->

                        <!-- Image and video -->
                        <div class="col-12 position-relative">
                            @if(empty($course->image))
                                <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                     class="w-100 border-radius-sm  mt-3">
                            @else
                                <img src="{{PUBLIC_DIR}}/uploads/{{$course->image}}" class="w-100  border-radius-sm mt-3">
                            @endif
                        </div>

                        <!-- About course START -->
                        <div class="col-12">
                            <div class="card mb-5">
                                <!-- Card header START -->
                                <div class="card-header border-bottom">
                                    <h4 class="mb-0">{{__('Course description')}}</h4>
                                </div>
                                <!-- Card header END -->

                                <div class="row card-body">
                                    <div class="">
                                        <div class="col-md-6 col-12">
                                            <h6 class="text-dark tet-uppercase">{{__('What will the student learn?')}}</h6>
                                        </div>

                                    </div>

                                    @if($course->outcomes)

                                        @foreach(json_decode($course->outcomes) as $feature)

                                            <div class="col-lg-6 col-md-6 col-12 ps-0">
                                                <div class="d-flex align-items-center p-2">
                                                    <div class="icon icon-shape icon-xs rounded-circle bg-success-light text-center">
                                                        <i class="fas fa-check fw-bolder text-success "></i>
                                                    </div>
                                                    <div>
                                                        <span class="ps-2">{{$feature}}</span>
                                                    </div>
                                                </div>

                                            </div>

                                        @endforeach

                                    @endif

                                </div>

                                <!-- Card body START -->
                                <div class="card-body">
                                    <p class="mb-0">
                                        @if(!empty($course->description))
                                            {!! $course->description !!}
                                        @endif
                                    </p>

                                </div>

                            </div>
                        </div>
                        <!-- About course END -->

                    </div>
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-xl-4">
                    <div data-sticky data-margin-top="80" data-sticky-for="768">
                        <div class="row g-4">
                            <div class="col-md-6 col-xl-12">
                                <!-- Course info START -->
                                <div class="card card-body  p-4">
                                    <!-- Price and share button -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- Price -->
                                        <h3 class="fw-bold mb-0 me-2"
                                        >@if(!empty($course->price))
                                                {{formatCurrency($course->price,getWorkspaceCurrency($settings))}}

                                            @endif
                                        </h3>
                                        <!-- Share button with dropdown -->
                                    </div>

                                    <!-- Divider -->
                                    <hr>

                                    <!-- Title -->
                                    <h5 class="mb-3">{{__('This course includes')}}</h5>
                                    <ul class="list-group  border-0">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0 ">

<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open text-info me-2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>

                                                {{__('Lessons')}}
                                            </span>
                                            <span>
                                                 @if(!empty($lesson->course_id))
                                                    {{$total_lessons}}
                                                @endif

                                            </span>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0">

<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock text-info me-2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                                {{__('Duration')}}
                                            </span>
                                            <span>
                                                @if(!empty($course->duration))
                                                    {{$course->duration}}
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0">

<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter text-info me-2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                                                {{__('Level')}}
                                            </span>
                                            <span>
                                                @if (!empty($course->level))
                                                    {{$course->level}}
                                                @endif
                                            </span>
                                        </li>

                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0">

<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar text-info me-2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                                {{__('Deadline')}}
                                            </span>
                                            <span>
                                                @if(!empty($course->deadline))
                                                    {{(\App\Supports\DateSupport::parse($course->deadline))->format(config('app.date_format'))}}
                                                @endif

                                            </span>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0">

<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award text-info me-2"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                                                {{__('Certificate')}}</span>
                                            <span>
                                                @if (!empty($course->certificate))
                                                    {{$course->certificate}}
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                    <!-- Divider -->
                                    <hr>

                                    <!-- Instructor info -->
                                    <div class="d-sm-flex align-items-center">
                                        <!-- Avatar image -->
                                        <div class="avatar avatar-xl">

                                            @if(!empty($user->photo))
                                                <a href="javascript:;" class="avatar avatar-sm rounded-circle border border-secondary">
                                                    <img alt="" class="p-1" src="{{PUBLIC_DIR}}/uploads/{{$user->photo}}">
                                                </a>
                                            @else
                                                <div class="avatar avatar-lg rounded-circle bg-purple-light  border-radius-md p-2">
                                                    <h6 class="text-info text-uppercase mt-1">{{$user->first_name[0]}}{{$user->last_name[0]}}</h6>
                                                </div>


                                            @endif

                                        </div>
                                        <div class="ms-sm-3 mt-2 mt-sm-0">
                                            <h5 class="mb-0"><a href="#">By
                                                    @if (!empty($user))
                                                        {{$user->first_name}} {{$user->last_name}}
                                                    @endif</a>
                                            </h5>
                                            <p class="mb-0 small"></p>
                                        </div>
                                    </div>

                                    <!-- Rating and follow -->
                                    <div class="d-sm-flex justify-content-sm-between align-items-center mt-0 mt-sm-2">
                                        <!-- Rating star -->
                                        <div class="row mb-0">
                                            {!! renderRating($course->id) !!}

                                        </div>

                                        <!-- button -->

                                        <a href="/create-course?id={{$course->id}}" class="btn btn-sm btn-blue mb-0 mt-2 mt-sm-0">{{__('Edit Course')}}</a>
                                    </div>
                                </div>
                                <!-- Course info END -->
                            </div>

                            <!-- Tags START -->
                            <div class="col-md-6 col-xl-12">
                                <div class="card card-body p-4">
                                    <h5 class="mb-3">{{__('Category')}}</h5>
                                    <ul class="list-inline mb-0">

                                        @if(!empty($categories[$course->category_id]))
                                            <span class="badge bg-purple-light">
                                @if(isset($categories[$course->category_id]))
                                                    {{$categories[$course->category_id]->name}}
                                                @endif
                            </span>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-12">
                                <div class="card rounded-3">
                                    <!-- Card header START -->
                                    <div class="card-header border-bottom">
                                        <h5 class="mb-0">{{__('Lessons')}}: {{$total_lessons}}</h5>
                                    </div>
                                    <!-- Card header END -->

                                    <!-- Card body START -->
                                    <div class="card-body">
                                        <div class="row g-5">
                                            <!-- Lecture item START -->
                                            <div class="col-12">

                                            <!-- Divider -->
                                                <!-- Curriculum item -->
                                                @foreach($lessons as $lesson)

                                                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                                                        <div class="d-flex">
                                                            <div
                                                                    class="avatar avatar-md bg-info-light  border-radius-md p-2 ">
                                                                <i class="fas fa-play text-info"></i>
                                                            </div>
                                                            <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                                                                <a href="/view-lesson?id={{$lesson->id}}"> <h6 class="mb-0">{{$lesson->title}}</h6></a>
                                                                <p class="mb-2 mb-sm-0 small">
                                                                    {{$lesson->duration}}</p>
                                                            </div>
                                                        </div>
                                                        <!-- Button -->

                                                        <div class="dropstart">
                                                            <a href="javascript:" class="text-secondary" id="dropdownMarketingCard"
                                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3"
                                                                aria-labelledby="dropdownMarketingCard">
                                                                <li><a class="dropdown-item border-radius-sm"
                                                                       href="/create-lesson?course_id={{$course->id}}&id={{$lesson->id}}">{{__('Edit')}}</a></li>

                                                                <li><a class="dropdown-item border-radius-sm"
                                                                       href="/view-lesson?id={{$lesson->id}}">{{__('See Details')}}</a>
                                                                </li>


                                                            </ul>
                                                        </div>


                                                    </div>

                                                    <!-- Divider -->
                                                    <hr>

                                            @endforeach

                                            <!-- Curriculum item -->

                                            </div>


                                        </div>
                                    </div>
                                    <!-- Card body START -->
                                </div>
                            </div>
                            <!-- Tags END -->
                        </div><!-- Row End -->
                    </div>
                </div><!-- Right sidebar END -->

            </div><!-- Row END -->
        </div>
    </section>
@endsection
