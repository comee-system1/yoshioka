@extends('layout.common')

@section('title', 'テスト名ページ')


@include('layout.header',['title'=>'高分子学会'])
@include('layout.nav')

@section('content')

<div id="home">
    <div class="container-fluid">

        <div class="row">
            @yield('nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container p-3">
                <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">領収書管理</nav>
                {{ Form::open(['route' => ['joinnew']]) }}
                    <div class="row mt-4">
                        <p class="h4">領収書反映</p>
                        <div class="col-md-2">日付</div>
                        <div class="col-md-4">
                            {{ Form::date('date', '',['id'=>'date', 'class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-2">印影データ</div>
                        <div class="col-md-4">
                            {{Form::file("invoice_upload")}}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-2">明記住所</div>
                        <div class="col-md-8">
                            {{ Form::textarea('address', '',['id'=>'address', 'class'=>'form-control', 'rows'=>4 ])}}
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            {{Form::submit('更新', ['class'=>'btn btn-primary w-100'])}}
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

