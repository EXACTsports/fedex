<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('vendor/fedex/css/app.css') }}" rel="stylesheet">

        <title>FedEx</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        @livewireStyles
        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body>
        <div class="container xl:mx-auto">
            @yield('content')
        </div>
        @livewireScripts
        <script src="{{ asset('vendor/fedex/js/app.js') }}"></script>
        @stack('scripts')
    </body> 
</html>