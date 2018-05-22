@extends('layouts.app')

@section('content')
<div class="container py-3">

    <div class="jumbotron text-center">
        <h1>Activities</h1>
        @if($title != null)
            Current Category:
            @if($title == 0)
                <h3>Lecture</h3>
            @elseif($title == 1)
                <h3>Charity</h3>
            @elseif($title == 2)
                <h3>Career</h3>
            @elseif($title == 3)
                <h3>Outdoors</h3>
            @elseif($title == 4)
                <h3>Competition</h3>
            @elseif($title == 5)
                <h3>Exhibition</h3>
            @else
                <h3>Other</h3>
            @endif
        @endif
    </div>

    @if(count($activities) > 0)
        @foreach($activities as $act)
            <div class="card mb-5">
                <div class="row">
                    <div class="col-md-4 py-3 px-3">
                        <img class="image-fluid" style="width:400px; height:300px;" src="/storage/cover_images/{{$act->cover_image}}">
                    </div>
                    <div class="col-md-8 px-5">
                        <div class="card-block px-5 py-4">
                            <h3 class="card-title">{{$act->title}}</h3>
                        <p class="card-text">Activity Time:  {{$act->start_time}}  --- {{$act->end_time}}</p>
                        <p class="card-text">Activity Location:  {{$act->location}}</p>
                        <p class="card-text">Number of People: {{$act->users->count()}} / {{$act->num_ppl}}</p>
                        <p class="card-text">Publisher: {{$act->creator($act->creator_id)->name}}</p>
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