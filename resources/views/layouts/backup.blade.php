<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>{{ config('app.name', 'Bulletin Board') }}</title>
    </head>

    <body>


        @include('inc.navbar')
        {{-- <div class="col-md-2 p-0 h-100 float-left"></div> --}}
        <div class="container">

            <div class="col-md-6 offset-md-3">
                @include('inc.messages')
                @yield('content')
            </div>
        </div>



        {{-- <script></script> --}}
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
    </body>
</html>