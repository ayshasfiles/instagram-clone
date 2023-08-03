@extends('layouts.app')

@section('content')


<div class="container">
    <div class="col-7 d-flex">
        <img src="/storage/{{$post->image}}" class="w-100">
        <div class="ps-4 align-items-center col-5">
            <div class="row  ">
                <div class="col-6" ><img src="/storage/{{$post->user->profiles->profilePicture}}" class="w-100 rounded-circle"></div>  
                <div class="col-6"><h3><b><a href="/profile/{{$post->user->id}}" style="color: black; text-decoration: none;">{{$post->user->username}}</a></h3></b></div> 
            </div>
            <hr>
            <div class="d-flex">
                <b><a href="/profile/{{$post->user->id}}" style="color: black; text-decoration: none;">{{$post->user->username}}</a></b>
                <div class="ps-2"> {{$post->caption}} </div>
            </div>
        </div>
        
    </div>
    
</div>


</div>
            
@endsection
