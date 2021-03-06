@extends('openlayout.common')
@include('layoutjoin.endai', [
    'button'=> session()->get( 'language' ) == "EN"? $endaititle['button']->title2 : $endaititle['button']->title,
    'account'=>$account])
@section('title', $seminer->name)
@include('openlayout.header')
@include('layout.flash')

@section('content')

<main role="main" class="container">
    <h1 class="h3 mb-3 font-weight-normal mt-3">
    @if (session()->get( 'language' ) == 'EN')
    {{$endaititle['title']->title2}}
    @else
    {{$endaititle['title']->title}}
    @endif
    </h1>
    <div class="container p-3">
        @yield('flash')
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
        </div>
        @endif
        {{ Form::open(['route' => ['account.endai.conf','id'=>$id, 'uniqcode'=>$uniqcode, 'endai_id'=>$endai_id??""] , "method" => "POST", "enctype" => "multipart/form-data" ]) }}
            {{ csrf_field() }}
            @yield('endai')
        {{ Form::close() }}
    </div>
</main>
<script>
tinymce.init({
    selector: 'textarea',
    menubar: false,
    plugins: ['textcolor'],
    force_br_newlines : true,
    force_p_newlines : false,
    forced_root_block : '',
    toolbar : 'forecolor | bold italic backcolor | subscript superscript'
});
</script>
@endsection

@include('openlayout.footer')

