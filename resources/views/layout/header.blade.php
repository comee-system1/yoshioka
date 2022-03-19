@section('header')

<nav class="navbar navbar-expand navbar-dark bg-dark p-1">
    @if (!empty($open_url))
    <a class="navbar-brand" href="{{$open_url}}" target=_blank>{!! $title !!}</a>
    <a href="{{$open_url}}" class="text-white" target=_blank>{{ $open_url }}</a>
    @else
    <h1 class="text-white">{!! $title !!}</h1>

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
