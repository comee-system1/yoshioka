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

    public static function getDataAccount($id)
    {
        return self::where([
            "seminer_id"=>$id,
            "display_status"=>1
        ])
        ->orderBy('master_id', 'asc')->get();
    }

    public static function getData($id)
    {
        return self::where("seminer_id", $id)->orderBy('master_id', 'asc')->get();
    }

    public static function getDataMaster($id)
    {
        $data = self::where("seminer_id", $id)->orderBy('master_id', 'asc')->get();
        $return = [];
        foreach($data as $value){
            $return[$value->master_id] = $value;
        }
        return $return;
    }

    public static function editSpaceListData($id, $request)
    {

        foreach ($request->spaceLists as $key => $value) {
            $data = self::where('master_id', $value['master_id'])
            ->where('id', $value['id'])
            ->where('seminer_id', $id)
            ->first();
            if($request->lang == 2){
                $data->text2 = $value[ 'text2' ];
            }else{
                $data->text = $value[ 'text' ];
            }
            $data->display_status = $value[ 'display_status' ];
            $data->save();
        }
    }

    public static function editFee($id, $request)
    {
        foreach($request->fee as $key => $value){
            $data = self::where(['seminer_id'=>$id, 'master_id'=>$key ])->first();
            $data->join_fee   = $value[ 'join'  ];
            $data->party_fee  = $value[ 'party' ];
            $data->save();
        }
    }

    public static function calcFee($id, $request)
    {
        $data = self::where(['seminer_id'=>$id, 'master_id'=>$request->account_type])->first();
        if($request->party_status){
            return $data->join_fee+$data->party_fee;
        }else{
            return $data->join_fee;
        }
    }
    public static function calcFees($id, $request, $fee)
    {
        $data = self::where(['seminer_id'=>$id, 'master_id'=>$request->account_type])->first();
        $return[ 'join_fee' ] = 0;
        $return[ 'party_fee' ] = 0;
        if($fee->join_status) $return[ 'join_fee' ] = $data->join_fee;
        if($fee->party_status) $return[ 'party_fee' ] = $data->party_fee;
        return $return;
    }
}
