@section('nav')
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav nav-pills nav-stacked mt-1">
            <li>
                <a @if(Request::is('admin/join/'.$id)
                || Request::is('admin/join/new/'.$id)
                || (isset($account_id) && Request::is('admin/join/edit/'.$id.'/'.$account_id)) ) class="nav-link active" @else class="nav-link" @endif href="{{route('join',['id'=>$id])}}">
                <i class="fas fa-address-card"></i>
                参加者一覧
                </a>
            </li>
            <li >
                <a @if(Request::is('admin/endai/'.$id)
                || Request::is('admin/endai/new/'.$id)
                || (isset($endai_id) && Request::is('admin/endai/edit/'.$id.'/'.$endai_id))
                ) class="nav-link active" @else class="nav-link" @endif href="{{route('endai',['id'=>$id])}}">
                <i class="fas fa-microphone-alt"></i>
                演題一覧
                </a>
            </li>
            <li>
                <a @if(Request::is('admin/time/'.$id) ) class="nav-link active" @else class="nav-link" @endif href="{{route('time',['id'=>$id])}}">
                <i class="far fa-clock"></i>
                タイムテーブル
                </a>
            </li>
            <li>
                <a @if(Request::is('admin/book/'.$id) ) class="nav-link active" @else class="nav-link" @endif href="{{route('book',['id'=>$id])}}">
                <i class="fas fa-lock"></i>
                予稿原稿アップロード
                </a>
            </li>
            <li>
                <a @if(Request::is('admin/pay/'.$id) ) class="nav-link active" @else class="nav-link" @endif href="{{route('pay',['id'=>$id])}}">
                <i class="fas fa-credit-card"></i>
                決済ページ
                </a>
            </li>
            <li>
                <a @if(
                    Request::is('admin/info/'.$id) ||
                    Request::is('admin/info/new/'.$id) ||
                    (!empty($information_id) && Request::is('admin/info/edit/'.$id.'/'.$information_id))
                ) class="nav-link active" @else class="nav-link" @endif href="{{route('info',['id'=>$id])}}">
                <i class="fas fa-info-circle"></i>
                お知らせ管理
                </a>
            </li>
            <li>
                <a @if(Request::is('admin/invoice/'.$id) ) class="nav-link active" @else class="nav-link" @endif href="{{route('invoice',['id'=>$id])}}">
                <i class="fas fa-scroll"></i>
                請求書/領収書管理
                </a>
            </li>
            <li>
                <a @if(
                    Request::is('admin/sponser/'.$id) ||
                    (!empty($sponser_id) && Request::is('admin/sponser/edit/'.$id."/".$sponser_id)) ||
                Request::is('admin/sponser/new/'.$id) ) class="nav-link active" @else class="nav-link" @endif href="{{route('sponser',['id'=>$id])}}">
                <i class="fas fa-globe-asia"></i>
                協賛管理
                </a>
            </li>
            <li>
                <a @if(
                    Request::is('admin/master/'.$id) ||
                    Request::is('admin/master/endai/'.$id) ||
                    Request::is('admin/master/time/'.$id) ||
                    Request::is('admin/master/mail/'.$id) ||
                    Request::is('admin/master/invoice/'.$id) ||
                    Request::is('admin/master/title/'.$id) ||
                    Request::is('admin/master/mypage/'.$id) ||
                    Request::is('admin/master/password/'.$id) ||
                    Request::is('admin/master/join/'.$id)
                    )
                class="nav-link active" @else class="nav-link" @endif href="{{route('master',['id'=>$id])}}">
                <i class="fas fa-users-cog"></i>
                マスター管理
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
