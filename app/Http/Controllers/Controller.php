<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
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
