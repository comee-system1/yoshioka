<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_invoice_titles3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('template_invoice_titles')->insert([
            [
            'title' => '請求書',
            'title2' => 'INVOICE',
            'template_code' => '3',
            'type' => 'invoice',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '領収書',
            'title2' => 'RECEIPT',
            'template_code' => '3',
            'type' => 'receipt',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'お振込先',
            'title2' => 'Transfer destination',
            'template_code' => '3',
            'type' => 'payee',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '金額',
            'title2' => '￥',
            'template_code' => '3',
            'type' => 'bill',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '様',
            'title2' => '',
            'template_code' => '3',
            'type' => 'honor',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '上記の金額受領いたしました。',
            'title2' => 'I received the above amount.',
            'template_code' => '3',
            'type' => 'recipe_message',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => '上記の金額請求いたします。',
            'title2' => 'The above amount will be charged.',
            'template_code' => '3',
            'type' => 'invoice_message',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
