<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefineSpaceList extends Model
{
    use HasFactory;

    protected $table = "define_space_lists";

    protected $fillable = [
        'seminer_id',
        'master_id',
        'text',
    ];

    public static function getData($id)
    {
        return self::where("seminer_id", $id)->orderBy('master_id', 'asc')->get();
    }

    public static function editSpaceListData($id, $request)
    {

        foreach ($request->spaceLists as $key => $value) {
            $data = self::where('master_id', $value['master_id'])
            ->where('id', $value['id'])
            ->where('seminer_id', $id)
            ->first();
            $data->text = $value[ 'text' ];
            $data->display_status = $value[ 'display_status' ];
            $data->save();
        }
    }
}
