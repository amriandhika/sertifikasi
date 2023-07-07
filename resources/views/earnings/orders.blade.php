@extends('layouts.admin-portal')
@section('title',__('Orders'))

@section('content')
    <div class="row mb-2">
        <div class="col">
            <span>

                <h5 class="fw-bolder">
                    {{__('Earnings')}} /<span class="text-secondary">
                      {{__('Orders')}}
                    </span>
                </h5>
                <p class="text-muted">{{__('All of the orders')}}</p>

            </span>

        </div>
        <div class="col text-end">

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body ">
                    <div class="table-responsive  p-0">
                        <table class="table align-items-center mb-0" id="data_table">
                            <thead class="bg-gray-100">
                            <tr>
                                <th class="text-uppercase  text-xs">{{__('#')}}</th>
                                <th class="text-uppercase  text-xs">{{__('Student')}}</th>
                                <th class="text-uppercase  text-xs  ps-2">{{__('Amount')}}</th>
                                <th class="text-uppercase  text-xs  ps-2">{{__('Date')}}</th>

                                <th class=""></th>
                            </tr>

                            </thead>

                            <tbody>
                            @foreach($orders as $order)

                                <tr>
                                    <td>
                                        <p class="mb-0">{{$order->id}}</p>
                                    </td>
                                    <td>
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
                                    </td>

                                    <td class="align-middle text-start">
                                        <span class="">
                                        {{$order->order_total}}
                                        </span>
                                    </td>
                                    <td class="align-middle text-start">
                                        <span class="">
                                             {{(\App\Supports\DateSupport::parse($order->created_at))->format(config('app.date_format'))}}

                                        </span>
                                    </td>
                                    <td class="align-middle text-right">
                                        <a class=" btn btn-info"
                                           href="/order-details?id={{$order->id}}">{{__('View Order')}}</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $(document).ready(function () {
            "use strict";
            $('#data_table').DataTable(
            );

        });
    </script>

@endsection

