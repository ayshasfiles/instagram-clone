@extends('layouts.app')

@section('content')
<div class="container col-7">
   <div class="d-flex">,
        <div class="col-3 rounded-circle bg-secondary" style="width: 100px; height: 100px; overflow: hidden;">
            <img src="{{$user->profiles->profilePicture()}}" class="img-fluid ">
        </div>

        <div class="col-8 ps-5">
            <div class="d-flex justify-content-between" >

            <div class="d-flex">
            <h1 class="pe-3"> {{$user->username}} </h1>

            @cannot('update',$user->profiles)
            <div id="app"><follow-button user-id="{{$user->id}}" follows="{{$user->profiles->follows}}"></follow-button> </div>
            @endcannot

            </div>

            <div>
                @can('update',$user->profiles)
                <a href="/p/create">add new post </a></div>
                @endcan
            </div>

            <div class="d-flex">
            <div class="pe-2"><strong>{{$postCount}} </strong> posts</div>
            <div class="pe-2"><strong>{{$followersCount}}</strong> followers</div>
            <div class="pe-4"><strong>{{$followingCount}}</strong> following</div>

            <div class="ps-5">

            @can('update',$user->profiles)
             <a href="/profile/{{$user->id}}/edit">edit profile </a>
            @endcan
            </div>

            </div>

            <div class="pt-1">
                {{$user->profiles->description}}
            </div>

            <div >
                <a href="">{{$user->profiles->url}}</a>
            </div>

        </div>

    </div>

    <div class="row pt-4" >

    @if ($user && $user->posts->count() > 0)
    @foreach ($user->posts as $post)
        <div class="col-4">
            <a href="/p/{{$post->id}}">
                  <img src="/storage/{{ $post->image }}" class="w-100">
              </a>
            <h6>{{$post->caption}}</h6>
         </div>
    @endforeach
    @else
        <p>No posts available.</p>
    @endif
    </div>



</div>



@endsection
