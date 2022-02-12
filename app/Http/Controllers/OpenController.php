<?php

namespace App\Http\Controllers;

use App\Models\DefineJoinTitle;
use Illuminate\Http\Request;

class OpenController extends ControllerOpen
{
    public function __construct(Request $rquest)
    {
        $this->pageCheck($rquest);
    }
    //
    public function index($id, $uniqcode)
    {

        return view('open.index', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'seminer' => $this->seminer[0]
        ]);
    }
}
