@extends('layout.common')

@section('title', 'テスト名演題ページ')


@include('layout.header',['title'=>'高分子学会'])
@include('layout.nav')

@section('content')

<div id="home">
    <div class="container-fluid">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" id="showloading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <div class="row">
            @yield('nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                {{--  <time-component v-bind:id={{$id}}></time-component>  --}}
                <div class="container  p-3 ">
                    <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">タイムテーブル設定</nav>
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
                            <a href="javascript:void(0);" class='btn btn-outline-success w-100 text-nowrap mt-1 placebutton' id="placebutton-{{$value[ 'master_id' ]}}" ><small>{{ $value[ 'text' ] }}</small></a>
                            </div>
                        @endforeach
                    </div>

                    <div class="row mt-5 d-grid gap-2 col-6 mx-auto" >
                        <button class="btn btn-danger w-100" id="setting_program" >プログラム設定保存</button>
                    </div>

                    <div class="row mt-2"  >
                        <div class="col-md-8">
                            <p class="m-0">Web用URL</p>
                            <input type="text" name="weburl" value="" class="form-control w-50" placeholder="動画配信用URLを入力してください"/>
                        </div>
                    </div>



                    <div class="row mt-2">
                        <p class="m-0">表示・非表示設定</p>
                        <div class="col-md-6">
                            <div class="btn-group mr-2">
                                <button class="btn btn-sm btn-outline-danger w100 timetable_enable" id="timetable_enable-1" >表示</button>
                                <button class="btn btn-sm btn-outline-danger w100 timetable_enable" id="timetable_enable-0" >非表示</button>
                            </div>
                        </div>
                    </div>



                    <div class="row mt-5 position-relative">
                        <table class="table table-bordered">
                            <tr class="bg-primary text-white">
                                <th style="width:100px;">有効/無効</th>
                                <th style="width:100px;">時刻</th>
                                <th >講演者選択</th>
                                <th>演題名</th>
                                <th style="width:200px;">ダウンロード資料</th>
                            </tr>
                            @for($i=0; $i<20; $i++)
                            <tr >
                                <input type="hidden" id="hidden-{{$i}}" class="timetable_key" value="{{$i}}" />
                                <td class="text-center align-middle">
                                    <input type="checkbox" class="timetable_check" id="check-{{$i}}" value="on" />
                                </td>
                                <td class="align-middle">
                                    <div class="row ">
                                        <div class="col-12">
                                            <input type="time" class="form-control" id="start_time-{{$i}}" />
                                        </div>
                                        <div class="col-12 mt-1">
                                            <input type="time" class="form-control" id="end_time-{{$i}}" />
                                        </div>
                                    </div>
                                </td>
                                <td class="w-25 align-middle">
                                    <select class="js-attachSelect2-tag selectpos w-100" id="selectpos-{{$i}}" >
                                        <option value="0"></option>
                                        <option value="1" >111</option>
                                        <option value="2" >222</option>
                                    </select>
                                </td>
                                <td class="align-middle">
                                    <textarea class="form-control w-100" rows=3 id="endai_name-{{$i}}" ></textarea>
                                </td>
                                <td class="align-middle">
                                    <ol>
                                        <li>ダウンロード資料1</li>
                                        <li>ダウンロード資料2</li>
                                        <li>ダウンロード資料3</li>
                                    </ol>
                                </td>
                            </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<input type="hidden" id="seminer_id" value="{{$id}}" />
@endsection

@include('layout.submenu')
<script src="{{ mix('js/timetable.js') }}" defer></script>

@include('layout.footer')

