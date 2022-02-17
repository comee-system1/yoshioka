@extends('layout.common')

@section('title', $seminer->name)


@include('layout.header',['title'=>$seminer->name])
@include('layout.nav')
@include('layout.flash')

@section('content')
{{ Form::open(['route' => ['time.post',$id]]) }}
<div id="home">
    <div class="container-fluid">
        {{--  <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" id="showloading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>  --}}
        <div class="row">
            @yield('nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                {{--  <time-component v-bind:id={{$id}}></time-component>  --}}


                <div class="container  p-3 ">
                    <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">タイムテーブル設定</nav>
                    @yield('flash')
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <p class="m-0">日付選択</p>
                            <select class="form-control" name="date" >
                                @foreach($data['date'] as $key => $value)
                                <option value="{{$value['date']}}" >{{$value['date']}}</option>
                                @endforeach;
                            </select>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <p class="m-0">設定会場選択</p>
                        @foreach($data['place'] as $key => $value)
                            <div class="col-2" >
                            <a href="javascript:void(0);" class='@if(request()->place == $value[ "master_id" ]) active @endif btn btn-outline-success w-100 text-nowrap mt-1 placebutton' id="placebutton-{{$value[ 'master_id' ]}}" ><small>{{ $value[ 'text' ] }}</small></a>
                            </div>
                        @endforeach
                    </div>

                    <div class="row mt-5 col-6 mx-auto" >
                        <div class="col-12">
                            <button class="btn btn-danger w-100" id="setting_program" >日付、会場反映</button>
                        </div>

                    </div>



                    @if($programlist)
                        <button class="btn btn-info position-fixed end-0 bottom-0 m-3 regist_button" id="setting_save" >プログラム保存</button>
                        <div class="row mt-2"  >
                            <div class="col-md-8">
                                <p class="m-0">Web用URL</p>
                                {{ Form::text("weburl", $programlist->weburl, ['id'=>"weburl", 'class'=>'form-control', 'placeholder'=>"動画配信用URLを入力してください" ])}}

                            </div>
                        </div>
                        <div class="row mt-2">
                            <p class="m-0">表示・非表示設定</p>
                            <div class="col-md-6">
                                <div class="btn-group mr-2">
                                    <button class="@if($programlist->enabled == 1) active @endif btn btn-sm btn-outline-danger w100 timetable_enable" id="timetable_enable-1" >表示</button>
                                    <button class="@if($programlist->enabled == 0) active @endif btn btn-sm btn-outline-danger w100 timetable_enable" id="timetable_enable-0" >非表示</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 position-relative" >
                            <table class="table table-bordered">
                                <tr class="bg-primary text-white">
                                    <th style="width:100px;">有効/無効</th>
                                    <th style="width:100px;">時刻</th>
                                    <th >講演者選択</th>
                                    <th>演題名<br /><small class="text-danger">内容変更は一度入力文字を削除してください。</small></th>
                                    <th style="width:200px;">ダウンロード資料</th>
                                </tr>
                                @foreach ($programlist->programs as $value)

                                    <tr >
                                        <td class="text-center align-middle">
                                            <input type="checkbox" name="timetable_enabled[{{$value->id}}]" class="timetable_check" id="check-{{$value->id}}" @if($value->enabled == 1) checked @endif value="on" />
                                        </td>
                                        <td class="align-middle">
                                            <div class="row ">
                                                <div class="col-12">
                                                    <input type="time" name="start_time[{{$value->id}}]" class="form-control" id="start_time-{{$value->id}}" value="{{$value->start_time}}" />
                                                </div>
                                                <div class="col-12 mt-1">
                                                    <input type="time" name="end_time[{{$value->id}}]" class="form-control" id="end_time-{{$value->id}}" value="{{$value->end_time}}" />
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <select name="endai_id[{{$value->id}}]" class="js-attachSelect2-tag" id="endai_id-{{$value->id}}">
                                                @if($value->endai_id == 0 && $value->account_name )
                                                    <option selected>{{$value->account_name}}</option>
                                                @else
                                                    <option >&nbsp;</option>
                                                @endif
                                                @foreach($data['account'] as $account)
                                                    <option value="{{$account->id}}" @if($value->endai_id == $account->id) SELECTED @endif>{{$account->account_name}}({{$account->name}})</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="align-middle">
                                            <textarea name="endai_name[{{$value->id}}]" class="form-control w-100" rows=3 id="endai_name-{{$value->id}}" >{{$value->endai_name}}</textarea>
                                        </td>
                                        <td class="align-middle">
                                            <div id="links-{{$value->id}}">
                                            @if($value->file1)
                                                <div class="mt-1"><a href="/storage/file/{{$value->file1}}" class="w-100 btn btn-sm btn-outline-primary">{{$value->file1_name}}</a></div>
                                            @endif
                                            @if($value->file2)
                                                <div class="mt-1"><a href="/storage/file/{{$value->file2}}" class="w-100 btn btn-sm btn-outline-primary">{{$value->file2_name}}</a></div>
                                            @endif
                                            @if($value->file3)
                                                <div class="mt-1"><a href="/storage/file/{{$value->file3}}" class="w-100 btn btn-sm btn-outline-primary">{{$value->file3_name}}</a></div>
                                            @endif
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            </table>
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</div>
<input type="hidden" id="seminer_id" value="{{$id}}" />
<input type="hidden" id="date" value="{{request()->date}}" />
<input type="hidden" name="place" id="place" value="{{request()->place}}" />
<input type="hidden" name="enabled" id="enabled" value="{{$programlist->enabled??''}}" />
{{Form::close()}}
@endsection

@include('layout.submenu')
<script src="{{ mix('js/timetable.js') }}" defer></script>

@include('layout.footer')

