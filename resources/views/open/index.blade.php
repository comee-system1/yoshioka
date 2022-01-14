@extends('openlayout.common')

@section('title', 'トップページ')

@include('openlayout.header',['title'=>'toppage'])

@section('content')

<div id="open">
    <open-component></open-component>
</div>

@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

