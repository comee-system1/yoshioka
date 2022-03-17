@section('join')
@if($account_type->display_status)
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">
        @if (session('language') == "EN") {{$account_type->title2}}
        @else {{$account_type->title}}
        @endif
    &nbsp;
    <small class="text-danger">
        @if (session('language') == "EN") {{$account_type->required_text2}}
        @else {{$account_type->required_text}}
        @endif
    </small>
    </div>
    <div class="col-md-6">
        {{ Form::select('account_type', $accountSelect, $accountdata->account_type??"", ['class' => 'form-control', 'id' => 'account_type', 'required' => 'required']) }}
    </div>
</div>
@endif
@foreach($account_input as $key=>$value)
    @if($value->display_status)
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">
            @if (session('language') == "EN") {{$value->title2}}
            @else {{$value->title}}
            @endif
            &nbsp;
        @if($value->required)
            <small class="text-danger">
                @if (session('language') == "EN") {{$value->required_text2}}
                @else {{$value->required_text}}
                @endif
            </small>
        @endif
        </div>
        <div class="col-md-6">
            @if($value->type != 'password' || $pattern == "new")
                {{ Form::text($value->type, $accountdata[$value->type]??"", ['id'=>$value->type, 'class'=>'form-control', 'placeholder'=>session('language') == 'EN' ? $value->text2: $value->text ])}}
            @else
                @isset($open)
                    {{ Form::text($value->type, "", ['id'=>$value->type, 'class'=>'form-control', 'placeholder'=>session('language') == 'EN' ? $value->text2 : $value->text ])}}
                @else
                    <a href="{{route('join.password',[$id, $account_id])}}">{{$password_edit->title}}</a>
                @endif
            @endif
        </div>
    </div>
    @endif
@endforeach

@if($fee->join_status || $fee->party_status)
    @if($fee->party_status)
        <div class="row mt-2">
            <div class="col-md-3 d-flex align-items-center">
                @if (session('language') == "EN") {{$party_flag->title2}}
                @else {{$party_flag->title}}
                @endif
            </div>
            <div class="col-md-1 text-start">
                @if(isset($accountdata->payment_flag) && $accountdata->payment_flag == 1)
                    {{Form::hidden('party_status',$accountdata->party_status)}}
                    {{Form::checkbox('party_status', '1', $accountdata->party_status??"", ['class'=>'','id'=>'party_status', 'disabled' ])}}
                @else
                    {{Form::checkbox('party_status', '1', $accountdata->party_status??"", ['class'=>'','id'=>'party_status' ])}}
                @endif
            </div>
        </div>
    @endif
    <div class="mt-5">
        <div class="row mb-3">
            <div class="col-2"></div>
            @if($fee->join_status)
                <div class="col-2 h5">
                    @if (session('language') == "EN") {{$join->title2}}
                    @else {{$join->title}}
                    @endif
                </div>
            @endif
            @if($fee->party_status)
                <div class="col-2 h5">
                    @if (session('language') == "EN") {{$party->title2}}
                    @else {{$party->title}}
                    @endif
                </div>
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
    </div>
@endif

<div class="row mt-5">
    <div class="col-md-12 text-center">
        {{Form::submit($button, ['class'=>'btn btn-primary w-25'])}}
    </div>
</div>
@endsection
