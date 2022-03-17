<?php

namespace App\Http\Controllers;

use App\Models\DefineJoinTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SigninController extends ControllerOpen
{
    public function __construct(Request $rquest)
    {
        $this->pageCheck($rquest);
    }
    //
    public function index($id, $uniqcode, Request $request)
    {

        $joinlink = DefineJoinTitle::getDataType($id, 'joinlink')->first();
        $renew = DefineJoinTitle::getDataType($id, 'password_renew')->first();
        $account = Auth::guard('account')->user();
        if($account){
            return redirect(route('account', ['id' => $id, 'uniqcode' => $uniqcode ]));
        }
        return view('open.login', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'seminer' => $this->seminer[0],
            'joinlink' => $joinlink,
            'renew' => $renew,
        ]);
    }

    public function post($id, Request $request)
    {
        $sign_in_miss = DefineJoinTitle::getDataType($id, 'sign_in_miss')->first();
        if (Auth::guard('account')->attempt(['seminer_id'=>$id, 'email'=> $request->email, 'password'=> $request->password], true)) {
            return redirect(route('account', ['id'=> $id, 'uniqcode'=> $request->uniqcode]));
        } else {
            if(session()->get('language') == 'EN') {
                session()->flash('flash_error', $sign_in_miss->title2);
            } else {
                session()->flash('flash_error', $sign_in_miss->title);
            }
            return redirect(route('signin', ['id'=> $id, 'uniqcode'=> $request->uniqcode]));
        }
    }
    public function signout($id, $uniqcode)
    {
        Auth::guard('account')->logout();
        return redirect(route('signin', [ 'id'=> $id, 'uniqcode'=> $uniqcode ]));
    }
}
