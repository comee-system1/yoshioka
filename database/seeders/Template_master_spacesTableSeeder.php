<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_master_spacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('template_master_spaces')->insert([
            [
            'master_id' => '1',
            'text' => '非会員',
            'text2' => '',
            'template_code' => '1',
            'sort' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '2',
            'text' => '学生',
            'text2' => '',
            'template_code' => '1',
            'sort' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '3',
            'text' => '法人会員',
            'text2' => '',
            'template_code' => '1',
            'sort' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '4',
            'text' => '個人会員',
            'text2' => '',
            'template_code' => '1',
            'sort' => '4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '5',
            'text' => '協賛企業',
            'text2' => '',
            'template_code' => '1',
            'sort' => '5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '6',
            'text' => 'その他',
            'text2' => '',
            'template_code' => '1',
            'sort' => '6',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '1',
            'text' => 'Non-member',
            'text2' => '',
            'template_code' => '2',
            'sort' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '2',
            'text' => 'student',
            'text2' => '',
            'template_code' => '2',
            'sort' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '3',
            'text' => 'Corporate member',
            'text2' => '',
            'template_code' => '2',
            'sort' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '4',
            'text' => 'Personal member',
            'text2' => '',
            'template_code' => '2',
            'sort' => '4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '5',
            'text' => 'Sponsers',
            'text2' => '',
            'template_code' => '2',
            'sort' => '5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '6',
            'text' => 'Other',
            'text2' => '',
            'template_code' => '2',
            'sort' => '6',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '1',
            'text' => '非会員',
            'text2' => 'Non-member',
            'template_code' => '3',
            'sort' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '2',
            'text' => '学生',
            'text2' => 'student',
            'template_code' => '3',
            'sort' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '3',
            'text' => '法人会員',
            'text2' => 'Corporate member',
            'template_code' => '3',
            'sort' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '4',
            'text' => '個人会員',
            'text2' => 'Personal member',
            'template_code' => '3',
            'sort' => '4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '5',
            'text' => '協賛企業',
            'text2' => 'Sponsers',
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
