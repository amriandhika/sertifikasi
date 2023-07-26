@extends('layouts.student-portal')
@section('title','Order Details')
@section('content')
    <div class="col-md-5 mx-auto py-4 ">
        <div class="card shadow-sm">
            <div class="card-body">

                <!-- LOGO -->
                <div class="mb-4 mt-4">
                    @if(!empty($super_settings['logo']))
                        <img src="{{PUBLIC_DIR}}/uploads/{{$super_settings['logo']}}" class="navbar-brand-img h-100" style="max-height: {{$super_settings['frontend_logo_max_height'] ?? '30'}}px;" alt="...">
                    @else
                        <span class=" font-weight-bold">{{config('app.name')}}</span>
                    @endif
                </div>


                <!-- CONTENT -->
                <div clss="mb-6">
                    <h4>{{__('Order Receipt')}}</h4>
                </div>
                <div>

                    <p>{{__('Hello ')}}<strong>{{$student->first_name}}</strong>, {{__('thanks for ordering.')}}</p>
                    <div class=" row mb-3 mt-5">
                        <div class="col text-start"><strong>{{__('Order no')}}: </strong> {{$order->id}}</div>
                        <div class="col text-end"><strong>{{__('Date')}}: </strong>{{(\App\Supports\DateSupport::parse($order->created_at))->format(config('app.date_format'))}}</div>


                    </div>

                    <!-- -->

                    <!-- PRODUCT TABLE -->

                    <div class=" table-responsive border-bottom-0 ">
                        <table class="w-100 table align-items-center">

                            <thead class="bg-light">

                            <tr>
                                <th>{{__('Item')}}</th>

                                <th class="text-end">{{__('Price')}}</th>

                            </tr>
                            </thead>
                            <tbody class="border-top-0">
                            <!-- Table item -->

                            @if(!empty($order))

                                @foreach($order_items  as $item)
                                    <tr class="border-0">
                                        <!-- Course item -->
                                        <td class="border-0">
                                            <h6 class=" ">
                                                {{$item->item_name}}
                                            </h6>
                                        </td>
                                        <!-- Amount item -->
                                        <td  class="text-end border-0">
                                            <h6 class="text-info mb-0">
                                                {{$item->price}}
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
                        <div class="col fw-bolder">{{__('TOTAL')}}</div>
                        <div class="col text-end text-success h5">{{$order->order_total}}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


