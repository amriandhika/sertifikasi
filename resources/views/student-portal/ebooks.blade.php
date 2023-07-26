@extends('layouts.student-portal')
@section('title',__('eBooks'))
@section('content')
    <div class=" row mb-2">
        <div class="col">
            <h5 class="  fw-bolder">
                {{__('Shop')}} /<span class="text-secondary">
                            {{__(' My e-Books')}}
                    </span>
            </h5>
            <p class="text-muted">{{__('All of my books')}}</p>

        </div>
        <div class="col text-end">
            <a href="/shop" type="button" class="btn btn-info text-white"><i class="fas fa-plus"></i> {{__('Buy More ')}}</a>

        </div>
    </div>
    <div class="row g-4">
        <!-- Card item START -->
        @foreach($products as $product)

            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100">

                    <div class="position-relative">
                        <!-- Image -->
                        @if(empty($product->image))
                            <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                 class="w-100 border-radius-lg shadow-lg p-5">
                        @else
                            <img src="{{PUBLIC_DIR}}/uploads/{{$product->image}}" class=" p-5  card-img-top">
                        @endif
                    </div>
                    <!-- Card body -->

                    <div class="card-body text-center px-3">
                        <!-- Title -->
                        <h5 class="card-title mb-0">
                            <a href="/student/view-ebook?id={{$product->id}}" class="">{{$product->name}}</a>
                        </h5>
                        {!! renderEbookRating($product->id) !!}
                    </div>


                    <!-- Card footer -->
                    <div class="card-footer pt-0 px-3">
                        <div class="d-flex justify-content-between align-items-center">
                                                                        <span class="h6 fw-light mb-0">{{__('By')}} <span class="fw-bolder">{{$product->author_name}}</span> </span>
                        <!-- Price -->
                            <h5 class="text-success mb-0">
                                {{formatCurrency($product->price,getWorkspaceCurrency($settings))}}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
    <!-- Card item END -->
    </div>
@endsection