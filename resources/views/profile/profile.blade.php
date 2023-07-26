@extends('layouts.'.($layout ?? 'primary'))
@section('title',__('Profile'))
@section('content')

    <div class=" row mb-2">
        <div class="col">
            <h5 class="  fw-bolder">
                {{__('Settings')}} /<span class="text-secondary">
                            {{__('My Profile')}}
                    </span>
            </h5>
            <p class="text-muted">{{__('Edit profile and change password')}}</p>
        </div>
        <div class="col text-end">

        </div>
    </div>

    <div class="row  mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class=" overflow-hidden">
                        <div class="row gx-4">
                            <div class="col-auto">
                                <div class="avatar rounded-circle avatar-xxl position-relative border-avatar">
                                    @if(empty($user->photo))

                                        <div class="avatar avatar-xxl rounded-circle bg-info-light">
                                            <h3 class="text-info-light text-uppercase mt-1">{{$user->first_name['0']}}{{$user->last_name['0']}}

                                            </h3>

                                        </div>
                                    @else
                                        <img src="{{PUBLIC_DIR}}/uploads/{{$user->photo}}" class="w-100 border-radius-lg shadow-sm">
                                    @endif

                                </div>
                            </div>
                            <div class="col-auto my-auto">
                                <div class="h-100">
                                    <h5 class="mb-1 mt-5">
                                        {{$user->first_name}} {{$user->last_name}}
                                    </h5>
                                    <p class="mb-0  text-sm">
                                        {{$user->email}}
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
                    </div>

                    <ul class="list-group">

                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                class="text-dark">{{__('Phone Number:')}}</strong>
                            {{$user->phone_number}}
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                class="text-dark">{{__('Email:')}}</strong> {{$user->email}}</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                class="text-dark">{{__('Account Created:')}}</strong> {{(\App\Supports\DateSupport::parse($user->created_at))->format(config('app.date_time_format'))}}
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="col-md-8 mt-lg-0">
            <form enctype="multipart/form-data" action="/profile" method="post">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card" id="basic-info">

                    <div class="card-header">
                        <h5>{{__('Details')}}</h5>
                    </div>

                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">{{__('First Name')}}</label>
                                <div class="input-group">
                                    <input id="firstName" name="first_name"
                                           @if (!empty($user)) value="{{$user->first_name}}" @endif class="form-control"
                                           type="text"  required="required">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">{{__('Last Name')}}</label>
                                <div class="input-group">
                                    <input id="lastName" name="last_name"
                                           @if (!empty($user)) value="{{$user->last_name}}" @endif class="form-control"
                                           type="text" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">{{__('Email/Username')}}</label>
                                <div class="input-group">
                                    <input id="email" name="email" @if (!empty($user)) value="{{$user->email}}"
                                           @endif class="form-control" type="email">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">{{__('Phone Number')}}</label>
                                <div class="input-group">
                                    <input id="phone" name="phone_number"
                                           @if (!empty($user)) value="{{$user->phone_number}}"
                                           @endif class="form-control" type="number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <label class="form-label  mt-4">{{__('Language')}}</label>
                                <select class="form-control select2" name="language" id="choices-language">

                                    @foreach($available_languages as $key => $value)
                                        <option value="{{$key}}"
                                                @if($user->language===$key) selected @endif >{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 align-self-center">
                                <div>
                                    <label for="photo_file" class="form-label mt-4">{{__('Upload photo')}}</label>
                                    <input class="form-control" name="photo" type="file" id="logo_file">
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="timezone">{{__('Timezone')}}</label>
                            <select class="form-control select2" id="timezone" name="timezone">
                                <option value="">{{__('Select')}}</option>
                                @foreach(\App\Supports\UtilSupport::timezoneList() as $key => $value)
                                    <option value="{{$key}}" @if($user->timezone===$key) selected @endif >{{$value}}</option>
                                @endforeach


                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>{{__('Bio/Description')}}</label>
                            <textarea class="form-control" rows="10" id="description"
                                      name="description">@if(!empty($user)){!! $user->description !!}@endif</textarea>
                        </div>

                        @csrf
                        @if (!empty($user))
                            <input type="hidden" name="id" value="{{$user->id}}">
                        @endif
                        <button type="submit" class="btn btn-info float-left mt-4 mb-0">
                            {{__('Update info')}}
                        </button>
                    </div>
                </div>
            </form>

            <!-- Card Change Password -->
            <div class="card mt-4" id="password">
                <div class="card-header">
                    <h5>{{__('Change Password')}}</h5>
                </div>
                <form action="/user-change-password" method="post">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body pt-0">
                        <label class="form-label">{{__('Current password')}}</label>
                        <div class="form-group">
                            <input class="form-control" name="password" type="password">
                        </div>
                        <label class="form-label">{{__('New password')}}</label>
                        <div class="form-group">
                            <input class="form-control" name="new_password" type="password">
                        </div>
                        <label class="form-label">{{__('Confirm new password')}}</label>
                        <div class="form-group">
                            <input class="form-control" name="new_password_confirmation">
                        </div>

                        @csrf
                        <button type="submit" class="btn btn-info float-left  mb-0">
                            {{__(' Update password')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
