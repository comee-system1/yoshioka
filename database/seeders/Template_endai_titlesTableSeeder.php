<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_endai_titlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('template_endai_titles')->insert([
            [
            'title' => '演題登録',
            'text' => '',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'title',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '登録',
            'text' => '',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'button',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加者選択',
            'text' => '参加者を選択してください',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'error_message' => '参加者を選択してください',
            'sort' => '1',
            'type' => 'select',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '演題名',
            'text' => '演題名を入力してください',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'error_message' => '演題は必須です',
            'sort' => '2',
            'type' => 'endai',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '演題内容',
            'text' => '演題内容を入力してください',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'error_message' => '演題内容は必須です',
            'sort' => '3',
            'type' => 'enadi_note',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '発表形式',
            'text' => '発表形式を選択してください',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'error_message' => '発表形式は必須です',
            'sort' => '4',
            'type' => 'radio',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '配布資料1',
            'text' => '配布資料1を選択してください',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'error_message' => '配布資料1は必須です',
            'sort' => '5',
            'type' => 'file1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '配布資料2',
            'text' => '配布資料2を選択してください',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'error_message' => '配布資料2は必須です',
            'sort' => '6',
            'type' => 'file2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '配布資料3',
            'text' => '配布資料3を選択してください',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'error_message' => '配布資料3は必須です',
            'sort' => '7',
            'type' => 'file3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Presentation registration',
            'text' => '',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'title',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'regist',
            'text' => '',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'button',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Select participants',
            'text' => 'Please select a participant',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'error_message' => 'Select participants is Required',
            'sort' => '1',
            'type' => 'select',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Title of the presentation',
            'text' => 'Please enter the title of the presentation',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'error_message' => 'Title of the presentation is Required',
            'sort' => '2',
            'type' => 'name',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Subject content',
            'text' => 'Please enter the content of your presentation',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'error_message' => 'Subject content is Required',
            'sort' => '3',
            'type' => 'name_note',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Presentation format',
            'text' => 'Please select a presentation format',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'error_message' => 'Presentation format is Required',
            'sort' => '4',
            'type' => 'radio',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Document 1',
            'text' => 'Please enter a name',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => 'Document 1 is Required',
            'sort' => '5',
            'type' => 'file1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Document 2',
            'text' => 'Please enter a name',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => 'Document 2 is Required',
            'sort' => '6',
            'type' => 'file2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Document 3',
            'text' => 'Please enter a name',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => 'Document 3 is Required',
            'sort' => '7',
            'type' => 'file3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],

        ]);
    }
}
