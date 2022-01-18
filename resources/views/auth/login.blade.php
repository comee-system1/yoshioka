@extends('layout.common')

@section('title', 'ログインページ')


@include('layout.header',['title'=>'ログイン'])

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
    <form method="POST" class="form-signin" action="{{ url()->current() }}">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <input type="text" name="email"  class="form-control mt-3" placeholder="email" value="{{ old('email') }}" required autofocus>
        <input type="password" name="password"  class="form-control mt-3" placeholder="Password" required>
        <button type="submit" id="login-button" class="btn btn-primary mt-3" >Login</button>
    </form>


@endsection

@include('layout.submenu')

@include('layout.footer')

