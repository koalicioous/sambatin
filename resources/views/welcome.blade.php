<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">    

        <title>Sambatin</title>
    </head>
    <body>
        <div class="wrapper" id="app">
            <router-view></router-view>
        </div>
    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
