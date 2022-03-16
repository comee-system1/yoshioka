<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_master_presentation3TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('template_master_presentations')->insert([
            [
            'master_id' => '1',
            'text' => '特別講演',
            'text2' => 'Special lecture',
            'template_code' => '3',
            'sort' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '2',
            'text' => 'ポスター発表',
            'text2' => 'Poster presentation',
            'template_code' => '3',
            'sort' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '3',
            'text' => '一般公演',
            'text2' => 'General performance',
            'template_code' => '3',
            'sort' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '4',
            'text' => '口頭講演',
            'text2' => 'Oral lecture',
            'template_code' => '3',
            'sort' => '4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '5',
            'text' => '協賛講演',
            'text2' => 'Sponsored lecture',
            'template_code' => '3',
            'sort' => '5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '6',
            'text' => 'その他',
            'text2' => 'Other',
            'template_code' => '3',
            'sort' => '6',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
