@extends('layouts.student-portal')
@section('title',$product->name)
@section('content')

    <div class="row g-4 g-sm-5">
        <!-- Left sidebar START -->
        <div class="col-xl-4">
            <div data-sticky data-margin-top="80" data-sticky-for="992">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-xl-12">
                        <!-- Card START -->
                        <div class="card ">
                            <!-- Image -->
                            <div class="rounded-3">
                                @if(empty($product->image))
                                    <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                         class="w-100 border-radius-lg shadow-lg mt-3">
                                @else
                                    <img src="{{PUBLIC_DIR}}/uploads/{{$product->image}}" class=" p-6 w-100 card-img-top">
                                @endif

                            </div>

                            <!-- Card body -->
                            <div class="card-footer pb-3">
                                <!-- Buttons and price -->
                                <div class="text-center">
                                    <!-- Buttons -->
                                    <a href="{{PUBLIC_DIR}}/uploads/{{$product->file}}" class="btn btn-success mb-sm-0 me-00 ">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                       {{__(' View and Download')}}</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card END -->

                        <div class="card  bg-info-light mt-3">
                            <div class="card-body bg-info-light border-radius-sm">

                                <h6 class="">{{__('About Author')}}</h6>

                                <div class="d-flex py-1">
                                    <div>
                                        @if(empty($product->author_photo))
                                            <div class="avatar avatar-md rounded-circle bg-darkblue border-radius-md p-2 ">
                                                <h6 class="text-white text-uppercase mt-1">{{$product->author_name['0']}}</h6>
                                            </div>
                                        @else

                                            <img src="{{PUBLIC_DIR}}/uploads/{{$product->author_photo}}"
                                                 class="avatar avatar-md rounded-circle  shadow-sm">
                                        @endif
                                    </div>
                                    <div class="d-flex flex-column justify-content-center ms-3">
                                        <h6 class="mb-0">{{$product->author_name}}</h6>
                                    </div>
                                </div>
                                <p class="bg-info-light mt-1">{!! $product->author_description !!}</p>
                            </div>
                        </div>

                    </div>
                </div> <!-- Row End -->
            </div>
        </div>
        <!-- Left sidebar END -->

        <!-- Main content START -->
        <div class="col-xl-8 card card-body">

            <!-- Title -->
            <h3 class="mb-4 ">
                {{$product->name}}
            </h3>

            <!-- Rating -->
            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex align-items-center mb-4">
                        <h3 class="me-3 mb-0">{!! getEbookRating($product->id) !!}/5</h3>
                        <div>
                            {!! renderEbookRating($product->id) !!}
                            <p class="mb-0 small mt-n1">{{__('Reviews from our buyers')}}</p>
                        </div>



                    </div>
                </div>
                <div class="col-md-4 mb-3 text-end">
                    <botton  class="btn btn-sm btn-success mb-0 mt-2 mt-sm-0" data-bs-toggle="modal" data-bs-target="#review">{{__('Review')}}</botton>

                </div>
            </div>



            <!-- Price Item START -->

            <!-- Price Item END -->

            <div class="row mb-3">
                <div class="col-md-6">
                    <!-- List START -->
                    <ul class="list-group list-group-borderless">
                        <li class="list-group-item px-0">
                                        <span class="h6 fw-light ">
                                            {{__("Published date")}}:</span>
                            <span class="h6">
                                            @if(!empty($product))
                                    {{(\App\Supports\DateSupport::parse($product->created_at))->format(config('app.date_format'))}}

                                @endif</span>
                        </li>


                    </ul>
                    <!-- List END -->
                </div>

                <div class="col-md-6">
                    <!-- List START -->
                    <ul class="list-group list-group-borderless">
                        <li class="list-group-item px-0">
                            <span class="h6 fw-light"><i class="bi fa-fw bi-person-circle text-primary me-2"></i>{{__('Author')}}</span>
                            <span class="h6">@if(!empty($product))
                                    {{$product->author_name}}

                                @endif
                            </span>
                        </li>


                    </ul>
                    <!-- List END -->
                </div>
            </div>

            <!-- Content -->
            <h5>{{__('Description')}}</h5>
        {!! $product->description !!}
        <!-- Additional info -->



        </div>
        <!-- Main content END -->
    </div>

    
{{--<!-- Modal -->--}}


    <div class="modal fade" id="review" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="/student/save-ebook-review" method="post">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('Review this book')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert bg-pink-light text-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <label for="exampleFormControlTextarea1" class="form-label">{{__("Your Rating")}}</label>

                            <div class="rating text-warning">
                                <i class=" rating__star far  fa-star" ></i>
                                <i class=" rating__star far  fa-star" ></i>
                                <i class=" rating__star far  fa-star" ></i>
                                <i class=" rating__star far fa-star" ></i>
                                <i class=" rating__star far  fa-star" ></i>
                            </div>
                        <div class="mb-2 mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label">{{__('Write your Review')}}</label>
                            <textarea class="form-control" name="review" id="exampleFormControlTextarea1" rows="4">{{$review->review ?? old('review') ?? ''}}</textarea>

                        </div>
                            <input type="hidden" id="star_count" name="star_count" value="{{$review->star_count ?? ''}}">

                    </div>

                    @csrf

                    <input type="hidden" name="product_id" value="{{$product->id}}">

                    <div class="ms-3 mb-4">
                        <button type="button" class="btn btn-sm bg-pink-light text-danger shadow-none" data-bs-dismiss="modal">{{__('Cancel')}}</button>
                        <button type="submit" class="btn btn-sm bg-purple-light text-purple shadow-none">{{__('Save Review')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection


@section('script')
    <script>
        const ratingStars = [...document.getElementsByClassName("rating__star")];

        ratingStars.forEach(function(star, index) {
            star.addEventListener('click', function() {
                ratingStars.forEach(function(star) {
                    star.classList.remove('fas', 'fa-star');
                    star.classList.add('far', 'fa-star');
                });
                for (let i = 0; i <= index; i++) {
                    ratingStars[i].classList.remove('far', 'fa-star');
                    ratingStars[i].classList.add('fas', 'fa-star');
                }
                document.getElementById('star_count').value = index + 1;
            });
        });

        // Set star count

        if(document.getElementById('star_count').value > 0) {
            console.log(document.getElementById('star_count').value);
            for (let i = 0; i < document.getElementById('star_count').value; i++) {
                ratingStars[i].classList.remove('far', 'fa-star');
                ratingStars[i].classList.add('fas', 'fa-star');
            }
        }

    </script>

@endsection