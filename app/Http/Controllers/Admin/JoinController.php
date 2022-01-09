<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JoinController extends Controller
{
    //
    public function index()
    {
        $hello = 'Hello World3';

        return view('admin.main', ['hello' => $hello]);
    }

    public function new()
    {
        $hello = 'Hello World4';

        return view('admin.new', ['hello' => $hello]);
    }
}
