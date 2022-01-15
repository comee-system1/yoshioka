@extends('layout.common')

@section('title', 'ログインページ')


@include('layout.header',['title'=>'ログイン'])

@section('content')


    <h1>ログインAAAAAAA</h1>

    @if ($errors->any())
    <div class="login_error">
        <ul>
    @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
    @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" class="form" action="{{ url()->current() }}">
        @csrf
        <input type="text" name="email" placeholder="email" value="{{ old('email') }}" required autofocus>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" id="login-button" class="btn btn-primary" >Login</button>
    </form>


@endsection

@include('layout.submenu')

@include('layout.footer')

