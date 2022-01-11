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
                <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">決済内容更新</nav>
                {{ Form::open(['route' => ['joinnew']]) }}
                    <div class="row">
                        <p>決済状況</p>
                        <div class="col-md-2">
                            {{ Form::radio('enable','1',false,['id'=>'enable1'] ) }}
                            <label for='enable1'>決済有効</label>
                        </div>
                        <div class="col-md-2">
                            {{ Form::radio('enable','0',true,['id'=>'enable0'] ) }}
                            <label for='enable0'>決済無効</label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <p>参加費</p>
                        @foreach(Classes::CLASS_LIST as $key=>$value)
                        <div class="row mt-2">
                            <div class="col-2">{{$value}}</div>
                            <div class="col-6">
                                {{ Form::text('money['.$key.']', null, ['class'=>'form-control'] ) }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            {{Form::submit('登録', ['class'=>'btn btn-primary w-100'])}}
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

