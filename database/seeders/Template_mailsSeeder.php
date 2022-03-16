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
            'subject' => '参加ありがとうございます',
            'body' => '
※このメールはシステムからの自動返信です

##name##様

お世話になっております。
参加ありがとうございました。

以下の内容で受け付けいたしました。


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
            'type' => 'password_renew',
            'template_code' => '1',
            'subject' => 'パスワード再登録を行いました。',
            'body' => '
※このメールはシステムからの自動返信です

##name##様

お世話になっております。
パスワード再登録を行いました。

以下の内容でパスワード再設定いたしました。

━━━━━━□■□　再設定内容　□■□━━━━━━
パスワード ##password_renew##
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
            ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'type' => 'information',
            'template_code' => '1',
            'subject' => 'お知らせメール',
            'body' => '
##name##様

お世話になっております。
〇〇〇よりご連絡を行います。

##information##

引き続きよろしくお願いいたします。


            ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'type' => 'request3',
            'template_code' => '1',
            'subject' => 'セミナーお知らせ(3日前)',
            'body' => '
##name##様

お世話になっております。
〇〇〇よりご連絡を行います。

〇〇〇が〇〇日に開催いたします。開催3日前となります。

引き続きよろしくお願いいたします。


            ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'type' => 'request1',
            'template_code' => '1',
            'subject' => 'セミナーお知らせ(1日前)',
            'body' => '
##name##様

お世話になっております。
〇〇〇よりご連絡を行います。

〇〇〇が〇〇日に開催いたします。開催1日前となります。

引き続きよろしくお願いいたします。


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
Name ##name##
Kana ##name_kana##
Email address ##email##
Company name ##company##
Phone number ##tel##
Address ##address##
Affiliation ##area##
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
            [
            'type' => 'password_renew',
            'template_code' => '2',
            'subject' => 'The password has been re-registered.',
            'body' => '
* This email is an automatic reply from the system.

##name##

We become indebted to.
I have re-registered my password.

The password has been reset with the following contents.

━━━━━━ □ ■ □ Reset contents □ ■ □ ━━━━━━
Password ##password_renew##
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
            ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'type' => 'information',
            'template_code' => '2',
            'subject' => 'information',
            'body' => '
##name##

We become indebted to.
We will contact you from 〇〇〇.

##information##

Thank you for your continued support

            ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'type' => 'request3',
            'template_code' => '2',
            'subject' => 'Seminar information 3 days ago',
            'body' => '
##name##

We become indebted to.
We will contact you from 〇〇〇.

XX will be held on XX days. It will be 3 days before the event.

Thank you for your continued support.

            ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'type' => 'request1',
            'template_code' => '2',
            'subject' => 'Seminar information 1 days ago',
            'body' => '
##name##

We become indebted to.
We will contact you from 〇〇〇.

XX will be held on XX days. It will be 1 days before the event.

Thank you for your continued support.

            ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
