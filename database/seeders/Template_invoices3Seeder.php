<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_invoices3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('template_invoices')->insert([
            [
            'text' => '2022-01-01',
            'text2' => '2022-01-01',
            'template_code' => '3',
            'type' => 'date',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'text' => '〒000-0000
〇〇都〇〇区〇〇0-0-0',
            'text2' => '0-0-0 〇〇〇〇,〇〇ku,〇〇to 000-0000 ',
            'template_code' => '3',
            'type' => 'address',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'text' => '
振込先
〇〇銀行
普通0000000
〇〇株式会社',
            'text2' => '
Payee
〇〇bank
Account 0000000 〇〇Ltd',
            'template_code' => '3',
            'type' => 'payee',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'text' => '000-0000-0000',
            'text2' => '000-0000-0000',
            'template_code' => '3',
            'type' => 'tel',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'text' => 'sample@sample.co.jp',
            'text2' => 'sample@sample.co.jp',
            'template_code' => '3',
            'type' => 'email',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'text' => '',
            'text2' => '',
            'template_code' => '3',
            'type' => 'file',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'text' => '但し〇〇セミナー■■代として',
            'text2' => 'However, 〇〇 Seminar ■■ As a substitute',
            'template_code' => '3',
            'type' => 'memo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
