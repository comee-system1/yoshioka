@extends('openlayout.common')
@include('layoutjoin.endai', [
    'button'=>$endaititle['button']->title,
    'account'=>$account])
@section('title', $seminer->name)
@include('openlayout.header')
@include('layout.flash')

@section('content')

<main role="main" class="container">
    <h1 class="h3 mb-3 font-weight-normal mt-3">{{$endaititle['title']->title}}</h1>
    <div class="container p-3">
        @yield('flash')
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
        </div>
        @endif
        {{ Form::open(['route' => ['account.endai.conf','id'=>$id, 'uniqcode'=>$uniqcode, 'endai_id'=>$endai_id??""] , "method" => "POST", "enctype" => "multipart/form-data" ]) }}
            {{ csrf_field() }}
            @yield('endai')
        {{ Form::close() }}
    </div>
</main>
@endsection

@include('openlayout.footer')

