@section('nav')
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav nav-pills nav-stacked mt-1">
            <li>
                <a @if(Request::is('admin/join') || Request::is('admin/jojin/new') ) class="nav-link active" @else class="nav-link" @endif href="{{route('join')}}">
                <i class="fas fa-address-card"></i>
                参加者一覧
                </a>
            </li>
            <li >
                <a @if(Request::is('admin/endai') || Request::is('admin/endai/new') ) class="nav-link active" @else class="nav-link" @endif href="{{route('endai')}}">
                <i class="fas fa-microphone-alt"></i>
                演題一覧
                </a>
            </li>
            <li>
                <a class="nav-link " href="#">
                <i class="far fa-clock"></i>
                タイムテーブル
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                <i class="fas fa-credit-card"></i>
                決済ページ
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                <i class="fas fa-info-circle"></i>
                お知らせ管理
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                <i class="fas fa-scroll"></i>
                領収書管理
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                <i class="fas fa-globe-asia"></i>
                協賛管理
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-undo-alt"></i>
                トップに戻る
                </a>
            </li>

        </ul>
    </div>
</nav>
@endsection
