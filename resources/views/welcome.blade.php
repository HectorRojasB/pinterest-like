<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pinterest</title>

        <!-- Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @vite(['resources/js/app.js','resources/sass/app.scss'])
    
        <meta charset="UTF-8">
            @if (Auth::check()) 
                <meta name="user" content="{{ Auth::user() }}">
            @endif 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
    </head>
    <body class="antialiased">
        <div id="app"></div>
    </body>
</html>
