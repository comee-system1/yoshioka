<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_titles3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('template_titles')->insert([
            [
            'title' => 'お知らせ情報',
            'title2' => 'Information',
            'template_code' => '3',
            'type' => 'information',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '開催日時・場所',
            'title2' => 'Date And Place',
            'template_code' => '3',
            'type' => 'date',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '住所',
            'title2' => 'Address',
            'template_code' => '3',
            'type' => 'address',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '場所',
            'title2' => 'Place',
            'template_code' => '3',
            'type' => 'place',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '協賛企業',
            'title2' => 'Sponser',
            'template_code' => '3',
            'type' => 'sponser',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
