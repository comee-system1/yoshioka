@extends('openlayout.common')
@include('layoutjoin.endai', [
    'button'=>$endaititle['button']->title,
    'account'=>$account])
@section('title', $seminer->name)
@include('openlayout.header')

@section('content')

<main role="main" class="container">
    <h1 class="h3 mb-3 font-weight-normal mt-3">{{$endaititle['title']->title}}</h1>
    <div class="container p-3">
        @if(!empty($endai_id) && $endai_id > 0 )
        {{ Form::open(['route' => ['account.endai.editpost','id'=>$id, 'uniqcode'=>$uniqcode, 'endai_id'=>$endai_id] , "method" => "POST", "enctype" => "multipart/form-data" ]) }}
        @else
        {{ Form::open(['route' => ['account.endai.post','id'=>$id, 'uniqcode'=>$uniqcode] , "method" => "POST", "enctype" => "multipart/form-data" ]) }}
        @endif
            {{ csrf_field() }}
            <div class="row mt-2">
                <div class="col-md-3 d-flex align-items-center">{{$endaititle['account_id']->title}}
                &nbsp;<small class="text-danger">{{$endaititle['account_id']->required_text}}</small>
                </div>
                <div class="col-md-6">
                    {{$account->name}}
                    {{Form::hidden('account_id',$account->id)}}
                </div>
            </div>
            @if(!empty($endaititle[ 'endai' ]))
                <div class="row mt-2">
                    <div class="col-md-3 d-flex align-items-center">{{$endaititle['endai']->title}}
                    &nbsp;<small class="text-danger">{{$endaititle['endai']->required_text}}</small>
                    </div>
                    <div class="col-md-6">
                        {{request()->endai}}
                        {{Form::hidden('endai',request()->endai)}}
                    </div>
                </div>
            @endif
            @if(!empty($endaititle[ 'note' ]))
                <div class="row mt-2">
                    <div class="col-md-3 d-flex align-items-center">{{$endaititle['note']->title}}
                    &nbsp;<small class="text-danger">{{$endaititle['note']->required_text}}</small>

                    </div>
                    <div class="col-md-6">
                        {!! nl2br(request()->note) !!}
                        {{Form::hidden('note',request()->note)}}
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
                        {{$presentationList[request()->type]->text}}
                        {{Form::hidden('type',request()->type)}}
                        </div>
                    </div>
                </div>
            @endif

            @if(request()->file1 || request()->file1_name)
                <div class="row mt-2">
                    <div class="col-md-3 d-flex align-items-center">{{$endaititle['file1']->title}}
                    &nbsp;<small class="text-danger">{{$endaititle['file1']->required_text}}</small>
                    </div>
                    <div class="col-md-3">
                        @if(request()->file1)
                            <a href="/storage/file/{{$filename1}}" class="link-danger" target=_blank>
                            @isset(request()->file1_name){{request()->file1_name}}@else{{$filename1}}@endif
                            </a>
                            {{Form::hidden('filename1',$filename1)}}
                        @endif
                        {{request()->file1_name}}
                        {{Form::hidden('file1_name',request()->file1_name)}}
                    </div>
                </div>
            @endif
            @if(request()->file2 || request()->file2_name)
                <div class="row mt-2">
                    <div class="col-md-3 d-flex align-items-center">{{$endaititle['file2']->title}}
                    &nbsp;<small class="text-danger">{{$endaititle['file2']->required_text}}</small>
                    </div>
                    <div class="col-md-3">
                        @if(request()->file2)
                            <a href="/storage/file/{{$filename2}}" class="link-danger" target=_blank>
                            @isset(request()->file2_name){{request()->file2_name}}@else{{$filename2}}@endif
                            </a>
                            {{Form::hidden('filename2',$filename2)}}
                        @endif
                        {{request()->file2_name}}
                        {{Form::hidden('file2_name',request()->file2_name)}}
                    </div>
                </div>
            @endif
            @if(!empty($endaititle[ 'file3' ]) && $filename3 )
                <div class="row mt-2">
                    <div class="col-md-3 d-flex align-items-center">{{$endaititle['file3']->title}}
                    &nbsp;<small class="text-danger">{{$endaititle['file3']->required_text}}</small>
                    </div>
                    <div class="col-md-3">

                        @if($filename3)
                            <a href="/storage/file/{{$filename3}}" class="link-danger" target=_blank>
                            @isset(request()->file3_name){{request()->file3_name}}@else{{$filename3}}@endif
                            </a>
                            {{Form::hidden('filename3',$filename3)}}
                        @else
                            {{request()->file3_name}}
                        @endif
                        @if(request()->file3_name)
                            {{Form::hidden('file3_name',request()->file3_name)}}
                        @endif
                    </div>
                </div>

            @endif
            <div class="row mt-3">

                <div class="col-md-3">
                    <a href="javascript:void(0);" class="btn btn-danger" id="back_button">{{$endaititle['back_button']->title}}</a>
                </div>
                <div class="col-md-3">
                    {{Form::submit($endaititle['regist_button']->title, ['class'=>'btn btn-primary w-100'])}}
                </div>
            </div>

        {{ Form::close() }}
    </div>
</main>
@endsection

@include('openlayout.footer')

