@extends('layouts.app')

@section('content')


<div class="container">
 @foreach($posts as $post)
 <div class="col-6 d-flex offset-3">
    <img src="/storage/{{$post->image}}" class="w-100">
    <div class="ps-4 align-items-center col-5">
        <div class="row  ">

        </div>

    </div>
</div>
<div class="col-6 d-flex offset-3">
    <div><b><a href="/profile/{{$post->user->id}}" style="color: black; text-decoration: none;">{{$post->user->username}}</a></b></div>
    <div class="ps-3"> {{$post->caption}} </div>
    <br><br>
</div>

@endforeach


<div class="row">

    <div class="col-12 d-flex justify-content-center">
      {{$posts->links(('pagination\default'))}}
    </div>
</div>
</div>



</div>

@endsection
