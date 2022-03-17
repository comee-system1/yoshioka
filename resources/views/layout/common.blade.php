<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<title>@yield('title')</title>
<meta name="description" itemprop="description" content="@yield('description')">
<meta name="keywords" itemprop="keywords" content="@yield('keywords')">

<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
<link href="{{ mix('css/select2.min.css') }}" rel="stylesheet" type="text/css">
<script src="https://cdn.tiny.cloud/1/lk4zgr124mkuq5lip3k8l2eignti4h9otyeh0j3jm3rhhpgc/tinymce/4/tinymce.min.js"></script>

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
