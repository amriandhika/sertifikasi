@extends('layouts.primary')
@section('title',$lesson->title)
@section('content')


    <section class="bg-dark-alt border-radius-lg py-0 py-sm-5">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8">
                    <!-- Badge -->
                    @if(!empty($course->id))
                        <a class="btn btn-blue mb-3 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2 "
                           href="/student/my-course-details?id={{$course->id}}" >
                            {{__('Go to Course Page')}}
                        </a>
                @endif

                <!-- Title -->
                    <h2 class="text-white">
                        @if(!empty($lesson->title))
                            {{$lesson->title}}
                        @endif
                    </h2>

                    <!-- Content -->
                    <ul class="list-inline mb-0 ">


                        <li class="list-inline-item h6 me-3 mb-1 mb-sm-0 text-white"><i class="bi bi-patch-exclamation-fill text-danger me-2"></i>{{__('Updated')}}@if(!empty($lesson->title))
                                {{$lesson->updated_at->diffForHumans()}}
                            @endif</li>
                        <li class="list-inline-item h6 mb-0 text-white"><i class="fas fa-globe text-info me-2"></i>English</li>
                    </ul>
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

                    <div class="card shadow rounded-2 p-0">
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


                                <!-- Content START -->

                                <!-- Content END -->

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
                            <!-- Recently Viewed START -->
                            <div class="card card-body shadow  mb-4">
                                <!-- Title -->
                                <h6 class="mb-3">{{__('All Lessons of the course')}}</h6>
                                <!-- Course item START -->
                                <div class="row gx-3 mb-3">

                                    <div class="card-body">
                                        <div class="row g-5">
                                            <!-- Lecture item START -->
                                            <div class="col-12">
                                                <!-- Curriculum item -->
                                            {{--                                            <h5 class="mb-4">Introduction of Digital Marketing (3 lectures)</h5>--}}

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
                                                                <a href="/view-lesson?id={{$lesson->id}}"> <h6 class="mb-0">{{$loop->iteration}}. {{$lesson->title}}</h6></a>
                                                                <p class="mb-2 mb-sm-0 small">{{__('Last Updated')}} {{$lesson->updated_at->diffForHumans()}}</p>
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
                                    <!-- Image -->

                                </div>
                                <!-- Course item END -->

                                <!-- Course item START -->

                                <!-- Course item END -->
                            </div>
                            <!-- Recently Viewed END -->

                            <!-- Tags START -->

                            <!-- Tags END -->
                        </div>
                    </div><!-- Row End -->
                </div>
                <!-- Right sidebar END -->

            </div><!-- Row END -->
        </div>
        </div>
    </section>

@endsection
