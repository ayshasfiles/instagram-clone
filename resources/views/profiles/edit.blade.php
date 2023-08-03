@extends('layouts.app')

@section('content')
<div class="container col-7">
<form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
    @csrf
    @method ('PATCH')
  <div class="row">
   
            <div class="col-8 offset-2"> 
            <h1>Edit profile</h1>
            
                <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label ">{{ __('post description') }}</label>
                
                    <input id="description" 
                    type="text"
                     class="form-control @error('description') is-invalid @enderror" c
                     name="description" 
                     value="{{ old('description') ?? $user->profiles->description }}" 
                     required autocomplete="description" autofocus>

                    @error('description')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row mb-3">
                <label for="url" class="col-md-4 col-form-label ">{{ __('post url') }}</label>
                
                    <input id="url" 
                    type="text"
                     class="form-control @error('url') is-invalid @enderror" c
                     name="url" 
                     value="{{ old('url') ?? $user->profiles->url}}" 
                     required autocomplete="url" autofocus>

                    @error('url')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

               
               <div class="row d-flex">
                update profile picture
                <input type="file" class="form-control-file" id="profilePicture" name="profilePicture">
                @error('profile picture')
                        <strong>{{ $message }}</strong>
                @enderror
            </div>

            <div class="row pt-5">
            <div class="col-12 text-right pt-3">
                <button class="btn btn-primary">Update Profile</button>
            </div>
        </div>
    </div> </div>
  </form>
</div>

            
@endsection
