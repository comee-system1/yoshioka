<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_join_titles3Seeder extends Seeder
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
            'title2' => 'Participant registration',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '0',
            'required_text' => '',
            'required_text2' => '',
            'error_message' => '',
            'error_message2' => '',
            'sort' => '0',
            'type' => 'title',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加者区分',
            'title2' => 'Participant category',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '1',
            'required_text' => '必須',
            'required_text2' => 'Required',
            'error_message' => '参加者区分を選択してください',
            'error_message2' => 'Participant category is required',
            'sort' => '1',
            'type' => 'account_type',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加者名',
            'title2' => 'Participant name',
            'text' => '名前を入力',
            'text2' => 'Enter last name,Enter first name',
            'template_code' => '3',
            'required' => '1',
            'required_text' => '必須',
            'required_text2' => 'Required',
            'error_message' => '名前が未入力です',
            'error_message2' => 'Participant name is required',
            'sort' => '2',
            'type' => 'name',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加者名(かな)',
            'title2' => 'Participant name (Kana)',
            'text' => '名前(かな)を入力',
            'text2' => 'Enter the surname (kana),Enter the first name (kana)',
            'template_code' => '3',
            'required' => '1',
            'required_text' => '必須',
            'required_text2' => 'Required',
            'error_message' => '名前(かな)が未入力です',
            'error_message2' => 'Participant name(kana) is required',
            'sort' => '3',
            'type' => 'name_kana',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'メールアドレス',
            'title2' => 'email address',
            'text' => 'メールアドレスを入力してください。',
            'text2' => 'Please enter your e-mail address.',
            'template_code' => '3',
            'required' => '1',
            'required_text' => '必須',
            'required_text2' => 'Required',
            'error_message' => 'メールアドレスに不備があります。',
            'error_message2' => 'email address is false',
            'sort' => '4',
            'type' => 'email',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'パスワード',
            'title2' => 'password',
            'text' => 'パスワードを入力してください。',
            'text2' => 'Please enter your password.',
            'template_code' => '3',
            'required' => '1',
            'required_text' => '必須',
            'required_text2' => 'Required',
            'error_message' => 'パスワードに不備があります。',
            'error_message2' => 'password is false',
            'sort' => '5',
            'type' => 'password',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '会社名',
            'title2' => 'Company Name',
            'text' => '会社名を入力してください。',
            'text2' => 'Please enter the company name.',
            'template_code' => '3',
            'required' => '1',
            'required_text' => '必須',
            'required_text2' => 'Required',
            'error_message' => '会社名が未入力です',
            'error_message2' => 'company Name is required',
            'sort' => '6',
            'type' => 'company',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '電話番号',
            'title2' => 'telephone number',
            'text' => '電話番号を入力してください。',
            'text2' => 'Please enter your phone number.',
            'template_code' => '3',
            'required' => '1',
            'required_text' => '必須',
            'required_text2' => 'Required',
            'error_message' => '電話番号が未入力です',
            'error_message2' => 'telephone number is required',
            'sort' => '7',
            'type' => 'tel',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '住所',
            'title2' => 'Street address',
            'text' => '住所を入力してください。',
            'text2' => 'Please enter your address.',
            'template_code' => '3',
            'required' => '1',
            'required_text' => '必須',
            'required_text2' => 'Required',
            'error_message' => '住所が未入力です',
            'error_message2' => 'Street address is required',
            'sort' => '8',
            'type' => 'address',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '所属',
            'title2' => 'Belongs',
            'text' => '所属を入力してください。',
            'text2' => 'Please enter your affiliation.',
            'template_code' => '3',
            'required' => '1',
            'required_text' => '必須',
            'required_text2' => 'Required',
            'error_message' => '所属が未入力です',
            'error_message2' => 'Belongs is required',
            'sort' => '9',
            'type' => 'area',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '確認',
            'title2' => 'check button',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '0',
            'required_text' => '',
            'required_text2' => '',
            'error_message' => '',
            'error_message2' => '',
            'sort' => '0',
            'type' => 'button',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '戻る',
            'title2' => 'back button',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '0',
            'required_text' => '',
            'required_text2' => '',
            'error_message' => '',
            'error_message2' => '',
            'sort' => '0',
            'type' => 'back_button',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '登録',
            'title2' => 'regist button',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '0',
            'required_text' => '',
            'required_text2' => '',
            'error_message' => '',
            'error_message2' => '',
            'sort' => '0',
            'type' => 'regist_button',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加費',
            'title2' => 'Participation fee',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '0',
            'required_text' => '',
            'required_text2' => '',
            'error_message' => '',
            'error_message2' => '',
            'sort' => '0',
            'type' => 'join',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '懇親会費',
            'title2' => 'Social gathering fee',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '0',
            'required_text' => '',
            'required_text2' => '',
            'error_message' => '',
            'error_message2' => '',
            'sort' => '0',
            'type' => 'party',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '懇親会参加有無',
            'title2' => 'Whether or not to participate in the social gathering',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '0',
            'required_text' => '',
            'required_text2' => '',
            'error_message' => '',
            'error_message2' => '',
            'sort' => '0',
            'type' => 'party_flag',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '参加登録はこちらから',
            'title2' => 'Click here to register',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '0',
            'required_text' => '',
            'required_text2' => '',
            'error_message' => '',
            'error_message2' => '',
            'sort' => '0',
            'type' => 'joinlink',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '処理に成功しました',
            'title2' => 'Successful ',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '0',
            'required_text' => '',
            'required_text2' => '',
            'error_message' => '',
            'error_message2' => '',
            'sort' => '0',
            'type' => 'join_success',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '処理に失敗しました',
            'title2' => 'failed',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '0',
            'required_text' => '',
            'required_text2' => '',
            'error_message' => '',
            'error_message2' => '',
            'sort' => '0',
            'type' => 'join_miss',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'メールアドレスかパスワードに誤りがあります。',
            'title2' => 'There is an error in your email address or password.',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '0',
            'required_text' => '',
            'required_text2' => '',
            'error_message' => '',
            'error_message2' => '',
            'sort' => '0',
            'type' => 'sign_in_miss',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'パスワード変更はこちらから',
            'title2' => 'Click here to change your password',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '0',
            'required_text' => '',
            'required_text2' => '',
            'error_message' => '',
            'error_message2' => '',
            'sort' => '0',
            'type' => 'password_edit',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'パスワードの再設定',
            'title2' => 'reset password',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'required' => '0',
            'required_text' => '',
            'required_text2' => '',
            'error_message' => '',
            'error_message2' => '',
            'sort' => '0',
            'type' => 'password_renew',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
