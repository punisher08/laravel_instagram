@extends('layouts.app')

@section('content')
<div class="container">
   @foreach ($posts as $post)
   <div class="row">
    <div class="col-md-6">
        <img src="/storage/{{$post->image}}">
        {{-- {{$post->user->profile->title}} --}}
    </div>
    <div class="col-md-6" style="border:1px solid">
      <div class="row d-flex align-items-center">
        <img src="/storage/{{$post->user->profile->profileImage()}}" class="rounded-circle" style="max-width: 40px;">
        <div class="pl-3 font-weight-bold"> {{$post->user->email}}</div>
        <a href="#" class="pl-3">Follow</a>
      </div>
      <hr>
   <p><span class="font-weight-bold">{{$post->user->email}}: </span>{{$post->caption}}</p>
   <p>Posted at <strong>{{$post->created_at}}</strong></p>
  </div>
  </div>
  </div>
  </div>
       
   @endforeach
<div class="row col-md-12">
    {{$posts->links()}}
</div>
@endsection
