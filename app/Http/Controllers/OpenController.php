<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpenController extends Controller
{
    //
    public function index($uniqcode)
    {

        $hello = $uniqcode;

        return view('open.index', ['hello' => $hello]);
    }
}
