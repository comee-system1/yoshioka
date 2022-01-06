<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $hello = 'Hello World';
        return view('admin.index', ['hello' => $hello]);
    }

    public function saveData(){

        echo "success";
        exit();
    }

    public function to_string()
    {
        return 'hoge';
    }

}
