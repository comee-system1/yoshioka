<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EndaiController extends Controller
{
    //
    public function list($type, $uniqcode)
    {
        $user = Auth::guard('account')->user();

        return view('open.endai', [
            'type' => $type,
            'uniqcode' => $uniqcode,
            'user' => $user
        ]);
    }

    public function new($type, $uniqcode)
    {

        $user = Auth::guard('account')->user();

        return view('open.endainew', [
            'type' => $type,
            'uniqcode' => $uniqcode,
            'user' => $user
        ]);
    }
}
