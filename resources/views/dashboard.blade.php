@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Dashboard</h1></div>

                <br><br>


                <div class="panel-body">
                    <a href="/acts/create" class="btn btn-primary">Create Activity</a>
                    <h3>Your Published Activities</h3>
                    @if(count($acts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($acts as $act)
                                <tr>
                                    <td>{{$act->title}}</td>
                                    <td><a href="/acts/{{$act->id}}/edit" class="btn btn-default">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['ActsController@destroy', $act->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have not published any activities yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop