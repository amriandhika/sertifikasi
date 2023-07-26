@extends('layouts.admin-portal')
@section('title',__('Certificates'))
@section('content')

    <div class=" row mb-2">
        <div class="col">
            <h5 class="  fw-bolder">
                {{__('Certificates')}} /<span class="text-secondary">
                           {{__('Certificate templates')}}
                    </span>
            </h5>
            <p class="text-muted">{{__('Create, edit or delete certificate templates.')}}</p>

        </div>
        <div class="col text-end">

            <a href="/create-certificate" type="button" class="btn btn-info text-white"><i class="fas fa-plus"></i> {{__('Create Certificate')}}</a>

        </div>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table  mb-0" id="cloudonex_datatable">
                <thead class="bg-gray-100">
                <tr>
                    <th class="text-uppercase  text-xs font-weight-bolder">{{__('Name')}}</th>


                    <th class="text-uppercase  text-xs font-weight-bolder">{{__('Course')}}</th>

                    <th class="text-uppercase  text-xs font-weight-bolder ps-2">{{__('Created at')}}</th>


                    <th class="text-uppercase text-center text-xs font-weight-bolder  ps-2">{{__('Action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($certificates as $certificate)
                    <tr>
                        <td>
                            <h6 class=" mb-0 ">{{$certificate->title}}</h6>
                        </td>

                        <td>
                            @if(!empty($courses[$certificate->course_id]))
                                <h6 class="text-sm">
                                    @if(isset($courses[$certificate->course_id]))
                                        {{$courses[$certificate->course_id]->name}}
                                    @endif
                                </h6>
                            @endif
                        </td>


                        <td>
                            <p class="text-sm mb-0 fw-bolder">

                                @if(!empty($certificate->created_at))
                                    {{(\App\Supports\DateSupport::parse($certificate->created_at))->format(config('app.date_format'))}}

                                @endif
                            </p>
                        </td>


                        <td>
                            <div class="text-center">
                                <div class="dropstart ">
                                    <a href="javascript:" class="text-secondary" id="dropdownMarketingCard"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3"
                                        aria-labelledby="dropdownMarketingCard">
                                        <li>

                                            <a class="dropdown-item border-radius-md fw-bolder"
                                               href="/create-certificate?id={{$certificate->id}}">{{__('Edit')}}</a>
                                        </li>


                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item border-radius-md text-danger fw-bolder"
                                               href="/delete/certificate-template/{{$certificate->id}}">{{__('Delete')}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>




@endsection

@section('script')

    <script>
        "use strict";
        $(document).ready(function () {
            $('#cloudonex_datatable').DataTable(
            );

        });
    </script>

@endsection
