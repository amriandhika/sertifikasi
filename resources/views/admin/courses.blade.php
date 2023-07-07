@extends('layouts.admin-portal')
@section('title',__('Courses'))
@section('content')

    <div class=" row mb-2">
        <div class="col">
            <div>

                <h5 class="  fw-bolder">
                    {{__('Courses')}} /<span class="text-secondary">
                      {{__('Course List')}}
                    </span>
                </h5>
                <p class="text-muted">{{__('Create, edit or delete the courses and add lessons.')}}</p>

            </div>

        </div>
        <div class="col text-end">

            <a href="/create-course" type="button" class="btn btn-info"><i class="fas fa-plus"></i>&nbsp;{{__('Create Course')}}</a>

        </div>
    </div>


    <div class="card">
        <div class="card-body table-responsive">
            <table class="table  mb-0 " id="cloudonex_datatable">
                <thead class="bg-gray-100">
                <tr>
                    <th class="text-uppercase  text-xs font-weight-bolder">{{__('Name')}}</th>

                    <th class="text-uppercase  text-xs font-weight-bolder ">{{__('Price')}}</th>
                    <th class="text-uppercase  text-xs font-weight-bolder ">{{__('Status')}}</th>
                    <th class="text-uppercase  text-xs font-weight-bolder">{{__('Category')}}</th>


                    <th class="text-uppercase  text-xs font-weight-bolder ps-2">{{__('Created At')}}</th>


                    <th class="text-uppercase  text-xs text-end font-weight-bolder  ps-2">{{__('Action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    @if(empty($course->image))
                                        <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                             class="w-100 border-radius-lg shadow-sm mt-2">
                                    @else
                                        <img src="{{PUBLIC_DIR}}/uploads/{{$course->image}}" class="w-100 border-radius-lg shadow-sm mt-2 avatar-xxl">
                                    @endif
                                </div>
                                <div class="d-flex flex-column justify-content-center ms-3">
                                    <a href="/view-course?id={{$course->id}}" class="text-dark font-weight-normal"> <h6 class=" mb-0 ">{{$course->name}}</h6></a>

                                </div>
                            </div>
                        </td>
                        <td>
                            <h6 class=" mb-0 ms-3 ">{{$course->price}}</h6>
                        </td>
                        <td>
                            <h6 class=" mb-0 ms-3 ">
                               @if($course->status== 'Draft')
                                    <span class="badge bg-pink-light text-danger mb-0 ms-3">
                                    {{__('Draft')}}
                                </span>
                                @else
                                    <span class="badge bg-success-light mb-0 ms-3 text-success">
                                    {{__('Published')}}
                                </span>

                                @endif

                            </h6>
                        </td>

                        <td>
                            @if(!empty($categories[$course->category_id]))
                                <span class="badge bg-purple-light mb-0 ms-3">
                                @if(isset($categories[$course->category_id]))
                                        {{$categories[$course->category_id]->name}}
                                    @endif
                            </span>
                            @endif

                        </td>


                        <td>
                            <p class="text-sm mb-0">

                                @if(!empty($course->created_at))
                                    {{(\App\Supports\DateSupport::parse($course->created_at))->format(config('app.date_format'))}}

                                @endif
                            </p>
                        </td>


                        <td>
                            <div class="text-center">
                                <div class="dropstart">
                                    <a href="javascript:" class="text-secondary" id="dropdownMarketingCard"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3"
                                        aria-labelledby="dropdownMarketingCard">
                                        <li><a class="dropdown-item border-radius-md fw-bold"
                                               href="/create-lesson?course_id={{$course->id}}">{{__('Add Lesson')}}</a>
                                        </li>
                                        <li><a class="dropdown-item border-radius-md fw-bold"
                                               href="/create-course?id={{$course->id}}">{{__('Edit Course')}}</a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item border-radius-md fw-bold"
                                               href="/view-course?id={{$course->id}}">{{__('View Course')}}</a>
                                        </li>
                                        <li><a class="dropdown-item border-radius-md fw-bold"
                                               href="/lessons?id={{$course->id}}">{{__('Lessons')}}</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item border-radius-md text-danger fw-bold"
                                               href="/delete/course/{{$course->id}}">{{__('Delete')}}
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

