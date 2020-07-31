<link href="cssplus/styleplus.css" rel="stylesheet" type="text/css">

@extends('layouts.app')

@section('content')
<div class="container" style="margin-left:20%; margin-right:20%;">
  <div>
    <form action="/p" enctype="multipart/form-data" method="post">
      @csrf
    <div class="row" style="margin-bottom: 2rem; margin-top: 2rem;">

                  <div class="col-md-10">
                    <h2 style="text-align: center;"> Add a New Post Here  </h2>
                  </div>
                </div>
                <div class="row">
                    <div class="col-5 offset-1">

                      <div class="form-group row">
                          <label for="caption" class="col-md-4 col-form-label"> Post Caption </label>

                              <input id="caption"

                              type="text"
                              class="form-control @error('caption') is-invalid @enderror"

                              name="caption"
                              value="{{ old('caption') }}"
                              autocomplete="caption" autofocus>

                              @error('caption')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                      </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-8" style="margin-left:5rem;">
                        <label for="image" class="col-md-4 col-form-label"> Post Image </label>

                        <input type="file", class="form-control-file" id="image" name="image">

                        @error('image')
                                <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="row" style="margin-left:5rem; margin-top:3rem;">
                    <button class="btn btn-primary"> Post this file </button>
                </div>
              </form>
</div>
@endsection
