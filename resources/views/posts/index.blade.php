@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="col-md-4 pt-5" style="float:right;">
      <div class="d-flex  sticky-top">
          <img style="max-width: 70px;"src="/storage/{{$user->profile->image}}" class="rounded-circle" style="max-width: 40px;">
          <div class="ml-3" style="line-height: 0; padding-top:30px;">
            <p><strong>{{$user->name}}</strong></p>
            <p>{{$user->email}}</p>
          </div>
      </div>
      <div class="pt-3 d-flex justify-content-between">
          <p class="text-black-50">Suggested for you</p>
          <p>See All</p>
      </div>
            @foreach ($allusers as $user1)
            <div class="d-flex justify-content-between">
            <img src="/storage/{{$user1->profile->profileImage()}}" class="rounded-circle" style="max-width: 40px;">
            <p>{{$user1->name}}</p>
            <p><a href="">Follow</a></p>
            {{-- <follow-button userid="{{$user->id}}" follow="{{$follows}}" class="ml-2" id="follow"></follow-button> --}}
            
          </div>
    
            @endforeach
           
    </div>
            {{-- end sidebar --}}

        <div class="col-md-7 ml-5" style="float: left;">
          @foreach ($posts as $post)
          <div class="card mt-4">
              <div class="card-header d-flex align-items-center">
                <img src="/storage/{{$post->user->profile->profileImage()}}" class="rounded-circle" style="max-width: 40px;">
                <div class="d-flex justify-content-between">
                    <div class="pl-3 font-weight-bold"> {{$post->user->email}}</div>
                    {{-- <follow-button userid="{{$user->id}}" follow="{{$follows}}"></follow-button> --}}
                </div>
              </div>
            <div class="card-body">
              <img style="width:100%;"src="/storage/{{$post->image}}">
              <hr>
              <p><span class="font-weight-bold">{{$post->user->email}}: </span></p>
              <p>{{$post->caption}}</p>
              <p style="float:right">Posted at <strong>{{$post->created_at}}</strong></p>
          </div>
              <div class="input-group mb-3">
                  <input style="border:none;"type="text" class="form-control" placeholder="write a comment....." aria-label="Recipient's username" aria-describedby="button-addon2">
                  <div class="input-group-append">
                  <button style="border:none;"class="btn btn-link" type="button" id="button-addon2">Post</button>
                </div>
              </div>
          </div>
          @endforeach
          {{$posts->links()}}
        </div>
        
  </div>

@endsection
