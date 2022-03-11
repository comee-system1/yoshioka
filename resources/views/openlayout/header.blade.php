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
                <a class="blog-header-logo text-dark undecorate" href="{{route('top',['id'=>$id, 'uniqcode'=>$uniqcode])}}">{!! $seminer->name !!}</a>
            </div>
            @if (Auth::guard('account')->check())
                <div class="col-3 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-success" href="{{route('account',['id'=>$id,'uniqcode'=>$uniqcode])}}">My Page</a>&nbsp;
                    <a class="btn btn-sm btn-outline-danger" href="{{route('signout',['id'=>$id,'uniqcode'=>$uniqcode])}}">Sign out</a>
                </div>
            @else
                <div class="col-3 d-flex justify-content-end align-items-center">
                    @isset ($joinlink)
                    <a class="btn btn-sm btn-outline-danger" href="{{route('regist',['id'=>$id, 'uniqcode'=>$uniqcode])}}">{{$joinlink->title}}</a>
                    &nbsp;
                    @endif
                    <a class="btn btn-sm btn-outline-secondary" href="{{route('signin',['id'=>$id,'uniqcode'=>$uniqcode])}}">Sign up</a>
                </div>
            @endif
        </div>
    </header>

    @if ( Route::currentRouteName() == 'top' || Route::currentRouteName() == 'top.information')
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark open1Image" style="background-image: url('/storage/open/{{$seminer->main_image}}')">
            <div class="col-md-6 px-0">
                <p class="display-4 font-italic">{!! $seminer->sub_title !!}</p>
                <p class="lead my-3">{!! nl2br($seminer->note) !!}</p>
            </div>
        </div>
    @else

        @if ( Auth::guard('account')->check()  )
            <div class="row mt-3">
                @isset($defineMypage[ 'join' ])
                <div class="col-md-2"><a href="{{route('account.edit',['id'=>$id, 'uniqcode'=>$uniqcode])}}" class="btn btn-outline-primary w-100 @if(Route::currentRouteName() == 'account.edit') active @endif ">{{$defineMypage['join']->title}}</a></div>
                @endif

                @isset($defineMypage[ 'endai' ])
                <div class="col-md-2"><a href="{{route('account.endai.list',['id'=>$id, 'uniqcode'=>$uniqcode])}}" class="btn btn-outline-primary w-100 @if(Route::currentRouteName() == 'account.endai.list' || Route::currentRouteName() == 'account.endai.new' ) active @endif">{{$defineMypage['endai']->title}}</a></div>
                @endif

                @if($seminer->fee[ 'join_status' ] == 1 || $seminer->fee[ 'party_status' ] == 1)
                @if(Auth::guard('account')->user()->payment_flag == 1)
                    <div class="col-md-2"><a href="{{route('account.recipe',['id'=>$id, 'account_id'=>Auth::guard('account')->user()->id])}}" class="btn btn-outline-primary w-100">{{$defineMypage['recipe']->title}}</a></div>
                @else
                    <div class="col-md-2"><a href="{{route('account.invoice',['id'=>$id, 'account_id'=>Auth::guard('account')->user()->id])}}" class="btn btn-outline-primary w-100">{{$defineMypage['invoice']->title}}</a></div>
                @endif
                @endif

                @isset($defineMypage[ 'program' ])
                <div class="col-md-2"><a href="{{route('account.program',['id'=>$id, 'uniqcode'=>$uniqcode] )}}" class="btn btn-outline-primary w-100 @if(Route::currentRouteName() == 'account.program') active @endif">{{$defineMypage['program']->title}}</a></div>
                @endif

                @isset($defineMypage[ 'download' ])
                    @if(Auth::guard('account')->user()->payment_flag == 1)
                    <div class="col-md-2"><a href="{{route('book.download',['id'=>$id, 'uniqcode'=>$uniqcode] )}}" class="btn btn-outline-primary w-100" >{{$defineMypage['download']->title}}</a></div>
                    @endif
                @endif
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
