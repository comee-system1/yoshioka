<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefineInvoiceTitle extends Model
{
    use HasFactory;

    protected $table = "define_invoice_titles";

    protected $fillable = [
        'seminer_id',
        'title',
        'type',
    ];

    public static function editDataType($id, $request, $type)
    {
        $data = self::where('type', $type)
            ->where('seminer_id', $id)
            ->first();
        $data->title = $request->$type;
        $data->save();
    }

    public static function getData($id)
    {
        $data = self::where('seminer_id', $id)
            ->get();
        $list = [];
        foreach($data as $value){
            $list[$value['type']] = $value;
        }
        return $list;
    }
}
