@extends('layout.common')

@section('title', $seminer->name)


@include('layout.header',['title'=>$seminer->name])
@include('layout.nav')

@section('content')

<div id="home">
    <div class="container-fluid">
        <div class="row mt-3">
            @yield('nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <master-join-component
                :id={{$id}}
                :objects={{$objects}}
                ></master-join-component>
            </main>
        </div>
    </div>
</div>

@endsection

@include('layout.submenu')

@include('layout.footer')

