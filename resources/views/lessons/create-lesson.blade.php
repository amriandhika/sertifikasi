@extends('layouts.admin-portal')
@section('title',__('Create Lesson'))
@section('content')

    <form action="/save-lesson" method="post" enctype="multipart/form-data" >
        @if ($errors->any())
            <div class="alert bg-pink-light text-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <div class="row">
                <div class="col-lg-6">
              <h4>       {{__('Add lesson')}} {{__('for')}}   {{$course->name}}</h4>

                </div>
                <div class="col-lg-6 text-end d-flex flex-row">

                    <button type="submit" class="btn btn-info mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0">{{__('Save')}}</button>
{{--                    <a href="/create-lesson?course_id={{$course->id}}" class="btn btn-info mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0">{{__('Add Lesson')}}</a>--}}

                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-8 mt-lg-0 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-weight-bolder">{{__('Lesson Information')}}</h5>
                            <div class="row">

                            </div>

                            <div class="form-group">
                                <label for="lessonTitle" class="form-label">{{__('Lesson Title')}}</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" name="title" value="{{$lesson->title ?? old('title') ?? ''}}" id="lessonTitle">

                            </div>
                            <div class="form-group">
                                <label class="">{{__('Duration')}}</label>
                                <input class="form-control" type="text" name="duration" value="{{$lesson->duration ?? old('duration') ?? ''}}" />
                                <small>mm:ss</small>
                            </div>
                            <label for="basic-url" for="lessonSlug" class="form-label">{{__('Slug')}}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text fw-bolder">{{config('app.url')}}/lesson/</span>
                                <input type="text" value="{{$lesson->slug ?? old('slug') ?? ''}}" id="lessonSlug" name="slug" class="form-control ps-1">
                            </div>

                            <label class="">{{__('Summary/Short Description')}}</label>
                            <p class="form-text text-info-light text-xs ms-1">
                                {{__('Write a short description.Within 150 words. This summary will be public and be shown in the website')}}
                            </p>

                            <div class="form-group">
                            <textarea class="form-control" rows="10" id="summary"
                                      name="summary">@if(!empty($lesson)){!! $lesson->summary!!}@endif</textarea>
                            </div>

                            <label class="">{{__('Description')}}</label>

                            <div class="form-group">
                            <textarea class="form-control" rows="10" id="description"
                                      name="description">@if(!empty($lesson)){!! $lesson->description !!}@endif</textarea>
                            </div>

                            @csrf
                            @if($course)
                                <input type="hidden" name="course_id" value="{{$course->id}}">
                            @endif
                            @if($lesson)
                                <input type="hidden" name="id" value="{{$lesson->id}}">
                            @endif

                            @if(config('app.has_quizzes'))
                                <div class="mb-3">
                                    <h4>{{__('Quizzes')}}</h4>

                                    <button type="submit" name="add_quiz" value="1" id="add_quiz_btn" class="btn btn-info btn-sm mb-3">{{__('Add Quiz')}}</button>

                                    <div id="quizzes_container">


                                        @if(!empty($quizzes))

                                            @foreach($quizzes as $quiz)


                                                <div class="rounded-3 p-3 bg-light mb-3">
                                                    <div class="mb-3 quiz">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="quiz_title_{{$quiz->id}}">{{__('Quiz Title')}}</label>
                                                            <input type="text" class="form-control" name="quiz_title[{{$quiz->id}}]" value="{{$quiz->title}}" id="quiz_title_{{$quiz->id}}">
                                                        </div>

                                                        @if(!empty($answers[$quiz->id]))

                                                            @foreach($answers[$quiz->id] as $answer)

                                                                <div class="mb-3">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="quiz_correct[{{$quiz->id}}]" value="{{$answer->id}}" id="quiz_{{$answer->id}}" @if($answer->is_correct) checked @endif >
                                                                        <label class="form-check-label" for="quiz_{{$answer->id}}">
                                                                            <input class="form-control" name="quiz_answer[{{$answer->id}}]" value="{{$answer->answer}}">
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            @endforeach

                                                        @endif


                                                        <div class="mb-3">
                                                            <label class="form-label" for="quiz_mark_{{$quiz->id}}">{{__('Mark')}}</label>
                                                            <input type="number" class="form-control" name="quiz_mark[{{$quiz->id}}]" value="{{$quiz->mark ?? 1 }}" id="quiz_mark_{{$quiz->id}}">
                                                        </div>


                                                        <button type="submit" name="delete_quiz" value="{{$quiz->id}}" class="btn btn-danger btn-sm">{{__('Delete Quiz')}}</button>

                                                    </div>
                                                </div>


                                            @endforeach

                                        @endif

                                    </div>



                                </div>
                            @endif


                            <button type="submit" class="btn btn-info mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0">{{__('Save')}}</button>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="font-weight-bolder">{{__('Upload Video')}}</h5>
                            <div class="row">
                                <div class="col-12">

                                    @if(!empty($lesson->video))
                                        <iframe class="embed-responsive-item w-100  border-radius-lg shadow-lg mt-3" src="{{PUBLIC_DIR}}/uploads/{{$lesson->video}}" type="video/mp4">

                                    @elseif(!empty($lesson->youtube_video))

                                                <iframe class="embed-responsive-item w-100  border-radius-lg shadow-lg mt-3" src="https://www.youtube.com/embed/{{$lesson->youtube_video}}?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                                     @else
                                       <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg" class="w-100 border-radius-lg shadow-lg mt-3">

                                    @endif
                                </div>


                                <div class="align-self-center">
                                    <div>
                                        <label for="cover_photo" class="form-label mt-3">{{__('Upload Video')}}</label>
                                        <input class="form-control" name="video" type="file" >
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <div>
                                        <label for="youtube_video" class="form-label mt-3">{{__('Youtube Video Id')}}</label>
                                        <p class="form-text text-info-light text-xs ms-1">{{__('You can put the link of the video it will automatically get the ID.')}}</p>

                                        <input class="form-control" value="{{$lesson->youtube_video ?? old('youtube_video') ?? ''}}" name="youtube_video" id="youtube_video" type="text" >

                                    </div>
                                </div>


                                <div class="mb-3 mt-3">
                                    <label for="formFileMultiple" class="form-label">{{__('Attach file')}}</label>
                                    <input class="form-control" name="file" type="file" id="formFileMultiple">
                                </div>


                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>



    </form>


