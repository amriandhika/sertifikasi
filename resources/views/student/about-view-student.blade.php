@extends('layouts.admin-portal')
@section('title',$student->first_name.' '.$student->last_name)
@section('content')
    <section class="bg-dark-alt border-radius-lg py-0 ">
        <div class="container">
            <div class="row ">
                <div class="col-md-6  mt-5">
                    <div class="avatar avatar-xxl  rounded-circle position-relative border-avatar ms-3">
                        @if(empty($student->photo))
                            <img src="{{PUBLIC_DIR}}/img/user-avatar-placeholder.png"
                                 class="w-100 border-radius-sm shadow-sm">
                        @else
                            <img src="{{PUBLIC_DIR}}/uploads/{{$student->photo}}" class="w-100 border-radius-sm ">
                        @endif

                    </div>
                    <h6 class="text-white ms-3 mt-3 mb-4">
                        {{$student->first_name}} {{$student->last_name}}
                        <br>
                        <small class="text-success">{{$student->email}}</small>
                    </h6>
                </div>
            </div>

        </div>
    </section>
    <div class="text-center">
        <ul class="nav  mt-2 ">
            <li class="nav-item">
                <a class="nav-link @if(($selected_nav ?? '') === 'student-about') active @endif fw-bolder"  href="">{{__('About')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bolder" href="/student-courses?id={{$student->id}}">{{__('Courses')}}</a>
            </li>

            <li class="nav-item">
                <a href="/student-assignments?id={{$student->id}}" class="nav-link fw-bolder">{{__('Assignments')}}</a>
            </li>
            <li class="nav-item">
                <a href="/student-certificates?id={{$student->id}}" class="nav-link fw-bolder">{{__('Certificates')}}</a>
            </li>
            <li class="nav-item">
                <a href="/student-ebooks?id={{$student->id}}" class="nav-link fw-bolder">{{__('eBooks')}}</a>
            </li>


        </ul>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-body">
                    <h6 class="card-title">
                        {{__('Basic Information')}}
                    </h6>
                    <ul class="flex-row  nav ">
                        @if (!empty($student->facebook))
                            <li class="nav-item ">
                                <a class="nav-link" href="{{$student->facebook}}" target="_blank">
                                    <button type="button" class="btn rounded-circle bg-info-alt btn-facebook btn-icon-only">
                                        <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                                    </button>
                                </a>
                            </li>

                        @endif

                        @if (!empty($student->linkedin))
                            <li class="nav-item">
                                <a class="nav-link" href="{{$student->linkedin}}" target="_blank">
                                    <button type="button" class="btn rounded-circle bg-info btn-linkedin btn-icon-only">
                                        <span class="btn-inner--icon"><i class="fab fa-linkedin text-white"></i></span>
                                    </button>
                                </a>
                            </li>

                        @endif

                        @if (!empty($student->twitter))
                            <li class="nav-item">
                                <a class="nav-link" href="{{$student->twitter}}" target="_blank">
                                    <button type="button" class="btn rounded-circle btn-twitter btn-icon-only">
                                        <span class="btn-inner--icon"><i class="fab fa-twitter"></i></span>
                                    </button>
                                </a>
                            </li>
                        @endif
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 text-md"><strong
                                    class="text-dark">{{__('Account Created:')}}</strong> {{(\App\Supports\DateSupport::parse($student->created_at))->format(config('app.date_time_format'))}}
                        </li>

                        <li class="list-group-item border-0 ps-0 text-md"><strong
                                    class="text-dark">{{__('Phone:')}}</strong>
                            {{$student->phone_number}}
                        </li>

                        <li class="list-group-item border-0 ps-0 text-md"><strong
                                    class="text-dark">{{__('Timezone:')}}</strong>
                            {{$student->timezone}}
                        </li>
                        <li class="list-group-item border-0 ps-0 text-md"><strong
                                    class="text-dark">{{__('Email:')}}</strong> {{$student->email}}</li>
                        <li class="list-group-item border-0 ps-0 text-md"><strong
                                    class="text-dark">{{__('Address:')}}</strong> {{$student->address}} {{$student->city}} {{$student->state}} {{$student->zip}} {{$student->country}}</li>


                    </ul>
                    <a class="btn btn-info btn-sm mb-0 mt-3" href="/new-student?id={{$student->id}}">{{__('Edit')}}</a>


                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card h-100">

                <div class="card-header pb-0">
                    <h6>Bio</h6>
                    <p>
                        {{$student->bio}}
                    </p>

                </div>
            </div>

        </div>
    </div>
@endsection