@section('endai')

<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">{{$endaititle['account_id']->title}}
    &nbsp;<small class="text-danger">{{$endaititle['account_id']->required_text}}</small>
    </div>
    <div class="col-md-6">
        @if(isset($user) && $user)
            {{$user->last_name}}
        @else
            {{Form::select('account_id', $accountlist, '', ['class' => 'js-attachSelect2', 'placeholder'=>$endaititle['account_id']->text])}}
        @endif

    </div>
</div>
@if(!empty($endaititle[ 'name' ]))
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">{{$endaititle['name']->title}}
        &nbsp;<small class="text-danger">{{$endaititle['name']->required_text}}</small>
        </div>
        <div class="col-md-6">
            {{ Form::text('name', '',['id'=>'name', 'class'=>'form-control', 'placeholder'=>$endaititle['name']->text ])}}
        </div>
    </div>
@endif
@if(!empty($endaititle[ 'note' ]))
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">{{$endaititle['note']->title}}
        &nbsp;<small class="text-danger">{{$endaititle['note']->required_text}}</small>

        </div>
        <div class="col-md-6">
            {{ Form::textarea('note', '',['id'=>'note', 'class'=>'form-control', 'placeholder'=>$endaititle['note']->text, 'rows'=>3 ])}}
        </div>
    </div>
@endif
@if(!empty($endaititle[ 'type' ]))
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">{{$endaititle['type']->title}}
        &nbsp;<small class="text-danger">{{$endaititle['type']->required_text}}</small>
        </div>
        <div class="col-md-6">
            <div class="row">
            @foreach($presentationList as $value)
                <div class="col-md-6 mb-2">
                    {{ Form::radio('type', $value->master_id, ($value->master_id == old('announce_type_id'.$value->master_id, '' )), ['id' => 'announce_type_id'.$value->master_id, ]) }}
                    {{ Form::label('announce_type_id'.$value->master_id, $value->text, ['class' => 'form-check-label']) }}
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endif

@if(!empty($endaititle[ 'file1' ]))
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">{{$endaititle['file1']->title}}
        &nbsp;<small class="text-danger">{{$endaititle['file1']->required_text}}</small>
        </div>
        <div class="col-md-3">
            {{Form::file("file1")}}
        </div>
        <div class="col-md-3">
            {{ Form::text('file1_name', '',['id'=>'file1_name', 'class'=>'form-control', 'placeholder'=> $endaititle[ 'file1' ]->text ])}}
        </div>
    </div>
@endif
@if(!empty($endaititle[ 'file2' ]))
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">{{$endaititle['file2']->title}}
        &nbsp;<small class="text-danger">{{$endaititle['file2']->required_text}}</small>
        </div>
        <div class="col-md-3">
            {{Form::file("file2")}}
        </div>
        <div class="col-md-3">
            {{ Form::text('file2_name', '',['id'=>'file2_name', 'class'=>'form-control', 'placeholder'=> $endaititle[ 'file2' ]->text ])}}
        </div>
    </div>
@endif
@if(!empty($endaititle[ 'file3' ]))
    <div class="row mt-2">
        <div class="col-md-3 d-flex align-items-center">{{$endaititle['file3']->title}}
        &nbsp;<small class="text-danger">{{$endaititle['file3']->required_text}}</small>
        </div>
        <div class="col-md-3">
            {{Form::file("file3")}}
        </div>
        <div class="col-md-3">
            {{ Form::text('file3_name', '',['id'=>'file3_name', 'class'=>'form-control', 'placeholder'=>$endaititle[ 'file3' ]->text ])}}
        </div>
    </div>
@endif
<div class="row mt-3">
    <div class="col-md-3">
        {{Form::submit($button, ['class'=>'btn btn-primary w-100'])}}
    </div>
</div>

@endsection
