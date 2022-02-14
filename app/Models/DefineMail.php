<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefineMail extends Model
{
    use HasFactory;

    protected $table = "define_mails";

    protected $fillable = [
        'seminer_id',
        'type',
        'subject',
        'body',
    ];

    public static function getData($id, $type="")
    {
        $return = self::where([
            'seminer_id'=>$id,
            'type'=>$type
        ])->first();
        return $return;
    }

    public static function editData($id, $request)
    {
        $data = self::where([
            'seminer_id'=>$id,
            'type'=>$request->type,
         ])->first();
        $data->subject = $request->subject;
        $data->body = $request->body;
        $data->save();
    }

    public static function textReplace($text, $account, $id)
    {
        $account_type = DefineSpaceList::getDataMaster($id);
        $text = preg_replace("/##account_type##/", $account_type[$account->account_type]->text, $text);
        $text = preg_replace("/##name##/", $account->name, $text);
        $text = preg_replace("/##name_kana##/", $account->name_kana, $text);
        $text = preg_replace("/##company##/", $account->company, $text);
        $text = preg_replace("/##tel##/", $account->tel, $text);
        $text = preg_replace("/##address##/", $account->address, $text);
        $text = preg_replace("/##area##/", $account->area, $text);
        $text = preg_replace("/##email##/", $account->email, $text);

        return $text;
    }
}
