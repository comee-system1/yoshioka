@extends('layout.common')

@section('title', '演題新規登録')


@include('layout.header',['title'=>'高分子学会'])
@include('layout.nav')

@section('content')

<div id="home">
    <div class="container-fluid">
        <div class="row">
            @yield('nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <endai-component v-bind:id={{$id}}></endai-component>
            </main>
        </div>
    </div>
</div>

@endsection

@include('layout.submenu')

@include('layout.footer')

