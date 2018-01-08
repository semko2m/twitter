<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Twitter</title>

    <!-- Fonts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::asset('assets/css/main.css')}}">


    <!-- Styles -->
</head>
<body class="">
@include('nav')
<div id="wrap">

    <div id="main" class="clearfix wrap clear-top">

        @yield('content')
    </div>
</div>

<div id="footer" class="footer">
    @include('footer')
</div>
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous">

</script>
<script src="{{ asset('js/app.js') }}"></script>

</html>
