@extends('layouts.student-portal')
@section('content')
    <section class="bg-dark-alt border-radius-sm py-0 py-sm-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
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

        <div class="">
            <div class="row g-4">
                <!-- Main content START -->
                <div class="col-md-12">

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
                                    <a href="/student/my-course-lessons/?id={{$course->id}}" class="  nav-link fw-bolder">{{__('Lessons')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="@if(($selected_nav ?? '') === 'student-course-discussion') active @endif nav-link fw-bolder">{{__('Discussions')}}</a>
                                </li>

                            </ul>
                            <hr>
                        </div>
                        <!-- About course END -->

                        <div class="row">

                            <div class="col-md-4">
                                <div class="card card-body">
                                    <div >
                                        <div class="card shadow h-100">

                                            <!-- Card header -->
                                            <div class="card-header border-bottom d-flex justify-content-between align-items-center p-4">
                                                <h6 class="card-header-title">{{__('All Instructors')}}</h6>

                                            </div>


                                            <!-- Card body START -->
                                            <div class="card-body p-4">


                                                <!-- Instructor item START -->
                                                @foreach($users as $user)

                                                    <div  class= " d-sm-flex justify-content-between align-items-center mb-3">
                                                        <!-- Avatar and info -->
                                                        <div class= " d-sm-flex align-items-center mb-1 mb-sm-0">
                                                            <!-- Avatar -->
                                                            @if(empty( $user->photo))
                                                                <div
                                                                        class="avatar rounded-circle avatar-md bg-info-light  border-radius-md p-2 ">
                                                                    <h6 class="text-info-light fw-normal text-uppercase mt-1 ">{{ $user->first_name['0']}}{{ $user->last_name['0']}}</h6>
                                                                </div>
                                                            @else
                                                                <img src="{{PUBLIC_DIR}}/uploads/{{ $user->photo}}" class="rounded-circle avatar shadow">
                                                        @endif

                                                        <!-- Info -->
                                                            <div class="ms-0 ms-sm-2 mt-2 mt-sm-0 ms-2">
                                                                <h6 class="mb-1" >{{$user->first_name}} {{$user->last_name}}</h6>
                                                                <ul class="list-inline mb-0 small">
                                                                    <li class="list-inline-item fw-light me-2 mb-1 mb-sm-0">{{$user->email}}</li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- Button -->
                                                    </div>

                                                    <div class="mb-3">

                                                        <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                            {{__('Details')}}
                                                        </button>
                                                        <div class="dropdown-menu p-4 text-muted bg-info-light" style="max-width: 300px;"><div  class= " d-sm-flex justify-content-between align-items-center mb-3">
                                                                <!-- Avatar and info -->
                                                                <div class= " d-sm-flex align-items-center mb-1 mb-sm-0">
                                                                    <!-- Avatar -->
                                                                    @if(empty( $user->photo))
                                                                        <div
                                                                                class="avatar rounded-circle avatar-md bg-info  border-radius-md p-2 ">
                                                                            <h6 class="text-white fw-normal text-uppercase mt-1 ">{{ $user->first_name['0']}}{{ $user->last_name['0']}}</h6>
                                                                        </div>
                                                                    @else
                                                                        <img src="{{PUBLIC_DIR}}/uploads/{{ $user->photo}}" class="rounded-circle avatar shadow">
                                                                @endif

                                                                <!-- Info -->
                                                                    <div class="ms-0 ms-sm-2 mt-2 mt-sm-0 ms-2">
                                                                        <h6 class="mb-1" >{{$user->first_name}} {{$user->last_name}}</h6>
                                                                        <ul class="list-inline mb-0 small">
                                                                            <li class="list-inline-item fw-light me-2 mb-1 mb-sm-0">{{$user->email}}</li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!-- Button -->


                                                            </div>
                                                            {!! $user->description !!}
                                                        </div>
                                                        <a href="#" class="btn btn-light btn-sm btn-link  ">Invite</a>
                                                    </div>
                                                @endforeach


                                            </div>
                                            <!-- Card body END -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="card bg-transparent rounded-3">
                                        <!-- Header START -->

                                        <!-- Header END -->

                                        <!-- Reviews START -->
                                        <div class="card-body mt-2 mt-sm-4">

                                            <!-- Review item START -->
                                            @foreach($comments as $comment)
                                                <div class="d-sm-flex">
                                                    <!-- Avatar image -->

                                                    @if($comment->type == 'Admin')
                                                        @if(!empty($users[$comment->admin_id]->photo))
                                                            <a href="javascript:" class=" avatar avatar-md rounded-circle ">
                                                                <img alt="" class="avatar rounded-circle flex-shrink-0"
                                                                     src="{{PUBLIC_DIR}}/uploads/{{$users[$comment->admin_id]->photo}}">
                                                            </a>
                                                        @else
                                                            <div
                                                                    class="avatar avatar-md rounded-circle bg-purple-light  border-radius-md p-2">
                                                                <h6 class="text-purple mt-1">{{$users[$comment->admin_id]->first_name[0]}}{{$users[$comment->admin_id]->last_name[0]}}</h6>
                                                            </div>
                                                        @endif


                                                    @elseif($comment->type == 'Student')
                                                        @if(!empty($students[$comment->student_id]->photo))
                                                            <a href="javascript:" class=" avatar avatar-md rounded-circle ">
                                                                <img alt="" class="avatar rounded-circle flex-shrink-0"
                                                                     src="{{PUBLIC_DIR}}/uploads/{{$students[$comment->student_id]->photo}}">
                                                            </a>
                                                        @else
                                                            <div
                                                                    class="avatar avatar-md rounded-circle bg-purple-light  border-radius-md p-2">
                                                                <h6 class="text-purple mt-1">{{$students[$comment->student_id]->first_name[0]}}{{$students[$comment->student_id]->last_name[0]}}</h6>
                                                            </div>
                                                        @endif

                                                    @endif

                                                    <div>
                                                        <div class=" ms-2 mb-3 d-sm-flex justify-content-sm-between align-items-center">
                                                            <!-- Title -->
                                                            <div>
                                                                @if($comment->type == 'Admin')
                                                                    @if(!empty($users[$comment->admin_id]->first_name))

                                                                        <h5>{{$users[$comment->admin_id]->first_name}}{{$users[$comment->admin_id]->last_name}}</h5>

                                                                    @endif


                                                                @elseif($comment->type == 'Student')
                                                                    @if(!empty($students[$comment->student_id]->first_name))
                                                                        <h6 class="m-0">{{$students[$comment->student_id]->first_name}} {{$students[$comment->student_id]->last_name}}</h6>

                                                                    @endif

                                                                @endif

                                                                <span class="me-3 small">{{$comment->created_at}} </span>
                                                            </div>
                                                            <!-- Review star -->
                                                        </div>
                                                        <!-- Content -->
                                                        <p class="ms-2">{{$comment->message}}</p>
                                                        <!-- Button -->

                                                    </div>
                                                </div>
                                        @endforeach
                                        <!-- Divider -->
                                            <div class="" id="collapseComment">
                                                <form action="/student/save-course-comment" method="post">
                                                    <div class="d-flex mt-3">
                                                        <textarea class="form-control mb-0" placeholder="Add a comment..." rows="2" spellcheck="false" name="message"></textarea>
                                                        <input type="hidden" name="course_id" value="{{$course->id}}">
                                                        @csrf

                                                        <button type="submit" class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"><i class="fas fa-paper-plane fs-5"></i></button>
                                                    </div>
                                                </form>

                                            </div>




                                        </div>
                                        <!-- Reviews END -->


                                    </div>
                                </div>
                            </div>

                        </div>


                        <!-- Discussion START -->

                        <!-- Discussion END -->


                    </div>
                </div>

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