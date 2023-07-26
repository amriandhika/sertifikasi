@extends('layouts.student-portal')
@section('title',$lesson->title)

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/video.js/8.3.0/video-js.min.css" integrity="sha512-IhUEHAVKtjGwKoBY2lnSHDo7Ivn9oKNLJMNbU6JygLxxfxj/12xby07R0KLu+3fJt6QbYukZZi5X6AaHr4MigQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/8.3.0/video.min.js" integrity="sha512-2uqQaCV1+Xwdhj0ZwOuckUfVRwK+uWl372jXlURTK376U/rt0pg8zwEKYlMhzTg6JsyUciE0ogqEXJ54TDfgOg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-youtube/3.0.0/Youtube.min.js" integrity="sha512-W11MwS4c4ZsiIeMchCx7OtlWx7yQccsPpw2dE94AEsZOa3pmSMbrcFjJ2J7qBSHjnYKe6yRuROHCUHsx8mGmhA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')


    <div class="row">
        <div class="col-md-8">
            <section class="bg-dark-alt border-radius-sm py-0 py-sm-4">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8">
                            <!-- Badge -->
                            <!-- Title -->
                            <h2 class="text-white">
                                @if(!empty($lesson->title))
                                    {{$lesson->title}}
                                @endif
                            </h2>

                        <!-- Content -->
                            <ul class="list-inline mb-0 ">

                                <li class="list-inline-item text-sm  mb-1 mb-sm-0 text-white"><i class="bi bi-patch-exclamation-fill text-danger"></i>{{__('Updated')}}@if(!empty($lesson->title))
                                        {{ \Carbon\Carbon::parse($lesson->updated_at)->diffForHumans() }}

                                    @endif
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <div class=" mt-4">
                <div class="position-relative mb-3">

                    @if(!empty($lesson->video))
                        <iframe controlsList="nodownload" class="embed-responsive-item w-100 height-400  border-radius-lg shadow-lg mt-3" src="{{PUBLIC_DIR}}/uploads/{{$lesson->video}}" type="video/mp4">
                        </iframe>

                    @elseif(!empty($lesson->youtube_video))

