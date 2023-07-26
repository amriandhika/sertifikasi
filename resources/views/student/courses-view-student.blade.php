@extends('layouts.admin-portal')
@section('title',$student->first_name.' '.$student->last_name)
@section('content')

    <section class="bg-dark-alt border-radius-lg py-0 ">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 mt-5">
                    <div class="avatar avatar-xxl rounded-circle position-relative border-avatar ms-3">
                        @if(empty($student->photo))
                            <img src="{{PUBLIC_DIR}}/img/user-avatar-placeholder.png"
                                 class="w-100 border-radius-sm shadow-sm">
                        @else
                            <img src="{{PUBLIC_DIR}}/uploads/{{$student->photo}}" class="w-100 border-radius-sm ">
                        @endif

                    </div>
                    <h6 class="text-white ms-3 mt-3 mb-4">
                        {{$student->first_name}} {{$student->last_name}}
                        <br>
                        <small class="text-success">{{$student->email}}</small>

                    </h6>

                </div>


            </div>

        </div>
    </section>



    <div class="">
        <ul class="nav  mt-2 ">
            <li class="nav-item">
                <a class="nav-link  fw-bolder" aria-current="page" href="/student-about?id={{$student->id}}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(($selected_nav ?? '') === 'student-course') active @endif fw-bolder" href="">{{__('Courses')}}</a>
            </li>
            <li class="nav-item">
                <a href="/student-assignments?id={{$student->id}}" class="nav-link fw-bolder">{{__('Assignments')}}</a>
            </li>
            <li class="nav-item">
                <a href="/student-certificates?id={{$student->id}}" class="nav-link fw-bolder">{{__('Certificates')}}</a>
            </li>
            <li class="nav-item">
                <a href="/student-ebooks?id={{$student->id}}" class="nav-link fw-bolder">{{__('eBooks')}}</a>
            </li>

        </ul>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="/save-course-purchased" method="post">
                        @if ($errors->any())
                            <div class="alert bg-pink-light text-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">
                                {{__('Choose a course ')}}

                            </label><span class="text-danger">*</span>

                            <select class="form-select form-select-solid fw-bolder"
                                    aria-label="Floating label select example" name="course_id">
                                <option value="0">{{__('None')}}</option>
                                @foreach ($courses as $course)
                                    <option value="{{$course->id}}"
                                            @if (in_array($course->id, $course_purchased_ids ?? []) )
                                                disabled
                                            @endif
                                    >{{$course->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                            @csrf
                            <input type="hidden" name="student_id" value="{{$student->id}}">
                            <button type="submit" class="btn btn-blue mb-0">{{__('Submit')}}</button>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-8">
                <div class="card ">
                    <div class="card-body table-responsive">
                        <h6 class="card-title mb-3 ">
                            {{__('Courses')}}
                        </h6>
                        <table class="table  mb-0">
                            <thead class="bg-gray-100">
                            <tr>
                                <th class="text-uppercase  text-xs font-weight-bolder">{{__('Name')}}</th>

                                <th class="text-uppercase text-end  text-xs font-weight-bolder  ps-2">{{__('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course_purchase)

                                @if(in_array($course_purchase->id, $course_purchased_ids ?? []) )

                                    <tr>
                                        <td>

                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    @if(!empty($course_purchase->image))
                                                        <img src="{{PUBLIC_DIR}}/uploads/{{$course_purchase->image}}"
                                                             class="w-100 border-radius-lg shadow-sm mt-2 avatar-xxl" style="max-width: 100px;">
                                                    @else
                                                        <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                                             class="w-100 border-radius-lg shadow-sm mt-2" style="max-width: 100px;">
                                                    @endif
                                                </div>
                                                <div class="d-flex flex-column justify-content-center ms-3">

                                                    <a href="/view-course?id={{$course_purchase->id}}" class="text-dark font-weight-normal"> <h6 class=" mb-0 "> {{$course_purchase->name}}
                                                        </h6>
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-end">
                                                <div class="dropstart ">
                                                    <a href="javascript:" class="text-secondary" id="dropdownMarketingCard"
                                                       data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3"
                                                        aria-labelledby="dropdownMarketingCard">


                                                        <li>
                                                            @if(!empty($courses[$course_purchase->course_id]->id))
                                                                <a class="dropdown-item border-radius-md"
                                                                   href="/view-course?id={{$courses[$course_purchase->course_id]->id}}">{{__('See Details')}}</a>
                                                            @endif

                                                        </li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item border-radius-md text-danger"
                                                               href="/delete/course-purchase/{{$course_purchased[$course_purchase->id]->id ?? 1}}">{{__('Delete')}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @endif

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

@endsection
