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
    <h1>Try out the following query strings</h1>
    <textarea>
        ?name=Richard
        ?name=<script>alert('hello');</script>
    </textarea>

<!--

    laravel6.test/?name=<script>alert('hello');</script>;
    allows user to execute any script in the browser
    <h1><?=$name;?></h1>

-->

<!--
    instead let's escape it first
    <h1><?=htmlspecialchars($name, ENT_QUOTES)?></h1>

    rather than echoing values
-->

<!-- instead we can just surround our variable with curly braces
        and will automatically compile down and escape the variable within the curly braces
        storage/framework/views/hash_view.php is the compiled file that is actually sent to the browser
-->
    <h1>{{$name}}</h1>
    <!-- there is 2 variants here
            in this case we are escaping the $name variable
            however we can also do {{!! $name !!}} which will not escape the data
            user can run scripts from url
            for example: if you are fetching html from the database

     -->
    <p><a href="/">Go Back</a></p>
</body>
</html>
