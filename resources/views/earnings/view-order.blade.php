@extends('layouts.admin-portal')
@section('title',__('Order Details'))
@section('content')
    <div class="col-md-8 mx-auto py-4 ">
        <div class="card">
            <div class="card-body">
            <!-- CONTENT -->
                <div class="mb-6">
                    <h4>{{__('Order Details')}}</h4>
                </div>
                <div>
                    <div class="d-flex">
                        <div>
                            @if(empty($students[$order->student_id]->photo))
                                <div class="avatar avatar-md rounded-circle bg-info-light border-radius-md p-2 ">
                                    <h6 class="text-info-light text-uppercase mt-1">{{$students[$order->student_id]->first_name['0']}}{{$students[$order->student_id]->last_name['0']}}

                                    </h6>

                                </div>
                            @else

                                <img src="{{PUBLIC_DIR}}/uploads/{{$students[$order->student_id]->photo}}"
                                     class="avatar avatar-md rounded-circle  shadow-sm">
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-center ms-3">
                            <a href="/student-about?id={{$students[$order->student_id]->id}}">
                                <h6 class="mb-0">{{$students[$order->student_id]->first_name}} {{$students[$order->student_id]->last_name}}</h6>
                            </a>

                            <p class=" text-sm text-muted mb-0">{{$students[$order->student_id]->email}}</p>
                        </div>
                    </div>


                    <div class=" row mb-3 mt-5">
                        <div class="col text-start"><strong>{{__('Order no')}}: </strong> {{$order->id}}</div>
                        <div class="col text-end"><strong>{{__('Date')}}: </strong>{{(\App\Supports\DateSupport::parse($order->created_at))->format(config('app.date_format'))}}</div>

                    </div>

                    <!-- -->

                    <!-- PRODUCT TABLE -->

                    <div class="table-responsive border-0">
                        <table class="w-100 table align-items-center">

                            <thead class="bg-light">

                            <tr>
                                <th>{{__('Item')}}</th>

                                <th class="text-end">{{__('Price')}}</th>

                            </tr>
                            </thead>
                            <tbody class="border-0">
                            <!-- Table item -->

                            @if(!empty($order))

                                @foreach($order_items  as $item)
                                    <tr>
                                        <!-- Course item -->
                                        <td class=" border-bottom-0">
                                            <h6 class=" ">
                                                {{$item->item_name}}
                                            </h6>
                                        </td>

                                        <!-- Amount item -->
                                        <td  class="text-end border-bottom-0">
                                            <h6 class="text-info mb-0">
                                                {{$item->price}}
                                            </h6>
                                        </td>
                                        <!-- Action item -->
                                    </tr>
                                @endforeach

                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- ORDER TOTAL -->
                    <div class="row">
                        <div class="col fw-bolder">{{__('Total Amount')}}</div>
                        <div class="col text-end text-success h5">{{$order->order_total}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


