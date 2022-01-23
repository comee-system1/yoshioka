<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Account;

class AccountController extends Controller
{
    //
    public function index($type, $uniqcode)
    {
        $user = Auth::guard('account')->user();

        return view('open.account', [
            'type' => $type,
            'uniqcode' => $uniqcode,
            'user' => $user
        ]);
    }
}
