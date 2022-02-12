@extends('layout.common')

@section('title', 'テスト名ページ')


@include('layout.header',['title'=>'高分子学会'])
@include('layout.nav')
@include('layout.flash')

@section('content')

<div id="home">
    <div class="container-fluid">

        <div class="row">
            @yield('nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container p-3">
                <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">決済内容更新</nav>
                @yield('flash')
                {{ Form::open(['route' => ['pay.post',$id]]) }}
                    <div class="row mt-4">
                        <p class="h4">{{$data[ 'join_title' ][ 'join' ][ 'title' ]}}</p>
                        @foreach(Classes::ENABLE_LIST as $key => $val)
                            <div class="col-md-2">
                                <?php $chk = false; ?>
                                @if($data[ 'fee' ][ 'join_status' ] == $key)
                                <?php $chk = true; ?>
                                @endif
                                {{ Form::radio('join_status',$key, $chk, ['id'=>'join_status_'.$key] ) }}
                                <label for='join_status_{{$key}}' >{{$val}}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-4">
                        <p class="h4">{{$data[ 'join_title' ][ 'party' ][ 'title' ]}}</p>
                        @foreach(Classes::ENABLE_LIST as $key => $val)
                            <div class="col-md-2">
                                <?php $chk = false; ?>
                                @if($data[ 'fee' ][ 'party_status' ] == $key)
                                <?php $chk = true; ?>
                                @endif
                                {{ Form::radio('party_status',$key, $chk, ['id'=>'party_status_'.$key] ) }}
                                <label for='party_status_{{$key}}' >{{$val}}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-4">
                        <div class="col-2 h4">Stripeキー</div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        @foreach(Classes::ENABLE_LIST as $key => $val)
                                            <div class="col-md-2">
                                                <?php $chk = false; ?>
                                                @if($data[ 'fee' ][ 'stripe_status' ] == $key)
                                                <?php $chk = true; ?>
                                                @endif
                                                {{ Form::radio('stripe_status',$key, $chk, ['id'=>'stripe_status_'.$key] ) }}
                                                <label for='stripe_status_{{$key}}' >{{$val}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>公開キー</span>
                                    {{ Form::text('stripekey_public', $data[ 'fee' ][ 'stripekey_public' ], ['class'=>'form-control'] ) }}
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <span>シークレットキー</span>
                                    {{ Form::text('stripekey_secret', $data[ 'fee' ][ 'stripekey_secret' ], ['class'=>'form-control'] ) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <p class="h4">{{$data[ 'join_title' ][ 'join' ][ 'title' ]}}</p>
                            @foreach($data[ 'space' ] as $key=>$value)
                            <div class="row mt-2">
                                <div class="col-2">{{$value->text}}</div>
                                <div class="col-6">
                                    {{ Form::text('fee['.$value->master_id.'][join]', $value->join_fee, ['class'=>'form-control'] ) }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <p class="h4">{{$data[ 'join_title' ][ 'party' ][ 'title' ]}}</p>
                            @foreach($data[ 'space' ] as $key=>$value)
                            <div class="row mt-2">
                                <div class="col-2">{{$value->text}}</div>
                                <div class="col-6">
                                    {{ Form::text('fee['.$value->master_id.'][party]', $value->party_fee, ['class'=>'form-control'] ) }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            {{Form::submit('更新', ['class'=>'btn btn-primary w-100'])}}
                        </div>
                    </div>
                {{ Form::close() }}
                </div>
            </main>
        </div>

    </div>
</div>

@endsection

@include('layout.submenu')

@include('layout.footer')

