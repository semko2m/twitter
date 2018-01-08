@extends('layout.basic')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Sums amount of followers each user has retweeted entered tweet</div>
                    <div class="panel-body">{{$countFollowers}}</div>
                </div>
            </div>
        </div>
    </div>
@stop