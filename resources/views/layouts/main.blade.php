<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Autor: Kevin Nava -->
        <title>GolfSuite</title>
        <link href="{{ asset('img/brand/banner.png') }}" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="{{ asset('css/lobibox.min.css')}}">

        <!-- Icons -->
        <link href="{{ asset('vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <!-- Argon CSS -->
        <link  type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('css/argon.css?v=1.0.0') }}" rel="stylesheet">
        @notifyCss
        @livewireStyles
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.navbar')
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
        <script src="{{asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
        
        @stack('js')
        <!-- Argon JS -->
        @notifyJs
        <x:notify-messages />
        @livewireScripts
        <script src="{{ asset('js/lobibox.js') }}"></script>  
        <script src="{{ asset('js/argon.js?v=1.0.0') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>