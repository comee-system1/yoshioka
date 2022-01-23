@extends('openlayout.common')
@include('layoutjoin.endai', ['button'=>'更新', 'user'=>$user])
@section('title', 'ログインページ')
@include('openlayout.header',['title'=>'ログイン'])

@section('content')

<main role="main" class="container">
    <h1 class="h3 mb-3 font-weight-normal mt-3">演題追加</h1>
    <div class="container p-3">
        {{ Form::open(['route' => ['endainew'] , "method" => "POST", "enctype" => "multipart/form-data" ]) }}
            {{ csrf_field() }}
            @yield('endai')
        {{ Form::close() }}
    </div>
</main>
@endsection

@include('openlayout.footer')

