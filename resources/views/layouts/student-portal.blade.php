<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if(!empty($settings['favicon']))

        <link rel="icon" type="image/png" href="{{PUBLIC_DIR}}/uploads/{{$settings['favicon']}}">
    @endif
    <title>@yield('title') - {{config('app.name')}}</title>

    <link id="pagestyle" href="{{PUBLIC_DIR}}/css/app.css?v=1092" rel="stylesheet"/>


    @yield('head')


</head>

<body class="g-sidenav-show " id="clx_body">


<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0  fixed-left " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>

        <a class="navbar-brand text-center m-0" href="{{config('app.url')}}/dashboard">
            @if(!empty($settings['logo']))
                <img src="{{PUBLIC_DIR}}/uploads/{{$settings['logo']}}" class="navbar-brand-img h-100" alt="...">
            @else
                <span class="ms-1 font-weight-bold"> {{config('app.name')}}</span>
            @endif
        </a>
    </div>

    <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">

        <ul class="navbar-nav">
            <li class="nav-item">
                <div class=" text-center">

                    <div class=" ">
                        <div class="avatar rounded-circle avatar-xl position-relative ">
                            @if(empty($student->photo))
                                <div class="avatar avatar-xl rounded-circle bg-info-light border-radius-md  ">
                                    <h6 class="text-info-light text-uppercase mt-1">{{$student->first_name['0']}}{{$student->last_name['0']}}</h6>
                                </div>

                            @else
                                <img src="{{PUBLIC_DIR}}/uploads/{{$student->photo}}" class="w-100 border-radius-lg shadow-sm">
                            @endif

                        </div>
                    </div>
                    <div class="col-auto my-auto ms-2">
                        <div class="h-100">
                            <h5 class="mb-1 mt-2 ">

                            </h5>

                        </div>
                    </div>

                    <!-- Content -->
                </div>


            </li>
            <li class="nav-item mt-4">
                <a class="nav-link @if(($selected_navigation ?? '') === 'dashboard') active @endif" href="/student/dashboard">

                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="nav-link-text  ms-3">{{ __('Dashboard') }}</span>
                </a>

            </li>


            <li class="nav-item ">
                <a class="nav-link @if(($selected_navigation ?? '') === 'student-course') active @endif " href="/student/my-courses">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    <span class="nav-link-text  ms-3">{{__('Courses')}}</span>
                </a>
            </li>


            <li class="nav-item ">
                <a class="nav-link @if(($selected_navigation ?? '') === 'ebooks') active @endif " href="/student/ebooks">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                    <span class="nav-link-text  ms-3">{{__('eBooks')}}</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link @if(($selected_navigation ?? '') === 'assignments') active @endif " href="/student/assignments">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>

                    <span class="nav-link-text  ms-3">{{__('Assignments')}}</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link @if(($selected_navigation ?? '') === 'student-certificates') active @endif"
                   href="/student/my-certificates">

                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award "><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                    <span class="nav-link-text  ms-3">{{__('Certificates')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(($selected_navigation ?? '') === 'messages') active @endif"
                   href="/student/messages">

                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                    <span class="nav-link-text  ms-3">{{__('Messages')}}</span>
                </a>
            </li>

            <li class="nav-item mt-3 mb-2">
                <h6 class="ps-4 ms-2 text-uppercase text-muted text-xs opacity-6">{{__('Account Settings')}}  </h6>
            </li>

            <li class="nav-item">
                <a class="nav-link @if(($selected_navigation ?? '') === 'my-profile') active @endif " href="/student/profile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="nav-link-text  ms-3">{{__('My Profile')}}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if(($selected_navigation ?? '') === 'orders') active @endif  " href="/orders">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-shopping-cart">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span class="nav-link-text  ms-3">{{__('Orders')}}</span>
                </a>
            </li>

            <li class="nav-item mb-4">
                <a class="nav-link " href="/student-logout">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out text-danger"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    <span class="nav-link-text   text-danger ms-3">{{__('Logout')}}</span>
                </a>
            </li>

        </ul>
    </div>

    <div class="sidenav-footer mx-3 mb-3 ">
        <div class="card shadow-none bg-dark-alt" id="sidenavCard">

            <div class="card-body  text-start p-3 w-100">
                <div class="icon icon-shape icon-sm bg-purple-light shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="8 12 12 16 16 12"></polyline><line x1="12" y1="8" x2="12" y2="16"></line></svg>
                </div>
                <div class="docs-info">
                    <h6 class="text-white up mb-2">{{__('Browse Courses')}}</h6>

                    <a href="/home" target="_blank" class="btn btn-info btn-sm w-100 mb-0">{{__('Go to website')}}</a>
                </div>
            </div>
        </div>

    </div>

</aside>

<main class="main-content border-radius-md ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder mb-0"></h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                    </div>
                </div>
                <ul class=" justify-content-end">
                    <li class="nav-item px-3 d-flex align-items-center">
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid">
        @yield('content')
    </div>
</main>

<!--   Core JS Files   -->
<script src="{{PUBLIC_DIR}}/js/app.js?v=100"></script>
<script src="{{PUBLIC_DIR}}/lib/tinymce/tinymce.min.js?v=59"></script>
<script>
    (function(){
        "use strict";

        var win = navigator.platform.indexOf('Win') > -1;

        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    })();
</script>

@yield('script')

</body>
</html>

