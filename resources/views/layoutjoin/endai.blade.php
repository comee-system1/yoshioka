@section('endai')

<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">参加者選択</div>
    <div class="col-md-9">
        @if(isset($user) && $user)
            {{$user->last_name}}
        @else
            <select name="hoge" class="js-attachSelect2">
                <option value=1>テスト1</option>
                <option value=2>テスト2</option>
                <option value=3>テスト3</option>
            </select>
        @endif

    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">演題名</div>
    <div class="col-md-6">
        {{ Form::text('endai_name', '',['id'=>'endai_name', 'class'=>'form-control', 'placeholder'=>'演題名を入力' ])}}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">演題内容</div>
    <div class="col-md-6">
        {{ Form::textarea('endai_note', '',['id'=>'endai_note', 'class'=>'form-control', 'placeholder'=>'演題内容を入力', 'rows'=>3 ])}}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">発表形式</div>
    <div class="col-md-6">
        <div class="row">
        @foreach(Classes::ANNOUNCE_LIST[1] as $key=>$val)
            <div class="col-md-6 mb-2">
                {{ Form::radio('announce_type', $key, ($key == old('announce_type_id', '' )), ['id' => 'announce_type_id'.$key, ]) }}
                {{ Form::label('announce_type_id'.$key, $val, ['class' => 'form-check-label']) }}
            </div>
        @endforeach
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">配布資料1</div>
    <div class="col-md-3">
        {{Form::file("cover_image_1")}}
    </div>
    <div class="col-md-3">
        {{ Form::text('file_1', '',['id'=>'file_1', 'class'=>'form-control', 'placeholder'=>'資料名を入力' ])}}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">配布資料2</div>
    <div class="col-md-3">
        {{Form::file("cover_image_2")}}
    </div>
    <div class="col-md-3">
        {{ Form::text('file_2', '',['id'=>'file_2', 'class'=>'form-control', 'placeholder'=>'資料名を入力' ])}}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">配布資料3</div>
    <div class="col-md-3">
        {{Form::file("cover_image_3")}}
    </div>
    <div class="col-md-3">
        {{ Form::text('file_3', '',['id'=>'file_3', 'class'=>'form-control', 'placeholder'=>'資料名を入力' ])}}
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-3">
        {{Form::submit($button, ['class'=>'btn btn-primary w-100'])}}
    </div>
</div>

@endsection
