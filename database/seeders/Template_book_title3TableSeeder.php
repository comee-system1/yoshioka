<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_book_title3TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('template_book_titles')->insert([
            [
            'master_id' => '1',
            'text' => '予稿原稿ダウンロード',
            'text2' => 'Download the manuscript',
            'template_code' => '3',
            'type' => 'title',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '2',
            'text' => '下記ボタンよりダウンロード可能です',
            'text2' => 'You can download it from the button below.',
            'template_code' => '3',
            'type' => 'explain',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '3',
            'text' => '予稿原稿ダウンロードはこちらから',
            'text2' => 'Click here to download the proceedings',
            'template_code' => '3',
            'type' => 'button',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
