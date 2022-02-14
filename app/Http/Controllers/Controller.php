<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Seminer;
use App\Consts\ClassConsts;

class Controller extends BaseController
{
    //
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $seminer;
    public $class;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if(Auth::guard('web')->check()){
                if(\Request::is('admin')){
                    return $next($request);
                }
                if($request->id){
                    $this->class = new ClassConsts();
                    $this->seminer = Seminer::find($request->id);
                    $this->seminer->open_url = route('top',['id'=>$this->seminer->id, 'uniqcode'=>$this->seminer->open_key ]);
                }
            }

            //引数のチェック
            /*
            if(Auth::guard('web')->check()){
                if(\Request::is('admin')){
                    return $next($request);
                }
                if(Seminer::find($request->id)){
                    return $next($request);
                }else{
                    echo "error";
                    exit();
                }
            }
            */
            return $next($request);
        });
    }
}
