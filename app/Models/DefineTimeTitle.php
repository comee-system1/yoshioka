<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefineTimeTitle extends Model
{
    use HasFactory;

    protected $table = "define_time_titles";

    protected $fillable = [
        'seminer_id',
        'title',
        'display_status',
        'type',
    ];

    public static function editDataType($id, $request, $type)
    {
        $data = DefineTimeTitle::where('type', $type)
            ->where('seminer_id', $id)
            ->first();
        $data->title = $request->$type;
        $data->save();
    }

    public static function editDataTypetd($id, $request, $type)
    {

        $define = $request->$type;
        foreach ($define as $key => $value) {

            $data = DefineTimeTitle::where('id', $value['id'])
            ->where('seminer_id', $id)
            ->first();
            $data->title = $value[ 'title' ];
            $data->display_status = $value[ 'display_status' ];
            $data->save();
        }

    }

    public static function editDataPlace($id, $request, $type)
    {

        $define = $request->$type;
        foreach ($define as $key => $value) {

            $data = DefinePlaceList::where('id', $value['id'])
            ->where('seminer_id', $id)
            ->first();
            $data->text = $value[ 'text' ];
            $data->display_status = $value[ 'display_status' ];
            $data->save();
        }

    }

    public static function getOpenData($id)
    {
        $data = self::where('seminer_id', $id)->get();
        $list = [];
        foreach( $data as $key=>$value){
            $list[$value->type] = $value;
        }
        return  $list;
    }

}
