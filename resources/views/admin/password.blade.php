@extends('layout.common')

@section('title', 'テスト名ページ')


@include('layout.header',['title'=>$seminer->name])
@include('layout.nav')
@include('layout.flash')

@section('content')

<div id="home">
    <div class="container-fluid">
        <div class="row">
            @yield('nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container p-3">
                    <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">パスワード更新</nav>
                    @yield('flash')
                    {{ Form::open(['route' => ['join.password.post', $id, $account_id]]) }}
                    <div class="row">
                        <div class="col-6">
                        {{ Form::text('password', "", ['class'=>'form-control', 'placeholder'=>'パスワードを入力してください'] ) }}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2">
                            <a href="{{ route('join.edit', ['id'=>$id, 'account_id'=>$account_id]) }}" class="w-100 btn btn-danger">戻る</a>
                        </div>
                        <div class="col-3">
                        {{Form::submit('更新', ['class'=>'btn btn-primary w-100 '])}}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </main>
        </div>
    </div>
</div>

@endsection

@include('layout.submenu')

@include('layout.footer')

