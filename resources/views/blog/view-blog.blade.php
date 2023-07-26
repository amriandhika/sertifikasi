@extends('layouts.admin-portal')
@section('title',$blog->title)
@section('content')
    <div class="row">
        <h5 class=" col fw-bolder">
            {{$blog->topic}}
        </h5>
        <div class="col text-end mb-3">
            <a href="/write-blog?id={{$blog->id}}" class="btn btn-info btn-sm mb-0">{{__('Edit')}}</a>
            <a href="/delete/blog/{{$blog->id}}" class="btn btn-warning btn-sm mb-0">{{__('Delete')}}</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 ms-auto  mt-3 ">
                    <h2 class="mt-6 ms-3">{{$blog->title}}</h2>
                    @if(!empty($users[$blog->admin_id]->photo))
                        <a href="javascript:" class="ms-3 mt-4 avatar rounded-circle border border-secondary">
                            <img alt="" class="p-1" src="{{PUBLIC_DIR}}/uploads/{{$users[$blog->admin_id]->photo}}">
                        </a>
                    @else
                        <div class="avatar ms-3   mt-4 rounded-circle bg-info-light  border-radius-md p-2">
                            <h6 class="text-info mt-1">{{$users[$blog->admin_id]->first_name[0]}}{{$users[$blog->admin_id]->last_name[0]}}</h6>
                        </div>
                    @endif
                    <a href="/profile" class=" ms-3 nav-link text-body font-weight-bold px-0">
                        <span class="d-sm-inline d-none "> @if(isset($users[$blog->admin_id]))
                                {{$users[$blog->admin_id]->first_name}}  {{$users[$blog->admin_id]->last_name}}
                            @endif
                        </span>
                    </a>
                    <p class="ms-3">
                        {{(\App\Supports\DateSupport::parse($blog->created_at))->format(config('app.date_format'))}}

                    </p>
                </div>
                <div class="col-md-6">
                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <a href="javascript:" class="d-block">
                            @if(!empty($blog->cover_photo))
                                <img src="{{PUBLIC_DIR}}/uploads/{{$blog->cover_photo}}" class="img-fluid border-radius-lg">

                            @endif



                        </a>
                    </div>

                </div>
            </div>

        </div>

        <div class="card-body pt-2">
            <div class="mb-4">
                {!! clean($blog->notes) !!}
            </div>
        </div>
    </div>
@endsection
