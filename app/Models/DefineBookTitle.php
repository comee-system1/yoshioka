<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefineBookTitle extends Model
{
    use HasFactory;

    protected $table = "define_book_titles";

    protected $fillable = [
        'master_id',
        'seminer_id',
        'text',
        'display_status',
        'type',
    ];

    public static function editDataType($id, $request, $type){

        $data = DefineBookTitle::where('type', $type)
            ->where('seminer_id', $id)
            ->first();
        $data->text = $request->$type;
        $data->save();

    }

}
