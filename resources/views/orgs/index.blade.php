@extends('layouts.app')

@section('content')
    <h1>Organisations</h1>
    @if(count($orgs) > 0)
        @foreach($orgs as $org)
            <div class="card card-body bg-light">
                <div class="row">
                    {{-- <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$org->cover_image}}">
                    </div> --}}
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/orgs/{{$org->id}}">{{$org->title}}</a></h3>
                    </div>
                </div>
            </div>
        @endforeach
        {{$orgs->links()}}
    @else
        <p>No organisation found</p>
    @endif

@stop