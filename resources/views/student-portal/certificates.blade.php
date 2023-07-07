@extends('layouts.student-portal')
@section('title',__('Certificates'))
@section('content')

    <div class=" row mb-2">
        <div class="col">
            <spna>
                <h5 class="fw-bolder">
                    {{__('Certificates')}} /<span class="text-secondary">
                          {{__('My Certificates')}}
                    </span>
                </h5>
                <p class="text-muted">{{__('All of my certificates.')}}</p>
            </spna>
        </div>
        <div class="col text-end">
        </div>
    </div>

    <div class="card shadow blur">
        <div class=" card-body table-responsive">
            <table class="table mb-0 " id="cloudonex_datatable">
                <thead class="bg-gray-100">
                <tr>
                    <th class="text-uppercase  text-xs font-weight-bolder">{{__('Name')}}</th>
                    <th class="text-uppercase  text-xs font-weight-bolder">{{__('Course')}}</th>
                    <th class="text-uppercase  text-xs font-weight-bolder ps-2">{{__('Date of Issue')}}</th>
                    <th class="text-uppercase  text-end text-xs font-weight-bolder  ps-2">{{__('Action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($certificates_received as $my_certificate)
                    <tr>
                        <td>
                            <h6 class=" mb-0 ">{{$certificates[$my_certificate->certificate_id]->title ?? ''}}</h6>
                        </td>
                        <td>
                            @if(!empty($courses[$my_certificate->course_id]))
                                <h6 class="ms-3">
                                    @if(isset($courses[$my_certificate->course_id]))
                                        {{$courses[$my_certificate->course_id]->name}}
                                    @endif
                                </h6>
                            @endif
                        </td>
                        <td>
                            <p class="text-success mb-0">

                                {{(\App\Supports\DateSupport::parse($my_certificate->created_at))->format(config('app.date_format'))}}
                            </p>
                        </td>

                        <td class="text-end">
                            <a  href="/student/view-certificate?id={{$my_certificate->id}}"  class="btn btn-icon btn-2 bg-info-light shadow-none " type="button">
                                <span class="btn-inner--icon text-info-light">

<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                </span>
                            </a>

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
