<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
