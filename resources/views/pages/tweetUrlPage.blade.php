@extends('layout.basic')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => ['twiteer_search'], 'files'=> true, 'class' => 'form-horizontal']) !!}
                <div class="form-group {!! $errors->has('tweet') ? 'has-error' : ""!!}">
                    <label for="name" class="col-sm-2 control-label">Tweet : *</label>
                    <div class="col-sm-8">{!! Form::text('tweet', null, ['id' => 'tweet','class' => 'form-control', 'placeholder' => 'Tweet URL']) !!}</div>
                    {!! $errors ->first('tweet', '<span class="help-block">:message</span>')
                    !!}
                </div>
                <hr style="height: 1px; border: none; color: #e7e7e7; background-color: #e7e7e7;"/>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-8">{!! Form::submit('Search',['class' => 'btn btn-default']) !!}</div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop