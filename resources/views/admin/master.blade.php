@extends('layout.common')

@section('title', 'マスター管理')


@include('layout.header',['title'=>'高分子学会'])
@include('layout.nav')

@section('content')

<div id="home">
    <div class="container-fluid">
        <div class="row mt-3">
            @yield('nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <master-component v-bind:id={{$id}}></master-component>
            </main>
        </div>
    </div>
</div>

@endsection

@include('layout.submenu')

@include('layout.footer')

