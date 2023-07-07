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
                <a href="/student-courses?id={{$student->id}}" class="nav-link  fw-bolder" href="">{{__('Courses')}}</a>
            </li>

            <li class="nav-item">
                <a href="/student-assignments?id={{$student->id}}" class="nav-link fw-bolder">{{__('Assignments')}}</a>
            </li>
            <li class="nav-item">
                <a href="/student-certificates?id={{$student->id}}" class="nav-link fw-bolder">{{__('Certificates')}}</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link @if(($selected_nav ?? '') === 'student-ebook') active @endif fw-bolder">{{__('eBooks')}}</a>
            </li>

        </ul>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="/save-ebook-purchased" method="post">
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
                                {{__('Choose an eBook')}}

                            </label><span class="text-danger">*</span>

                            <select class="form-select form-select-solid fw-bolder"
                                    aria-label="Floating label select example" name="product_id">
                                <option value="0">{{__('None')}}</option>
                                @foreach ($courses as $course)
                                    <option value="{{$course->id}}"
                                            @if (!empty($course_purchased))
                                            @if ($course_purchased->product_id === $course->id)
                                            selected
                                            @endif
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
                        {{__('eBooks')}}
                    </h6>
                    <table class="table  mb-0">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="text-uppercase  text-xs font-weight-bolder">{{__('Name')}}</th>

                            <th class="text-uppercase text-end  text-xs font-weight-bolder  ps-2">{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($course_purchaseds as $course_purchase)
                            <tr>
                                <td>

                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            @if(!empty($courses[$course_purchase->product_id]->image))
                                                @if(isset($courses[$course_purchase->product_id]))
                                                    <img src="{{PUBLIC_DIR}}/uploads/{{$courses[$course_purchase->product_id]->image}}"
                                                         class="w-100 avatar avatar-xxl me-3">
                                                @endif

                                            @else
                                                @if(isset($courses[$course_purchase->product_id]))
                                                    <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                                         class="w-100 avatar avatar-xxl me-3">
                                                @endif

                                            @endif
                                        </div>
                                        @if(isset($courses[$course_purchase->product_id]))

                                        <div class="d-flex flex-column justify-content-center ms-3">
                                            <a href="/view-product?id={{$courses[$course_purchase->product_id]->id}}" class="text-dark font-weight-normal"> <h6 class=" mb-0 ">
                                                        {{$courses[$course_purchase->product_id]->name}}

                                                </h6>
                                            </a>


                                        </div>
                                        @endif
                                    </div>

                                </td>

                                <td>
                                    @if(isset($courses[$course_purchase->product_id]))
                                    <div class="text-end">
                                        <div class="dropstart ">
                                            <a href="javascript:" class="text-secondary" id="dropdownMarketingCard"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3"
                                                aria-labelledby="dropdownMarketingCard">


                                                    <li>
                                                        <a class="dropdown-item border-radius-md"
                                                           href="/view-product?id={{$courses[$course_purchase->product_id]->id}}">{{__('See Details')}}</a>
                                                    </li>



                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md text-danger"
                                                       href="/delete/ebook-purchase/{{$course_purchase->id}}">{{__('Delete')}}
                                                    </a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
