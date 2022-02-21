<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersSeeder::class);
        $this->call(Template_master_spacesTableSeeder::class);
        $this->call(Template_join_titlesTableSeeder::class);
        $this->call(Template_endai_titlesTableSeeder::class);
        $this->call(Template_master_presentationTableSeeder::class);
        $this->call(Template_time_titleTableSeeder::class);
        $this->call(Template_master_placesTableSeeder::class);
        $this->call(Template_book_titleTableSeeder::class);
        $this->call(Template_mailsSeeder::class);
        $this->call(Template_invoicesSeeder::class);
        $this->call(Template_invoice_titlesSeeder::class);
        $this->call(Template_titlesSeeder::class);
        $this->call(Template_mypagesSeeder::class);
    }
}
