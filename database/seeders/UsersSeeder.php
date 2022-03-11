<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
            'name' => '管理太郎',
            'email' => 'test@test.jp',
            'password' => Hash::make('test'),
            'is_super' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'name' => 'サンプル太郎',
            'email' => 'test1234@sample.co.jp',
            'password' => Hash::make('test1234'),
            'is_super' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'name' => 'GP-RSS',
            'email' => 'chie.sato.c5@tohoku.ac.jp',
            'password' => Hash::make('gp303'),
            'is_super' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
