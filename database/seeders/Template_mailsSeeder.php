<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_mailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('template_mails')->insert([
            [
            'type' => 'join',
            'template_code' => '1',
            'subject' => '参加登録ありがとうございます',
            'body' => '
※このメールはシステムからの自動返信です

##name##様

お世話になっております。
参加登録ありがとうございました。

以下の内容で参加登録を受け付けいたしました。


━━━━━━□■□　登録内容　□■□━━━━━━
名前 ##name##
かな ##name_kana##
メールアドレス ##email##
会社名 ##company##
電話番号 ##tel##
住所 ##address##
所属 ##area##
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
            ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'type' => 'endai',
            'template_code' => '1',
            'subject' => '演題登録ありがとうございます',
            'body' => '
※このメールはシステムからの自動返信です

##name##様

お世話になっております。
演題登録ありがとうございました。

以下の内容で演題登録を受け付けいたしました。

━━━━━━□■□　登録内容　□■□━━━━━━
演題名 ##endai##
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
            ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'type' => 'join',
            'template_code' => '2',
            'subject' => 'Thank you for registering',
            'body' => '
※This email is an automatic reply from the system.

##name##

We become indebted to.
Thank you for registering.

Registration has been accepted with the following contents.


━━━━━━□■□　Registration details　□■□━━━━━━
Name ## name ##
Kana ## name_kana ##
Email address ## email ##
Company name ## company ##
Phone number ## tel ##
Address ## address ##
Affiliation ## area ##
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
            ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'type' => 'endai',
                'template_code' => '2',
                'subject' => 'Thank you for submitting the abstract',
                'body' => '
※This email is an automatic reply from the system.

##name##

We become indebted to.
Thank you for registering your abstract.

We have accepted the abstract registration with the following contents.

━━━━━━□■□　Registration details　□■□━━━━━━
Title ##endai##
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
            ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}