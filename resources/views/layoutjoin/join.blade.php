@section('join')
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">参加者区分</div>
    <div class="col-md-6">
        {{ Form::select('account_type', Classes::CLASS_LIST, old('account_type'), ['class' => 'form-control', 'id' => 'account_type', 'required' => 'required']) }}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">参加者名&nbsp;<small class="text-danger">必須</small></div>
    <div class="col-md-3">
        {{ Form::text('first_name', '',['id'=>'first_name', 'class'=>'form-control', 'placeholder'=>'姓を入力' ])}}
    </div>
    <div class="col-md-3">
        {{ Form::text('last_name', '',['id'=>'last_name', 'class'=>'form-control', 'placeholder'=>'名を入力' ])}}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">参加者名(かな)
    &nbsp;<small class="text-danger">必須</small>
    </div>
    <div class="col-md-3">
        {{ Form::text('first_name_kana', '',['id'=>'first_name', 'class'=>'form-control', 'placeholder'=>'せいを入力' ])}}
    </div>
    <div class="col-md-3">
        {{ Form::text('last_name_kana', '',['id'=>'last_name', 'class'=>'form-control', 'placeholder'=>'めいを入力' ])}}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">
    メールアドレス
    &nbsp;<small class="text-danger">必須</small>
    </div>
    <div class="col-md-6">
        {{ Form::text('email', '',['id'=>'email', 'class'=>'form-control', 'placeholder'=>'メールアドレスを入力' ])}}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">
    パスワード
    &nbsp;<small class="text-danger">必須</small>
    </div>
    <div class="col-md-6">
        {{ Form::password('password',['id'=>'password', 'class'=>'form-control', 'placeholder'=>'パスワードを半角英数字8文字以上で入力' ])}}
    </div>
</div>
{{--以下テンプレートで可変--}}
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">
    会社名
    &nbsp;<small class="text-danger">必須</small>
    </div>
    <div class="col-md-6">
        {{ Form::text('company', '',['id'=>'company', 'class'=>'form-control', 'placeholder'=>'会社名を入力' ])}}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">
    電話番号
    &nbsp;<small class="text-danger">必須</small>
    </div>
    <div class="col-md-6">
        {{ Form::text('tel', '',['id'=>'tel', 'class'=>'form-control', 'placeholder'=>'電話番号(半角数値)を入力' ])}}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">
    住所
    &nbsp;<small class="text-danger">必須</small>
    </div>
    <div class="col-md-6">
        {{ Form::text('address', '',['id'=>'address', 'class'=>'form-control', 'placeholder'=>'住所を入力' ])}}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 d-flex align-items-center">
    所属
    &nbsp;<small class="text-danger">必須</small>
    </div>
    <div class="col-md-6">
        {{ Form::text('area', '',['id'=>'area', 'class'=>'form-control', 'placeholder'=>'所属を入力' ])}}
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-12 text-center">
        {{Form::submit($button, ['class'=>'btn btn-primary w-25', 'id'=>'registbutton'])}}
    </div>
</div>
@endsection
