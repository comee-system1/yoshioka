<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Consts\ClassConsts;

class Sponser extends Model
{
    use HasFactory;

    protected $table = "sponsers";

    static public $path = ClassConsts::SPONSER_PATH;

    protected $fillable = [
        'seminer_id',
        'file',
        'link',
        'link_file',
        'link_type',
    ];


    public static function getData($id, $sponser_id)
    {
        $where[ 'seminer_id' ] = $id;
        $where[ 'id' ] = $sponser_id;
        $sponserdata = Sponser::where($where)->first();
        return $sponserdata;
    }

    public static function setData($id, $request)
    {
        $insert = [];
        $insert[ 'seminer_id' ] = $id;
        $insert[ 'file' ] = self::setFile($request, "file");
        $insert[ 'link_type' ] = $request->link_type;
        $insert[ 'link'      ] = $request->link;
        $insert[ 'link_file' ] = self::setFile($request, "link_file");

        return self::create($insert);
    }

    public static function editData($id, $sponser_id, $request)
    {

        $where = [];
        $where[ 'seminer_id' ] = $id;
        $where[ 'id' ] = $sponser_id;
        $data = self::where($where)->first();
        if($request->file) $data->file = self::setFile($request, "file");
        if($request->file_delete) $data->file = "";
        $data->link_type = $request->link_type;
        $data->link = $request->link;
        if($request->file) $data->link_file = self::setFile($request, "link_file");
        if($request->file_delete) $data->link_file = "";
        return $data->save();
    }


    public static function setFile($request, $type)
    {
        $file_name = "";
        if ($request->$type) {
            $filepath = pathinfo($request->$type->getClientOriginalName());
            $ext = $filepath['extension'];
            $file_name = uniqid() .".". $ext;
            $request->file->storeAs(self::$path, $file_name);
        }
        return $file_name;
    }

    public static function setDelete($id, $sponser_id)
    {
        $where[ 'seminer_id' ] = $id;
        $where[ 'id' ] = $sponser_id;
        $data = self::where($where)->first();
        $data->status = 0;
        return $data->save();
    }

}
