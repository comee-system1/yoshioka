<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consts\ClassConsts;

class ArrayController extends Controller
{
    //
    public function getSpaceList()
    {
        return response()->json(ClassConsts::SPACE_LIST);
    }
}
