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
                    <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">お知らせ入力</nav>
                    {{ Form::open(['route' => ['infonew'] , "method" => "POST", "enctype" => "multipart/form-data" ]) }}
                        {{ csrf_field() }}
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">タイトル</div>
                            <div class="col-md-6">
                                {{ Form::text('title', '',['id'=>'title', 'class'=>'form-control', 'placeholder'=>'タイトルを入力' ])}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">内容</div>
                            <div class="col-md-6">
                                {{ Form::textarea('note', '',['id'=>'note', 'class'=>'form-control', 'placeholder'=>'内容を入力', 'rows'=>3 ])}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">ファイルアップロード</div>
                            <div class="col-md-6">
                                {{Form::file("info_upload")}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">お知らせタイプ</div>
                            <div class="col-md-9">
                                <div class="row">
                                    @foreach(Classes::INFO_TYPE as $key=>$val)
                                    <div class="mt-2">
                                        {{ Form::radio('info_type', $key, ($key == old('info_type', '' )), ['id' => 'info_type_id'.$key, ]) }}
                                        {{ Form::label('info_type_id'.$key, $val, ['class' => 'form-check-label']) }}
                                    </div>
                                    @if ($key == 1)
                                        <div class="row">
                                            <div class="col-md-4">
                                                {{ Form::datetimeLocal('info_st', '',['id'=>'info_st', 'class'=>'form-control'])}}
                                            </div>
                                            <div class="col-md-4">
                                                {{ Form::datetimeLocal('info_ed', '',['id'=>'info_ed', 'class'=>'form-control'])}}
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                                </div>
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

