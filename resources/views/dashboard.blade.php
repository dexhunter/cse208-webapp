@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-8 offset-md-2 py-3 my-3">
            <div class="jumbotron text-center">
                <h1>Dashboard</h1>
            </div>
<div class="row">

    <div class="nav flex-column nav-pills col-md-3 py-5 my-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="published-acts-tab" data-toggle="pill" href="#published-acts" role="tab" aria-controls="published-acts" aria-selected="false">Published Activity</a>
            <a class="nav-link" id="joined-acts-tab" data-toggle="pill" href="#joined-acts" role="tab" aria-controls="joined-acts" aria-selected="false">Joined Activity</a>
            <a class="nav-link" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="false">Account Settings</a>
          </div>
          <div class="tab-content col-md-8 py-5 my-5" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

            <a href="/acts/create" class="btn btn-info btn-lg">Create Activity</a>


            </div>
            <div class="tab-pane fade" id="published-acts" role="tabpanel" aria-labelledby="published-acts-tab">

                    <h3>The activity you published</h3>
                    @if(count($activities) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($activities as $act)
                                @if(Auth::user() == $act->creator($act->creator_id))
                                <tr>
                                    <td>{{$act->title}}</td>
                                    <td><a href="/acts/{{$act->id}}/viewuser" class="btn btn-info">View</a></td>

                                    <td><a href="/acts/{{$act->id}}/edit" class="btn btn-warning">Edit</a></td>
                                    <td><a href="/acts/{{$act->id}}/destroy" class="btn btn-danger">Delete</a></td>


                                    {{-- <td>
                                    <form action=" {{ action('ActivityController@destroy', $act->id) }}" method="post">
                                        <input type="hidden" name="_method" value="Delete">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form> --}}
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </table>
                    @else
                        <p>You have not published any activites yet</p>
                    @endif


            </div>
            <div class="tab-pane fade" id="joined-acts" role="tabpanel" aria-labelledby="joined-acts-tab">
                
                    <h3>The activity you joined</h3>
                    @if(count($activities) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($activities as $act)
                                <tr>
                                    <td>{{$act->title}}</td>
                                    <td><a href="/acts/{{$act->id}}/viewuser" class="btn btn-info">View</a></td>
                                    <td></td>
                                    {{-- <td>{{$act->title}}</td>
                                    <td><a href="/acts/{{$act->id}}/edit" class="btn btn-warning">Edit</a></td>
                                    <td>

                                    <td><a href="/acts/{{$act->id}}/destroy" class="btn btn-danger">Delete</a></td> --}}


                                    {{-- <td><form action=" {{ action('ActivityController@destroy', $act->id) }}" method="post">
                                        <input type="hidden" name="_method" value="Delete">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                    </form></td> --}}

                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have not joined any activites yet</p>
                    @endif
            
            </div>
            <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">

                <a href="usr/{{$user->id}}/password" class="btn btn-lg btn-warning">Reset Password</a>
                <a href="usr/{{$user->id}}" class="btn btn-lg btn-warning">Reset Email</a>


            </div>
          </div>
</div>
          <hr>
        </div>
</div>
@endsection