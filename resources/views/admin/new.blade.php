@extends('layout.common')

@section('title', 'テスト名ページ')


@include('layout.header',['title'=>'高分子学会'])
@include('layout.nav')
@include('layoutjoin.join', ['button' => '登録'])
@include('layout.flash')
@section('content')

<div id="home">
    <div class="container-fluid">
        <div class="row">
            @yield('nav')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container p-3">
                    <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">参加者登録</nav>
                    @yield('flash')
                    @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                    </div>
                    @endif
                    {{ Form::open(['route' => ['joinnew',$id]]) }}
                        @yield('join')
                    {{ Form::close() }}

                </div>
            </main>
        </div>
    </div>
</div>

@endsection

@include('layout.submenu')

@include('layout.footer')

