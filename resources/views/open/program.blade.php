@extends('openlayout.common')

@section('title', $seminer->name)

@include('openlayout.header')

@section('content')

<div id="open">
    <program-component v-bind:data="{{$data}}" ></program-component>
</div>

@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

