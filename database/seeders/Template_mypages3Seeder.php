<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_mypages3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('template_mypages')->insert([
            [
            'title' => 'マイページ',
            'title2' => 'MYPAGE',
            'text' => '参加情報更新ボタン：参加情報の更新を行います。
演題一覧ボタン：登録している演題情報の登録・更新を行います。
請求書ボタン：請求書の発行を行います。
領収書ボタン：領収書の発行を行います。
プログラムボタン：プログラム一覧ページに遷移します。
資料一括DLボタン：登録資料の一括ダウンロードができます。
            ',
            'text2' => 'Participation information update button: Updates the participation information.
Abstract list button: Register / update the registered abstract information.
Invoice button: Issue an invoice.
Receipt button: Issue a receipt.
Program button: Moves to the program list page.
Material batch DL button: You can download all registered materials at once.
            ',
            'template_code' => '3',
            'type' => 'mypage',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加情報更新',
            'title2' => 'Participation information update',
            'text' => '参加者情報の更新を行います。',
            'text2' => 'Participant information will be updated.',
            'template_code' => '3',
            'type' => 'join',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '演題一覧',
            'title2' => 'List of abstracts',
            'text' => '演題情報の更新を行います。',
            'text2' => 'The abstract information will be updated.',
            'template_code' => '3',
            'type' => 'endai',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '請求書',
            'title2' => 'invoice',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'type' => 'invoice',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '領収書',
            'title2' => 'recipe',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'type' => 'recipe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'プログラム',
            'title2' => 'program',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'type' => 'program',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '資料一括DL',
            'title2' => 'download',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'type' => 'download',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
