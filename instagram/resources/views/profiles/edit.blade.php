<link href="cssplus/styleplus.css" rel="stylesheet" type="text/css">

@extends('layouts.app')

@section('content')
<div class="container" style="margin-left:20%; margin-right:20%;">
  <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')
    <div class="row" style="margin-bottom: 2rem; margin-top: 2rem;">
      <div class="col-md-10">
        <h2 style="text-align: center;"> Edit Profile  </h2>
      </div>
    </div>
    <div class="row">
        <div class="col-8 offset-1">

          <div class="form-group row">
              <label for="title" class="col-md-4 col-form-label"> Title </label>

                  <input id="title"

                  type="text"
                  class="form-control @error('title') is-invalid @enderror"

                  name="title"
                  value="{{ old('title') ?? $user->profile->title }}"
                  autocomplete="title" autofocus>

                  @error('title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>

          <div class="form-group row">
              <label for="description" class="col-md-4 col-form-label"> Description </label>

                  <input id="description"

                  type="text"
                  class="form-control @error('description') is-invalid @enderror"

                  name="description"
                  value="{{ old('description') ?? $user->profile->description }}"
                  autocomplete="description" autofocus>

                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>

          <div class="form-group row">
              <label for="url" class="col-md-4 col-form-label"> Url </label>

                  <input id="url"

                  type="text"
                  class="form-control @error('url') is-invalid @enderror"

                  name="url"
                  value="{{ old('url') ?? $user->profile->url }}"
                  autocomplete="url" autofocus>

                  @error('url')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>

        </div>
    </div>
    <div class="row">
        <div class="col-8" style="margin-left:5rem;">
            <label for="image" class="col-md-4 col-form-label"> Profile Image </label>

            <input type="file", class="form-control-file" id="image" name="image">

            @error('image')
                    <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>
    <div class="row" style="margin-left:5rem; margin-top:3rem;">
        <button class="btn btn-primary"> Save Edit </button>
    </div>
  </form>
</div>
@endsection
