@extends('layouts.admin-portal')
@section('title',__('Students'))
@section('content')

    <div class="row mb-2">
        <div class="col">
            <span>

                <h5 class="  fw-bolder">
                    {{__('Students')}} /<span class="text-secondary">
                      {{__('Student List')}}
                    </span>
                </h5>
                <p class="text-muted">{{__('Create, edit or delete the students')}}</p>

            </span>

        </div>
        <div class="col text-end">
            <a href="/new-student" type="button" class="btn btn-info  text-white"><i class="fas fa-plus"></i> {{__('Add Student ')}}</a>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body ">
                    <div class="table-responsive  p-0">
                        <table class="table align-items-center mb-0" id="data_table">
                            <thead class="bg-gray-100">
                            <tr>
                                <th class="text-uppercase  text-xs">{{__('Name')}}</th>

                                <th class="text-uppercase  text-xs  ps-2">{{__('Country')}}</th>
                                <th class="text-uppercase text-xs ps-2">{{__('Phone')}}</th>
                                <th class="text-uppercase text-xs ps-2">{{__('Signed up at')}}</th>

                                <th class=""></th>
                            </tr>

                            </thead>

                            <tbody>
                            @foreach($students as $student)

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                @if(empty($student['photo']))
                                                    <div class="avatar avatar-md rounded-circle bg-info-light border-radius-md p-2 ">
                                                        <h6 class="text-info-light text-uppercase mt-1">{{$student->first_name['0']}}{{$student->last_name['0']}}</h6>
                                                    </div>
                                                @else

                                                    <img src="{{PUBLIC_DIR}}/uploads/{{$student->photo}}"
                                                          class="avatar avatar-md rounded-circle  shadow-sm">
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column justify-content-center ms-3">
                                                <a href="/student-about?id={{$student->id}}">
                                                    <h6 class="mb-0">{{$student->first_name}} {{$student->last_name}}</h6>
                                                </a>

                                                <p class=" text-sm text-muted mb-0">{{$student->email}}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <p class="mb-0">{{$student->country}}</p>
                                    </td>
                                    <td class="align-middle text-start">
                                        <span class="">
                                            {{$student->phone_number}}
                                        </span>
                                    </td>
                                    <td>
                                        @if(!empty($student->created_at))
                                            {{(\App\Supports\DateSupport::parse($student->created_at))->format(config('app.date_format'))}}

                                        @endif
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
                                                       href="/new-student?id={{$student->id}}">{{__('Edit')}}</a></li>

                                                <li><a class="dropdown-item border-radius-md"
                                                       href="/student-about?id={{$student->id}}">{{__('See Details')}}</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md text-danger"
                                                       href="/delete/student/{{$student->id}}">{{__('Delete')}}
                                                    </a>
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

@endsection


@section('script')

    <script>

        $(document).ready(function () {
            "use strict";
            $('#data_table').DataTable(
            );

        });
    </script>

@endsection

