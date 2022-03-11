@extends('openlayout.common')

@section('title', $seminer->name)


@include('openlayout.header')

@section('content')

<main role="main" class="container">
    <h1 class="h3 mb-3 font-weight-normal mt-3">{{$defineMypage['endai']->title}}</h1>
    <div class="h6 mb-3 font-weight-normal mt-3">{!! nl2br($defineMypage['endai']->text) !!}</div>

    <div class="row">
        <div class="text-end col-md-12">
            <a href="{{route('account.endai.new', ['id'=>$id, 'uniqcode'=>$uniqcode])}}" class="btn btn-primary" >{{$endaititle['title']->title}}</a>
        </div>
    </div>
    <div class="row mt-3">
        <table class="table table-bordered">
            <tr>
                <th class="bg-primary text-white">&nbsp;</th>
                <th class="bg-primary text-white">{{$endaititle['endai']->title}}</th>
                <th class="bg-primary text-white">&nbsp;</th>
            </tr>
            @foreach($endailists as $value)
                <tr>
                    <td class="w-25">
                        <div class="row">
                            <div class="col-md-6"><a href="{{route('account.endai.edit', ['id' => $id, 'uniqcode' => $uniqcode, 'endai_id'=>$value->id ])}}" class="btn btn-success btn-sm w-100">{{$endaititle['edit_button']->title}}</a></div>
                            <div class="col-md-6"><a href="{{route('account.endai.delete', ['id' => $id, 'uniqcode' => $uniqcode, 'endai_id'=>$value->id ])}}" class="btn btn-danger btn-sm w-100 delete" >{{$endaititle['delete_button']->title}}</a></div>
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
<input type="hidden" id="delete_check" value="{{$endaititle[ 'delete_check' ]->title}}" />
@endsection

@include('openlayout.submenu')

@include('openlayout.footer')

