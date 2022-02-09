<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index($id)
    {
        var_dump($id);
        $data = [];
        return view('admin.book', ['id' => $id, 'data' => $data]);
    }
}
