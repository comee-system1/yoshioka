<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefinePlaceList extends Model
{
    use HasFactory;

    protected $table = "define_place_lists";

    protected $fillable = [
        'seminer_id',
        'master_id',
        'text',
        'display_status',
        'sort',
    ];

    public static function getData($id)
    {
        return self::where("seminer_id", $id)->orderBy('sort', 'asc')->get();
    }

    public static function editDataType($id, $request, $type)
    {
        $data = DefinePlaceList::where('type', $type)
            ->where('seminer_id', $id)
            ->first();
        $data->title = $request->$type;
        $data->save();
    }

    public static function editDataTypeInput($id, $request, $type)
    {
        $define = $request->$type;
        echo "check";
        exit();
        /*
        foreach ($define as $key => $value) {
            //var_dump($value);
            $data = DefinePlaceList::where('id', $value['id'])
            ->where('seminer_id', $id)
            ->first();
            $data->title = $value[ 'title' ];
            $data->text = $value[ 'text' ];
            $data->required = $value[ 'required' ];
            $data->required_text = $value[ 'required_text' ];
            $data->display_status = $value[ 'display_status' ];
            $data->save();
        }
        */
    }
}
