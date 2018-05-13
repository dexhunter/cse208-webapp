@extends('layouts.app')

@section('content')
    <h1>Activities</h1>
    @if(count($acts) > 0)
        @foreach($acts as $act)
            <div class="card card-body bg-light">
                <div class="row">
                    {{-- <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$act->cover_image}}">
                    </div> --}}
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/acts/{{$act->id}}">{{$act->title}}</a></h3>
                        <p>
                            category: {{$act->category}} <br>
                            number of people: {{$act->num_ppl}} <br>
                            start time: {{$act->start_time}} <br>
                            end time: {{$act->end_time}} <br>
                            status: {{$act->status}} <br>
                            place: {{$act->place}} <br>
                        
                        </p>

                        <small>Written on {{$act->created_at}} by {{$act->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$acts->links()}}
    @else
        <p>No activities found</p>
    @endif

@stop