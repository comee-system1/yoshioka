@section('header')

<a id="skippy" class="sr-only sr-only-focusable" href="#content">
  <div class="container">
    <span class="skiplink-text">Skip to main content</span>
  </div>
</a>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-3 pt-1">
            </div>
            <div class="col-6 text-center">
                <a class="blog-header-logo text-dark undecorate" href="{{route('top',['type'=>$type, 'uniqcode'=>$uniqcode])}}">学会サンプル</a>
            </div>
            @if (Auth::guard('account')->check())
                <div class="col-3 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-success" href="{{route('account',['type'=>$type,'uniqcode'=>$uniqcode])}}">My Page</a>&nbsp;
                    <a class="btn btn-sm btn-outline-danger" href="{{route('signout',['type'=>$type,'uniqcode'=>$uniqcode])}}">Sign out</a>
                </div>
            @else
                <div class="col-3 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-secondary" href="{{route('signin',['type'=>$type,'uniqcode'=>$uniqcode])}}">Sign up</a>
                </div>
            @endif
        </div>
    </header>

    @if ( Route::currentRouteName() == 'top')
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark open1Image">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
                <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
            </div>
        </div>
    @else
        @if ( Auth::guard('account')->check()  )
            <div class="row mt-3">

                <div class="col-md-3"><a href="{{route('account.edit',['type'=>$type, 'uniqcode'=>$uniqcode])}}" class="btn btn-outline-primary w-100 @if(Route::currentRouteName() == 'account.edit') active @endif ">参加情報更新</a></div>
                <div class="col-md-3"><a href="{{route('account.endai.list',['type'=>$type, 'uniqcode'=>$uniqcode])}}" class="btn btn-outline-primary w-100 @if(Route::currentRouteName() == 'account.edit.list' || Route::currentRouteName() == 'account.endai.new') active @endif">演題情報一覧</a></div>
                <div class="col-md-3"><a href="{{route('account.recipe',['type'=>$type, 'uniqcode'=>$uniqcode])}}" class="btn btn-outline-primary w-100">領収書</a></div>
                <div class="col-md-3"><a href="#" class="btn btn-outline-primary w-100">プログラム</a></div>
                </div>
            </div>
        @endif
    @endif

    @if (session('flash_msg'))
    <div class="alert alert-success mt-3" role="alert">
        {{ session('flash_msg') }}
    </div>
    @endif
    @if (session('flash_error'))
    <div class="alert alert-danger mt-3" role="alert">
        {{ session('flash_error') }}
    </div>
    @endif

</div>
@endsection
