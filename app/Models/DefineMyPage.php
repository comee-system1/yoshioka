<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefineMyPage extends Model
{
    use HasFactory;

    protected $table = "define_mypages";

    protected $fillable = [
        'seminer_id',
        'title',
        'text',
        'type',
        'text',
    ];

    public static function getData($id)
    {
        return self::where('seminer_id', $id)->get();
    }

    public static function getDataOpen($id)
    {
        $data = self::where('seminer_id', $id)
            ->where('status',1)
            ->get();
        $lists = [];
        foreach($data as $value){
            $lists[$value->type] = $value;
        }
        return $lists;
    }

    public static function editMypage($id, $request, $type)
    {
        $data = self::where('type', $type)
        ->where('seminer_id', $id)
        ->first();
        if($request->lang == 2){
            $data->title2 = $request->$type;
        }else{
            $data->title = $request->$type;
        }
        if ($type == "mypage")
        {
            $data->status = $request->mypage_status;
            if($request->lang == 2){
                $data->text2 = $request->mypage_text;
            }else{
                $data->text = $request->mypage_text;
            }
        }
        if ($type == "join")
        {
            $data->status = $request->join_status;
            if($request->lang == 2){
                $data->text2 = $request->join_text;
            }else{
                $data->text = $request->join_text;
            }
        }
        if ($type == "endai")
        {
            $data->status = $request->endai_status;
            if($request->lang == 2){
                $data->text2 = $request->endai_text;
            }else{
                $data->text = $request->endai_text;
            }
        }
        if ($type == "invoice")
        {
            $data->status = $request->invoice_status;
        }
        if ($type == "recipe")
        {
            $data->status = $request->recipe_status;
        }
        if ($type == "program")
        {
            $data->status = $request->program_status;
        }
        if ($type == "download")
        {
            $data->status = $request->download_status;
        }
        $data->save();
    }

}
