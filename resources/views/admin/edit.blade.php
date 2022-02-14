@extends('layout.common')

@section('title', $seminer->name)


@include('layout.header',['title'=>$seminer->name])
@include('layout.nav')
@include('layoutjoin.join', ['button' => $defineJoinTitle[ 'regist_button' ]->title, 'pattern'=>'edit'])
@include('layout.flash')
@section('content')

<div id="home">
    <div class="container-fluid">
        <div class="row">
            @yield('nav')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container p-3">
                    <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">{{$defineJoinTitle[ 'title' ]->title}}</nav>
                    @yield('flash')
                    @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                    </div>
                    @endif
                    {{ Form::open(['route' => ['join.edit', $id, $account_id]]) }}
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

