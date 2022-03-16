<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_time_title3TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('template_time_titles')->insert([
            [
            'title' => 'タイムテーブル',
            'title2' => 'timetable',
            'template_code' => '3',
            'type' => 'title',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '動画ページURL',
            'title2' => 'WEB PAGE URL',
            'template_code' => '3',
            'type' => 'button',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '時刻',
            'title2' => 'TIME',
            'template_code' => '3',
            'type' => 'td1',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '講演者',
            'title2' => 'Speaker',
            'template_code' => '3',
            'type' => 'td2',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '演題名',
            'title2' => 'Title of the presentation',
            'template_code' => '3',
            'type' => 'td3',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'ダウンロード資料',
            'title2' => 'Download document',
            'template_code' => '3',
            'type' => 'td4',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
