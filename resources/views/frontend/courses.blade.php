@extends('frontend.layout')
@section('title','Courses')
@section('content')
    <section class="section section-lg bg-white line-bottom-soft mt-7 ">
        <div class="container">
            <div class="row mb-10">
                <div class="col-md-3">
                    <div class="vertical me-2 ms-2"></div>
                    <div class="ms-4 mt-6">
                        <h6>{{__('Categories')}}</h6>
                        <div class="d-flex align-items-start mt-3">
                            <div class="nav flex-column  me-3" id="v-pills-tab">
                                @foreach($categories as $category)
                                    <h5><a href="/course?category_id={{$category->id}}" class="nav-link fw-bolder badge bg-purple-light mb-2 text-purple   active  " id="v-pills-home-tab">{{$category->name}}</a></h5>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 ">
                    <div class="row mt-6">
                        <!-- Main content START -->
                        <div class="col-12">
                            <!-- Course Grid START -->
                            <div class="row g-4 mx-auto">
                                <!-- Card item START -->
                                @foreach($courses as $course)
                                    @if($course->status !='Draft')
                                        <div class="col-md-4">
                                            <a href="/course/{{$course->slug}}">
                                                <div class="card shadow  h-100">
                                                    <!-- Image -->
                                                    @if(empty($course->image))
                                                        <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                                             class="w-100 border-radius-lg shadow-sm ">
                                                    @else
                                                        <img src="{{PUBLIC_DIR}}/uploads/{{$course->image}}" class="w-100  card-img-top shadow-sm ">
                                                    @endif
                                                    <!-- Card body -->
                                                    <div class="card-body pb-0">
                                                        <!-- Badge and favorite -->
                                                        <div class="d-flex justify-content-between mb-2">
                                                            @if(!empty($categories[$course->category_id]))
                                                                <span class="badge bg-purple-light">
                        @if(isset($categories[$course->category_id]))
                                                                        {{$categories[$course->category_id]->name}}
                                                                    @endif
                        </span>
                                                            @endif

                                                        </div>
                                                        <!-- Title -->
                                                        <h5 class="card-title">{{$course->name}}</h5>
                                                        <!-- Rating star -->

                                                        <div class="row mb-0">
                                                            <div class="col">
                                                                {!! renderRating($course->id) !!}
                                                            </div>
                                                            <div class="col text-end me-2">
                                                                {!! getCourseRating($course->id) !!}.0/5.0

                                                            </div>

                                                        </div>

                                                    </div>
                                                    <!-- Card footer -->
                                                    <div class="card-footer pt-0 pb-3">
                                                        <hr>
                                                        <div class="d-flex justify-content-between">

                                                         <span class="h6 fw-light mb-0">
                                                             <i class="fas fa-book text-orange me-2"></i>{{getTotalLesson($course->id)}} {{__('Lessons')}}</span>
                                                            <span class="h5 fw-bolder mb-0">
                                                            @if($course->price > 0 || $course->is_free == 0 )
                                                                    {{formatCurrency($course->price,getWorkspaceCurrency($super_settings))}}
                                                                @else
                                                                    {{__('Free')}}
                                                                @endif
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    @endif



                                @endforeach

                            </div>

                        </div>
                        <!-- Main content END -->
                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
