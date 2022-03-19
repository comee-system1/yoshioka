@section('header')

<nav class="navbar navbar-expand navbar-dark bg-dark p-1">
    <a class="navbar-brand" href="{{$open_url}}" target=_blank>{!! $title !!}</a>
    @if (!empty($open_url))
    <a href="{{$open_url}}" class="text-white" target=_blank>{{ $open_url }}</a>
    @endif
    <ul class="navbar-nav px-3 signout">
        <li class="nav-item text-nowrap">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger" >sign out</button>
            </form>
        </li>
    </ul>
</nav>
@endsection
