<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    //
    public function index()
    {
        $hello = 'Hello World';

        return view('admin.time', ['hello' => $hello]);
    }
}
