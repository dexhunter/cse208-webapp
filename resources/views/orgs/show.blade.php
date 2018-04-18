@extends('layouts.app')

@section('content')
    <a href="/acts" class="btn btn-info">Go Back</a>
    <h1>{{$act->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$act->cover_image}}">
    <br><br>
    <div>
        {!!$act->body!!}
    </div>
    <hr>
    <small>Written on {{$act->created_at}} by {{$act->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $act->user_id)
            <a href="/acts/{{$act->id}}/edit" class="btn btn-primary">Edit</a>

            {!!Form::open(['action' => ['ActsController@destroy', $act->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@stop