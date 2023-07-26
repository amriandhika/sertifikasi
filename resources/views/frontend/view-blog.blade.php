@extends('frontend.layout')
@section('title',$blog->title)
@section('content')

<div class="row bg-dark-alt">
    <div class="col-md-6">
        <div class="card bg-dark-alt text-center mt-7">
            <div class="card-body text-center">
                <h1 class="mb- text-white mt-6">{{$blog->title}}</h1>

                <div class=" align-items-center mb-4 mt-4">
                    @if(!empty($users[$blog->admin_id]->photo))
                        <img alt="" class=" avatar rounded-circle shadow " src="{{PUBLIC_DIR}}/uploads/{{$users[$blog->admin_id]->photo}}">
                    @else
                        <div class="avatar mt-4 rounded-circle bg-purple-light  border-radius-md p-2">
                            <h6 class="text-purple mt-1">{{$users[$blog->admin_id]->first_name[0]}}{{$users[$blog->admin_id]->last_name[0]}}</h6>
                        </div>
                    @endif

                    <div class="name text-white fw-bolder mt-2 ps-2">
                        @if(!empty($users[$blog->admin_id]))
                            <span>{{$users[$blog->admin_id]->first_name}}{{$users[$blog->admin_id]->last_name}}</span>

                        @endif

                        <div class="stats text-white">
                            <small>{{$blog->updated_at->diffForHumans()}}</small>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="card card-blog card-plain">
            <div class="position-relative d-flex">
                <a class="d-block blur-shadow-image">
                    @if(!empty($blog->cover_photo))
                        <img src="{{PUBLIC_DIR}}/uploads/{{$blog->cover_photo}}" alt="img-blur-shadow" class=" w-100" >
                    @endif

                </a>
            </div>
        </div>
    </div>

</div>


<div class="col-lg-7 mx-auto text-start card card-body blur d-flex justify-content-center mt-lg-5  ">
        <p class="text-dark">
            {!! $blog->notes !!}
        </p>
</div>

@endsection