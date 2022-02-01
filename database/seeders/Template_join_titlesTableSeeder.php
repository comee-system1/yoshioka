<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_join_titlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('template_join_titles')->insert([
            [
            'title' => '参加者登録',
            'text' => '',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'sort' => '0',
            'type' => 'title',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加者区分',
            'text' => '',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'sort' => '1',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加者名',
            'text' => '姓を入力,名を入力',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'sort' => '2',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加者名(かな)',
            'text' => '姓(かな)を入力,名(かな)を入力',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'sort' => '3',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'メールアドレス',
            'text' => 'メールアドレスを入力してください。',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'sort' => '4',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'パスワード',
            'text' => 'パスワードを入力してください。',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'sort' => '5',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '会社名',
            'text' => '会社名を入力してください。',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'sort' => '6',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '電話番号',
            'text' => '電話番号を入力してください。',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'sort' => '7',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '住所',
            'text' => '住所を入力してください。',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'sort' => '8',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '所属',
            'text' => '所属を入力してください。',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'sort' => '9',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '登録',
            'text' => '',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'sort' => '0',
            'type' => 'button',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Participant registration',
            'text' => '',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'sort' => '0',
            'type' => 'title',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Participant category',
            'text' => '',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'sort' => '1',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Participant name',
            'text' => 'Enter last name,Enter first name',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'sort' => '2',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Participant name (Kana)',
            'text' => 'Enter the surname (kana),Enter the first name (kana)',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'sort' => '3',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'email address',
            'text' => 'Please enter your e-mail address.',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'sort' => '4',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'password',
            'text' => 'Please enter your password.',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'sort' => '5',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Company Name',
            'text' => 'Please enter the company name.',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'sort' => '6',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'telephone number',
            'text' => 'Please enter your phone number.',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'sort' => '7',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Street address',
            'text' => 'Please enter your address.',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'sort' => '8',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Belongs',
            'text' => 'Please enter your affiliation.',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'sort' => '9',
            'type' => 'input',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Regist',
            'text' => '',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'sort' => '0',
            'type' => 'button',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
