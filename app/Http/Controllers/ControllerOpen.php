<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Seminer;
use App\Consts\ClassConsts;

class ControllerOpen extends BaseController
{
    public $seminer = "";
    public $class;
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

    public function pageCheck($request){
        $this->class = new ClassConsts();
        $ex = explode("/",$request->path());
        if(Seminer::checkSitekey($ex[1], $ex[2])){
            $data = Seminer::getData($ex[1]);
            $this->seminer = $data;
            return true;
        }else{
            echo "error(1)";
            exit();
        }

    }
}
