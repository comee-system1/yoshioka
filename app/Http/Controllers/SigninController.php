<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SigninController extends Controller
{
    //
    public function index($type, $uniqcode, Request $request)
    {

        return view('open.login', [
            'type' => $type,
            'uniqcode' => $uniqcode
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
