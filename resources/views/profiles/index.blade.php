@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
                <img src="/storage/{{$user->profile->profileImage()}}" class="profile mx-auto d-block">
                {{-- <follow-button userid="{{$user->id}}" follow="{{$follows}}"></follow-button> --}}
            </div>
        <div class="col-md-9">
            <div class="text-capitalize">{{$user->name}}
                <div class="d-flex">
                    <button class="btn btn-primary"><a class="edit-profile" href="/profile/{{$user->id}}/edit">Edit Profile</a></button>
                    <follow-button userid="{{$user->id}}" follow="{{$follows}}" class="ml-2" id="follow"></follow-button>
                   
                    
                </div>
              
            </div>
            <div class="d-flex py-3">
                <div class="pr-3"><strong>{{$user->posts->count()}}</strong> Post</div>
                <div class="pr-3"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                <div class="pr-3"><strong>{{$user->following->count()}}</strong> following</div>
            </div>
                <div>{{$user->email}}</div>
                <a href="/posts/create">add New post</a>
        </div>
    </div>
    <div>
        <div class="row"> 
            @foreach ($user->posts as $post)
            <div class="col-md-4 pt-3">
              <img src="/storage/{{$post->image}}">
            </div>
            @endforeach
        </div>
    </div>
</div>



@endsection
