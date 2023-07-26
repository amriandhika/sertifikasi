@extends('layouts.admin-portal')
@section('title',__('Messages'))
@section('style')

@endsection

@section('content')

<div class="row mb-2">
        <div class="col">
            <div>
                <h5 class="fw-bolder">
                    {{__('Messages')}} /<span class="text-secondary">
                            {{__('Message to the students')}}
                    </span>
                </h5>
                <p class="text-muted">{{__('Reply and send messages to the students')}}</p>
            </div>

        </div>
        <div class="col text-end">

        </div>

</div>

    <div class="row">
        <div class="col-4">
            <div class="card h-100-vh  overflow-auto overflow-x-hidden mb-4 mb-lg-0">
                <div class="card-header p-3">
                    <h6>{{__('Students')}}</h6>
                </div>
                <div class="card-body p-2">

                    @if(!count($students))

                        <div class="text-center">
                            <h5 class="text-muted">{{__('No students found')}}</h5>
                        </div>

                    @else

                        @foreach($students as $student)

                            <a href="/messages?id={{$student->id}}" class="d-block p-2 border-radius-lg  mb-2 @if($student_id == $student->id) bg-gray @endif">

                                <div class="d-flex p-2">

                                    @if(empty($student->photo))

                                        <div class="avatar rounded-circle avatar-sm bg-info border-radius-md p-2 ">
                                            <p class="text-white fw-normal text-uppercase mt-3 ">{{$student->first_name['0']}}{{$student->last_name['0']}}

                                            </p>

                                        </div>

                                    @else
                                        <img src="{{PUBLIC_DIR}}/uploads/{{$student->photo}}" class="rounded-circle avatar avatar-sm shadow">
                                    @endif

                                    <div class="ms-3">
                                        <div class="justify-content-between align-items-center">
                                            <h6 class=" mb-0">
                                                @if(!empty($student))
                                                    {{$student->first_name}} {{$student->last_name}}
                                                @endif

                                                <span class="badge badge-success"></span>
                                            </h6>
                                            <div class="text-truncate text-truncate-lg ">

                                                <small class="d-block text-muted text-truncate text-truncate-md">

                                                    @if($student->last_login && (strtotime($student->last_login) < $current_time_plus_five_minutes))
                                                        <p class="d-block fw-bolder  text-success text-sm">
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

                    @endif


                </div>
            </div>
        </div>
        <div class="col-8">
            @if(!$selected_student)
                <p class="text-muted">{{__('Add student to start chat.')}}</p>
                <a href="/new-student" class="btn btn-info">{{__('Add Student')}}</a>
            @else
                <div class="card h-100-vh overflow-x-hidden ">
                    <div class="card-header border-bottom">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="d-flex align-items-center">


                                    @if(empty($selected_student->photo))
                                        <div
                                                class="avatar  rounded-circle avatar-md bg-info  border-radius-md p-2 position-relative ">
                                            <h5 class="text-white text-uppercase  fw-normal mt-1">{{$selected_student->first_name['0']}}{{$selected_student->last_name['0']}}</h5>



                                        </div>
                                    @else
                                        <img src="{{PUBLIC_DIR}}/uploads/{{$selected_student->photo}}" class="rounded-circle avatar shadow">
                                    @endif
                                    <div class="ms-3">
                                        <h6 class="mb-0 d-block">{{$selected_student->first_name}} {{$selected_student->last_name}}</h6>
                                        <span class="text-sm text-dark opacity-8">
                                        @if($selected_student->last_login && (strtotime($selected_student->last_login) < $current_time_plus_five_minutes))
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

                        </div>
                    </div>
                    <div class="card-body overflow-auto overflow-x-hidden" id="messages">


                        @foreach($messages as $message)
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <span class="badge text-dark">{{$message->created_at}}</span>
                                </div>
                            </div>
                            <div class="row
@if($message->type == 'Student')
                                    justify-content-start



@else
                                    justify-content-end

@endif
                                    mb-4">
                                <div class="col-auto">
                                    <div class="card
                              @if($message->type == 'Student')

                                            bg-gray

@else
                                            bg-info


@endif">

                                        <div class="card-body  py-2 px-3">
                                            <p class="mb-0 text-start

                                         @if($message->type == 'Admin')
                                                    text-white @else  text-dark @endif">

                                                {!! $message->message !!}
                                            </p>
                                            <div class="d-flex  text-start text-sm opacity-6">
                                                <small class="    @if($message->type == 'Admin')

                                                        text-white
@else


                                                        text-dark
@endif">
                                                    @if(!empty($message->created_at))
                                                        {{$message->created_at->diffForHumans()}}
                                                    @endif

                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach



                    </div>

                    <div class="card-footer d-block">
                        <form class="align-items-center">
                            <div class="d-flex">
                                <div class="input-group">
                                    <input type="text" id="message" name="message" class="form-control" placeholder="{{__('Type Message here')}}" aria-label="Message example input">
                                </div>
                                <button id="send_message" class="btn btn-success mb-0 ms-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection

@section('script')

    <script>
        $(function () {
            "use strict";
            let $send_message = $('#send_message');
            let $messages = $('#messages');
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
                      \
                        <small class="text-white"></small>\
                    </div>\
                </div>\
                </div>\
                </div>\
                </div>');
                    $message.val('');
                    $message.focus();
                    $messages.scrollTop($messages[0].scrollHeight);
                    $.ajax({
                        url: '/admin/chat-send',
                        type: 'POST',
                        data: {
                            message: message,
                            _token: '{{csrf_token()}}',
                            student_id: '{{$student_id}}',

                        }
                    });
                }
            });
        });
    </script>

@endsection