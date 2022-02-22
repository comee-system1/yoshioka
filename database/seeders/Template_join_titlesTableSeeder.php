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
            'error_message' => '',
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
            'error_message' => '参加者区分を選択してください',
            'sort' => '1',
            'type' => 'account_type',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加者名',
            'text' => '名前を入力',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'error_message' => '名前が未入力です',
            'sort' => '2',
            'type' => 'name',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加者名(かな)',
            'text' => '名前(かな)を入力',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'error_message' => '名前(かな)が未入力です',
            'sort' => '3',
            'type' => 'name_kana',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'メールアドレス',
            'text' => 'メールアドレスを入力してください。',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'error_message' => 'メールアドレスに不備があります。',
            'sort' => '4',
            'type' => 'email',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'パスワード',
            'text' => 'パスワードを入力してください。',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'error_message' => 'パスワードに不備があります。',
            'sort' => '5',
            'type' => 'password',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '会社名',
            'text' => '会社名を入力してください。',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'error_message' => '会社名が未入力です',
            'sort' => '6',
            'type' => 'company',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '電話番号',
            'text' => '電話番号を入力してください。',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'error_message' => '電話番号が未入力です',
            'sort' => '7',
            'type' => 'tel',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '住所',
            'text' => '住所を入力してください。',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'error_message' => '住所が未入力です',
            'sort' => '8',
            'type' => 'address',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '所属',
            'text' => '所属を入力してください。',
            'template_code' => '1',
            'required' => '1',
            'required_text' => '必須',
            'error_message' => '所属が未入力です',
            'sort' => '9',
            'type' => 'area',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '確認',
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
            'title' => '戻る',
            'text' => '',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'back_button',
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
            'type' => 'regist_button',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加費',
            'text' => '',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'join',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '懇親会費',
            'text' => '',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'party',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '懇親会参加有無',
            'text' => '',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'party_flag',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加登録はこちらから',
            'text' => '',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'joinlink',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '処理に成功しました',
            'text' => '',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'join_success',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '処理に失敗しました',
            'text' => '',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'join_miss',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'パスワード変更はこちらから',
            'text' => '',
            'template_code' => '1',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'password_edit',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Participant registration',
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
            'title' => 'Participant category',
            'text' => '',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'error_message' => 'Participant category is required',
            'sort' => '1',
            'type' => 'account_type',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Participant name',
            'text' => 'Enter last name,Enter first name',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'error_message' => 'Participant name is required',
            'sort' => '2',
            'type' => 'name',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Participant name (Kana)',
            'text' => 'Enter the surname (kana),Enter the first name (kana)',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'error_message' => 'Participant name(kana) is required',
            'sort' => '3',
            'type' => 'name_kana',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'email address',
            'text' => 'Please enter your e-mail address.',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'error_message' => 'email address is false',
            'sort' => '4',
            'type' => 'address',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'password',
            'text' => 'Please enter your password.',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'error_message' => 'password is false',
            'sort' => '5',
            'type' => 'password',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Company Name',
            'text' => 'Please enter the company name.',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'error_message' => 'company Name is required',
            'sort' => '6',
            'type' => 'company',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'telephone number',
            'text' => 'Please enter your phone number.',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'error_message' => 'telephone number is required',
            'sort' => '7',
            'type' => 'tel',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Street address',
            'text' => 'Please enter your address.',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'error_message' => 'Street address is required',
            'sort' => '8',
            'type' => 'address',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Belongs',
            'text' => 'Please enter your affiliation.',
            'template_code' => '2',
            'required' => '1',
            'required_text' => 'Required',
            'error_message' => 'Belongs is required',
            'sort' => '9',
            'type' => 'area',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'check button',
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
            'title' => 'back button',
            'text' => '',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'back_button',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'regist button',
            'text' => '',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'regist_button',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Participation fee',
            'text' => '',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'join',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Social gathering fee',
            'text' => '',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'party',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Whether or not to participate in the social gathering',
            'text' => '',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'party_flag',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Click here to register',
            'text' => '',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'joinlink',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Successful ',
            'text' => '',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'join_success',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'failed',
            'text' => '',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'join_miss',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'Click here to change your password',
            'text' => '',
            'template_code' => '2',
            'required' => '0',
            'required_text' => '',
            'error_message' => '',
            'sort' => '0',
            'type' => 'password_edit',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
