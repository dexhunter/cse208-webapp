@extends('layouts.app')

@section('content')
    <h1>Create Activity</h1>
    {!! Form::open(['action' => 'ActsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-row">
            <div class="form-group md-4">
                {{Form::label('category', 'Category')}}
                {{Form::select('category', ['lecture', 'charity', 'job', 'outdoors', 'competition', 'recruiting', 'exhibition', 'other'], null, ['placeholder' => 'Choose a category...'])}}
            </div>
            <div class="form-group md-4">
                {{Form::label('place', 'Place')}}
                {{Form::text('Place', '', ['class' => 'form-control', 'placeholder' => 'Place'])}}
            </div>
            <div class="form-group md-4">
                {{Form::label('num_ppl', 'Number of People')}}
                {{Form::number('num_ppl', '', ['class' => 'form-control', 'placeholder' => 'num_ppl'])}}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group md-6">
                {{Form::label('start_time', 'Start Time')}}
                {{Form::date('start_time', new \DateTime(), ['class' => 'form-control'])}}
            </div>
            <div class="form-group md-6">
                {{Form::label('end_time', 'End Time')}}
                {{Form::date('end_time', new \DateTime(), ['class' => 'form-control'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@stop