<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefineInvoice extends Model
{
    use HasFactory;

    protected $table = "define_invoices";

    protected $fillable = [
        'seminer_id',
        'text',
        'type',
    ];

    public static function getData($id)
    {
        $data = self::where('seminer_id',$id)->get();
        $lists = [];
        foreach($data as $value){
            $lists[$value->type] = $value;
        }
        return $lists;
    }

    public static function editData($id, $request)
    {
        $data = self::getData($id);
        $file_name = self::setFile($request);
        foreach($data as $key => $value){
            $where = [];
            $where[ 'seminer_id' ] = $id;
            $where[ 'type' ] = $key;
            $edit = self::where($where)->first();
            if($key == "file"){
                if($file_name) $edit->text = $file_name;
            }else{
                $edit->text = $request->$key;
            }
            $edit->save();
        }
        return true;
    }

    public static function setFile($request)
    {
        $file_name = "";
        if ($request->file) {
            $filepath = pathinfo($request->file->getClientOriginalName());
            $ext = $filepath['extension'];
            $file_name = uniqid() .".". $ext;
            $request->file->storeAs('public/invoice/', $file_name);
        }
        return $file_name;
    }
}
