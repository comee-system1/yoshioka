@extends('openlayout.common')

@section('title', $seminer->name)


@include('openlayout.header')

@section('content')

<main role="main" class="container">
    <h1 class="h3 mb-3 font-weight-normal mt-3">
    @if(session()->get('language') == "EN")
    {{$defineMypage['endai']->title2}}
    @else
    {{$defineMypage['endai']->title}}
    @endif
    </h1>
    <div class="h6 mb-3 font-weight-normal mt-3">
    @if(session()->get('language') == "EN")
    {!! nl2br($defineMypage['endai']->text2) !!}
    @else
    {!! nl2br($defineMypage['endai']->text) !!}
    @endif
    </div>

    <div class="row">
        <div class="text-end col-md-12">
            <a href="{{route('account.endai.new', ['id'=>$id, 'uniqcode'=>$uniqcode])}}" class="btn btn-primary" >
            @if(session()->get('language') == "EN")
            {{$endaititle['title']->title2}}
            @else
            {{$endaititle['title']->title}}
            @endif
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <table class="table table-bordered">
            <tr>
                <th class="bg-primary text-white">&nbsp;</th>
                <th class="bg-primary text-white">
                @if(session()->get('language') == "EN")
                {{$endaititle['endai']->title2}}
                @else
                {{$endaititle['endai']->title}}
                @endif
                </th>
                <th class="bg-primary text-white">&nbsp;</th>
            </tr>
            @foreach($endailists as $value)
                <tr>
                    <td class="w-25">
                        <div class="row">
                            <div class="col-md-6"><a href="{{route('account.endai.edit', ['id' => $id, 'uniqcode' => $uniqcode, 'endai_id'=>$value->id ])}}" class="btn btn-success btn-sm w-100">
                            @if(session()->get( 'language' ) == 'EN' )
                            {{$endaititle['edit_button']->title2}}
                            @else
                            {{$endaititle['edit_button']->title}}
                            @endif
                            </a></div>
                            <div class="col-md-6"><a href="{{route('account.endai.delete', ['id' => $id, 'uniqcode' => $uniqcode, 'endai_id'=>$value->id ])}}" class="btn btn-danger btn-sm w-100 delete" >
                            @if(session()->get( 'language' ) == 'EN' )
                            {{$endaititle['delete_button']->title2}}
                            @else
                            {{$endaititle['delete_button']->title}}
                            @endif
                            </a></div>
                        </div>
                    </td>
                    <td class="w-25">{!! $value->name !!}</td>
                    <td>
                        <div class="row">
                            @if($value->file1)
                                <div class="col-md-4">
                                    <a href="/storage/file/{{$value->file1}}" class="btn w-100 btn-outline-secondary btn-sm" target=_blank>{{$value->file1_name}}</a>
                                </div>
                            @endif
                            @if($value->file2)
                                <div class="col-md-4">
                                    <a href="/storage/file/{{$value->file2}}" class="btn w-100 btn-outline-secondary btn-sm " target=_blank>{{$value->file2_name}}</a>
                                </div>
                            @endif
                            @if($value->file3)
                                <div class="col-md-4">
                                    <a href="/storage/file/{{$value->file3}}" class="btn w-100 btn-outline-secondary btn-sm ">{{$value->file3_name}}</a>
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</main>
@if (session()->get( 'language' ) == "EN")
<input type="hidden" id="delete_check" value="{{$endaititle[ 'delete_check' ]->title2}}" />
@else
<input type="hidden" id="delete_check" value="{{$endaititle[ 'delete_check' ]->title}}" />
@endif
@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

