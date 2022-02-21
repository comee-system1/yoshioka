@extends('openlayout.common')

@section('title', 'トップページ')

@include('openlayout.header',['title'=>'toppage'])

@section('content')

<div id="open">
    <main role="main" class="container">
        @isset( $mypage[ 'mypage' ])
            <div class="h4 mt-2">{{$mypage['mypage']->title}}</div>
            <div class="row">
                <div class="col-12">{!! nl2br($mypage['mypage']->text) !!}</div>
            </div>
        @endif
    </main>
</div>

@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

