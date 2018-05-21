@extends('layouts.app')

@section('content')
<div class="container py-3">

    <div class="jumbotron">
        <h1>Activities</h1>
    </div>

    @if(count($activities) > 0)
        @foreach($activities as $act)
            <div class="card mb-5">
                <div class="row">
                    <div class="col-md-4">
                        <img style="width:400px; height:300px;" src="/cover_images/{{$act->cover_image}}">
                    </div>
                    <div class="col-md-6 px-5">
                        <div class="card-block px-5 py-4">
                            <h3 class="card-title">{{$act->title}}</h3>
                        <p class="card-text">Activity Location:  {{$act->location}}</p>
                        <p class="card-text">Activity Start Time:  {{$act->start_time}}</p>
                        <p class="card-text">Activity End Time:  {{$act->end_time}}</p>
                            <p class="card-text">Views: {{$act->getPageViews()}}  </p>
                            <hr>
                            <a href="/acts/{{$act->id}}" class="btn btn-danger">Read More </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{$activities->links()}}
    @else
        <p>No activities found</p>
    @endif


</div>
@endsection