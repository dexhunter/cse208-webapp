<?php header('Access-Control-Allow-Origin: *'); ?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 py-3 my-3">
            <div class="jumbotron text-center">
                <h1>User Information</h1>
            </div>
        </div>

        @if($users->count() > 0)
            <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Phone Number</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->student_id}}</td>
                    <td>{{$user->phone_number}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
        @else
            <div class="jumbotron text-center">
                <h3>No User has joined the activity yet.</h3>
            </div>
        @endif
    </div>
</div>
@stop