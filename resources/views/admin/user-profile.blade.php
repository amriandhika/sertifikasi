@extends('layouts.admin-portal')
@section('title',__('User Profile'))
@section('content')
    <div class=" row mb-2">
        <div class="col">
            <span>
                <h5 class="  fw-bolder">
                    {{__('User Profile')}} /<span class="text-secondary">
                            {{__('Information')}}
                    </span>
                </h5>


            </span>
        </div>
        <div class="col text-end">

        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header pb-0 p-3">
                </div>
                <div class="card-body p-3">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="avatar avatar-xxl position-relative">
                                @if(empty($up_user->photo))
                                    <img src="{{PUBLIC_DIR}}/img/user-avatar-placeholder.png"
                                         class="w-100 border-radius-lg shadow-sm">
                                @else

                                    <img src="{{PUBLIC_DIR}}/uploads/{{$up_user->photo}}" alt=""
                                         class="w-100 border-radius-lg shadow-sm">
                                @endif

                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    {{$up_user->first_name}} {{$up_user->last_name}}

                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{$up_user->email}}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                            <div class="nav-wrapper position-relative end-0">
                                <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 mb-4 ">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0 text-muted">{{__('Details')}}</h6>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{__('Full Name:')}}</strong> {{$up_user->first_name}} {{$up_user->last_name}}
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                class="text-dark">{{__('Phone Number:')}}</strong> {{$up_user->mobile_number}}</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                class="text-dark">{{__('Email:')}}</strong> {{$up_user->email}}</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                class="text-dark">{{__('Account Created:')}}</strong>
                            {{(\App\Supports\DateSupport::parse($up_user->created_at))->format(config('app.date_time_format'))}}
                            </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">{{__('Bio:')}}</strong> {{$up_user->description}}</li>

                    </ul>

                    <a class="btn btn-info mb-3 mt-3" href="/user-edit/{{$up_user->id}}">{{__('Edit')}}</a>

                </div>

            </div>
        </div>


    </div>
@endsection