@endsection

@section('script')
    <script>
        $(function () {
            "use strict";
            flatpickr("#start_date", {

                dateFormat: "Y-m-d",
            });

            flatpickr("#end_date", {

                dateFormat: "Y-m-d",
            });

            tinymce.init({
                selector: '#summary',
                plugins: 'table,code',
                branding: false,
                menubar:false,
                toolbar:'styleselect | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code | undo redo|numlist bullist',
                lists_indent_on_tab: false,

            });
            tinymce.init({
                selector: '#description',
                plugins: 'table,code',
                branding: false,
                toolbar:'styleselect | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code | undo redo|numlist bullist',
                lists_indent_on_tab: false,


            });

            @if(empty($lesson))

            let lessonTitle = document.getElementById('lessonTitle');

            lessonTitle.addEventListener('keyup', function (event) {
                event.preventDefault();
                let title = lessonTitle.value;
                document.getElementById('lessonSlug').value = title.toLowerCase().split(' ').join('-');
            });

            @endif

            const youtube_video = document.getElementById('youtube_video');

            youtube_video.addEventListener('change', function (event) {
                event.preventDefault();
                let youtube_video_value = youtube_video.value;
                if(youtube_video_value )
                {
                    let youtube_video_id = youtube_video_value.split('v=')[1];

                    if(youtube_video_id)
                    {
                        youtube_video.value = youtube_video_id;
                    }

                }

            });

        });
    </script>
@endsection
