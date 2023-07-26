@extends('layouts.admin-portal')
@section('title',__('Course Discussions'))
@section('content')

    <div class="row mb-2">
        <div class="col">
            <div>
                <h5 class="fw-bolder">
                    {{__('Course Discussion')}} /<span class="text-secondary">
                            {{__('Discuss with the students')}}
                    </span>
                </h5>

            </div>

        </div>
        <div class="col text-end">

        </div>

    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="card ">
                <div >
                    <div class="card shadow h-100">

                        <!-- Card header -->
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center p-4">
                            <h6 class="card-header-title">{{__('Students')}}</h6>

                        </div>


                        <!-- Card body START -->
                        <div class="card-body p-4">


                            <!-- Instructor item START -->
                            @foreach($students as $user)

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
                                    <a href="#" class="btn btn-light btn-sm btn-link">{{__('Reply')}}</a>
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
                <div class="card  rounded-3">
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
{{--                                    <input type="hidden" name="course_id" value="{{$course->id}}">--}}
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





    @endsection