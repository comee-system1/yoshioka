<?php

namespace App\Consts;

// usersで使う定数
class ClassConsts
{
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
}
