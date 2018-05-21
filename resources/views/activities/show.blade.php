@extends('layouts.app')

@section('content')

    <div style="display: none;">
        {{$act->addPageView()}}
    </div>
    <a href="/acts" class="btn btn-default">Go Back</a>
    <h1>{{$act->title}}</h1>
    <img style="width:400px;" src="/cover_images/{{$act->cover_image}}">
    <br><br>
    <div>
        {!!$act->body!!}
    </div>
    <hr>
    <small>Written on {{$act->created_at}} by {{$act->creator($act->creator_id)->name}}</small>
    <hr>

    <h3>Joined User: </h3>
    <ul class="list-group">
    @foreach($act->users as $participant)
    <li class="list-group-item"> {{$participant->name}} </li>
    @endforeach
    </ul>
    
    <div class="row">
        <div class="col-md-2"></div>
        @if(!Auth::guest())
            @if(Auth::user()->id == $act->creator_id)
                <div class="col-md-1">
                <a href="/acts/{{$act->id}}/edit" class="btn btn-primary">Edit</a>
                </div>
                <div class="col-md-1">
                <form action=" {{action('ActivityController@destroy', $act->id)}} " method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-danger">
            </form>
                </div>
            @endif
        @endif

        @if(!Auth::guest())
            <div class="col-md-1">
                <form action="{{action('UserController@joinAct', $act->id)}}" method="post">
                    @csrf
                    {{-- <input type="hidden" name="_method" value="Join"> --}}
                    <input type="submit" value="Join Activity" class="btn btn-info">
                </form>
            </div>
        @endif
    </div>
@endsection