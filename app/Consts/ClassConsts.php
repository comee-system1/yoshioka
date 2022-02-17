<?php

namespace App\Consts;

use App\Models\Account;
use App\Models\DefineFee;
use App\Models\DefineJoinTitle;
use App\Models\DefineSpaceList;


// usersで使う定数
class ClassConsts
{
    public const PAGE_LIMIT = 30;
    public const MAIL_TYPE = [
        "join" => "参加登録",
        "endai" => "演題登録",
    ];

    public const ENABLE_LIST = [
        1 => "有効",
        0 => "無効",
    ];

    public const SEND_FLAG = [
        1 => "配信済",
        0 => "未配信",
    ];

    public const CLASS_LIST = [
        1 => "非会員",
        2 => "学生",
        3 => "法人会員",
        4 => "個人会員",
        5 => "協賛企業",
        6 => "その他",
    ];

    public const ANNOUNCE_LIST = [
        1 => [
            1 => "特別講演",
            2 => "ポスター発表",
            3 => "一般公演",
            4 => "口頭講演",
        ]
    ];

    public const SPACE_LIST = [
        'A' => "A会場",
        'B' => "B会場",
        'C' => "C会場",
        'D' => "D会場",
        'E' => "E会場",
        'F' => "F会場",
        'G' => "G会場",
        'H' => "H会場",
        'I' => "I会場",
        'P' => "ポスター会場",
    ];
    public const TYPE_LIST = [
        'title'  => "タイトル",
        'button' => "ボタン",
        'radio'  => "一択選択",
        'check'  => "複数選択",
        'select' => "一覧選択",
        'name'  => "名前",
        'name_kana'  => "ふりがな",
        'email'  => "メールアドレス",
        'password'  => "パスワード",
        'company'  => "会社名",
        'tel'  => "電話番号",
        'address'  => "住所",
        'area'  => "所属",
        'endai'  => "演題名",
        'endai_note'  => "演題内容",
        'file1'   => "登録資料1",
        'file2'   => "登録資料2",
        'file3'   => "登録資料3",
    ];

    public const INFO_TYPE = [
        1 => "Web掲載(Webページへの掲載)",
        2 => "メール配信",
    ];
    public const INFO_TYPE_DISP = [
        1 => "Web掲載",
        2 => "メール配信",
    ];


    public static function createArray($array){
        $return = [];
        foreach($array as $key=>$value){
            $return[$value->master_id] = $value->text;
        }
        return $return;
    }

    public static function createArrayFee($array){
        $return = [];
        foreach($array as $key=>$value){
            $return[$value->master_id][ 'text'  ] = $value->text;
            $return[$value->master_id][ 'join_fee'  ] = $value->join_fee;
            $return[$value->master_id][ 'join_fee_yen'  ] = number_format($value->join_fee);
            $return[$value->master_id][ 'party_fee' ] = $value->party_fee;
            $return[$value->master_id][ 'party_fee_yen'  ] = number_format($value->party_fee);
        }
        return $return;
    }

    public function getDefine($id)
    {
        $this->accountSelect = DefineSpaceList::getDataAccount($id);
        $this->title = DefineJoinTitle::getDataType($id, 'title')->first();
        $this->button = DefineJoinTitle::getDataType($id, 'button')->first();
        $this->regist_button = DefineJoinTitle::getDataType($id, 'regist_button')->first();
        $this->back_button = DefineJoinTitle::getDataType($id, 'back_button')->first();
        $this->account_type = DefineJoinTitle::getDataType($id, 'account_type')->first();
        $this->join = DefineJoinTitle::getDataType($id, 'join')->first();
        $this->party = DefineJoinTitle::getDataType($id, 'party')->first();
        $this->party_flag = DefineJoinTitle::getDataType($id, 'party_flag')->first();
        $this->account_input = DefineJoinTitle::getDataType($id, ['name', 'name_kana', 'email', 'password', 'company', 'tel', 'address', 'area' ])->get();
    }

}
