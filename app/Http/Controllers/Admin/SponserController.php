<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SponserController extends Controller
{
    //
    public function index()
    {
        $hello = 'Hello World3';
        return view('admin.sponser', ['hello' => $hello]);
    }

    public function new()
    {
        $hello = 'Hello World3';
        return view('admin.sponsernew', ['hello' => $hello]);
    }
}
