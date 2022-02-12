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
        $data->title = $request->$type;
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
            $data->title = $value[ 'title' ];
            $data->text = $value[ 'text' ];
            $data->required = $value[ 'required' ];
            $data->required_text = $value[ 'required_text' ];
            $data->error_message = $value[ 'error_message' ];
            $data->display_status = $value[ 'display_status' ];
            $data->save();
        }
    }
}
