@extends('layouts.admin-portal')
@section('content')

    <div class=" row mb-2">
        <div class="col">
            <spna>

                <h5 class="  fw-bolder">
                    {{__('Default Theme')}} /<span class="text-secondary">
                          {{__('Pages')}}
                    </span>
                </h5>
                <p class="text-muted">{{__('Select and edit the content of the landing page.')}}</p>

            </spna>



        </div>
        <div class="col text-end">
            <a href="/student/profile" type="button" class="btn btn-info text-white">{{__('My Profile')}}</a>
        </div>
    </div>


    <div class="card">
        <div class=" card-body table-responsive">
            <table class="table mb-0 " id="cloudonex_datatable">
                <thead class="bg-gray-100">
                <tr>
                    <th class="text-uppercase  text-xs font-weight-bolder">{{__('Name')}}</th>



                    <th class="text-uppercase  text-end text-xs font-weight-bolder  ps-2">{{__('Action')}}</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>
                            <h6 class=" mb-0 ">{{__('Landing Page')}}</h6>
                        </td>


                        <td class="text-end">
                            <a  href="/landingpage"  class="btn btn-icon btn-2 bg-info-light shadow-none " type="button">
                                <span class="btn-inner--icon text-info-light">

<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                </span>
                            </a>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h6 class=" mb-0 ">{{__('Footer')}}</h6>
                        </td>


                        <td class="text-end">
                            <a  href="/footer"  class="btn btn-icon btn-2 bg-info-light shadow-none " type="button">
                                <span class="btn-inner--icon text-info-light">

<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                </span>
                            </a>

                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection