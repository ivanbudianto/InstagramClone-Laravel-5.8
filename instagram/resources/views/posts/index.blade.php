<link href="cssplus/styleplus.css" rel="stylesheet" type="text/css">

@extends('layouts.app')

@section('content')
<div class="container" style="margin-left:20%; margin-right:20%;">
    @foreach($posts as $post)
    <div class="row">
        <div class="col-4">
            <img src="/storage/{{ $post->image}}" class="w-100">
        </div>
        <div class="col-8">
            <div>
              <div class="d-flex align-items-center">

                  <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle" height="75px" style="border: 0.5px solid #D3D3D3;" >
                  <h3 class="pl-3">
                    <a href="/profile/{{$post->user->id}}">
                      <span class="text-dark">
                        {{ $post->user->username }}
                      </span>
                    </a>
                  </h3>
              </div>
              <p> {{ $post->caption}} </p>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row">
      <div>
        {{$posts->links()}}
      </div>
  </div>
</div>
@endsection
