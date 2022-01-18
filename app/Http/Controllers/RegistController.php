<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class RegistController extends Controller
{
    //
    public function index($type, $uniqcode)
    {

        return view('open.regist', [
            'type' => $type,
            'uniqcode' => $uniqcode
        ]);
    }

    public function post($type, $uniqcode, Request $request)
    {
        $account = new Account();
        $account->setData($request);

        session()->flash('flash_msg', '会員登録を行いました。');
        return redirect(route('signin', ['type' => $type, 'uniqcode' => $uniqcode]));
    }
}
