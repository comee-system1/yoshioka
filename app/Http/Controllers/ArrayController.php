<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consts\ClassConsts;
use App\Models\DefineSpaceList;

class ArrayController extends Controller
{
    //
    public function getSpaceList()
    {
        return response()->json(ClassConsts::SPACE_LIST);
    }
    public function getSpaceLists($id)
    {
        return response()->json(DefineSpaceList::getData($id));
    }
}
