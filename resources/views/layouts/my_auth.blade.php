<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} [@yield('page_header')]</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style type="text/css">
        .is-complete {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    <div id="app">

        <main class="container py-4">
            <h1>@yield('page_header')</h1>
            @if (session('message'))
                <div class="alert alert-primary" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>


</body>
</html>
