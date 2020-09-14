@extends('layouts.app')
@section('content')
<div class="container">
<table class="table">
    <thead>
    <tr>
        <th scope="col">Player ID</th>
        <th scope="col">Age</th>
        <th scope="col">3 points</th>
        <th scope="col">attempted</th>
      </tr>
    </thead>
    
    <tr>
@foreach ($players as $player)
{{$player->player_id}}
    
@endforeach