@section('endai')

<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">
    @if (session()->get( 'language' ) == 'EN')
    {{$endaititle['account_id']->title2}}
    @else
    {{$endaititle['account_id']->title}}
    @endif
    &nbsp;<small class="text-danger">
    @if (session()->get( 'language' ) == 'EN')
    {{$endaititle['account_id']->required_text2}}
    @else
    {{$endaititle['account_id']->required_text}}
    @endif
    </small>
    </div>
    <div class="col-md-6">
        @if(isset($account) && $account)
            {{$account->name}}
            {{Form::hidden('account_id',$account->id)}}
        @else
            {{Form::select('account_id', $accountlist, $endaiData->account_id??"", ['class' => 'js-attachSelect2', 'placeholder'=>$endaititle['account_id']->text])}}
        @endif

    </div>
</div>
@if(!empty($endaititle[ 'endai' ]))
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">
        @if (session()->get( 'language' ) == 'EN') {{$endaititle['endai']->title2}}
        @else {{$endaititle['endai']->title}}
        @endif
        &nbsp;<small class="text-danger">
        @if (session()->get( 'language' ) == 'EN') {{$endaititle['endai']->required_text2}}
        @else {{$endaititle['endai']->required_text}}
        @endif
        </small>
        </div>
        <div class="col-md-6">
            {{ Form::textarea('endai', $endaiData->name??"", ['id'=>'endai', 'class'=>'form-control', 'placeholder'=>$endaititle['endai']->text , 'rows'=>3 ])}}
        </div>
    </div>
@endif
@if(!empty($endaititle[ 'note' ]))
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">
            @if (session()->get( 'language' ) == 'EN') {{$endaititle['note']->title2}}
            @else {{$endaititle['note']->title}}
            @endif
        &nbsp;
            <small class="text-danger">
                @if (session()->get( 'language' ) == 'EN') {{$endaititle['note']->required_text2}}
                @else {{$endaititle['note']->required_text}}
                @endif
            </small>
        </div>
        <div class="col-md-6">
            {{ Form::textarea('note', $endaiData->note??"", ['id'=>'note', 'class'=>'form-control', 'placeholder'=>$endaititle['note']->text, 'rows'=>3 ])}}
        </div>
    </div>
@endif
@if(!empty($endaititle[ 'type' ]))
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">
        @if (session()->get( 'language' ) == 'EN') {{$endaititle['type']->title2}}
        @else {{$endaititle['type']->title}}
        @endif

        &nbsp;<small class="text-danger">
        @if (session()->get( 'language' ) == 'EN') {{$endaititle['type']->required_text2}}
        @else {{$endaititle['type']->required_text}}
        @endif

        </small>
        </div>
        <div class="col-md-6">
            <div class="row">
            @foreach($presentationList as $value)
                <div class="col-md-6 mb-2">
                    {{ Form::radio('type', $value->master_id, ($value->master_id == old('announce_type_id'.$value->master_id, $endaiData->type??"" )), ['id' => 'announce_type_id'.$value->master_id, ]) }}
                    {{ Form::label('announce_type_id'.$value->master_id, session()->get( 'language' ) == 'EN'?$value->text2 : $value->text, ['class' => 'form-check-label']) }}
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endif

