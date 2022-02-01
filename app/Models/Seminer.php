<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'note',
        'address',
        'map_status',
        'start_date',
        'end_date',
        'main_image',
        'open_key',
        'display_status',
        'delete_status',
    ];

    protected $table = "seminers";

    public static function getMainFileName($filename)
    {
        $filepath = pathinfo($filename);
        $ext = $filepath['extension'];
        return uniqid() . "." . $ext;
    }

    public static function getOpenKey()
    {

        $open_key = "";
        $no = 0;
        do {
            $open_key =  bin2hex(openssl_random_pseudo_bytes(4));
            if (Seminer::where('open_key', $open_key)->first()) {
                $flag = true;
            } else {
                $flag = false;
            }
            if ($no > 10) {
                break;
            }
            $no++;
        } while (true);

        return $open_key;
    }

    public static function getData($id = 0)
    {

        $data = Seminer::selectRaw('DATE_FORMAT(created_at, "%Y/%m/%d") AS date')
        ->selectRaw('(CASE main_image WHEN "" THEN "empty.jpg" ELSE main_image END) as image')
        ->selectRaw('id')
        ->selectRaw('name')
        ->selectRaw('note')
        ->selectRaw('address')
        ->selectRaw('map_status')
        ->selectRaw('open_key')
        ->selectRaw('main_image')
        ->selectRaw('display_status')
        ->selectRaw('start_date')
        ->selectRaw('DATE_FORMAT(start_date, "%Y-%m-%dT%H:%i:%s") AS st_date_format')
        ->selectRaw('end_date')
        ->selectRaw('DATE_FORMAT(end_date, "%Y-%m-%dT%H:%i:%s") AS ed_date_format')
        ->where('delete_status', '0');
        if ($id) {
            $data = $data->where('id', $id);
        }
        $data = $data->orderBy('id', 'desc')
        ->get();
        return $data;
    }

    public static function registData($request, $file_name)
    {

        if ($request->seminer_id) {
            //更新処理
            $seminer = Seminer::where('id', $request->seminer_id)->first();
            $seminer->updated_at = NOW();
        } else {
            $seminer = new Seminer();
            $seminer->created_at = NOW();
            $seminer->updated_at = NOW();
            $seminer->open_key = Seminer::getOpenKey();
        }

        $seminer->name = $request->name;
        $seminer->note = $request->note;
        $seminer->address = $request->address;
        $seminer->map_status = $request->map_status;
        $seminer->start_date = $request->start_date;
        $seminer->end_date = $request->end_date;
        if ($file_name) {
            $seminer->main_image = $file_name;
        }

        $seminer->save();
    }
    public static function editStatusData($request)
    {
        $seminer = Seminer::where('id', $request->id)->first();
        $seminer->display_status = $request->display_status;
        $seminer->save();
    }
    public static function deleteData($request)
    {
        $seminer = Seminer::where('id', $request->id)->first();
        $seminer->delete_status = 1;
        $seminer->save();
    }
}
