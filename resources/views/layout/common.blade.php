<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<title>@yield('title')｜nodoame.net</title>
<meta name="description" itemprop="description" content="@yield('description')">
<meta name="keywords" itemprop="keywords" content="@yield('keywords')">

<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">

@yield('pageCss')

</head>
<body>

@yield('header')

<div class="contents">
    <!-- コンテンツ -->
    <div class="main">

        @yield('content')
    </div>
</div>

@yield('footer')

<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
