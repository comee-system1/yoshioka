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

    public static function textReplaceEndai($text, $account, $endai, $id)
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
        $text = preg_replace("/##endai##/", $endai->name, $text);

        return $text;
    }

    public static function textReplacePassword($text, $account)
    {
        $text = preg_replace("/##name##/", $account->name, $text);
        $text = preg_replace("/##password_renew##/", $account[ 'password' ], $text);
        return $text;
    }

    public static function textReplaceInformation($text, $account)
    {
        $text = preg_replace("/##name##/", $account->name, $text);
        $text = preg_replace("/##information##/", $account->note, $text);
        return $text;
    }

    public static function getDefineRequestMail($type)
    {
        $definetype = "";
        if($type == 1){
            $definetype = "request1";
        }else{
            $definetype = "request3";
        }
        $data = Seminer::join(
            'define_mails',
            'define_mails.seminer_id',
            '=',
            'seminers.id'
        )
        ->select('define_mails.*')
        ->where('seminers.display_status', '=', 1)
        ->where('seminers.delete_status', '=', 0)
        ->where('define_mails.type', '=', $definetype)
        ->get();
        $mail = [];
        foreach($data as $value){
            $mail[$value->seminer_id] = $value;
        }
        return $mail;
    }
}
