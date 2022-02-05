<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consts\ClassConsts;
use App\Models\DefinePlaceList;
use App\Models\DefinePresentationList;
use App\Models\DefineSpaceList;

class ArrayController extends Controller
{
    //
    public function getSpaceList()
    {
        return response()->json(ClassConsts::SPACE_LIST);
    }

    public function getType()
    {
        return response()->json(ClassConsts::TYPE_LIST);
    }

    public function getSpaceLists($id)
    {
        return response()->json(DefineSpaceList::getData($id));
    }

    public function getPlaceLists($id)
    {
        return response()->json(DefinePlaceList::getData($id));
    }

    public function getPresentationLists($id)
    {
        return response()->json(DefinePresentationList::getData($id));
    }
}
