@extends('openlayout.common')

@section('title', 'ログインページ')


@include('openlayout.header',['title'=>'ログイン'])

@section('content')


@if ($errors->any())
<div class="login_error">
    <ul>
@foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
@endforeach
    </ul>
</div>
@endif
<form method="POST" class="form-signin" action="{{route('signin.post', ['type'=>$type])}}">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <input type="text" name="email" class="form-control mt-3" placeholder="email" value="{{ old('email') }}" required autofocus>
    <input type="password" name="password" class="form-control mt-3" placeholder="Password" required>
    <input type="hidden" name="uniqcode" value="{{$uniqcode}}" />
    <button type="submit" id="login-button" class="btn btn-primary mt-3 form-control" >Login</button>
</form>
<div class="text-center mt-4">
    <a href="{{route('regist',['type'=>$type, 'uniqcode'=>$uniqcode])}}">参加登録はこちらから</a>
</div>

@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

