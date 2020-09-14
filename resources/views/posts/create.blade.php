@extends('layouts.app')

@section('content')
<div class="container">
<form action="/posts/{{Auth::user()->id}}/store" enctype="multipart/form-data" method="post">
    <div style="text-align: center; margin-bottom:20px;"><h1>Add New Post</h1></div>
    @csrf
    <div class="form-group row">
        <label for="caption" class="col-md-2 col-form-label text-md-right">{{ __('Image caption') }}</label>
        <div class="col-md-8">
            <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus>

            @error('caption')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
        <div class="form-group row">
            <label for="caption" class="col-md-2 col-form-label text-md-right">Choose File</label>
            <div class="col-md-8">
                <input id="image" type="file" class="form-control-file" name="image">
              
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="row">
                <div class="col-md-8 pt-3">
                <button class="btn btn-primary">Post</button>
                <button class="btn btn-primary"><a href="/profile" style="color:white;">&laquo Back to home</button>
            </div>
    </div>
   </form>
   
</div>

@endsection
