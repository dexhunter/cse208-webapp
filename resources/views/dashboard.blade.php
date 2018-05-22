@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="/acts/create" class="btn btn-primary">Create Activity</a>
                    <h3>The activity you published</h3>
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
                                    <td><a href="/acts/{{$act->id}}/edit" class="btn btn-default">Edit</a></td>
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
                        <p>You have no activites</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection