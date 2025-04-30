<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light scroll-smooth" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link rel="icon" href="{{ asset('img/logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script src="{{ asset('assets/js/config.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('libs/parsley/parsley.css') }}">
        <link rel="stylesheet" href="{{ asset('css/color.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

        <link href="{{ asset('libs/icons/fontawesome/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('libs/icons/line-awesome/css/line-awesome.min.css') }}" rel="stylesheet">

        <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        @vite('resources/js/app.js')
        @routes
        @inertiaHead
    </head>
    <body>
        @inertia

        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <script src="{{ asset('libs/parsley/parsley.min.js') }}"></script>
        <script src="{{ asset('libs/parsley/i18n/'.app()->getLocale().'.js') }}"></script>
        <script src="{{ asset('libs/sweetalert/sweetalert2.all.min.js') }}"></script>
    </body>
</html>
