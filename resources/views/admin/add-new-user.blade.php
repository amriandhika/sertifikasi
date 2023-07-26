@extends('layouts.admin-portal')
@section('title',__('Add User'))
@section('content')

    <div class=" row mb-2">
        <div class="col">
            <span>
                <h5 class="  fw-bolder">
                    {{__('Users')}} /<span class="text-secondary">
                            {{__('Add new user')}}
                    </span>
                </h5>
                <p class="text-muted">{{__('Create and edit user')}}</p>

            </span>
        </div>
        <div class="col text-end">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="multisteps-form mb-5">
                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">
                        <form action="/user-post" method="post" class="multisteps-form__form mb-8">
                            <!--single form panel-->

                            @if ($errors->any())
                                <div class="alert bg-pink-light text-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                 data-animation="FadeIn">


                                <div class="multisteps-form__content">
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>{{__('First Name')}}</label><label class="text-danger">*</label>
                                            <input name="first_name" class="multisteps-form__input form-control"
                                                   type="text"
                                                   @if (!empty($selected_user)) value="{{$selected_user->first_name}}" @endif />
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>{{__('Last Name')}}</label><label class="text-danger">*</label>
                                            <input name="last_name" class="multisteps-form__input form-control"
                                                   type="text"
                                                   @if (!empty($selected_user)) value="{{$selected_user->last_name}}" @endif />
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label>{{__('Username/Email')}}</label><label class="text-danger">*</label>
                                            <input name="email" class="multisteps-form__input form-control"
                                                   type="email"
                                                   @if (!empty($selected_user)) value="{{$selected_user->email}}" @endif />
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label>{{__('Password')}}</label>

                                            <input name="password" type="password"
                                                   class="multisteps-form__input form-control"
                                                   value="" />
                                            <p class="text-xs">
                                                {{__('Keep blank if you do not want to change Password')}}
                                            </p>

                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 mt-3 mt-sm-0">
                                            <label>{{__('Phone Number')}}</label>
                                            <input name="phone_number" class="multisteps-form__input form-control"
                                                   @if(!empty($selected_user)) value="{{$selected_user->mobile_number}}" @endif >
                                        </div>

                                    </div>

                                    <div class="form-group mt-3">
                                        <label>{{__('Bio/Description')}}</label>
                            <textarea class="form-control" rows="10" id="description"
                                      name="description">@if(!empty($selected_user)){!! $selected_user->description !!}@endif</textarea>
                                    </div>

                                </div>
                                @csrf

                                @if (!empty($selected_user))
                                    <input type="hidden" name="id" value="{{$selected_user->id}}">
                                @endif

                                <div class="button-row text-left mt-4">

                                    <button class="btn btn-info" type="submit"
                                            title="Next">{{__('Submit')}}
                                    </button>
                                </div>
                            </div>


{{--                            <!--single form panel-->--}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



