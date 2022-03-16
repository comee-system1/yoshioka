<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefineJoinTitle extends Model
{
    use HasFactory;

    protected $table = "define_join_titles";

    protected $fillable = [
        'seminer_id',
        'title',
        'text',
        'required',
        'required_text',
        'error_mssage',
        'display_status',
        'type',
    ];


    public static function getDataType($id, $type="")
    {
        $return = DefineJoinTitle::where('seminer_id', $id);
        if(is_array($type))
        {
            $return = $return->whereIn( 'type', $type );
        }else if($type)
        {
            $return = $return->where('type', $type);
        }
        return $return;
    }

    public static function editDataType($id, $request, $type)
    {
        $data = DefineJoinTitle::where('type', $type)
            ->where('seminer_id', $id)
            ->first();
        if($request->lang == 2){
            $data->title2 = $request->$type;
        }else{
            $data->title = $request->$type;
        }
        $data->save();
    }

    public static function editDataTypeInput($id, $request, $type)
    {
        $define = $request->$type;
        foreach ($define as $value) {
            //var_dump($value);
            $data = DefineJoinTitle::where('id', $value['id'])
            ->where('seminer_id', $id)
            ->first();
            if($request->lang == 2){
                $data->title2 = $value[ 'title2' ];
                $data->text2 = $value[ 'text2' ];
                $data->required_text2 = $value[ 'required_text2' ];
                $data->error_message2 = $value[ 'error_message2' ];
            }else{
                $data->title = $value[ 'title' ];
                $data->text = $value[ 'text' ];
                $data->required_text = $value[ 'required_text' ];
                $data->error_message = $value[ 'error_message' ];
            }
            $data->required = $value[ 'required' ];
            $data->display_status = $value[ 'display_status' ];
            $data->save();
        }
    }

    public static function getDataJoinTitleType($id)
    {
        $join_titles = DefineJoinTitle::where(['seminer_id'=>$id])
        ->get();
        $join_title_data = [];
        foreach($join_titles as $join_title){
            $join_title_data[$join_title['type']] = $join_title;
        }
        return $join_title_data;
    }

}
