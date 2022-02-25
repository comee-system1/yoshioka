<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consts\ClassConsts;
use App\Models\DefineMyPage;
use App\Models\DefinePasswordRenew;
use App\Models\DefinePlaceList;
use App\Models\DefinePresentationList;
use App\Models\DefineSpaceList;
use App\Models\DefineTitle;
use App\Models\Seminer;
use App\Models\Endai;
use App\Models\Sponser;

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

    public function getMailType()
    {
        return response()->json(ClassConsts::MAIL_TYPE);
    }

    public function getSendFlag()
    {
        return response()->json(ClassConsts::SEND_FLAG);
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

    public function getEndai($id,$endai_id)
    {
        return response()->json(Endai::getData($id,$endai_id));
    }

    public function getTitle($id)
    {
        return response()->json(DefineTitle::getData($id));
    }

    public function getMypage($id)
    {
        return response()->json(DefineMyPage::getData($id));
    }

    public function getPassword($id)
    {
        return response()->json(DefinePasswordRenew::getData($id));
    }

    public function getSponser($id)
    {
        $data = Sponser::select('*')
            ->selectRaw('DATE_FORMAT(updated_at, "%Y/%m/%d %H:%m:%i") AS date')
            ->where('seminer_id',$id)
            ->where('status',1)
            ->get();
        return response()->json($data);
    }

    public function getDateLists($id, $return = 0)
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
        if($return){
            return $list;
        }else{
            return response()->json($list);
        }
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
