<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefinePasswordRenew extends Model
{
    use HasFactory;

    protected $table = "define_password_renews";

    protected $fillable = [
        'seminer_id',
        'title',
        'text',
        'type',
        'display_status',
    ];

    public static function getData($id)
    {
        $data = self::where('seminer_id', $id)->get();
        $list = [];
        foreach($data as $value){
            $list[$value->type] = $value;
        }
        return $list;
    }

    public static function editMypage($id, $request, $type)
    {
        $data = self::where('type', $type)
        ->where('seminer_id', $id)
        ->first();

        if ($type == "renew_title")
        {
            $data->display_status = $request->renew_title_status;
            if($request->lang == 2){
                $data->title2 = $request->renew_title;
            }else{
                $data->title = $request->renew_title;
            }
        }
        if ($type == "renew_note")
        {
            $data->display_status = $request->renew_note_status;
            if($request->lang == 2){
                $data->title2 = $request->renew_note;
            }else{
                $data->title = $request->renew_note;
            }
        }
        if ($type == "renew_input")
        {
            if($request->lang == 2){
                $data->title2 = $request->renew_input;
                $data->text2 = $request->renew_input_text;
            }else{
                $data->title = $request->renew_input;
                $data->text = $request->renew_input_text;
            }
        }
        if ($type == "renew_button")
        {
            if($request->lang == 2){
                $data->title2 = $request->renew_button;
            }else{
                $data->title = $request->renew_button;
            }
        }
        if ($type == "renew_success")
        {
            if($request->lang == 2){
                $data->title2 = $request->renew_success;
            }else{
                $data->title = $request->renew_success;
            }
        }
        if ($type == "renew_miss")
        {
            if($request->lang == 2){
                $data->title2 = $request->renew_miss;
            }else{
                $data->title = $request->renew_miss;
            }
        }

        $data->save();
    }

}
