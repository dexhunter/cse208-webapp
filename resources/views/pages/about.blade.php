@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <br><br><br><br>
    <h5>Made by {{$group}}</h5>
    <br><br>
    @if(count($members) > 0)
        <ul class="list-group">
            @foreach($members as $member)
                <li class="list-group-item">{{$member}}</li>
            @endforeach
        </ul>
    @endif
@stop