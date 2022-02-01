<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JoinController extends Controller
{
    //
    public function index($id)
    {

        return view('admin.main', ['id' => $id]);
    }

    public function new($id)
    {

        return view('admin.new', ['id' => $id]);
    }
}
