@extends('openlayout.common')

@section('title', $seminer->name)

@include('openlayout.header',['title'=>'toppage'])
@include('layout.flash')

@section('content')

<div id="open">

    <main role="main" class="container">

        <div class="row justify-content-md-center">
            <div class="col-6">
                @if ($errors->any())
                <div class="alert alert-danger mt-3">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                </div>
                @endif
                <form method="POST" class="mt-3" action="{{route('regist.renew.post', ['id'=>$id, 'uniqcode'=>$uniqcode])}}">
                    @csrf
                    @if($definePassword[ 'renew_title' ]->display_status == 1)
                    <h1 class="h3 mb-3 font-weight-normal">
                    @if (session('language') == "EN")
                        {{$definePassword[ 'renew_title' ]->title2}}
                    @else
                        {{$definePassword[ 'renew_title' ]->title}}
                    @endif
                    </h1>
                    @endif
                    @if($definePassword[ 'renew_note' ]->display_status == 1)
                        @if (session('language') == "EN")
                        <p>{!! nl2br($definePassword[ 'renew_note' ]->title2) !!}</p>
                        @else
                            <p>{!! nl2br($definePassword[ 'renew_note' ]->title) !!}</p>
                        @endif
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                        @if (session('language') == "EN")
                            <p>{{$definePassword[ 'renew_input' ]->title2}}</p>
                        @else
                            <p>{{$definePassword[ 'renew_input' ]->title}}</p>
                        @endif
                        {{ Form::text('email', "", ['id'=>'email', 'class'=>'form-control', 'placeholder'=>session()->get('language') == 'EN' ? $definePassword[ 'renew_input' ]->text2 : $definePassword[ 'renew_input' ]->text ])}}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            {{Form::submit( session()->get('language') == 'EN' ? $definePassword[ 'renew_button' ]->title2 : $definePassword[ 'renew_button' ]->title, ['class'=>'btn btn-primary w-100'])}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </main>


</div>

@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

