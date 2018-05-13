<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bulletin Board') }}</title>


    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        @include('inc.navbar')
        {{-- <div class="col-md-2 p-0 h-100 float-left"></div> --}}
        <div class="container">

            <div class="col-md-6 offset-md-3">
                @include('inc.messages')
                @yield('content')
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script> --}}
    {{-- <script> --}}
        {{-- CKEDITOR.replace( 'article-ckeditor' ); --}}
    {{-- </script> --}}
</body>
</html>
