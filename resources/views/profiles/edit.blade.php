@extends('layouts.app')

{{-- < ?php dd($user->posts);?> --}}
@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}/update" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        <h1 class="text-center">Edit Profile</h1>
            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('title') }}</label>
                <div class="col-md-8">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title}}"  autocomplete="title" autofocus>
        
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('description') }}</label>
                <div class="col-md-8">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description}}"  autocomplete="description" autofocus>
        
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="url" class="col-md-2 col-form-label text-md-right">{{ __('url') }}</label>
                <div class="col-md-8">
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url}}"  autocomplete="url" autofocus>
        
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-md-2 col-form-label text-md-right">Profile Image</label>
                <div class="col-md-8">
                    <input id="image" type="file" class="form-control-file" name="image">
                  
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 col-form-label text-md-right">
                    {{-- code --}}
                </div>
                    <div class="col-md-8">
                        <button class="btn btn-primary">Save Profile</button>
                        <button class="btn btn-primary"><a href="/profile" style="color:white;">&laquo Back to home</button>
                    </div>
            </div>
            
        </form>  
    </div>
    
@endsection
