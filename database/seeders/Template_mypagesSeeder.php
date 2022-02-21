<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_mypagesSeeder extends Seeder
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
            'text' => '参加情報更新ボタン：参加情報の更新を行います。
演題一覧ボタン：登録している演題情報の登録・更新を行います。
請求書ボタン：請求書の発行を行います。
領収書ボタン：領収書の発行を行います。
プログラムボタン：プログラム一覧ページに遷移します。
資料一括DLボタン：登録資料の一括ダウンロードができます。
            ',
            'template_code' => '1',
            'type' => 'mypage',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加情報更新',
            'text' => '参加者情報の更新を行います。',
            'template_code' => '1',
            'type' => 'join',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '演題一覧',
            'text' => '演題情報の更新を行います。',
            'template_code' => '1',
            'type' => 'endai',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '請求書',
            'text' => '',
            'template_code' => '1',
            'type' => 'invoice',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '領収書',
            'text' => '',
            'template_code' => '1',
            'type' => 'recipe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'プログラム',
            'text' => '',
            'template_code' => '1',
            'type' => 'program',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '資料一括DL',
            'text' => '',
            'template_code' => '1',
            'type' => 'download',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'MYPAGE',
            'text' => 'Participation information update button: Updates the participation information.
Abstract list button: Register / update the registered abstract information.
Invoice button: Issue an invoice.
Receipt button: Issue a receipt.
Program button: Moves to the program list page.
Material batch DL button: You can download all registered materials at once.
            ',
            'template_code' => '2',
            'type' => 'mypage',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Participation information update',
            'text' => 'Participant information will be updated.',
            'template_code' => '2',
            'type' => 'join',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'List of abstracts',
            'text' => 'The abstract information will be updated.',
            'template_code' => '2',
            'type' => 'endai',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'invoice',
            'text' => '',
            'template_code' => '2',
            'type' => 'invoice',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'recipe',
            'text' => '',
            'template_code' => '2',
            'type' => 'recipe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'program',
            'text' => '',
            'template_code' => '2',
            'type' => 'program',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'download',
            'text' => '',
            'template_code' => '2',
            'type' => 'download',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
