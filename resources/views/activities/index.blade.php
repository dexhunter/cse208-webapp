@extends('layouts.app')

@section('content')
    <h1>Activities</h1>
    @if(count($activities) > 0)
        @foreach($activities as $act)
            <div class="card bg-faded">
                <div class="row">
                    <div class="col-md-4 col-sm-4 card-block">
                        <img style="width:400px;" src="/cover_images/{{$act->cover_image}}">
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h3><a href="/acts/{{$act->id}}">{{$act->title}}</a></h3>
                        <p>Views: {{$act->getPageViews()}}  </p>
                        <small>Written on {{$act->created_at}} by {{$act->creator($act->creator_id)->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$activities->links()}}
    @else
        <p>No activities found</p>
    @endif
@endsection