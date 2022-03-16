<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_master_places3TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('template_master_places')->insert([
            [
            'master_id' => '1',
            'text' => 'A会場',
            'text2' => 'Room A',
            'template_code' => '3',
            'sort' => '1',
            'display_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '2',
            'text' => 'B会場',
            'text2' => 'Room B',
            'template_code' => '3',
            'sort' => '2',
            'display_status' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '3',
            'text' => 'C会場',
            'text2' => 'Room C',
            'template_code' => '3',
            'sort' => '3',
            'display_status' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '4',
            'text' => 'D会場',
            'text2' => 'Room D',
            'template_code' => '3',
            'sort' => '4',
            'display_status' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '5',
            'text' => 'E会場',
            'text2' => 'Room E',
            'template_code' => '3',
            'sort' => '5',
            'display_status' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '6',
            'text' => 'F会場',
            'text2' => 'Room F',
            'template_code' => '3',
            'sort' => '6',
            'display_status' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '7',
            'text' => 'G会場',
            'text2' => 'Room G',
            'template_code' => '3',
            'sort' => '7',
            'display_status' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '8',
            'text' => 'H会場',
            'text2' => 'Room H',
            'template_code' => '3',
            'sort' => '8',
            'display_status' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '9',
            'text' => 'I会場',
            'text2' => 'Room I',
            'template_code' => '3',
            'sort' => '9',
            'display_status' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'master_id' => '10',
            'text' => 'ポスター会場',
            'text2' => 'Room Poster',
            'template_code' => '3',
            'sort' => '10',
            'display_status' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
