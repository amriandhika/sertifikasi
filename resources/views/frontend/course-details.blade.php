@extends('frontend.layout')
@section('title',$course->name)
@section('content')
    <div class="bg-dark-alt position-relative">
        <div class="pb-lg-9 pb-7 pt-5 postion-relative z-index-2">
            <div class="row mt-4 ms-4">
                <div class="col-md-10 mx-auto text-start mt-6">

                    <h2 class="text-white ">
                        @if(!empty($course->name))
                            {{$course->name}}
                        @endif
                    </h2>

                    <!-- Content -->
                    <ul class="list-inline mb-0">

                        <li class="list-inline-item text-success fw-bold h6  mb-1 mb-sm-0">{{__('Last updated')}} {{$course->updated_at}}</li>

                    </ul>
                    <div class="row mb-4 mt-3">
                        <div class="col-auto">
                            <span class="h6 text-white">{{$rating_out_of_five}}/5</span>

                                        <span class="h6">

                                             <span class="rating text-warning">
                                            @if($rating_out_of_five > 0)
                                                     <i class="fas fa-star" aria-hidden="true"></i>
                                                 @else
                                                     <i class="far fa-star" aria-hidden="true"></i>
                                                 @endif

                                                 @if($rating_out_of_five > 1)
                                                     <i class="fas fa-star" aria-hidden="true"></i>
                                                 @else
                                                     <i class="far fa-star" aria-hidden="true"></i>
                                                 @endif

                                                 @if($rating_out_of_five > 2)
                                                     <i class="fas fa-star" aria-hidden="true"></i>
                                                 @else
                                                     <i class="far fa-star" aria-hidden="true"></i>
                                                 @endif

                                                 @if($rating_out_of_five > 3)
                                                     <i class="fas fa-star" aria-hidden="true"></i>
                                                 @else
                                                     <i class="far fa-star" aria-hidden="true"></i>
                                                 @endif

                                                 @if($rating_out_of_five > 4)
                                                     <i class="fas fa-star" aria-hidden="true"></i>
                                                 @else
                                                     <i class="far fa-star" aria-hidden="true"></i>
                                                 @endif


                                        </span>
                                        </span>

                        </div>

                        <div class="col-auto">
                            <span class="h6 text-white">{{$total_reviews}}</span>
                            <span>{{__('Reviews')}}</span>
                        </div>


                    </div>
                    @if(!empty($categories[$course->category_id]))
                        <span class="badge bg-purple-light">
                        @if(isset($categories[$course->category_id]))
                                {{$categories[$course->category_id]->name}}
                            @endif
                        </span>
                        @endif
                </div>
            </div>
        </div>

    </div>

    <div class="container col-md-10 g-4 mt-sm-n5 mt-n7">
        <div class="row">
            <!-- Main content START -->
            <div class="col-md-8 ">

                <div class="row ">
                    <!-- Image and video -->
                    <div class="col-12 position-relative">
{{--                        @if(empty($course->video))--}}
{{--                            <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"--}}
{{--                                 class="w-100 border-radius-lg shadow-lg mt-3">--}}
{{--                        @else--}}
{{--                            <iframe class="embed-responsive-item w-100  border-radius-lg shadow-lg mt-3" src="{{PUBLIC_DIR}}/uploads/{{$course->video}}" type="video/mp4">--}}

{{--                            </iframe>--}}

{{--                        @endif--}}

                        @if(empty($course->video))
                            @if(!empty($course->image))
                                <img src="{{PUBLIC_DIR}}/uploads/{{$course->image}}" class="w-100  border-radius-md ">
                            @endif
                        @else
                            <video class="w-100 border-radius-lg shadow-lg" controls>
                                <source src="{{PUBLIC_DIR}}/uploads/{{$course->video}}" type="video/mp4">

                            </video>

                            <div class="bg-overlay bg-dark "></div>
                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                <!-- Video button and link -->
                                <div class="m-auto">
                                    <a href="{{PUBLIC_DIR}}/uploads/{{$course->video}}" class="btn btn-lg text-danger btn-round btn-white-shadow mb-0" data-glightbox="" data-gallery="course-video">
                                        <div
                                                class="avatar avatar-lg bg-info-light rounded-circle  border-radius-md p-2 ">
                                            <i class="fas fa-play text-info-light"></i>
                                        </div>

                                    </a>
                                </div>
                            </div>

                        @endif
                    </div>

                    <!-- About course START -->
                    <div class="col-12">
                        <div class="card">
                            <!-- Card header START -->
                            <div class="card-header border-bottom">
                                <h4 class="mb-0">{{__('Description')}}</h4>
                            </div>
                            <!-- Card header END -->

                            <!-- Card body START -->
                            <div class="card-body">
                                <p class="mb-0">
                                @if(!empty($course->description))
                                    {!! $course->description !!}
                                @endif

                            </div>
                            <div class="row card-body">
                                <div class="col-md-6 col-12">
                                    <h6 class="text-dark text-uppercase">{{__('What you will learn')}}</h6>
                                </div>

                            </div>

                            <div class="row ms-3">
                                @if($course->outcomes)

                                    @foreach(json_decode($course->outcomes) as $feature)

                                        <div class="col-lg-6 col-md-6 col-12 ps-0">
                                            <div class="d-flex align-items-center p-2">
                                                <div class="icon icon-shape icon-xs rounded-circle bg-success text-center">
                                                    <i class="fas fa-check fw-bolder text-white "></i>
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
                        </div>
                    </div>
                    <!-- About course END -->

                    <!-- lessons START -->
                    <div class="col-12 mt-3">
                        <div class="card rounded-3">
                            <!-- Card header START -->
                            <div class="card-header border-bottom">
                                <h4 class="mb-0">{{__('Lessons')}}</h4>
                            </div>
                            <!-- Card body START -->

                            <div class="row g-5">
                                <!-- Lecture item START -->
                                <div class="col-12">
                                    <!-- Curriculum item -->
                                    @foreach($lessons as $lesson)

                                        <div class="accordion accordion-icon accordion-border" id="lesson_{{$lesson->id}}">
                                            <!-- Item -->
                                            <div class="accordion-item">
                                                <h6 class="accordion-header font-base" id="heading-1">
                                                    <button class="accordion-button fw-bold rounded d-flex collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$lesson->id}}"  aria-controls="collapse-1">
                                                        <div class="d-sm-flex justify-content-sm-between align-items-center">
                                                            <div class="d-flex">
                                                                <div class="avatar avatar-md bg-pink-light  border-radius-md p-2 ">
                                                                    <i class="fas fa-lock text-danger"></i>
                                                                </div>
                                                                <div class="ms-3 mt-1 mt-sm-0">
                                                                    <h6 class="mb-0">{{$lesson->title}}</h6>

                                                                    <p>
                                                                        {{$lesson->duration}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <!-- Button -->

                                                        </div>

                                                    </button>
                                                </h6>

                                                <div id="collapse-{{$lesson->id}}" class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordionExample2">
                                                    <div class="accordion-body ">
                                                        <!-- Course lecture -->
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <!-- Video button -->


                                                                <!-- Content -->
                                                                <p class="">{!! $lesson->summary !!}</p>
                                                            </div>

                                                            <!-- Actions Mark button -->
                                                            <a href="#" class="p-2 mb-0 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Completed">
                                                                <i class="bi bi-check-circle-fill"></i>
                                                            </a>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    {{--                                            <div class="d-sm-flex justify-content-sm-between align-items-center">--}}
                                    {{--                                                <div class="d-flex">--}}
                                    {{--                                                    <div class="avatar avatar-md bg-pink-light  border-radius-md p-2 ">--}}
                                    {{--                                                        <i class="fas fa-lock text-danger"></i>--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                    <div class="ms-3 mt-1 mt-sm-0">--}}
                                    {{--                                                        <a href="/add-to-cart/{{$course->id}}?type=course">--}}
                                    {{--                                                            <h6 class="mb-0">{{$lesson->title}}</h6>--}}
                                    {{--                                                        </a>--}}

                                    {{--                                                        <p>--}}
                                    {{--                                                            {{$lesson->duration}}--}}
                                    {{--                                                        </p>--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <!-- Button -->--}}

                                    {{--                                            </div>--}}
                                    <!-- Divider -->
                                    {{--                                            <p class="">{!! $lesson->summary !!}</p>--}}
                                    {{--                                            <hr>--}}
                                @endforeach

                                <!-- Curriculum item -->
                                </div>
                            </div>
                            <!-- Card body START -->
                        </div>
                    </div>
                    <!-- FAQs END -->
                </div>
            </div>

            <div class="col-xl-4">
                <div class="row g-4">
                    <div class="col-md-6 col-xl-12">
                        <!-- Course info START -->
                        <div class="card card-body p-4 shadow-xl">
                            <!-- Price and share button -->
                            <div class="d-flex justify-content-between ">
                                <!-- Price -->
                                <h3 class="fw-bold mb-0 me-2"
                                >@if(!empty($course->price))
                                        {{formatCurrency($course->price,getWorkspaceCurrency($super_settings))}}

                                    @endif
                                </h3>

                            </div>

                            <!-- Buttons -->
                            <div class="mt-3 d-grid">
                                <a href="/add-to-cart/{{$course->id}}?type=course" class="btn  bg-purple-light text-purple shadow-none mb-2">{{__('Add to cart')}}</a>
                                @if($course->price > 0)
                                    <a href="/add-to-cart/{{$course->id}}?type=course" class="btn btn-dark">{{__('Buy now')}}</a>
                                @endif
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
                                            @if(!empty($course))
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
                                <li class=" list-group-item px-0 d-flex justify-content-between">
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

                                <li class=" list-group-item px-0 d-flex justify-content-between">
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
                                    @if(!empty($users[$course->admin_id]->photo))
                                        <a href="javascript:" class="ms-3 mt-4 avatar rounded-circle border border-secondary">
                                            <img alt="" class="p-1" src="{{PUBLIC_DIR}}/uploads/{{$users[$course->admin_id]->photo}}">
                                        </a>
                                    @else
                                        <div class="avatar ms-3   mt-4 rounded-circle bg-info-light  border-radius-md p-2">
                                            <h6 class="text-info mt-1">{{$users[$course->admin_id]->first_name[0]}}{{$users[$course->admin_id]->last_name[0]}}</h6>
                                        </div>
                                    @endif

                                </div>

                                <div class="ms-sm-3 mt-2 mt-sm-0 fw-bolder">
                                   {{__('By')}} {{$users[$course->admin_id]->first_name}} {{$users[$course->admin_id]->last_name}}

                                </div>
                            </div>

                            <!-- Rating and follow -->

                        </div>
                        <!-- Course info END -->
                    </div>

                </div>
            </div>
            <!-- Right sidebar END -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mt-4">

                    <div>
                        <h4 class="mb-5">{{__('Student Feedback')}}</h4>
                        @foreach($reviews as $review)
                            <div class="d-flex mt-6">
                                <div>
                                    <a href="javascript:;">
                                        <div class="position-relative">
                                            <div class="avatar rounded-circle">
                                                @if(!empty($students[$review->student_id]))

                                                    @if(isset($students[$review->student_id]->photo))

                                                        <img alt="" class=" avatar shadow " src="{{PUBLIC_DIR}}/uploads/{{$students[$review->student_id]->photo}}">
                                                    @else
                                                        <div class="avatar  rounded-circle bg-purple-light  border-radius-md ">
                                                            <h6 class="text-purple mt-1">{{$students[$review->student_id]->first_name[0]}}{{$students[$review->student_id]->last_name[0]}}</h6>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ms-3">
                                    <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                                        <h5 class="me-3 mb-0">

                                            @if(!empty($students[$review->student_id]))

                                                @if(isset($students[$review->student_id]))
                                                    {{$students[$review->student_id]->first_name}} {{$students[$review->student_id]->last_name}}
                                                @endif

                                            @endif
                                        </h5>
                                        <!-- Review star -->
                                        <div class="rating list-inline mb-0">
                                            @foreach(range(1,5) as $i)
                                                @if($i <= $review->star_count)
                                                    <i class="fas fa-star text-warning"></i>
                                                @else
                                                    <i class="far fa-star text-warning"></i>
                                                @endif
                                            @endforeach

                                        </div>

                                    </div>

                                    <p class="small mb-2">{{$review->updated_at->diffForHumans()}}</p>

                                    <p>{!! $review->review !!}</p>

                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection




