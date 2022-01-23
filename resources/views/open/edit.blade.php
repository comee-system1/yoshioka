@extends('openlayout.common')

@section('title', 'ログインページ')


@include('openlayout.header',['title'=>'ログイン'])
@include('layoutjoin.join', ['button' => '更新'])

@section('content')

<main role="main" class="container">
    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
        @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
        @endforeach
        </div>
        @endif
        <form method="POST" class="mt-3" action="{{route('account.post', ['type'=>$type, 'uniqcode'=>$uniqcode])}}">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal">参加情報更新</h1>
            @yield('join')

        </form>
    </div>
</main>
@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

