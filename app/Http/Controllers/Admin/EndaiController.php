<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefineEndaiTitle;
use App\Models\DefinePresentationList;
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
        $endaititle = DefineEndaiTitle::getDataTitle($id);
        $presentationList = DefinePresentationList::getDataDisplay($id);

        return view('admin.endainew', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
            'endaititle'=>$endaititle,
            'presentationList'=>$presentationList,
        ]);
    }
}
