<!DOCTYPE html>
<html lang="es">
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon"/>
    <link rel="apple-icon" href="{{ asset('favicon/apple-icon.png') }}"/>
    <link rel="apple-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}"/>
    <link rel="apple-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}"/>
    <link rel="apple-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}"/>
    <link rel="apple-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}"/>
    <link rel="apple-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}"/>
    <link rel="apple-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}"/>
    <link rel="apple-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}"/>
    <link rel="apple-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}"/>
    @yield('css')

    <title>Eivissa Decoracio - @yield('title')</title>
</head>

<body>
    <div class="content">
        {{-- Content Section --}}
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>
    @yield('js')
</body>
</html>
