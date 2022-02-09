<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DefinePlaceList;
use App\Models\TimetableProgrames;

class Timetables extends Model
{
    const LOOP = 20;

    use HasFactory;

    protected $table = 'timetables';

    protected $fillable = [
        'seminer_id',
        'place_master_id',
        'date',
        'explain',
        'weburl',
        'enabled',
    ];

    public static function getData($where){
        $time = Timetables::with('programs')
            ->where('seminer_id',$where['seminer_id'])
            ->where('place_master_id',$where['place_master_id'])
            ->where('date',$where['date'])->get();
        return $time;
    }

    public static function setData($seminer_id){
        $placelists = DefinePlaceList::where("seminer_id", $seminer_id)->get();
        $seminer = Seminer::find($seminer_id);

        $start = substr($seminer->start_date,0,10);
        $end = substr($seminer->end_date,0,10);
        for ($date = $start; $date <= $end; $date = date('Y-m-d', strtotime($date . '+1 day'))) {
        //日付のloop
            foreach($placelists as $key=>$value){
                $insert = [];
                $insert[ 'seminer_id' ] = $seminer_id;
                $insert[ 'place_master_id' ] = $value->master_id;
                $insert[ 'date' ] = $date;
                $last = Timetables::create($insert);
                for($i=1; $i<=self::LOOP; $i++){
                    $program = [];
                    $program[ 'timetable_id' ] = $last->id;
                    $program[ 'seminer_id' ] = $seminer_id;
                    TimetableProgrames::create($program);
                }
            }
        }
    }

    public function programs()
    {
        return $this->hasMany('App\Models\TimetableProgrames',"timetable_id");
    }

}