{{--                        <iframe class="embed-responsive-item w-100 height-400 border-radius-lg shadow-lg mt-3" src="https://www.youtube.com/embed/{{$lesson->youtube_video}}?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}

                        <video
                                id="youtube_player"
                                class="video-js vjs-default-skin vjs-16-9"
                                controls
                        >
                        </video>


                    @else
                        <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg" class="w-100 border-radius-lg shadow-lg mt-3">

                    @endif
                </div>

                <div class="card shadow rounded-2 p-0 mb-5">
                    <!-- Tabs START -->

                    <div class="card-header border-bottom px-4 py-3">

                        <h5 class="">{{__('Lesson Description')}}</h5>
                    </div>
                    <!-- Tabs END -->

                    <!-- Tab contents START -->
                    <div class="card-body p-4">

                        <div class="row">
                            <div class="col-md-6">
                                @if($lesson_completed)
                                    {{__('You have completed this lesson.')}}
                                    @else
                                    <button type="button" id="btn_mark_lesson_complete" class="btn btn-primary mb-3">{{__('Mark as Complete')}}</button>
                                @endif
                            </div>
                            <div class="col-md-6 text-end">
                                <h5 id="duration_counter"></h5>
                            </div>
                        </div>

                        <div class="tab-content pt-2" id="course-pills-tabContent">
                            <!-- Content START -->
                            <div class="tab-pane fade show active" id="course-pills-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                                <!-- Course detail START -->


                            @if(!empty($lesson->description))
                                {!! $lesson->description !!}

                            @endif
                            <!-- Course detail END -->
                            </div>

                        </div>
                    </div>

                </div>

                @if(config('app.has_quizzes'))

                    @if(!empty($quizzes) && count($quizzes) > 0)

                        <form method="post" action="/student/check-quiz-submission">
                            <div class="card shadow rounded-2 p-0 mb-5">
                                <div class="card-header border-bottom px-4 py-3">
                                    <h5 class="">{{__('Quizzes')}}</h5>
                                </div>
                                <div class="card-body p-4">

                                    @if($last_quiz_attempt)
                                        <div class="alert alert-info">
                                            <h6>{{__('Last attempt:')}} {{$last_quiz_attempt->created_at->format(config('app.date_format'))}}</h6>
                                            <div class="mb-1"><strong>{{__('Total Quiz Questions')}}: </strong> {{$last_quiz_attempt->total_quiz_questions}}</div>
                                            <div class="mb-1"><strong>{{__('Total Answers Given')}}: </strong> {{$last_quiz_attempt->total_answers_given}}</div>
                                            <div class="mb-1"><strong>{{__('Total Correct Answers')}}: </strong> {{$last_quiz_attempt->total_correct_answers}}</div>
                                            <div class="mb-1"><strong>{{__('Total Skipped Questions')}}: </strong> {{$last_quiz_attempt->total_skipped_questions}}</div>
                                            <div class="mb-1"><strong>{{__('Total Obtained Marks')}}: </strong> {{$last_quiz_attempt->total_obtained_marks}}</div>
                                        </div>
                                    @endif


                                    @foreach($quizzes as $quiz)

                                        <div class="rounded-3 p-3 bg-light mb-3">
                                            <div class="mb-3 quiz">

                                                <div class="mb-2">
                                                    <span class="text-muted">{{__('Question ')}} {{$loop->iteration}} {{__('of')}} {{count($quizzes)}}</span>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="quiz_title_{{$quiz->id}}">{{$quiz->title}}</label>
                                                </div>

                                                @if(!empty($answers[$quiz->id]))

                                                    @foreach($answers[$quiz->id] as $answer)

                                                        <div class="mb-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="answer_selected[{{$quiz->id}}]" value="{{$answer->id}}" id="quiz_{{$answer->id}}">
                                                                <label class="form-check-label" for="quiz_{{$answer->id}}">
                                                                    <span>{{$answer->answer}}</span><span class="submit-response ms-2"></span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                    @endforeach

                                                @endif

                                            </div>
                                        </div>


                                    @endforeach

                                    <input type="hidden" name="lesson_id" value="{{$lesson->id}}">

                                    <button type="submit" class="btn btn-primary my-3">{{__('Submit')}}</button>

                                </div>
                            </div>

                            @csrf

                        </form>

                    @endif
                @endif

            </div>

        </div>
        <div class="col-md-4">
            <div class="">
                <div class="row mb-5 mb-lg-0">
                    <div class="col-md-6 col-lg-12">
                        <!-- Recently Viewed START -->
                        @if(!empty($lesson->file))
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="text-center">
                                        <!-- Buttons -->
                                        <a href="{{PUBLIC_DIR}}/uploads/{{$lesson->file}}" class="btn btn-success mb-sm-0 me-00 ">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                            {{__('Download file')}}</a>

                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="card card-body shadow  mb-4">
                            @if(!empty($course->id))
                                <a class="btn btn-blue mb-3 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2 "
                                   href="/student/my-course-details?id={{$course->id}}" >
                                    {{__('Go to Course Page')}}
                                </a>
                        @endif
                            <!-- Title -->
                            <h6 class="mb-3">{{__('All Lessons of the course')}}</h6>
                            <!-- Course item START -->
                            <div class="row gx-3 mb-3">
                                <div class="card-body">
                                    <div class="row g-5">
                                        <!-- Lecture item START -->
                                        <div class="col-12">
                                            <!-- Curriculum item -->
                                            @foreach($lessons as $less)

                                                <div class="d-sm-flex justify-content-sm-between align-items-center">
                                                    <div class="d-flex">
                                                        <div
                                                                class="avatar avatar-md bg-info-light  border-radius-md p-2 ">
                                                            <i class="fas fa-play text-info"></i>
                                                        </div>
                                                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                                                            <a href="/student/view-mylesson?id={{$less->id}}"> <h6 class="mb-0">{{$loop->iteration}}. {{$less->title}}</h6></a>
                                                            <p class="mb-2 mb-sm-0 small">{{$less->duration}}</p>
                                                        </div>
                                                    </div>
                                                    <!-- Button -->

                                                    <div class="dropstart">
                                                        <a href="javascript:" class="text-secondary" id="dropdownMarketingCard"
                                                           data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3"
                                                            aria-labelledby="dropdownMarketingCard">

                                                            <li>
                                                                <a class="dropdown-item border-radius-sm"
                                                                   href="/student/view-mylesson?id={{$less->id}}">{{__('See Details')}}</a>
                                                            </li>


                                                        </ul>
                                                    </div>


                                                </div>

                                                <!-- Divider -->
                                                <hr>

                                        @endforeach

                                        <!-- Curriculum item -->

                                        </div>

                                    </div>
                                </div>
                                <!-- Image -->

                            </div>


                            <!-- Course item END -->
                        </div>


                        <!-- Tags END -->
                    </div>
                </div><!-- Row End -->
            </div>

        </div>
    </div>

@endsection

@section('script')

    <script>
        window.addEventListener('DOMContentLoaded', ()=> {

//             const submit_quiz = document.querySelectorAll('.submit-quiz');
//
//             const correct_response = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
//   <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
// </svg>`;
//             const incorrect_response = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
//   <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
// </svg>`;
//
//             submit_quiz.forEach((btn)=>{
//
//                 btn.addEventListener('click', (e)=>{
//
//                     const quiz = e.target.closest('.quiz');
//                     const correct = quiz.querySelectorAll('[data-correct="true"]');
//                     const selected = quiz.querySelectorAll('input[type="radio"]:checked');
//
//                     //Clear all response
//                     let submit_response = quiz.querySelectorAll('.submit-response');
//                     submit_response.forEach((response)=>{
//                         response.innerHTML = '';
//                         response.classList.remove('text-success');
//                     });
//
//                     if(correct.length === selected.length){
//
//                         let correct_count = 0;
//
//                         correct.forEach((c)=>{
//
//                             selected.forEach((s)=>{
//
//                                 if(c.value === s.value){
//                                     correct_count++;
//                                 }
//
//                             });
//
//                         });
//
//                         if(correct_count === correct.length){
//
//                             //Find selected radio
//                             let selected_radio = quiz.querySelectorAll('input[type="radio"]:checked');
//                             // Find selected radio parent
//                             selected_radio.forEach((radio)=>{
//                                 let parent = radio.closest('.form-check');
//
//                                 let submit_response = parent.querySelector('.submit-response');
//                                 if(submit_response)
//                                 {
//                                     submit_response.innerHTML = correct_response;
//                                     submit_response.classList.add('text-success');
//                                 }
//                             });
//
//
//                         }else{
//
//                             //Find selected radio
//                             let selected_radio = quiz.querySelectorAll('input[type="radio"]:checked');
//                             // Find selected radio parent
//                             selected_radio.forEach((radio)=>{
//                                 let parent = radio.closest('.form-check');
//
//                                 let submit_response = parent.querySelector('.submit-response');
//                                 if(submit_response)
//                                 {
//                                     submit_response.innerHTML = incorrect_response;
//                                     submit_response.classList.add('text-danger');
//                                 }
//                             });
//
//                         }
//
//                     }else{
//
//                         //Find selected radio
//                         let selected_radio = quiz.querySelectorAll('input[type="radio"]:checked');
//                         // Find selected radio parent
//                         selected_radio.forEach((radio)=>{
//                             let parent = radio.closest('.form-check');
//
//                             let submit_response = parent.querySelector('.submit-response');
//                             if(submit_response)
//                             {
//                                 submit_response.innerHTML = incorrect_response;
//                                 submit_response.classList.add('text-danger');
//                             }
//                         });
//
//                     }
//
//                 });
//
//             });

            @if(!empty($lesson->youtube_video))
            const youtube_player = videojs('youtube_player', {
                controls: true,
                autoplay: false,
                preload: 'auto',
                fluid: true,
                controlBar: {
                    volumePanel: false
                },
                techOrder: ['youtube'],
                sources: [{
                    type: 'video/youtube',
                    src: 'https://www.youtube.com/watch?v={{$lesson->youtube_video}}'
                }],
                //Disable related videos
                youtube: {
                    iv_load_policy: 3,
                    modestbranding: 1,
                    rel: 0,
                    showinfo: 0,
                    cc_load_policy: 0,
                    fs: 0,
                    playsinline: 1,
                    controls: 1,
                    disablekb: 1,
                    enablejsapi: 1,
                    origin: window.location.origin
                }
            });

            function markLessonAsComplete() {
                axios.post('/student/mark-lesson-as-completed', {
                    lesson_id: {{$lesson->id}},
                }).then((response) => {
                    location.reload();
                }).catch((error) => {
                    console.log(error);
                });
            }

            const btn_mark_lesson_complete = document.querySelector('#btn_mark_lesson_complete');

            if(btn_mark_lesson_complete)
            {
                btn_mark_lesson_complete.addEventListener('click', (e)=>{
                    e.preventDefault();
                    markLessonAsComplete();
                });
            }

            const duration_counter = document.getElementById('duration_counter');

            //Show the total duration
            youtube_player.on('loadedmetadata', function () {
                let duration = youtube_player.duration();
                let duration_minutes = Math.floor(duration / 60);
                let duration_seconds = Math.floor(duration % 60);
                duration_counter.innerHTML = duration_minutes + ':' + duration_seconds;
            });

            //On play
            youtube_player.on('play', function () {

                //Update duration counter
                setInterval(() => {
                    let duration = youtube_player.duration();
                    let current_time = youtube_player.currentTime();
                    let remaining_time = duration - current_time;
                    let remaining_time_minutes = Math.floor(remaining_time / 60);
                    let remaining_time_seconds = Math.floor(remaining_time % 60);
                    duration_counter.innerHTML = remaining_time_minutes + ':' + remaining_time_seconds;
                }, 1000);

            });

            //On pause

            youtube_player.on('pause', function () {
                //Update duration counter
                setInterval(() => {
                    let duration = youtube_player.duration();
                    let current_time = youtube_player.currentTime();
                    let remaining_time = duration - current_time;
                    let remaining_time_minutes = Math.floor(remaining_time / 60);
                    let remaining_time_seconds = Math.floor(remaining_time % 60);
                    duration_counter.innerHTML = remaining_time_minutes + ':' + remaining_time_seconds;
                }, 1000);
            });

            //On complete watch
            youtube_player.on('ended', function () {
                markLessonAsComplete();
            });

            @endif

        });
    </script>

@endsection
