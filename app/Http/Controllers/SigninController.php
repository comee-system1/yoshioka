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
        $id = session('username');
        var_dump($id);
        return view('open.login', [
            'type' => $type,
            'uniqcode' => $uniqcode
        ]);
    }

    public function post(Request $request)
    {
        var_dump($request->uniqcode);
        session()->regenerate();

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            session(['username' => '名無し']);
            echo "success";
        }
        return redirect(url('/open1/signin/ssss'));
    }
}
