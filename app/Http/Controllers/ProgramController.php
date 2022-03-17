<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DefineMyPage;
use App\Models\DefinePlaceList;
use App\Models\DefineTimeTitle;
use App\Models\Endai;
use App\Http\Controllers\ArrayController;
use App\Models\TimetableProgrames;
use App\Models\Timetables;

class ProgramController extends ControllerOpen
{

    public function __construct(Request $request)
    {
        $this->pageCheck($request);
        $this->defineMypage = DefineMyPage::getDataOpen($request->id);
        $this->endai = new Endai();
    }

    //
    public function index($id, $uniqcode, $place_master_id = 0, Request $request)
    {
        $place_master_id = $this->checkPlaceMaster($id, $place_master_id);
        $definetime = DefineTimeTitle::getOpenData($id);
        $dateList = (new ArrayController())->getDateLists($id,1);
        $data[ 'id' ] = $id;
        $data[ 'uniqcode' ] = $uniqcode;
        $data[ 'place_master_id' ] = $place_master_id;
        $data[ 'title'  ] = session()->get( 'language' ) == 'EN' ? $definetime[ 'title' ]->title2 : $definetime[ 'title' ]->title;
        $data[ 'button' ] = session()->get( 'language' ) == 'EN' ? $definetime[ 'button' ]->title2 : $definetime[ 'button' ]->title;
        $data[ 'definetime' ] = $definetime;
        $data[ 'place'  ] = DefinePlaceList::getOpenPlaceLists($id);
        $data[ 'daylist'] = $dateList;
        $date = "";
        if(!empty($request->date)){
            $date = $request->date;
        }else{
            $date = $dateList[0]['date'];
        }
        $data['day'] = $date;
        $timetables = Timetables::getOpenData($id, $place_master_id, $date);
        $timetable_programes = TimetableProgrames::getOpenData($id, $timetables->id);


        $data[ 'timetables'] = $timetables;
        $data[ 'timetable_programes'] = $timetable_programes;

        return view('open.program', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'lang' => session()->get('language') ,
            'seminer' => $this->seminer[0],
            'defineMypage' => $this->defineMypage,
            'data' => json_encode($data),
            'defineTimeTable' => $definetime,
        ]);
    }
    public function checkPlaceMaster($id, $place_master_id)
    {
        if($place_master_id == "0"){
            $place_master_id= DefinePlaceList::getFirst($id)->master_id;
        }
        return $place_master_id;
    }
}