@if(!empty($endaititle[ 'file1' ]))
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">
        @if (session()->get( 'language' ) == 'EN')
        {{$endaititle['file1']->title2}}
        @else
        {{$endaititle['file1']->title}}
        @endif
        &nbsp;<small class="text-danger">
        @if (session()->get( 'language' ) == 'EN')
        {{$endaititle['file1']->required_text2}}
        @else
        {{$endaititle['file1']->required_text}}
        @endif
        </small>
        </div>
        <div class="col-md-3">
            {{Form::file("file1")}}
            @if(!empty($endaiData->file1))
                <div class="row mt-1 ">
                    <div class="col-6">
                        <a href="/storage/file/{{$endaiData->file1}}" class="link-danger" target=_blank>{{$endaiData->file1_name}}</a>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-3">
            {{ Form::text('file1_name', $endaiData->file1_name??"", ['id'=>'file1_name', 'class'=>'form-control', 'placeholder'=> (session()->get( 'language' ) == 'EN' )? $endaititle[ 'file1' ]->text2 : $endaititle[ 'file1' ]->text ])}}
        </div>
        <div class="col-md-1">
            {{ Form::checkbox('check_file1', 'on', false, ['id' => 'check-id-1', 'class' => 'form-check-input d-none']) }}
            {!! Form::button('<i class="fas fa-trash"></i>', ['id' => 'check-label-1', 'class' => "btn label opacity-25", 'type' => 'button']) !!}
        </div>
    </div>
@endif
@if(!empty($endaititle[ 'file2' ]))
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">
        @if (session()->get( 'language' ) == 'EN')
        {{$endaititle['file2']->title2}}
        @else
        {{$endaititle['file2']->title}}
        @endif
        &nbsp;<small class="text-danger">
        @if (session()->get( 'language' ) == 'EN')
        {{$endaititle['file2']->required_text2}}
        @else
        {{$endaititle['file2']->required_text}}
        @endif
        </small>
        </div>
        <div class="col-md-3">
            {{Form::file("file2")}}
            @if(!empty($endaiData->file2))
                <div class="row mt-1">
                    <div class="col-6">
                        <a href="/storage/file/{{$endaiData->file2}}" class="link-danger" target=_blank>{{$endaiData->file2_name}}</a>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-3">
            {{ Form::text('file2_name', $endaiData->file2_name??"", ['id'=>'file2_name', 'class'=>'form-control', 'placeholder'=> session()->get( 'language' ) == 'EN' ? $endaititle[ 'file2' ]->text2:$endaititle[ 'file2' ]->text ])}}
        </div>
        <div class="col-md-1">
            {{ Form::checkbox('check_file2', 'on', false, ['id' => 'check-id-2', 'class' => 'form-check-input d-none']) }}
            {!! Form::button('<i class="fas fa-trash"></i>', ['id' => 'check-label-2', 'class' => "btn label opacity-25", 'type' => 'button']) !!}
        </div>
    </div>
@endif
@if(!empty($endaititle[ 'file3' ]))
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">
        @if (session()->get( 'language' ) == 'EN')
        {{$endaititle['file3']->title2}}
        @else
        {{$endaititle['file3']->title}}
        @endif
        &nbsp;
        <small class="text-danger">
        @if (session()->get( 'language' ) == 'EN')
        {{$endaititle['file3']->required_text2}}
        @else
        {{$endaititle['file3']->required_text}}
        @endif
        </small>
        </div>
        <div class="col-md-3">
            {{Form::file("file3")}}
            @if(!empty($endaiData->file3))
                <div class="row mt-1">
                    <div class="col-6">
                        <a href="/storage/file/{{$endaiData->file3}}" class="link-danger" target=_blank>{{$endaiData->file3_name}}</a>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-3">
            {{ Form::text('file3_name', $endaiData->file3_name??"", ['id'=>'file3_name', 'class'=>'form-control', 'placeholder' => session()->get( 'language' ) == 'EN' ? $endaititle[ 'file3' ]->text2 : $endaititle[ 'file3' ]->text ])}}
        </div>
        <div class="col-md-1">
            {{ Form::checkbox('check_file3', 'on', false, ['id' => 'check-id-3', 'class' => 'form-check-input d-none']) }}
            {!! Form::button('<i class="fas fa-trash"></i>', ['id' => 'check-label-3', 'class' => "btn label opacity-25", 'type' => 'button']) !!}
        </div>
    </div>

@endif
<div class="row mt-3">
    <div class="col-md-3">
        {{Form::submit($button, ['class'=>'btn btn-primary w-100'])}}
    </div>
</div>

@endsection
