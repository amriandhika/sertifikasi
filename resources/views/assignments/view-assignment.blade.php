@extends('layouts.admin-portal')
@section('title',$assignment->title)
@section('content')

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{__('Assignment Details')}}</h5>
                    </div>
                    <div class="card-body">



                        <h3 class="mb-4">
                            {{$assignment->title}}
                        </h3>


                        <div class="row">

                            <div class="col">
                                <div class="alert bg-info-light text-info-light fw-bolder " >

                                    {{__('Maximum Marks')}}:
                                    @if(!empty($assignment->marks))
                                        {{$assignment->marks}}
                                    @endif
                                </div>

                            </div>
                            <div class="col">

                                <div class="alert  bg-pink-light text-danger fw-bolder " >

                                    {{__('Deadline')}}:
                                    @if(!empty($assignment->end_date))
                                        {{(\App\Supports\DateSupport::parse($assignment->end_date))->format(config('app.date_format'))}}@endif
                                </div>

                            </div>

                        </div>


                        <div class="avatar-group d-flex mt-2 mb-4">
                            @if($assignment->members)
                                @foreach(json_decode($assignment->members) as $member)
                                    @if(isset($students[$member]))

                                        @if(!empty($students[$member]->photo))
                                            <a href="javascript:" class="avatar avatar-sm rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="top"
                                               title="{{$students[$member]->first_name}}">
                                                <img src="{{PUBLIC_DIR}}/uploads/{{$students[$member]->photo}}"
                                                >
                                            </a>

                                        @else
                                            <a href="" data-bs-toggle="tooltip" data-bs-placement="top" class="avatar avatar-sm rounded-circle bg-info-light text-info-light text-uppercase"  title="{{$students[$member]->first_name}}">{{$students[$member]->first_name[0]}}{{$students[$member]->last_name[0]}}</a>

                                        @endif

                                    @endif
                                @endforeach
                            @endif

                        </div>


                        <div class="mb-4">
                            {!! $assignment->description !!}
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{__('Submissions by the students')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">

                            <div class="table-responsive  p-0">
                                <table class="table align-items-center mb-0">
                                    <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-uppercase  text-xs font-weight-bolder">{{__('Student Name')}}</th>



                                        <th class="text-uppercase  text-xs font-weight-bolder ps-2">{{__('Submitted at')}}</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($student_submissions as $student_submission)

                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div>
                                                        @if(empty($students[$student_submission->student_id]->photo))
                                                            <div class="avatar avatar-md rounded-circle bg-info-light border-radius-md p-2 ">
                                                                <h6 class="text-info-light text-uppercase mt-1">{{$students[$student_submission->student_id]->first_name['0']}}{{$students[$student_submission->student_id]->last_name['0']}}

                                                                </h6>

                                                            </div>
                                                        @else

                                                            <img src="{{PUBLIC_DIR}}/uploads/{{$students[$student_submission->student_id]->photo}}"
                                                                 class="avatar avatar-md rounded-circle  shadow-sm">
                                                        @endif
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ms-3">
                                                        <a href="/student-about?id={{$students[$student_submission->student_id]->id}}">
                                                            <h6 class="mb-0">{{$students[$student_submission->student_id]->first_name}} {{$students[$student_submission->student_id]->last_name}}</h6>
                                                        </a>

                                                        <p class=" text-sm text-muted mb-0">{{$students[$student_submission->student_id]->email}}</p>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                {{(\App\Supports\DateSupport::parse($student_submission->created_at))->format(config('app.date_format'))}}


                                            </td>


                                            <td class="align-middle text-right">
                                                <div class="dropstart me-3">
                                                    <a href="javascript:" class="text-secondary" id="dropdownMarketingCard"
                                                       data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3"
                                                        aria-labelledby="dropdownMarketingCard">


                                                        <li><a class="dropdown-item border-radius-md"
                                                               href="/check-assignment?id={{$student_submission->id}}">{{__('Check and mark')}}</a>
                                                        </li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li>

                                                        </li>
                                                    </ul>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection