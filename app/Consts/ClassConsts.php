<?php

namespace App\Consts;

// usersで使う定数
class ClassConsts
{
    public const ENABLE_LIST = [
        1 => "有効",
        0 => "無効",
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
        2 => "メール配信(参加者へのメール配信)",
    ];
}
