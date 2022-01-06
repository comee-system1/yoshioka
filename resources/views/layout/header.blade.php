@section('header')

<nav class="navbar navbar-expand navbar-dark bg-dark p-1">
    <a class="navbar-brand" href="#">{{ $title }} </a>

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
