<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefineEndaiTitle extends Model
{
    use HasFactory;

    protected $table = "define_endai_titles";

    protected $fillable = [
        'seminer_id',
        'title',
        'text',
        'type',
    ];

    public static function editDataType($id, $request, $type)
    {
        $data = DefineEndaiTitle::where('type', $type)
            ->where('seminer_id', $id)
            ->first();
        if($request->lang == 2){
            $data->title2 = $request->$type;
        } else {
            $data->title = $request->$type;
        }
        $data->save();
    }

    public static function editDataTypeInput($id, $request, $type)
    {
        $define = $request->$type;
        foreach ($define as $key => $value) {
            //var_dump($value);
            $data = DefineEndaiTitle::where('id', $value['id'])
            ->where('seminer_id', $id)
            ->first();
            if($request->lang == 2) {
                $data->title2 = $value[ 'title2' ];
                $data->text2  = $value[ 'text2' ];
                $data->required_text2 = $value[ 'required_text2' ];
                $data->error_message2 = $value[ 'error_message2' ];
            } else {
                $data->title = $value[ 'title' ];
                $data->text  = $value[ 'text' ];
                $data->required_text = $value[ 'required_text' ];
                $data->error_message = $value[ 'error_message' ];
            }
            $data->required = $value[ 'required' ];
            $data->display_status = $value[ 'display_status' ];
            $data->save();
        }
    }

    public static function getDataTitle($id){
        $where = [];
        $where[ 'seminer_id' ] = $id;
        $where[ 'display_status' ] = 1;
        $data = self::where($where)->get();
        $titles = [];
        foreach($data as $value){
            $titles[$value->type] = $value;
        }
        return $titles;
    }
}
