@extends('layouts.admin-portal')
@section('title',__('Assignments'))
@section('content')

    <div class=" row mb-2">
        <div class="col">
            <h5 class="  fw-bolder">
                {{__('Assignments')}} /<span class="text-secondary">
                          {{__('Assignment List')}}
                    </span>
            </h5>
            <p class="text-muted">{{__('Create, edit or delete assignments.')}}</p>

        </div>
        <div class="col text-end">
            <a href="/create-assignment" type="button" class="btn btn-info text-white"><i class="fas fa-plus"></i>&nbsp;&nbsp; {{__('Create Assignment ')}}</a>


        </div>
    </div>



    <div class="card">
        <div class="card-body table-responsive">
            <table class="table  mb-0 " id="cloudonex_datatable">
                <thead class="bg-gray-100">
                <tr>
                    <th class="text-uppercase  text-xs font-weight-bolder">{{__('Name')}}</th>

                    <th class="text-uppercase  text-xs font-weight-bolder">{{__('Students')}}</th>
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
                        <td class="">

                            <div class="avatar-group d-flex mt-2">
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
                                        <li><a class="dropdown-item border-radius-md"
                                               href="/create-assignment?id={{$assignment->id}}">{{__('Edit')}}</a>
                                        </li>

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



@endsection


@section('script')

    <script>
        "use strict";
        $(document).ready(function () {
            $('#cloudonex_datatable').DataTable(
            );


        });
    </script>

@endsection





