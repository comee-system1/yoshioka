@extends('layout.common')

@section('title', $seminer->name)


@include('layout.header',['title'=>$seminer->name])
@include('layout.nav')

@section('content')

<div id="home">
    <div class="container-fluid">
        <div class="row">
            @yield('nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <info-component v-bind:id={{$id}}></info-component>
            </main>
        </div>
    </div>
</div>

@endsection

@include('layout.submenu')

@include('layout.footer')

