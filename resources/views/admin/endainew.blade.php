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
                    <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">参加者登録</nav>
                    {{ Form::open(['route' => ['joinnew']]) }}
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">参加者区分</div>
                            <div class="col-md-9">
                            <select name="class" class="form-control">
                            @foreach(Classes::ClASS_LIST as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">参加者名</div>
                            <div class="col-md-3">
                                {{ Form::text('first_name', '',['id'=>'first_name', 'class'=>'form-control', 'placeholder'=>'姓を入力' ])}}
                            </div>
                            <div class="col-md-3">
                                {{ Form::text('last_name', '',['id'=>'last_name', 'class'=>'form-control', 'placeholder'=>'名を入力' ])}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">参加者名(かな)</div>
                            <div class="col-md-3">
                                {{ Form::text('first_name_kana', '',['id'=>'first_name', 'class'=>'form-control', 'placeholder'=>'せいを入力' ])}}
                            </div>
                            <div class="col-md-3">
                                {{ Form::text('last_name_kana', 'めいを入力',['id'=>'last_name', 'class'=>'form-control', 'placeholder'=>'めいを入力' ])}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">メールアドレス</div>
                            <div class="col-md-6">
                                {{ Form::text('email', '',['id'=>'email', 'class'=>'form-control', 'placeholder'=>'メールアドレスを入力' ])}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">パスワード</div>
                            <div class="col-md-6">
                                {{ Form::text('password', '',['id'=>'password', 'class'=>'form-control', 'placeholder'=>'パスワードを入力' ])}}
                            </div>
                        </div>
                        {{--以下テンプレートで可変--}}
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">会社名</div>
                            <div class="col-md-6">
                                {{ Form::text('company', '',['id'=>'company', 'class'=>'form-control', 'placeholder'=>'会社名を入力' ])}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">電話番号</div>
                            <div class="col-md-6">
                                {{ Form::text('tel', '',['id'=>'tel', 'class'=>'form-control', 'placeholder'=>'電話番号(半角数値)を入力' ])}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">住所</div>
                            <div class="col-md-6">
                                {{ Form::text('address', '',['id'=>'address', 'class'=>'form-control', 'placeholder'=>'住所を入力' ])}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">所属</div>
                            <div class="col-md-6">
                                {{ Form::text('group', '',['id'=>'group', 'class'=>'form-control', 'placeholder'=>'所属を入力' ])}}
                            </div>
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

