<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GLUEAPP') }}</title>

    <link rel="stylesheet" type="text/css" href="/assets/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/slick/slick-theme.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
        @include('inc.navbar')

        @include('inc.messages')
        @yield('content')

        @include('inc.footer')


</body>
</html>
