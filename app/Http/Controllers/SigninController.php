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
/*
        $this->validate($request,[
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
*/
        var_dump(Auth::guard('accounts')->attempt( ['email'=>$request->email,
            'password'=>$request->password] ) );
exit();
        /*
        session()->regenerate();

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            session(['username' => '名無し']);
            echo "success";
          //  return redirect(route('top',['type'=>$type, 'uniqcode'=>$request->uniqcode]));
        }else{
            //失敗
            echo "fail";
            session()->flash('flash_error', 'メールアドレスかパスワードに誤りがあります。');
          //  return redirect(route('signin',['type'=>$type, 'uniqcode'=>$request->uniqcode]));
        }
        */
    }
}
