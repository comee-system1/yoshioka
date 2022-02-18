@extends('layout.common')

@section('title', $seminer->name)

@include('layout.header',['title'=>$seminer->name])
@include('layout.nav')
@include('layout.flash')

@section('content')

<div id="home">
    <div class="container-fluid">

        <div class="row">
            @yield('nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container p-3">
                <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">請求書/領収書管理</nav>
                @yield('flash')
                {{ Form::open(['route' => ['invoice.post', $id ], "enctype" => "multipart/form-data"] ) }}
                    {{ csrf_field() }}
                    <div class="row mt-4">
                        <p class="h4">請求書/領収書反映</p>
                        <div class="col-md-2">日付</div>
                        <div class="col-md-4">
                            {{ Form::date('date', $invoice['date']->text, ['id'=>'date', 'class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-2">印影データ</div>
                        <div class="col-md-4">
                            <div>
                            {{Form::file("file")}}
                            </div>
                            @if($invoice['file']->text)
                            <div>
                            <img class="thumbnail" src="/storage/invoice/{{$invoice['file']->text}}" height=60 >
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-2">明記住所</div>
                        <div class="col-md-8">
                            {{ Form::textarea('address', $invoice['address']->text, ['id'=>'address', 'class'=>'form-control', 'rows'=>4 ])}}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-2">電話番号</div>
                        <div class="col-md-8">
                            {{ Form::text('tel', $invoice['tel']->text, ['id'=>'tel', 'class'=>'form-control' ])}}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-2">メールアドレス</div>
                        <div class="col-md-8">
                            {{ Form::text('email', $invoice['email']->text, ['id'=>'email', 'class'=>'form-control' ])}}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-2">振込先</div>
                        <div class="col-md-8">
                            {{ Form::textarea('payee', $invoice['payee']->text, ['id'=>'payee', 'class'=>'form-control', 'rows'=>4 ])}}
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

