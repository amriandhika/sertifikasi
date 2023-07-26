@extends('layouts.student-portal')
@section('title',$course->name)
@section('content')
    <section class="bg-dark-alt border-radius-sm py-0 py-sm-3">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8">
                    <!-- Badge -->

                        <!-- Title -->
                        <h2 class="text-white mt-3">
                            @if(!empty($course->name))
                                {{$course->name}}
                            @endif
                        </h2>

                        <!-- Content -->
                        <ul class="list-inline mb-0 ">
                            <li class="list-inline-item text-sm me-3 mb-1 mb-sm-0 text-white"><i class="bi bi-patch-exclamation-fill text-danger"></i>{{__('Updated')}}
                                @if(!empty($course->name))
                                    {{ \Carbon\Carbon::parse($course->updated_at)->diffForHumans() }}

                                @endif</li>

                        </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="mt-4">

        <div class="" data-sticky-container>
            <div class="row g-4">
                <!-- Main content START -->
                <div class="col-xl-8">

                    <div class="row g-4">
                        <!-- Title START -->
                        <!-- Title END -->
                        <!-- Image and video -->
                        <div class="col-12 position-relative">
                            @if(empty($course->image))
                                <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                     class="w-100 border-radius-sm">
                            @else
                                <img src="{{PUBLIC_DIR}}/uploads/{{$course->image}}" class="w-100  border-radius-sm ">
                            @endif
                        </div>

                        <!-- About course START -->

                        <div class="text-center">
                            <ul class="nav  mt-2 ">

                                <li class="nav-item">
                                    <a class="nav-link fw-bolder" href="/student/my-course-details/?id={{$course->id}}">{{__('Course Description')}}</a>
                                </li>

                                <li class="nav-item">
                                    <a href="" class=" @if(($selected_nav ?? '') === 'student-course-lessons') active @endif nav-link fw-bolder">{{__('Lessons')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/student/my-course-discussion/?id={{$course->id}}" class="nav-link fw-bolder">{{__('Comments')}}</a>
                                </li>

                            </ul>
                            <hr>
                        </div>
                        <!-- About course END -->

                        <!-- Curriculum START -->
                        <div class="col-12">
                            <div class="card rounded-3">
                                <!-- Card header START -->
                                <!-- Card body START -->
                                <div class="card-body">
                                    <div class="row g-5">
                                        <!-- Lecture item START -->
                                        <div class="col-12">

                                            <!-- Curriculum item -->
                                            @foreach($lessons as $less)

                                                <div class="d-sm-flex justify-content-sm-between align-items-center">
                                                    <div class="d-flex">
                                                        <div
                                                                class="avatar avatar-md bg-info-light  border-radius-md p-2 ">
                                                            <i class="fas fa-play text-info"></i>
                                                        </div>
                                                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                                                            <a href="/student/view-mylesson?id={{$less->id}}"> <h6 class="mb-0">{{$less->title}}</h6></a>
                                                            <p class="mb-2 mb-sm-0 small">
                                                                {{$less->duration}}</p>

                                                        </div>
                                                    </div>
                                                    <!-- Button -->
                                                    <a href="/student/view-mylesson?id={{$less->id}}" class="btn btn-sm btn-info mb-0">{{__('Learn')}}</a>
                                                </div>
                                                <p class="">{!! $less->summary !!}</p>
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
                        <!-- Curriculum END -->

                        <!-- FAQs START -->

                        <!-- FAQs END -->
                    </div>
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-xl-4">
                    <div data-sticky data-margin-top="80" data-sticky-for="768">
                        <div class="row g-4">
                            <div class="col-md-6 col-xl-12">
                                <!-- Course info START -->
                                <div class="card card-body p-4">
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
                                            <span> @if(!empty($course))
                                                    {!! getTotalLesson($course->id) !!}


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
                                        <div class="ms-sm-3 mt-2 mt-sm-0">
                                            <h5 class="mb-0"><a href="#">{{__('By')}}
                                                {{$users[$course->admin_id]->first_name}} {{$users[$course->admin_id]->last_name}}</h5>

                                        </div>
                                    </div>

                                    <!-- Rating and follow -->
                                    <div class="d-sm-flex justify-content-sm-between align-items-center mt-0 mt-sm-2">
                                        <!-- Rating star -->

                                        <div class="rating text-warning">
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


                                        </div>

                                        <!-- button -->
                                        <button  class="btn btn-sm btn-success mb-0 mt-2 mt-sm-0" data-bs-toggle="modal" data-bs-target="#review">{{__('Review')}}</button>

                                    </div>
                                <!-- Course info END -->
                            </div>
                                <div class="modal fade" id="review" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="/student/save-review" method="post">

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{__('Review this course')}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($errors->any())
                                                    <div class="alert bg-pink-light text-danger">
                                                        <ul class="list-unstyled">
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <label for="exampleFormControlTextarea1" class="form-label">{{__("Your Rating")}}</label>
                                                    <div class="rating text-warning">
                                                    <i class=" rating__star far  fa-star" ></i>
                                                    <i class=" rating__star far  fa-star" ></i>
                                                    <i class=" rating__star far  fa-star" ></i>
                                                    <i class=" rating__star far fa-star" ></i>
                                                    <i class=" rating__star far  fa-star" ></i>
                                                </div>

                                                <div class="mb-2 mt-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">{{__('Write your Review')}}</label>
                                                    <textarea class="form-control" name="review" id="exampleFormControlTextarea1" rows="4">{{$review->review ?? old('review') ?? ''}}</textarea>
                                                </div>

                                                <input type="hidden" id="star_count" name="star_count" value="{{$review->star_count ?? ''}}">

                                            </div>

                                            @csrf

                                            <input type="hidden" name="course_id" value="{{$course->id}}">

                                            <div class="ms-3 mb-4">
                                                <button type="button" class="btn btn-sm bg-pink-light text-danger shadow-none" data-bs-dismiss="modal">{{__('Cancel')}}</button>
                                                <button type="submit" class="btn btn-sm bg-purple-light text-purple shadow-none">{{__('Save Review')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <!-- Tags START -->
                            <div class="col-md-6 col-xl-12">
                                <div class="card card-body  p-4">
                                    <h5 class="mb-3">{{__('Category')}}</h5>
                                    <ul class="list-inline mb-0">

                                        <li class="list-inline-item">
                                            @if(!empty($categories[$course->category_id]))
                                                <span class="badge bg-purple-light mb-3 mt-4">
                        @if(isset($categories[$course->category_id]))
                                                        {{$categories[$course->category_id]->name}}
                                                    @endif
                                                    @endif
                    </span>
                                        </li>



                                    </ul>
                                </div>
                            </div>
                            <!-- Tags END -->
                        </div><!-- Row End -->
                    </div>
                </div>
                <!-- Right sidebar END -->

            </div><!-- Row END -->
        </div>
    </section>



@endsection
@section('script')
    <script>
        const ratingStars = [...document.getElementsByClassName("rating__star")];

        ratingStars.forEach(function(star, index) {
            star.addEventListener('click', function() {
                ratingStars.forEach(function(star) {
                    star.classList.remove('fas', 'fa-star');
                    star.classList.add('far', 'fa-star');
                });
                for (let i = 0; i <= index; i++) {
                    ratingStars[i].classList.remove('far', 'fa-star');
                    ratingStars[i].classList.add('fas', 'fa-star');
                }
                document.getElementById('star_count').value = index + 1;
            });
        });

        // Set star count

        if(document.getElementById('star_count').value > 0) {
            console.log(document.getElementById('star_count').value);
            for (let i = 0; i < document.getElementById('star_count').value; i++) {
                ratingStars[i].classList.remove('far', 'fa-star');
                ratingStars[i].classList.add('fas', 'fa-star');
            }
        }

    </script>

@endsection