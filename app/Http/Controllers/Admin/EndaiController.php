<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EndaiController extends Controller
{
    //
    public function index($id)
    {
        $hello = 'Hello World';

        return view('admin.endai', ['id' => $id]);
    }

    public function new($id)
    {

        return view('admin.endainew', ['id' => $id]);
    }
}
