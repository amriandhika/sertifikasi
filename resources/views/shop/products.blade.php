@extends('layouts.admin-portal')
@section('title',__('Products'))
@section('content')
    <div class=" row mb-2">
        <div class="col">
            <div>

                <h5 class="fw-bolder">
                    {{__('Shop')}} /<span class="text-secondary">
                            {{__('eBooks')}}
                    </span>
                </h5>
                <p class="text-muted">{{__('Create, edit or delete ebooks.')}}</p>

            </div>

        </div>
        <div class="col text-end">
            <a href="/add-product" type="button" class="btn btn-info text-white"><i class="fas fa-plus"></i> {{__('Add eBook ')}}</a>

        </div>
    </div>

        <section class="">
            <div class="">

                @if(!count($products))

                    <div class="card">
                        <div class="card-body">
                            <p>{{__('No items to display. Get started by adding an item.')}}</p>

                            <a href="/add-product" type="button" class="btn btn-info text-white"><i class="fas fa-plus"></i> {{__('Add eBook ')}}</a>
                        </div>
                    </div>

                @else

                    <div class="row">
                        <!-- Main content START -->
                        <div class="col-12">

                            <!-- Book Grid START -->
                            <div class="row g-4">

                                <!-- Card item START -->
                                @foreach($products as $product)

                                    <div class="col-sm-6 col-lg-4 col-xl-3">
                                        <div class="card h-100">
                                            <div class="card-header">
                                                <div class="text-end">
                                                    <div class="dropstart">
                                                        <a href="javascript:" class="text-secondary" id="dropdownMarketingCard"
                                                           data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3"
                                                            aria-labelledby="dropdownMarketingCard">
                                                            <li><a class="dropdown-item border-radius-md"
                                                                   href="/add-product?id={{$product->id}}">{{__('Edit')}}</a></li>

                                                            <li><a class="dropdown-item border-radius-md"
                                                                   href="/view-product?id={{$product->id}}">{{__('See Details')}}</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item border-radius-md text-danger"
                                                                   href="/delete/product/{{$product->id}}">{{__('Delete')}}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="position-relative">
                                                <!-- Image -->
                                                @if(empty($product->image))
                                                    <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                                         class="w-100 border-radius-lg shadow-lg p-5">
                                                @else
                                                    <img src="{{PUBLIC_DIR}}/uploads/{{$product->image}}" class="p-5  card-img-top">
                                                @endif

                                            </div>
                                            <!-- Card body -->

                                            <div class="card-body px-3">
                                                <!-- Title -->
                                                <h5 class="card-title mb-0">
                                                    <a href="/view-product?id={{$product->id}}" class="">
                                                        {{$product->name}}</a>
                                                </h5>


                                                <div class="">{!! renderEbookRating($product->id) !!}</div>
                                            </div>


                                            <!-- Card footer -->
                                            <div class="card-footer pt-0 px-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="h6 fw-light mb-0">{{__('By')}} <span class="fw-bolder">{{$product->author_name}}</span></span>
                                                    <!-- Price -->
                                                    <h5 class="text-success mb-0">
                                                        {{formatCurrency($product->price,getWorkspaceCurrency($super_settings))}}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                            @endforeach
                            <!-- Card item END -->

                            </div>
                            <!-- Book Grid END -->

                            <!-- Pagination END -->
                        </div>
                        <!-- Main content END -->
                    </div>

                @endif

            </div>
        </section>

@endsection