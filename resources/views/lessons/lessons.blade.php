@extends('layouts.admin-portal')
@section('title',__('Lessons'))
@section('content')

    <div class="col-12">
        <div class="card rounded-3">
            <!-- Card header START -->
            <div class="card-header border-bottom">
                <h4 class="mb-0">{{__('Lessons')}}</h4>
            </div>
            <!-- Card header END -->

            <!-- Card body START -->
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
                                        <a href="/view-lesson?id={{$lesson->id}}"> <h6 class="mb-0">{{$lesson->title}}</h6></a>
                                        <p class="mb-2 mb-sm-0 small">{{__('Last Updated')}} {{$lesson->updated_at}}</p>

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
                                        <li><a class="dropdown-item border-radius-md"
                                               href="/create-lesson?course_id={{$course->id}}&id={{$lesson->id}}">{{__('Edit')}}</a></li>

                                        <li><a class="dropdown-item border-radius-md"
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
                            <p class="">{!! $lesson->summary !!}</p>

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
@endsection