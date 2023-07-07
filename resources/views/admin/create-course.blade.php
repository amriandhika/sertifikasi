@extends('layouts.admin-portal')
@section('title',__('Create Course'))
@section('content')

    <form action="/save-course" method="post" enctype="multipart/form-data" >
        @if ($errors->any())
            <div class="alert bg-pink-light text-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="mb-2">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="  fw-bolder">
                        {{__('Courses')}} /<span class="text-secondary">
                      {{__('Create New Course')}}
                    </span>
                    </h5>
                </div>

                <div class="col-lg-6 text-right ">

                    <button type="submit" class="btn btn-blue mb-2">{{__('Save')}}</button>
                </div>

            </div>


            <div class="row ">
                <div class="col-lg-8 mt-lg-0 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-weight-bolder">{{__('Course Information')}}</h5>
                            <div class="row">
                            </div>

                            <div class="form-group">
                                <label for="courseTitle" class="form-label">{{__('Course Title')}}</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" id="courseTitle" name="name" value="{{$course->name ?? old('name') ?? ''}}">

                            </div>

                            <div class="row mt-3 mb-3">

                                <div class="col-md-6">
                                    <label class="">{{__('Level')}}</label>

                                    <select class="form-control" aria-label="Default select example" name="level">
                                        <option value="Beginner"
                                                @if(($course->level ?? null) === 'Beginner') selected @endif>{{__('Beginner')}}</option>
                                        <option value="Intermediate"
                                                @if(($course->level ?? null) === 'Intermediate') selected @endif>{{__('Intermediate')}}</option>
                                        <option value="Advanced"
                                                @if(($course->level ?? null) === 'Advanced') selected @endif>{{__('Advanced')}}</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="">{{__('Category')}}<a href="/course-categories" class="text-info-light" >{{__(' New Category')}}&nbsp;</a></label>&nbsp;
                                    <select class="form-control" name="category_id" id="choices-category-edit">
                                        <option value="0">{{__('None')}}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}"
                                                    @if (!empty($course))
                                                        @if ($course->category_id === $category->id)
                                                            selected
                                                    @endif
                                                    @endif
                                            >{{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                            <label for="basic-url" for="courseSlug" class="form-label">{{__('Slug')}}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text fw-bolder">{{config('app.url')}}/course/</span>
                                <input type="text" value="{{$course->slug ?? old('slug') ?? ''}}" id="courseSlug" name="slug" class="form-control ps-1">
                            </div>

                            <label class="mt-3 text-sm mb-0">{{__('Short Description of the course')}}</label>
                            <p class="form-text text-info-light text-xs ms-1">
                                {{__('Write a short description.Within 150 words')}}
                            </p>
                            <div class="form-group">
                                <textarea name="summary" class="form-control" rows="4" id="summary">{{$course->summary ?? old('summary') ?? ''}}</textarea>
                            </div>


                            <div class="mb-3">
                                <label>{{__('Type')}}</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_free" id="is_free_no"
                                               @if(!empty($course))
                                                    @if($course->is_free == 0) checked @endif
                                               @else
                                                    checked
                                               @endif
                                               value="0">
                                        <label class="form-check-label" for="is_free_no">{{__('Paid')}}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_free" id="is_free_yes" value="1"
                                                  @if(!empty($course))
                                                     @if($course->is_free == 1) checked @endif
                                                  @endif
                                        >
                                        <label class="form-check-label" for="is_free_yes">{{__('Free')}}</label>
                                    </div>
                                </div>
                            </div>



                            <div class="row">

                                <div class="col-md-8">
                                    <label class="">{{__('Price')}}</label>
                                    <input class="form-control" type="text" name="price" value="{{$course->price ?? old('price') ?? ''}}" />
                                </div>
                                <div class="col-md-4">
                                    <label class="">{{__('Duration')}}</label>
                                    <input class="form-control" type="text" name="duration" value="{{$course->duration ?? old('duration') ?? ''}}" />
                                </div>
                            </div>

                            <label class="mt-4">{{__('Description')}}</label>

                            <div class="form-group">
                            <textarea class="form-control" rows="10" id="description"
                                      name="description">@if(!empty($course)){!! $course->description !!}@endif</textarea>
                            </div>

                            <div class="mb-3 mt-4">
                                <label class="form-label">{{__('What will student learn from the course?')}}</label>
                                <div id="div_features">

                                    @if(!empty($outcomes))
                                        @foreach($outcomes as $outcome)
                                            <div class="row feature_row">
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="outcomes[]" value="{!! $outcome !!}">
                                                </div>
                                                <div class="col-md-3 text-end">
                                                    <button class="btn btn-sm btn-danger btn_remove_feature"><i class="fas fa-minus"></i> </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="row feature_row">
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="outcomes[]">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <button class="btn btn-sm btn-danger btn_remove_feature"><i class="fas fa-minus"></i> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-sm btn-success" id="btn_add_feature"><i class="fas fa-plus"></i>
                                </button>
                            </div>


                            @csrf
                            @if($course)
                                <input type="hidden" name="id" value="{{$course->id}}">
                            @endif
                            @if($course)
                                <input type="hidden" name="admin_id" value="{{$course->admin_id}}">
                            @endif

                            <button type="submit" class="btn btn-info mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">{{__('Submit')}}</button>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="font-weight-bolder">{{__('Course Image')}}</h5>
                            <div class="row">
                                <div class="col-12">


                                    @if(empty($course->image))
                                        <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                             class="w-100 border-radius-lg shadow-lg mt-3">
                                    @else
                                        <img src="{{PUBLIC_DIR}}/uploads/{{$course->image}}" class="w-100  border-radius-lg shadow-lg mt-3">
                                    @endif
                                </div>

                                <div class="align-self-center">
                                    <div>
                                        <label for="cover_photo" class="form-label mt-3">{{__('Upload Image')}}</label>
                                        <input class="form-control" name="image" type="file" id="cover_photo_file">
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-12">


                                    @if(!empty($course->certificate_background))
                                        <img src="{{PUBLIC_DIR}}/uploads/{{$course->certificate_background}}" class="w-100  border-radius-lg shadow-lg mt-3">
                                    @endif
                                </div>

                                <div class="align-self-center">
                                    <div>
                                        <label for="certificate_background" class="form-label mt-3">{{__('Certificate Background')}}</label>
                                        <input class="form-control" name="certificate_background" type="file" id="certificate_background">
                                    </div>
                                </div>


                            </div>

                            <h5 class="font-weight-bolder mt-3">{{__('Upload Video')}}</h5>
                            <div class="row">
                                <div class="col-12">

                                    @if(empty($course->video))
                                        <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                             class="w-100 border-radius-lg shadow-lg mt-3">
                                    @else
                                        <iframe class="embed-responsive-item w-100  border-radius-lg shadow-lg mt-3" src="{{PUBLIC_DIR}}/uploads/{{$course->video}}" type="video/mp4">

                                        </iframe>

                                    @endif
                                </div>


                                <div class="align-self-center">
                                    <div>
                                        <label for="video" class="form-label mt-3">{{__('Upload Video')}}</label>
                                        <input class="form-control" name="video" type="file" >
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label class="">{{__('Deadline')}}</label>

                                    <input class="form-control" name="deadline" id="end_date"
                                           @if(!empty($course))value="{{$course->deadline}}"
                                           @else
                                               value="{{date('Y-m-d')}}"
                                            @endif >
                                </div>
                                <div class="mt-3">
                                    <label class="">{{__('Status')}}</label>

                                    <select class="form-control" aria-label="Default select example" name="status">
                                        <option value="Draft"
                                                @if(($course->status ?? null) === 'Draft') selected @endif>{{__('Draft')}}</option>
                                        <option value="Published"
                                                @if(($course->status ?? null) === 'Published') selected @endif>{{__('Published')}}</option>

                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label class="">{{__('Certificate')}}</label>

                                    <select class="form-control" aria-label="Default select example" name="certificate">

                                        <option value="No"
                                                @if(($course->certificate ?? null) === 'No') selected @endif>{{__('No')}}</option>
                                        <option value="Yes"
                                                @if(($course->certificate ?? null) === 'Yes') selected @endif>{{__('Yes')}}</option>
                                        <option value="Optional"
                                                @if(($course->certificate ?? null) === 'Optional') selected @endif>{{__('Optional')}}</option>
                                    </select>
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
                selector: '#description',


                plugins: 'lists,table',
                toolbar:'styleselect | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code | undo redo|numlist bullist',
                lists_indent_on_tab: false,
                branding: false,
                menubar: false,


            });
            tinymce.init({
                selector: '#summary',
                plugins: 'lists,table',
                toolbar:'styleselect | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code | undo redo|numlist bullist',
                lists_indent_on_tab: false,
                branding: false,
                menubar: false,


            });

            let $btn_add_feature = $('#btn_add_feature');
            let $div_features = $('#div_features');

            $btn_add_feature.on('click', function (event) {
                event.preventDefault();
                $div_features.append('<div class="row feature_row"><div class="col-md-9"><input type="text" class="form-control" name="outcomes[]"></div><div class="col-md-3 text-end"><button class="btn btn-sm btn-danger btn_remove_feature"><i class="fas fa-minus"></i> </button></div></div>');

            });

            let $clx_body = $('#clx_body');

            $clx_body.on('click', '.btn_remove_feature', function (event) {
                event.preventDefault();
                $(this).closest('.feature_row').remove();
            });


            @if(empty($course))

            let courseTitle = document.getElementById('courseTitle');

            courseTitle.addEventListener('keyup', function (event) {
                event.preventDefault();
                let title = courseTitle.value;
                document.getElementById('courseSlug').value = title.toLowerCase().split(' ').join('-');
            });

            @endif


        });
    </script>
@endsection
