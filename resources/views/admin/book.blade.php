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
                    <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">予稿原稿アップロード</nav>
                        @yield('flash')
                    	<form method="POST" action="{{route('book.upload',[ 'id'=> $id ])}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" id="file" name="file" class="form-control">
                            <button type="submit" class="btn btn-primary mt-3">アップロード</button>

                        </form>
                        <div class="row mt-3">
                        @if($data['filename'])
                            <div class="col-md-3">
                                <a href="{{$data['filename']}}" class="btn btn-success" target=_blank>ファイルダウンロード</a>
                            </div>
                        @endif
                        </div>
                </div>
            </main>
        </div>
    </div>
</div>

@endsection

@include('layout.submenu')

@include('layout.footer')

