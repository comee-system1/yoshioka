@extends('openlayout.common')

@section('title', $seminer->name)


@include('openlayout.header')
@include('layoutjoin.join', [
    'button' => $button,
    'pattern'=>'edit',
    'open'=>true
    ])

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
        <form method="POST" class="mt-3" action="{{route('account.conf', ['id'=>$id, 'uniqcode'=>$uniqcode, 'endai_id'=>$endai_id??''])}}">
            @csrf
            @isset($accountdata)
                @isset($defineMypage['join']->title) <div class="h3 mb-3 font-weight-normal">{{$defineMypage['join']->title}}</div>@endif
                @isset($defineMypage['join']->text) <div class="h6 mb-3 font-weight-normal">{{$defineMypage['join']->text}}</div>@endif
            @else
                <h1 class="h3 mb-3 font-weight-normal">{{$title->title}}</h1>
            @endif
            @yield('join')

        </form>
    </div>
</main>
@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

