@extends('layouts.admin-portal')
@section('title',__('Documents'))
@section('content')
    <div class=" row mb-2">
        <div class="col">
            <h5 class="  fw-bolder">
                {{__('Productivity')}} /<span class="text-secondary">
                          {{__('Documents')}}
                    </span>
            </h5>
            <p class="text-muted">{{__('Upload documents')}}</p>


        </div>
        <div class="col text-end">

        </div>
    </div>
    <div class="col-md-10 mx-auto">
        <form action="/document" class="form-control dropzone" id="dropzone">
            <div class="fallback">
                <input name="file" type="file" multiple/>
            </div>
        </form>
    </div>

    <div class="col-md-10 mx-auto">

        <div class="row mt-4">
            <h6 class="mb-3">{{__('Uploaded Documents')}}</h6>

            @if(!count($documents))
                <p>{{__('No data to display.')}}</p>
            @else

                @foreach($documents as $document)

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">


                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file text-secondary"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                <p class="mb-3 ms-2 mt-2 text-sm">{{$document->name}}</p>
                                <div class="">
                                    <a href="/download/{{$document->id}}" class="btn btn-sm shadow-none bg-info-light btn-info px-3 mb-0 "><i class="fas text-info-light  fa-download text-sm me-1"></i>
                                    </a>
                                    <a class="btn btn-sm bg-pink-light shadow-none px-3 mb-0"
                                       href="/delete/document/{{$document->id}}"><i class="far fa-trash-alt me-1 text-danger text-sm"></i>
                                    </a>
                                </div>

                            </div>


                        </div>
                    </div>
                @endforeach

            @endif



        </div>
    </div>



 @endsection

        @section('script')
            <script>

                Dropzone.autoDiscover = false;
                Dropzone.options.dropzone = {
                    acceptedFiles: "image/*,application/pdf",
                };

                $(function () {
                    "use strict"

                    $("#dropzone").dropzone({
                        url: "/document",
                        success: function (file, response) {
                            location.reload();

                        },
                        error: function (file, response) {
                            file.previewElement.classList.add("dz-error");
                        },
                        sending: function (file, xhr, formData) {
                            formData.append('_token', '{{csrf_token()}}');
                        }
                    });
                })
            </script>
@endsection


