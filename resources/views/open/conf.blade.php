@extends('openlayout.common')

@section('title', 'ログインページ')


@include('openlayout.header',['title'=>'ログイン'])
@include('layoutjoin.join', ['button' => $button, 'open'=> 1 ])

@section('content')

<main role="main" class="container">
    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
        </div>
        @endif
        <form method="POST" class="mt-3" action="{{route('regist.post', ['id'=>$id, 'uniqcode'=>$uniqcode])}}">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal">{{$title->title}}</h1>
            <div class="row mt-2">
                <div class="col-md-3 d-flex align-items-center">{{$account_type->title}}&nbsp;
                </div>
                <div class="col-md-6">
                    {{$accountSelect[$request->account_type]}}
                    {{ Form::hidden('account_type', $request->account_type) }}
                </div>
            </div>

            @foreach($account_input as $key=>$value)
                @if($value->display_status)
                <div class="row mt-2">
                    <div class="col-md-3 d-flex align-items-center">{{$value->title}}</div>
                    <div class="col-md-6">
                        {{$request[$value->type]}}
                        {{ Form::hidden($value->type, $request[$value->type]) }}
                    </div>
                </div>
                @endif
            @endforeach

            @if($fee->join_status)
            <div class="mt-5">
                <div class="row mb-3">
                    <div class="col-2"></div>
                    <div class="col-2 h5">{{ $join->title }}</div>
                    @if($request->party_flag)
                    <div class="col-2 h5">{{ $party->title }}</div>
                    @endif
                </div>
                @foreach($accountSelectFee as $key=>$value)
                    @if($request->account_type == $key)
                    <div class="row">
                        <div class="col-2">{{$value['text']}}</div>
                        <div class="col-2">&yen;{{$value['join_fee_yen']}}</div>
                        @if($request->party_status)
                        <div class="col-2">&yen;{{$value['party_fee_yen']}}</div>
                        @endif
                    </div>
                    @endif
                @endforeach
            @endif
            </div>

            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <a href="javascript:void(0);" class="btn btn-danger" id="back_button">{{$back_button}}</a>
                    @if($fee->stripe_status == 0)
                        {{Form::submit($regist_button, ['class'=>'btn btn-primary w-25', 'id'=>'registbutton'])}}
                    @else
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button btn "
                            data-key="{{$fee->stripekey_public}}"
                            data-amount="{{$price}}"
                            data-name="pay page"
                            data-label="{{$regist_button}}"
                            data-description=""
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto"
                            data-email="{{$request->email}}"
                            data-currency="JPY">
                        </script>
                    @endif
                </div>
            </div>
        </form>
    </div>
</main>
@endsection

@include('openlayout.submenu')
@include('openlayout.footer')

