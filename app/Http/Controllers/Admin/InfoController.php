<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    //
    public function index()
    {
        $hello = 'Hello World';

        return view('admin.info', ['hello' => $hello]);
    }

    public function new()
    {
        $hello = 'Hello World';

        return view('admin.infonew', ['hello' => $hello]);
    }
}
