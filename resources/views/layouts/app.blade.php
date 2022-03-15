<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="" />
	<meta name="description" content="" />    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel-E-Shop') }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/fav.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/fav.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">    
    @yield('includes')
    @yield('head')
</head>
<body>
    <div id="app">
        {{-- HEADER & NAV BAR --}}
        @include('components.header')
        
        {{-- MAIN CONTENT --}}
        @yield('content')
        {{-- MAIN CONTENT --}}

        {{-- FOOTER --}}
        @include('components.footer')
        @yield('js')
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js') }}" 
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/vendor/popper.js') }}" ></script>
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}" ></script>
    <script src="{{ asset('lib/fontawesome/fontawesome.js') }}" ></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.sticky.js') }}" ></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}" ></script>
    <script src="{{ asset('js/nouislider.min.js') }}" ></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" ></script>
    <script src="{{ asset('js/gmaps.min.js') }}" ></script>
    <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE') }}" ></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/main.js') }}" ></script>
</body>
</html>