@extends('frontend.layout')
@section('title','Cart')
@section('content')

    <main>
        <section class="section section-lg bg-white line-bottom-soft mt-7 pt-3 pt-xl-5 mt-7 py-0">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </section>
        <section class="pt-5 mb-10">
            <div class="container">
                @if(!empty($cart))
                    <div class="row g-4 g-sm-5">
                        <!-- Main content START -->
                        <div class="col-lg-8 mb-4 mb-sm-0">
                            <div class="card card-body p-4 shadow">



                                <div class="table-responsive border-0 rounded-3">
                                    <!-- Table START -->
                                    <table class="table align-middle p-4 mb-0">
                                        <!-- Table head -->
                                        <!-- Table body START -->
                                        <tbody class="border-top-0">
                                        <!-- Table item -->

                                        @if(!empty($cart['course']))

                                            @foreach($cart['course'] as $course_in_cart)

                                                <tr>
                                                    <!-- Course item -->
                                                    <td>
                                                        <div class="d-lg-flex align-items-center">
                                                            <!-- Image -->
                                                            <div>
                                                                @if(empty($course_in_cart->image))
                                                                    <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg" class="avatar avatar-xxl me-3" alt="product image">

                                                                @else
                                                                    <img src="{{PUBLIC_DIR}}/uploads/{{$course_in_cart->image}}" class="w-100 avatar avatar-xxl me-3">
                                                                @endif



                                                            </div>

                                                            <!-- Title -->
                                                            <h6 class="mb-0 ms-lg-3 mt-2 mt-lg-0">
                                                                <a href="/course-details?id={{$course_in_cart->id}}">{{$course_in_cart->name}}</a>
                                                            </h6>
                                                        </div>
                                                    </td>

                                                    <!-- Amount item -->
                                                    <td class="text-center">
                                                        <h5 class="text-info mb-0">
                                                            @if(!empty($course_in_cart->price))
                                                                {{formatCurrency($course_in_cart->price,getWorkspaceCurrency($super_settings))}}

                                                            @endif
                                                        </h5>
                                                    </td>
                                                    <!-- Action item -->
                                                    <td>
                                                        <a href="/remove-item-from-cart/{{$course_in_cart->id}}" class="btn btn-md bg-pink-light text-danger px-2 mb-0"><i class="fas fa-fw fa-times"></i></a>
                                                    </td>
                                                </tr>

                                            @endforeach

                                        @endif

                                        @if(!empty($cart['ebook']))

                                            @foreach($cart['ebook'] as $ebook_in_cart)

                                                <tr>
                                                    <!-- Course item -->
                                                    <td>
                                                        <div class="d-lg-flex align-items-center">
                                                            <!-- Image -->
                                                            <div>
                                                                @if(empty($ebook_in_cart->image))
                                                                    <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg" class="avatar avatar-xxl me-3" alt="product image">

                                                                @else
                                                                    <img src="{{PUBLIC_DIR}}/uploads/{{$ebook_in_cart->image}}" class="w-100 avatar avatar-xxl me-3 ">
                                                                @endif


                                                            </div>

                                                            <!-- Title -->
                                                            <h6 class="mb-0 ms-lg-3 mt-2 mt-lg-0">
                                                                <a href="/view-ebook?id={{$ebook_in_cart->id}}">{{$ebook_in_cart->name}}</a>
                                                            </h6>
                                                        </div>
                                                    </td>

                                                    <!-- Amount item -->
                                                    <td class="text-center">
                                                        <h5 class="text-info mb-0">
                                                            @if(!empty($ebook_in_cart->price))
                                                                {{formatCurrency($ebook_in_cart->price,getWorkspaceCurrency($super_settings))}}

                                                            @endif
                                                        </h5>
                                                    </td>
                                                    <!-- Action item -->
                                                    <td>
                                                        <a href="/remove-item-from-cart/{{$ebook_in_cart->id}}" class="btn btn-md bg-pink-light text-danger px-2 mb-0"><i class="fas fa-fw fa-times"></i></a>
                                                    </td>
                                                </tr>

                                            @endforeach

                                        @endif

                                        <!-- Table item -->

                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                        <!-- Main content END -->

                        <!-- Right sidebar START -->
                        <div class="col-lg-4">
                            <!-- Card total START -->
                            <div class="card card-body p-4 shadow">
                                <!-- Title -->
                                <h4 class="mb-3">{{__('Cart Total')}}</h4>

                                <!-- Price and detail -->
                                <ul class="list-group list-group-borderless mb-2">



                                        @if(!empty($cart['course']))

                                            @foreach($cart['course'] as $course_in_cart)
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="h6 fw-light mb-0">{{$course_in_cart->name}}</span>
                                                <span class="h6 fw-light mb-0 fw-bold">@if(!empty($course_in_cart->price))
                                                        {{formatCurrency($course_in_cart->price,getWorkspaceCurrency($super_settings))}}

                                                    @endif
                                                </span>
                                            </li>



                                            @endforeach

                                        @endif

                                    @if(!empty($cart['ebook']))

                                        @foreach($cart['ebook'] as $ebook_in_cart)
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="h6 fw-light mb-0">{{$ebook_in_cart->name}}</span>
                                                <span class="h6 fw-light mb-0 fw-bold">@if(!empty($ebook_in_cart->price))
                                                        {{formatCurrency($ebook_in_cart->price,getWorkspaceCurrency($super_settings))}}

                                                    @endif
                                                </span>
                                            </li>

                                        @endforeach

                                    @endif

                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                        <span class="h5 mb-0">{{__('Total')}}</span>
                                        <span class="h5 mb-0"> {{formatCurrency(getCartTotalPrice(),getWorkspaceCurrency($super_settings))}}</span>
                                    </li>
                                </ul>

                                <!-- Button -->
                                <div class="d-grid">
                                    <a href="/checkout" class="btn btn-lg btn-success">{{__('Checkout')}}</a>
                                </div>

                                <!-- Content -->
                                <p class="small mb-0 mt-2 text-center">{{__('By purchasing, you agree to these')}} </p><p class="text-center"><a href="/termsandconditions"><strong>{{__('Terms of Service')}}</strong></a></p>

                            </div>
                            <!-- Card total END -->
                        </div>
                        <!-- Right sidebar END -->

                    </div>
                @else
                    <p>{{__('Cart is empty')}}</p>
                @endif
            </div>
        </section>
    </main>
@endsection