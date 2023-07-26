<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if(!empty($super_settings['favicon']))

        <link rel="icon" type="image/png" href="{{PUBLIC_DIR}}/uploads/{{$super_settings['favicon']}}">
    @endif
    <title>
        @yield('title')-{{config('app.name')}}
    </title>
    <link id="pagestyle" href="{{PUBLIC_DIR}}/css/app.css?v=19" rel="stylesheet" />
    @yield('head')

</head>

<body class="about-us">

<nav class="navbar shadow-none border-bottom  navbar-expand-lg navbar-light fixed-top bg-white py-3">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="/" rel="tooltip"  data-placement="bottom" target="_blank">
            @if(!empty($super_settings['logo']))
                <img src="{{PUBLIC_DIR}}/uploads/{{$super_settings['logo']}}" class="navbar-brand-img h-100" style="max-height: {{$super_settings['frontend_logo_max_height'] ?? '30'}}px;" alt="...">
            @else
                <span class=" font-weight-bold">{{config('app.name')}}</span>
            @endif
        </a>

        <a href="/cart" class=" btn btn-md btn-icon-only btn-info btn-rounded position-relative d-lg-none d-block">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>

            @if(!empty($cart))
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{count($cart)}}
                </span>
            @endif
        </a>

        <a href="/signup" class="btn btn-sm  btn-dark-blue  btn-round mb-0 ms-auto d-lg-none d-block">{{__('Signup')}}</a>


        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon mt-2">
<span class="navbar-toggler-bar bar1"></span>
<span class="navbar-toggler-bar bar2"></span>
<span class="navbar-toggler-bar bar3"></span>
</span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">

            <ul class="navbar-nav bg-transparent shadow-none navbar-nav-hover w-60  mx-auto">

                <li class="nav-item  ms-lg-auto mx-2">
                    <a  href="/" class=" fw-bolder  ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                        {{__('Home')}}

                    </a>
                </li>

                <li class="nav-item   ms-lg-auto mx-2">
                    <a class=" fw-bolder ps-2 d-flex justify-content-between cursor-pointer align-items-center me-2" href="/course" >
                        {{__('Courses')}}

                    </a>
                </li>
                <li class="nav-item   ms-lg-auto mx-2">
                    <a class=" fw-bolder ps-2 d-flex justify-content-between cursor-pointer align-items-center me-2" href="/shop" >
                        {{__('Shop')}}

                    </a>
                </li>
                <li class="nav-item   ms-lg-auto mx-2">
                    <a class=" fw-bolder ps-2 d-flex justify-content-between cursor-pointer align-items-center me-2" href="/blog">
                        {{__('Blog')}}

                    </a>
                </li>
                <li class="nav-item  ms-lg-auto mx-2">
                    <a class=" fw-bolder ps-2 d-flex justify-content-between cursor-pointer align-items-center me-5" href="/student/login" target="_blank">

                        {{__('Login')}}

                    </a>
                </li>



            </ul>
            <ul class="navbar-nav  d-lg-block  d-none">

                <li class="nav-item">
                    <a href="/cart" class=" me-2 btn btn-md btn-icon-only btn-info btn-rounded position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>

                        @if(!empty($cart))
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{$cart_count}}</span>
                        @endif

                    </a>


                    @if(!empty($student))

                        <a href="/student/dashboard" class="btn btn-md  btn-dark-blue btn-rounded mb-0 me-1">{{__('Welcome')}} {{$student->first_name}}</a>

                    @else

                        <a href="/signup" class="btn btn-md  btn-dark-blue btn-rounded mb-0 me-1">{{__('Signup')}}</a>

                    @endif

                </li>
            </ul>
        </div>
    </div>
</nav>


@yield('content')

<!-- -------- START FOOTER 5 w/ DARK BACKGROUND ------- -->

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
                    <h6 class="text-gradient text-dark ms-3">{{__('Pages')}}</h6>
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
                        <li class="nav-item">
                            <a class="nav-link" href="/shop" target="_blank">
                                {{__('shop')}}
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
                <div>
                    <h6 class="text-gradient text-dark ms-3">{{__('Connect')}}</h6>
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
                    <h6 class="text-gradient text-dark ms-3">{{__('Legal')}}</h6>
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
                        <li class="nav-item">
                            <a class="nav-link" href="/cookie-policy" target="_blank">
                                {{__(' Cookie Policy')}}
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

<script src="{{PUBLIC_DIR}}/js/app.js?v=94"></script>

@yield('script')

</body>

</html>
