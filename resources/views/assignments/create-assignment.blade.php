@extends('layouts.admin-portal')
@section('title',__('Create Assignment'))

@section('content')

    <div class=" row mb-2">
        <div class="col">
            <h5 class="  fw-bolder">
                {{__('Assignments')}} /<span class="text-secondary">
                          {{__('Create Assignment ')}}
                    </span>
            </h5>
            <p class="text-muted">{{__('Create, edit assignment')}}</p>

        </div>
        <div class="col text-end">
            <a href="/assignments" type="button" class="btn btn-info text-white">{{__('Assignment List ')}}</a>

        </div>
    </div>


    <!--begin::Stepper-->

    <!--end::Stepper-->


    <div class="col-lg-10 col-12 mx-auto">

        <form method="post" action="/save-assignment">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title ">{{__('Create Assignment')}}</h5>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert bg-pink-light text-danger fw-bolder">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">{{__('Assignment Title')}}</label>
                        <input type="text" class="form-control" name="title" value="{{$assignment->title ?? old('title') ?? ''}}" >
                    </div>

                    <div class="col-md-12 mt-3">
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">{{__('Assign To')}}</label><span class="text-danger">*</span>
                            <select class="form-control select2 choices__list--multiple " multiple id="" data-type="select-multiple" name="members[]">
                                @foreach ($students as $student)
                                    <option value="{{$student->id}}"
                                            @if($members)

                                            @if(in_array($student->id,$members)) selected @endif
                                            @endif
                                    >{{$student->first_name}} {{$student->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="exampleFormControlInput1" class="form-label">{{__('Marks')}}</label>
                            <input type="number" class="form-control" name="marks" value="{{$assignment->marks ?? old('marks') ?? ''}}" >
                        </div>
                        <div class="col-6">
                            <label class="form-label">{{__('Deadline')}}</label>
                            <input class="form-control" name="end_date" id="end_date" @if(!empty($project))
                            value="{{$project->end_date}}"
                                   @else
                                   value="{{date('Y-m-d')}}"
                                    @endif>
                        </div>
                    </div>

                    <div class="mb-1 mt-3">

                        <label for="exampleFormControlInput1" class="form-label">{{__('Select Course')}}</label>
                        <select class="form-select form-select-solid fw-bolder" id="contact"
                                aria-label="Floating label select example" name="course_id">
                            <option value="0">{{__('None')}}</option>
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}"
                                        @if (!empty($assignment))
                                        @if ($assignment->course_id === $course->id)
                                        selected
                                        @endif
                                        @endif
                                >{{$course->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-check form-switch mt-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status"  value="1"
                        @if($assignment)
                            @if($assignment->status == 'Published')
                                checked
                            @endif
                        @endif
                        >

                        <label class="form-check-label" for="flexSwitchCheckChecked">{{__('Publish')}}</label>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="exampleFormControlTextarea1" class="form-label">{{__('Description')}}</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{$assignment->description ?? old('description') ?? ''}}</textarea>
                    </div>
                    @csrf
                    @if($assignment)
                        <input type="hidden" name="id" value="{{$assignment->id}}">
                    @endif

                    <div class="d-flex  mt-4">
                        <button type="submit" name="button" class="btn btn-info  m-0 ">
                            {{__('Save')}}
                        </button>
                    </div>

                </div>

            </div>
            </div>
        </form>
    </div>

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
                selector: '#description',
                plugins: 'table,code',
                branding: false,


            });

            var nxtBtn = document.querySelectorAll('.next-btn');
            var prvBtn = document.querySelectorAll('.prev-btn');

            var stepper = new Stepper(document.querySelector('#stepper'), {
                linear: false,
                animation: true,

            });

            nxtBtn.forEach(function (button) {
                button.addEventListener("click", () =>{
                    stepper.next()
                })
            });

            prvBtn.forEach(function (button) {
                button.addEventListener("click", () =>{
                    stepper.previous()
                })
            });



        });


    </script>

@endsection



