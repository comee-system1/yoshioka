<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timetables;
use Illuminate\Http\Request;
use App\Http\Controllers\ArrayController;
use App\Models\TimetableProgrames;
use App\Models\Account;
use App\Models\Endai;

class TimeController extends Controller
{
    //
    public function index($id, Request $request)
    {

        //日付データ取得
        $data[ 'date'    ] = ArrayController::getDateData($id);
        $data[ 'place'   ] = ArrayController::getPlaceListsData($id);
        $data[ 'account' ] = Endai::getEndaiAccount($id);
        $programlist = $this->getTimeTable($id, $request);

        return view('admin.time', [
            'id' => $id,
            'data' => $data,
            'seminer' => $this->seminer,
            'open_url' => $this->seminer->open_url,
            'programlist' => $programlist
        ]);
    }

    public function getTimeTable($id, Request $request)
    {
        if($request->place && $request->date){
            $data['seminer_id'     ] = $id;
            $data['place_master_id'] = $request->place;
            $data['date'           ] = $request->date;
            return Timetables::getData($data);
        }else{
            return null;
        }
       // return response()->json($code[0]);
    }

    public function post($id, Request $request)
    {
        $where['place_master_id'] = $request->place;
        $where['date'] = $request->date;
        $timetable = Timetables::where($where)->first();
        $timetable->weburl = $request->weburl;
        $timetable->enabled = $request->enabled;
        $timetable->save();
        $programs = TimetableProgrames::where("timetable_id",$timetable->id)->orderBy("id","asc")->get();
        $no = 0;
        foreach($programs as $program){
            $TimetableProgrames = TimetableProgrames::find($program->id);
            $TimetableProgrames->enabled = (!empty($request->timetable_enabled[$program->id]))?1:0;
            $TimetableProgrames->start_time = $request->start_time[ $program->id ];
            $TimetableProgrames->end_time = $request->end_time[ $program->id ];
            $TimetableProgrames->endai_id = sprintf("%d",$request->endai_id[ $program->id ]);
            $TimetableProgrames->account_name = (is_numeric($request->endai_id[ $program->id ]))?"":$request->endai_id[ $program->id ];
            $TimetableProgrames->endai_name = $request->endai_name[ $program->id ];
            $TimetableProgrames->save();
            $no++;
        }

        session()->flash('flash_msg', 'タイムテーブルの更新を行いました。');
        return redirect(route('time', ['id' => $id ])."?date=".$request->date."&place=".$request->place);
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
            $TimetableProgrames->start_time = $request->start_time[ $no ];
            $TimetableProgrames->end_time = $request->end_time[ $no ];
            $TimetableProgrames->endai_id = sprintf("%d",$request->endai_id[ $no ]);
            $TimetableProgrames->account_name = (is_numeric($request->endai_id[ $no ]))?"":$request->endai_id[ $no ];
            $TimetableProgrames->endai_name = $request->endai_name[ $no ];
            $TimetableProgrames->save();
            $no++;
        }
        exit();
    }

    public function endai($id, $endai_id)
    {
        $where[ 'seminer_id' ] = $id;
        $where[ 'id' ] = $endai_id;
        $accountlist = Endai::where($where)->first();
        return response()->json($accountlist);
    }
}
