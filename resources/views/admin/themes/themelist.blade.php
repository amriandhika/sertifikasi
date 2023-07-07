@extends('layouts.admin-portal')
@section('content')

    <div class=" row mb-2">
        <div class="col">
            <spna>

                <h5 class="  fw-bolder">
                    {{__('CMS')}} /<span class="text-secondary">
                          {{__('Frontend Themes')}}
                    </span>
                </h5>
                <p class="text-muted">{{__('Select and edit the content of the frontend landing pages.')}}</p>

            </spna>



        </div>

    </div>


    <div class="row mt-4">
        <div class="col-lg-4 mb-lg-0 mb-4">
            <a href="/theme-pages">
                <div class="card">
                    <div class="card-body">
                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 144">
                            <rect x="16.5" y="10.5" width="169" height="128" rx="3.5" fill="#F5F6F9" stroke="#E7EAF3"/>
                            <path d="M17 14a3 3 0 0 1 3-3h160a3 3 0 0 1 3 3v6H17v-6Z" fill="#fff"/>
                            <circle cx="21.5" cy="15.5" r="1.5" fill="#ED6B5F"/>
                            <circle cx="27.5" cy="15.5" r="1.5" fill="#F7D289"/>
                            <circle cx="33.5" cy="15.5" r="1.5" fill="#61C454"/>
                            <path d="M17 21h44v112H20a3 3 0 0 1-3-3V21ZM62 21h121v7H62z" fill="#fff"/>
                            <rect x="31" y="70" width="17" height="3" rx="1.5" fill="#D9DDEA"/>
                            <rect x="31" y="80" width="10" height="3" rx="1.5" fill="#D9DDEA"/>
                            <rect x="31" y="90" width="16" height="3" rx="1.5" fill="#D9DDEA"/>
                            <rect x="31" y="100" width="22" height="3" rx="1.5" fill="#D9DDEA"/>
                            <path fill="#D9DDEA" d="M17 118h44v1H17z"/>
                            <rect x="27" y="124" width="4" height="4" rx="2" fill="#D9DDEA"/>
                            <rect x="37" y="124" width="4" height="4" rx="2" fill="#D9DDEA"/>
                            <rect x="47" y="124" width="4" height="4" rx="2" fill="#D9DDEA"/>
                            <rect x="172" y="23" width="3" height="3" rx="1.5" fill="#D9DDEA"/>
                            <rect x="166" y="23" width="3" height="3" rx="1.5" fill="#D9DDEA"/>
                            <rect x="160" y="23" width="3" height="3" rx="1.5" fill="#D9DDEA"/>
                            <rect x="154" y="23" width="3" height="3" rx="1.5" fill="#D9DDEA"/>
                            <rect x="70" y="23" width="17" height="3" rx="1.5" fill="#D9DDEA"/>
                            <path fill="#EBEDF5" d="M17 20h166v1H17zM62 28h121v1H62z"/>
                            <rect x="25" y="31" width="13" height="5" rx="2.5" fill="#377DFF"/>
                            <path fill="#E7EAF3" d="M61 21h1v112h-1z"/>
                            <rect x="31.092" y="50.754" width="21.046" height="4.708" rx="1.108" fill="#E4E7F0" fill-opacity=".7"/>
                            <rect x="32.477" y="52.139" width="9.692" height="1.938" rx=".969" fill="#D9DDEA"/>
                            <rect x="31.092" y="57.954" width="21.046" height="3.046" rx="1.523" fill="#D9DDEA"/>
                            <rect x="31.092" y="43" width="21.046" height="3.877" rx="1.938" fill="#377DFF"/>
                            <rect x="25" y="43" width="3.877" height="3.877" rx="1.938" fill="#377DFF"/>
                            <rect x="25" y="70" width="3" height="3" rx="1.5" fill="#D9DDEA"/>
                            <rect x="25" y="80" width="3" height="3" rx="1.5" fill="#D9DDEA"/>
                            <rect x="25" y="90" width="3" height="3" rx="1.5" fill="#D9DDEA"/>
                            <rect x="25" y="100" width="3" height="3" rx="1.5" fill="#D9DDEA"/>
                            <path fill="#E7EAF3" d="M26.662 50.754h.831V61h-.831z"/>
                        </svg>

                        <h6 class="ms-2 mt-4 mb-0">{{__('Default Theme')}} </h6>
                        <p class="text-sm ms-2">{{__('Click to edit the content')}} </p>

                    </div>
                </div>

            </a>

        </div>

    </div>

@endsection