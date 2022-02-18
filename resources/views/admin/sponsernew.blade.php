@extends('layout.common')

@section('title',  $seminer->name)


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
                    <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">協賛情報入力</nav>
                    @yield('flash')
                    @if(!empty($sponser_id))
                        {{ Form::open(['route' => ['sponser.edit.post', $id, $sponser_id] , "method" => "POST", "enctype" => "multipart/form-data" ]) }}
                    @else
                        {{ Form::open(['route' => ['sponser.post',$id] , "method" => "POST", "enctype" => "multipart/form-data" ]) }}
                    @endif
                        {{ csrf_field() }}
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">アップロード画像</div>
                            <div class="col-md-6">
                                {{Form::file("file")}}
                                @if(!empty($sponserdata->file))
                                    <div class="mt-2">
                                        <img src="/storage/sponser/{{$sponserdata->file}}" height=80 />
                                        <br />
                                        {{ Form::checkbox('file_delete', 'on', '') }}
                                        削除
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">リンク先</div>
                            <div class="col-md-6 mt-2">
                                <div >
                                    {{ Form::radio('link_type', 1, (1 == old('info_type', true )), ['id' => 'info_type_id1' ]) }}
                                    {{ Form::label('info_type_id1', 'リンク先', ['class' => 'form-check-label']) }}
                                    {{ Form::text('link', $sponserdata->link??'', ['id'=>'link', 'class'=>'form-control', 'placeholder'=>'リンク先を入力' ])}}
                                </div>
                                <div class="mt-3">
                                    {{ Form::radio('link_type', 2, (2 == old('info_type', '' )), ['id' => 'info_type_id2' ]) }}
                                    {{ Form::label('info_type_id2', 'リンク先ファイルアップロード', ['class' => 'form-check-label']) }}
                                    <div>
                                    {{Form::file("link_file")}}
                                    @if(!empty($sponserdata->link_file))
                                        <div class="mt-2">
                                            <a href="/storage/sponser/{{$sponserdata->link_file}}" target=_blank>{{$sponserdata->link_file}}</a>
                                            <br />
                                            {{ Form::checkbox('link_file_delete', 'on', '') }}
                                            削除
                                        </div>
                                    @endif
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

