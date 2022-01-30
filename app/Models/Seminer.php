<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'explain',
        'address',
        'map_status',
        'start_date',
        'end_date',
        'main_image',
        'open_key',
        'display_status',
        'delete_status',
    ];

    public static function getMainFileName($filename)
    {
        $filepath = pathinfo($filename);
        $ext = $filepath['extension'];
        return uniqid() . "." . $ext;
    }
    public static function getOpenKey()
    {
        return uniqid('open_');
    }
    public static function registData($request, $file_name)
    {

        Seminer::insert([
            'name' => $request->name,
            'explain' => $request->explain,
            'address' => $request->address,
            'map_status' => $request->map_status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'main_image' => $file_name,
            'open_key' => Seminer::getOpenKey(),
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
    }
    public static function editData($request)
    {
        $seminer = Seminer::where('id', $request->id)->first();
        $seminer->display_status = $request->display_status;
        $seminer->save();
    }
}
