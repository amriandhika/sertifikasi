@extends('layouts.admin-portal')
@section('title',$product->name)
@section('content')

    <div class="row g-4 g-sm-5">

        <!-- Left sidebar START -->
        <div class="col-md-4">
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
                                    <img src="{{PUBLIC_DIR}}/uploads/{{$product->image}}" class=" p-5 w-100 card-img-top">
                                @endif

                            </div>

                            <!-- Card body -->
                            <div class="card-footer pb-3">
                                <!-- Buttons and price -->
                                <div class="text-center">
                                    <!-- Buttons -->

                                </div>
                            </div>
                        </div>
                        <!-- Card END -->
                    </div>
                </div> <!-- Row End -->
            </div>
            <div class="card bg-info-light mt-3 mb-4">
                <div class="card-body bg-info-light">

                    <h6 class="">{{__('About Author')}}</h6>

                    <div class="d-flex py-1">
                        <div>
                            @if(empty($product->author_photo))
                                <div class="avatar avatar-md rounded-circle bg-dark-alt border-radius-md">
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
                    <p class="bg-info-light">{!! $product->author_description !!}</p>
                </div>
            </div>
        </div>
        <!-- Left sidebar END -->

        <!-- Main content START -->
        <div class="card card-body col-md-8">

            <!-- Title -->
            <h3 class="mb-4">
                {{$product->name}}
            </h3>

            <!-- Rating -->
            <div class=" d-flex align-items-center mb-4">
                <h3 class="me-3 mb-0">{!! getEbookRating($product->id) !!}/5</h3>
                <div>
                    <div class="">{!! renderEbookRating($product->id) !!}</div>
                    <p class="mb-0 small mt-n1">{{__('Reviews from our buyers')}}</p>
                </div>
            </div>

            <!-- Price Item START -->
            <ul class="list-inline mb-4">
                <!-- Price -->
                <li class="list-inline-item">
                    <div class="row">
                        <div class="col">
                            <div class="card bg-success-light">
                                <div class="card-body">
                                    <span class="mb-0 h5 me-2 text-success"> {{formatCurrency($product->price,getWorkspaceCurrency($super_settings))}}</span>

                                </div>
                            </div>

                        </div>

                    </div>
                </li>

                <!-- Price -->

            </ul>
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
                            <span class="h6 fw-light"><i class="bi fa-fw bi-person-circle text-primary me-2"></i>{{__('Author')}}:</span>
                            <span class="h6">@if(!empty($product))
                                    {{$product->author_name}}

                                @endif</span>
                        </li>


                    </ul>
                    <!-- List END -->
                </div>

                <h5 class="mt-5">{{__('Description')}}</h5>
                {!! $product->description !!}
            </div>

            <!-- Content -->

            <!-- Additional info -->

            <!-- Book detail START -->
            <div class="mb-4 mt-5">
                <div class="">
                    <!-- Review START -->
                    <div class="row mb-4">
                        <h5 class="mb-4">{{__('Reviews')}}</h5>

                    </div>

                    <!-- Student review START -->

                    @foreach($reviews as $review)


                        <div class="row">
                            <!-- Review item START -->
                            <div class="d-md-flex my-4">
                                <!-- Avatar -->
                                <div class="avatar  me-4 ">
                                    @if(!empty($students[$review->student_id]))

                                        @if(isset($students[$review->student_id]->photo))

                                            <img alt="" class=" avatar rounded-circle " src="{{PUBLIC_DIR}}/uploads/{{$students[$review->student_id]->photo}}">
                                        @else
                                            <div class="avatar  rounded-circle bg-purple-light  border-radius-md ">
                                                <h6 class="text-purple mt-1">{{$students[$review->student_id]->first_name[0]}}{{$students[$review->student_id]->last_name[0]}}</h6>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <!-- Text -->
                                <div>
                                    <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                                        <h5 class="me-3 mb-0">
                                            @if(!empty($students[$review->student_id]))

                                                @if(isset($students[$review->student_id]))
                                                    {{$students[$review->student_id]->first_name}} {{$students[$review->student_id]->last_name}}
                                                @endif

                                            @endif
                                        </h5>
                                        <!-- Review star -->
                                        {!! renderEbookRating($product->id) !!}
                                    </div>
                                    <!-- Info -->
                                    <p class="small mb-2">{{$review->updated_at->diffForHumans()}}</p>
                                    <p class="mb-2">{!! $review->review !!} </p>

                                    <!-- Reply button -->

                                </div>
                            </div>
                            <!-- Divider -->
                            <hr>

                        </div>
                    @endforeach

                </div>
            </div>
            <!-- Book detail END -->
        </div>
        <!-- Main content END -->
    </div>

@endsection