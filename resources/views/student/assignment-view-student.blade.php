@extends('layouts.admin-portal')
@section('title',$student->first_name.' '.$student->last_name)
@section('content')

    <section class="bg-dark-alt border-radius-lg py-0 ">
        <div class="container">
            <div class="row ">
                <div class="col-md-6  mt-5">
                    <div class="avatar avatar-xxl  rounded-circle position-relative border-avatar ms-3">
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

    <div class="text-center">
        <ul class="nav  mt-2 ">
            <li class="nav-item">
                <a class="nav-link @if(($selected_nav ?? '') === 'student-about') active @endif fw-bolder"  href="/student-about?id={{$student->id}}">{{__('About')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bolder" href="/student-courses?id={{$student->id}}">{{__('Courses')}}</a>
            </li>



            <li class="nav-item">
                <a href="" class="nav-link @if(($selected_nav ?? '') === 'student-assignment') active @endif fw-bolder">{{__('Assignments')}}</a>
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
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">
                    <h6 class="card-title">
                        {{__('Assignments')}}
                    </h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table  mb-0">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="text-uppercase  text-xs font-weight-bolder">{{__('Name')}}</th>

                            <th class="text-uppercase  text-xs font-weight-bolder">{{__('Course')}}</th>

                            <th class="text-uppercase  text-xs font-weight-bolder ps-2">{{__('Deadline')}}</th>
                            <th class="text-uppercase  text-xs font-weight-bolder ps-2">{{__('Status')}}</th>

                            <th class="text-uppercase  text-xs font-weight-bolder  ps-2">{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assignments as $assignment)
                            <tr>
                                <td>
                                    <h6 class=" mb-0 ">{{$assignment->title}}</h6>
                                </td>

                                <td>
                                    @if(!empty($courses[$assignment->course_id]))
                                        <h6 class="text-sm">
                                            @if(isset($courses[$assignment->course_id]))
                                                {{$courses[$assignment->course_id]->name}}
                                            @endif
                                        </h6>
                                    @endif
                                </td>


                                <td>
                                    <p class="text-sm mb-0">

                                        @if(!empty($assignment->end_date))
                                            {{(\App\Supports\DateSupport::parse($assignment->end_date))->format(config('app.date_format'))}}

                                        @endif
                                    </p>
                                </td>

                                <td>
                            <span class="badge badge-dot me-4">
                            <i class="bg-info"></i>
                            <span class="badge bg-purple-light font-weight-bold">{{$assignment->status}}</span>
                            </span>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <div class="dropstart ">
                                            <a href="javascript:" class="text-secondary" id="dropdownMarketingCard"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3"
                                                aria-labelledby="dropdownMarketingCard">


                                                <li>
                                                    <a class="dropdown-item border-radius-md"
                                                       href="/view-assignment?id={{$assignment->id}}">{{__('See Details')}}</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md text-danger"
                                                       href="/delete/assignment/{{$assignment->id}}">{{__('Delete')}}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header pb-0">

                </div>
                <div class="card-body">
                    <div class="alert bg-info-light text-info-light fw-bolder " >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        {{__('Total Assignment')}}:
                        @if(!empty($assignment))
                            {{$total_assignments}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection