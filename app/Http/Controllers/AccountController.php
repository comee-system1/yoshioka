<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Account;
use App\Models\DefineMyPage;

class AccountController extends ControllerOpen
{
    public function __construct(Request $rquest)
    {
        $this->pageCheck($rquest);
    }
    //
    public function index($id, $uniqcode)
    {
        $user = Auth::guard('account')->user();
        $defineMypage = DefineMyPage::getDataOpen($id);

        return view('open.account', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'seminer' => $this->seminer[0],
            'user' => $user,
            'defineMypage' => $defineMypage,
        ]);
    }
}
