@extends('layouts.admin-portal')
@section('title',$lesson->title)
@section('content')
    <section class="bg-dark-alt border-radius-lg py-0 py-sm-5">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8">
                    <!-- Badge -->
                    <!-- Title -->
                    <h2 class="text-white me-auto">
                        @if(!empty($lesson->title))
                            {{$lesson->title}}
                            @endif
                    </h2>
                    <!-- Content -->
                    <ul class="list-inline mb-0 ">

                        <li class="list-inline-item text-sm me-3 mb-1 mb-sm-0 text-muted"><i class="bi bi-patch-exclamation-fill text-danger "></i>
                            {{__('Updated')}}
                            @if(!empty($lesson->created_at))
                                {{$lesson->created_at->diffForHumans()}}

                            @endif

                        </li>
                        <li>

                            @if(!empty($lesson))
                            {{__('Duration')}}: <span class="text-white">{{$lesson->duration}}</span>
                            @endif

                        </li>
                    </ul>
                </div>
                <div class="col-md-4 text-end">
                    @if(!empty($course->id))
                        <a class="btn btn-blue mb-3 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2 "
                           href="/create-lesson?course_id={{$course->id}}&id={{$lesson->id}}" >
                            {{__('Edit Lesson')}}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <section class="pb-0 mt-4">
        <div class="">
            <div class="row">
                <!-- Main content START -->
                <div class="col-lg-8">
                    <div class="position-relative mb-3">

                        @if(!empty($lesson->video))
                            <iframe controlsList="nodownload" class="embed-responsive-item w-100 height-400  border-radius-lg shadow-lg mt-3" src="{{PUBLIC_DIR}}/uploads/{{$lesson->video}}" type="video/mp4">
                            </iframe>

                                @elseif(!empty($lesson->youtube_video))

                                    <iframe class="embed-responsive-item w-100 height-400 border-radius-lg shadow-lg mt-3" src="https://www.youtube.com/embed/{{$lesson->youtube_video}}?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                                @else
                                    <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg" class="w-100 border-radius-lg shadow-lg mt-3">

                        @endif
                    </div>

                    <div class="card shadow rounded-2 p-0 mb-4">
                        <!-- Tabs START -->

                        <div class="card-header border-bottom px-4 py-3">

                            <h5 class="">{{__('Lesson Description')}}</h5>
                        </div>
                        <!-- Tabs END -->

                        <!-- Tab contents START -->
                        <div class="card-body p-4">
                            <div class="tab-content pt-2" id="course-pills-tabContent">
                                <!-- Content START -->
                                <div class="tab-pane fade show active" id="course-pills-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                                    <!-- Course detail START -->


                                @if(!empty($lesson->description))
                                    {!! $lesson->description !!}

                                @endif
                                    <!-- Course detail END -->
                                </div>

                            </div>
                        </div>
                        <!-- Tab contents END -->
                    </div>
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-lg-4 pt-5 pt-lg-0">
                    <div class="row mb-5 mb-lg-0">
                        <div class="col-md-6 col-lg-12">
                            @if(!empty($lesson->file))

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <!-- Buttons -->
                                            <a href="{{PUBLIC_DIR}}/uploads/{{$lesson->file}}" class="btn btn-success mb-sm-0 me-00 ">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                {{__('Download file')}}</a>

                                        </div>

                                    </div>

                                </div>

                            @endif



                        <div class="col-md-6 col-lg-12">
                            <!-- Recently Viewed START -->
                            <div class="card card-body shadow p-4 mb-4">
                                <!-- Title -->
                                <h5 class="mb-3">{{__('All Lessons')}}</h5>
                                <!-- Course item START -->
                                <div class="row mb-3">

                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Lecture item START -->
                                            <div class="col-12">

                                                <!-- Curriculum item -->
                                                @foreach($lessons as $lesson)

                                                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                                                        <div class="d-flex">
                                                            <div
                                                                    class="avatar avatar-md bg-info-light  border-radius-md p-2 ">
                                                                <i class="fas fa-play text-info"></i>
                                                            </div>

                                                            @if(!empty($lesson))
                                                                <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                                                                    <a href="/view-lesson?id={{$lesson->id}}"> <h6 class="mb-0">{{$lesson->title}}</h6></a>
                                                                    <p class="mb-2 mb-sm-0 small">
                                                                        {{$lesson->duration}}</p>

                                                                </div>
                                                            @endif

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
                                                                       href="/create-lesson?course_id={{$lesson->id}}&id={{$lesson->id}}">{{__('Edit')}}</a></li>

                                                                <li><a class="dropdown-item border-radius-sm"
                                                                       href="/view-lesson?id={{$lesson->id}}">{{__('See Details')}}</a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item border-radius-md text-danger"
                                                                       href="/delete/lesson/{{$lesson->id}}">{{__('Delete')}}
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <hr>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Row END -->
        </div>
    </section>

@endsection