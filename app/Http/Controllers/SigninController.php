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

        return view('open.login', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'seminer' => $this->seminer[0],
            'joinlink' => $joinlink
        ]);
    }

    public function post($type, Request $request)
    {
        if (Auth::guard('account')->attempt(['email'=> $request->email, 'password'=> $request->password], true)) {
            return redirect(route('account', ['type'=> $type, 'uniqcode'=> $request->uniqcode]));
        } else {
            session()->flash('flash_error', 'メールアドレスかパスワードに誤りがあります。');
            return redirect(route('signin', ['type'=> $type, 'uniqcode'=> $request->uniqcode]));
        }
    }
    public function signout($type, $uniqcode)
    {
        Auth::guard('account')->logout();
        return redirect(route('signin', [ 'type'=> $type, 'uniqcode'=> $uniqcode ]));
    }
}
