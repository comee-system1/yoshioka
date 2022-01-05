@extends('layout.common')

@section('title', 'ログインページ')

@include('layout.header',['title'=>'ダッシュボード'])

@section('content')

<div id="home">
    <home-component></home-component>
</div>

@endsection

@include('layout.submenu')

@include('layout.footer')

