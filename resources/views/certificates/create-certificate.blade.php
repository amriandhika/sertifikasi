@extends('layouts.admin-portal')
@section('title',__('Create Certificates'))

@section('content')
    <div class=" row mb-2">
        <div class="col">
            <h5 class="  fw-bolder">
                {{__('Certificates')}} /<span class="text-secondary">
                           {{__(' Create Certificate templates')}}
                    </span>
            </h5>
            <p class="text-muted">{{__('Create, edit or delete certificate templates.')}}</p>
        </div>
        <div class="col text-end">

            <a href="/certificates" type="button" class="btn btn-info text-white"> {{__('Certificate Templates')}}</a>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="/save-certificate-template" method="post" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="alert bg-pink-light text-danger fw-bolder">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card ">
                   <div class="card-header border-bottom">
                 <h5 class="card-title">{{__('Create Certificate Template')}}</h5>
                   </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{__('Template Title')}}</label>
                            <input type="text" name="title" class="form-control" value="{{$certificate->title ?? old('title') ?? ''}}">
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label mt-3">{{__('Border Color')}}</label>
                                    <input type="color" class="form-control" name="border_color" value="{{$certificate->border_color ?? old('border_color') ?? ''}}">
                                    <p class="text-xs">
                                        {{__('Pick color for border')}}
                                    </p>
                                </div>


                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label mt-3">{{__('Background Color')}}</label>
                                    <input type="color" class="form-control" name="background_color" value="{{$certificate->background_color ?? old('background_color') ?? ''}}">
                                    <p class="text-xs">
                                        {{__('Pick color for background')}}
                                    </p>

                                </div>

                            </div>

                        </div>


                        <div class="mb-3 ">

                            <label for="exampleFormControlInput1" class="form-label">{{__('Select Course')}}</label>
                            <select class="form-select form-select-solid fw-bolder" id="contact"
                                    aria-label="Floating label select example" name="course_id">
                                <option value="0">{{__('None')}}</option>
                                @foreach ($courses as $course)
                                    <option value="{{$course->id}}"
                                            @if (!empty($certificate))
                                            @if ($certificate->course_id === $course->id)
                                            selected
                                            @endif
                                            @endif
                                    >{{$course->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 mt-2">
                            <label for="logo_file" class="form-label">{{__('Upload Organization Logo')}}</label>
                            <input class="form-control" name="logo" type="file" id="logo_file">
                        </div>
                        @csrf

                        @if($certificate)
                            <input type="hidden" name="id" value="{{$certificate->id}}">
                        @endif

                        <div class="d-flex  mt-4">
                            <button type="submit" name="button" class="btn btn-info  m-0 ">
                                {{__('Save')}}
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <div class="col-md-6">

            <div class="card border-5 border-radius-sm" @if(!empty($certificate->background_color))
                                                            style="background-color:
                {{$certificate->background_color}};border-color: {{$certificate->border_color}}"

                    @endif
            >

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-8">
                            <h4 class=" mt-4">
                                @if(!empty($certificate->logo))
                                    <img src="{{PUBLIC_DIR}}/uploads/{{$certificate->logo}}"
                                         class="w-50">
                                @else
                                    {{__(' Company logo')}}
                                @endif
                            </h4>
                            <p class="mb-3">
                                <small> {{__('Certificate of Completion')}}</small>
                            </p>
                        </div>
                        <div class="col-md-4">

                        </div>


                    </div>

                    <h2>

                        {{__(' John doe')}}

                    </h2>

                    <p class="">
                        <small>{{__('has successfully completed the course')}} </small>
                    </p>
                    <h5 class="h6 text-decoration-underline">
                        @if(!empty($certificate->course_id))

                            @if(!empty($courses[$certificate->course_id]))
                                @if(isset($courses[$certificate->course_id]))
                                    {{$courses[$certificate->course_id]->name}}
                                @endif
                            @endif

                        @endif
                    </h5>
                    <p class="">
                        <small> {{__('on february 23, 2022')}}</small>
                    </p>

                    <p class="reason mb-4">
                        <br/>

                    </p>

                </div>
            </div>

        </div>

    </div>



@endsection
@section('script')
    <script>

        $(function () {
            "use strict";

            var ep = new Vue({
                el: '#ep-flowchart',
                data: {
                    selected: ''
                },
                methods: {

                }
            })

            tinymce.init({
                selector: '#description',


                plugins: 'table,code',


            });



        });


    </script>

@endsection






