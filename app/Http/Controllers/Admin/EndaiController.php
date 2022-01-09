<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EndaiController extends Controller
{
    //
    public function index()
    {
        $hello = 'Hello World';

        return view('admin.endai', ['hello' => $hello]);
    }

    public function new()
    {
        $hello = 'Hello World';

        return view('admin.endainew', ['hello' => $hello]);
    }
}
