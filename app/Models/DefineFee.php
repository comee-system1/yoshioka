<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DefineFee extends Model
{
    use HasFactory;

    protected $table = "define_fees";

    protected $fillable = [
        'seminer_id',
        'join_status',
        'party_status',
        'stripekey_public',
        'stripekey_secret',
    ];

    public static function getDefault($id)
    {
        $insert = [];
        $insert[ 'seminer_id'  ] = $id;
        $insert[ 'created_at'  ] = NOW();
        $insert[ 'updated_at'  ] = NOW();
        return $insert;
    }

    public static function getData($id)
    {
        $data = self::find($id);
        return $data;
    }

    public static function getDataSeminer($id)
    {
        $data = self::where("seminer_id", $id)->first();
        return $data;
    }

    public static function editStatus($id,$request)
    {

        $data = self::where("seminer_id",$id)->first();
        $data->join_status = $request->join_status;
        $data->party_status = $request->party_status;
        $data->stripe_status = $request->stripe_status;
        $data->stripekey_public = $request->stripekey_public;
        $data->stripekey_secret = $request->stripekey_secret;
        $data->save();
        return true;
    }
}
