<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefineTitle extends Model
{
    use HasFactory;

    protected $table = "define_titles";

    protected $fillable = [
        'seminer_id',
        'title',
        'type',
        'status',
    ];

    public static function getData($id)
    {
        return self::where('seminer_id', $id)->get();
    }

    public static function getOpenTitle($id)
    {

        $data = self::where('seminer_id', $id)->get();
        $list = [];
        foreach( $data as $key=>$value){
            $list[$value->type] = $value;
        }
        return  $list;
    }

    public static function editTitle($id, $request, $type)
    {
        $data = self::where('type', $type)
        ->where('seminer_id', $id)
        ->first();
        if($request->lang == 2){
            $data->title2 = $request->$type;
        }else{
            $data->title = $request->$type;
        }
        if ($type == "information") $data->status = $request->information_status;
        if ($type == "date") $data->status = $request->date_status;
        if ($type == "address") $data->status = $request->address_status;
        if ($type == "place") $data->status = $request->place_status;
        if ($type == "sponser") $data->status = $request->sponser_status;

        $data->save();
    }
}
