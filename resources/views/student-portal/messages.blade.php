@extends('layouts.student-portal')
@section('title',__('Messages'))

@section('content')

    <div class=" row mb-3">
        <div class="col">
            <h5 class="fw-bolder">
                {{__('Messages')}} /<span class="text-secondary">
                            {{__(" Message to the team members from")}} {{config('app.name')}}
                    </span>
            </h5>
            <p class="text-muted">{{__(' Need Support? message to the admins')}}</p>
        </div>





        <div class="row">
            <div class="col-4">
                <div class="card blur shadow-blur h-100-vh overflow-auto overflow-x-hidden mb-5 mb-lg-0">
                    <div class="card-header p-3">
                        <h6>{{__("Team Members from")}}  {{config('app.name')}} </h6>
                    </div>
                    <div class="card-body p-2">
                        @foreach($admins as $admin)

                            <a href="/student/messages?id={{$admin->id}}" class="d-block p-2 border-radius-lg  mb-2 @if($selected_admin->id  ==  $admin->id) bg-gray @endif">

                                <div class="d-flex p-2">
                                    @if(empty( $admin->photo))
                                        <div
                                                class="avatar  rounded-circle avatar-md bg-info  border-radius-md p-2 ">
                                            <h6 class="text-white fw-normal text-uppercase mt-1 ">{{ $admin->first_name['0']}}{{ $admin->last_name['0']}}</h6>
                                        </div>
                                    @else
                                        <img src="{{PUBLIC_DIR}}/uploads/{{ $admin->photo}}" class="rounded-circle avatar shadow">
                                    @endif

                                    <div class="ms-3">
                                        <div class="justify-content-between align-items-center">
                                            <h6 class=" mb-0">
                                                @if(!empty( $admin->first_name))
                                                    {{ $admin->first_name}} {{ $admin->last_name}}

                                                @endif

                                                <span class="badge badge-success"></span>
                                            </h6>

                                            <div class="text-truncate text-truncate-lg ">

                                                <small class="d-block text-muted text-truncate text-truncate-md">

                                                    @if($admin->last_login && (strtotime($admin->last_login) < $current_time_plus_five_minutes))
                                                        <p class="d-block  text-success fw-bolder text-sm">
                                                            {{__(' Online')}}
                                                        </p>
                                                    @else
                                                        <p class="d-block fw-bolder text-danger text-sm">
                                                            {{__(' Offline')}}
                                                        </p>

                                                    @endif
                                                </small>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card shadow-blur h-100-vh overflow-auto overflow-x-hidden">
                    <div class="card-header  border-bottom">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="d-flex align-items-center">
                                    @if(empty($selected_admin->photo))
                                        <div
                                                class="avatar  rounded-circle avatar-md bg-info  border-radius-md p-2 ">
                                            <h6 class="text-white  fw-normal mt-1 text-uppercase">{{$selected_admin->first_name['0']}}{{$selected_admin->last_name['0']}}</h6>
                                        </div>
                                    @else
                                        <img src="{{PUBLIC_DIR}}/uploads/{{$selected_admin->photo}}" class="rounded-circle avatar shadow">
                                    @endif
                                    <div class="ms-3">
                                        <h6 class="mb-0 d-block">{{$selected_admin->first_name}} {{$selected_admin->last_name}}</h6>
                                        <span class="text-sm text-dark opacity-8">
                                             @if($selected_admin->last_login && (strtotime($selected_admin->last_login) < $current_time_plus_five_minutes))
                                                <p class="d-block  text-success fw-bolder text-sm">
                                                        {{__(' Online')}}
                                                    </p>
                                            @else
                                                <p class="d-block fw-bolder text-danger text-sm">
 {{__(' Offline')}}
                                                    </p>

                                            @endif

                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 my-auto pe-0">

                            </div>

                        </div>
                    </div>
                    <div class="card-body overflow-auto overflow-x-hidden" id="messages">

                        @foreach($messages as $message)


                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <span class="badge text-dark">
                                         @if(!empty($message->created_at))
                                            {{(\App\Supports\DateSupport::parse($message->created_at))->format(config('app.date_format'))}}

                                        @endif
                                    </span>
                                </div>
                            </div>

                            <div class="row
@if ($message->type == 'Student')
                                    justify-content-end

        @else

                                    justify-content-start

@endif

                                    text-right mb-4">
                                <div class="col-auto">
                                    <div class="card opaccity-9
                              @if ($message->type == 'Student')

                                            bg-info


                             @else


                                            bg-gray

@endif">


                                        <div class="card-body py-2 px-3">
                                            <p class="mb-0
                                           @if ($message->type == 'Student')
                                                    text-end

 @else

                                                    text-start
@endif
                                            @if ($message->type == 'Student')

                                                    text-white
@else


                                                    text-dark
@endif">


                                                {!! $message->message !!}
                                            </p>
                                            <div class="d-flex  text-start  text-sm opacity-6">
                                                <small class="@if ($message->type == 'Student')
                                                        text-white

@else


                                                        text-dark
@endif"> {{$message->created_at->diffForHumans()}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                        <div class="row justify-content-start">
                            <div class="col-auto">
                                <div class="card ">
                                    <div class="card-body py-2 px-3">
                                        <p class="mb-0">

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-block">
                        <form class="align-items-center">
                            <div class="d-flex">
                                <div class="input-group">
                                    <input type="text" id="message" name="message" class="form-control" placeholder="Type here" aria-label="Message example input">
                                </div>
                                <button id="send_message" class="btn btn-success mb-0 ms-2">
                                    <i class="ni ni-send"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')

    <script>
        $(function () {
            "use strict";

            let $send_message = $('#send_message');
            let $messages = $('#messages');

            //Scroll to bottom of the messages div
            $messages.scrollTop($messages[0].scrollHeight);

            $send_message.on('click', function (event) {
                event.preventDefault();
                let $message = $('#message');
                let message = $message.val();
                if (message.length > 0) {
                    $messages.append('<div class="row justify-content-end text-right mb-4">\
                        <div class="col-auto">\
                        <div class="card bg-info">\
                        <div class="card-body py-2 px-3">\
                        <p class="mb-0 text-white">\
                        ' + message +'\
                    </p>\
                    <div class="d-flex align-items-center justify-content-end text-sm opacity-6">\
                        <i class="ni ni-check-bold text-sm me-1 text-white"></i>\
                        <small class="text-white">4:42pm</small>\
                    </div>\
                </div>\
                </div>\
                </div>\
                </div>');
                    $message.val('');
                    $message.focus();
                    $messages.scrollTop($messages[0].scrollHeight);
                    $.ajax({
                        url: '/student/send-messages',
                        type: 'POST',
                        data: {
                            message: message,
                            admin_id: '{{$selected_admin->id}}',
                            _token: '{{csrf_token()}}',
                        }
                    });
                }
            });
        });
    </script>

@endsection

