@extends('openlayout.common')

@section('title', 'トップページ')

@include('openlayout.header',['title'=>'toppage'])

@section('content')

<div id="open">
    <open-component v-bind:seminer="{{$seminer}}"></open-component>
</div>

@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

