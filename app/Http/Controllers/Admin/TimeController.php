<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timetables;
use Illuminate\Http\Request;
use App\Http\Controllers\ArrayController;
use App\Models\TimetableProgrames;

class TimeController extends Controller
{
    //
    public function index($id)
    {
        $hello = 'Hello World';
        //日付データ取得
        $data[ 'date' ] = ArrayController::getDateData($id);
        $data[ 'place' ] = ArrayController::getPlaceListsData($id);
        return view('admin.time', ['id' => $id, 'data' => $data]);
    }

    public function getTimeTable(Request $request)
    {
        $data['seminer_id'     ] = $request->seminer_id;
        $data['place_master_id'] = $request->place_master_id;
        $data['date'           ] = $request->date;
        $code = Timetables::getData($data)->toArray();
        return response()->json($code[0]);
    }

    public function setTimeTable(Request $request)
    {
        $timetable = Timetables::find($request->timetable_id);
        $timetable->weburl = $request->weburl;
        $timetable->enabled = $request->timetable_enabled;
        $timetable->save();
        $programs = TimetableProgrames::where("timetable_id",$request->timetable_id)->orderBy("id","asc")->get();
        $no = 0;
        foreach($programs as $program){
            $TimetableProgrames = TimetableProgrames::find($program['id']);
            $TimetableProgrames->enabled = ($request->enabled[ $no ] === "true")?"1":"0";
            $TimetableProgrames->save();
            $no++;
        }
        exit();
    }
}
