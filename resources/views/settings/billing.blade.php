@extends('layouts.student-portal')
@section('title',__('Billing'))
@section('content')
    <div class="row mb-2">
        <div class="col">
           <h5> {{__('Orders')}} /<span class="text-secondary">
               {{__('My Orders')}}</h5>

            <p class="text-muted">{{__('All of your orders')}}</p>
        </div>
        <div class="col text-end">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow">
                <div class="card-body ">
                    <div class="table-responsive  p-0">
                        <table class="table align-items-center mb-0" id="data_table">
                            <thead class="bg-gray-100">
                            <tr>
                                <th class="text-uppercase  text-xs">{{__('Order No')}}</th>
                                <th class="text-uppercase  text-xs  ps-2">{{__('Total')}}</th>
                                <th class=""></th>
                            </tr>

                            </thead>

                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <p class="mb-0">{{$order->id}}</p>
                                    </td>

                                    <td class="align-middle text-start">
                                        <span class="">
                                        {{$order->order_total}}
                                        </span>
                                    </td>
                                    <td class="align-middle text-right">
                                        <a class=" btn btn-info"
                                           href="/view-order?id={{$order->id}}">{{__('View Order')}}</a>
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
        "use strict";
        $(document).ready(function () {
            $('#data_table').DataTable(
            );

        });
    </script>

@endsection

