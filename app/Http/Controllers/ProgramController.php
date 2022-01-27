<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    //
    public function index($type, $uniqcode){
        return view('open.program', [
            'type' => $type,
            'uniqcode' => $uniqcode,
        ]);
    }
}
