@extends('openlayout.common')

@section('title', $seminer->name)

@include('openlayout.header',['title'=>'toppage'])

@section('content')

<div id="open">
    <main role="main" class="container">
    <h2 class="mt-3">{!! $seminer['information']->title !!}</h2>
    <p class="text-end h4">{{$seminer[ 'information' ]->date}}</p>
    {!! $seminer['information']->note !!}

    </main>
</div>

@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

