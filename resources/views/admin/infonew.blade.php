@extends('layout.common')

@section('title', $seminer->name)


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
                    <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">お知らせ入力</nav>
                    @yield('flash')
                    @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                    </div>
                    @endif
                    @if(!empty($information_id))
                    {{ Form::open(['route' => ['info.edit.post', $id, $information_id] , "method" => "POST", "enctype" => "multipart/form-data" ]) }}
                    @else
                    {{ Form::open(['route' => ['infonew.post',$id] , "method" => "POST", "enctype" => "multipart/form-data" ]) }}
                    @endif
                        {{ csrf_field() }}
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">タイトル</div>
                            <div class="col-md-6">
                                {{ Form::text('title', $information->title??"", ['id'=>'title', 'class'=>'form-control', 'placeholder'=>'タイトルを入力' ])}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">内容</div>
                            <div class="col-md-6">
                                {{ Form::radio('display_type', 'note', ('note' == (!empty($information->display_type)?$information->display_type:'note') ), ['id' => 'display_type1' ]) }} お知らせ内容の表示
                                {{ Form::textarea('note', $information->note??"", ['id'=>'note', 'class'=>'form-control', 'placeholder'=>'内容を入力', 'rows'=>8 ])}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">リンク先指定</div>
                            <div class="col-md-6">
                                {{ Form::radio('display_type', 'link', ('link' == (!empty($information->display_type)??"") ), ['id' => 'display_type2' ]) }} リンク先にページ遷移
                                {{ Form::text('link', $information->link??"", ['id'=>'link', 'class'=>'form-control', 'placeholder'=>'リンク先URLを指定' ])}}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">ファイルアップロード</div>
                            <div class="col-md-6">
                                {{ Form::radio('display_type', 'file', ('file' == (!empty($information->display_type)??"") ), ['id' => 'display_type3' ]) }} ファイルダウンロード<br />
                                {{Form::file("file",['id'=>'file'])}}
                                @if(!empty($information->file))
                                <div >
                                    <a href="/storage/file/{{$information->file}}">{{$information->file}}</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 d-flex align-items-center">お知らせタイプ</div>
                            <div class="col-md-9">
                                <div class="row">
                                    @foreach(Classes::INFO_TYPE as $key=>$val)
                                    <div class="mt-2">
                                        {{ Form::radio('type', $key, ($key ==  (!empty($information->type)?$information->type:'1') ), ['id' => 'type', ]) }}
                                        {{ Form::label('type', $val, ['class' => 'form-check-label']) }}
                                    </div>
                                    @if ($key == 1)
                                        <div class="row">
                                            <div class="col-md-4">
                                                {{ Form::datetimeLocal('start', $information->st??"", ['id'=>'start', 'class'=>'form-control'])}}
                                            </div>
                                            <div class="col-md-4">
                                                {{ Form::datetimeLocal('end', $information->ed??"", ['id'=>'end', 'class'=>'form-control'])}}
                                            </div>
                                        </div>
                                    @endif
                                    @if ($key == 2)
                                        <p>【次回の配信予定時間は{{$after}}以降になります。】</p>
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
<script type="text/javascript">
window.addEventListener('DOMContentLoaded', ()=>{
    var note = document.getElementById( "note" );
    note.addEventListener("click", (event) => {
        var display_type1 = document.getElementById( "display_type1" );
        display_type1.click();
    });
    var link = document.getElementById( "link" );
    link.addEventListener("click", (event) => {
        var display_type2 = document.getElementById( "display_type2" );
        display_type2.click();
    });
    var file = document.getElementById( "file" );
    file.addEventListener("click", (event) => {
        var display_type3 = document.getElementById( "display_type3" );
        display_type3.click();
    });
});
</script>
@include('layout.submenu')

@include('layout.footer')

