@extends('layouts.admin-portal')
@section('title',__('Add Product'))

@section('content')
    <div class="row">
        <div class="col">
            <h5 class=" fw-bolder">
                {{__('Add eBook')}}
            </h5>
        </div>
        <div class="col text-end">
            <a href="/products" type="button" class="btn btn-info text-white">{{__('eBook List')}}</a>
        </div>
    </div>
    <!--begin::Stepper-->

    <!--end::Stepper-->

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
                                    <label class=" text-capitalize bs-stepper-label d-none d-md-block">{{__('Details')}}</label>
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
                                    <label class=" text-capitalize bs-stepper-label d-none d-md-block">{{__('File')}}</label>
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
                        <form action="/save-product" method="post" enctype="multipart/form-data">
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

                                <!-- Basic information START -->
                                <div class="card card-body ">
                                    <!-- Course title -->
                                    <h4>{{__('eBook details')}}</h4>
                                    <div class="mb-3">
                                        <label  for="ebookTitle" class="form-label">{{__('eBook Name')}}</label>
                                        <input class="form-control" type="text" name="name" value="{{$product->name ?? old('name') ?? ''}}" id="ebookTitle">
                                    </div>

                                    <label for="basic-url" for="ebookSlug" class="form-label">{{__('Slug')}}</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text fw-bolder">{{config('app.url')}}/shop/</span>
                                        <input type="text" value="{{$product->slug ?? old('slug') ?? ''}}" id="ebookSlug" name="slug" class="form-control ps-1">
                                    </div>

                                    <div class="mb-4">
                                        <label class="">{{__('Category')}}<a href="/product-categories" class="text-info-light" >{{__(' New Category')}}&nbsp;</a></label>&nbsp;
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

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">{{__('Price')}}</label>
                                            <input class="form-control" name="price" value="{{$product->price ?? old('price') ?? ''}}"  type="number" >

                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{__('Author Name')}}</label>
                                            <input class="form-control" type="text" name="author_name" value="{{$product->author_name ?? old('author_name') ?? ''}}">
                                        </div>

                                    </div>


                                    <div class="col-12 mb-3">
                                        <label class="form-label">{{__('Author Description')}}</label>
                                        <textarea class="form-control" id="author_description" rows="4" name="author_description">@if(!empty($product)){{$product->author_description}}@endif</textarea>
                                    </div>



                                    <!-- Short description -->
                                    <div class="col-12">
                                        <label class="form-label">{{__('Description')}}</label>
                                        <textarea class="form-control" id="description" rows="2" name="description">@if(!empty($product)){{$product->description}}@endif</textarea>
                                    </div>

                                    <!-- Step 1 button -->
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="button" class="btn btn-blue next-btn mb-0">{{__('Next')}}</button>
                                    </div>
                                </div>
                                <!-- Basic information START -->
                            </div>
                            <!-- Step 1 content END -->

                            <!-- Step 2 content START -->
                            <div id="step-2" role="tabpanel" class="content fade" aria-labelledby="steppertrigger2">
                                <!-- Title -->

                                <div class=" row card card-body">
                                    <h4>{{__('Product Image')}}</h4>
                                    <!-- Upload image START -->
                                    <div class="col-12">
                                        <div class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">

                                            <div>
                                                <h6 class="my-2">{{__('Upload product image here, or')}}<a href="#!" class="text-primary">{{__('Browse')}}</a></h6>
                                                <label style="cursor:pointer;">
													<span>
														 <input class="form-control" name="image" type="file" id="cover_photo_file">
													</span>
                                                </label>
                                                <p class="small mb-0 mt-2"><b>{{__('Note:')}}</b> {{__('Only JPG, JPEG and PNG. Our suggested dimensions are 600px * 450px.')}}</p>
                                            </div>
                                        </div>
                                        <!-- Button -->
                                    </div>
                                    <h4 class="mt-3">{{__('Author Profile Photo')}}</h4>
                                    <div class="col-12 mt-2">
                                        <div class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">

                                            <div>
                                                <h6 class="my-2">{{__('Upload Author Profile photo here, or')}}<a href="#!" class="text-primary">{{__('Browse')}}</a></h6>
                                                <label style="cursor:pointer;">
													<span>
														 <input class="form-control" name="author_photo" type="file" id="cover_photo_file">
													</span>
                                                </label>
                                                <p class="small mb-0 mt-2"><b>{{__('Note:')}}</b> {{__('Only JPG, JPEG and PNG. Our suggested dimensions are 120px * 120px.')}}</p>
                                            </div>
                                        </div>

                                        <!-- Button -->

                                    </div>
                                    <!-- Upload image END -->

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
                                    <h4>File</h4>
                                    <!-- Add lecture Modal button -->


                                    <!-- Edit lecture START -->
                                    <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                                        <!-- Item START -->

                                        <!-- Item END -->

                                        <!-- Item START -->

                                        <!-- Item END -->

                                        <!-- Item START -->
                                        <div class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3 mb-4">
                                            <!-- Image -->
{{--                                            <img src="assets/images/element/gallery.svg" class="h-50px" alt="">--}}
                                            <div>
                                                <h6 class="my-2">Upload product file here, or<a href="#!" class="text-primary"> Browse</a></h6>
                                                <label style="cursor:pointer;">
													<span>
														<input class="form-control" name="file" type="file" id="">
													</span>
                                                </label>
                                                <p class="small mb-0 mt-2"><b>{{__('Note:')}}</b> {{__('Only PDF, JPG, JPEG and PNG.')}}</p>
                                            </div>
                                        </div>
                                        <!-- Item END -->

                                    </div>
                                    <!-- Edit lecture END -->

                                    <!-- Step 3 button -->


                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-dark prev-btn mb-0">{{__('Previous')}}</button>
                                        @csrf
                                        @if($product)
                                            <input type="hidden" name="id" value="{{$product->id}}">
                                            <input type="hidden" name="admin_id" value="{{$product->admin_id}}">
                                        @endif
                                        <button type="submit" id="btn_submit_form" class="btn btn-blue mb-0">{{__('Submit')}}</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Step 3 content END -->

                            <!-- Step 4 content START -->

                            <!-- Step 4 content END -->

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


                plugins: 'lists,table',
                toolbar:'styleselect | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code | undo redo|numlist bullist',
                lists_indent_on_tab: false,
                branding: false,
                menubar: false,


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

            @if(empty($product))

            let ebookTitle = document.getElementById('ebookTitle');

            ebookTitle.addEventListener('keyup', function (event) {
                event.preventDefault();
                let title = ebookTitle.value;
                document.getElementById('ebookSlug').value = title.toLowerCase().split(' ').join('-');
            });

            @endif


        });


    </script>

@endsection



