@section('join')
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">{{$account_type->title}}&nbsp;
    <small class="text-danger">{{$account_type->required_text}}</small>
    </div>
    <div class="col-md-6">
        {{ Form::select('account_type', $accountSelect, $accountdata->account_type??"", ['class' => 'form-control', 'id' => 'account_type', 'required' => 'required']) }}
    </div>
</div>
@foreach($account_input as $key=>$value)
    @if($value->display_status)
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">{{$value->title}}&nbsp;
        @if($value->required)
            <small class="text-danger">{{$value->required_text}}</small>
        @endif
        </div>
        <div class="col-md-6">
            @if($value->type != 'password' || $pattern == "new")
                {{ Form::text($value->type, $accountdata[$value->type]??"", ['id'=>$value->type, 'class'=>'form-control', 'placeholder'=>$value->text ])}}
            @else
                パスワードの変更は<a href="{{route('join.password',[$id, $account_id])}}">こちら</a>から
            @endif
        </div>
    </div>
    @endif
@endforeach

@if($fee->join_status || $fee->party_status)
@if($fee->party_status)
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">{{$party_flag->title}}</div>
        <div class="col-md-1 text-start">
            {{Form::checkbox('party_status', '1', $accountdata->party_status??"", ['class'=>'h-100 w-100','id'=>'party_status'])}}
        </div>
    </div>
@endif
<div class="mt-5">
    <div class="row mb-3">
        <div class="col-2"></div>
        @if($fee->join_status)
            <div class="col-2 h5">{{ $join->title }}</div>
        @endif
        @if($fee->party_status)
            <div class="col-2 h5">{{ $party->title }}</div>
        @endif
    </div>
    @foreach($accountSelectFee as $key=>$value)
        <div class="row">
            <div class="col-2">{{$value['text']}}</div>
            @if($fee->join_status)
                <div class="col-2">&yen;{{$value['join_fee_yen']}}</div>
            @endif
            @if($fee->party_status)
                <div class="col-2">&yen;{{$value['party_fee_yen']}}</div>
            @endif
        </div>
    @endforeach
@endif
</div>
<div class="row mt-5">
    <div class="col-md-12 text-center">
        {{Form::submit($button, ['class'=>'btn btn-primary w-25', 'id'=>'registbutton'])}}
    </div>
</div>
@endsection
