<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpenController extends Controller
{
    //
    public function index($type, $uniqcode)
    {
        $id = session('username');
        var_dump($id);

        return view('open.index', [
            'type' => $type,
            'uniqcode' => $uniqcode
        ]);
    }
}
