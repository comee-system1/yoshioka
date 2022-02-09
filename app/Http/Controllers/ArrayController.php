<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consts\ClassConsts;
use App\Models\DefinePlaceList;
use App\Models\DefinePresentationList;
use App\Models\DefineSpaceList;
use App\Models\Seminer;

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
    public function getDateLists($id)
    {
        $seminer = Seminer::find($id);
        $start = substr($seminer->start_date,0,10);
        $end = substr($seminer->end_date,0,10);
        $list = [];
        $no=0;
        for ($i = $start; $i <= $end; $i = date('Y-m-d', strtotime($i . '+1 day'))) {
            $list[$no][ 'key' ] = $no+1;
            $list[$no][ 'date' ] = $i;
            $no++;
        }
        return response()->json($list);
    }

    public static function getDateData($id)
    {
        $seminer = Seminer::find($id);
        $start = substr($seminer->start_date,0,10);
        $end = substr($seminer->end_date,0,10);
        $list = [];
        $no=0;
        for ($i = $start; $i <= $end; $i = date('Y-m-d', strtotime($i . '+1 day'))) {
            $list[$no][ 'key' ] = $no+1;
            $list[$no][ 'date' ] = $i;
            $no++;
        }
        return $list;
    }
    public static function getPlaceListsData($id)
    {
        return DefinePlaceList::getData($id);
    }
}
