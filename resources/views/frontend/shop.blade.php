
@extends('frontend.layout')
@section('title','Shop')
@section('content')

    <section class="py-6">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class=" bg-dark-alt p-4 rounded-3 position-relative overflow-hidden">

                        <!-- Svg decoration -->

                        <div class="row position-relative align-items-center">

                            <!-- Content -->
                            <div class="col-md-6 px-md-5">
                                <!-- Title -->
                                <h1 class="mb-3 text-white">{{__('New Release')}}!</h1>
                                <p class="mb-3 text-muted">{{__('Welcome to our store, buy the best sellers!!  ')}}  </p>

                                <!-- Search -->

                            </div>

                            <!-- Image -->
                            <div class="col-lg-6 ps-3 pe-3">
                                <div class="row">
                                    @foreach($recent_products as $product)
                                        <div class="col-lg-3 col-6 mb-4 ">
                                            <a href="/shop/{{$product->slug}}">
                                                <img class="w-100 border-radius-lg shadow mt-0 mt-lg-5" src="{{PUBLIC_DIR}}/uploads/{{$product->image}}" alt="">
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div> <!-- Row END -->
                    </div>
                </div>
            </div> <!-- Row END -->
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row">
                <!-- Main content START -->
                <div class="col-md-3">
                    <div class="vertical me-2 ms-2"></div>
                    <div class="ms-4 mt-6">
                        <h6>{{__('Categories')}}</h6>
                        <div class="d-flex align-items-start mt-3">
                            <div class="nav flex-column  me-3" id="v-pills-tab">
                                @foreach($categories as $category)
                                    <h5><a href="/shop?category_id={{$category->id}}" class="nav-link fw-bolder badge bg-purple-light mb-2 text-purple   active  " id="v-pills-home-tab">{{$category->name}}</a></h5>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">

                    <!-- Search option START -->
                    <div class="row mb-4 align-items-center">
                        <!-- Title -->
                        <div class="col-md-4">
                            <h5 class="mb-0"></h5>
                        </div>
                    </div>
                    <!-- Search option END -->
                    <!-- Book Grid START -->
                    <div class="row g-4">
                        <!-- Card item START -->
                        @foreach($products as $product)
                            <div class="col-md-4">
                                <a href="/shop/{{$product->slug}}">
                                    <div class="card h-100">
                                        <div class="position-relative">
                                            <!-- Image -->
                                            @if(empty($product->image))
                                                <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                                     class="w-100 border-radius-lg shadow-lg p-5">
                                            @else
                                                <img src="{{PUBLIC_DIR}}/uploads/{{$product->image}}" class="p-5 card-img-top">
                                            @endif

                                        </div>
                                        <!-- Card body -->

                                        <div class="card-body ">
                                            <!-- Title -->
                                            <h5 class="card-title text-center mb-0">
                                                <a href="/shop/{{$product->slug}}" class="">{{$product->name}}</a>
                                            </h5>

                                            <div class="text-center">{!! renderEbookRating($product->id) !!}</div>

                                            <h5 class=" text-center mb-0">
                                                {{formatCurrency($product->price,getWorkspaceCurrency($super_settings))}}
                                            </h5>

                                        </div>

                                        <!-- Card footer -->
                                        <div class=" text-center pt-0 ">
                                            <a href="/add-to-cart/{{$product->id}}?type=ebook" class="btn btn-dark mb-2 mb-sm-0 me-00 "><i class="bi bi-cart3 "></i>{{__('Add to Cart')}}</a>

                                        </div>
                                    </div>
                                </a>
                            </div>

                    @endforeach
                    <!-- Card item END -->
                    </div>
                    <!-- Pagination END -->
                </div>
                <!-- Main content END -->
            </div>
        </div>
    </section>

@endsection









