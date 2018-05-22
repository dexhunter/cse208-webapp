@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8 offset-md-2 py-3 my-3">
            <div class="jumbotron text-center">
                <h1>Dashboard</h1>
            </div>
<div class="row">

    <div class="nav flex-column nav-pills col-md-3 py-5 my-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Published Activity</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Joined Activity</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">User Settings</a>
          </div>
          <div class="tab-content col-md-8 py-5 my-5" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

            <a href="/acts/create" class="btn btn-primary btn-block">Create Activity</a>


            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

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
                                    <td><a href="/acts/{{$act->id}}/view" class="btn btn-info">View</a></td>

                                    <td><a href="/acts/{{$act->id}}/edit" class="btn btn-warning">Edit</a></td>

                                    <td>
                                    <form action=" {{action('ActivityController@destroy', $act->id)}}" method="post">
                                        <input type="hidden" name="_method" value="PATCH">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    
                                    </form>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </table>
                    @else
                        <p>You have not published any activites yet</p>
                    @endif


            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                
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
                                    <td><a href="/acts/{{$act->id}}/edit" class="btn btn-warning">Edit</a></td>
                                    <td>

                                    <form action=" {{action('ActivityController@destroy', $act->id)}}" method="post">
                                        <input type="hidden" name="_method" value="PATCH">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have not joined any activites yet</p>
                    @endif
            
            </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                <a href="usr/{{$user->id}}" class="btn btn-lg btn-primary"></a>


            </div>
          </div>
</div>
          <hr>
        </div>
    </div>
</div>
@endsection