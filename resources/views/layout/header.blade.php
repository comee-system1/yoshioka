@section('header')

<nav class="navbar navbar-expand navbar-dark bg-dark p-1">
    <a class="navbar-brand" href="#">{{ $title }} </a>

    <ul class="navbar-nav px-3 signout">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Sign out</a>
        </li>
    </ul>
</nav>

@endsection
