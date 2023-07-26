@extends('frontend.layout')
@section('title','Order')
@section('content')
    <div class="col-md-5 mx-auto py-10 ">
        <div class="card shadow-sm">
            <div class="card-body">

                <!-- LOGO -->

                @if(!empty($super_settings['logo']))
                    <img src="{{PUBLIC_DIR}}/uploads/{{$super_settings['logo']}}" class="navbar-brand-img h-100 mb-3" style="max-height: {{$super_settings['frontend_logo_max_height'] ?? '30'}}px;" alt="...">
                @else
                    <span class=" font-weight-bold mb-3">{{config('app.name')}}</span>
            @endif

                <!-- -->

                <!-- CONTENT -->
                <div clss="mb-3 ">
                    <h5>{{__('Order Confirmed')}}</h5>
                </div>
                <div>

                    <p>{{__('Hello ')}}<strong>{{$student->first_name}}</strong>, {{__('thanks for ordering. Your order has been completed. ')}}</p>
                    <div class="row d-flex mb-3 mt-5">
                        <div class="col text-start"><strong>{{__('Order no.')}}: </strong> {{$order->id}}</div>
                        <div class="col text-end"><strong>{{__('Date')}}: </strong>{{(\App\Supports\DateSupport::parse($order->created_at))->format(config('app.date_format'))}}</div>


                    </div>

                    <!-- -->

                    <!-- PRODUCT TABLE -->

                    <div class="table-responsive border-bottom-0 ">
                        <table class="w-100 table align-items-center">

                            <thead class="bg-light">

                            <tr>
                                <th>{{__('Item')}}</th>

                                <th class="text-end">{{__('Price')}}</th>

                            </tr>
                            </thead>
                            <tbody class="border-top-0">
                            <!-- Table item -->

                            @if(!empty($cart['course']))

                                @foreach($cart['course'] as $course_in_cart)

                                    <tr class="mb-2">
                                        <!-- Course item -->
                                        <td>
                                            <div class="d-lg-flex align-items-center">
                                                <!-- Image -->
                                                <!-- Title -->
                                                <h6 class="mb-0 mt-2 mt-lg-0">
                                                    <a href="/course-details?id={{$course_in_cart->id}}">{{$course_in_cart->name}}</a>
                                                </h6>
                                            </div>
                                        </td>

                                        <!-- Amount item -->
                                        <td  class="text-end">
                                            <h6 class="text-info mb-0">
                                                @if(!empty($course_in_cart->price))
                                                    {{formatCurrency($course_in_cart->price,getWorkspaceCurrency($super_settings))}}

                                                @endif
                                            </h6>
                                        </td>
                                        <!-- Action item -->

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

                                                <!-- Title -->
                                                <h6 class="mb-0 mt-2 mt-lg-0">
                                                    <a href="/view-ebook?id={{$ebook_in_cart->id}}">{{$ebook_in_cart->name}}</a>
                                                </h6>
                                            </div>
                                        </td>

                                        <!-- Amount item -->
                                        <td class="text-end mt-1">
                                            <h6 class="text-info mb-0">
                                                @if(!empty($ebook_in_cart->price))
                                                    {{formatCurrency($ebook_in_cart->price,getWorkspaceCurrency($super_settings))}}

                                                @endif
                                            </h6>
                                        </td>
                                        <!-- Action item -->

                                    </tr>

                                @endforeach

                            @endif

                            <!-- Table item -->

                            </tbody>
                        </table>
                    </div>
                    <!-- -->

                    <!-- ORDER TOTAL -->
                    <div class="row">
                        <div class="col">{{__('TOTAL')}}</div>
                        <div class=" col text-end h5">

                            {{formatCurrency($order->order_total,getWorkspaceCurrency($super_settings))}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


