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
                    <form @submit.prevent="onSubmit1">
                        <div class="row">
                            <div class="col-md-3 d-flex align-items-center">参加者区分</div>
                            <div class="col-md-9">
                            <select name="class" class="form-control">
                            @foreach(Classes::ClASS_LIST as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
                    </form>

                </div>
            </main>
        </div>
    </div>
</div>

@endsection

@include('layout.submenu')

@include('layout.footer')

