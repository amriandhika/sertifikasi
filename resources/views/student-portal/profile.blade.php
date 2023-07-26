@extends('layouts.student-portal')
@section('title',__('Profile'))
@section('content')


    <div class="page-header card min-height-250 "@if(!empty($student->cover_photo))
    style="background-image: url('{{PUBLIC_DIR}}/uploads/{{$student->cover_photo}}'); background-position-y: 50%;"
            @endif
    >

    </div>

    <div class="">
        <div class="mx-5 mt-n5 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar rounded-circle avatar-xxl position-relative border-avatar">
                        @if(empty($student->photo))
                            <div class="avatar avatar-xxl rounded-circle bg-info-light border-radius-md  ">
                                <h2 class="text-info-light text-uppercase fw-normal mt-1">{{$student->first_name['0']}}{{$student->last_name['0']}}</h2>
                            </div>
                        @else
                            <img src="{{PUBLIC_DIR}}/uploads/{{$student->photo}}" class="w-100 border-radius-sm ">
                        @endif

                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="row">
                        <ul class="flex-row mt-6 nav ">
                            @if (!empty($student->facebook))
                                <li class="nav-item ">
                                    <a class="nav-link " href="{{$student->facebook}}" target="_blank">
                                        <button type="button" class="btn rounded-circle bg-info-alt btn-facebook btn-icon-only">
                                            <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                                        </button>
                                    </a>
                                </li>

                            @endif

                            @if (!empty($student->linkedin))
                                <li class="nav-item">
                                    <a class="nav-link " href="{{$student->linkedin}}" target="_blank">
                                        <button type="button" class="btn rounded-circle bg-info btn-linkedin btn-icon-only">
                                            <span class="btn-inner--icon"><i class="fab fa-linkedin text-white"></i></span>
                                        </button>
                                    </a>
                                </li>

                            @endif

                            @if (!empty($student->twitter))
                                <li class="nav-item">
                                    <a class="nav-link " href="{{$student->twitter}}" target="_blank">
                                        <button type="button" class="btn rounded-circle btn-twitter btn-icon-only">
                                            <span class="btn-inner--icon"><i class="fab fa-twitter"></i></span>
                                        </button>
                                    </a>
                                </li>
                            @endif
                        </ul>

                        <div class="col-auto">
                            <div class="h-100">
                                <h4 class="mb-1 ">
                                    {{$student->first_name}} {{$student->last_name}}
                                </h4>

                                <p class="mb-0 text-md">
                                    {{$student->email}}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" col-lg-8 col-12 mx-auto">
        <div class="mt-4">
            <div class="">
                <div class="card ">

                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col">
                                <h5>{{__('About Me')}}</h5>
                            </div>

                            <div class="col text-end ">

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>
                            {!! $student->bio !!}
                        </p>


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
                                        class="text-dark">{{__('Address:')}}</strong> {{$student->address}} {{$student->city}} {{$student->state}} {{$student->zip}} {{$student->country}} </li>


                        </ul>

                        <a class="btn btn-info  mb-5 mt-3" href="/student/edit-profile?id={{$student->id}}">{{__('Edit Profile')}}</a>

                    </div>
                </div>
            </div>

        </div>
    </div>


    @endsection