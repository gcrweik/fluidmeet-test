<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#ffffff">
    <meta name="HandheldFriendly" content="true" />
    <meta name="author" content="Mr.G">
    <title>FluidMeet Test</title>
<!-- FAVICON FILES -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/icon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/icon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/icon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/icon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/icon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/icon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/icon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/icon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('img/icon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/icon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/icon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/icon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/icon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('img/iconms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/swiper.min.css')}}">

    <!-- EN CSS -->
    @if (App::isLocale('en'))
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    @else
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/style_ar.css')}}">
        <link rel="stylesheet" href="{{asset('css/responsive_ar.css')}}">
    @endif
</head>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 px-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="/{{ App::islocale('en') ? 'en' : 'ar' }}"><img src="{{asset('img/logo.png')}}"></a>

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
                    <ul class="navbar-nav {{ App::islocale('en') ? 'ml-auto' : 'mr-auto' }}">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ App::islocale('en') ? 'English' : 'العربية' }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/' . 'en') . substr(request()->path(), 2) }}">{{ App::islocale('en') ? 'English' : 'الإنجليزية' }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/' . 'ar') . substr(request()->path(), 2) }}">{{ App::islocale('en') ? 'Arabic' : 'العربية' }}</a>
                            </div>
                        </li>
                    </ul>
{{--                </div>--}}
            </nav>
        </div>
    </div>
</div>
@yield('content')

<footer class=" navbar-dark bg-dark">
<p>© Copyright 2021 - FluidMeet Test - All Rights Reserved</p>
</footer>

<!-- JQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/isotope.min.js') }}"></script>
<!-- Bootstrap 4.3 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/swiper.min.js') }}"></script>
@if(Route::currentRouteName() == 'single-pharmacy')
<script>
    var swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
        }
    });
</script>
@endif
<script src="{{ asset('js/scripts.js') }}"></script>
