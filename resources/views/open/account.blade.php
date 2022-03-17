@extends('openlayout.common')

@section('title', 'トップページ')

@include('openlayout.header',['title'=>'toppage'])

@section('content')

<div id="open">
    <main role="main" class="container">
        @isset( $defineMypage[ 'mypage' ])
            <div class="h4 mt-2">
                @if(session()->get('language') == "EN")
                {{$defineMypage['mypage']->title2}}
                @else
                {{$defineMypage['mypage']->title}}
                @endif
            </div>
            <div class="row">
                <div class="col-12">
                    @if(session()->get('language') == "EN")
                        {!! nl2br($defineMypage['mypage']->text2) !!}
                    @else
                        {!! nl2br($defineMypage['mypage']->text) !!}
                    @endif
                </div>
            </div>
        @endif
    </main>
</div>

@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

