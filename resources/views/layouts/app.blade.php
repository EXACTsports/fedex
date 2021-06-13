<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('vendor/fedex/css/app.css') }}" rel="stylesheet">

        <title>Fedex</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @livewireStyles
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        @livewireScripts
        <script src="{{ asset('vendor/fedex/js/app.js') }}"></script>
    </body> 
</html>