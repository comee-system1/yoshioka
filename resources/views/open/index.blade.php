@extends('openlayout.common')

@section('title', $seminer->name)

@include('openlayout.header',['title'=>'toppage'])

@section('content')

<div id="open">
    <open-component v-bind:seminer="{{$seminer}}"></open-component>
</div>

@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

