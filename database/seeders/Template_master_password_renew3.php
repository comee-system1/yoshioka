<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Template_master_password_renew3 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('template_master_password_renews')->insert([
            [
            'master_id' => '1',
            'title' => 'パスワード再設定',
            'title2' => 'reset Password',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'type' => 'renew_title',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '2',
            'title' => 'パスワードの再設定を行います。メールアドレスを入力し、「再設定」ボタンを押下してください。
再登録されたパスワードが登録したメールアドレスに送信されます。
再登録されたパスワードは必ず再設定を行ってください。
',
            'title2' => 'Reset the password. Please enter your e-mail address and click the "Reset" button.
The re-registered password will be sent to the registered email address.
Be sure to reset the re-registered password.
',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'type' => 'renew_note',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '3',
            'title' => 'メールアドレス',
            'title2' => 'email',
            'text' => 'メールアドレスを入力してください。',
            'text2' => 'input email',
            'template_code' => '3',
            'type' => 'renew_input',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '4',
            'title' => '再設定',
            'title2' => 'Reset',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'type' => 'renew_button',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '5',
            'title' => 'パスワードの更新に成功しました',
            'title2' => 'Password update was successful',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'type' => 'renew_success',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '6',
            'title' => 'パスワードの更新に失敗しました',
            'title2' => 'Password update failed',
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'type' => 'renew_miss',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
