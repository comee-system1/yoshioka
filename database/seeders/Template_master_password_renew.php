<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_master_password_renew extends Seeder
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
            'text' => '',
            'template_code' => '1',
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
            'text' => '',
            'template_code' => '1',
            'type' => 'renew_note',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '3',
            'title' => 'メールアドレス',
            'text' => 'メールアドレスを入力してください。',
            'template_code' => '1',
            'type' => 'renew_input',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '4',
            'title' => '再設定',
            'text' => '',
            'template_code' => '1',
            'type' => 'renew_button',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '5',
            'title' => 'パスワードの更新に成功しました',
            'text' => '',
            'template_code' => '1',
            'type' => 'renew_success',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '6',
            'title' => 'パスワードの更新に失敗しました',
            'text' => '',
            'template_code' => '1',
            'type' => 'renew_miss',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '1',
            'title' => 'reset Password',
            'text' => '',
            'template_code' => '2',
            'type' => 'renew_title',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '2',
            'title' => 'Reset the password. Please enter your e-mail address and click the "Reset" button.
The re-registered password will be sent to the registered email address.
Be sure to reset the re-registered password.
',
            'text' => '',
            'template_code' => '2',
            'type' => 'renew_note',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '3',
            'title' => 'email',
            'text' => 'input email',
            'template_code' => '2',
            'type' => 'renew_input',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '4',
            'title' => 'Reset',
            'text' => '',
            'template_code' => '2',
            'type' => 'renew_button',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '5',
            'title' => 'Password update was successful',
            'text' => '',
            'template_code' => '2',
            'type' => 'renew_success',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '6',
            'title' => 'Password update failed',
            'text' => '',
            'template_code' => '2',
            'type' => 'renew_miss',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
