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
                    <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">協賛情報入力</nav>
                    {{ Form::open(['route' => ['infonew'] , "method" => "POST", "enctype" => "multipart/form-data" ]) }}
                        {{ csrf_field() }}

                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">アップロード画像</div>
                            <div class="col-md-6">
                                {{Form::file("info_upload")}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">リンク先</div>
                            <div class="col-md-6 mt-2">
                                <div >
                                    {{ Form::radio('link_type', 1, (1 == old('info_type', '' )), ['id' => 'info_type_id1' ]) }}
                                    {{ Form::label('info_type_id1', 'リンク先', ['class' => 'form-check-label']) }}
                                    {{ Form::text('link_text', '',['id'=>'link_text', 'class'=>'form-control', 'placeholder'=>'リンク先を入力' ])}}
                                </div>
                                <div class="mt-3">
                                    {{ Form::radio('link_type', 2, (2 == old('info_type', '' )), ['id' => 'info_type_id2' ]) }}
                                    {{ Form::label('info_type_id2', 'リンク先ファイルアップロード', ['class' => 'form-check-label']) }}

                                    {{Form::file("link_upload")}}
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

