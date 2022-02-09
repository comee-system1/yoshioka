<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_book_titleTableSeeder extends Seeder
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
            'template_code' => '1',
            'type' => 'title',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '2',
            'text' => '下記ボタンよりダウンロード可能です',
            'template_code' => '1',
            'type' => 'explain',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '3',
            'text' => '予稿原稿ダウンロードはこちらから',
            'template_code' => '1',
            'type' => 'button',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '1',
            'text' => 'Download the manuscript',
            'template_code' => '2',
            'type' => 'title',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '2',
            'text' => 'You can download it from the button below.',
            'template_code' => '2',
            'type' => 'explain',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '3',
            'text' => 'Click here to download the proceedings',
            'template_code' => '2',
            'type' => 'button',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
