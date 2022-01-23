@extends('openlayout.common')

@section('title', 'ログインページ')


@include('openlayout.header',['title'=>'ログイン'])

@section('content')

<main role="main" class="container">
    <h1 class="h3 mb-3 font-weight-normal mt-3">演題情報一覧</h1>

    <div class="row">
        <div class="text-end col-md-12">
            <a href="{{route('account.endai.new',['type'=>$type, 'uniqcode'=>$uniqcode])}}" class="btn btn-primary" >演題追加</a>
        </div>
    </div>
    <div class="row mt-3">
        <table class="table table-bordered">
            <tr>
                <th class="bg-primary text-white">機能</th>
                <th class="bg-primary text-white">演題</th>
                <th class="bg-primary text-white">配布資料</th>
            </tr>
            <tr>
                <td class="w-25">
                    <div class="row">
                        <div class="col-md-6"><a href="" class="btn btn-success btn-sm w-100">更新</a></div>
                        <div class="col-md-6"><a href="" class="btn btn-danger btn-sm w-100">削除</a></div>
                    </div>
                </td>
                <td class="w-25">サンプル演題名</td>
                <td>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="" class="btn w-100 btn-secondary btn-sm ">配布資料1</a>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn w-100 btn-secondary btn-sm ">配布資料2</a>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn w-100 btn-secondary btn-sm ">配布資料3</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w-25">
                    <div class="row">
                        <div class="col-md-6"><a href="" class="btn btn-success btn-sm w-100">更新</a></div>
                        <div class="col-md-6"><a href="" class="btn btn-danger btn-sm w-100">削除</a></div>
                    </div>
                </td>
                <td class="w-25">サンプル演題名</td>
                <td>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="" class="btn w-100 btn-secondary btn-sm ">配布資料1</a>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn w-100 btn-secondary btn-sm ">配布資料2</a>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn w-100 btn-secondary btn-sm ">配布資料3</a>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</main>
@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

