@extends('layout.common')

@section('title', $seminer->name)


@include('layout.header',['title'=>$seminer->name])
@include('layout.nav')
@include('layoutjoin.endai', ['button' => '登録'])
@include('layout.flash')

@section('content')

<div id="home">
    <div class="container-fluid">
        <div class="row">
            @yield('nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container p-3">
                    <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">{{$endaititle[ 'title' ]->title}}</nav>
                    @yield('flash')
                    @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                    </div>
                    @endif
                    {{ Form::open(['route' => ['endainew',$id] , "method" => "POST", "enctype" => "multipart/form-data" ]) }}
                        {{ csrf_field() }}
                        @yield('endai')
                    {{ Form::close() }}
                </div>
            </main>
        </div>
    </div>
</div>

@endsection

@include('layout.submenu')

@include('layout.footer')

