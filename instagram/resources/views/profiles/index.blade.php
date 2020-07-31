<link href="cssplus/styleplus.css" rel="stylesheet" type="text/css">

@extends('layouts.app')

@section('content')
<div class="container" style="margin-left:20%; margin-right:20%;">
    <div class="row">
        <div class="col-3" style="padding-top:3px; padding-left:55px;">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle" height="150px" style="border: 0.5px solid #D3D3D3">
        </div>
        <div class="col-6" >
            <div class='d-flex  align-items-baseline justify-content-between'>
              <h2 style="padding-bottom:1rem;"> {{$user->username}}</h2>

              <follow-button user-id="{{$user->id}}" follows={{$follows}}></follow-button>

              @can('update', $user->profile)
              <a href="/profile/{{ $user->id }}/edit"> Edit Profile </a>
              @endcan

              @can('update', $user->profile)
              <a href="/p/create"> Add new posts </a>
              @endcan


            </div>
        <div class="d-flex">
            <div style="padding-right: 3rem; padding-bottom:1rem;"> <strong> {{$user->posts->count()}} </strong> posts</div>
            <div style="padding-right: 3rem;"> <strong>{{$user->profile->followers->count()}}</strong> followers </div>
            <div style="padding-right: 3rem;"> <strong>{{$user->following->count()}}</strong> following </div>
        </div>
        <div> {{$user->profile->title}} </div>
        <div> {{$user->profile->description}} </div>
        <div> <a href="{{$user->profile->url}}">{{$user->profile->url}} </a> </div>
        </div>
    </div>
    <div class="row" style="padding-top:7rem; margin-right:17%; margin-left:-4%">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
              <img src="/storage/{{ $post->image }}" style="">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
