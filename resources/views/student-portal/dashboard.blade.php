@extends('layouts.student-portal')
@section('title',__('Dashboard'))
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="row ">
                <div class="card ">
                    <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" @if(!empty($student->cover_photo))
                    style="background-image: url('{{PUBLIC_DIR}}/uploads/{{$student->cover_photo}}'); background-position-y: 50%;"
                            @endif>
                        <span class="mask bg-dark-alt"></span>
                        <div class="card-body position-relative z-index-1 h-100 ">
                            <h4 class="text-white font-weight-bolder mb-3 mt-3">  Hi, {{$student->first_name}} {{$student->last_name}}, {{__('Happy Learning!')}}</h4>

                            <div class="text-end mb-2">
                                <a href="/student/my-courses" class="btn btn-round btn-outline-white mb-2" href="javascript:;">
                                    {{__("All of my courses")}}
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                                <a href="/student/profile" class="btn btn-round btn-outline-white mb-2" href="javascript:;">
                                    {{__("My Profile")}}
                                    <i class="fas fa-user-alt text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-4">

                <div class="card mb-4">
                    <div class="card-header pb-0 p-2">
                        <h6 class="mb-1">{{__('My Recent Courses')}}</h6>

                    </div>

                    <div class=" p-2">

                        <div class="row">

                            @foreach($courses as $course)
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                    <div class=" card-img">
                                        <a class="d-block shadow-xl border-radius-xl">
                                            @if(empty($course->image))
                                                <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                                     class="w-100 border-radius-lg shadow-sm mt-3">
                                            @else
                                                <img src="{{PUBLIC_DIR}}/uploads/{{$course->image}}" class="w-100 border-radius-lg shadow-sm mt-3">
                                            @endif
                                        </a>
                                        <div class="card-body px-1 pb-0">
                                            <p class="text-purple mb-2 text-sm">
                                                @if(!empty($categories[$course->category_id]))
                                                    <span class="badge bg-purple-light">
                                                    @if(isset($categories[$course->category_id]))
                                                        {{$categories[$course->category_id]->name}}
                                                    @endif
                                                @endif
                                            </p>
                                            <a href="/student/my-course-details?id={{$course->id}}">
                                                <h5>
                                                    <strong>{{$course->name}}</strong>
                                                </h5>
                                            </a>
                                            <div class="row mb-0">
                                                <div class="col">
                                                    {!! renderRating($course->id) !!}
                                                </div>
                                                <div class="col text-end me-2">
                                                    {!! getCourseRating($course->id) !!}.0/5.0

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


                                                        @endif {{__('Lessons')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">

                <div class="card mb-4">
                    <div class="card-header pb-0 p-2">
                        <h6 class="mb-1">{{__('My Recent eBooks')}}</h6>

                    </div>

                    <div class=" p-2">

                        <div class="row g-4">
                            <!-- Card item START -->
                            @foreach($ebooks as $product)

                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="card h-100">

                                        <div class="position-relative">
                                            <!-- Image -->
                                            @if(empty($product->image))
                                                <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                                     class="w-100 border-radius-lg shadow-lg p-5">
                                            @else
                                                <img src="{{PUBLIC_DIR}}/uploads/{{$product->image}}" class=" p-5  card-img-top">
                                            @endif
                                        </div>
                                        <!-- Card body -->

                                        <div class="card-body text-center px-3">
                                            <!-- Title -->
                                            <h5 class="card-title mb-0">
                                                <a href="/student/view-ebook?id={{$product->id}}" class="">{{$product->name}}</a>
                                            </h5>
                                            {!! renderEbookRating($product->id) !!}
                                        </div>


                                        <!-- Card footer -->
                                        <div class="card-footer pt-0 px-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="h6 fw-light mb-0">{{__('By')}} <span class="fw-bolder">{{$product->author_name}}</span> </span>
                                                <!-- Price -->
                                                <h5 class="text-success mb-0">
                                                    {{formatCurrency($product->price,getWorkspaceCurrency($settings))}}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        <!-- Card item END -->
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection






