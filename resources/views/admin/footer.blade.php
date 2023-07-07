@extends('layouts.admin-portal')
@section('title',__('Footer'))
@section('content')

    <div class="btn-group">
        <button type="button" class="btn ms-auto btn-dark btn-icon-only " data-bs-toggle="offcanvas" data-bs-target="#footer" aria-controls="offcanvasRight">
        <span class="btn-inner--icon">
<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" mb-2 feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
        </span>
        </button>
        <a href="/home" target="_blank" type="button" class="btn btn-success btn-icon-only">
            <span class="btn-inner--icon">
<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            </span>
        </a>

    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="footer" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">{{__('Hero Section ')}}</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="/save-footer-section" method="post" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">{{__('Company Name')}}</label>
                    <input type="text" name="title" class="form-control" id="title"  value="{{$contact->title ?? old('title') ?? ''}}">
                </div>

                <div class="mb-3">
                    <label>{{__('Phone Number')}}</label>
                    <input name="phone_number" class="multisteps-form__input form-control"  value="{{$contact->phone_number ?? old('phone_number') ?? ''}}"  />
                </div>

                <div class="mb-3">
                    <label>{{__('Email')}}</label>
                    <input name="email" type="email" class="multisteps-form__input form-control"  value="{{$contact->email ?? old('email') ?? ''}}" />
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">{{__('Address')}}</label>
                    <textarea class="form-control" name="address_1" id="privacy" rows="4">{{$contact->address_1 ?? old('address_1') ?? ''}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">{{__('Facebook')}}</label>
                    <input type="url" name="facebook" class="form-control" id="facebook"  value="{{$contact->facebook ?? old('facebook') ?? ''}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">{{__('Twitter')}}</label>
                    <input type="url" name="twitter" class="form-control" id="twitter"  value="{{$contact->twitter ?? old('twitter') ?? ''}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">{{__('Youtube')}}</label>
                    <input type="url" name="youtube" class="form-control" id="youtube"  value="{{$contact->youtube ?? old('youtube') ?? ''}}">
                </div>

                @csrf
                @if (!empty($contact))
                    <input type="hidden" name="id" value="{{$contact->id}}">
                @endif
                <div class="button-row text-left mt-4">
                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Next">{{__('Save')}}</button>
                </div>

            </form>
        </div>

    </div>
    <footer class="footer pt-5 mt-5">
        <hr class="horizontal dark mb-5">
        <div class="container">
            <div class=" row">
                <div class="col-md-5 mb-4 ms-auto">
                    <div>
                        <h6 class="text-gradient text-dark font-weight-bolder">
                            @if (!empty($contact))
                                {{$contact->title}}
                            @endif
                        </h6>
                        @if (!empty($contact))

                            {{$contact->address_1}}
                        @endif
                        <br>
                        @if (!empty($contact))

                            {{$contact->email}}
                        @endif
                        <br>
                        @if (!empty($contact))

                            {{$contact->phone_number}}
                        @endif
                    </div>

                </div>
                <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto ">
                    <div>
                        <h6 class="text-gradient text-dark text-sm ms-3">{{__('Pages')}}</h6>
                        <ul class="flex-column  nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/home" target="_blank">
                                    {{__('Home Page')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog" target="_blank">
                                    {{__('Blog')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/course" target="_blank">
                                    {{__('Courses')}}
                                </a>
                            </li>



                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
                    <div>
                        <h6 class="text-gradient text-dark text-sm ms-3">{{__('Connect')}}</h6>
                        <ul class="flex-column  nav">
                            @if (!empty($contact->facebook))

                                <li class="nav-item">
                                    <a class="nav-link " href="{{$contact->facebook}}" target="_blank">
                                        {{__(' Facebook')}}
                                    </a>
                                </li>

                            @endif

                            @if (!empty($contact->youtube))
                                <li class="nav-item">
                                    <a class="nav-link " href="{{$contact->youtube}}" target="_blank">
                                        {{__(' Youtube')}}
                                    </a>
                                </li>

                            @endif

                            @if (!empty($contact->twitter))

                                <li class="nav-item">
                                    <a class="nav-link " href="{{$contact->twitter}}" target="_blank">
                                        {{__(' Twitter')}}
                                    </a>
                                </li>


                            @endif



                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
                    <div>
                        <h6 class="text-gradient text-dark text-sm ms-3">{{__('Legal')}}</h6>
                        <ul class="flex-column  nav">

                            <li class="nav-item">
                                <a class="nav-link" href="/privacy" target="_blank">
                                    {{__(' Privacy Policy')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/termsandconditions" target="_blank">
                                    {{__(' Terms of Service')}}
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="text-start ">
                        <p class="my-4 ms-3 text-sm">
                            All rights reserved. Copyright © <script>
                                document.write(new Date().getFullYear())
                            </script>  by @if (!empty($contact))
                                {{$contact->title}}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

@endsection



