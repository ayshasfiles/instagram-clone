@extends('layouts.app')

@section('content')
<div class="container">
  <form action="/p" enctype="multipart/form-data" method="post">
    @csrf
  <div class="row">

            <div class="col-8 offset-2">
            <h1>Add a post to you profile</h1>
            <div class="row mb-3">
                <label for="caption" class="col-md-4 col-form-label ">{{ __('post caption') }}</label>

                    <input id="caption"
                    type="text"
                     class="form-control @error('caption') is-invalid @enderror" c
                     name="caption"
                     value="{{ old('caption') }}"
                     required autocomplete="caption" autofocus>

                    @error('caption')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>


            <div class="row">
                select image
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')
                        <strong>{{ $message }}</strong>
                @enderror
            </div>

            <div class="row">
            <div class="col-12 text-right pt-3">
                <button class="btn btn-primary">Create Post</button>
            </div>
        </div>

    </div> </div>
  </form>
</div>

@endsection
