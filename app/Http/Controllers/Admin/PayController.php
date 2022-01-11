<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayController extends Controller
{
    //
    public function index()
    {
        $hello = 'Hello World3';
        return view('admin.pay', ['hello' => $hello]);
    }
}
