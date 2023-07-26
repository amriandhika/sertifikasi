@extends('layouts.admin-portal')
@section('title',__('New Student'))
@section('content')
    <div class="row mb-2">
        <div class="col">
            <spna>
                <h5 class="  fw-bolder">
                    {{__('Students')}} /<span class="text-secondary">
                          {{__('Add Student')}}
                    </span>
                </h5>
                <p class="text-muted">{{__('Add new student by following the steps')}}</p>
            </spna>
        </div>
        <div class="col text-end">
            <a href="/students" type="button" class="btn btn-info text-white">{{__('Student List')}}</a>
        </div>
    </div>
    <!--begin::Stepper-->
    <div class="col-lg-8 col-12 mx-auto">

        <div class="bg-transparent  rounded-3 mb-5">
            <div id="stepper" class="bs-stepper  stepper-outline">
                <!-- Card header -->
                <div class="">
                    <!-- Step Buttons START -->
                    <div class="bs-stepper-header" role="tablist">
                        <!-- Step 1 -->
                        <div class="step" data-target="#step-1">
                            <div class="d-grid text-center align-items-center">
                                <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger1" aria-controls="step-1">
                                    <span class="bs-stepper-circle">1</span>
                                    <label class=" text-capitalize bs-stepper-label d-none d-md-block">{{__('Basic Info')}}</label>
                                </button>

                            </div>
                        </div>
                        <div class="line"></div>

                        <!-- Step 2 -->
                        <div class="step" data-target="#step-2">
                            <div class="d-grid text-center align-items-center">
                                <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger2" aria-controls="step-2">
                                    <span class="bs-stepper-circle">2</span>
                                    <label class="text-capitalize bs-stepper-label d-none d-md-block">{{__('Image')}}</label>
                                </button>

                            </div>
                        </div>
                        <div class="line"></div>

                        <!-- Step 3 -->
                        <div class="step" data-target="#step-3">
                            <div class="d-grid text-center align-items-center">
                                <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger3" aria-controls="step-3">
                                    <span class="bs-stepper-circle">3</span>
                                    <label class=" text-capitalize bs-stepper-label d-none d-md-block">{{__('Address')}}</label>
                                </button>

                            </div>
                        </div>
                        <div class="line"></div>
                        <!-- Step 4 -->
                        <div class="step" data-target="#step-4">
                            <div class="d-grid text-center align-items-center">
                                <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger4" aria-controls="step-4">
                                    <span class="bs-stepper-circle">4</span>
                                    <label class=" text-capitalize bs-stepper-label d-none d-md-block">{{__('Socials ')}}</label>
                                </button>

                            </div>
                        </div>


                    </div>
                    <!-- Step Buttons END -->
                </div>

                <!-- Card body START -->
                <div class="card-body">

                    <!-- Step content START -->
                    <div class="">
                        <form method="post" action="/save-student"  enctype="multipart/form-data">
                            @if ($errors->any())
                                <div class="alert bg-pink-light text-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                          @endif

                            <!-- Step 1 content START -->
                            <div id="step-1" role="tabpanel" class=" content fade" aria-labelledby="steppertrigger1">
                                <!-- Title -->


                                <hr> <!-- Divider -->

                                <!-- Basic information START -->
                                <div class=" card card-body  row g-4">

                                    <!-- Course title -->


                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label">{{__('First Name')}}</label><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input id="firstName" name="first_name"
                                                            value="{{$student->first_name ?? old('first_name') ?? ''}}"  class="form-control"
                                                           type="text"  required="required">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">{{__('Last Name')}}</label><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input id="lastName" name="last_name"
                                                          value="{{$student->last_name ?? old('last_name') ?? ''}}"  class="form-control"
                                                           type="text" required="required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label mt-4">{{__('Email/Username')}}</label><small class="text-danger">*</small>
                                                <div class="input-group">
                                                    <input id="email" name="email"  value="{{$student->email?? old('email') ?? ''}}" class="form-control" type="email">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label mt-4">{{__('Phone Number')}}</label>
                                                <div class="input-group">
                                                    <input id="phone" name="phone_number"
                                                            value="{{$student->phone_number?? old('phone_number') ?? ''}}" class="form-control" type="number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label>{{__('Password')}}</label><small class="text-danger">*</small>

                                                <input name="password" type="password"
                                                       class=" form-control"
                                                        value=""/>
                                                <p class="text-xs">
                                                    {{__('Keep blank if you do not want to change Password')}}
                                                </p>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 align-self-center">
                                                <label class="form-label">{{__('Language')}}</label>
                                                <select class="form-control " name="language" id="choices-language">

                                                    @foreach($available_languages as $key => $value)
                                                        <option value="{{$key}}"
                                                                @if($user->language===$key) selected @endif >{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 align-self-center">
                                                <div class="">
                                                    <label for="timezone">{{__('Timezone')}}</label>
                                                    <select class="form-control" id="timezone" name="timezone">
                                                        <option value="">{{__('Select')}}</option>
                                                        @foreach(\App\Supports\UtilSupport::timezoneList() as $key => $value)
                                                            <option value="{{$key}}" @if($user->timezone===$key) selected @endif >{{$value}}</option>
                                                        @endforeach


                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <label>{{__('Bio')}}</label>
                                            <textarea class=" form-control" name="bio" rows="5">{{$student->bio?? old('bio') ?? ''}}</textarea>
                                            <p class="text-xs">
                                                {{__('Short description about the student')}}
                                            </p>
                                        </div>

                                    </div>


                                    <!-- Step 1 button -->
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="button" class="btn btn-blue next-btn mb-0">Next</button>
                                    </div>
                                </div>
                                <!-- Basic information START -->
                            </div>
                            <!-- Step 1 content END -->

                            <!-- Step 2 content START -->
                            <div id="step-2" role="tabpanel" class="content fade" aria-labelledby="steppertrigger2">
                                <!-- Title -->


                                <div class=" row card card-body">

                                    <!-- Upload image START -->


                                    <div class="col-12">
                                        <label>{{__('Profile Picture')}}</label>

                                        <div class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
                                            <!-- Image -->

                                            <div>
                                                <h6 class="my-2">{{__('Upload student profile picture here, or')}}<a href="#!" class="text-info-light"> {{__('Browse')}} </a></h6>
                                                <label style="cursor:pointer;">
													<span>
														<input class="form-control" type="file" name="photo" value="{{$student->photo?? old('photo') ?? ''}}" id="image" accept="image/gif, image/jpeg, image/png" />
													</span>
                                                </label>
                                                <p class="small mb-0 mt-2"><b>{{__('Note:')}}</b>{{__('Only JPG, JPEG and PNG. Our suggested dimensions are 600px * 450px. Larger image will be cropped to 4:3 to fit our thumbnails/previews')}} .</p>
                                            </div>
                                        </div>

                                        <!-- Button -->

                                    </div>

                                    <div class="col-12 mt-3">
                                        <label >{{__('Cover Photo')}}</label>

                                        <div class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
                                            <!-- Image -->

                                            <div>
                                                <h6 class="my-2">{{__('Upload Cover Photo here, or')}}<a href="#!" class="text-info-light"> {{__('Browse')}} </a></h6>
                                                <label style="cursor:pointer;">
													<span>
														<input class="form-control" type="file" name="cover_photo" value="{{$student->cover_photo?? old('cover_photo') ?? ''}}" id="image" accept="image/gif, image/jpeg, image/png" />
													</span>
                                                </label>
                                                <p class="small mb-0 mt-2"><b>{{__('Note:')}}</b>{{__('Only JPG, JPEG and PNG. Our suggested dimensions are 600px * 450px. Larger image will be cropped to 4:3 to fit our thumbnails/previews')}} .</p>
                                            </div>
                                        </div>

                                        <!-- Button -->

                                    </div>

                                    <!-- Upload video END -->

                                    <!-- Step 2 button -->
                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-dark prev-btn mb-0">{{__('Previous')}}</button>
                                        <button type="button" class="btn btn-blue next-btn mb-0">{{__('Next')}}</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Step 2 content END -->

                            <!-- Step 3 content START -->
                            <div id="step-3" role="tabpanel" class="content fade" aria-labelledby="steppertrigger3">
                                <!-- Title -->

                                <div class=" row card card-body">
                                    <h4>{{__('Address')}}</h4>
                                    <div class="">
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label>{{__('Address ')}}</label>
                                                <input class="multisteps-form__input form-control" value="{{$student->address?? old('address') ?? ''}}"  type="text" name="address" />
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <label>{{__('City')}}</label>
                                                <input class=" form-control" type="text" name="city" value="{{$student->city?? old('city') ?? ''}}" />
                                            </div>

                                            <div class="col-6 col-sm-3 mt-3 mt-sm-0">
                                                <label>{{__('State')}}</label>
                                                <input class=" form-control" type="text" name="state" value="{{$student->state?? old('state') ?? ''}}" />
                                            </div>
                                            <div class="col-6 col-sm-3 mt-3 mt-sm-0">
                                                <label>{{__('Zip')}}</label>
                                                <input class="form-control" type="text" name="zip" value="{{$student->zip?? old('zip') ?? ''}}" />
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>{{__('Country')}}</label>
                                                <select name="country" id="country" class="form-control mb-1 select2">
                                                    <option value="">{{__('Select Country')}}</option>
                                                    @foreach (countries() as $key => $country)
                                                        <option @if(!empty($student))
                                                                value="{{$country['name']}}"
                                                                @if($student->country===$country['name']) selected @endif
                                                                @endif

                                                                >{{ $country['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Step 3 button -->
                                    <div class="d-flex justify-content-between mt-4">

                                        <button type="button" class="btn btn-dark prev-btn mb-0">{{__('Previous')}}</button>
                                        <button type="button" class="btn btn-blue next-btn mb-0">{{__('Next')}}</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Step 3 content END -->

                            <!-- Step 4 content START -->

                            <div id="step-4" role="tabpanel" class=" content fade" aria-labelledby="steppertrigger1">
                                <!-- Title -->

                                <hr> <!-- Divider -->

                                <!-- Basic information START -->
                                <div class=" card card-body  row g-4">
                                    <!-- Course title -->
                                    <h4>{{__('Socials')}}</h4>

                                    <div class="multisteps-form__content">
                                        <div class="row ">
                                            <div class="col-12">
                                                <label>{{__('Facebook Account')}}</label>
                                                <input class="form-control" type="text" name="facebook" value="{{$student->facebook?? old('facebook') ?? ''}}"/>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label>{{__('Twitter Handle')}}</label>
                                                <input class="form-control" type="text" name="twitter" value="{{$student->twitter?? old('twitter') ?? ''}}"/>
                                            </div>

                                            <div class="col-12 mt-3">
                                                <label>{{__('Linkedin Account')}}</label>
                                                <input class="form-control" type="text" name="linkedin" value="{{$student->linkedin?? old('linkedin') ?? ''}}"/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <button type="button" class="btn btn-dark prev-btn mb-0">Previous</button>
                                        @csrf
                                        @if($student)
                                            <input type="hidden" name="id" value="{{$student->id}}">
                                            <input type="hidden" name="admin_id" value="{{$student->admin_id}}">
                                        @endif
                                        <button type="submit" id="" class="btn btn-blue mb-0">{{__('Submit')}}</button>
                                    </div>

                                </div>
                                <!-- Basic information START -->
                            </div>

                        </form>
                    </div>
                </div>
                <!-- Card body END -->
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>

        $(function () {
            "use strict";

            tinymce.init({
                selector: '#description',


                plugins: 'table,code',


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



